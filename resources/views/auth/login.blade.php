<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  
  <!-- Sertakan Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #f4f4f4;
    }

    .login-box {
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      transition: all 0.3s ease;
      position: relative; /* Untuk posisi countdown */
    }

    .login-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
      font-weight: 400;
      font-size: 24px;
    }

    .input-box {
      position: relative;
      margin: 25px 0;
    }

    .input-box input {
      width: 100%;
      padding: 12px 10px;
      background: none;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
      color: #333;
      font-size: 14px;
      transition: border-color 0.3s ease;
    }

    .input-box input:focus {
      border-color: #1abc9c;
      box-shadow: none;
    }

    .input-box label {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #888;
      font-size: 14px;
      pointer-events: none;
      transition: all 0.3s ease;
      background-color: #fff;
      padding: 0 5px;
    }

    .input-box input:focus ~ label,
    .input-box input:valid ~ label {
      top: -2px;
      left: 3px;
      font-size: 12px;
      color: #1abc9c;
      padding-left: 5px;
      padding-right: 5px;
    }

    button.btn {
      width: 100%;
      background: #1abc9c;
      color: #fff;
      padding: 10px;
      border: none;
      cursor: pointer;
      font-size: 16px;
      border-radius: 5px;
      transition: background 0.3s;
      margin-top: 10px;
      position: relative;
    }

    button.btn:hover {
      background: #16a085;
    }

    button.btn:disabled {
      background: #95a5a6;
      cursor: not-allowed;
    }

    .back-btn {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #888;
      text-decoration: none;
      font-size: 12px;
    }

    .back-btn:hover {
      text-decoration: underline;
    }

    p {
      color: #888;
      text-align: center;
      margin-top: 20px;
      font-size: 12px;
    }

    p a {
      color: #1abc9c;
      text-decoration: underline;
      font-weight: 300;
    }

    /* Styling untuk countdown-box */
    .countdown-box {
      margin-top: 10px;
      text-align: center;
      color: #e74c3c;
      font-size: 14px;
    }

    /* Media Query yang Diperbarui */
    @media (max-width: 768px) {
      .login-box {
        padding: 30px;
        max-width: 350px; /* Tingkatkan dari 320px menjadi 350px */
      }
      h2 {
        font-size: 22px;
      }
    }

    /* Tambahan Media Query untuk Lebih Kecil */
    @media (max-width: 480px) {
      .login-box {
        padding: 30px;
        width: 90%; /* Mengisi 90% dari lebar layar */
      }
      h2 {
        font-size: 20px;
      }
      .input-box input {
        padding: 12px 8px;
      }
      button.btn {
        padding: 12px;
        font-size: 14px;
      }
    }
    .alert {
      font-size: 10pt !important;
    }
  </style>
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>

  <div class="login-box">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show small-text text-align-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show small-text text-center" role="alert">
        {{ session('loginError') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
    @endif
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="input-box">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" maxlength="50" autofocus required value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <label>Email</label>
      </div>
      <div class="input-box">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <label>Password</label>
      </div>
      <button id="login-btn" class="btn" type="submit" {{ session()->has('retryAfter') ? 'disabled' : '' }}>Login</button>
    </form>
    @if(session()->has('retryAfter'))
      <div class="countdown-box" id="countdown-box">
          Coba lagi dalam {{ session('retryAfter') }} detik
      </div>
    @endif
    <p>Belum punya akun? <a href="/register">Daftar</a></p>
    {{-- <a href="/" class="back-btn">Kembali ke Beranda</a> --}}
  </div>

  <!-- Sertakan Bootstrap JS (untuk fitur dismissible alert) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script untuk menghilangkan notifikasi error dalam 3 detik -->
  <script>
    setTimeout(function() {
        let alertBox = document.querySelector('.alert');
        if (alertBox) {
            // Menggunakan Bootstrap's alert close method
            let alert = new bootstrap.Alert(alertBox);
            alert.close();
        }
    }, 3000); // Hapus setelah 3 detik
  </script>

  <!-- Script untuk menghitung mundur waktu login -->
  @if(session()->has('retryAfter'))
  <script>
    let retryAfter = {{ session('retryAfter') }}; // waktu tunggu dalam detik
    let countdownBox = document.getElementById('countdown-box');
    let loginButton = document.getElementById('login-btn');

    // Hitung mundur hingga tombol kembali aktif
    let interval = setInterval(() => {
        retryAfter--;

        // Jika waktu habis, aktifkan kembali tombol login
        if (retryAfter <= 0) {
            clearInterval(interval);
            countdownBox.innerText = ""; // Hapus teks countdown
            countdownBox.style.display = 'none'; // Sembunyikan box countdown
            loginButton.removeAttribute('disabled'); // Hapus atribut disabled pada tombol
        } else {
            countdownBox.innerText = "Coba lagi dalam " + retryAfter + " detik";
        }
    }, 1000); // Hitung mundur setiap detik
  </script>
  @endif

</body>
</html>
