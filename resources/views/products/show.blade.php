<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</head>
<body>
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <img src="{{ asset('storage/'.$product->image) }}" class="product-image" alt="{{ $product->name }}">
        <p><strong>Harga:</strong> Rp {{ number_format($product->sale_price) }}</p>
        <p><strong>Kategori:</strong> {{ $product->category }}</p>
        <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
        
        <form action="{{ route('orders.store', $product->id) }}" method="POST">
            @csrf
            <button class="btn btn-primary" onclick="orderProduct({{ $product->id }})">Pesan</button>
        </form>
    </div>

<script>
    function orderProduct(productId) {
        // Memanggil API untuk membuat pesanan dengan metode POST
        fetch(`/orders/store/${productId}`, {
            method: 'POST', // Pastikan menggunakan POST
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); // Menampilkan pesan sukses
        })
        .catch(error => console.error('Error:', error));
    }
</script>

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
