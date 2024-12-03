<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Database\QueryException;

class RegisterController extends Controller
{
    /**
     * Handle the registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|confirmed', // Pastikan konfirmasi password sesuai
        ], [
            'username.unique' => 'Username sudah ada, silakan pilih username lain.', // Pesan kesalahan khusus
        ]);

        try {
            // Membuat pengguna baru
            $user = User::create([
                'nama' => $request->nama,
                'username' => strtolower($request->username), // Standarisasi ke huruf kecil
                'password' => Hash::make($request->password),
            ]);

            // Menetapkan role user
            $user->assignRole('user');

            // Redirect ke halaman login dengan notifikasi sukses
            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') { // Kode error untuk duplicate entry
                // Kembalikan dengan error khusus untuk username
                return back()
                    ->withInput()
                    ->withErrors(['username' => 'Username sudah ada, silakan pilih username lain.']);
            }

            // Tangani error lain jika diperlukan
            return back()->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }
}
