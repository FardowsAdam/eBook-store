-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3316
-- Generation Time: May 09, 2025 at 09:53 PM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(2, 10, 'It', 26, 1, 'Screenshot 2025-05-09 162009.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(163, 1, 'Fardows', 'alyaanbtdht@gmail.com', '0542265727', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 1, 'Fardows', '0542265727', 'alyaanbtdht@gmail.com', 'cash on delivery', 'Madina, Near AL Noor Mall', 'cleaver lands(2)', 68, '4th May, 2025', 'pending'),
(3, 10, 'Mona', '0540551606', 'ashaqfrdws@gmail.com', 'cash on delivery', 'flat no. 3, BIN MADI , Jeddah, Saudi Arabia - 21433', ', the girl of ink and star (1) ', 35, '09-May-2025', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `Description`, `author`) VALUES
(15, 'It', 26, 'Screenshot 2025-05-09 162009.png', 'It is a 1986 horror novel by American author Stephen King. It was King\'s 22nd book and the 17th novel written under his own name. The story follows the experiences of seven children terrorized by an evil entity that exploits the fears of its victims to disguise itself while hunting its prey.', 'William Croos'),
(16, 'The Power Of moment', 22, 'Screenshot 2025-05-09 162512.png', 'The Power of Moments is about why certain brief experiences can jolt us and elevate us and change us—and how we can learn to create such extraordinary moments in our life and work.\r\nResearch has found that in recalling an experience, we ignore most of what happened and focus instead on a few particular moments.', 'Sam Alan'),
(17, 'The Let Them', 45, 'Screenshot 2025-05-09 162824.png', 'The Let Them Theory is a step-by-step guide on how to stop letting other people\'s opinions, drama, and judgment impact your life. Two simple words, Let Them, will set you free from the exhausting cycle of trying to manage everything and everyone around you. It’s time to build a life where you come first—your dreams, your goals, your happiness.', 'Richered Swift\r\n'),
(18, 'You Can Be a Success Too', 37, 'Screenshot 2025-05-09 162436.png', 'Drawing on three decades of work with elite competitors, Grover strips away the cliches and rah-rah mentality that create mediocrity and challenges you to embrace reality with single-minded intensity. The prize? Massive success. Athletes and business professionals. Ages 12 to adults.', 'Fardows Adam'),
(19, 'Next Right Thing', 27, 'Screenshot 2025-05-09 163051.png', 'Life is full of choices, and sometimes it can be overwhelming to decide which path to take. In her book, “The Next Right Thing,” Emily P. Freeman offers readers a practical guide to making tough decisions in life. The book is divided into five chapters, each exploring a different aspect of decision-making.', 'Jackson Steve'),
(21, 'Think And Grow Rich', 99, 'Screenshot 2025-05-09 162551.png', 'Think and Grow Rich is a book written by Napoleon Hill and Rosa Lee Beeland released in 1937 and promoted as a personal development and self-improvement book. The book is a curation of the 13 most common habits of wealthy and successful people, distilled from studying over 500 individuals over the course of 20 years.', 'Jasmin Smith'),
(22, 'Atomic Habits', 89, 'Screenshot 2025-05-09 162536.png', 'Atomic Habits by James Clear is a comprehensive, practical guide on how to change your habits and get 1% better every day. Using a framework called the Four Laws of Behavior Change, Atomic Habits teaches readers a simple set of rules for creating good habits and breaking bad ones.', 'Edowrdo heelen'),
(23, 'The Champion’s Mind', 122, 'Screenshot 2025-05-09 162456.png', 'n The Champion\'s Mind, sports psychologist Jim Afremow, PhD, LPC, now offers the same advice he uses with Olympians, Heisman Trophy winners, and professional athletes, including: [bullet] Tips and techniques based on high-performance psychology research, such as how to get in a \"zone,\" thrive on a team, and stay humble [bullet]', 'Elon Mask \r\n'),
(24, 'Zero To One ', 67, 'Screenshot 2025-05-09 162425.png', 'The great secret of our time is that there are still uncharted frontiers to explore and new inventions to create. In Zero to One, Author shows how we can find singular ways to create those new things.Thiel begins with the contrarian premise that we live in an age of technological stagnation, even if we’re too distracted by shiny mobile devices to notice.', 'Sofia Diamond'),
(25, 'Amazing World', 33, 'Screenshot 2025-05-09 162354.png', 'Amazing World is a series written in accordance with the Single National Curriculum 2020. It is the English translated version of the Meri Duniya series for grades 1-3\r\nThe Amazing World series is aimed to produce young critical thinkers, capable of understanding and evaluating information', 'Tomas Adeson'),
(27, 'Quotes That Inspire and Impower ', 20, 'Screenshot 2025-05-09 162413.png', 'Within their pages, we find powerful words that motivate us and inspire us to be better. These quotes can lift our spirits, make us think deeply, and remind us of the strength we carry inside. Whether it’s a classic novel or a modern story, each quote holds a piece of wisdom worth sharing.🤍', 'Tom Jerry '),
(28, 'Jaay Bird on The Edge', 77, 'Screenshot 2025-05-09 162328.png', 'On the edge of being confident readers, this Read-Easy set contains one of each of the six physical books in this series. The Whispering Grass Trees; Red Eyes; Bloodsucker; Second-Hand Life; Pig Girl; and Big Money. Designed for teen readers who are disengaged, struggling and/or reluctant.', 'Alexandar Brooky'),
(29, 'Can’t Hurt Me ', 119, 'Screenshot 2025-05-09 161922.png', '“Can’t Hurt Me” is a memoir by David Goggins—a retired Navy SEAL, a Guinness world record holder, and an ultramarathon runner. This book chronicles his remarkable transformation as he overcame adversity, mastered his mind, and pushed past his limits', 'John Cena'),
(30, 'Free Fall', 99, 'freefall.jpg', 'This short story first appeared in The Z Chronicles, and serves as a prequel to What We Left Behind.\r\n\r\nJackson is an astronaut testing a prototype interstellar craft in deep space. When he returns home, there’s no one to greet him. Earth has fallen silent. Now he must decide—stay in orbit, watching a dead planet roll slowly by beneath his windows, or land on Earth and fight for life?', 'Marry Cherry'),
(31, 'Rich Dad Poor Dad', 88, 'Screenshot 2025-05-09 161715.png', '\"Rich Dad Poor Dad\" by Robert Kiyosaki is a personal finance book It describes how the rich dad teaches the author and his friend finance through practical lessons. Throughout the book, Kiyosaki shares anecdotes and conversations that he had with the rich dad, who guided him on various aspects of money, wealth creation, and financial independence', 'Sana Mouazen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Fardows', 'alyaanbtdht@gmail.com', '$2y$10$B22Zj5g2AQv1Ub9dth1EGufCIAoEWfwR1yh6OXNvISOtBKJNCu0xK', 'user'),
(4, 'Sedrah', 'sedrah409@gmail.com', '$2y$10$NMLdIaRK3HAI8h6zYZ4.f.OWjMdbys29D7wUva.hn3xkkGNRWVU6G', 'user'),
(9, 'Tota', 'ashaqfrdws@gmail.com', '$2y$10$OniMFzu.XtrOLeE.dBMxCua/VeGgoUyDkrczXw3ASdTph4xDQrEA6', 'admin'),
(10, 'x', 'qqq@gmail.com', '$2y$10$Rb.3NGMXoDNsw6jfhqwsWOB60s.u2LZILFc7mBj9GsnOuDTWP8bXG', 'user'),
(14, 'rawan', 'rawan@gmail.com', '$2y$10$/jVBznIH5sLeGTl27NCpJes.8m.bHbbZQebdRfIiOgvt50OH2ZEgq', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
