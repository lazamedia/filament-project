
<style>
        body{
            background-color: #0F0B22;
            color: #ffff;
            margin: 0;
            box-sizing: border-box;
        }
        .navbar{
            font-family: 'Inter';
            background-color: #1C1E28 !important;
            color: #ffffff !important;
            padding: 10px 10px;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
        }
        .container-fluid{
            width: 80%;
        }
        .nav-brand {
            display: flex;
            align-items: center;
        }
        .nav-brand img{
            width: 40px;
            object-fit: contain;
            margin-right: 15px;
        }
        .auth-box{
            display: flex;
            align-items: center;
        }
        .auth-box a{
            text-decoration: none;
            margin: 0 5px;
            font-size: 14px;
            transition: color 0.3s, box-shadow 0.3s;
        }
        .register{
            padding: 4px 13px;
            font-size: 11pt;
            background-color: #FBA300;
            color: #1C1E28;
            border-radius: 4px;
        }
        .register:hover{
            box-shadow: 0 0 7px #FBA300;
        }
        .login{
            padding: 5px 13px;
            color: #ffffff !important;
        }
        .login:hover{
            color: #FBA300 !important;
        }
        .nav-item a {
            color: #ffffff;
            margin-right: 10px;
            font-size: 14px;
            transition: color 0.3s, transform 0.3s;
        }
        .nav-item a:hover {
            color: #FBA300;
            transform: translateX(3px);
        }
        .navbar-nav{
            margin-left: 50px;
        }
        .navbar-toggler{
            color: #ffffff00;
        }
        .navbar-toggler {
            border: none;
            background-color: transparent;
            padding: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .toggler-icon {
            width: 25px;
            height: 3px;
            background-color: #FBA300; /* Ganti warna sesuai keinginan Anda */
            border-radius: 2px;
            transition: background-color 0.3s, transform 0.3s;
        }

        /* Hover effect */
        .navbar-toggler:hover .toggler-icon {
            background-color: #ffffff; /* Warna saat di-hover */
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            background-color: #1C1E28; /* Warna latar belakang dropdown */
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            padding: 10px;
            min-width: 200px;
        }

        /* Dropdown Item Styling */
        .dropdown-item {
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .dropdown-item:hover {
            background-color: #0f0b2200;
            color: #FBA300 !important; /* Warna teks saat di-hover */
            transform: translateX(5px);
        }
        .dropdown-item i {
            font-size: 18px;
            color: #FBA300;
            padding: 3px 10px;
            border-radius: 5px;
        }

        .dropdown-item div {
            display: flex;
            flex-direction: column;
        }
        .dropdown-item strong {
            font-size: 13px;
            margin-bottom: 2px;
        }

        .dropdown-desc {
            font-size: 10px;
            color: #cccccc;
            margin: 0;
        }

        /* Divider Styling */
        .dropdown-divider {
            border-top: 1px solid #FBA300;
            margin: 8px 0;
        }

        /* Dropdown Toggle Link Styling */
        .nav-link.dropdown-toggle {
            color: #ffffff !important;
            transition: color 0.3s;
        }

        .nav-link.dropdown-toggle:hover {
            color: #FBA300 !important;
        }

        .dropdown-menu {
            display: none;
            opacity: 0;
            margin-left: -50%;
            border-radius: 3px;
            transition: opacity 0.3s ease;
        }

        .dropdown-menu.show {
            display: block;
            opacity: 1;
        }
        /* Mobile Styles */
        @media (max-width: 768px) {
            .auth-box {
                flex-direction: row;
                padding: 10px 0;
                gap: 20px;
            }
            .dropdown-menu{
                margin-left: 0px;
            }
            .navbar-nav {
                margin-left: 0;
                margin-top: 20px;
            }
            .container-fluid{
                width: 95%;
            }
        }
</style>


<!-- Navbar -->
<nav class="navbar  navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="{{ asset('img/cyber.png') }}" width="30px" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="toggler-icon"></span>
        <span class="toggler-icon"></span>
        <span class="toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Chalenge</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Showcase</a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Other
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-images"></i>
                        <div>
                            <strong class="dropdown-title">Galeri</strong>
                            <p class="dropdown-desc">Lihat keseruan kami</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-people"></i>
                        <div>
                            <strong class="dropdown-title">Partner</strong>
                            <p class="dropdown-desc">Bagun kolaborasi menarik</p>
                        </div>
                    </a>
                </li>
                <!-- <li><hr class="dropdown-divider"></li> -->
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-patch-exclamation"></i>
                        <div>
                            <strong class="dropdown-title">Info</strong>
                            <p class="dropdown-desc">Info lebih lanjut</p>
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        


        </ul>
        <span class="navbar-text">
          <div class="auth-box">
            @if (Auth::check())
                <!-- User Dropdown: Consistent with "Other" Dropdown -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-house-door"></i>
                                <div>
                                    <strong>Dashboard</strong>
                                    <span class="dropdown-desc">Access your dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#" >
                                <i class="bi bi-box-arrow-right"></i>
                                <div>
                                    <strong>Logout</strong>
                                    <span class="dropdown-desc">Sign out of your account</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Logout Form -->
                <form id="logout-form" action="#" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <!-- If not logged in, show login and register links -->
                <a href="#" class="login">Masuk</a>
                <a href="#" class="register">Daftar</a>
            @endif
          </div>
        </span>
      </div>
    </div>
</nav>

<script>
    // Menangani hover pada dropdown
    const dropdownItems = document.querySelectorAll('.nav-item.dropdown');

    dropdownItems.forEach(dropdown => {
        dropdown.addEventListener('mouseover', function() {
            const dropdownMenu = this.querySelector('.dropdown-menu');
            dropdownMenu.classList.add('show');
        });

        dropdown.addEventListener('mouseout', function() {
            const dropdownMenu = this.querySelector('.dropdown-menu');
            dropdownMenu.classList.remove('show');
        });
    });
</script>