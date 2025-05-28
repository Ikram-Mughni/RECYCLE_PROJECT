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
            background-color: #212529;
            color: white;
            font-family: Arial, sans-serif;
        }

        .content-wrapper {
            min-height: 100vh;
            padding-top: 90px;
            padding-bottom: 60px;
            background-color: rgb(2, 66, 41);
        }

        .content-wrapper img {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgb(0 0 0 / 0.0);
            max-width: 100%;
            height: auto;
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
                        <li class="nav-item"><a class="nav-link text-green" href="type.php">Type</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="how.php">How</a></li>
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

        <div class="container my-5">
            <h2 class="text-center fw-bold text-uppercase text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                Tata Cara Mendaur Ulang
            </h2>
            <div class="mb-5"></div>

            <div class="mb-5"></div>
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-dark text-light h-100 shadow-sm">
                        <img src="how1.jpg" class="card-img-top" alt="Sampah Organik" style="border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title fs-4 fw-semibold mb-3">Sampah Organik</h5>
                            <p class="card-text fs-6">
                                Cara Daur Ulang:<br>
                                Pisahkan dari jenis sampah lain. Cacah sampah seperti sisa makanan, sayur, dan daun. Simpan di wadah kompos dengan ventilasi. Aduk secara berkala dan jaga kelembapan. Setelah 3-4 minggu, hasilkan pupuk kompos alami yang siap digunakan untuk tanaman.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-dark text-light h-100 shadow-sm">
                        <img src="how2.jpg" class="card-img-top" alt="Sampah Anorganik" style="border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title fs-4 fw-semibold mb-3">Sampah Anorganik</h5>
                            <p class="card-text fs-6">
                                Cara Daur Ulang: <br>
                                Pisahkan sampah seperti plastik, logam, dan kaca. Cuci bersih untuk menghindari kontaminasi. Keringkan, lalu pilah berdasarkan jenis (misalnya PET, HDPE, aluminium). Kumpulkan dalam karung atau wadah khusus. Serahkan ke bank sampah atau tempat daur ulang terdekat agar bisa diproses menjadi bahan baru.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-dark text-light h-100 shadow-sm">
                        <img src="how3.jpg" class="card-img-top" alt="Sampah B3" style="border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title fs-4 fw-semibold mb-3">Sampah B3</h5><br>
                            <p class="card-text fs-6">
                                Cara Daur Ulang: <br>
                                Kumpulkan limbah B3 seperti baterai bekas, oli, lampu neon, atau obat kedaluwarsa secara terpisah. Jangan campur dengan sampah rumah tangga biasa. Simpan dalam wadah tertutup dan tahan bocor. Segera serahkan ke fasilitas pengelolaan limbah B3 atau tempat penampungan resmi agar dapat ditangani secara aman dan ramah lingkungan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-dark text-light h-100 shadow-sm">
                        <img src="how4.jpg" class="card-img-top" alt="Sampah Kertas" style="border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title fs-4 fw-semibold mb-3">Sampah Kertas</h5> <br>
                            <p class="card-text fs-6">
                                Cara Daur Ulang: <br>
                                Pisahkan kertas dari sampah lain, hindari terkena air atau minyak. Sortir berdasarkan jenis (koran, kardus, HVS, dll). Ikat rapi dan simpan di tempat kering. Kirim ke bank sampah atau pabrik daur ulang kertas untuk diproses menjadi kertas baru atau produk turunan lainnya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-dark text-light h-100 shadow-sm">
                        <img src="how5.jpg" class="card-img-top" alt="Sampah Residu" style="border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title fs-4 fw-semibold mb-3">Sampah Residu</h5><br>
                            <p class="card-text fs-6">
                                Cara Penanganan: <br>
                                Sampah residu adalah sampah yang sulit atau tidak bisa didaur ulang, seperti popok sekali pakai, tisu bekas, atau kemasan multilayer. Pisahkan dari jenis sampah lain, bungkus rapat agar tidak mencemari lingkungan, lalu buang ke tempat pembuangan akhir (TPA) sesuai aturan daerah. Kurangi jumlahnya dengan memilih produk ramah lingkungan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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