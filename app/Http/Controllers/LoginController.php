<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Psr\Log\LoggerInterface;

class LoginController extends Controller
{
    // Konstanta untuk batas percobaan login dan durasi throttle
    protected const MAX_ATTEMPTS = 3;
    protected const ATTEMPT_DECAY_SECONDS = 120; // Reset percobaan setelah 2 menit tidak ada aktivitas
    protected const BLOCK_INCREMENT_SECONDS = 10; // Penambahan penundaan setiap 3 percobaan
    protected const BLOCK_MAX_SECONDS = 60; // Maksimal penundaan 60 detik

    protected $logger;

    /**
     * Konstruktor untuk menyuntikkan LoggerInterface.
     *
     * @param  \Psr\Log\LoggerInterface  $logger
     * @return void
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Tampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login',
            'csrf_token' => csrf_token(), // Menyertakan token CSRF dalam view
        ]);
    }

    /**
     * Proses autentikasi pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // Validasi input pengguna
        $credentials = $request->validate([
            'email' => 'required|string|min:3|max:50',
            'password' => 'required|string|min:8|max:50',
        ]);
    
        $throttleKey = $this->throttleKey($request);
        $attemptsKey = 'login_attempts:' . $throttleKey;
        $blockKey = 'login_blocked:' . $throttleKey;
    
        // Cek apakah pengguna saat ini diblokir
        if (RateLimiter::tooManyAttempts($blockKey, 1)) {
            $seconds = RateLimiter::availableIn($blockKey);
            $this->logger->warning('Percobaan login diblokir dari IP: ' . $request->ip());
    
            return back()
                ->with('loginError', 'Terlalu banyak percobaan login. Coba lagi dalam ' . $seconds . ' detik.')
                ->with('retryAfter', $seconds);
        }
    
        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            $request->session()->regenerate();
            RateLimiter::clear($attemptsKey); // Bersihkan percobaan login
            RateLimiter::clear($blockKey); // Bersihkan blokir jika ada
        
            $user = Auth::user();
            // $token = $user->createToken('cyber')->plainTextToken;
        
            // Mengembalikan response JSON untuk autentikasi
            // return response()->json([
            //     'access_token' => $token,
            //     'token_type' => 'Bearer',
            // ]);
            
            // Setelah respons JSON, tambahkan pengkondisian untuk redirect
            if ($user->hasRole('super_admin')) {  
                return redirect()->intended('/dashboard');
            } elseif ($user->hasRole('User')) { 
                return redirect()->intended('/');
            } else {
                return redirect()->intended('/');
            }
        }
        
    
        // Autentikasi gagal
        RateLimiter::hit($attemptsKey, self::ATTEMPT_DECAY_SECONDS);
        $currentAttempts = RateLimiter::attempts($attemptsKey);
        $attemptsLeft = self::MAX_ATTEMPTS - ($currentAttempts % self::MAX_ATTEMPTS);
    
        $this->logger->warning('Login gagal dari IP: ' . $request->ip());
    
        // Jika percobaan login sekarang mencapai kelipatan 3, set block
        if ($currentAttempts % self::MAX_ATTEMPTS === 0) {
            // Hitung jumlah blokir sebelumnya
            $blockCount = intdiv($currentAttempts, self::MAX_ATTEMPTS);
            // Hitung penundaan berdasarkan jumlah blokir
            $blockSeconds = self::BLOCK_INCREMENT_SECONDS * $blockCount;
            $blockSeconds = min($blockSeconds, self::BLOCK_MAX_SECONDS); // Maksimal 60 detik
    
            // Blokir pengguna selama $blockSeconds detik
            RateLimiter::hit($blockKey, $blockSeconds);
    
            return back()
                ->with('loginError', 'Terlalu banyak percobaan login. Coba lagi dalam ' . $blockSeconds . ' detik.')
                ->with('retryAfter', $blockSeconds);
        }
    
        return back()->with('loginError', 'Login gagal. Silakan coba lagi.');
    }
    

    /**
     * Logout pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // $request->user()->tokens->each(function ($token) {
        //     $token->delete(); 
        // });

        return redirect('/');
    }

    /**
     * Mendapatkan kunci throttle unik untuk pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function throttleKey(Request $request)
    {
        // Hanya menggunakan IP untuk throttle key
        return $request->ip();
    }
}
