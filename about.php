<?php
session_start();
?>

<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About Daur Ulang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: white;
            font-family: Arial, sans-serif;
        }

        .content-wrapper {
            flex: 1 0 auto;
        }

        .btn-download {
            background: linear-gradient(to right, #2f6f4e, #3e8f65);
            color: white;
            border-radius: 1rem;
            padding: 0.5rem 1rem;
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
        }

        .btn-download:hover {
            background: linear-gradient(to right, #3e8f65, #5ab678);
            color: white;
        }

        .navbar {
            padding-top: 0.3rem;
            padding-bottom: 0.3rem;
        }

        .navbar-brand img {
            height: 36px;
        }

        .navbar-nav .nav-link {
            font-size: 1.2rem;
        }

        @font-face {
            font-family: font1;
            src: url("BlackCloverFont.ttf");
        }

        @font-face {
            font-family: font2;
            src: url(Beauty\ Sunny.otf);
        }

        .navbar-nav .nav-link.font1 {
            font-family: font1;
            font-size: 35px;
            line-height: 1;
            padding-top: 0.2rem;
            padding-bottom: 0.2rem;
        }

        .text-green {
            color: #2f6f4e !important;
            font-weight: 600;
        }

        .text-green:hover {
            color: #3e8f65 !important;
        }

        .hero-section {
            min-height: 100vh;
            background-image: url('about1.jpg');
            /* Ganti dengan nama gambar kamu */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .footer-section a:hover {
            color: #ffc107 !important;
            text-decoration: underline;
        }

        .display-5 {
            font-family: font2;
        }

        .lead {
            font-family: sans-serif;
            font-size: x-large;
        }

        /* Section sejarah & latar belakang */
        .section-history-bg {
            padding: 60px 15px;
            background-color: #212529;
            color: #eee;
        }

        .section-row {
            margin-bottom: 60px;
        }

        /* Buat flex container agar teks dan gambar sejajar vertikal */
        .row.align-items-center {
            display: flex;
            flex-wrap: wrap;
        }

        /* Membalik posisi konten pada baris ke-2 */
        .reverse-row {
            flex-direction: row-reverse;
        }

        /* Baris kedua sudah ditukar posisinya, jadi buat class baru agar tidak confusion */
        .reverse-row-updated {
            flex-direction: row-reverse !important;
            /* Tukar posisi: gambar kiri, teks kanan */
        }

        .section-text {
            padding: 20px;
        }

        .section-text h2 {
            font-family: 'Arial Black', Arial, sans-serif;
            font-size: 2.5rem;
            /* lebih besar */
            margin-bottom: 20px;
            color: #2f6f4e;
            /* hijau tua natural */
        }

        .content-wrapper img {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgb(0 0 0 / 0.0);
            max-width: 100%;
            height: auto;
        }

        .section-text p {
            font-size: 1.4rem;

        }

        .section-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Bulatan gambar lebih besar dan warna border hijau */
        .img-circle {
            width: 310px;
            /* lebih besar */
            height: 310px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #2f6f4e;
            box-shadow: 0 0 20px #2f6f4eaa;
        }

        /* Responsive: di hp gambar dan teks full bawah atas */
        @media (max-width: 767px) {

            .row.align-items-center,
            .reverse-row,
            .reverse-row-updated {
                flex-direction: column !important;
            }

            .section-text,
            .section-image {
                max-width: 100%;
                padding: 10px 0;
                text-align: center;
            }

            .section-text p {
                max-width: 100%;
            }
        }

        .section-purpose-fullscreen {
            height: 100vh;
            position: relative;
            overflow: hidden;
            display: block;
            /* ubah dari d-flex agar tidak centering */
        }

        .content {
            position: absolute;
            left: 20px;
            /* jarak dari kiri */
            bottom: 20px;
            /* jarak dari bawah */
            z-index: 2;
            max-width: 40%;
            /* agar teks tidak terlalu melebar */
            text-align: left;
        }

        .lead {
            font-family: sans-serif;
            font-size: x-large;
            color: white;
            text-align: left;
            /* pastikan teks tetap terlihat */
        }

        .bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: 0;
            transform: none;
        }

        .section-founder-bg {
            height: 100vh;
            background-color: #212529;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        .section-founder-bg .container {
            padding-top: 30px;
        }

        .section-founder-bg .row {
            justify-content: center;
            gap: 60px;
            /* ubah nilai sesuai kebutuhan */
        }

        .section-founder-bg h4 {
            font-size: 1.8rem;
            /* Nama founder */
        }

        .section-founder-bg p {
            font-size: 1.2rem;
            line-height: 1.6;
            /* Deskripsi founder */
        }

        .section-founder-bg small {
            font-size: 1.05rem;
            /* Tulisan kecil yang agak diperbesar */
        }
    </style>
</head>

<body class="bg-dark text-light">
    <div class="content-wrapper">

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark px-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="logo.jpg" alt="Logo" style="height: 80px;">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link text-green font1" href="homepage.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link text-green" href="type.php">Type</a></li>
                        <li class="nav-item"><a class="nav-link text-green" href="how.php">How</a></li>
                        <li class="nav-item"><a class="nav-link text-green" href="worlds.php"><i
                                    class="bi bi-box-arrow-up-right"></i> Worlds</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-green" href="#" role="button"
                                data-bs-toggle="dropdown">More</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="funny_news.html">Option 1</a></li>
                                <li><a class="dropdown-item" href="funny_news2.html">Option 2</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center gap-3">
                        <?php if (isset($_SESSION['username'])): ?>
                            <span class="text-light">👤 <?= htmlspecialchars($_SESSION['username']); ?></span>
                            <a href="logout.php" class="btn btn-sm btn-outline-light ms-2">Logout</a>

                        <?php elseif (isset($_SESSION['guest']) && $_SESSION['guest'] === true): ?>
                            <span class="text-light">👤 Tamu</span>
                            <a href="index.php" class="btn btn-sm btn-outline-light ms-2">Login</a>

                        <?php else: ?>
                            <a href="index.php" class="text-light text-decoration-none">Login</a>
                            <i class="bi bi-person-circle fs-4 text-light"></i>
                        <?php endif; ?>

                        <a href="donasi.php" class="btn btn-download">Donate Now</a>
                    </div>



                </div>
            </div>
        </nav>

        <!-- Fullscreen Section: Logo, Founder, dan Kata-Kata -->
        <section class="section-founder-bg">
            <!-- Logo -->
            <div class="mb-4">
                <img src="logo.jpg" alt="Logo" style="width: 200px; height: 200px; object-fit: cover;" />
            </div>

            <!-- Founder -->
            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <h4 class="fw-bold">Founder 1</h4>
                        <p>Ade Nugraha<br><small class="text-muted text-white-50">Spesialis dalam pengembangan teknologi ramah lingkungan dan penggagas ide.</small></p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h4 class="fw-bold">Founder 2</h4>
                        <p>Muhammad Ikram Mughni<br><small class="text-muted text-white-50">Ahli strategi digital dengan fokus pada edukasi daur ulang dan inovasi sosial.</small></p>
                    </div>
                </div>
            </div>

            <!-- Kata-kata -->
            <div style="display: flex; justify-content: center;">
                <p class="lead px-3 text-center" style="max-width: 800px;">
                    "Bersama kita ciptakan dunia yang lebih bersih dan berkelanjutan melalui daur ulang."
                </p>
            </div>

        </section>



        <!-- Hero Section: Gambar Visi Misi -->
        <section class="hero-section">
            <!-- Kosong karena gambar sudah visual penuh -->
        </section>

        <!-- Sejarah dan Latar Belakang -->
        <section class="section-history-bg">
            <div class="container">
                <!-- Baris 1: Teks kiri, gambar kanan -->
                <div class="row align-items-center section-row">
                    <div class="col-md-6 section-text">
                        <h2>Sejarah Daur Ulang</h2>
                        <p>
                            Daur ulang telah ada sejak ribuan tahun lalu, dimulai dengan manusia kuno yang memanfaatkan kembali bahan-bahan untuk kebutuhan sehari-hari. Seiring perkembangan zaman, metode daur ulang semakin maju dan menjadi bagian penting dalam menjaga keberlanjutan lingkungan dan mengurangi limbah.
                        </p>
                    </div>
                    <div class="col-md-6 section-image">
                        <img src="about2.jpg" alt="Sejarah Daur Ulang" class="img-circle" />
                    </div>
                </div>

                <!-- Baris 2: Teks kiri, gambar kanan (tukar posisi & pakai class khusus) -->
                <div class="row align-items-center section-row reverse-row-updated">
                    <div class="col-md-6 section-text">
                        <h2>Latar Belakang</h2>
                        <p>
                            Daur ulang menjadi kebutuhan mendesak di era modern ini karena meningkatnya volume sampah dan dampak negatifnya terhadap lingkungan. Kesadaran akan pentingnya pengelolaan sampah yang baik dan upaya mengurangi polusi membuat daur ulang menjadi solusi efektif untuk menjaga bumi tetap lestari.
                        </p>
                    </div>
                    <div class="col-md-6 section-image">
                        <img src="about3.jpg" alt="Latar Belakang Daur Ulang" class="img-circle" />
                    </div>
                </div>
            </div>
        </section>

        <section class="section-purpose-fullscreen position-relative text-light d-flex justify-content-center align-items-center">
            <video autoplay muted loop playsinline class="bg-video">
                <source src="about4.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
            <div class="overlay"></div>
            <div class="content container text-center p-4 rounded" style="background-color: rgba(33, 37, 41, 0.8); max-width: 800px;">
                <p class="lead px-3" style="margin: 0;">
                    Website ini dibuat untuk meningkatkan kesadaran masyarakat tentang pentingnya daur ulang, memberikan informasi yang mudah dipahami, serta mengajak semua orang berkontribusi menjaga lingkungan demi masa depan yang lebih baik.
                </p>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-black text-white py-10">
            <div class="max-w-6xl mx-auto px-4 text-center">

                <!-- Logo dan Nama Perusahaan -->
                <div class="mb-4">
                    <h2 class="text-2xl font-bold tracking-wider">A&I RECYCLE</h2>
                    <p class="text-sm text-gray-400">Green Innovation for a Better Tomorrow</p>
                </div>

                <!-- Link Informasi -->
                <div class="text-sm space-x-4 text-gray-300 mb-4">
                    <a href="privacy_policy.html" class="hover:text-green-400">Privacy Policy</a>
                    <a href="terms_of_service.html" class="hover:text-green-400">Terms of Service</a>
                    <a href="enviroment_guidelines.html" class="hover:text-green-400">Environmental Guidelines</a>
                </div>

                <!-- Sosial Media Icons -->
                <div class="flex justify-center mb-6 ig-links">
                    <a href="https://instagram.com/andy_sinn66" class="text-xl text-white hover:text-green-400"
                        target="_blank" rel="noopener">
                        <i class="fab fa-instagram"></i> @andy_sinn66
                    </a>
                    <a href="https://instagram.com/ikram_mughni.11" class="text-xl text-white hover:text-green-400" target="_blank"
                        rel="noopener">
                        <i class="fab fa-instagram"></i> @ikram_mughni.11
                    </a>
                </div>

                <!-- Copyright -->
                <p class="text-xs text-gray-500 mt-2">&copy; 2025 A&I Recycle. All Rights Reserved. A&I Recycle is a
                    registered trademark of A&I Group.</p>

                <!-- Waktu -->
                <div class="mt-4 text-sm text-gray-400 flex justify-center space-x-6">
                    <span><strong>UTC:</strong> 2025.05.24 07:23:12</span>
                    <span><strong>WIB:</strong> 2025.05.24 14:23:12</span>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>