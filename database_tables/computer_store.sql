-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2021 at 02:33 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Name` varchar(255) NOT NULL,
  `Price` float DEFAULT NULL,
  `img_dir` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Name`, `Price`, `img_dir`, `type`, `UserID`) VALUES
('hiopooloo', 67.89, '../images/Products/Systems/Alseye PC Case Aluminium ITX Case for Gaming.jpg', 'systems', 13),
('hiopooloo', 50.99, '../images/Products/Systems/NZXT ATX Starter Gaming PC.jpg', 'systems', 13),
('hiopooloo', 99.99, '../images/Products/Systems/Thermaltake Gaming PC Case Mid-Tower.jpg', 'systems', 13),
('HIYAAAAA', 99.99, '../images/Products/Components/AMD Ryzen 7 5700G 8-core Processor.jpg', 'components', 15),
('HIYAAAAA', 67.89, '../images/Products/Systems/Alseye PC Case Aluminium ITX Case for Gaming.jpg', 'systems', 15),
('johnWick12', 50.99, '../images/Products/Components/SAMSUNG M2 SSD 500GB.jpg', 'components', 1),
('johnWick12', 67.99, '../images/Products/Components/Seagate Barracuda 2TB HDD.jpg', 'components', 1),
('johnWick12', 67.89, '../images/Products/Systems/Alseye PC Case Aluminium ITX Case for Gaming.jpg', 'systems', 1),
('jojoWick', 93.99, '../images/Products/Components/Cooler Master Hyper Black Edition RGB CPU Cooler.jpg', 'components', 20);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` decimal(4,2) DEFAULT NULL,
  `img_dir` varchar(1024) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Price`, `img_dir`, `type`) VALUES
(0, 'Alseye PC Case Aluminium ITX Case for Gaming', '67.89', '../images/Products/Systems/Alseye PC Case Aluminium ITX Case for Gaming.jpg', 'systems'),
(1, 'Deco Mid-Tower PC Gaming Case', '99.99', '../images/Products/Systems/Deco Mid-Tower PC Gaming Case.jpg', 'systems'),
(2, 'T5 Computer Case ATX Desktop Chassis Gaming PC', '99.99', '../images/Products/Systems/T5 Computer Case ATX Desktop Chassis Gaming PC.png', 'systems'),
(3, 'Thermaltake Gaming PC Case Mid-Tower', '99.99', '../images/Products/Systems/Thermaltake Gaming PC Case Mid-Tower.jpg', 'systems'),
(4, 'Silverstone Technology Gaming Slim Computer Case', '99.99', '../images/Products/Systems/Silverstone Technology Gaming Slim Computer Case.jpg', 'systems'),
(5, 'Classic Brands Phoenix ATX Black Mid-Tower PC Gaming Case', '99.99', '../images/Products/Systems/Classic Brands Phoenix ATX Black Mid-Tower PC Gaming Case.jpg', 'systems'),
(16, 'MSI Motherboard Gaming Motherboard (AMD, DDR4, PCIe 4, M2)', '64.99', '../images/Products/Components/MSI Motherboard Gaming Motherboard (AMD, DDR4, PCIe 4, M2).png', 'components'),
(17, 'AMD Ryzen 7 5700G 8-core Processor', '99.99', '../images/Products/Components/AMD Ryzen 7 5700G 8-core Processor.jpg', 'components'),
(19, 'AMD Ryzen 7 5800X, 16-Threaded Processor', '99.99', '../images/Products/Components/AMD Ryzen 7 5800X, 16-Threaded Processor.jpg', 'components'),
(20, 'ASUS ROG Strix B450-F Gaming', '99.99', '../images/Products/Components/ASUS ROG Strix B450-F Gaming.jpg', 'components'),
(22, 'Cooler Master Hyper Black Edition RGB CPU Cooler', '93.99', '../images/Products/Components/Cooler Master Hyper Black Edition RGB CPU Cooler.jpg', 'components'),
(23, 'SAMSUNG M2 SSD 500GB', '50.99', '../images/Products/Components/SAMSUNG M2 SSD 500GB.jpg', 'components'),
(24, 'Seagate Barracuda 2TB HDD', '67.99', '../images/Products/Components/Seagate Barracuda 2TB HDD.jpg', 'components'),
(25, 'Western Digital 4TB HDD', '73.21', '../images/Products/Components/Western Digital 4TB HDD.jpg', 'components'),
(26, 'Intel Core i7-10700K Processor 8 Cored 5 Ghz', '99.99', '../images/Products/Components/Intel Core i7-10700K Processor 8 Cored 5 Ghz.jpg', 'components'),
(28, 'NZXT ATX Starter Gaming PC', '50.99', '../images/Products/Systems/NZXT ATX Starter Gaming PC.jpg', 'systems'),
(29, 'Samsung 870 EVO 500GB 2.5 Inch SATA III Internal SSD (MZ-77E500B/AM)', '94.99', '../images/Products/Components/Samsung 870 EVO 500GB 2.5 Inch SATA III Internal SSD (MZ-77E500BAM).jpg', 'components'),
(30, 'MSI Computer Video Graphic Cards GeForce GTX 1050 TI GAMING X 4G, 4GB', '99.99', '../images/Products/Components/MSI Computer Video Graphic Cards GeForce GTX 1050 TI GAMING X 4G, 4GB.jpg', 'components'),
(31, '\r\nEVGA GeForce GTX 1060 SC GAMING, ACX 2.0 (Single Fan), 06G-P4-6163-KR, 6GB GDDR5,', '99.99', '../images/Products/Components/EVGA GeForce GTX 1060 SC GAMING, ACX 2.0 (Single Fan), 06G-P4-6163-KR, 6GB GDDR5.jpg', 'components'),
(32, 'Intel Core i3-10100F - Core i3 10th Gen Comet Lake Quad-Core 3.6 GHz LGA 1200 65W Desktop Processor - BX8070110100F', '99.99', '../images/Products/Components/Intel Core i3-10100F - Core i3 10th Gen Comet Lake Quad-Core 3.6 GHz LGA 1200 65W Desktop Processor - BX8070110100F.jpg', 'components'),
(33, 'AMD Ryzen 5 5600X - Ryzen 5 5000 Series Vermeer (Zen 3) 6-Core 3.7 GHz Socket AM4 65W Desktop Processor', '99.99', '../images/Products/Components/AMD Ryzen 5 5600X - Ryzen 5 5000 Series Vermeer (Zen 3) 6-Core 3.7 GHz Socket AM4 65W.jpg', 'components'),
(34, 'ASUS ROG Strix Z590-A Gaming WiFi 6 LGA 1200 (Intel 11th/10th Gen) ATX White Scheme Gaming Motherboard', '99.99', '../images/Products/Components/ASUS ROG Strix Z590-A Gaming WiFi 6 LGA 1200 (Intel 11th10th Gen) ATX White Scheme Gaming Motherboard.jpg', 'components'),
(35, 'ASRock A520M-HDV AM4 AMD A520 SATA 6Gb/s Micro ATX AMD Motherboard', '62.99', '../images/Products/Components/ASRock A520M-HDV AM4 AMD A520 SATA 6Gbs Micro ATX AMD Motherboard.jpg', 'components'),
(36, 'be quiet! 250W TDP Dark Rock Pro 4 CPU Cooler with Silent Wings - PWM Fan - 135 mm LGA 1700 Compatible', '82.99', '../images/Products/Components/be quiet! 250W TDP Dark Rock Pro 4 CPU Cooler with Silent Wings - PWM Fan - 135 mm LGA 1700 Compatible.jpg', 'components'),
(37, 'Intel Core i5-11600K - Core i5 11th Gen Rocket Lake 6-Core 3.9 GHz LGA 1200 125W Intel UHD Graphics 750', '99.99', '../images/Products/Components/Intel Core i5-11600K - Core i5 11th Gen Rocket Lake 6-Core 3.9 GHz LGA 1200 125W Intel UHD Graphics 750.jpg', 'components'),
(38, 'Nintendo Switch 32GB Console', '99.99', '../images/Products/Gaming/Nintendo Switch 32GB Console.jpg', 'gaming'),
(39, 'PS5 Playstation 5 Disc Edition Gaming Console', '99.99', '../images/Products/Gaming/PS5 Playstation 5 Disc Edition Gaming Console.jpg', 'gaming'),
(40, 'Microsoft Xbox One X 1TB Console with Wireless Controller', '99.99', '../images/Products/Gaming/Microsoft Xbox One X 1TB Console with Wireless Controller.jpg', 'gaming'),
(41, 'TCL 40-inch 1080p Smart LED Roku TV', '99.99', '../images/Products/Electronics/TCL 40-inch 1080p Smart LED Roku TV.jpg', 'electronics'),
(42, 'Sony DVPSR510H DVD Player', '39.99', '../images/Products/Electronics/Sony DVPSR510H DVD Player.jpg', 'electronics'),
(43, 'JBL Charge 3 Waterproof Portable Bluetooth Speaker (Black)', '99.99', '../images/Products/Electronics/JBL Charge 3 Waterproof Portable Bluetooth Speaker (Black).jpg', 'electronics'),
(44, 'Apple Watch SE (GPS, 40mm) - Space Grey Aluminium Case with Midnight Sport Band - Regular', '99.99', '../images/Products/Electronics/Apple Watch SE (GPS, 40mm) - Space Grey Aluminium Case with Midnight Sport Band - Regular.jpg', 'electronics'),
(45, 'NETGEAR AC1200 Wi-Fi USB 3.0 Adapter', '54.99', '../images/Products/Network/NETGEAR AC1200 Wi-Fi USB 3.0 Adapter.jpg', 'network'),
(46, 'TP-Link AC1750 Smart WiFi Router', '49.99', '../images/Products/Network/TP-Link AC1750 Smart WiFi Router.jpg', 'network'),
(47, 'NETGEAR WiFi Router (R6230)', '49.99', '../images/Products/Network/NETGEAR WiFi Router (R6230).jpg', 'network'),
(48, 'Cat 6 Ethernet Cable 50 ft White', '12.99', '../images/Products/Network/Cat 6 Ethernet Cable 50 ft White.jpg', 'network'),
(49, 'HP DeskJet 4155e All-in-One Wireless Color Printer', '99.99', '../images/Products/Office/HP DeskJet 4155e All-in-One Wireless Color Printer.jpg', 'office'),
(50, 'Hammermill Printer Paper, 20 Lb Copy Paper, 11 x 17 - 1 Ream (500 Sheets)', '39.99', '../images/Products/Office/Hammermill Printer Paper, 20 Lb Copy Paper, 11 x 17 - 1 Ream (500 Sheets).jpg', 'office'),
(51, 'Logitech MK270 Wireless Keyboard and Mouse Combo', '19.99', '../images/Products/Office/Logitech MK270 Wireless Keyboard and Mouse Combo.jpg', 'office'),
(52, 'Aurora AU1230XA Anti-Jam 12-Sheet Crosscut Paper and Credit Card Shredder', '58.99', '../images/Products/Office/Aurora AU1230XA Anti-Jam 12-Sheet Crosscut Paper and Credit Card Shredder.jpg', 'office');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `password`, `email`) VALUES
(1, 'johnWick12', 'hellogupta12', 'johnWick12@gmail.com'),
(12, 'yala', 'wio', 'yala@gmail.com'),
(13, 'hiopooloo', 'weifiwfwif', 'hiopooloo@gmail.com'),
(15, 'HIYAAAAA', 'igloo', 'HIYAAAAA@gmail.com'),
(17, 'yoyospinner', 'eifneifie', 'yoyospinner@gmail.com'),
(20, 'jojoWick', 'efjoefe', 'jojoWick@gmail.com');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Name`,`img_dir`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`,`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
