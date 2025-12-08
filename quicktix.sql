-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2025 at 03:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quicktix`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_type` enum('Bioskop','Festival','Workshop','Konser') NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available_tickets` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('active','sold_out','cancelled','completed') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_name`, `event_type`, `location`, `date`, `price`, `available_tickets`, `description`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Java Jazz Festival 2025', 'Festival', 'JIExpo Kemayoran', '2025-07-20 14:00:00', 350000.00, 480, 'Festival musik jazz terbesar di Indonesia dengan berbagai artis lokal dan internasional.', 'uploads/java-jazz.jpg', 'active', '2025-05-29 09:30:42', '2025-06-28 05:38:19'),
(5, 'We The Fest 2025', 'Festival', 'GBK Senayan', '2025-07-27 12:00:00', 750000.00, 900, 'Festival musik indie terbesar di Indonesia dengan lineup artis lokal dan internasional.', 'uploads/we the fest.jpg', 'active', '2025-05-29 09:30:42', '2025-06-28 05:41:29'),
(6, 'Jakarta Food Festival', 'Festival', 'Kemayoran City', '2025-08-03 10:00:00', 150000.00, 280, 'Festival kuliner terbesar di Jakarta dengan berbagai makanan lokal dan internasional.', 'uploads/jakarta food festival.jpeg', 'active', '2025-05-29 09:30:42', '2025-06-28 12:49:38'),
(7, 'Web Development Workshop', 'Workshop', 'Tech Hub Jakarta', '2025-08-10 09:00:00', 150000.00, 30, 'Workshop intensif tentang pengembangan web modern menggunakan teknologi terbaru.', 'uploads/web dev workshop.jpg', 'active', '2025-05-29 09:30:42', '2025-06-28 05:44:42'),
(8, 'UI/UX Design Masterclass', 'Workshop', 'Design Space Jakarta', '2025-08-17 13:00:00', 200000.00, 25, 'Workshop mendalam tentang prinsip dan praktik terbaik dalam desain UI/UX.', 'uploads/UI UX Masterclass.png', 'active', '2025-05-29 09:30:42', '2025-06-28 11:03:23'),
(9, 'Digital Marketing Workshop', 'Workshop', 'Marketing Hub', '2025-08-24 10:00:00', 175000.00, 40, 'Workshop komprehensif tentang strategi dan teknik digital marketing terkini.', 'uploads/digital marketing.png', 'active', '2025-05-29 09:30:42', '2025-06-28 05:50:11'),
(10, 'Coldplay Concert', 'Konser', 'Gelora Bung Karno', '2025-08-31 20:00:00', 1500000.00, 2000, 'Konser spektakuler dari band legendaris Coldplay dengan visual dan efek yang memukau.', 'uploads/coldplay - jakarta.jpg', 'active', '2025-05-29 09:30:42', '2025-06-28 04:07:59'),
(11, 'Taylor Swift Concert', 'Konser', 'ICE BSD', '2025-09-07 19:00:00', 2000000.00, 1500, 'Konser eksklusif dari Taylor Swift dengan setlist terbaik dari album-albumnya.', 'uploads/Taylor Swift - Indonesia.webp', 'active', '2025-05-29 09:30:42', '2025-06-28 04:07:49'),
(12, 'Ed Sheeran Live in Jakarta', 'Konser', 'Stadion Madya', '2025-09-14 20:00:00', 1800000.00, 1690, 'Konser akustik intim dari Ed Sheeran dengan hits terbaiknya.', 'uploads/Ed Sheeran - Jakarta.jpg', 'active', '2025-05-29 09:30:42', '2025-06-28 13:03:16'),
(13, 'Bali Spirit Festival 2025', 'Festival', 'Ubud, Bali', '2025-09-21 08:00:00', 450000.00, 800, 'Festival spiritual dan musik yang menggabungkan budaya lokal Bali dengan musik dunia.', 'uploads/Bali Spirit fest.jpg', 'active', '2025-06-28 01:00:00', '2025-06-28 05:36:21'),
(14, 'Surabaya Art Festival', 'Festival', 'Taman Bungkul, Surabaya', '2025-09-28 16:00:00', 200000.00, 600, 'Festival seni dan budaya terbesar di Jawa Timur dengan pertunjukan musik, tari, dan pameran seni.', 'uploads/surabaya art festival.jpg', 'active', '2025-06-28 01:00:00', '2025-06-28 05:36:14'),
(15, 'Bandung Creative Festival', 'Festival', 'Gedung Sate, Bandung', '2025-10-05 10:00:00', 300000.00, 400, 'Festival kreativitas dan inovasi yang menghadirkan karya-karya terbaik dari komunitas kreatif Bandung.', 'uploads/poster-ccf_blog.webp', 'active', '2025-06-28 01:00:00', '2025-06-28 05:36:04'),
(16, 'Mobile App Development Workshop', 'Workshop', 'Digital Valley Jakarta', '2025-09-07 09:00:00', 250000.00, 25, 'Workshop lengkap tentang pengembangan aplikasi mobile menggunakan React Native dan Flutter.', 'uploads/mobile app workshop.jpeg', 'active', '2025-06-28 01:00:00', '2025-06-28 05:41:14'),
(17, 'Docker Untuk AI dan Data Science Workshop', 'Workshop', 'AI Innovation Center', '2025-09-14 13:00:00', 300000.00, 35, 'Workshop mendalam tentang data science, machine learning, dan artificial intelligence.', 'uploads/Docket Untuk AI dan Data Science.jpeg', 'active', '2025-06-28 01:00:00', '2025-06-28 06:01:31'),
(18, 'Cybersecurity Workshop', 'Workshop', 'Security Hub Jakarta', '2025-09-21 10:00:00', 225000.00, 30, 'Workshop keamanan siber yang membahas teknik hacking etis dan proteksi sistem.', 'uploads/Cyber Security Workshop - Jakarta.jpeg', 'active', '2025-06-28 01:00:00', '2025-06-28 05:35:39'),
(19, 'Bruno Mars Live in Jakarta', 'Konser', 'ICE BSD Tangerang', '2025-10-12 20:00:00', 2200000.00, 1800, 'Konser spektakuler dari Bruno Mars dengan hits terbaik dan performa yang memukau.', 'uploads/bruno mars jkt.jpg', 'active', '2025-06-28 01:00:00', '2025-06-28 05:49:39'),
(20, 'BTS World Tour Jakarta', 'Konser', 'Gelora Bung Karno', '2025-10-19 19:00:00', 2500000.00, 2500, 'Konser dunia dari boyband Korea Selatan BTS dengan pertunjukan yang spektakuler.', 'uploads/BTS World Tour.jpeg', 'active', '2025-06-28 01:00:00', '2025-06-28 05:56:52'),
(21, 'Ariana Grande Sweetener World Tour', 'Konser', 'ICE BSD Tangerang', '2025-10-26 20:00:00', 2300000.00, 1600, 'Konser dunia dari Ariana Grande dengan setlist dari album Sweetener dan Thank U, Next.', 'uploads/Ariana Grande.jpg', 'active', '2025-06-28 01:00:00', '2025-06-28 05:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` enum('transfer_bank','e_wallet','qris') NOT NULL,
  `payment_details` text DEFAULT NULL,
  `payment_status` enum('pending','paid','cancelled') DEFAULT 'pending',
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `ticket_id`, `user_id`, `quantity`, `total_price`, `payment_method`, `payment_details`, `payment_status`, `is_used`, `created_at`, `updated_at`) VALUES
(24, 4, 1, 10, 3500000.00, 'transfer_bank', '{\"event_name\":\"Java Jazz Festival 2025\",\"event_type\":\"Festival\",\"location\":\"JIExpo Kemayoran\",\"date\":\"2025-07-20 14:00:00\"}', 'paid', 0, '2025-06-28 01:44:56', '2025-06-28 01:44:56'),
(25, 4, 1, 10, 3500000.00, 'transfer_bank', '{\"event_name\":\"Java Jazz Festival 2025\",\"event_type\":\"Festival\",\"location\":\"JIExpo Kemayoran\",\"date\":\"2025-07-20 14:00:00\"}', 'paid', 0, '2025-06-28 01:56:43', '2025-06-28 01:56:43'),
(26, 8, 2, 5, 1000000.00, 'transfer_bank', '{\"event_name\":\"UI\\/UX Design Masterclass\",\"event_type\":\"Workshop\",\"location\":\"Design Space Jakarta\",\"date\":\"2025-08-17 13:00:00\"}', 'paid', 0, '2025-06-28 06:03:23', '2025-06-28 06:03:23'),
(27, 6, 2, 10, 1500000.00, 'qris', '{\"event_name\":\"Jakarta Food Festival\",\"event_type\":\"Festival\",\"location\":\"Kemayoran City\",\"date\":\"2025-08-03 10:00:00\"}', 'paid', 0, '2025-06-28 06:05:38', '2025-06-28 06:05:38'),
(28, 6, 2, 10, 1500000.00, 'qris', '{\"event_name\":\"Jakarta Food Festival\",\"event_type\":\"Festival\",\"location\":\"Kemayoran City\",\"date\":\"2025-08-03 10:00:00\"}', 'paid', 0, '2025-06-28 07:49:38', '2025-06-28 07:49:38'),
(29, 12, 2, 10, 18000000.00, 'transfer_bank', '{\"event_name\":\"Ed Sheeran Live in Jakarta\",\"event_type\":\"Konser\",\"location\":\"Stadion Madya\",\"date\":\"2025-09-14 20:00:00\"}', 'paid', 0, '2025-06-28 08:03:16', '2025-06-28 08:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') DEFAULT 'active',
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `phone`, `created_at`, `updated_at`, `status`, `role`) VALUES
(1, 'Rizal', 'rizal@gmail.com', '$2y$10$JoaGYkyksEOVN0KQD9bsV.90kzmKKfGGU7me6DWziuUZNq3sCf0G6', 'Arizal', '088809990777', '2025-05-28 21:49:28', '2025-06-20 00:48:53', 'active', 'user'),
(2, 'Hilmi', 'hilmi@gmail.com', '$2y$10$FXtLOCJqrSvchLM7s9LEL.agroMcd0ag1zqxvF5BxGORJ8ihzuTuK', 'Hilmi', '088809990555', '2025-05-28 22:24:54', '2025-05-29 05:35:19', 'active', 'user'),
(4, 'admin', 'admin@quicktix.biz.id', '$2y$10$x6Tv/kslOSkuAniMBZLpfecXEsdYfDOfsWlQ69i9KbfPCBBao2q16', 'Administrator', '081234567890', '2025-06-20 00:26:34', '2025-06-28 08:05:05', 'active', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
