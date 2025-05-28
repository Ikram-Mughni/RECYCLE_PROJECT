<?php
session_start();
?>

<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Type Daur Ulang</title>
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

        .content-wrapper img {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgb(0 0 0 / 0.0);
            max-width: 100%;
            height: auto;
        }

        @font-face {
            font-family: font1;
            src: url("BlackCloverFont.ttf");
        }

        @font-face {
            font-family: font2;
            src: url("Beauty Sunny.otf");
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

        /* ----- Bagian khusus TYPE ----- */

        .section-history-bg {
            background-color: #212529;
            padding: 60px 0;
            color: white;
        }

        .section-history-bg .container {
            max-width: 1140px;
        }

        .section-row {
            display: flex;
            align-items: center;
            gap: 40px;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }

        .section-row.reverse-row-updated {
            flex-direction: row-reverse;
        }

        .section-image {
            flex: 1 1 45%;
            text-align: center;
        }

        .section-image img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #2f6f4e;
            box-shadow: 0 0 15px #2f6f4e;
            display: block;
            /* tambahan */
        }

        .section-text {
            flex: 1 1 45%;
            font-family: Arial, sans-serif;
        }

        .section-text h2 {
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #2f6f4e;
            text-shadow: 1px 1px 2px #000;
        }

        .section-text p {
            font-size: 1.25rem;
            line-height: 1.6;
            color: #ddd;
        }

        .text-dark-green {
            color: #2f6f4e;
        }

        /* Responsive */
        @media (max-width: 768px) {

            .section-row,
            .section-row.reverse-row-updated {
                flex-direction: column !important;
            }

            .section-image,
            .section-text {
                flex: 1 1 100%;
            }

            .section-image img {
                width: 250px;
                height: 250px;
            }

            .section-text h2 {
                font-size: 1.8rem;
            }

            .section-text p {
                font-size: 1.1rem;
            }
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
                        <li class="nav-item"><a class="nav-link text-green" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="type.php">Type</a></li>
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

        <section class="text-center py-5" style="margin-top: 100px;">
            <div class="container">
                <h1 class="display-4 fw-bold text-dark-green">Mengenal 5 Jenis Sampah di Sekitar Kita</h1>
                <p class="lead">Pelajari jenis-jenis sampah yang sering kita temui agar lebih bijak dalam memilah dan mengelolanya.</p>
            </div>
        </section>


        <!-- Type 1 -->
        <section class="section-history-bg">
            <div class="container">
                <div class="row align-items-center section-row">
                    <div class="col-md-6 section-image">
                        <img src="type1.jpg" alt="Elemental Magic">
                    </div>
                    <div class="col-md-6 section-text">
                        <h2>Sampah Organik</h2>
                        <p>Sampah organik adalah sampah yang berasal dari makhluk hidup dan mudah terurai secara alami. Contohnya seperti sisa makanan, daun kering, dan kulit buah.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Type 2 -->
        <section class="section-history-bg">
            <div class="container">
                <div class="row align-items-center section-row reverse-row-updated">
                    <div class="col-md-6 section-image">
                        <img src="type2.jpg" alt="Shadow Arts" class="img-circle">
                    </div>
                    <div class="col-md-6 section-text">
                        <h2>Sampah Anorganik</h2>
                        <p>Sampah anorganik berasal dari bahan non-alami yang sulit terurai. Contohnya termasuk plastik, logam, kaca, dan kaleng bekas.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Type 3 -->
        <section class="section-history-bg">
            <div class="container">
                <div class="row align-items-center section-row">
                    <div class="col-md-6 section-image">
                        <img src="type3.jpg" alt="Healing Light" class="img-circle">
                    </div>
                    <div class="col-md-6 section-text">
                        <h2>Sampah B3 (Bahan Berbahaya dan Beracun)</h2>
                        <p>Sampah B3 mengandung zat berbahaya bagi kesehatan manusia dan lingkungan. Contohnya seperti baterai, pestisida, dan limbah medis.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Type 4 -->
        <section class="section-history-bg">
            <div class="container">
                <div class="row align-items-center section-row reverse-row-updated">
                    <div class="col-md-6 section-image">
                        <img src="type4.jpg" alt="Time Bending" class="img-circle">
                    </div>
                    <div class="col-md-6 section-text">
                        <h2>Sampah Kertas</h2>
                        <p>Sampah kertas berasal dari bahan berbasis serat seperti koran, kardus, dan buku bekas. Jenis ini mudah didaur ulang jika tidak tercampur bahan lain.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Type 5 -->
        <section class="section-history-bg">
            <div class="container">
                <div class="row align-items-center section-row">
                    <div class="col-md-6 section-image">
                        <img src="type5.jpg" alt="Beast Summoning" class="img-circle">
                    </div>
                    <div class="col-md-6 section-text">
                        <h2>Sampah Residu</h2>
                        <p>Sampah residu adalah sampah yang tidak bisa didaur ulang maupun terurai secara alami. Contohnya seperti popok, pembalut, dan styrofoam kotor.</p>
                    </div>
                </div>
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