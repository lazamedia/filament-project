@extends('layouts.mains')

@section('content')
    

<style>
    h4{
        font-size: 17px;
    }
    h3{
        font-size: 25px;
        margin: 0%;
    }
/* Hero */
    .hero{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh;
    }
    .hero-box{
        width: 50%;
        padding: 50px;
        box-sizing: border-box;
    }
    .hero-content{
        text-align: left;
        margin-left: 70px;
    }
    .hero-content h4{
        font-size: 14px;
    }
    .hero-content h1{
        font-size: 32px;
        font-weight: bold;
    }
    .hero-content p{
        margin-top: 10px;
        font-size: 15px;
    }
    .hero-img{
        text-align: center;
    }
    .hero-img img{
        width: 85%;
        margin: auto;
        object-fit: contain;
    }
    .btn-umum{
        margin-top: 10px;
        padding: 5px 15px;
        font-size: 14px;
        border-radius: 5px;
        background-color: #FBA300;
        border: 1px solid #FBA300;
        transition: all 0.3s ease-in-out;
        color: #0F0B22;
        text-decoration: none;
        display: inline-block;
    }
    .btn-umum:hover{
        background-color: #0F0B22;
        color: #FBA300;
        border: 1px solid #FBA300;
    }
    @media (max-width: 768px) {
        .hero{
            flex-direction: column;
            margin-top: 70px;
        }
        .hero-box{
            width: 100%;
        }
        .hero-content{
            margin: 0%;
        }
        .hero-img{
            order: -1;
            align-items: center;
            align-content: center;
            padding: 10px
        }
    }
/* End */
/* About */
    .about{
        width: 100%;
        height: 70vh;
        margin-bottom: 50px;
    }
    .header-about{
        text-align: center;
        margin-top: 50px;
    }
    .c-about{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card-about{
        width: 250px;
        height: 220px;
        margin: 10px;
        padding: 10px;
        border-radius: 10px;
        background-color: #141B29;
        color: #ffffff;
        text-align: left;
        transition: all 0.3s ease-in-out;
        border: 1px solid #5B5A59;
        backdrop-filter: blur(10px);
        padding: 20px;
        margin-top: 50px;
    }
    .card-about:hover{
        border-color: #FBA300;
        transform: scale(1.02);
        transition: 0.4s;

    }
    .ch-about{
        width: 100%;
        display: flex;
        gap: 20px;
        align-content: center;
        align-items: center;
        margin-bottom: 10px;
    }
    .ch-about h3 {
        font-size: 18px;
    }
    .card-about p {
        margin-top: 20px;
        font-size: 14px;
    }
    @media (max-width : 789px){
        .about{
            height: auto;
        }
        .card-about{
            width: 100%;
            margin: 20px 0 0 0;
            height: auto;
        }
        .c-about{
            flex-direction: column;
            padding: 25px;
        }
    }
/* End */
/* Sekilas Info */
    .sekilas{
        width: 90%;
        margin: auto;
        height: auto;
        display: flex;
        margin-bottom: 150px;
    }
    .b-r{
        width: 50%;
    }
    .sekilas-kanan p{
        margin-top: 20px ;
        font-size: 11pt;
    }
    .sekilas-kanan{
        align-items: center;
        align-content: center;
        padding-right: 50px;
    }
    .sekilas-kiri{
        text-align: center;
    }
    .sekilas-kiri img {
        width: 370px;
        margin: auto;
    }
    @media (max-width : 789px){
        .sekilas{
            flex-direction: column;
        }
        .sekilas-kiri{
            margin-bottom: 30px;
        }
        .b-r{
            width: 100%;
        }
    }
/* End */
/* Program UKM */
    .program{
        width: 100%;
        min-height: 80vh;
        margin-bottom: 50px;
    }
    .header-program{
        text-align: center;
        margin-top: 50px;
    }
    .c-program{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
        gap: 30px;
    }
    .card-program{
        width: 250px;
        height: 250px;
        border-radius: 5px;
        border: 1px solid #5B5A59;
        background-color: #141B29;
        text-decoration: none;
        transition: ease-in-out 0.3s;
    }
    .card-program:hover{
        box-shadow: 0 0 5px #141B29;
        border: 1px solid #FBA300;
        transform: scale(1.02);
        transition: ease-in-out 0.3s;
    }
    .card-program img {
        width: 100%;
    }
    .desc{
        padding: 20px;
        margin: auto;
    }
    .desc h3 {
        font-size: 15px;
        font-weight: 400;
        margin: 0;
        color: #ffffff;
    }
    .desc p{
        font-size: 11px;
        margin-top: 10px;
        color: #d6d4d3;
    }
    @media(max-width:780px){
        .c-program {
            flex-wrap: wrap;
        }
    }
/* End */
</style>


<section class="hero">
    <div class="hero-content hero-box">
        <h4>Welcome Dear</h4>
        <h1><font style="color: #FBA300"> NGOBAR </font> WITH <br>
            <font style="color: #FBA300"> UKM CYBER </font> STMIK AMIKOM</h1>
        <p>
            Di UKM Cyber, kita belajar mulai dari awal untuk mengenal apa itu program,
            bagaimana cara kerja program, serta bagaimana cara menggunakannya.
        </p>
        <a href="#" class="btn-umum">Join Sekarang</a>
    </div>
    <div class="hero-img hero-box">
        <img src="{{ asset('img/hero.png') }}" alt="Hero Image">
    </div>
</section>

<section class="about">
    <div class="header-about">
        <h4><font style="color: #FBA300">About</font> Us</h4>
        <h3>Kegiatan <font style="color: #FBA300">UKM Cyber</font></h3>
    </div>
    <div class="c-about">
        <div class="card-about">
            <div class="ch-about">
                <i class="bi bi-journal-bookmark"></i>
                <h3>Pertemuan Rutin</h3>
            </div>
            <P>
                Cyber mengadakan pertemuan rutin untuk membernya sekali selama seminggu, dalam setiam pertemuan belajar mengenai pemrograman dan juga sharing.
            </P>
        </div>
        <div class="card-about">
            <div class="ch-about">
                <i class="bi bi-megaphone"></i>
                <h3>Cyber Care</h3>
            </div>
            <P>
                Kami mensuport member jika ingin mengikuti ajang lomba yang memerlukan biaya ataupun butuh bantuan untuk lomba tersebut.
            </P>
        </div>
        <div class="card-about">
            <div class="ch-about">
                <i class="bi bi-discord"></i>
                <h3>Discord Sharing</h3>
            </div>
            <P>
                Dalam discord kami tersedia ruang terbuka untuk mengobrol satu sama lain , bisa untuk sharing tugas, bahkan kadang bisa nobar bareng kalo ada event tertentu.
            </P>
        </div>
        <div class="card-about">
            <div class="ch-about">
                <i class="bi bi-boxes"></i>
                <h3>Mini Bootcamp</h3>
            </div>
            <P>
                Dalam web cyber kami menyediakan materi untuk user yang mau belajar mengenai web development dari awal sampai bisa, dan juga tersedia youtube ukm cyber
            </P>
        </div>
    </div>
</section>

<section class="sekilas">
    <div class="sekilas-kiri b-r">
        <img src="{{ asset('img/bundle.png') }}" alt="">
    </div>
    <div class="sekilas-kanan b-r">
        <h4>Sekilas Info</h4>
        <h3> <font style="color: #FBA300">Sejarah Singkat</font>  Kami</h3>
        <p>
            Unit Kegiatan Mahasiswa (UKM) Cyber STMIK AMIKOM Surakarta bergerak dibidang Teknologi Informasi (IT) yang berdiri sejak tahun 2007. Kegiatan pada UKM Cyber berupa sharing ilmu pengetahuan tentang IT seperti Hardware (Perakitan, Troubleshooting, dan Jaringan) dan Software (Instalasi Program dan Pembuatan Program).
            <br><br>
            Jangan ragu untuk hubngi kami tentang apapun mengenai ukm cyber :)
        </p>

        <a href="#" class="btn-umum">Hubungi Kami</a>
    </div>
</section>

<section class="program">
    <div class="header-program">
        <h4><font style="color:#FBA300;">Keseruan</font> Kami</h4>
        <h3><font style="color: #FBA300;">Program </font>UKM CYBER</h3>
    </div>
    <div class="c-program">
        <a href="#" class="card-program">
            <img src="{{ asset('img/udb.JPG') }}" alt="">
            <div class="desc">
                <h3>Lomba UCDC Competition Using Figma</h3>
                <p>20 Januari 2024</p>
            </div>
        </a>
        <a href="#" class="card-program">
            <img src="{{ asset('img/udb.JPG') }}" alt="">
            <div class="desc">
                <h3>Lomba UCDC Competition Using Figma</h3>
                <p>20 Januari 2024</p>
            </div>
        </a>
        <a href="#" class="card-program">
            <img src="{{ asset('img/udb.JPG') }}" alt="">
            <div class="desc">
                <h3>Lomba UCDC Competition Using Figma</h3>
                <p>20 Januari 2024</p>
            </div>
        </a>
    </div>
</section>

@endsection