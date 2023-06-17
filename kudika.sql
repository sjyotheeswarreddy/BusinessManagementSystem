-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 10:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kudika`
--

-- --------------------------------------------------------

--
-- Table structure for table `addsupport`
--

CREATE TABLE `addsupport` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `issue_type` varchar(30) NOT NULL,
  `message` varchar(30) NOT NULL,
  `pro_img` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addsupport`
--

INSERT INTO `addsupport` (`id`, `user_id`, `issue_type`, `message`, `pro_img`, `status`) VALUES
(17, 10, 'problem1', 'problem', 'support/productHOia8MN.jpg', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Sno` int(25) NOT NULL,
  `Name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `GST_Number` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Address` varchar(25) CHARACTER SET latin1 NOT NULL,
  `PhoneNumber` varchar(25) CHARACTER SET latin1 NOT NULL,
  `UserName` varchar(25) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Head_Name` varchar(25) CHARACTER SET latin1 NOT NULL,
  `BusinessProof` varchar(25) CHARACTER SET latin1 NOT NULL,
  `BusinessLogo` varchar(25) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Sno`, `Name`, `GST_Number`, `Address`, `PhoneNumber`, `UserName`, `Password`, `Head_Name`, `BusinessProof`, `BusinessLogo`, `status`) VALUES
(1, 'Sagar software solutions', '20220014', 'Vijayawada', '9987456226', 'kumar@gmail.com', 'STA3R1o4SkZzQUhKY3IzWklHbVMvTVIyUndVTGV3NU1idk5jNFFRbG1yd09XeHhCZExMOFJpenZUSG12MCtyVA==', 'ritish jogi1', 'cc cam53110', 'logo.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(255) NOT NULL,
  `merchant_id` int(255) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `starttime` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `merchant_id`, `empid`, `starttime`, `endtime`, `status`) VALUES
(10, 1, 'as11', ' :00', ' :10', '0'),
(11, 1, 'as11', '2022-07-05 09:53:00', '2022-07-05 18:53:10', '0'),
(12, 1, 'as12', '2022-07-04 09:57:00', '2022-07-04 18:57:10', '0'),
(13, 1, 'as111', '2022-07-05 09:44:00', '2022-07-06 18:44:10', '0'),
(14, 1, 'as11', '2022-07-02 12:19:00', '2022-07-02 18:19:10', '0');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `id` int(11) NOT NULL,
  `merchant_id` int(255) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `dateof` varchar(255) NOT NULL,
  `empname` varchar(50) NOT NULL,
  `emprole` varchar(50) NOT NULL,
  `empqua` varchar(50) NOT NULL,
  `empadd` varchar(255) NOT NULL,
  `empgen` varchar(50) NOT NULL,
  `empimg` varchar(255) NOT NULL,
  `businessname` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeedetails`
--

INSERT INTO `employeedetails` (`id`, `merchant_id`, `empid`, `dateof`, `empname`, `emprole`, `empqua`, `empadd`, `empgen`, `empimg`, `businessname`, `status`) VALUES
(15, 10, 'as101', '2022-07-06', 'afy', 'dev', 'be', 'street', 'male', 'employee/employee.jpg', 'as', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `uploaddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `spendfor` varchar(255) NOT NULL,
  `spendby` varchar(255) NOT NULL,
  `billfile` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user_id`, `uploaddate`, `spendfor`, `spendby`, `billfile`, `amount`) VALUES
(6, 10, '2022-07-05 18:30:00', 'petrol', 'ashik', './expenses/bill.jpg', 500);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(255) NOT NULL,
  `merchant_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `merchant_id`, `name`, `date`) VALUES
(8, 1, 'navami', '2022-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `quotation_id` int(255) NOT NULL,
  `datesubmit` datetime NOT NULL,
  `customername` varchar(255) NOT NULL,
  `grandtotal` int(255) NOT NULL,
  `amountpaid` varchar(255) NOT NULL,
  `remainingamt` int(255) NOT NULL,
  `mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `quotation_id`, `datesubmit`, `customername`, `grandtotal`, `amountpaid`, `remainingamt`, `mode`) VALUES
(16, 10, 1, '2022-07-06 11:05:56', 'ash', 35400, '10000', 25400, 'cash'),
(17, 11, 2, '2022-07-06 12:02:35', 'ash123', 118000, '1000', 117000, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `id` int(11) NOT NULL,
  `businessname` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `headname` varchar(255) NOT NULL,
  `businessproof` varchar(255) NOT NULL,
  `myfile` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id`, `businessname`, `gst`, `Address`, `phonenumber`, `email`, `password`, `headname`, `businessproof`, `myfile`, `status`) VALUES
(10, 'ASSOCIATES', 'ASD1234', 'STREET', '6381773456', 'a@gmail.com', 'WG1sZ2NSa2lUWVEzQi9uaXlVR0h1Y2ZZelpycENaNGR3amZQVnpodFZZVzYyNS9reVo5anBub3RGUU4vT3Z3eA==', 'ASHIK1', 'PROOF', './img/ima.jpg', 1),
(11, 'ASSOC', 'ASD1234', 'STREET', '6381773456', 'b@gmail.com', 'd1hDSy9EbG55M2gxTWFlVE1oMjE3YWNuWjlZdU5BZ1owaWJUUDk5aHMyTDZTYWhncnJ3clFuaGhIU0FSR3VKaw==', 'ASHIK1', 'PROOF', './img/cta-bg.jpg', 1),
(18, 'AAF', 'ASD1234', 'STREET', '6381773456', 'c@gmail.com', 'Q0VNSnFzSnVJUkcxREZlQlI0OFQ2T3VVcTA2OWR0ZFNCOHZsVmpVTnNjNWNPNHE1b3d2SWg0RTZIbE0wWk91VQ==', 'ASHIKAFY', 'PROOF', './img/2.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_payment`
--

CREATE TABLE `merchant_payment` (
  `id` int(255) NOT NULL,
  `merchant_id` int(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `submitdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paymenthistory`
--

CREATE TABLE `paymenthistory` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `paymentid` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `paymentdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `paymentmode` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymenthistory`
--

INSERT INTO `paymenthistory` (`id`, `user_id`, `paymentid`, `customername`, `paymentdate`, `paymentmode`, `amount`) VALUES
(6, 10, '62c5507425589', 'ash', '2022-07-06 05:35:56', 'cash', 10000),
(7, 11, '62c55dbb08038', 'ash123', '2022-07-06 06:32:35', 'cash', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_subscription`
--

CREATE TABLE `payment_subscription` (
  `id` int(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Payment ID` varchar(255) NOT NULL,
  `Plan` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Payment Type` varchar(255) NOT NULL,
  `Expiry_Date` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payslip`
--

CREATE TABLE `payslip` (
  `id` int(255) NOT NULL,
  `merchant_id` int(255) NOT NULL,
  `empid` varchar(255) NOT NULL,
  `salary` int(255) NOT NULL,
  `month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payslip`
--

INSERT INTO `payslip` (`id`, `merchant_id`, `empid`, `salary`, `month`) VALUES
(9, 10, 'as101', 20000, '2022-07');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `id` int(255) NOT NULL,
  `merchant_id` int(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `hsnnumber` int(100) NOT NULL,
  `availablequantity` int(255) NOT NULL,
  `purchaseprice` int(200) NOT NULL,
  `productprice` int(255) NOT NULL,
  `GST` int(255) NOT NULL,
  `productdescription` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL,
  `businessname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`id`, `merchant_id`, `productname`, `hsnnumber`, `availablequantity`, `purchaseprice`, `productprice`, `GST`, `productdescription`, `category`, `productimage`, `status`, `businessname`) VALUES
(9, 10, 'PRODUCT 1', 345, 54, 5000, 5000, 18, 'best progression', 'CAMERA', 'product/1.jpg', 'a', 'ASSOCIATES'),
(10, 11, 'PRODUCT 2', 123, 14333, 20000, 20000, 18, 'best progression', 'CAMERA', 'product/2.jpg', 'a', 'ASSOC'),
(11, 11, 'ASHas', 123, 14333, 20000, 20000, 18, 'HEART 1', 'HEART ', './productima.jpg', 'a', 'ASSOC');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `quotation_id` varchar(255) NOT NULL,
  `submitdate` datetime NOT NULL,
  `customername` varchar(255) NOT NULL,
  `customergst` varchar(255) NOT NULL,
  `customeraddress` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `productgst` int(11) NOT NULL,
  `productprice` int(255) NOT NULL,
  `grandtotal` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `user_id`, `quotation_id`, `submitdate`, `customername`, `customergst`, `customeraddress`, `product`, `quantity`, `productgst`, `productprice`, `grandtotal`, `status`) VALUES
(11, 10, '1', '2022-07-06 14:35:42', 'ash', '1213', 'st', 'PRODUCT 1', 4, 18, 5000, 23600, 'Accepted'),
(12, 10, '1', '2022-07-06 14:35:42', 'ash', '1213', 'st', 'PRODUCT 1', 2, 18, 5000, 11800, 'Accepted'),
(13, 11, '2', '2022-07-06 15:32:18', 'ash123', '1213', 'st', 'PRODUCT 2', 2, 18, 20000, 47200, 'Accepted'),
(14, 11, '2', '2022-07-06 15:32:18', 'ash123', '1213', 'st', 'PRODUCT 2', 3, 18, 20000, 70800, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `sale_id` int(255) NOT NULL,
  `submitdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_name` varchar(255) NOT NULL,
  `vendor_gst` varchar(255) NOT NULL,
  `vendor_address` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `hsn` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `grand_total` int(255) NOT NULL,
  `bill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `user_id`, `sale_id`, `submitdate`, `vendor_name`, `vendor_gst`, `vendor_address`, `product_name`, `hsn`, `category`, `price`, `qty`, `sale_price`, `grand_total`, `bill`) VALUES
(70, 10, 1, '2022-07-07 02:51:34', 'asa', 'asd', 'asda', '', '', '', 0, 0, 5000, 5000, './sale/bill.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `salequantity`
--

CREATE TABLE `salequantity` (
  `id` int(11) NOT NULL,
  `customerid` varchar(100) NOT NULL,
  `customername` varchar(200) NOT NULL,
  `customergst` varchar(50) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addsupport`
--
ALTER TABLE `addsupport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_payment`
--
ALTER TABLE `merchant_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_subscription`
--
ALTER TABLE `payment_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payslip`
--
ALTER TABLE `payslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salequantity`
--
ALTER TABLE `salequantity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addsupport`
--
ALTER TABLE `addsupport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Sno` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `merchant_payment`
--
ALTER TABLE `merchant_payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_subscription`
--
ALTER TABLE `payment_subscription`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payslip`
--
ALTER TABLE `payslip`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `salequantity`
--
ALTER TABLE `salequantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
