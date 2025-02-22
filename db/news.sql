-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 22, 2025 at 08:07 AM
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
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'nasional'),
(2, 'internasional'),
(3, 'ekonomi'),
(4, 'olahraga'),
(5, 'teknologi'),
(8, 'bebey');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `judul`, `konten`, `link`, `foto`, `category_id`) VALUES
(9, 'Hasil Liga 1: Persis Ditahan 10 Pemain Semen Padang', 'Persis Solo ditahan Semen Padang 1-1 dalam pertandingan pekan ke-24 Liga 1 2024/2025 di Stadion Manahan, Solo, Jumat (21/2).', 'https://www.cnnindonesia.com/olahraga/20250221171701-142-1201088/hasil-liga-1-persis-ditahan-10-pemain-semen-padang', '67b856f4a8062.jpeg', 4),
(10, 'Jepang Harap RI Mau Kompak Bujuk Trump soal Perang Dagang AS', 'Jepang menggandeng Indonesia dan negara-negara lain untuk membujuk Presiden AS Donald Trump meredam perang dagang dengan menjatuhkan tarif impor yang tinggi.', 'https://www.cnnindonesia.com/internasional/20250221092559-113-1200848/jepang-harap-ri-mau-kompak-bujuk-trump-soal-perang-dagang-as', '67b857a6cc974.jpeg', 2),
(11, 'Rambu-rambu Kuning Hapus Subsidi Solar dan Pertalite Seperti Ide Luhut', 'Ekonom meminta pemerintah berhati-hati jika menghapus solar dan pertalite yang diusulkan Luhut. Dampak inflasi hingga akurasi data wajib diatasi.', 'https://www.cnnindonesia.com/ekonomi/20250221063650-85-1200793/rambu-rambu-kuning-hapus-subsidi-solar-dan-pertalite-seperti-ide-luhut', '67b857f3929f8.jpeg', 3),
(12, 'Dicoding Sebut Indonesia Butuh 23 Juta Talenta Digital Hingga 2045', 'Riset startup Edu Tech Dicoding menjelaskan Indonesia butuh 23 juta talenta berkualitas hingga 2045.', '', '67b8584186208.jpeg', 5),
(14, 'Harga Beras di Pasar Induk Cipinang Merambat Naik Sepekan Jelang Puasa', 'Pedagang di Pasar Induk Cipinang Jaktim mengaku harga beras naik hingga Rp10 ribu per kemasan karung 50 kilogram.', 'https://www.cnnindonesia.com/ekonomi/20250222135401-92-1201288/harga-beras-di-pasar-induk-cipinang-merambat-naik-sepekan-jelang-puasa', '67b96892babbf.jpeg', 3),
(15, ' Demo Indonesia Gelap Respons Publik pada Kebijakan Negara', 'Aksi demo Indonesia Gelap digelar di berbagai daerah, Jumat (21/2) dari mulai Jakarta, Bandung, Surabaya, hingga Makassar.', 'https://www.cnnindonesia.com/nasional/20250222132007-20-1201276/pengamat-demo-indonesia-gelap-respons-publik-pada-kebijakan-negara', '67b96c6d774b5.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'as', '$2y$10$RYvrCyTxGqDnimY03BugEOY290GfKarudNaGN2JFxKmp/lsniYWOa'),
(2, 'jejeadn', '$2y$10$uFdBlUIBhY6qcORDBwdYH.wb0Wi5eeOLNuMhCi/AXGvYJeg6lCG8O'),
(3, 'fikri', '$2y$10$jWTYRlsx/bELyd2KC60FOODr.66H11kQ1IlH2PHKma2Pud3xGeAHK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
