-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2023 at 10:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BookRMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_read`
--

CREATE TABLE `books_read` (
  `id` int(11) NOT NULL,
  `book` text NOT NULL,
  `author` text NOT NULL,
  `book_read_date` date NOT NULL,
  `book_cover` text NOT NULL,
  `repeat_count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_read`
--

INSERT INTO `books_read` (`id`, `book`, `author`, `book_read_date`, `book_cover`, `repeat_count`) VALUES
(1, 'When you can walk on water take the boat', 'John Herricharan', '2015-01-01', 'book_covers_uploaded/647b8a99d1d67.jpg', 1),
(2, 'Digital Fortress.', 'Dan Brown', '2015-01-01', 'book_covers_uploaded/647b9b318ecf5.jpg', 1),
(3, 'Angels and Demons.', 'Dan Brown', '2015-01-01', 'book_covers_uploaded/647b9c23405c5.jpg', 1),
(4, 'Da Vinci Code.', 'Dan Brown', '2015-01-01', 'book_covers_uploaded/647b9cad24666.jpg', 1),
(5, 'The Heart Breaker', 'Susan Howatch', '2015-01-01', 'book_covers_uploaded/647b9d2f302cc.jpg', 1),
(6, 'Deception Point.', 'Dan Brown', '2015-01-01', 'book_covers_uploaded/647b9da860ac8.jpg', 1),
(7, 'The Lost Symbol', 'Dan Brown', '2015-01-01', 'book_covers_uploaded/647b9e2b10dbd.jpg', 1),
(8, 'King Lear. (play)', 'William Shakespeare', '2015-01-01', 'book_covers_uploaded/647b9ed0a77ee.jpg', 1),
(9, 'Jonathan Livingston seagull', 'Richard Bach', '2015-01-01', 'book_covers_uploaded/647b9f83b55bd.jpg', 1),
(10, 'Inferno', 'Dan Brown', '2015-01-01', 'book_covers_uploaded/647b9ff541686.jpg', 1),
(11, 'Twilight', 'Stefanie Mayer', '2015-01-01', 'book_covers_uploaded/647ba1e4da6eb.jpg', 1),
(13, 'The Hunger Games', 'Suzanne Collins', '2016-01-01', 'book_covers_uploaded/647ba27f6c893.jpg', 1),
(14, 'Catching Fire', 'Suzanne Collins', '2016-01-01', 'book_covers_uploaded/647ba2bec467a.jpg', 1),
(15, 'Mocking Jay', 'Suzanne Collins', '2016-01-01', 'book_covers_uploaded/647ba303dc306.jpg', 1),
(16, 'Mash', 'Richard Hooker', '2016-01-01', 'book_covers_uploaded/647ba7f78167c.jpg', 1),
(17, 'The Fifth Mountain', 'Paulo Coelho', '2016-01-01', 'book_covers_uploaded/647ba84d20ba7.jpg', 1),
(18, 'Harry Potter and the Philosopher’s Stone', 'J.K. Rowling', '2016-01-01', 'book_covers_uploaded/647ba8cc79eef.jpg', 1),
(19, 'The Alchemist', 'Paulo Coelho', '2016-05-08', 'book_covers_uploaded/647baa5d57a40.jpg', 1),
(20, 'Harry Potter and the Order of Phoenix', 'J.K. Rowling', '2016-06-06', 'book_covers_uploaded/647c4bfa8a103.jpg', 1),
(21, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', '2016-06-01', 'book_covers_uploaded/647cd660b4292.jpeg', 1),
(22, 'The Valkyries', 'Paulo Coelho', '2016-07-14', 'book_covers_uploaded/647cd5efd5958.jpg', 1),
(23, 'A Song of Ice and Fire Book 1- \"A Game Of Thrones\"', 'George R.R Martin', '2016-08-22', 'book_covers_uploaded/647c555cdece4.jpg', 1),
(24, 'Good Bye Mr. Chips.', 'James Hilton', '2016-08-28', 'book_covers_uploaded/647c5d3be9a84.jpg', 1),
(25, 'A Song of Ice and Fire Book 2 - \"A Clash Of Kings\"', 'George R.R Martin', '2016-09-17', 'book_covers_uploaded/647c5dbe3225d.jpg', 1),
(26, 'Kannu and Raven', 'Atif Ali', '2016-09-18', 'book_covers_uploaded/647c5e6fb5149.png', 1),
(27, 'A Song of Ice and Fire Book 3 - \"A Storm of Swords\"', 'George R.R Martin', '2016-11-15', 'book_covers_uploaded/647c5ee8a82e0.jpg', 1),
(28, 'Flowers for Algernon', 'Daniel Keyes', '2017-01-28', 'book_covers_uploaded/647c5f417cde3.jpg', 1),
(29, 'In the line of fire', 'Gen. Pervez Musharaf', '2017-06-14', 'book_covers_uploaded/647c5f797e12e.jpg', 1),
(30, 'The Stranger', 'Albert Camus', '2017-06-18', 'book_covers_uploaded/647c604d6fa48.jpg', 1),
(31, 'Tragedy of Karbala', 'Dr. Musharaf Hussain', '2017-06-23', 'book_covers_uploaded/647c613cba3cd.jpg', 1),
(32, 'Body Language - The Definitive Book', 'Allan and Barbara Pease', '2017-08-10', 'book_covers_uploaded/647c61809b50f.jpg', 1),
(33, 'In the Hands of Taliban', 'Yvonne Ridley - Marium', '2017-08-11', 'book_covers_uploaded/647c61c6436d3.jpg', 1),
(34, 'Fifty Shades of Grey', 'E L James', '2017-08-18', 'book_covers_uploaded/647cd685814b1.jpg', 1),
(35, 'Fifty Shades Darker', 'E L James', '2017-08-20', 'book_covers_uploaded/647cd6d74cd32.jpg', 1),
(36, 'Fifty Shades Freed', 'E L James', '2017-08-23', 'book_covers_uploaded/647cd711174da.jpg', 1),
(37, 'Grey. (Fifty Shades of Grey As told by Christian Grey)', 'E L James', '2017-08-28', 'book_covers_uploaded/647cd755a775a.jpg', 1),
(38, 'When Hitler stole pink rabbit.', 'Judith Kerr', '2017-08-29', 'book_covers_uploaded/647cd8f797b53.jpg', 1),
(39, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', '2017-09-22', 'book_covers_uploaded/647cd99175925.jpg', 1),
(40, 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', '2017-09-26', 'book_covers_uploaded/647cd9ce05518.jpg', 1),
(41, 'Harry Potter and The Half-Blood Prince', 'J.K. Rowling', '2017-10-04', 'book_covers_uploaded/647cda16d7f65.jpg', 1),
(42, 'Harry Potter and The Deathly Hallows', 'J.K. Rowling', '2017-10-08', 'book_covers_uploaded/647cdb03bd9ad.jpg', 1),
(43, 'Harry Potter and The Cursed Child', 'J.K. Rowling', '2017-10-10', 'book_covers_uploaded/647cdb8c86e41.jpg', 1),
(44, 'The Other Way Round', 'Judith Kerr', '2017-10-22', 'book_covers_uploaded/647cdc3e39ca5.jpg', 1),
(45, 'A small person far away', 'Judith Kerr', '2018-05-01', 'book_covers_uploaded/647cdc6954f54.jpg', 1),
(46, 'The Pillars of earth - Part 1', 'Ken Follet', '2018-06-28', 'book_covers_uploaded/647c640f884b9.jpg', 1),
(47, 'Why men don’t listen and women can’t read maps', 'Allan and Barbara Pease', '2018-07-12', 'book_covers_uploaded/647cdcde5211e.jpg', 1),
(48, 'TOR-Beginners to Expert Guide to Accessing the Dark Net', 'Bruce Rogers', '2018-07-18', 'book_covers_uploaded/647cdd2e35659.jpg', 1),
(49, 'Ghost in the wires', 'Kevin Mitnick', '2018-07-29', 'book_covers_uploaded/647cdd720555e.jpg', 1),
(50, 'The Pillars of earth - Part 2', 'Ken Follet', '2018-08-13', 'book_covers_uploaded/647cdeacb0ed7.jpg', 1),
(51, 'The Art of Intrusion', 'Kevin Mitnick', '2018-08-13', 'book_covers_uploaded/647cdf148f843.jpg', 1),
(52, 'Catcher in the Rye', 'J.D.Salinger', '2018-08-30', 'book_covers_uploaded/647cdf5529079.jpg', 1),
(53, 'The Maze Runner - 1', 'James Dashner', '2018-09-05', 'book_covers_uploaded/647cdfaae06af.jpg', 1),
(54, 'The Scorch Trials - 2', 'James Dashner', '2018-09-07', 'book_covers_uploaded/647ce06daceed.jpg', 1),
(55, 'The Death Cure - 3', 'James Dashner', '2018-09-08', 'book_covers_uploaded/647ce0a6c293f.jpg', 1),
(56, 'Influence - The Psychology of Persuasion', 'Robert D.Cialdini', '2018-09-10', 'book_covers_uploaded/647ce0da60389.jpg', 1),
(57, 'The Kill Order - 4', 'James Dashner', '2018-09-26', 'book_covers_uploaded/647ce158af80b.jpg', 1),
(58, 'The Fever Code - 5', 'James Dashner', '2018-11-23', 'book_covers_uploaded/647ce1cc231ca.jpg', 1),
(59, 'Things fall apart', 'Chinua Achebe', '2019-02-19', 'book_covers_uploaded/647ce2182e322.jpg', 1),
(60, 'How to influence people and make friends', 'Dale Carnegie', '2019-06-02', 'book_covers_uploaded/647ce2657bac9.jpg', 1),
(61, 'Black Sun', 'Graham Brown', '2019-07-04', 'book_covers_uploaded/647ce2b074bea.jpg', 1),
(62, 'How to catch a Russian Spy', 'Naveed Jamali & Ellis Henican', '2019-08-08', 'book_covers_uploaded/647ce2df2d9d7.jpg', 1),
(63, 'Countdown to zero day – Stuxnet', 'Kim Zetter', '2019-08-28', 'book_covers_uploaded/647ce30f09793.jpeg', 1),
(64, 'No Place to Hide - Edward Snowden, the NSA and the Surveillance State', 'Glenn Greenwald', '2019-09-10', 'book_covers_uploaded/647ce35299b7b.jpg', 1),
(65, 'Overcoming Pakistan\'s Nuclear Dangers', 'Mark Fitzpatrick', '2019-09-17', 'book_covers_uploaded/647ce38c89bc3.jpg', 1),
(66, 'The Man Who Counted', 'Malba Tahan', '2019-11-21', 'book_covers_uploaded/647ce3ee2e0e5.jpg', 1),
(67, 'Mind fire - Big IDEAS for curious minds', 'Scott Berkun', '2019-12-05', 'book_covers_uploaded/647ce42538de3.jpg', 1),
(68, 'Sams Teach yourself TCP/IP in 24 hours', 'Joe Casad', '2020-03-01', 'book_covers_uploaded/647ce4826a2bb.jpg', 1),
(69, 'Certified Ethical Hacker – Foundation Guide', 'Sagar Ajay Rahalkar', '2020-03-23', 'book_covers_uploaded/647ce4c32e756.jpeg', 1),
(70, 'An Introduction to Windows Operating System', 'Einar Krogh', '2020-03-27', 'book_covers_uploaded/647ce535e9c9c.jpg', 1),
(71, 'Origin', 'Dan Brown', '2020-04-06', 'book_covers_uploaded/647ce59a2e06c.jpg', 1),
(72, 'The Richest Man in Babylon', 'George S. Clason', '2020-05-18', 'book_covers_uploaded/647ce5d43c6ef.jpg', 1),
(73, 'Twilight Saga: 2 (New Moon)', 'Stefanie Mayer', '2020-06-27', 'book_covers_uploaded/647ce64aa28c3.jpg', 1),
(74, 'Twilight Saga: 3 (Eclipse)', 'Stefanie Mayer', '2020-07-01', 'book_covers_uploaded/647ce67864074.jpg', 1),
(75, 'Twilight Saga: 4 (Breaking Dawn)', 'Stefanie Mayer', '2020-07-07', 'book_covers_uploaded/647ce6ba37474.jpg', 1),
(76, '48 Laws of Power', 'Robert Greene', '2020-10-10', 'book_covers_uploaded/647ce6e5dfad4.jpg', 1),
(77, 'The Girl with the Dragon Tattoo', 'Stieg Larrson', '2021-04-28', 'book_covers_uploaded/647ce72394bc7.jpg', 1),
(78, 'Lost Islamic History', 'Firas Alkhateeb', '2021-05-28', 'book_covers_uploaded/647ce765e97b7.jpg', 1),
(79, 'Rich Dad Poor Dad', 'Robert Kiyosaki', '2021-06-26', 'book_covers_uploaded/647ce7905a6d6.jpg', 1),
(80, 'Homo Deus', 'Yuval Noah Harrari', '2021-10-13', 'book_covers_uploaded/647ce7c5d0b18.jpg', 1),
(81, 'The Secret Codes', 'Alaa Alsadi', '2021-10-29', 'book_covers_uploaded/647ce8339f66e.jpg', 1),
(82, 'Zero', 'Charles Seife', '2022-02-01', 'book_covers_uploaded/647ce883c3012.jpg', 1),
(83, 'Pakistan ISI and its Operations', 'Owen L Sirrs', '2022-06-25', 'book_covers_uploaded/647ce925decf5.jpg', 1),
(84, 'Kingpin', 'Kevin Poulson', '2022-08-04', 'book_covers_uploaded/647ce95e2fbdd.jpg', 1),
(85, 'The Bride’s Boon', 'Mahmoud M Al-Istamblli', '2022-08-15', 'book_covers_uploaded/647ce9852be6b.jpg', 1),
(86, 'You don\'t know JS (Up and Going)', 'Kyle Simpson', '2023-02-09', 'book_covers_uploaded/647ce9d12393d.jpg', 1),
(87, 'How to NFT', 'CoinGecko', '2023-02-26', 'book_covers_uploaded/647cea176fd7a.png', 1),
(88, 'Think and grow rich', 'Napoleon Hill', '2023-04-13', 'book_covers_uploaded/647cea434c2bc.jpg', 1),
(89, 'Zero to One', 'Peter Thiel', '2023-05-11', 'book_covers_uploaded/647cea7baea84.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `repeat_count`
--

CREATE TABLE `repeat_count` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `repeat_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_read`
--
ALTER TABLE `books_read`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repeat_count`
--
ALTER TABLE `repeat_count`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign_key_book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_read`
--
ALTER TABLE `books_read`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `repeat_count`
--
ALTER TABLE `repeat_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `repeat_count`
--
ALTER TABLE `repeat_count`
  ADD CONSTRAINT `Foreign_key_book_id` FOREIGN KEY (`book_id`) REFERENCES `books_read` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
