-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Cze 2022, 11:32
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pashop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_types`
--

CREATE TABLE `category_types` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `category_types`
--

INSERT INTO `category_types` (`id`, `name`) VALUES
(1, 'men'),
(2, 'women');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delivery_types`
--

CREATE TABLE `delivery_types` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `delivery_types`
--

INSERT INTO `delivery_types` (`id`, `name`) VALUES
(1, 'InPost'),
(2, 'Collection in person');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `fname`, `lname`, `delivery_id`, `price`, `payment_id`, `status_id`, `order_date`) VALUES
(3, 'Paweł', 'Drozdowski', 1, 25, 2, 2, '2022-05-16 09:12:09'),
(4, 'Tymon', 'Tymański', 1, 40, 1, 3, '2022-05-25 14:44:57'),
(5, 'Tymon', 'Tymański', 2, 40, 2, 2, '2022-05-25 14:48:17'),
(6, 'John', 'Doo', 1, 105, 1, 1, '2022-05-25 14:49:48'),
(8, 'Paweł', 'Drozdowski', 1, 69, 1, 1, '2022-06-03 22:57:45'),
(9, 'Paweł', 'Test', 2, 69, 2, 1, '2022-06-03 22:58:29'),
(10, 'Paweł', 'Drozdowski', 1, 25, 1, 1, '2022-06-03 23:04:52'),
(12, 'Paweł', 'Drozdowski', 1, 25, 1, 1, '2022-06-03 23:10:34'),
(13, 'Paweł', 'Drozdowski', 1, 105, 1, 1, '2022-06-03 23:25:21'),
(14, 'Paweł', 'Drozdowski', 1, 305, 1, 1, '2022-06-04 10:25:37'),
(15, 'Paweł', 'Drozdowski', 1, 115, 2, 1, '2022-06-04 10:34:51'),
(16, 'Paweł', 'Drozdowski', 2, 115, 2, 1, '2022-06-04 11:02:11'),
(17, 'Paweł', 'Drozdowski', 2, 115, 2, 1, '2022-06-04 11:28:20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`) VALUES
(1, 'check'),
(2, 'cash');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `base_id` int(11) NOT NULL,
  `size` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`base_id`, `size`, `quantity`, `enabled`) VALUES
(1, 'M', 44, 1),
(1, 'S', 30, 0),
(1, 'XL', 11, 0),
(2, 'L', 12, 1),
(2, 'XL', 5, 1),
(3, 'L', 21, 1),
(3, 'M', 32, 1),
(3, 'S', 13, 1),
(4, 'M', 32, 0),
(4, 'S', 44, 0),
(4, 'XL', 36, 1),
(5, 'M', 14, 0),
(6, 'M', 40, 1),
(6, 'S', 4, 0),
(6, 'XL', 13, 1),
(7, 'L', 14, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_base`
--

CREATE TABLE `product_base` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(2) NOT NULL,
  `description` varchar(400) NOT NULL,
  `category` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `product_base`
--

INSERT INTO `product_base` (`id`, `name`, `price`, `description`, `category`) VALUES
(1, 'Gio Dress', 50, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum autem natus, porro obcaecati velit voluptate repellendus in voluptas. Reiciendis consequatur quam voluptatibus magnam, id unde vitae cumque quisquam quidem.', 2),
(2, 'Giorno Pants', 20, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, facere consequuntur. Cumque, illum aperiam totam temporibus a ipsam debitis quisquam aliquam expedita ratione minus. Sint eos voluptatem laboriosam provident enim', 1),
(3, 'Joop Shirt', 25, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptate exercitationem quis iure nemo consequatur eum, harum accusantium repudiandae cum, quasi facere illum amet minus deserunt. Quae cupiditate culpa laboriosam', 1),
(4, 'Test', 55, 'Testing', 1),
(5, 'Test2', 56, 'Testing 2', 1),
(6, 'Green Shirt', 60, 'Testing 123', 1),
(7, 'Grey Shirt', 55, 'This shirt is grey. That\'s a cool color', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role_types`
--

CREATE TABLE `role_types` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `role_types`
--

INSERT INTO `role_types` (`id`, `name`) VALUES
(1, 'Employee'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `size_types`
--

CREATE TABLE `size_types` (
  `id` int(11) NOT NULL,
  `name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `size_types`
--

INSERT INTO `size_types` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_types`
--

CREATE TABLE `status_types` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `status_types`
--

INSERT INTO `status_types` (`id`, `name`) VALUES
(1, 'in realization'),
(2, 'delivered'),
(3, 'canceled');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `mail`, `role_id`, `enabled`, `password`) VALUES
(1, 'John', 'Doe', 'johndoe@mail.com', 2, 1, '1234'),
(2, 'Johnny', 'Bravo', 'johnnybravo@mail.com', 1, 0, '123'),
(3, 'Jonathan', 'Joestar', 'jojo@mail.com', 1, 1, '123'),
(4, 'test', 'test1', 'ara@gmail.com', 1, 1, '123'),
(6, 'test_', 'test_', 'ara_@mail.com', 2, 0, '123'),
(7, 'test', 'test1', 'ara@gmail.com', 1, 0, '123'),
(8, 'test_123', 'test_test', 'test@gmail.com', 1, 1, '123'),
(9, 'test', 'test1', 'ara@gmail.com', 1, 0, '123'),
(10, 'test', 'test1', 'ara@gmail.com', 1, 0, '123'),
(11, 'test', 'test2', 'ara2@gmail.com', 1, 0, '2222'),
(12, 'test', 'test2', 'ara2@gmail.com', 1, 1, '2222'),
(13, 'test', 'test3', 'ara3@gmail.com', 1, 1, '333'),
(14, 'test', 'test3', 'ara3@gmail.com', 1, 0, '333'),
(15, 'test', 'test3', 'ara3@gmail.com', 1, 1, '333'),
(16, 'test', 'test3', 'ara3@gmail.com', 1, 0, '333'),
(17, 'test', 'test4', 'ara4@gmail.com', 1, 1, '333'),
(18, 'test', 'test5', 'ara5@gmail.com', 2, 1, '122'),
(19, 'test55', 'test55', 'test55@mail.com', 2, 1, '444');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `delivery_types`
--
ALTER TABLE `delivery_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_id` (`delivery_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indeksy dla tabeli `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`base_id`,`size`);

--
-- Indeksy dla tabeli `product_base`
--
ALTER TABLE `product_base`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indeksy dla tabeli `role_types`
--
ALTER TABLE `role_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `size_types`
--
ALTER TABLE `size_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `status_types`
--
ALTER TABLE `status_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `delivery_types`
--
ALTER TABLE `delivery_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `role_types`
--
ALTER TABLE `role_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `size_types`
--
ALTER TABLE `size_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `status_types`
--
ALTER TABLE `status_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`delivery_id`) REFERENCES `delivery_types` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment_types` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status_types` (`id`);

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`base_id`) REFERENCES `product_base` (`id`);

--
-- Ograniczenia dla tabeli `product_base`
--
ALTER TABLE `product_base`
  ADD CONSTRAINT `product_base_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category_types` (`id`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
