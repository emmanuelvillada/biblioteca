-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 04:13 AM
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
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `isbn`, `publisher`, `code`, `synopsis`, `image_path`, `status`) VALUES
(14, 'Clean code', 'Robert C.Martin', '9780132350', 'Pearson', '2', 'Clean Code, o Código Limpio, es una filosofía de desarrollo de software que consiste en aplicar técnicas simples que facilitan la escritura y lectura de un código, volviéndolo más fácil de entender.', 'imgbook_665792980f1b9.jpg', 'available'),
(15, 'Memorias de mis putas tristes', 'Gabriel Garcia Marquez', '9788439711650', 'LITERATURA RANDOM HOUSE', '3', 'La primera novela de Gabriel García Márquez en diez años.\"El año de mis noventa años quise regalarme una noche de amor loco con una adolescente virgen.', 'imgbook_665793ac74e9c.jpg', 'available'),
(17, 'La iliada', 'Homero', '9780140445046', 'Editorial Juventud', '5', 'La Ilíada es una epopeya griega, atribuida tradicionalmente a Homero. Compuesta en hexámetros dactílicos, consta de 15 693 versos y su trama radica en la cólera de Aquiles.​ Narra los acontecimientos ocurridos durante 51 días en el décimo y último año de la guerra de Troya.', '../img/book_6663b435b283a.jpeg', 'available'),
(19, 'El olvido que seremos', 'Hector Abad Faciolince', ' 978037422397', 'Planeta', '9', 'La historia del padre de un escritor colombiano. Su padre fue un profesor universitario que promovió la tolerancia y los derechos humanos en su país. El escritor expone sus sentimientos relacionados con su adorable padre.', '../img/book_6663bbe44a8ff.jpg', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `user_document_number` varchar(255) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_history`
--

CREATE TABLE `loan_history` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `document_number` varchar(255) DEFAULT NULL,
  `book_code` varchar(255) DEFAULT NULL,
  `book_title` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_history`
--

INSERT INTO `loan_history` (`id`, `user_name`, `document_number`, `book_code`, `book_title`, `start_date`, `end_date`) VALUES
(7, 'Julián', '789456', '1', 'El olvido que seremos', '2024-05-30', '2024-05-29'),
(8, 'Julián', '789456', '2', 'Clean code', '2024-05-30', '2024-05-29'),
(9, 'andres', '753951', '1', 'El olvido que seremos', '2024-05-30', '2024-05-29'),
(10, 'Julián', '789456', '1', 'El olvido que seremos', '2024-05-30', '2024-05-29'),
(11, 'Julián', '789456', '2', 'Clean code', '2024-05-30', '2024-05-29'),
(12, 'Sandra ivette', '43623445', '1', 'El olvido que seremos', '2024-06-08', '2024-06-07'),
(13, 'Sandra ', '43623445', '3', 'Memorias de mis putas tristes', '2024-06-08', '2024-06-07'),
(14, 'Julián', '789456', '2', 'Clean code', '2024-06-14', '2024-06-07'),
(15, 'Sandra', '43623665', '3', 'Memorias de mis putas tristes', '2024-06-08', '2024-06-07'),
(16, 'Sandra', '43623665', '2', 'Clean code', '2024-06-08', '2024-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `document_number` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `document_number`, `birth_date`, `password`, `role`) VALUES
(10, 'Julian', 'Zapata', '1193131587', '2001-02-09', '$2y$10$IIlrG4.EkxsSscmXDvRpo.T/MRZoiAvA/U2HFGiyGnTwBUs0fyqgi', 'admin'),
(12, 'Sandra', 'Gutierrez', '43623665', '1996-07-17', '$2y$10$VFO5d47J9M4BoXqHGdZElehZhePlWoorY1FkebpXZCsN5QT0MFM7S', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_history`
--
ALTER TABLE `loan_history`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `loan_history`
--
ALTER TABLE `loan_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
