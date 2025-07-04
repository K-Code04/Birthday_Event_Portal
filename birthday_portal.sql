-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2025 at 09:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birthday_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `organizer_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `event_date` datetime NOT NULL,
  `location` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `max_attendees` int(11) NOT NULL,
  `age_requirements` varchar(50) DEFAULT NULL,
  `includes` text DEFAULT NULL,
  `special_notes` text DEFAULT NULL,
  `status` enum('draft','active','cancelled','completed') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `organizer_id`, `title`, `description`, `category`, `event_date`, `location`, `price`, `max_attendees`, `age_requirements`, `includes`, `special_notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Magical Princess Birthday Party', 'Join us for a magical princess-themed birthday party that will create unforgettable memories for your little one! This enchanting celebration features princess performers, dress-up activities, and royal entertainment.', 'Kids Party', '2024-01-15 14:00:00', 'Rainbow Community Center, New York', 45.00, 20, 'Ages 4-8', 'Princess performer, decorations, cake, party favors', NULL, 'active', '2025-06-28 19:35:41', '2025-06-28 19:35:41'),
(2, 2, 'Teen Gaming Birthday Tournament', 'Epic gaming tournament birthday party for teenagers with the latest video games, prizes, and pizza party.', 'Teen Birthday', '2024-01-25 16:00:00', 'Tech Arena, Chicago', 30.00, 15, 'Ages 13-17', 'Gaming stations, pizza, drinks, prizes', NULL, 'active', '2025-06-28 19:35:41', '2025-06-28 19:35:41'),
(3, 1, 'Unicorn Theme Birthday Extravaganza', 'Magical unicorn-themed birthday party with rainbow decorations, unicorn crafts, and mystical entertainment.', 'Theme Party', '2024-02-01 13:00:00', 'Fairy Tale Gardens, Miami', 50.00, 25, 'Ages 4-10', 'Unicorn decorations, crafts, entertainment, cake', NULL, 'active', '2025-06-28 19:35:41', '2025-06-28 19:35:41'),
(4, 1, 'Circus Birthday Spectacular', 'Amazing circus-themed birthday party with clowns, acrobats, balloon animals, and carnival games for all ages.', 'Theme Party', '2024-02-05 15:00:00', 'Central Park Pavilion, New York', 55.00, 30, 'All ages welcome', 'Circus performers, games, balloon animals, snacks', NULL, 'active', '2025-06-28 19:35:41', '2025-06-28 19:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `child_age` int(11) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `parent_phone` varchar(20) NOT NULL,
  `guest_count` int(11) DEFAULT 1,
  `special_requests` text DEFAULT NULL,
  `status` enum('confirmed','waiting_list','cancelled') DEFAULT 'confirmed',
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `id` int(11) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `experience_years` int(11) DEFAULT 0,
  `approved` tinyint(4) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`id`, `business_name`, `email`, `phone`, `password_hash`, `contact_person`, `address`, `city`, `description`, `experience_years`, `approved`, `status`, `last_login`, `created_at`) VALUES
(1, 'Sarah\'s Event Planning', 'organizer@demo.com', '0111 635-5032', '$2y$10$meCY5i3kp.iBe7.eVw.p.O2N.bWK5fYd0Ss0juX3ZqyM9gS.M11WO', 'Sarah Wilson', '123 Party Street, Kuala Lumpur, KL 10001', 'Kuala Lumpur', 'Professional birthday party organizer with 8+ years of experience creating magical celebrations.', 8, 1, 'active', NULL, '2025-06-28 19:35:41'),
(2, 'GameZone Events', 'gamezone@demo.com', '0111 464-2747', '$2y$10$vK2NAYV9B1r7YQla3ZBQZ.JIQXgy3YHD6E9eCLydPjv4BcmfTQnQK', 'Mike Chen', '456 Tech Avenue, Cyber Jaya, Selangor 60601', 'Cyber Jaya', 'Gaming party specialists for teens and young adults.', 5, 1, 'active', NULL, '2025-06-28 19:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `interests` varchar(100) DEFAULT NULL,
  `newsletter_subscribed` tinyint(4) DEFAULT 0,
  `user_type` enum('user','admin') DEFAULT 'user',
  `status` enum('active','inactive') DEFAULT 'active',
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `password_hash`, `date_of_birth`, `city`, `interests`, `newsletter_subscribed`, `user_type`, `status`, `last_login`, `created_at`) VALUES
(1, 'Sarah Johnson', 'user@demo.com', '0111 635-5032', '$2y$10$GAJZtq7RDZWM3E4HBGaTUeQQGKxipd9u70CJZbOb/5EGiaA.MKRYK', NULL, 'Kuala Lumpur', 'Kids Parties', 1, 'user', 'active', NULL, '2025-06-28 19:35:41'),
(2, 'Admin User', 'admin@demo.com', '0111 546-6573', '$2y$10$D7JBFGaUrbR7VyhKrRYME.7g36BZ26nW8VEAPBOm5qs2j6EAOYy1.', NULL, 'Kuala Lumpur', 'All Events', 1, 'admin', 'active', NULL, '2025-06-28 19:35:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `organizer_id` (`organizer_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizer_id` (`organizer_id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_event` (`user_id`,`event_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `activity_log_ibfk_2` FOREIGN KEY (`organizer_id`) REFERENCES `organizers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `activity_log_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`organizer_id`) REFERENCES `organizers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_registrations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
