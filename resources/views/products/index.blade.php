<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Basic Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Container Styling */
.container {
    width: 80%;
    margin: 0 auto;
}

/* Product List */
.product-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.product-card {
    width: 30%;
    background-color: white;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
}

.product-card img {
    max-width: 100%;
    border-radius: 8px;
}

.product-details {
    margin-top: 10px;
}

.btn {
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
}

.btn:hover {
    background-color: #218838;
}

/* Order and Dashboard Styling */
.order-card {
    background-color: white;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h1>Daftar Produk</h1>
        <div class="product-list">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                    <div class="product-details">
                        <h3>{{ $product->name }}</h3>
                        <p>Rp {{ number_format($product->sale_price) }}</p>
                        <a href="{{ route('products.show', $product->slug) }}" class="btn">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        // Menampilkan SweetAlert ketika pesanan berhasil
        @if(session('order_success'))
            Swal.fire({
                title: 'Pesanan Berhasil!',
                text: 'Silakan unggah bukti pembayaran melalui dashboard.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
</body>
</html>
