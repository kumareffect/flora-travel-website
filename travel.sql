-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 10:39 AM
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
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(2, 1, 2, 'The Vast Mysteries of the Ocean', '1725902881_pexels-belle-co-99483-847393.jpg', '&lt;p&gt;The ocean, a vast and mesmerizing expanse, covers over 70% of our planet&rsquo;s surface. It is a world teeming with life, mysteries, and beauty that remain largely unexplored. Despite its critical role in sustaining life on Earth, much of the ocean is still a mystery to us. Below the surface lies a realm that has inspired explorers, scientists, and storytellers for centuries.&lt;/p&gt;&lt;h2&gt;A Source of Life&lt;/h2&gt;&lt;p&gt;The ocean is more than just a body of water; it is the life source for millions of species. From the tiny plankton to the mighty whales, it hosts a complex ecosystem that sustains itself in the deep blue depths. The ocean produces more than half of the world\'s oxygen, making it crucial not just for marine life, but for all life on Earth.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h2&gt;The Unexplored Depths&lt;/h2&gt;&lt;p&gt;While we&rsquo;ve mapped out most of the Earth\'s surface, the ocean\'s deepest parts remain mysterious. The Mariana Trench, for example, is the deepest known part of the ocean, plunging about 36,000 feet. What lies beyond those dark waters is still largely unknown. Explorers have barely scratched the surface, and many creatures that live in these depths have yet to be discovered.&lt;/p&gt;&lt;h2&gt;Beauty Beyond the Shoreline&lt;/h2&gt;&lt;p&gt;From the colorful coral reefs to the shimmering waves, the ocean holds an incredible beauty. Coral reefs, often called the &quot;rainforests of the sea,&quot; are among the most biodiverse ecosystems on Earth. They are home to thousands of species, many of which can\'t be found anywhere else. The vibrant colors and intricate shapes of the coral offer a stunning underwater landscape that continues to fascinate divers and researchers alike.&lt;/p&gt;&lt;h2&gt;The Power of the Ocean&lt;/h2&gt;&lt;p&gt;The ocean is also a force of nature, both awe-inspiring and sometimes destructive. From gentle waves that lap at the shore to powerful storms that reshape coastlines, the ocean\'s strength is undeniable. Its currents control climate patterns, influencing weather around the globe. When storms like hurricanes form, they remind us of the ocean\'s capacity for both nurturing life and causing devastation.&lt;/p&gt;', 1, '2024-09-09 22:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `querry`
--

CREATE TABLE `querry` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `product_id`, `quantity`, `member_id`) VALUES
(41, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `amount`, `name`, `address`, `city`, `state`, `zip`, `country`, `payment_type`, `order_status`, `order_at`) VALUES
(1, 2, 1500, 'Kumar Gaurav', 'B784, DDA Flats Bindapur', 'New Delhi', 'Delhi', '110059', 'India', 'PAYPAL', 'PENDING', '2024-09-10 09:43:08'),
(2, 2, 1500, 'Kumar Gaurav', 'B784, DDA Flats Bindapur', 'New Delhi', 'Delhi', '110059', 'India', 'PAYPAL', 'PENDING', '2024-09-10 09:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`id`, `order_id`, `product_id`, `item_price`, `quantity`) VALUES
(1, 1, 1, 1500, 1),
(2, 2, 1, 1500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_response` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Hiking Tour Pack', 'tour_1', 'maxence-pira-mzEizqoVXAI-unsplash.jpg', 1500.00),
(2, 'Waterfaull Tour Pack', 'tour_2', 'rio-hodges-nNPONh2aXeQ-unsplash.jpg', 1800.00),
(4, 'Mountain Tour Pack', 'tour_3', 'kerensa-pickett-LKQGNBZAWU8-unsplash.jpg', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(2, 'Ocean', ''),
(3, 'Valley', ''),
(4, 'Waterfall', ''),
(5, 'Jungle', ''),
(6, 'Glacier', ''),
(7, 'Beach', ''),
(8, 'Stream', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(1, 1, 'Kumar', 'kumareffect@gmail.com', '$2y$10$Y2cqFeQeb5rFouUaihAxBu5syRFnORi60tpyeYmoGsapuhrAhjpO6', '2024-09-09 17:15:50'),
(3, 1, 'Yashika', 'yashikaemirates@gmail.com', '$2y$10$FmcljOC5pUbmTV.MhrI3W.O4GKVvFhD4VeKIQT1auMPVHR2myByf2', '2024-09-09 17:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `video_name` varchar(100) NOT NULL,
  `video_url` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_name`, `video_url`, `image`) VALUES
(1, 'Make Logo like Winx Club', 'https://www.youtube.com/embed/fFrX5kZoa7o', 'Capture.JPG'),
(2, 'How to replace background in photoshop', 'https://www.youtube.com/embed/Ha73DIltRZM', 'removing.jpg'),
(3, 'How to install Photoshop', 'https://www.youtube.com/embed/kRZiJujYWGk', 'X1VFXnGdboM-HD.jpg'),
(4, 'How to install Visual Studio Code in Windows.', 'https://www.youtube.com/embed/o39h9YhjCMI', 'visual-studio.jpg'),
(5, 'How to install Android Studio on  your PC', 'https://www.youtube.com/embed/DhQms2WyEpk', 'android.jpg'),
(6, 'How to install Xampp along with php', 'https://www.youtube.com/embed/OzW5QgFzxUM', 'xamp.jpg'),
(7, 'Making webpage Part1', 'https://www.youtube.com/embed/sr9dcz0WabA', 'html-css-js.jpg'),
(8, 'Photoshop basics in only 10 minutes', 'https://www.youtube.com/embed/lYTYjkeHDrE', 'basic_photoshop.jpg'),
(9, 'Making My Tata Nano App', 'https://www.youtube.com/embed/C_I0TFh1scw', 'tatanano.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `querry`
--
ALTER TABLE `querry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `querry`
--
ALTER TABLE `querry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
