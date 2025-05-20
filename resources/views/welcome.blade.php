@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>NgajiDek</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,700,900" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/icofont.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jQuery.verticalCarousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body class="loading">
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-3 col-xs-12">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('img/logongajidek2.png') }}" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <div class="menu">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#">Course</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">About Us</a></li>
                            </ul>
    <div class="sign_up">
        @guest
            <p><a href="{{ route('login') }}">Login</a></p>
        @else
            <p><a href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
              </a>
            </p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="text">
                            <h3>Ngajidek - Platform Belajar Mengaji Al-Qur'an Secara Online, Mudah & Terarah</h3>
                            <h6>Belajar Mengaji Online dengan Ustadz/Ustadzah Berpengalaman dari Mana Saja!</h6>
                            <a class="button" href="#">Explore</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--<div class="header_video">
                            <iframe src="https://www.youtube.com/embed/3mRgp5mNvQk?si=poT5TLWJuLgZsIvp" frameborder="0" allowfullscreen></iframe>
                        </div>-->
                    </div>
                </div>
            </div>
        </header>

        <section class="project">
            <div class="text">
                <h2>Mau Mahir Membaca Al-Qur'an dengan Mudah?</h2>
                <h4>Mulai Sekarang dengan Ngajidek!</h4>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 project_icon">
                        <div class="single_project">
                            <i class="icofont icofont-book"></i>
                            <h3><a href="#">Ingin belajar Al-Qur'an dengan metode yang lebih fleksibel dan terarah</a></h3>
                        </div>
                    </div>
                    <div class="col-md-4 project_icon">
                        <div class="single_project">
                            <i class="icofont icofont-teacher"></i>
                            <h3><a href="#"> Bingung mencari guru mengaji yang sesuai dengan kebutuhan Anda?</a></h3>
                        </div>
                    </div>
                    <div class="col-md-4 project_icon">
                        <div class="single_project">
                            <i class="icofont icofont-light-bulb"></i>
                            <h3><a href="#">Ngajidek hadir untuk membantu Anda belajar mengaji dari nol hingga mahir!</a></h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="button"><a class="button" href="#services">Get Started</a></p>
                    </div>
                </div>
            </div>
        </section>
        <section id="services" class="services">
            <div class="text">
                <h2>Apa itu Ngajidek?</h2>
                <h3>Ngajidek adalah platform belajar mengaji Al-Qur'an secara online yang menghubungkan santri dengan ustadz dan ustadzah berpengalaman. Dengan metode interaktif, personal, dan fleksibel, Ngajidek hadir untuk semua kalangan, dari anak-anak hingga dewasa.</h3>
            </div>
        </section>

<section class="services py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Kolom Gambar -->
            <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('img/ilustrasi.jpg') }}" alt="image" class="img-fluid" style="max-width: 80%;">
            </div>
            <!-- Kolom Teks -->
            <div class="col-lg-6">
                <h2 class="text">Mengapa Memilih NgajiDek?</h2>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success me-3" style="font-size: 2.2rem;"></i>
                        <h4>Kelas privat dan interaktif</h4>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success me-3" style="font-size: 2.2rem;"></i>
                        <h4>Jadwal fleksibel sesuai kebutuhan</h4>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success me-3" style="font-size: 2.2rem;"></i>
                        <h4>Pengajar profesional dan bersertifikat</h4>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success me-3" style="font-size: 2.2rem;"></i>
                        <h4>Kurikulum lengkap mulai dari Iqra', Tajwid, hingga Tahfidz</h4>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="fas fa-check-circle text-success me-3" style="font-size: 2.2rem;"></i>
                        <h4>Biaya terjangkau dengan berbagai pilihan paket</h4>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-primary text-uppercase">Pricing Plans Private</h2>
                <h4 class="mb-0">Biaya Terjangkau dengan Berbagai Pilihan Paket</h4>
            </div>
            <div class="row g-0">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Paket Basic</h4>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                Rp 275.000<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ 4 Sesi</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>Kelas Privat</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Materi Dasar</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Jadwal Fleksibel</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Rekaman Kelas</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <a href="javascript:void(0);" class="btn btn-primary py-2 px-4 mt-4 daftar-sekarang" data-package="Paket Basic" data-amount="50000" data-class="1">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Paket Standar</h4>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                Rp 500.000<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ 8 Sesi</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>Kelas Privat</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Materi Dasar & Lanjutan</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Jadwal Fleksibel</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Rekaman Kelas</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <a href="javascript:void(0);" class="btn btn-primary py-2 px-4 mt-4 daftar-sekarang" data-package="Paket Standar" data-amount="100000" data-class="2">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Paket Premium</h4>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                Rp 600.000<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ 12 Sesi</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>Kelas Privat</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Materi Lengkap</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Jadwal Fleksibel</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Rekaman Kelas</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <a href="javascript:void(0);" class="btn btn-primary py-2 px-4 mt-4 daftar-sekarang" data-package="Paket Premium" data-amount="150000" data-class="3">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->

        <!-- Pricing Plan Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-primary text-uppercase">Pricing Plans Kelompok</h2>
                <h4 class="mb-0">Biaya Terjangkau dengan Berbagai Pilihan Paket</h4>
            </div>
            <div class="row g-0">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Paket Basic</h4>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                Rp 225.000<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ 4 Sesi</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>Kelas Privat</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Kelompok 4-5 Orang</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Materi Dasar</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Jadwal Fleksibel</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Rekaman Kelas</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <a href="javascript:void(0);" class="btn btn-primary py-2 px-4 mt-4 daftar-sekarang" data-package="Paket Basic" data-amount="50000" data-class="1">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Paket Standar</h4>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                Rp 450.000<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ 8 Sesi</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>Kelas Privat</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Kelompok 4-5 Orang</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Materi Dasar & Lanjutan</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Jadwal Fleksibel</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Rekaman Kelas</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <a href="javascript:void(0);" class="btn btn-primary py-2 px-4 mt-4 daftar-sekarang" data-package="Paket Standar" data-amount="100000" data-class="2">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">Paket Premium</h4>
                        </div>
                        <div class="p-5 pt-0">
                            <h1 class="display-5 mb-3">
                                Rp 550.000<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ 12 Sesi</small>
                            </h1>
                            <div class="d-flex justify-content-between mb-3"><span>Kelas Privat</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Kelompok 4-5 Orang</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Materi Lengkap</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Jadwal Fleksibel</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <div class="d-flex justify-content-between mb-3"><span>Rekaman Kelas</span><i class="fa fa-check text-primary pt-1"></i></div>
                            <a href="javascript:void(0);" class="btn btn-primary py-2 px-4 mt-4 daftar-sekarang" data-package="Paket Premium" data-amount="150000" data-class="3">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->


<!-- WhatsApp CTA Button -->
<div class="whatsapp-cta">
    <a href="https://wa.me/+6285194934525?text=Halo%20NgajiDek!%20Saya%20ingin%20bertanya%20tentang%20program%20belajar." class="whatsapp-button">
        <img src="{{ asset('img/icons8-whatsapp.gif') }}" alt="WhatsApp" class="whatsapp-icon" />
        Chat with Us
    </a>
</div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="footer-logo">
                            <a href="#"><img src="{{ asset('img/logongajidek2.png') }}" alt="Site Logo" /></a>
                        </div>
                        <div class="footer_first_menu">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="footer_last_menu">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Service</a></li>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="footer_last_icon">
                                    <p>
                                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-tiktok" aria-hidden="true"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
document.querySelectorAll('.daftar-sekarang').forEach(button => {
    button.addEventListener('click', function() {
        console.log("Tombol diklik!"); // Cek apakah event listener berjalan

        let paket = this.getAttribute('data-package');
        let harga = this.getAttribute('data-amount');
        let classId = this.getAttribute('data-class');

        console.log("Mengirim request dengan data:", { paket, harga, classId }); // Debugging

fetch(`/payment/${classId}`, {
    method: "POST",
    headers: {
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        "Content-Type": "application/json"
    },
    body: JSON.stringify({ amount: harga, package: paket })
})
.then(response => response.text()) // Ubah ke .text() dulu
.then(text => {
    console.log("Respon mentah dari server:", text); // Debugging
    return JSON.parse(text); // Coba parse ke JSON manual
})
.then(data => {
    console.log("Respon dari server (JSON parsed):", data);
    if (data.snap_token) {
        window.snap.pay(data.snap_token);
    } else {
        alert("Terjadi kesalahan saat memproses pembayaran.");
    }
})
.catch(error => console.error("Error dalam fetch:", error));

    });
});


    </script>
</body>


    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('js/jQuery.verticalCarousel.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>
</body>
</html>
@endsection
