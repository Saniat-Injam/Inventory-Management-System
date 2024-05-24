-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 04:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminsId` int(100) NOT NULL,
  `adminsFirstname` varchar(100) NOT NULL,
  `adminsLastname` varchar(100) NOT NULL,
  `adminsEmail` varchar(100) NOT NULL,
  `adminsAid` varchar(100) NOT NULL,
  `adminsPwd` varchar(300) NOT NULL,
  `adminsImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminsId`, `adminsFirstname`, `adminsLastname`, `adminsEmail`, `adminsAid`, `adminsPwd`, `adminsImage`) VALUES
(2, 'Tahmid', 'Shahriar', 'tahmidshahriar.bd@gmail.com', 'admin001', '$2y$10$wi9NlPNKAJeOJc7.Jfs4yeyoIu5epoZc25EJVj1eDwZ4hwV8bZAD2', 'a.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_unit` int(100) NOT NULL,
  `product_unitprice` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_name`, `product_type`, `product_desc`, `product_unit`, `product_unitprice`) VALUES
(2, 'Napa', 'tablet', 'This paracetamol is indicated for fever, common cold and influenza, headache, toothache, earache, bodyache, myalgia, neuralgia, dysmenorrhoea, sprains, colic pain, back pain, post-operative pain, postpartum pain, inflammatory pain and post vaccination pain in children. It is also indicated for rheum', 20, 80),
(3, 'Adovas', 'syrup', 'This herbal cough syrup liquefies phlegm. It soothes irritation of the throat. Helps to relieve hoarseness. It is a remedy for all types of cough such as dry irritable cough, allergic & smokers cough', 20, 65),
(7, 'Esoral', 'tablet', 'Esomeprazole is a proton pump inhibitor that suppresses gastric acid secretion by specific inhibition of the H+/K+ ATPase in the gastric parietal cell. Esomeprazole (S-isomer of omeprazole) is the first single optical isomer of proton pump inhibitor, provides better acid control than racemic proton pump inhibitors.', 60, 240),
(8, 'Esoral', 'IV injection', 'Esomeprazole is a proton pump inhibitor that suppresses gastric acid secretion by specific inhibition of the H+/K+ ATPase in the gastric parietal cell. Esomeprazole (S-isomer of omeprazole) is the first single optical isomer of proton pump inhibitor, provides better acid control than racemic proton pump inhibitors.', 15, 90),
(9, 'Tufnil', 'tablet', 'It is used specifically for relieving the pain of migraine headache and also recommended for use as an analgesic in post-operative pain and fever.', 15, 400),
(10, 'Loratin', 'tablet', 'Loratadine tablet provides fast, effective relief from the symptoms of seasonal allergic rhinitis, perennial allergic rhinitis and skin allergies including chronic urticaria. It is also effective in alleviating symptoms of allergic rhinitis such as sneezing, nasal discharge, itching, ocular itching and burning. Nasal and ocular sign and symptoms are relieved rapidly after oral administration. Loratadine tablet is also indicated in idiopathic urticaria. In children over 2 years Loratadine tablet ', 145, 300);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_ID` int(100) NOT NULL,
  `t_type` varchar(100) NOT NULL,
  `t_product` varchar(100) NOT NULL,
  `p_ID` int(100) NOT NULL,
  `t_unit` int(100) NOT NULL,
  `t_cost` int(100) NOT NULL,
  `t_date` varchar(100) NOT NULL,
  `t_time` varchar(100) NOT NULL,
  `t_month` varchar(100) NOT NULL,
  `t_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_ID`, `t_type`, `t_product`, `p_ID`, `t_unit`, `t_cost`, `t_date`, `t_time`, `t_month`, `t_year`) VALUES
(17, 'Purchase', 'Adovas', 3, 30, 1950, '2021-12-28', '00:09:06', 'December', '2021'),
(18, 'Sell', 'Adovas', 3, 20, 1300, '2021-12-28', '00:09:43', 'December', '2021'),
(21, 'Purchase', 'Esoral', 7, 40, 9000, '2021-12-28', '17:30:55', 'November', '2021'),
(22, 'Purchase', 'Napa', 2, 30, 200, '2021-12-28', '22:32:01', 'November', '2021'),
(24, 'Purchase', 'Tufnil', 9, 25, 9500, '2021-12-28', '22:34:27', 'October', '2021'),
(25, 'Purchase', 'Loratin', 10, 50, 14000, '2021-12-28', '22:35:13', 'October', '2021'),
(26, 'Sell', 'Napa', 2, 30, 2400, '2021-12-28', '22:38:55', 'December', '2021'),
(27, 'Sell', 'Adovas', 3, 20, 1300, '2021-12-28', '22:41:02', 'November', '2021'),
(28, 'Sell', 'Esoral', 7, 10, 2400, '2021-12-28', '22:41:33', 'November', '2021'),
(29, 'Sell', 'Esoral', 8, 25, 2250, '2021-12-28', '22:43:36', 'October', '2021'),
(30, 'Sell', 'Tufnil', 9, 50, 20000, '2021-12-28', '22:44:51', 'October', '2021'),
(31, 'Sell', 'Loratin', 10, 5, 1500, '2021-12-28', '22:45:49', 'October', '2021'),
(32, 'Sell', 'Napa', 2, 20, 1600, '2021-12-28', '22:46:14', 'October', '2021'),
(35, 'Sell', 'Napa', 2, 20, 1600, '2022-01-09', '17:08:01', 'January', '2022'),
(36, 'Sell', 'Napa', 2, 20, 1600, '2022-01-09', '17:10:11', 'January', '2022'),
(37, 'Purchase', 'Napa', 2, 10, 1600, '2022-01-09', '17:11:12', 'January', '2022'),
(38, 'Sell', 'Napa', 2, 10, 1300, '2022-01-09', '17:13:50', 'January', '2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminsId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_ID`),
  ADD KEY `transaction_ibfk_1` (`p_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminsId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`p_ID`) REFERENCES `product` (`product_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
