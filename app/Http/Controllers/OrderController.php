<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderList; // Pastikan model yang digunakan sesuai dengan tabel 'orderlist'
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan daftar produk di halaman index
    public function index()
    {
        $products = Product::all(); // Ambil semua produk dari tabel 'products'
        return view('products.index', compact('products'));
    }

    // Menyimpan pesanan baru
    public function store(Request $request, $productId)
    {
        // Cek apakah produk tersedia
        $product = Product::findOrFail($productId);

        // Membuat pesanan dengan status 'pending'
        $order = auth()->user()->orderlist()->create([ // Menggunakan 'orderlist' relasi jika kamu pakai tabel 'orderlist'
            'product_id' => $product->id,
            'quantity' => 1, // Misalnya quantity = 1
            'total_price' => $product->sale_price,
            'status' => 'pending', // Status awal adalah pending
        ]);

        // Mengembalikan response untuk menampilkan SweetAlert
        return response()->json([
            'message' => 'Pesanan berhasil! Silakan unggah bukti pembayaran melalui dashboard.',
        ]);
    }

    // Menyimpan bukti pembayaran dan mengubah status pesanan menjadi 'paid'
    public function uploadPaymentProof(Request $request, $orderId)
    {
        // Cek apakah pesanan ditemukan
        $order = OrderList::findOrFail($orderId); // Gunakan model 'OrderList'

        // Validasi file yang diunggah
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan bukti pembayaran
        $paymentProof = $request->file('payment_proof')->store('payment_proofs', 'public');
        $order->payment_proof = $paymentProof; // Menyimpan path bukti pembayaran
        $order->status = 'paid'; // Ubah status pesanan menjadi 'paid'
        $order->save(); // Simpan perubahan

        // Kembali ke halaman pesanan dengan pesan sukses
        return redirect()->route('dashboard.orders')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    // Menampilkan pesanan pengguna di dashboard
    public function userOrders()
    {
        $orders = auth()->user()->orderlist; // Mengambil pesanan dari relasi 'orderlist' di model User
        return view('dashboard.orders', compact('orders'));
    }
}
