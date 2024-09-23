-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2024 at 06:02 PM
-- Server version: 8.0.39-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_site_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `blog_id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`blog_id`, `title`, `content`, `user_id`, `created_timestamp`, `category_id`) VALUES
(16, 'The Future of AI: What\'s Next?', 'Artificial Intelligence is advancing rapidly, reshaping industries and daily life. With innovations in machine learning and deep learning, AI is becoming more integrated into healthcare, finance, and transportation. This post explores the potential of AI in creating smarter cities, improving diagnostics in medicine, and even enhancing user experiences through personalization. As we look ahead, ethical considerations and responsible AI use will be paramount to ensure technology benefits everyone.', 32, '2024-09-23 13:21:18', 7),
(17, '10 Tips for a Balanced Life', 'Achieving a balanced life can be challenging amidst daily responsibilities. Start by prioritizing your health with regular exercise and nutritious meals. Incorporate mindfulness practices, like meditation, to reduce stress. Establish a work-life balance by setting boundaries and making time for hobbies. Strengthen relationships with friends and family through regular communication. Lastly, ensure you allocate time for self-care. Small adjustments can lead to a more fulfilling life.', 31, '2024-09-23 13:24:34', 8),
(18, 'Budgeting 101: How to Manage Your Money', 'Creating a budget is crucial for financial stability. Start by tracking your income and expenses to understand your spending habits. Categorize your expenses into fixed and variable costs. Set realistic financial goals, whether it\'s saving for a vacation or paying off debt. Use budgeting tools or apps to keep you accountable. Remember to review and adjust your budget regularly to reflect changes in your financial situation. A solid budget can empower you to make informed financial decisions.', 32, '2024-09-23 13:29:28', 1),
(19, 'Effective Study Techniques for Students', 'Studying effectively is key to academic success. Start by creating a dedicated study space free from distractions. Use active learning techniques, such as summarizing information and teaching it to someone else. Implement the Pomodoro Technique: study for 25 minutes, then take a 5-minute break. Practice retrieval by testing yourself on the material. Lastly, ensure you maintain a healthy sleep schedule to enhance memory retention. These strategies can boost your learning and performance.', 38, '2024-09-23 13:31:20', 10),
(21, 'Top 10 Movies to Watch This Year', 'Content: \"This year has seen some remarkable films across various genres. From thrilling action blockbusters to heartwarming dramas, there\'s something for everyone. Don\'t miss the latest superhero flick, which combines stunning visuals with a compelling storyline. If you prefer indie films, check out the poignant story of personal growth and resilience. Animated features this year also deliver laughter and nostalgia. Make sure to catch these films in theaters or on streaming platforms for an entertaining experience.\"', 32, '2024-09-23 16:00:47', 11),
(22, '5 Key Strategies for Business Growth', 'To achieve sustainable business growth, consider implementing these five strategies. First, focus on customer experience—happy customers lead to repeat business. Second, invest in digital marketing to reach a broader audience. Third, diversify your product offerings to meet changing market demands. Fourth, foster a strong company culture to improve employee satisfaction and retention. Finally, leverage data analytics to make informed decisions. These approaches can position your business for long-term success.', 39, '2024-09-23 16:02:20', 12);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Finance'),
(6, 'Updates'),
(7, 'Technology'),
(8, 'Lifestyle'),
(9, 'Finance'),
(10, 'Education'),
(11, 'Entertainment'),
(12, 'Business'),
(13, 'DIY & Crafts'),
(14, 'Fitness'),
(15, 'Parenting'),
(16, 'Personal Development'),
(17, 'Travel'),
(18, 'Food'),
(19, 'Fashion'),
(20, 'Home Improvement'),
(21, 'Sports'),
(22, 'Science'),
(23, 'Art & Design'),
(24, 'Photography'),
(25, 'Environmental'),
(26, 'Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `content` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `post_id`, `content`, `created_at`) VALUES
(1, 29, 1, 'This is an amazing blog post!', '2024-09-21 18:55:20'),
(36, 31, 3, 'juidasdasd', '2024-09-22 20:43:30'),
(37, 31, 3, '', '2024-09-22 21:55:24'),
(39, 31, 12, 'sdasda', '2024-09-23 12:03:26'),
(40, 32, 17, 'Wow, these are some really great tips!', '2024-09-23 13:28:39'),
(42, 31, 19, 'These are some really god techniques, thanks!', '2024-09-23 13:54:21'),
(43, 31, 2, 'A bit long', '2024-09-23 13:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`) VALUES
(16, 'sdada', 'jovanmihic99@gmail.com', '$2y$12$dCN9d2SgDsCULPanLzZqj..W6MORwOuEDtqdk6gLvYz.2yNX9hB7u'),
(17, 'root', 'aaa@aaa.com', '$2y$12$G9cx5M7QDfkO5cR1Mj2PwOd90vZykcj5rWzivu6AnXZK2/U6Y16oa'),
(26, 'asdsgggg', 'sdsdsds@sadasd', '$2y$10$dkL3AjPmkgRWNxe6NhWiuuO38GPVA1tSrkK7dIyzrqRV8Ieqr8mcm'),
(27, 'gfgh', 'g@ghgg', '$2y$10$qig98x4/W1ULtw71.Ha2C.0q9/fdnT1Yn6dzKXwrUCUAcwirwA3u2'),
(28, 'sdsdds', 'sdsdsd2s@sd', '$2y$10$UegZeMYYbtcKZ9SsmkF9A.Fx9eBCvlogf1m7WGiL1y7dRy6IfHwk.'),
(29, 'jovan', 'jovan@email.com', '$2y$10$MvW7E.IC.7Vi.P0OFnVYq.TVdd/fhxh/bofAywBRLmuyGJL4dAy6O'),
(30, 'milan', 'milan@email.com', '$2y$10$l0RXC81Vur38RryAc4Dr1u98Uz2CmjQSkJjac.qqGqMf6gaVn1w4a'),
(31, 'petar', 'petar@email.com', '$2y$10$t6xvOrIynOsKJ5GjFsJymum9I6Pp4F2xemLkJW5hZZbEvJmP1uG9y'),
(32, 'ivan', 'ivan@email.com', '$2y$10$y9wMSnUYOdfFbdBSg9kiW.yHvqZQvEGL.Kc0OAKb6XyjHnM79dR2e'),
(33, 'mile', 'mile@email.com', '$2y$10$baHrHGCVX6bT4eeKN/6oEeSWx4ReJAsrw9V707olj6r3EpLC3pRda'),
(34, 'caslav', 'caslav@email.com', '$2y$10$nwC989eo2uYM4gAVm.1Zhusa/M6cvZVBrafxgBH//lpBMI7J2RBNu'),
(35, 'sdsd', 'sdsd@sdsd', '$2y$10$H4bWRHndhbtsMvrrXKqa0.T3Mm1tjD82fWoAQkez7egr9TRDIPGDG'),
(36, 's', 's@sd', '$2y$10$4xcX6mPniRMYWorAJDK4wu3/YOcTIV2BwNrebsjCxHGISruunfZBq'),
(37, 'milica', 'milica@email.com', '$2y$10$3mVL4IChWodG1L7Cy1v2Iem.4rDUZoD6rShwAZ1uUS3Kl3Y9altwW'),
(38, 'Michael Johnson', 'michael@email.com', '$2y$10$WaxQjoZp4jXQSCXC51NgHeOjUWYRpBFVLw025TiPfKQfdC8eg697C'),
(39, 'Peter Peterson', 'peter@email.com', '$2y$10$FmdJdgoDzXQWrC5jMzocpOCZUFoHdOwc9uHk8IOdzgT/8lLBy3g4e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `blog_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `blog_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `blog_post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
