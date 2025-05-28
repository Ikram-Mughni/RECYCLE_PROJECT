-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 04:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recycle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('ade', 'ade'),
('asade', 'kontol'),
('Eden', 'passwordEden123'),
('Ikram', 'passwordIkram123'),
('jawa', 'jawa'),
('miku', '123'),
('wee', 'wee');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL CHECK (`amount` > 0),
  `currency` char(3) NOT NULL DEFAULT 'IDR',
  `donation_type` enum('Money','Goods','Service') NOT NULL,
  `waste_type_id` int(11) DEFAULT NULL,
  `payment_method` enum('Transfer','CreditCard','eWallet','Cash') NOT NULL,
  `message` text DEFAULT NULL,
  `subscribe_newsletter` tinyint(1) NOT NULL DEFAULT 0,
  `agree_terms` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_name`, `email`, `phone`, `amount`, `currency`, `donation_type`, `waste_type_id`, `payment_method`, `message`, `subscribe_newsletter`, `agree_terms`, `created_at`) VALUES
(1, 'Ade Nugraha', 'adenugi1011@gmail.com', '085246641058', 5000000.00, 'IDR', 'Money', NULL, 'Cash', 'Saya ingin dunia menjadi tempat yang lebih baik', 1, 1, '2025-05-26 12:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `recycling_locations`
--

CREATE TABLE `recycling_locations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `contact_info` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recycling_locations`
--

INSERT INTO `recycling_locations` (`id`, `name`, `address`, `city`, `contact_info`) VALUES
(1, 'Green Cycle Center', '123 Main Street', 'New York, USA', 'info@greencycle.us'),
(2, 'Eco Recycle Hub', 'Jl. Merdeka No. 45', 'Jakarta, Indonesia', 'contact@ecorecycle.id'),
(3, 'RePlanet Station', '221B Baker Street', 'London, UK', 'support@replanet.co.uk'),
(4, 'Recycle Tokyo Center', '1-2-3 Shibuya', 'Tokyo, Japan', 'info@recycletokyo.jp'),
(5, 'Zero Waste Facility', '45 Circular Rd', 'Sydney, Australia', 'hello@zerowaste.au'),
(6, 'Smart Recycle', 'Boulevard Haussmann 58', 'Paris, France', 'contact@smartrecycle.fr'),
(7, 'EcoDrop Center', 'Rua Verde 120', 'Sao Paulo, Brazil', 'ecodrop@brasil.org');

-- --------------------------------------------------------

--
-- Table structure for table `waste_types`
--

CREATE TABLE `waste_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waste_types`
--

INSERT INTO `waste_types` (`id`, `name`, `description`) VALUES
(1, 'Plastik', 'Sampah berbahan dasar plastik seperti botol, kantong plastik, dan kemasan makanan. Dapat didaur ulang menjadi bahan baru.'),
(2, 'Kertas', 'Sampah kertas seperti koran, buku, kardus, dan kertas bekas. Dapat didaur ulang menjadi kertas baru atau bahan bangunan.'),
(3, 'Kaca', 'Sampah berbahan kaca seperti botol minuman, toples, dan pecahan kaca. Bisa dilebur dan dibentuk ulang.'),
(4, 'Logam', 'Sampah logam seperti kaleng aluminium, besi bekas, dan kawat. Dapat dilebur dan digunakan kembali.'),
(5, 'Organik', 'Sampah sisa makanan, daun, ranting, dan bahan alami lainnya. Bisa dijadikan kompos.'),
(6, 'Elektronik', 'Sampah elektronik seperti HP rusak, komputer, baterai, dan kabel. Harus didaur ulang secara khusus.'),
(7, 'Tekstil', 'Sampah pakaian bekas, kain perca, dan bahan tekstil lain. Bisa didaur ulang menjadi serat baru atau produk lain.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donations_wastetype` (`waste_type_id`);

--
-- Indexes for table `recycling_locations`
--
ALTER TABLE `recycling_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waste_types`
--
ALTER TABLE `waste_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recycling_locations`
--
ALTER TABLE `recycling_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `waste_types`
--
ALTER TABLE `waste_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `fk_donations_wastetype` FOREIGN KEY (`waste_type_id`) REFERENCES `waste_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
