<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<style>
    .footer {
        background-color: #0F0B22;
        box-shadow: 0 -3px 15px rgba(10, 71, 87, 0.658);
        color: #ffffff;
        font-family: Inter;
        padding: 40px 80px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        position: relative;
        margin-top:100px ;
        bottom: 0;
        
    }

    .footer p {
        font-size: 11pt;
    }

    .footer .footer-kiri, .footer .footer-tengah, .footer .footer-kanan {
        flex: 1;
        min-width: 250px;
        margin-bottom: 20px;
    }

    .footer .footer-kiri {
        width: 350px;
    }

    .footer .footer-kiri img {
        height: 40px;
        margin-bottom: 15px;
    }

    .footer .footer-kiri p {
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .footer .social-icons {
        list-style-type: none;
        padding-left: 0;
        display: flex;
        gap: 15px;
    }

    .footer .social-icons li {
        display: inline-block;
    }

    .footer .social-icons li a {
    color: #ffffff;
    font-size: 1.2rem;
    display: inline-block; /* Pastikan elemen dapat ditransformasi */
    transition: color 0.3s ease, transform 0.3s ease;
    }

    .footer .social-icons li a:hover {
        color: #FBA300;
        transform: translateY(-5px); /* Menggerakkan elemen ke atas */
    }

    .footer h4 {
        font-family: "Kanit", sans-serif;
        font-weight: 500 !important;
        color: #FBA300;
    }

    .footer .footer-tengah {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        flex-wrap: wrap;
        margin-left: 150px;
    }

    .footer .footer-tengah .tengah-link {
        min-width: 150px;
    }

    .footer .footer-tengah h4, .footer .footer-kanan h4 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .footer .footer-tengah ul, .footer .footer-kanan ul {
        list-style-type: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .footer .footer-tengah ul li, .footer .footer-kanan ul li {
        margin-bottom: 4px;
        padding-left: 10px;
    }

    .footer-kanan {
        padding: 0px 30px;
        text-align: left;
    }

    .footer .footer-tengah ul li a, .footer .footer-kanan ul li a {
    color: #ffffff;
    text-decoration: none;
    font-size: 10.5pt;
    display: inline-block; /* Mengubah elemen menjadi inline-block agar transformasi bekerja */
    transition: color 0.3s ease-in-out, transform 0.3s ease-in-out; /* Menambahkan transisi untuk transform */
    }

    .footer .footer-tengah ul li a:hover, .footer .footer-kanan ul li a:hover {
        color: #FBA300;
        transform: translateX(5px);
    }


    .copyright-section {
        border-top: 1px solid #ffffff;
        padding-top: 20px;
        text-align: center;
        font-size: 0.875rem;
        color: #ffffff;
        background-color: #151824;
        padding: 10px 0;
    }

    @media (max-width: 768px) {
        .footer p {
            font-size: 10pt;
        }
        .footer {
            flex-direction: column;
            text-align: center;
            padding: 30px 5px 10px 5px;
        }

        .footer-kiri {
            padding: 0px 30px;
        }

        .footer .footer-kiri, .footer .footer-tengah, .footer .footer-kanan {
            justify-content: center;
            text-align: center;
            align-items: center;
            width: 100%;
            margin: 0%;
            margin-bottom: 30px;
        }

        .social-icons {
            justify-content: center;
        }

        .footer .footer-tengah {
            justify-content: center;
        }
    }
</style>

<footer>
    <div class="footer">
        <div class="footer-kiri">
            <img src="{{ asset('img/logo-2.png') }}?v={{ time() }}"  alt="Logo">
            <p>
                UKM CYBER bergerak dibiang IT , Untuk saat ini sedang berfokus dibidang web programming, kami menjembatani bagi para mahasiswa yang ingin belajar lebih lanjut untuk mengembangkan skil coding.
            </p>
            <ul class="social-icons">
                <li><a href="https://github.com/Cyber-STMIK-Amikom-Surakarta " target="_blank"><i class="fab fa-github"></i></a></li>
                <li><a href="https://www.youtube.com/@cyberamikom" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://www.instagram.com/ukm_cyber/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://discord.com/invite/yTve7S2tnJ?fbclid=PAAaYyZyulfLRCRljaYO4MnJf2JbcPwONDpUukY2BiMOywb0I52ajaBFYzRqw_aem_AXYeO0-Xnw6MfF1raEO8m2fIdTlst2INnxdXkuB9myTbCQfqcbTUvLrMz8o4P_l-tMg" target="_blank"><i class="fab fa-discord"></i></a></li>
                <li><a href="mailto:cyberamikomska@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a></li>
            </ul>
        </div>

        <div class="footer-tengah">
            <div class="tengah-link">
                <h4>Highlight</h4>
                <ul>
                    <li><a href="#home">Berita</a></li>
                    <li><a href="#about">Lomba</a></li>
                    <li><a href="#services">Mini Project</a></li>
                    <li><a href="#contact">Galeri</a></li>
                </ul>
            </div>
            <div class="tengah-link">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">Artikel</a></li>
                    <li><a href="#services">Showcase</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-kanan">
            <h4>Narahubung</h4>
            <ul class="mb-3">
                <li>Ketua _ <a href="https://wa.me/6281387584175" target="_blank"> <i class="fab fa-whatsapp"> </i>  0813 8758 4175</a></li>
                <li>Humas _ <a href="https://wa.me/6285713457076" target="_blank"> <i class="fab fa-whatsapp"> </i>  0857 1345 7076</a></li>
            </ul>
            <h4>Sekretariat</h4>
            <p>
                Ruang Sekretariat UKM Cyber <br>
                Jl. Veteran, Dusun I, Singopuran, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57163
            </p>
        </div>
    </div>

    <div class="copyright-section">
        &copy; UKM CYBER   ||   Never Stop Learning.
    </div>
</footer>
