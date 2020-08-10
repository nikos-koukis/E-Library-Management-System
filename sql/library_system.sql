-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 10 Αυγ 2020 στις 08:05:46
-- Έκδοση διακομιστή: 10.4.13-MariaDB
-- Έκδοση PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `library_system`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admin_credits`
--

CREATE TABLE `admin_credits` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `admin_credits`
--

INSERT INTO `admin_credits` (`id`, `username`, `password`, `creation_date`, `updation_date`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2020-08-08 14:00:00', '2020-08-09 18:50:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(250) NOT NULL,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `creation_date`, `updation_date`) VALUES
(1, 'William Shakespeare', '2020-08-10 05:40:06', NULL),
(2, 'Emily Dickinson', '2020-08-10 05:40:14', '2020-08-10 05:40:22'),
(3, 'H. P. Lovecraft', '2020-08-10 05:40:39', NULL),
(4, 'Seneca', '2020-08-10 05:40:48', NULL),
(5, 'Theodor Herzl', '2020-08-10 05:40:57', NULL),
(6, 'Anton Chekhov', '2020-08-10 05:41:03', NULL),
(7, 'O. Henry', '2020-08-10 05:41:11', NULL),
(8, ' William Wordsworth', '2020-08-10 05:41:26', NULL);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `books`
--

INSERT INTO `books` (`id`, `book_name`, `category_id`, `author_id`, `price`, `isbn`, `creation_date`, `updation_date`) VALUES
(1, 'A Word of Art', 1, 1, '10 $', '9874563256985', '2020-08-10 06:01:23', '2020-08-10 06:01:27'),
(2, 'Microsoft', 4, 8, '45 $', '5210365478963', '2020-08-10 06:01:53', NULL),
(3, 'Odyssey', 8, 3, '15 $', '7896325412', '2020-08-10 06:03:46', NULL);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `status` int(1) NOT NULL,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updation_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`, `creation_date`, `updation_date`) VALUES
(1, 'Arts & Music', 1, '2020-08-10 05:36:29', '2020-08-10 05:40:32'),
(2, 'Biographies', 0, '2020-08-10 05:36:38', '2020-08-10 05:39:21'),
(3, 'Comics', 1, '2020-08-10 05:36:44', NULL),
(4, 'Computers & Tech', 1, '2020-08-10 05:37:07', NULL),
(5, 'Cooking', 0, '2020-08-10 05:37:14', '2020-08-10 05:39:24'),
(6, 'Edu & Reference', 1, '2020-08-10 05:37:31', NULL),
(7, 'Health & Fitness', 1, '2020-08-10 05:37:46', NULL),
(8, 'History', 1, '2020-08-10 05:37:50', NULL),
(9, 'Hobbies & Crafts', 0, '2020-08-10 05:38:06', '2020-08-10 05:39:28'),
(10, 'Horror', 1, '2020-08-10 05:38:12', NULL),
(11, 'Kids', 1, '2020-08-10 05:38:32', NULL),
(12, 'Medical', 0, '2020-08-10 05:38:49', '2020-08-10 05:39:36'),
(13, 'Mysteries', 1, '2020-08-10 05:38:56', NULL),
(14, 'Romance', 1, '2020-08-10 05:39:05', NULL),
(15, 'Travel', 1, '2020-08-10 05:39:15', NULL);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp(),
  `upd_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` int(1) DEFAULT 1,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `students`
--

INSERT INTO `students` (`id`, `username`, `email`, `phone`, `reg_date`, `upd_date`, `status`, `password`) VALUES
(1, 'Giorgos Nikolaou', 'giorgosnikolaou@gmail.com', '2547896325', '2020-08-10 05:29:49', '2020-08-10 05:29:49', 1, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(2, 'Giorgos Antypas', 'giorgosantypas@hotmail.com', '6985210365', '2020-08-10 05:31:34', '2020-08-10 05:31:34', 1, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(3, 'Giannis Mosxos', 'giannismosxos@yahoo.gr', '6021478963', '2020-08-10 05:32:01', '2020-08-10 05:35:17', 0, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(4, 'Giorgos Ninos', 'giorgosninos@hotmail.com', '6985412547', '2020-08-10 05:32:41', NULL, 1, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(5, 'Nikos Giannopoulos', 'nikosgiannopoulos@gmail.com', '6985214562', '2020-08-10 05:33:48', '2020-08-10 05:35:19', 0, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(6, 'Nikos Sideris', 'nikossideris@gmail.com', '6203587452', '2020-08-10 05:34:29', NULL, 1, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(7, 'Dimitris Giannopoulos', 'dimitrisgianoopoulos@hotmail.com', '6987452012', '2020-08-10 05:35:04', NULL, 1, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `admin_credits`
--
ALTER TABLE `admin_credits`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_fk1` (`category_id`),
  ADD KEY `books_fk2` (`author_id`);

--
-- Ευρετήρια για πίνακα `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `admin_credits`
--
ALTER TABLE `admin_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT για πίνακα `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_fk1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_fk2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
