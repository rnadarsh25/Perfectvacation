-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 05:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_role` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_firstname` varchar(255) NOT NULL,
  `admin_lastname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_mobile` varchar(10) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_status` varchar(255) NOT NULL DEFAULT 'active',
  `admin_date` date NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_role`, `admin_password`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_mobile`, `admin_image`, `admin_status`, `admin_date`, `randSalt`) VALUES
(1, 'imboss', '$2y$10$iusesomecrazystrings2u3T/rXcJ0XcPzwBdcmGHwQp2b3djMfsy', 'Adarsh', 'Tiwari', 'adarsh99@gmail.com', '7009488584', '337242.jpg', 'active', '2020-04-16', '$2y$10$iusesomecrazystrings22'),
(3, 'admin', '1478963', 'Ast', 'legend', 'ast@gmail.com', '7771897630', 'NarutovsSasuke.jpg', 'active', '2020-04-20', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agent_id` int(11) NOT NULL,
  `agent_role` varchar(255) NOT NULL,
  `agent_password` varchar(255) NOT NULL,
  `agent_firstname` varchar(255) NOT NULL,
  `agent_lastname` varchar(255) NOT NULL,
  `agent_email` varchar(255) NOT NULL,
  `agent_mobile` varchar(10) NOT NULL,
  `agent_image` text NOT NULL,
  `agent_active` varchar(3) NOT NULL DEFAULT 'yes',
  `agent_status` varchar(255) NOT NULL,
  `agent_city` varchar(255) NOT NULL,
  `agent_date` date NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agent_id`, `agent_role`, `agent_password`, `agent_firstname`, `agent_lastname`, `agent_email`, `agent_mobile`, `agent_image`, `agent_active`, `agent_status`, `agent_city`, `agent_date`, `randSalt`) VALUES
(1, 'agent', '$2y$10$iusesomecrazystrings2uulwFEV3lLw/ZgmCsM3JYAaLTPPCtLnS', 'Mukesh', 'Rai', 'mukesh@gmail.com', '5256215526', '1820290.jpg', 'yes', 'open', 'dargeeling', '2020-04-16', '$2y$10$iusesomecrazystrings22'),
(2, 'agent', '$2y$10$iusesomecrazystrings2umt1tae7mPdtpi/HI1PCPSikqm13.d.e', 'Rahul', 'Kumar', 'rahul@gmail.com', '2568564662', '', 'yes', 'open', 'irona', '2020-04-19', '$2y$10$iusesomecrazystrings22'),
(3, 'agent', '123654', 'manohar', 'kundi', 'kundi@gmail.com', '1478523697', '182372-iron-man-2-iron-man-2.jpg', 'yes', 'open', 'rewa', '2020-04-21', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `all_images`
--

CREATE TABLE `all_images` (
  `image_id` int(11) NOT NULL,
  `image_name` text NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_images`
--

INSERT INTO `all_images` (`image_id`, `image_name`, `image_title`, `image_city`) VALUES
(1, 'gangtok.jpg', 'gangtok', 'gangtok'),
(2, 'ooty.jpg', 'ooty', 'ooty'),
(3, 'ooty.jpg', 'ooty', 'ooty'),
(4, 'Captain-America-Civil-War-Wallpaper.jpg', 'Hero', 'mycity'),
(5, '82581.jpg', 'Batman', 'Dc');

-- --------------------------------------------------------

--
-- Table structure for table `all_videos`
--

CREATE TABLE `all_videos` (
  `video_id` int(11) NOT NULL,
  `video_name` text NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_videos`
--

INSERT INTO `all_videos` (`video_id`, `video_name`, `video_title`, `video_city`) VALUES
(1, 'INCREDIBLE INDIA - by India & You.mp4', 'incredible', 'india'),
(2, 'Enchanting India.mp4', 'incredible', 'india'),
(3, 'Enchanting India.mp4', 'incredible', 'india'),
(4, 'Mera Intkam Dekhegi - Shaadi Mein Zaroor Aana - Rajkummar R  Kriti K - Kris.mp4', 'hero', 'mycity');

-- --------------------------------------------------------

--
-- Table structure for table `booked_tickets`
--

CREATE TABLE `booked_tickets` (
  `ticket_id` int(11) NOT NULL,
  `ticket_user_id` int(11) NOT NULL,
  `ticket_agent_id` int(11) NOT NULL,
  `ticket_firstname` varchar(255) NOT NULL,
  `ticket_lastname` varchar(255) NOT NULL,
  `ticket_mobile` varchar(255) NOT NULL,
  `ticket_email` varchar(255) NOT NULL,
  `ticket_adults` varchar(255) NOT NULL,
  `ticket_visit_place` varchar(255) NOT NULL,
  `ticket_price` varchar(255) NOT NULL,
  `ticket_payment_status` varchar(255) NOT NULL,
  `ticket_visit_date` date NOT NULL,
  `ticket_booking_date` date NOT NULL,
  `book_cancel` varchar(255) NOT NULL DEFAULT 'booked',
  `booked_status` varchar(255) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_tickets`
--

INSERT INTO `booked_tickets` (`ticket_id`, `ticket_user_id`, `ticket_agent_id`, `ticket_firstname`, `ticket_lastname`, `ticket_mobile`, `ticket_email`, `ticket_adults`, `ticket_visit_place`, `ticket_price`, `ticket_payment_status`, `ticket_visit_date`, `ticket_booking_date`, `book_cancel`, `booked_status`) VALUES
(30, 1, 1, 'Adarsh', 'Tiwari', '7771897630', 'adarsh@gmail.com', '2', 'Dargeeling', '18000', 'Successful', '2020-04-25', '2020-04-19', 'booked', 'open'),
(31, 1, 1, 'Adarsh', 'Tiwari', '7771897630', 'adarsh@gmail.com', '2', 'Dargeeling', '18000', 'Successful', '2020-04-23', '2020-04-19', 'booked', 'closed'),
(33, 2, 2, 'Pawan', 'Tiwari', '8085311548', 'pst@gmail.com', '2', 'Irona', '10000', 'Successful', '2020-04-29', '2020-04-20', 'booked', 'open'),
(68, 1, 2, 'Pawan', 'Tiwari', '8085311548', 'pst@gmail.com', '1', 'Irona', '5000', 'Successful', '2020-04-23', '2020-04-26', 'booked', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'places to visit'),
(2, 'tours'),
(3, 'hotels'),
(4, 'photos'),
(5, 'packages'),
(6, 'food');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(3) NOT NULL,
  `feedback_author` varchar(255) NOT NULL,
  `feedback_email` varchar(255) NOT NULL,
  `feedback_content` text NOT NULL,
  `feedback_image` text NOT NULL,
  `feedback_status` varchar(255) NOT NULL DEFAULT 'denied',
  `feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `feedback_author`, `feedback_email`, `feedback_content`, `feedback_image`, `feedback_status`, `feedback_date`) VALUES
(1, 'Ast', 'ast@gmail.com', 'This is my personal feedback.', 'lion3.jpg', 'allowed', '2020-04-16'),
(2, 'Riya', 'rj@email.com', 'This site is amazing. I loved it.', 'kabir2.jpg', 'allowed', '2020-04-21'),
(3, 'Meera', 'meera@gmail.com', 'Traveling with tourguide was an awesome experience. India is amazing.', 'kabir3.jpg', 'allowed', '2020-04-21'),
(4, 'Christopher Nolan', 'nolan@gmail.com', 'I love India. India is amazing, full of positivity, enthusiasm and creativity.  ', 'download.jfif', 'allowed', '2020-04-22'),
(7, 'Adarsh', 'ast.adarsh99@gmail.com', 'This site is amazing. Loved it, loved its service, everything.', '114064.jpg', 'denied', '2020-04-22'),
(8, 'Gopal', 'gopal@gmail.com', 'Good! keep it ip.', '114064.jpg', 'denied', '2020-04-22'),
(9, 'Gopal', 'gopal@gmail.com', 'Good! keep it up.', '114064.jpg', 'denied', '2020-04-22'),
(10, 'Adarsh', 'gopal@gmail.com', 'Good!', '17879.jpg', 'denied', '2020-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_city` varchar(255) NOT NULL,
  `food_image` text NOT NULL,
  `food_distance` varchar(255) NOT NULL,
  `food_ratestar` varchar(255) NOT NULL,
  `food_ratecmt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_city`, `food_image`, `food_distance`, `food_ratestar`, `food_ratecmt`) VALUES
(1, 'Kunga Restaurents', 'dargeeling', 'r1.jpg', '1.0', '9.7', 'wonderful'),
(2, 'kaamdhenu', 'irona', 'r2.jpg', '1.3', '9.4', 'wonderful');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_city` varchar(255) NOT NULL,
  `hotel_image` text NOT NULL,
  `hotel_distance` varchar(255) NOT NULL,
  `hotel_ratestar` varchar(255) NOT NULL,
  `hotel_ratecmt` varchar(255) NOT NULL,
  `hotel_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `hotel_city`, `hotel_image`, `hotel_distance`, `hotel_ratestar`, `hotel_ratecmt`, `hotel_price`) VALUES
(1, 'Mountain Homestay', 'Dargeeling', 'h1.jpg', '1.0', '9.8', 'wonderful', '1600'),
(2, 'spring valley', 'irona', 'h2.jpg', '1.3', '9.6', 'wonderful', '1500'),
(3, 'Natraj hotel', 'irona', 'h3.jpg', '2.4', '9.8', 'wonderful', '1800');

-- --------------------------------------------------------

--
-- Table structure for table `memories`
--

CREATE TABLE `memories` (
  `memory_id` int(3) NOT NULL,
  `memory_image` text NOT NULL,
  `memory_video` text NOT NULL,
  `memory_city` varchar(255) NOT NULL,
  `memory_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(3) NOT NULL,
  `package_title` varchar(255) DEFAULT NULL,
  `package_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_title`, `package_image`) VALUES
(1, 'Premium Tours', 'goa.jpg'),
(2, 'Four Corners', 'banaras.jpg'),
(3, 'State Tours', 'tajmahal.jpg'),
(4, 'Adventures', 'jodhpur.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tour_locations`
--

CREATE TABLE `tour_locations` (
  `tour_location_id` int(3) NOT NULL,
  `tour_location_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_locations`
--

INSERT INTO `tour_locations` (`tour_location_id`, `tour_location_name`) VALUES
(1, 'East'),
(2, 'West'),
(3, 'North'),
(4, 'South');

-- --------------------------------------------------------

--
-- Table structure for table `tour_sites`
--

CREATE TABLE `tour_sites` (
  `site_id` int(3) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_package_id` int(3) NOT NULL,
  `site_location_id` int(3) NOT NULL,
  `site_state` varchar(255) NOT NULL,
  `site_city` varchar(255) DEFAULT NULL,
  `site_image` text NOT NULL,
  `site_about` text NOT NULL,
  `site_price` varchar(255) NOT NULL,
  `site_tour_start_date` date NOT NULL,
  `site_tour_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_sites`
--

INSERT INTO `tour_sites` (`site_id`, `site_title`, `site_package_id`, `site_location_id`, `site_state`, `site_city`, `site_image`, `site_about`, `site_price`, `site_tour_start_date`, `site_tour_end_date`) VALUES
(1, 'Dargeeling Himalayan Railway', 1, 1, 'West Bengal', 'Dargeeling', 'railway.jpg', 'The Darjeeling Himalayan Railway also referred to as the DHR, and lovingly called the\r\n                         \'Darjeeling Toy Train\', is a 2 feet narrow gauge train that runs between New Jalpaiguri\r\nand Darjeeling, in West Bengal, India. The construction of this 88-kilometre long railway line took place between 1879 and 1881, and a ride on this train route has been a coveted experience ever since. A journey in the Darjeeling Toy Train has amazing sights with pleasing mountain views and pass by villages and local shops on the way, with children merrily waving at them.', '5000', '2020-04-12', '2020-04-15'),
(2, 'Tiger Hills', 2, 1, 'West Bengal', 'Dargeeling', 'tigerhills.jpg', 'The Darjeeling Himalayan Railway also referred to as the DHR, and lovingly called the \'Darjeeling Toy Train\', is a 2 feet narrow gauge train that runs between New Jalpaiguri\r\nand Darjeeling, in West Bengal, India. The construction of this 88-kilometre long railway line took place between 1879 and 1881, and a ride on this train route has been a coveted experience ever since. A journey in the Darjeeling Toy Train has amazing sights with pleasing mountain views and pass by villages and local shops on the way, with children merrily waving at them.', '4000', '2020-04-12', '2020-04-15'),
(3, 'Udaipur', 2, 2, 'Rajasthan', 'Udaipur', '545298.jpg', 'This is udaipur.', '4000', '2020-04-12', '2020-04-15'),
(4, 'Kutch', 2, 2, 'Gujarat', 'Kutch', '05_majestic_full_673655992741448058771.jpg', 'This is kutch', '5000', '2020-04-12', '2020-04-15'),
(5, 'Ladhak', 3, 3, 'Ladhak', 'Ladhak', '65-653565_leh-ladakh-pangong-tso.jpg', 'This is Ladhak', '5000', '2020-04-12', '2020-04-15'),
(6, 'Tirupati', 3, 4, 'Andhra Pradesh', 'Tirupati', 'tirupati.jpg', 'This is Tirupati Balaji Temple.', '5000', '2020-04-12', '2020-04-15'),
(7, 'Rishikesh', 1, 3, 'Uttarakhand', 'Rishikesh', 'rishikesh.jpg', 'Jai Bholenath.', '5000', '2020-04-12', '2020-04-15'),
(13, 'Meghdoot', 2, 1, 'Ladhak', 'Irona', '65-653565_leh-ladakh-pangong-tso.jpg', '<p>This isbeautiful Irona</p>\r\n', '5000', '2020-04-12', '2020-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(10) NOT NULL,
  `user_image` text NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_status` text NOT NULL DEFAULT 'allowed',
  `user_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_mobile`, `user_image`, `user_city`, `user_status`, `user_date`) VALUES
(1, 'Adarsh', 'Tiwari', 'adarsh@gmail.com', '7771897630', '337242.jpg', 'dargeeling', 'allowed', '2020-04-16'),
(6, 'Pawan', 'Tiwari', 'pst@gmail.com', '8085311548', '3779877-6973392383-mysti.png', 'Rewa', 'allowed', '2020-04-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `all_images`
--
ALTER TABLE `all_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `all_videos`
--
ALTER TABLE `all_videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `memories`
--
ALTER TABLE `memories`
  ADD PRIMARY KEY (`memory_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tour_locations`
--
ALTER TABLE `tour_locations`
  ADD PRIMARY KEY (`tour_location_id`);

--
-- Indexes for table `tour_sites`
--
ALTER TABLE `tour_sites`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `all_images`
--
ALTER TABLE `all_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `all_videos`
--
ALTER TABLE `all_videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `memories`
--
ALTER TABLE `memories`
  MODIFY `memory_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_locations`
--
ALTER TABLE `tour_locations`
  MODIFY `tour_location_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_sites`
--
ALTER TABLE `tour_sites`
  MODIFY `site_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
