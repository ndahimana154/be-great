-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 11:57 AM
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
-- Database: `begreat`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `profilepicture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `firstname`, `lastname`, `email`, `phone`, `profilepicture`, `password`) VALUES
(1, 'eiori', 'ifojfio', 'rivjiovj@fjidgfvfd.fddddf', 438232, 'rivjiovj@fjidgfvfd.fddddf - Profile image .png', ''),
(2, 'eiori', 'ifojfio', 'rivjiovj@fjidgfvfd.fddddf', 438232, 'rivjiovj@fjidgfvfd.fddddf - Profile image .png', ''),
(3, 'edi', 'hdui', 'uinhuwi@rfsfc.e', 24334, 'uinhuwi@rfsfc.e - Profile image .png', '123'),
(4, 'Tsinda', 'CYimana kevin', 'tsindacyimanakevin@gmail.com', 786142964, 'tsindacyimanakevin@gmail.com - Profile image .jpg', '123456'),
(5, 'Izukondi', 'Bienvenue', 'izubien@rezi.pb', 483737727, 'izubien@rezi.pb - Profile image .png', '123456'),
(6, 'gucci', 'gucci', 'gucci@gmail.com', 2147483647, 'gucci@gmail.com - Profile image .png', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `buyers_accounts`
--

CREATE TABLE `buyers_accounts` (
  `buyer` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers_accounts`
--

INSERT INTO `buyers_accounts` (`buyer`, `balance`, `acc_id`) VALUES
(4, 4955590, 1),
(3, 0, 2),
(5, 0, 3),
(6, 30000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `buyer_money_txns`
--

CREATE TABLE `buyer_money_txns` (
  `id` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `txndate` varchar(255) NOT NULL,
  `txntime` varchar(255) NOT NULL,
  `txntype` varchar(255) NOT NULL,
  `oldacc` int(11) NOT NULL,
  `newacc` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_money_txns`
--

INSERT INTO `buyer_money_txns` (`id`, `buyer`, `txndate`, `txntime`, `txntype`, `oldacc`, `newacc`, `amount`) VALUES
(1, 4, '2023-05-24', '17:10:23', 'Shopping', 10000000, 9997000, 0),
(2, 4, '2023-05-24', '17:10:24', 'Shopping', 9997000, 9994000, 0),
(3, 4, '2023-05-24', '17:10:25', 'Shopping', 9994000, 9991000, 0),
(4, 4, '2023-05-25', '18:01:49', 'Shopping', 9991000, 9923000, 0),
(5, 4, '2023-05-25', '18:01:49', 'Shopping', 9923000, 9855000, 0),
(6, 4, '2023-05-25', '18:07:54', 'Shopping', 9855000, 9840200, 0),
(7, 4, '2023-05-26', '09:04:51', 'Shopping', 9840200, 9839200, 0),
(8, 4, '2023-05-26', '09:07:34', 'Cancel Shopping', 9839200, 9840200, 0),
(9, 4, '2023-05-26', '09:07:49', 'Cancel Shopping', 9840200, 9841200, 0),
(10, 4, '2023-05-28', '20:40:53', 'Shopping', 9841200, 9837500, 0),
(11, 4, '2023-05-28', '20:40:59', 'Shopping', 9837500, 9819000, 0),
(12, 4, '2023-05-28', '20:41:10', 'Shopping', 9819000, 9815300, 0),
(13, 4, '2023-05-28', '20:41:15', 'Shopping', 9815300, 9800500, 0),
(14, 4, '2023-05-28', '20:41:29', 'Shopping', 9800500, 9395500, 0),
(15, 4, '2023-05-28', '20:41:36', 'Shopping', 9395500, 8990500, 0),
(16, 4, '2023-05-28', '20:45:30', 'Shopping', 8990500, 8986800, 0),
(17, 4, '2023-05-28', '20:45:40', 'Shopping', 8986800, 8980800, 0),
(18, 4, '2023-05-29', '08:09:52', 'Shopping', 8980800, 7500800, 0),
(19, 4, '2023-05-29', '08:09:52', 'Shopping', 7500800, 6020800, 0),
(20, 4, '2023-05-29', '08:10:03', 'Shopping', 6020800, 5952800, 0),
(21, 4, '2023-05-29', '08:13:40', 'Cancel Shopping', 5952800, 7432800, 0),
(22, 4, '2023-05-29', '08:15:23', 'Shopping', 7432800, 7429100, 0),
(23, 4, '2023-05-29', '08:15:23', 'Shopping', 7429100, 7425400, 0),
(24, 4, '2023-05-29', '08:16:45', 'Shopping', 7425400, 7410600, 0),
(25, 4, '2023-05-29', '08:16:51', 'Shopping', 7410600, 7236700, 0),
(26, 4, '2023-06-04', '06:50:46', 'Shopping', 7236700, 7235700, 0),
(27, 4, '2023-06-04', '06:51:00', 'Shopping', 7235700, 6885700, 0),
(28, 4, '2023-06-04', '06:51:10', 'Shopping', 6885700, 6535700, 0),
(29, 4, '2023-06-04', '06:51:10', 'Shopping', 6535700, 6185700, 0),
(30, 4, '2023-06-04', '06:51:24', 'Shopping', 6185700, 5835700, 0),
(31, 4, '2023-06-04', '06:51:38', 'Shopping', 5835700, 5485700, 0),
(32, 4, '2023-06-04', '06:51:57', 'Shopping', 5485700, 5135700, 0),
(33, 4, '2023-05-30', '00:33', 'Deposit', 5135700, 5148500, 0),
(34, 6, '2023-06-03', '11:30', 'Deposit', 0, 4000, 0),
(35, 6, '2023-06-04', '09:05:56', 'Shopping', 4000, 2000, 0),
(36, 6, '2023-06-03', '11:30', 'Deposit', 2000, 6000, 0),
(37, 6, '2023-06-03', '11:30', 'Deposit', 6000, 10000, 0),
(38, 6, '2023-06-03', '11:30', 'Deposit', 10000, 14000, 0),
(39, 6, '2023-06-03', '11:30', 'Deposit', 14000, 18000, 0),
(40, 6, '2023-06-03', '11:30', 'Deposit', 18000, 22000, 0),
(41, 6, '2023-06-03', '11:30', 'Deposit', 22000, 26000, 0),
(42, 6, '2023-06-03', '11:30', 'Deposit', 26000, 30000, 0),
(43, 4, '2023-06-04', '11:04:12', 'Cancel Shopping', 5148500, 5498500, 0),
(44, 4, '2023-05-30', '00:33', 'Deposit', 5498500, 5511300, 0),
(45, 4, '2023-06-06', '13:08:57', 'Shopping', 5511300, 5507600, 0),
(46, 4, '2023-06-06', '13:09:13', 'Shopping', 5507600, 5503900, 0),
(47, 4, '2023-06-06', '13:09:30', 'Shopping', 5503900, 5458900, 0),
(48, 4, '2023-06-06', '13:09:30', 'Shopping', 5458900, 5413900, 0),
(49, 4, '2023-06-06', '13:09:39', 'Shopping', 5413900, 5379900, 0),
(50, 4, '2023-06-06', '13:09:40', 'Shopping', 5379900, 5345900, 0),
(51, 4, '2023-06-06', '13:09:49', 'Shopping', 5345900, 5345550, 0),
(52, 4, '2023-06-06', '13:09:49', 'Shopping', 5345550, 5345200, 0),
(53, 4, '2023-06-09', '23:09:54', 'Cancel Shopping', 5345200, 5345550, 0),
(54, 4, '2023-06-09', '23:10:01', 'Cancel Shopping', 5345550, 5349250, 0),
(55, 4, '2023-06-20', '07:54:03', 'Shopping', 5349250, 5341490, 0),
(56, 4, '2023-06-20', '07:54:30', 'Shopping', 5341490, 5206490, 0),
(57, 4, '2023-06-20', '07:54:31', 'Shopping', 5206490, 5071490, 0),
(58, 4, '2023-06-20', '08:07:07', 'Shopping', 5071490, 5052990, 18500),
(59, 4, '2023-06-20', '08:09:10', 'Shopping', 5052990, 5047040, 5950),
(60, 4, '2023-06-20', '08:09:34', 'Cancel Shopping', 5047040, 5052990, 5950),
(61, 4, '2023-06-20', '09:24:40', 'Shopping', 5052990, 5049290, 3700),
(62, 4, '2023-06-20', '09:49:54', 'Shopping', 5049290, 5045590, 3700),
(63, 4, '2023-06-24', '15:58:21', 'Shopping', 5045590, 5035590, 10000),
(64, 4, '2023-06-24', '15:58:22', 'Shopping', 5035590, 5025590, 10000),
(65, 4, '2023-06-24', '15:58:43', 'Shopping', 5025590, 5015590, 10000),
(66, 4, '2023-06-24', '15:58:56', 'Shopping', 5015590, 5005590, 10000),
(67, 4, '2023-06-24', '15:59:00', 'Shopping', 5005590, 4995590, 10000),
(68, 4, '2023-06-24', '15:59:03', 'Shopping', 4995590, 4985590, 10000),
(69, 4, '2023-06-24', '15:59:04', 'Shopping', 4985590, 4975590, 10000),
(70, 4, '2023-06-24', '15:59:05', 'Shopping', 4975590, 4965590, 10000),
(71, 4, '2023-06-24', '15:59:07', 'Shopping', 4965590, 4955590, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `buyer_money_txns_complaints`
--

CREATE TABLE `buyer_money_txns_complaints` (
  `id` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `txnid` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `response` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_money_txns_complaints`
--

INSERT INTO `buyer_money_txns_complaints` (`id`, `buyer`, `txnid`, `complaint`, `response`, `date`, `time`) VALUES
(1, 4, 10, 'What are you doing to me?? Where did this transaction come from??', 'Not responded yet', '2023-06-03', '15:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_payment_methods`
--

CREATE TABLE `buyer_payment_methods` (
  `id` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `method` int(11) NOT NULL,
  `method_digits` text NOT NULL,
  `add_date` varchar(255) NOT NULL,
  `add_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_payment_methods`
--

INSERT INTO `buyer_payment_methods` (`id`, `buyer`, `method`, `method_digits`, `add_date`, `add_time`, `status`) VALUES
(1, 4, 3, '44389343988580', '2023-06-04', '06:39:55', 'Deleted'),
(2, 4, 2, '4rewio4389ufdiof', '2023-06-04', '06:40:05', 'Deleted'),
(3, 4, 3, 'gbgffdreregdfgdfgafd', '2023-06-04', '07:19:43', 'Deleted'),
(4, 4, 5, 'csffdfdfddfbfdv ', '2023-06-04', '07:20:19', 'Unverfied'),
(5, 6, 1, '078839283', '2023-06-04', '09:04:58', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `cart_draft`
--

CREATE TABLE `cart_draft` (
  `id` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unityprice` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_draft`
--

INSERT INTO `cart_draft` (`id`, `buyer`, `product`, `quantity`, `unityprice`, `status`) VALUES
(2, 4, 26, 235, 350000, 'Draft'),
(6, 4, 25, 1, 1500, 'Draft');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_sn` int(12) UNSIGNED ZEROFILL NOT NULL,
  `courier_fn` varchar(255) NOT NULL,
  `courier_ln` varchar(255) DEFAULT NULL,
  `courier_email` varchar(255) NOT NULL,
  `courier_phone` varchar(255) NOT NULL,
  `courier_phone2` varchar(255) DEFAULT NULL,
  `courier_dob` varchar(255) NOT NULL,
  `courier_nid` int(16) NOT NULL,
  `courier_profile` text DEFAULT NULL,
  `courier_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courier_sn`, `courier_fn`, `courier_ln`, `courier_email`, `courier_phone`, `courier_phone2`, `courier_dob`, `courier_nid`, `courier_profile`, `courier_status`) VALUES
(000000000001, 'Bizimana', 'Dunia', 'biziduni@gmail.com', '0788123432', '', '2122-12-12', 1233484738, 'biziduni@gmail.com - Profile image.png', 'Fired'),
(000000000004, 'Byiringiro', 'Bosco', 'boscobyiringiro@gmail.com', '04383272', '', '1996-06-10', 2147483647, 'boscobyiringiro@gmail.com - Profile image.png', 'Fired'),
(000000000005, 'Tuyizere', 'Etienee', 'tuyizereetie@gmail.com', '07837457276`', '', '2000-10-10', 2147483647, 'tuyizereetie@gmail.com - Profile image.png', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `courier_accounts`
--

CREATE TABLE `courier_accounts` (
  `id` int(11) NOT NULL,
  `courier` int(12) UNSIGNED ZEROFILL NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier_accounts`
--

INSERT INTO `courier_accounts` (`id`, `courier`, `balance`) VALUES
(1, 000000000004, 3450),
(2, 000000000001, 37032),
(3, 000000000005, 22333434);

-- --------------------------------------------------------

--
-- Table structure for table `courier_payment_methods`
--

CREATE TABLE `courier_payment_methods` (
  `id` int(11) NOT NULL,
  `courier` int(12) UNSIGNED ZEROFILL NOT NULL,
  `method_type` int(11) NOT NULL,
  `method_digits` varchar(255) NOT NULL,
  `method_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier_payment_methods`
--

INSERT INTO `courier_payment_methods` (`id`, `courier`, `method_type`, `method_digits`, `method_status`) VALUES
(2, 000000000001, 5, 'e3r534443545', 'Verified'),
(3, 000000000004, 4, '0787873516', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `courier_txn_in`
--

CREATE TABLE `courier_txn_in` (
  `id` int(11) NOT NULL,
  `courier` int(12) UNSIGNED ZEROFILL NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Received'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier_txn_in`
--

INSERT INTO `courier_txn_in` (`id`, `courier`, `order_id`, `amount`, `date`, `time`, `status`) VALUES
(1, 000000000005, 48, 2000, '2023-06-20', '09:12:57', 'Received'),
(2, 000000000004, 49, 3450, '2023-06-20', '09:16:19', 'Received'),
(3, 000000000001, 52, 12344, '2023-06-20', '09:28:13', 'Received'),
(4, 000000000001, 52, 12344, '2023-06-20', '09:34:56', 'Received'),
(5, 000000000001, 52, 12344, '2023-06-20', '09:35:00', 'Received'),
(6, 000000000005, 53, 22333434, '2023-06-20', '09:51:58', 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `courier_work_proofs`
--

CREATE TABLE `courier_work_proofs` (
  `id` int(11) NOT NULL,
  `courier` int(12) UNSIGNED ZEROFILL NOT NULL,
  `orders` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier_work_proofs`
--

INSERT INTO `courier_work_proofs` (`id`, `courier`, `orders`, `amount`, `date`, `time`, `status`) VALUES
(1, 000000000005, 48, 2000, '2023-06-20', '07:56:24', 'Delivered'),
(2, 000000000004, 49, 3450, '2023-06-20', '07:59:10', 'Delivered'),
(3, 000000000005, 50, 1506, '2023-06-20', '09:19:24', 'Delivering'),
(4, 000000000001, 52, 12344, '2023-06-20', '09:27:57', 'Delivered'),
(5, 000000000005, 53, 22333434, '2023-06-20', '09:50:07', 'Delivered'),
(6, 000000000005, 61, 302932, '2023-07-19', '08:28:13', 'Delivering');

-- --------------------------------------------------------

--
-- Table structure for table `co_members`
--

CREATE TABLE `co_members` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `Type` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_members`
--

INSERT INTO `co_members` (`id`, `Fname`, `Lname`, `Email`, `Phone`, `Type`, `Status`) VALUES
(000001, 'Ndahimana', 'Bonheur', 'ndahimana154@gmail.com', 0722893974, 1, 'Online'),
(000003, 'Tuyishime', 'Aimable', 'tuyishimeaimable@gmail.com', 0785073726, 2, 'Inactive'),
(000004, 'Tsinda', 'Cyimana', 'tsinda@gmail.com', 0786142964, 3, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `co_members_auth`
--

CREATE TABLE `co_members_auth` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'Not set yet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_members_auth`
--

INSERT INTO `co_members_auth` (`id`, `username`, `password`, `profile_image`) VALUES
(000001, 'ndahimana154', 'GitPASS', 'ndahimana154 - Profile image.png'),
(000003, 'tuyiaimable', '123456', 'tuyiaimable - Profile image.png'),
(000004, 'tsinda', '123456', 'tsinda - Profile image.png');

-- --------------------------------------------------------

--
-- Table structure for table `co_members_types`
--

CREATE TABLE `co_members_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_members_types`
--

INSERT INTO `co_members_types` (`id`, `type`) VALUES
(1, 'Chief executive officer'),
(2, 'Manager'),
(3, 'Market analyzer');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_draft`
--

CREATE TABLE `deposit_draft` (
  `transaction_id` varchar(255) NOT NULL,
  `transaction_amount` int(11) NOT NULL,
  `transaction_names` varchar(255) NOT NULL,
  `transaction_payment_method` int(11) NOT NULL,
  `transaction_payment_digits` text NOT NULL,
  `transaction_date` varchar(255) NOT NULL,
  `transaction_time` varchar(255) NOT NULL,
  `transaction_recording_time` varchar(255) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `transaction_recorder` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_draft`
--

INSERT INTO `deposit_draft` (`transaction_id`, `transaction_amount`, `transaction_names`, `transaction_payment_method`, `transaction_payment_digits`, `transaction_date`, `transaction_time`, `transaction_recording_time`, `transaction_status`, `transaction_recorder`) VALUES
('0', 0, 'Uwineza Sarah', 4, '40101009863323', '2023-05-28', '00:12', '2023-06-03 18:26:19', 'Unreviewed', 000001),
('3494393', 0, 'Kwizera Parfait', 1, '0782737464', '2023-06-01', '01:27', '2023-06-03 20:27:43', 'Unreviewed', 000001),
('35675456', 4000, 'Gucci', 1, '078839283', '2023-06-03', '11:30', '2023-06-04 09:00:54', 'Matching', 000001),
('9', 0, 'Kwizera Byigore', 1, '3293292818', '2023-06-02', '09:24', '2023-06-03 18:23:13', 'Unreviewed', 000001),
('eriufhui 9383u290uvuih', 0, 'Tsindagiraaa Cyimana', 3, '4343928727217', '2023-05-28', '09:48', '2023-06-03 18:45:59', 'Unreviewed', 000001),
('M-Monydf BNMG', 12800, 'Tsinda Cyimana Kevin', 5, 'csffdfdfddfbfdv', '2023-05-30', '00:33', '2023-06-04 07:29:14', 'Matching', 000001);

-- --------------------------------------------------------

--
-- Table structure for table `home_sliding_shops`
--

CREATE TABLE `home_sliding_shops` (
  `id` int(11) NOT NULL,
  `shop` int(11) NOT NULL,
  `sliding_message` text NOT NULL,
  `sliding_image` text NOT NULL,
  `sliding_from` varchar(255) NOT NULL,
  `sliding_until` varchar(255) NOT NULL,
  `sliding_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_sliding_shops`
--

INSERT INTO `home_sliding_shops` (`id`, `shop`, `sliding_message`, `sliding_image`, `sliding_from`, `sliding_until`, `sliding_status`) VALUES
(24, 7, 'Hub of soft drinkings. We serve you a huge amount of non-alcoholic drinks, Feel free to order yours.', '9aaa511fb48afae2d1f2fd28d5efd9fa.png', '2023-06-16 22:01:16', '2023-07-06 23:01', 'Sliding'),
(25, 10, 'Gret shop, new ones only', 'e2bb5e6f86716969c19d0be69327c8e7.png', '2023-06-17 14:34:54', '2023-07-05 15:34', 'Sliding'),
(26, 5, 'New products are available!', '384a815d55029a54b3ae7606aea7eab7.png', '2023-06-17 15:05:00', '2023-06-27 16:04', 'Sliding');

-- --------------------------------------------------------

--
-- Table structure for table `owner_account_txns`
--

CREATE TABLE `owner_account_txns` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `timendate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_account_txns`
--

INSERT INTO `owner_account_txns` (`id`, `type`, `amount`, `timendate`) VALUES
(1, 'IN', 4500, '2023-05-24 17:07:21'),
(2, 'IN', 3000, '2023-05-24 17:07:28'),
(3, 'IN', 3000, '2023-05-24 17:07:29'),
(4, 'IN', 3000, '2023-05-24 17:10:23'),
(5, 'IN', 3000, '2023-05-24 17:10:24'),
(6, 'IN', 3000, '2023-05-24 17:10:25'),
(7, 'IN', 68000, '2023-05-25 18:01:49'),
(8, 'IN', 68000, '2023-05-25 18:01:49'),
(9, 'IN', 14800, '2023-05-25 18:07:54'),
(10, 'IN', 1000, '2023-05-26 09:04:51'),
(11, 'OUT', 1000, '2023-05-26 09:07:34'),
(12, 'OUT', 1000, '2023-05-26 09:07:49'),
(13, 'OUT', 740, '2023-05-28 20:37:41'),
(14, 'OUT', 740, '2023-05-28 20:39:27'),
(15, 'IN', 3700, '2023-05-28 20:40:53'),
(16, 'IN', 18500, '2023-05-28 20:40:59'),
(17, 'IN', 3700, '2023-05-28 20:41:10'),
(18, 'IN', 14800, '2023-05-28 20:41:15'),
(19, 'IN', 405000, '2023-05-28 20:41:29'),
(20, 'IN', 405000, '2023-05-28 20:41:36'),
(21, 'OUT', 20250, '2023-05-28 20:41:50'),
(22, 'OUT', 740, '2023-05-28 20:43:29'),
(23, 'OUT', 20250, '2023-05-28 20:44:06'),
(24, 'IN', 3700, '2023-05-28 20:45:30'),
(25, 'IN', 6000, '2023-05-28 20:45:40'),
(26, 'OUT', 185, '2023-05-29 08:06:18'),
(27, 'IN', 1480000, '2023-05-29 08:09:52'),
(28, 'IN', 1480000, '2023-05-29 08:09:52'),
(29, 'IN', 68000, '2023-05-29 08:10:03'),
(30, 'OUT', 64600, '2023-05-29 08:10:21'),
(31, 'OUT', 1480000, '2023-05-29 08:13:40'),
(32, 'OUT', 1406000, '2023-05-29 08:14:21'),
(33, 'IN', 3700, '2023-05-29 08:15:23'),
(34, 'IN', 3700, '2023-05-29 08:15:23'),
(35, 'OUT', 3515, '2023-05-29 08:15:35'),
(36, 'OUT', 3515, '2023-05-29 08:16:17'),
(37, 'IN', 14800, '2023-05-29 08:16:45'),
(38, 'IN', 173900, '2023-05-29 08:16:51'),
(39, 'OUT', 165205, '2023-05-29 08:17:01'),
(40, 'OUT', 14060, '2023-05-29 08:17:13'),
(41, 'IN', 1000, '2023-06-04 06:50:46'),
(42, 'IN', 350000, '2023-06-04 06:51:00'),
(43, 'IN', 350000, '2023-06-04 06:51:10'),
(44, 'IN', 350000, '2023-06-04 06:51:10'),
(45, 'IN', 350000, '2023-06-04 06:51:24'),
(46, 'IN', 350000, '2023-06-04 06:51:38'),
(47, 'IN', 350000, '2023-06-04 06:51:57'),
(48, 'IN', 2000, '2023-06-04 09:05:56'),
(49, 'OUT', 1900, '2023-06-04 09:06:45'),
(50, 'OUT', 350000, '2023-06-04 11:04:12'),
(51, 'IN', 3700, '2023-06-06 13:08:57'),
(52, 'IN', 3700, '2023-06-06 13:09:13'),
(53, 'IN', 45000, '2023-06-06 13:09:29'),
(54, 'IN', 45000, '2023-06-06 13:09:30'),
(55, 'IN', 34000, '2023-06-06 13:09:39'),
(56, 'IN', 34000, '2023-06-06 13:09:40'),
(57, 'IN', 350, '2023-06-06 13:09:48'),
(58, 'IN', 350, '2023-06-06 13:09:49'),
(59, 'OUT', 350, '2023-06-09 23:09:54'),
(60, 'OUT', 3700, '2023-06-09 23:10:01'),
(61, 'OUT', 32300, '2023-06-10 12:36:07'),
(62, 'OUT', 333, '2023-06-17 15:13:34'),
(63, 'OUT', 42750, '2023-06-20 06:56:24'),
(64, 'OUT', 32300, '2023-06-20 06:57:24'),
(65, 'OUT', 42750, '2023-06-20 06:57:43'),
(66, 'OUT', 3515, '2023-06-20 07:51:21'),
(67, 'IN', 7760, '2023-06-20 07:54:03'),
(68, 'IN', 135000, '2023-06-20 07:54:30'),
(69, 'IN', 135000, '2023-06-20 07:54:31'),
(70, 'OUT', 128250, '2023-06-20 07:56:22'),
(71, 'OUT', 128250, '2023-06-20 07:59:10'),
(72, 'IN', 18500, '2023-06-20 08:07:07'),
(73, 'IN', 5950, '2023-06-20 08:09:10'),
(74, 'OUT', 5950, '2023-06-20 08:09:34'),
(75, 'OUT', 17575, '2023-06-20 09:19:23'),
(76, 'IN', 3700, '2023-06-20 09:24:40'),
(77, 'OUT', 3515, '2023-06-20 09:27:57'),
(78, 'IN', 3700, '2023-06-20 09:49:54'),
(79, 'OUT', 3515, '2023-06-20 09:50:07'),
(80, 'IN', 10000, '2023-06-24 15:58:21'),
(81, 'IN', 10000, '2023-06-24 15:58:22'),
(82, 'IN', 10000, '2023-06-24 15:58:43'),
(83, 'IN', 10000, '2023-06-24 15:58:56'),
(84, 'IN', 10000, '2023-06-24 15:59:00'),
(85, 'IN', 10000, '2023-06-24 15:59:03'),
(86, 'IN', 10000, '2023-06-24 15:59:04'),
(87, 'IN', 10000, '2023-06-24 15:59:05'),
(88, 'IN', 10000, '2023-06-24 15:59:07'),
(89, 'OUT', 9500, '2023-07-19 08:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `method_type` varchar(255) NOT NULL,
  `method_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `method_type`, `method_name`) VALUES
(1, 'Mobile', 'MTN MoMo'),
(2, 'Mobile', 'AirTel Money'),
(3, 'Banking', 'Bank of Kigali (BK)'),
(4, 'Banking', 'Equity Bank'),
(5, 'Banking', 'Bank Populaire du Rwanda (BPR)');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_price` int(11) NOT NULL DEFAULT 0,
  `product_add_date` varchar(255) NOT NULL,
  `product_genre` int(11) NOT NULL,
  `shop` int(11) NOT NULL,
  `quantity_remain` int(11) NOT NULL DEFAULT 0,
  `product_descr` text NOT NULL DEFAULT 'Product description is not yet added but we hope to add them in the updates or by editing the product editing fetures.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_add_date`, `product_genre`, `shop`, `quantity_remain`, `product_descr`) VALUES
(25, 'CoCa Bottle SODA', 'Kick SIde SHop - CoCa Bottle SODA - FRONTIMAGE.png', 1500, '2023-05-06', 5, 5, 100, 'Product description is not yet added but we hope to add them in the updates or by editing the product editing fetures.'),
(26, 'SONY D70 Photo & Video Camera', 'Gabby Shop - Canon D70 Photo & Video Camera - FRONTIMAGE.png', 350000, '2023-05-06', 1, 4, 100, 'Product description is not yet added but we hope to add them in the updates or by editing the product editing fetures.'),
(27, 'Igihwagari Golden Cooking oil', 'Marina Rama Shop - Igihwagari Golden Cooking oil - FRONTIMAGE.png', 3700, '2023-05-25', 7, 12, 999740, 'Product description is not yet added but we hope to add them in the updates or by editing the product editing fetures.'),
(28, 'SanDisk Memory Card 32GB', 'Marina Rama Shop - SanDisk Memory Card 32GB - FRONTIMAGE.png', 34000, '2023-05-25', 1, 12, 111, 'Product description is not yet added but we hope to add them in the updates or by editing the product editing fetures.'),
(29, 'Ice Watch - PTC 2023 Version American', 'Marina Rama Shop - Ice Watch - PTC 2023 Version American - FRONTIMAGE.png', 45000, '2023-05-28', 1, 12, 74, 'Product description is not yet added but we hope to add them in the updates or by editing the product editing fetures.'),
(30, 'Anana - Brugali SMJ1 Juice', 'Marina Rama Shop - Anana - Brugali SMJ1 Juice - FRONTIMAGE.png', 350, '2023-06-03', 5, 12, 46, 'Juice made from Anana with 80% Sugar and contains many Vitamins and minerals to be consumed by the human body. This juice is especially made for Children and Pregnant woman as it increaes the concentration of Crbohydrates.'),
(31, 'Chocolate', 'Bonheur Shop - Chocolate - FRONTIMAGE.png', 1000, '2023-06-04', 5, 14, 88, 'Black Chocolate Made of Sugar'),
(32, 'coconut', 'Bonheur Shop - coconut - FRONTIMAGE.png', 970, '2023-06-04', 6, 14, 90, 'country:japan\r\nexpr:23/08/2023\r\nmanufacture:yokohama\r\n'),
(33, 'iTel KGTel Phone', 'Marina Rama Shop - iTel KGTel Phone - FRONTIMAGE.png', 10000, '2023-06-24', 1, 12, 23038, 'Non touchscreen phone without Headphone  ');

-- --------------------------------------------------------

--
-- Table structure for table `products_orders`
--

CREATE TABLE `products_orders` (
  `order_id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_orders`
--

INSERT INTO `products_orders` (`order_id`, `product`, `client`, `product_price`, `quantity`, `total`, `order_date`, `order_time`, `order_status`, `shop`) VALUES
(40, 27, 4, 3700, 1, 3700, '2023-06-06', '13:09:13', 'Delivering', 12),
(41, 29, 4, 45000, 1, 45000, '2023-06-06', '13:09:29', 'Delivering', 12),
(42, 29, 4, 45000, 1, 45000, '2023-06-06', '13:09:30', 'Delivering', 12),
(43, 28, 4, 34000, 1, 34000, '2023-06-06', '13:09:39', 'Delivering', 12),
(44, 28, 4, 34000, 1, 34000, '2023-06-06', '13:09:40', 'Delivering', 12),
(45, 30, 4, 350, 1, 350, '2023-06-06', '13:09:48', 'Cancelled', 12),
(46, 30, 4, 350, 1, 350, '2023-06-06', '13:09:49', 'Delivering', 12),
(47, 32, 4, 970, 8, 7760, '2023-06-20', '07:54:03', 'Pending', 14),
(48, 29, 4, 45000, 3, 135000, '2023-06-20', '07:54:30', 'Delivered', 12),
(49, 29, 4, 45000, 3, 135000, '2023-06-20', '07:54:31', 'Delivered', 12),
(50, 27, 4, 3700, 5, 18500, '2023-06-20', '08:07:07', 'Delivering', 12),
(51, 30, 4, 350, 17, 5950, '2023-06-20', '08:09:10', 'Cancelled', 12),
(52, 27, 4, 3700, 1, 3700, '2023-06-20', '09:24:40', 'Delivered', 12),
(53, 27, 4, 3700, 1, 3700, '2023-06-20', '09:49:54', 'Delivered', 12),
(54, 33, 4, 10000, 1, 10000, '2023-06-24', '15:58:21', 'Pending', 12),
(55, 33, 4, 10000, 1, 10000, '2023-06-24', '15:58:22', 'Pending', 12),
(56, 33, 4, 10000, 1, 10000, '2023-06-24', '15:58:43', 'Pending', 12),
(57, 33, 4, 10000, 1, 10000, '2023-06-24', '15:58:56', 'Pending', 12),
(58, 33, 4, 10000, 1, 10000, '2023-06-24', '15:59:00', 'Pending', 12),
(59, 33, 4, 10000, 1, 10000, '2023-06-24', '15:59:03', 'Pending', 12),
(60, 33, 4, 10000, 1, 10000, '2023-06-24', '15:59:04', 'Pending', 12),
(61, 33, 4, 10000, 1, 10000, '2023-06-24', '15:59:05', 'Delivering', 12),
(62, 33, 4, 10000, 1, 10000, '2023-06-24', '15:59:07', 'Pending', 12);

-- --------------------------------------------------------

--
-- Table structure for table `product_genres`
--

CREATE TABLE `product_genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_genres`
--

INSERT INTO `product_genres` (`genre_id`, `genre_name`) VALUES
(1, 'Electronic devices'),
(2, 'Clothes'),
(3, 'Furnitures'),
(5, 'Non Alcoholic Beverages'),
(6, 'Alcoholic Beverage'),
(7, 'Home Equipments');

-- --------------------------------------------------------

--
-- Table structure for table `product_quantity_txns`
--

CREATE TABLE `product_quantity_txns` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `txn_type` varchar(255) NOT NULL,
  `txn_quantity` int(11) NOT NULL,
  `txn_date` varchar(255) NOT NULL,
  `txn_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_quantity_txns`
--

INSERT INTO `product_quantity_txns` (`id`, `product`, `txn_type`, `txn_quantity`, `txn_date`, `txn_time`) VALUES
(1, 27, 'OUT', 4, '2023-05-28', '20:37:41'),
(2, 27, 'OUT', 4, '2023-05-28', '20:39:27'),
(3, 29, 'OUT', 9, '2023-05-28', '20:41:51'),
(4, 27, 'OUT', 4, '2023-05-28', '20:43:29'),
(5, 29, 'OUT', 9, '2023-05-28', '20:44:06'),
(6, 27, 'OUT', 1, '2023-05-29', '08:06:18'),
(7, 28, 'OUT', 2, '2023-05-29', '08:10:21'),
(8, 27, 'OUT', 400, '2023-05-29', '08:14:21'),
(9, 27, 'OUT', 1, '2023-05-29', '08:15:35'),
(10, 27, 'OUT', 1, '2023-05-29', '08:16:18'),
(11, 27, 'OUT', 47, '2023-05-29', '08:17:01'),
(12, 27, 'OUT', 4, '2023-05-29', '08:17:13'),
(13, 27, 'IN', 10, '2023-05-31', '23:08:26'),
(14, 27, 'IN', 1, '2023-05-31', '23:08:35'),
(15, 27, 'IN', 1, '2023-05-31', '23:08:40'),
(16, 27, 'IN', 0, '2023-05-31', '23:08:44'),
(17, 27, 'IN', 0, '2023-05-31', '23:09:43'),
(18, 27, 'IN', 0, '2023-05-31', '23:09:45'),
(19, 28, 'IN', 2, '2023-05-31', '23:10:01'),
(20, 28, 'IN', 1, '2023-05-31', '23:10:05'),
(21, 28, 'IN', 1, '2023-05-31', '23:10:09'),
(22, 28, 'IN', 1, '2023-05-31', '23:10:14'),
(23, 28, 'IN', 8, '2023-05-31', '23:10:28'),
(24, 27, 'IN', 2, '2023-05-31', '23:11:03'),
(25, 27, 'IN', 9, '2023-05-31', '23:11:11'),
(26, 27, 'IN', 6, '2023-05-31', '23:11:17'),
(27, 27, 'IN', 23, '2023-05-31', '23:17:19'),
(28, 27, 'IN', 23, '2023-05-31', '23:18:11'),
(29, 27, 'IN', 23, '2023-05-31', '23:18:16'),
(30, 27, 'IN', 23, '2023-05-31', '23:18:17'),
(31, 27, 'IN', 23, '2023-05-31', '23:18:18'),
(32, 27, 'IN', 23, '2023-05-31', '23:18:19'),
(33, 27, 'IN', 23, '2023-05-31', '23:18:20'),
(34, 27, 'IN', 23, '2023-05-31', '23:18:21'),
(35, 27, 'IN', 1, '2023-05-31', '23:18:31'),
(36, 27, 'IN', 1, '2023-05-31', '23:18:36'),
(37, 27, 'IN', 1, '2023-05-31', '23:18:37'),
(38, 27, 'IN', 1, '2023-05-31', '23:18:37'),
(39, 27, 'IN', 1, '2023-05-31', '23:18:38'),
(40, 27, 'IN', 1, '2023-05-31', '23:18:38'),
(41, 27, 'IN', 1, '2023-05-31', '23:18:39'),
(42, 27, 'IN', 1, '2023-05-31', '23:18:39'),
(43, 27, 'IN', 1, '2023-05-31', '23:18:39'),
(44, 27, 'IN', 1, '2023-05-31', '23:18:39'),
(45, 27, 'IN', 1, '2023-05-31', '23:18:40'),
(46, 28, 'IN', 2, '2023-06-01', '08:32:13'),
(47, 28, 'IN', 4, '2023-06-01', '08:32:22'),
(48, 30, 'IN', 47, '2023-06-03', '15:19:21'),
(49, 30, 'IN', 47, '2023-06-03', '15:19:25'),
(50, 31, 'IN', 30, '2023-06-04', '08:55:05'),
(51, 31, 'OUT', 2, '2023-06-04', '09:06:45'),
(52, 31, 'IN', 60, '2023-06-04', '10:53:13'),
(53, 32, 'IN', 90, '2023-06-04', '10:53:59'),
(54, 28, 'OUT', 1, '2023-06-10', '12:36:07'),
(55, 30, 'OUT', 1, '2023-06-17', '15:13:35'),
(56, 29, 'OUT', 1, '2023-06-20', '06:56:24'),
(57, 28, 'OUT', 1, '2023-06-20', '06:57:24'),
(58, 29, 'OUT', 1, '2023-06-20', '06:57:43'),
(59, 27, 'OUT', 1, '2023-06-20', '07:51:21'),
(60, 29, 'OUT', 3, '2023-06-20', '07:56:23'),
(61, 29, 'OUT', 3, '2023-06-20', '07:59:10'),
(62, 27, 'OUT', 5, '2023-06-20', '09:19:23'),
(63, 27, 'OUT', 1, '2023-06-20', '09:27:57'),
(64, 27, 'OUT', 1, '2023-06-20', '09:50:07'),
(65, 27, 'IN', 168, '2023-06-25', '07:44:08'),
(66, 33, 'IN', 23039, '2023-07-19', '08:27:57'),
(67, 33, 'OUT', 1, '2023-07-19', '08:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `profilepicture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `seller_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `firstname`, `lastname`, `email`, `phone`, `profilepicture`, `password`, `seller_status`) VALUES
(3, 'Hiwa ', 'Pacifique', 'hirwapacifique@gmail.com', 2147483647, 'hirwapacifique@gmail.com - Profile image .png', '12345678', 'Selling'),
(4, 'Marina', 'Deborah', 'marinadeborah@gmail.com', 738483828, 'marinadeborah@gmail.com - Profile image .png', '123456', 'Selling'),
(5, 'Obote', 'Sam', 'obotesam@rezi.pb', 2147483647, 'obotesam@rezi.pb - Profile image .png', '123456', 'Stopped'),
(6, 'Ndahimana', 'Bonheur', 'bonher@gmail.com', 2147483647, 'bonher@gmail.com - Profile image .png', '123456', 'Selling'),
(7, 'dfvciojio', 'jijfweiocjioj', 'iojdiowjdioj@ggf.d', 1223, 'iojdiowjdioj@ggf.d - Profile image .png', '123456', 'Selling'),
(8, 'sdvcoij', 'ijciosjcioj', 'ijfdioj@gdf.ef', 4394389, 'ijfdioj@gdf.ef - Profile image .png', '123456', 'Stopped'),
(9, 'sdfioj', 'ihduiehuihui', 'uivndndiN@drfgdf.regve', 2147483647, 'uivndndiN@drfgdf.regve - Profile image .png', '123456', 'Waiting list'),
(10, 'dio', 'hdui', 'tsindacyimanakevin@gmail.com', 0, 'tsindacyimanakevin@gmail.com - Profile image .png', 'p', 'Waiting list');

-- --------------------------------------------------------

--
-- Table structure for table `sellers_orders_notifier`
--

CREATE TABLE `sellers_orders_notifier` (
  `id` int(11) NOT NULL,
  `sender` int(6) UNSIGNED ZEROFILL NOT NULL,
  `shop` int(11) NOT NULL,
  `notifier_msg` text NOT NULL,
  `order_id` int(11) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Not viewed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers_orders_notifier`
--

INSERT INTO `sellers_orders_notifier` (`id`, `sender`, `shop`, `notifier_msg`, `order_id`, `datetime`, `status`) VALUES
(6, 000001, 12, 'Hello The manager of Marina Rama Shop, We are happy to remind you that\r\n                        you have the order that was placed on 2023-06-06 at 13:09:49 but it is\r\n                        still Pending. Thanks\r\n                    ', 46, '2023-06-06 13:12:22', 'Viewed'),
(7, 000001, 12, 'Hello The manager of Marina Rama Shop, We are happy to remind you that\r\n                        you have the order that was placed on 2023-06-06 at 13:09:40 but it is\r\n                        still Pending. Thanks\r\n                    ', 44, '2023-06-06 13:12:26', 'Viewed'),
(8, 000001, 12, 'Hello The manager of Marina Rama Shop, We are happy to remind you that\r\n                        you have the order that was placed on 2023-06-06 at 13:09:39 but it is\r\n                        still Pending. Thanks\r\n                    ', 43, '2023-06-06 13:12:31', 'Not viewed'),
(9, 000001, 12, 'Hello The manager of Marina Rama Shop, We are happy to remind you that\r\n                        you have the order that was placed on 2023-06-06 at 13:09:29 but it is\r\n                        still Pending. Thanks\r\n                    ', 41, '2023-06-06 13:12:33', 'Viewed');

-- --------------------------------------------------------

--
-- Table structure for table `sellers_payment_methods`
--

CREATE TABLE `sellers_payment_methods` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `method` int(11) NOT NULL,
  `method_digits` text NOT NULL,
  `add_date` varchar(255) NOT NULL,
  `add_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Unverfied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers_payment_methods`
--

INSERT INTO `sellers_payment_methods` (`id`, `seller`, `method`, `method_digits`, `add_date`, `add_time`, `status`) VALUES
(1, 4, 2, '722893974', '2023-05-31', '21:45:22', 'Verified'),
(2, 3, 1, '782855114', '2023-05-31', '22:04:43', 'Unverfied'),
(4, 4, 3, '2147483647', '2023-06-01', '10:05:22', 'Deleted'),
(5, 4, 4, '2147483647', '2023-06-01', '10:06:41', 'Deleted'),
(6, 4, 2, '2147483647', '2023-06-01', '10:08:11', 'Deleted'),
(7, 4, 2, '78655', '2023-06-01', '10:09:32', 'Deleted'),
(8, 4, 3, '1234', '2023-06-01', '10:10:11', 'Deleted'),
(9, 4, 3, '2147483647', '2023-06-01', '10:10:25', 'Deleted'),
(10, 4, 4, 'Erridk', '2023-06-01', '10:11:01', 'Deleted'),
(11, 4, 3, '401010029483', '2023-06-01', '10:11:15', 'Deleted'),
(12, 4, 3, '10238326', '2023-06-01', '10:13:33', 'Verified'),
(13, 6, 4, '536544377658', '2023-06-04', '09:29:55', 'Verified'),
(14, 4, 1, '68438747389', '2023-06-10', '11:18:20', 'Verified'),
(15, 4, 4, '438953358930595', '2023-06-10', '13:02:32', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `sellers_products_selling`
--

CREATE TABLE `sellers_products_selling` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `unityprice` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `receivedamount` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers_products_selling`
--

INSERT INTO `sellers_products_selling` (`id`, `product`, `seller`, `buyer`, `product_quantity`, `unityprice`, `totalprice`, `receivedamount`, `date`, `time`) VALUES
(1, 28, 4, 4, 1, 34000, 34000, 32300, '2023-06-20', '06:57:24'),
(2, 29, 4, 4, 1, 45000, 45000, 42750, '2023-06-20', '06:57:43'),
(3, 27, 4, 4, 1, 3700, 3700, 3515, '2023-06-20', '07:51:21'),
(4, 29, 4, 4, 3, 45000, 135000, 128250, '2023-06-20', '07:56:24'),
(5, 29, 4, 4, 3, 45000, 135000, 128250, '2023-06-20', '07:59:10'),
(6, 27, 4, 4, 5, 3700, 18500, 17575, '2023-06-20', '09:19:24'),
(7, 27, 4, 4, 1, 3700, 3700, 3515, '2023-06-20', '09:27:57'),
(8, 27, 4, 4, 1, 3700, 3700, 3515, '2023-06-20', '09:50:07'),
(9, 33, 4, 4, 1, 10000, 10000, 9500, '2023-07-19', '08:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `sellers_to_shops`
--

CREATE TABLE `sellers_to_shops` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers_to_shops`
--

INSERT INTO `sellers_to_shops` (`id`, `seller`, `shop`) VALUES
(1, 3, 10),
(2, 4, 12),
(3, 5, 13),
(4, 6, 14),
(5, 7, 15),
(6, 8, 16);

-- --------------------------------------------------------

--
-- Table structure for table `sellers_withdraws`
--

CREATE TABLE `sellers_withdraws` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `amount_withdrawed` int(11) NOT NULL,
  `amount_receivable` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers_withdraws`
--

INSERT INTO `sellers_withdraws` (`id`, `seller`, `date`, `time`, `amount_withdrawed`, `amount_receivable`, `status`) VALUES
(2, 4, '2023-05-31', '22:14:32', 40000, 40000, 'Withdrawed'),
(9, 6, '2023-06-04', '09:39:18', 97, 97, 'Withdrawed'),
(10, 6, '2023-06-04', '09:39:31', 97, 97, 'Withdrawed'),
(11, 6, '2023-06-04', '09:42:12', 1000, 950, 'Withdrawed'),
(12, 6, '2023-06-04', '10:32:50', 3, 3, 'Withdrawed'),
(13, 6, '2023-06-04', '10:33:45', 30000, 28500, 'Withdrawed'),
(14, 6, '2023-06-04', '10:41:39', 9000, 8550, 'Withdrawed'),
(15, 4, '2023-06-10', '12:55:39', 10000, 10000, 'Cancelled'),
(16, 4, '2023-06-10', '13:02:05', 50000, 50000, 'Withdrawed'),
(17, 4, '2023-06-20', '12:10:54', 300, 300, 'Cancelled'),
(18, 4, '2023-06-20', '12:12:53', 10000, 10000, 'Withdrawed');

-- --------------------------------------------------------

--
-- Table structure for table `seller_accounts`
--

CREATE TABLE `seller_accounts` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_accounts`
--

INSERT INTO `seller_accounts` (`id`, `seller`, `balance`) VALUES
(1, 4, 527333),
(2, 3, 0),
(3, 6, 900);

-- --------------------------------------------------------

--
-- Table structure for table `seller_money_txns`
--

CREATE TABLE `seller_money_txns` (
  `id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `txn_type` varchar(255) NOT NULL,
  `oldacc` int(11) NOT NULL,
  `new_acc` int(11) NOT NULL,
  `txn_date` varchar(255) NOT NULL,
  `txn_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_money_txns`
--

INSERT INTO `seller_money_txns` (`id`, `seller`, `txn_type`, `oldacc`, `new_acc`, `txn_date`, `txn_time`) VALUES
(1, 4, 'IN', 0, 740, '2023-05-28', '20:37:41'),
(2, 4, 'IN', 0, 740, '2023-05-28', '20:39:27'),
(3, 4, 'IN', 0, 20250, '2023-05-28', '20:41:50'),
(4, 4, 'IN', 0, 740, '2023-05-28', '20:43:29'),
(5, 4, 'IN', 0, 20250, '2023-05-28', '20:44:06'),
(6, 4, 'IN', 0, 185, '2023-05-29', '08:06:18'),
(7, 4, 'IN', 0, 64600, '2023-05-29', '08:10:21'),
(8, 4, 'IN', 0, 1406000, '2023-05-29', '08:14:21'),
(9, 4, 'IN', 0, 3515, '2023-05-29', '08:15:35'),
(10, 4, 'IN', 0, 3515, '2023-05-29', '08:16:17'),
(11, 4, 'IN', 3515, 168720, '2023-05-29', '08:17:01'),
(12, 4, 'IN', 168720, 182780, '2023-05-29', '08:17:13'),
(13, 6, 'IN', 0, 1900, '2023-06-04', '09:06:45'),
(14, 6, 'OUT', 1900, 900, '2023-06-04', '09:42:12'),
(15, 4, 'OUT', 182780, 142780, '2023-05-31', '22:14:32'),
(16, 6, 'OUT', 500, 403, '2023-06-04', '09:39:31'),
(17, 6, 'OUT', 40000, 39903, '2023-06-04', '09:39:18'),
(18, 6, 'OUT', 39903, 39900, '2023-06-04', '10:32:50'),
(19, 6, 'OUT', 39900, 9900, '2023-06-04', '10:33:45'),
(20, 6, 'OUT', 9900, 900, '2023-06-04', '10:41:39'),
(21, 4, 'IN', 142780, 175080, '2023-06-10', '12:36:07'),
(22, 4, 'OUT', 175080, 125080, '2023-06-10', '13:02:05'),
(23, 4, 'IN', 125080, 125413, '2023-06-17', '15:13:35'),
(24, 4, 'IN', 125413, 168163, '2023-06-20', '06:56:24'),
(25, 4, 'IN', 168163, 200463, '2023-06-20', '06:57:24'),
(26, 4, 'IN', 200463, 243213, '2023-06-20', '06:57:43'),
(27, 4, 'IN', 243213, 246728, '2023-06-20', '07:51:21'),
(28, 4, 'IN', 246728, 374978, '2023-06-20', '07:56:23'),
(29, 4, 'IN', 374978, 503228, '2023-06-20', '07:59:10'),
(30, 4, 'IN', 503228, 520803, '2023-06-20', '09:19:23'),
(31, 4, 'IN', 520803, 524318, '2023-06-20', '09:27:57'),
(32, 4, 'IN', 524318, 527833, '2023-06-20', '09:50:07'),
(33, 4, 'OUT', 527833, 517833, '2023-06-20', '12:12:53'),
(34, 4, 'IN', 517833, 527333, '2023-07-19', '08:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `seller_withdraws_complaints`
--

CREATE TABLE `seller_withdraws_complaints` (
  `id` int(11) NOT NULL,
  `txnid` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `response` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_withdraws_complaints`
--

INSERT INTO `seller_withdraws_complaints` (`id`, `txnid`, `complaint`, `response`, `date`, `time`) VALUES
(2, 2, 'WTF is your problem? Where is my money. Am i working for your pocket??\r\n', 'Not yet responded', '2023-06-02', '23:29:44'),
(3, 10, 'tgjodfvjois d oifv jdo jio noi ndio', 'Not yet responded', '2023-06-04', '09:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(11) NOT NULL,
  `shop_logo` text NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_district` varchar(255) NOT NULL,
  `shop_sector` varchar(255) NOT NULL,
  `shop_location` varchar(255) NOT NULL,
  `shop_entry_date` varchar(255) NOT NULL,
  `shop_entry_time` varchar(255) NOT NULL,
  `shop_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shop_id`, `shop_logo`, `shop_name`, `shop_district`, `shop_sector`, `shop_location`, `shop_entry_date`, `shop_entry_time`, `shop_status`) VALUES
(4, 'Logo - Gabby Shop.png', 'Gabby Shop', 'Nyarugenge', 'Muhima', 'Muhima', '2023-04-28', '19:36:23', 'Trial period'),
(5, 'Logo - Kick SIde SHop.png', 'Kick SIde SHop', 'Musanze', 'Nyakinama', 'Bikara', '2023-04-28', '21:57:53', 'Trial period'),
(6, 'Logo - Vip Vip Vip.png', 'Vip Vip Vip', 'Musanze', 'Nyakinama', 'Busanza', '2010-10-10', '17:01:01', 'Trial period'),
(7, 'Logo - CocaCola Shop Distribution.png', 'CocaCola Shop Distribution', 'Nyarugenge', 'Nyarugenge', 'Nyarugenge', '2023-05-06', '10:03:14', 'Trial period'),
(8, 'Logo - A Sony Company Shop.png', 'A Sony Company Shop', 'Musanze', 'Nkotsi', 'Bikara', '2023-05-06', '10:04:10', 'Trial period'),
(9, 'Logo - Animal Products SH.png', 'Animal Products SH', 'Karongi', 'Mubuga', 'Ku mubuga', '2023-02-01', '10:06:11', 'Trial period'),
(10, 'null', 'Hirwa Shoes Shop', 'Gasabo', 'Batsinda', 'Nduba, hafi yibiyede', '2023-05-25', '12:12:46', 'Running'),
(12, 'Marina rama shop.png', 'Marina Rama Shop', 'Musanze', 'Nkotsi', 'Nyakinama mu midugudu', '2023-05-25', '17:36:43', 'Running'),
(13, 'null', 'Obote Store', 'null', 'null', 'null', '2023-06-03', '16:45:11', 'Stopped'),
(14, 'null', 'Bonheur Shop', 'null', 'null', 'null', '2023-06-04', '08:52:31', 'Trial period'),
(15, 'null', 'jiojweiodjiojio', 'null', 'null', 'null', '2023-06-06', '20:25:01', 'Trial period'),
(16, 'null', 'efionjiujui', 'null', 'null', 'null', '2023-06-06', '20:45:37', 'Stopped');

-- --------------------------------------------------------

--
-- Table structure for table `shops_waiting`
--

CREATE TABLE `shops_waiting` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `wait_from` varchar(255) NOT NULL,
  `wait_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shops_waiting`
--

INSERT INTO `shops_waiting` (`id`, `seller_id`, `shop_name`, `wait_from`, `wait_status`) VALUES
(1, 3, 'Hirwa Shoes Shop', '2023-05-24 18:50:11', 'Running'),
(2, 4, 'Marina Rama Shop', '2023-05-25 17:36:01', 'Running'),
(3, 5, 'Obote Store', '2023-06-03 16:24:45', 'Running'),
(4, 6, 'Bonheur Shop', '2023-06-04 08:52:12', 'Running'),
(5, 7, 'jiojweiodjiojio', '2023-06-06 20:13:51', 'Running'),
(6, 8, 'efionjiujui', '2023-06-06 20:25:32', 'Running'),
(7, 9, 'ksdcnjnj', '2023-06-06 20:46:45', 'Waiting'),
(8, 10, 'kl', '2023-06-17 15:35:52', 'Waiting');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers_accounts`
--
ALTER TABLE `buyers_accounts`
  ADD PRIMARY KEY (`acc_id`),
  ADD KEY `fdghgff` (`buyer`);

--
-- Indexes for table `buyer_money_txns`
--
ALTER TABLE `buyer_money_txns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `erguiu` (`buyer`);

--
-- Indexes for table `buyer_money_txns_complaints`
--
ALTER TABLE `buyer_money_txns_complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fdgrtdfgdf` (`buyer`),
  ADD KEY `sewfioedjdiedohj` (`txnid`);

--
-- Indexes for table `buyer_payment_methods`
--
ALTER TABLE `buyer_payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fsikkmddjiojmdoi` (`buyer`),
  ADD KEY `widcjwiosjcox` (`method`);

--
-- Indexes for table `cart_draft`
--
ALTER TABLE `cart_draft`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dfjdfj` (`buyer`),
  ADD KEY `dfo iojoi` (`product`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_sn`);

--
-- Indexes for table `courier_accounts`
--
ALTER TABLE `courier_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gdfgdfgdfgfg` (`courier`);

--
-- Indexes for table `courier_payment_methods`
--
ALTER TABLE `courier_payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dfsdfdgsdgfv` (`courier`);

--
-- Indexes for table `courier_txn_in`
--
ALTER TABLE `courier_txn_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ionjuihjui` (`courier`);

--
-- Indexes for table `courier_work_proofs`
--
ALTER TABLE `courier_work_proofs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dsiofvjvdrfiosj` (`orders`),
  ADD KEY `sadajdiewqo` (`courier`);

--
-- Indexes for table `co_members`
--
ALTER TABLE `co_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Type` (`Type`);

--
-- Indexes for table `co_members_auth`
--
ALTER TABLE `co_members_auth`
  ADD KEY `Coo` (`id`);

--
-- Indexes for table `co_members_types`
--
ALTER TABLE `co_members_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_draft`
--
ALTER TABLE `deposit_draft`
  ADD PRIMARY KEY (`transaction_id`,`transaction_payment_method`),
  ADD KEY `dkodjiujhui` (`transaction_payment_method`),
  ADD KEY `sdfiojoiwjqio` (`transaction_recorder`);

--
-- Indexes for table `home_sliding_shops`
--
ALTER TABLE `home_sliding_shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dfgfgfhgfhgfhgfs` (`shop`);

--
-- Indexes for table `owner_account_txns`
--
ALTER TABLE `owner_account_txns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fgb fgbgb` (`shop`);

--
-- Indexes for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_genres`
--
ALTER TABLE `product_genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `product_quantity_txns`
--
ALTER TABLE `product_quantity_txns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uischduicsdhiohj` (`product`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers_orders_notifier`
--
ALTER TABLE `sellers_orders_notifier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sduigfdhuihnuisdjui` (`order_id`),
  ADD KEY `uhiuhuihuihn` (`shop`),
  ADD KEY `CSDFUIHSDUI` (`sender`);

--
-- Indexes for table `sellers_payment_methods`
--
ALTER TABLE `sellers_payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rhgtrgrtgrtgtgtrg` (`method`),
  ADD KEY `trgrttgtrwrg` (`seller`);

--
-- Indexes for table `sellers_products_selling`
--
ALTER TABLE `sellers_products_selling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dsfgvodfjviovfdioio` (`seller`),
  ADD KEY `dsfmfioferioamioerm` (`product`),
  ADD KEY `iuhuihuihuihu` (`buyer`);

--
-- Indexes for table `sellers_to_shops`
--
ALTER TABLE `sellers_to_shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uihuihui` (`seller`),
  ADD KEY `huihyhuyhb` (`shop`);

--
-- Indexes for table `sellers_withdraws`
--
ALTER TABLE `sellers_withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fgtrgfd` (`seller`);

--
-- Indexes for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sdfjkfvndfjdnij` (`seller`);

--
-- Indexes for table `seller_money_txns`
--
ALTER TABLE `seller_money_txns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dfiovdjoivmjvio` (`seller`);

--
-- Indexes for table `seller_withdraws_complaints`
--
ALTER TABLE `seller_withdraws_complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `txnid` (`txnid`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `shops_waiting`
--
ALTER TABLE `shops_waiting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fgiorfjdio` (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buyers_accounts`
--
ALTER TABLE `buyers_accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyer_money_txns`
--
ALTER TABLE `buyer_money_txns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `buyer_money_txns_complaints`
--
ALTER TABLE `buyer_money_txns_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_payment_methods`
--
ALTER TABLE `buyer_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_draft`
--
ALTER TABLE `cart_draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_sn` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courier_accounts`
--
ALTER TABLE `courier_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courier_payment_methods`
--
ALTER TABLE `courier_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courier_txn_in`
--
ALTER TABLE `courier_txn_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courier_work_proofs`
--
ALTER TABLE `courier_work_proofs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `co_members`
--
ALTER TABLE `co_members`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `co_members_types`
--
ALTER TABLE `co_members_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_sliding_shops`
--
ALTER TABLE `home_sliding_shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `owner_account_txns`
--
ALTER TABLE `owner_account_txns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products_orders`
--
ALTER TABLE `products_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product_genres`
--
ALTER TABLE `product_genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_quantity_txns`
--
ALTER TABLE `product_quantity_txns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sellers_orders_notifier`
--
ALTER TABLE `sellers_orders_notifier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sellers_payment_methods`
--
ALTER TABLE `sellers_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sellers_products_selling`
--
ALTER TABLE `sellers_products_selling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sellers_to_shops`
--
ALTER TABLE `sellers_to_shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sellers_withdraws`
--
ALTER TABLE `sellers_withdraws`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller_money_txns`
--
ALTER TABLE `seller_money_txns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `seller_withdraws_complaints`
--
ALTER TABLE `seller_withdraws_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shops_waiting`
--
ALTER TABLE `shops_waiting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyers_accounts`
--
ALTER TABLE `buyers_accounts`
  ADD CONSTRAINT `fdghgff` FOREIGN KEY (`buyer`) REFERENCES `buyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer_money_txns`
--
ALTER TABLE `buyer_money_txns`
  ADD CONSTRAINT `erguiu` FOREIGN KEY (`buyer`) REFERENCES `buyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer_money_txns_complaints`
--
ALTER TABLE `buyer_money_txns_complaints`
  ADD CONSTRAINT `fdgrtdfgdf` FOREIGN KEY (`buyer`) REFERENCES `buyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sewfioedjdiedohj` FOREIGN KEY (`txnid`) REFERENCES `buyer_money_txns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer_payment_methods`
--
ALTER TABLE `buyer_payment_methods`
  ADD CONSTRAINT `fsikkmddjiojmdoi` FOREIGN KEY (`buyer`) REFERENCES `buyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `widcjwiosjcox` FOREIGN KEY (`method`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_draft`
--
ALTER TABLE `cart_draft`
  ADD CONSTRAINT `dfjdfj` FOREIGN KEY (`buyer`) REFERENCES `buyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dfo iojoi` FOREIGN KEY (`product`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courier_accounts`
--
ALTER TABLE `courier_accounts`
  ADD CONSTRAINT `gdfgdfgdfgfg` FOREIGN KEY (`courier`) REFERENCES `courier` (`courier_sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courier_payment_methods`
--
ALTER TABLE `courier_payment_methods`
  ADD CONSTRAINT `dfsdfdgsdgfv` FOREIGN KEY (`courier`) REFERENCES `courier` (`courier_sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courier_txn_in`
--
ALTER TABLE `courier_txn_in`
  ADD CONSTRAINT `ionjuihjui` FOREIGN KEY (`courier`) REFERENCES `courier` (`courier_sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courier_work_proofs`
--
ALTER TABLE `courier_work_proofs`
  ADD CONSTRAINT `dsiofvjvdrfiosj` FOREIGN KEY (`orders`) REFERENCES `products_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sadajdiewqo` FOREIGN KEY (`courier`) REFERENCES `courier` (`courier_sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_members`
--
ALTER TABLE `co_members`
  ADD CONSTRAINT `co_members_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `co_members_types` (`id`);

--
-- Constraints for table `co_members_auth`
--
ALTER TABLE `co_members_auth`
  ADD CONSTRAINT `Coo` FOREIGN KEY (`id`) REFERENCES `co_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deposit_draft`
--
ALTER TABLE `deposit_draft`
  ADD CONSTRAINT `dkodjiujhui` FOREIGN KEY (`transaction_payment_method`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sdfiojoiwjqio` FOREIGN KEY (`transaction_recorder`) REFERENCES `co_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `home_sliding_shops`
--
ALTER TABLE `home_sliding_shops`
  ADD CONSTRAINT `dfgfgfhgfhgfhgfs` FOREIGN KEY (`shop`) REFERENCES `shops` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fgb fgbgb` FOREIGN KEY (`shop`) REFERENCES `shops` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_quantity_txns`
--
ALTER TABLE `product_quantity_txns`
  ADD CONSTRAINT `uischduicsdhiohj` FOREIGN KEY (`product`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellers_orders_notifier`
--
ALTER TABLE `sellers_orders_notifier`
  ADD CONSTRAINT `CSDFUIHSDUI` FOREIGN KEY (`sender`) REFERENCES `co_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sduigfdhuihnuisdjui` FOREIGN KEY (`order_id`) REFERENCES `products_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uhiuhuihuihn` FOREIGN KEY (`shop`) REFERENCES `shops` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellers_payment_methods`
--
ALTER TABLE `sellers_payment_methods`
  ADD CONSTRAINT `rhgtrgrtgrtgtgtrg` FOREIGN KEY (`method`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trgrttgtrwrg` FOREIGN KEY (`seller`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellers_products_selling`
--
ALTER TABLE `sellers_products_selling`
  ADD CONSTRAINT `dsfgvodfjviovfdioio` FOREIGN KEY (`seller`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dsfmfioferioamioerm` FOREIGN KEY (`product`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iuhuihuihuihu` FOREIGN KEY (`buyer`) REFERENCES `buyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellers_to_shops`
--
ALTER TABLE `sellers_to_shops`
  ADD CONSTRAINT `huihyhuyhb` FOREIGN KEY (`shop`) REFERENCES `shops` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uihuihui` FOREIGN KEY (`seller`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellers_withdraws`
--
ALTER TABLE `sellers_withdraws`
  ADD CONSTRAINT `fgtrgfd` FOREIGN KEY (`seller`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  ADD CONSTRAINT `sdfjkfvndfjdnij` FOREIGN KEY (`seller`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller_money_txns`
--
ALTER TABLE `seller_money_txns`
  ADD CONSTRAINT `dfiovdjoivmjvio` FOREIGN KEY (`seller`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller_withdraws_complaints`
--
ALTER TABLE `seller_withdraws_complaints`
  ADD CONSTRAINT `seller_withdraws_complaints_ibfk_1` FOREIGN KEY (`txnid`) REFERENCES `sellers_withdraws` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shops_waiting`
--
ALTER TABLE `shops_waiting`
  ADD CONSTRAINT `fgiorfjdio` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
