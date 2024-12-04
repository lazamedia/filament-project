<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"> --}}
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta name="referrer" content="no-referrer">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Tags SEO -->
    <meta name="description" content="Unit Kegiatan Mahasiswa (UKM) Cyber STMIK AMIKOM Surakarta bergerak dibidang Teknologi Informasi (IT) yang berdiri sejak tahun 2007.">
    <meta name="keywords" content="ukm cyber, cyber amikom, cyber, amikom">
    <meta name="author" content="Ukm Cyber Amikom">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://cyberamikom.org/" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:locale" content="id_ID" />
    <meta property="og:locale:alternate" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="CYBER AMIKOM SURAKARTA" />
    <meta property="og:description" content="Unit Kegiatan Mahasiswa Cyber STMIK AMIKOM Surakarta bergerak dalam bidang Teknologi Informasi dan melayani berbagai program serta kegiatan terkait dunia digital." />
    <meta property="og:url" content="https://cyberamikom.org/" />
    <meta property="og:site_name" content="Cyber Amikom Surakarta" />
    <meta property="og:image" content="https://cyberamikom.org/img/cyber.png" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="CYBER AMIKOM SURAKARTA" />
    <meta name="twitter:description" content="Unit Kegiatan Mahasiswa Cyber STMIK AMIKOM Surakarta bergerak dalam bidang Teknologi Informasi dan melayani berbagai program serta kegiatan terkait dunia digital." />
    <meta name="twitter:image" content="https://cyberamikom.org/img/cyber.png" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Judul Halaman -->
    <title>CYBER AMIKOM SURAKARTA</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Oxanium:wght@200..800&family=Quantico:ital,wght@0,400;0,700;1,400;1,700&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Tilt+Neon&display=swap" rel="stylesheet">

    <style>
        main{
            font-family: 'Inter', sans-serif;
            margin-top: 80px;
            min-height: 30vh !important;
        }
    </style>

    {{-- Boostrap --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E7LRBJ3G3L"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag('js', new Date());
      gtag('config', 'G-E7LRBJ3G3L');
    </script>
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/66b7297a0cca4f8a7a742d43/1i4tnk1tu';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
    </script>
    <!--End of Tawk.to Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
