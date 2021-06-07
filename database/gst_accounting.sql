-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 12:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gst_accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblclient_group`
--

CREATE TABLE `tblclient_group` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclient_group`
--

INSERT INTO `tblclient_group` (`id`, `name`, `description`, `is_deleted`, `created_at`, `is_user`) VALUES
(1, 'K Creation', 'Surat', 0, '2021-04-06 08:51:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `effecton` text NOT NULL,
  `accountsgroup` text NOT NULL,
  `area` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `panno` text NOT NULL,
  `aadharno` text NOT NULL,
  `gstno` text NOT NULL,
  `openingbalance` int(11) NOT NULL,
  `actype` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `name`, `effecton`, `accountsgroup`, `area`, `pincode`, `city`, `state`, `panno`, `aadharno`, `gstno`, `openingbalance`, `actype`, `is_deleted`, `created_at`, `updated_at`, `is_user`) VALUES
(1, 'Sales A/c. (CST C Form)', 'Trading Accounts', '7', '', 0, '', '', '', '', '', 0, 'CREDIT', 1, '2021-04-06 09:52:00', '2021-05-10 08:41:42', 0),
(2, 'Sales A/c. (GST)', 'Trading Accounts', '7', '', 0, '', '', '', '', '', 0, 'CREDIT', 0, '2021-04-06 09:56:29', '2021-05-10 07:45:17', 0),
(3, 'Sales A/c. (IGST)', 'Trading Accounts', '7', '', 0, '', '', '', '', '', 0, 'CREDIT', 0, '2021-04-06 09:57:11', '2021-05-10 07:45:21', 0),
(4, 'Sales A/c. (Nil Rated)', 'Trading Accounts', '7', '', 0, '', '', '', '', '', 0, 'CREDIT', 1, '2021-04-06 09:57:43', '2021-05-10 08:41:51', 0),
(5, 'Sales A/c. (Non GST)', 'Trading Accounts', '7', '', 0, '', '', '', '', '', 0, 'CREDIT', 1, '2021-04-06 09:58:14', '2021-05-10 08:41:56', 0),
(6, 'Sales A/c. (Other)', 'Trading Accounts', '7', '', 0, '', '', '', '', '', 0, 'CREDIT', 0, '2021-04-06 09:59:41', '2021-05-10 07:45:59', 0),
(7, 'Sales A/c. (VAT 12.5%+2.5%)', 'Trading Accounts', '7', '', 0, '', '', '', '', '', 0, 'CREDIT', 1, '2021-04-06 10:00:19', '2021-05-10 08:42:09', 0),
(8, 'Sales A/c. (VAT 4%+1%)', 'Trading Accounts', '7', '', 0, '', '', '', '', '', 0, 'CREDIT', 1, '2021-04-06 10:00:43', '2021-05-10 08:42:25', 0),
(9, 'Purchase A/c. (CST C Form)', 'Trading Accounts', '6', '', 0, '', '', '', '', '', 0, 'DEBIT', 1, '2021-04-06 10:02:41', '2021-05-10 08:42:30', 0),
(10, 'Purchase A/c. (GST)', 'Trading Accounts', '6', '', 0, '', '', '', '', '', 0, 'DEBIT', 0, '2021-04-06 10:03:34', '2021-05-10 07:46:55', 0),
(11, 'Purchase A/c. (IGST)', 'Trading Accounts', '6', '', 0, '', '', '', '', '', 0, 'DEBIT', 0, '2021-04-06 10:04:28', '2021-05-10 07:46:59', 0),
(12, 'Purchase A/c. (Nil Rated)', 'Trading Accounts', '6', '', 0, '', '', '', '', '', 0, 'DEBIT', 1, '2021-04-06 10:05:00', '2021-05-10 08:42:39', 0),
(13, 'Purchase A/c. (Non GST)', 'Trading Accounts', '6', '', 0, '', '', '', '', '', 0, 'DEBIT', 1, '2021-04-06 10:05:35', '2021-05-10 08:42:52', 0),
(14, 'Purchase A/c. (Other)', 'Trading Accounts', '6', '', 0, '', '', '', '', '', 0, 'DEBIT', 0, '2021-04-06 10:06:42', '2021-05-10 07:47:31', 0),
(15, 'Purchase A/c. (VAT 12.5%+2.5%)', 'Trading Accounts', '6', '', 0, '', '', '', '', '', 0, 'DEBIT', 1, '2021-04-06 10:07:16', '2021-05-10 08:42:58', 0),
(16, 'Purchase A/c. (VAT 4%+1%)', 'Trading Accounts', '6', '', 0, '', '', '', '', '', 0, 'DEBIT', 1, '2021-04-06 10:07:43', '2021-05-10 08:43:02', 0),
(17, 'Cash Ledger(SGST- Late Fee) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:09:16', '2021-05-10 08:43:21', 0),
(18, 'Cash Ledger(SGST- Other) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:09:45', '2021-04-11 08:42:49', 0),
(19, 'Cash Ledger(SGST- Penalty) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:10:25', '2021-04-11 08:42:49', 0),
(20, 'Central Tax A/c. (I/P)', 'Balance Sheet', '27', '', 0, '', '', '', '', '', 202, 'ASSET', 0, '2021-04-06 10:11:23', '2021-05-09 10:42:03', 0),
(21, 'Central Tax A/c. (O/P)', 'Balance Sheet', '27', '', 0, '', '', '', '', '', 10115, 'LIABILITY', 0, '2021-04-06 10:11:53', '2021-05-09 10:43:54', 0),
(22, 'Cess A/c. (I/P)', 'Balance Sheet', '27', '', 0, '', '', '', '', '', 0, 'ASSET', 0, '2021-04-06 10:12:22', '2021-05-09 10:43:29', 0),
(23, 'Cess A/c. (O/P)', 'Balance Sheet', '23', '', 0, '', '', '', '', '', 0, 'LIABILITY', 0, '2021-04-06 10:13:07', '2021-05-09 10:44:00', 0),
(24, 'Composition(CGST) Tax Exp. A/c', 'Trading Accounts', '1', '', 0, '', '', '', '', '', 0, 'DEBIT', 1, '2021-04-06 10:14:03', '2021-05-10 08:43:42', 0),
(25, 'Composition(SGST) Tax Exp. A/c', 'Trading Accounts', '1', '', 0, '', '', '', '', '', 0, 'DEBIT', 1, '2021-04-06 10:14:26', '2021-05-10 08:43:57', 0),
(26, 'Cash Ledger(Cess) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:17:55', '2021-04-11 08:42:49', 0),
(27, 'Cash Ledger(Cess- Interest) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:18:34', '2021-04-11 08:42:49', 0),
(28, 'Cash Ledger(Cess- Late Fee) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:19:06', '2021-04-11 08:42:49', 0),
(29, 'Cash Ledger(Cess- Other) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:19:38', '2021-04-11 08:42:49', 0),
(30, 'Cash Ledger(Cess- Penalty) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:20:01', '2021-04-11 08:42:49', 0),
(31, 'Cash Ledger(CGST) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:20:28', '2021-04-11 08:42:49', 0),
(32, 'Cash Ledger(CGST- Interest) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:20:55', '2021-04-11 08:42:49', 0),
(33, 'Cash Ledger(CGST- Late Fee) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:21:19', '2021-04-11 08:42:49', 0),
(34, 'Cash Ledger(CGST- Other) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:21:43', '2021-04-11 08:42:49', 0),
(35, 'Cash Ledger(CGST- Penalty) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:22:15', '2021-04-11 08:42:49', 0),
(36, 'Cash Ledger(IGST) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:23:09', '2021-04-11 08:42:49', 0),
(37, 'Cash Ledger(IGST- Interest) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:23:33', '2021-04-11 08:42:49', 0),
(38, 'Cash Ledger(IGST- Late Fee) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:23:59', '2021-04-11 08:42:49', 0),
(39, 'Cash Ledger(IGST- Other) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:24:30', '2021-04-11 08:42:49', 0),
(40, 'Cash Ledger(IGST- Penalty) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:29:40', '2021-04-11 08:42:49', 0),
(41, 'Cash Ledger(SGST) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:30:08', '2021-04-11 08:42:49', 0),
(42, 'Cash Ledger(SGST- Interest) - Primary Unit', 'Balance Sheet', '20', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:30:35', '2021-04-11 08:42:49', 0),
(43, 'Other Charges / Round Off', 'Profit & Loss Accounts', '10', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:34:43', '2021-04-11 08:42:49', 0),
(44, 'Other Expense A/c.(Default)', 'Profit & Loss Accounts', '10', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:35:08', '2021-04-11 08:42:49', 0),
(45, 'Packing & Forwarding', 'Trading Accounts', '3', '', 0, '', '', '', '', '', 100, 'CREDIT', 0, '2021-04-06 10:35:43', '2021-05-11 09:37:25', 0),
(46, 'Packing Material', 'Trading Accounts', '1', '', 0, '', '', '', '', '', 300000, 'DEBIT', 0, '2021-04-06 10:36:11', '2021-05-11 10:11:56', 0),
(47, 'Penalty Expense A/c.(Default)', 'Profit & Loss Accounts', '10', '', 0, '', '', '', '', '', 0, 'Debit', 0, '2021-04-06 10:36:40', '2021-04-11 08:42:49', 0),
(48, 'Cash Account', 'Balance Sheet', '21', '', 0, '', '', '', '', '', 703061, 'ASSET', 0, '2021-04-06 10:42:03', '2021-05-26 12:26:39', 1),
(49, 'HDFC Bank ', 'Balance Sheet', '18', '', 0, '', '', '', '', '', 0, 'LIABILITY', 0, '2021-04-06 10:52:02', '2021-05-09 10:47:42', 0),
(50, 'Axis Bank Ltd.', 'Balance Sheet', '17', '', 0, '', '', '', '', '', -299000, 'ASSET', 0, '2021-04-06 10:52:47', '2021-05-11 10:11:56', 0),
(51, 'Anil Enterprise', 'Balance Sheet', '42', '', 0, 'Surat', 'Gujarat', '', '', '', 582790, 'ASSET', 0, '2021-04-06 11:47:04', '2021-05-09 10:49:56', 1),
(52, 'Tushar Fashion', 'Balance Sheet', '41', 'Mota Varachha', 394101, 'Goa', 'GOA', '887767474634', '87686578465745', '6775544443344565', 309215, 'LIABILITY', 0, '2021-04-23 09:02:28', '2021-05-09 10:47:11', 1),
(53, 'raj', 'Balance Sheet', '41', '', 394101, 'Baroda', 'GUJARAT', '', '', '', 27802, 'LIABILITY', 0, '2021-05-05 08:15:33', '2021-05-11 09:36:33', 1),
(54, 'BOB', 'Balance Sheet', '17', 'Mota Varachha', 394101, 'Bijapur', 'KERALA', '887767474634', '87686578465745', '6775544443344565', 10, 'ASSET', 0, '2021-05-06 08:46:48', '2021-05-09 10:50:02', 1),
(55, 'Petrol Expenses A/c.', 'Profit & Loss Accounts', '10', 'Surat', 0, 'Surat', 'Gujarat', '', '', '', 0, 'Credit', 0, '2021-05-07 09:31:40', '2021-05-07 11:49:01', 1),
(56, 'State Tax A/c. (I/P)', 'Balance Sheet', '27', '', 0, '', '', '', '', '', 202, 'ASSET', 0, '2021-05-07 10:26:30', '2021-05-09 10:40:07', 1),
(57, 'State Tax A/c. (O/P)', 'Balance Sheet', '27', '', 0, '', '', '', '', '', 10115, 'LIABILITY', 0, '2021-05-07 10:27:11', '2021-05-09 10:38:22', 1),
(58, 'Integrated Tax A/c. (I/P)', 'Balance Sheet', '27', '', 0, '', '', '', '', '', 0, 'ASSET', 0, '2021-05-07 10:38:42', '2021-05-09 10:40:12', 1),
(59, 'Integrated Tax A/c. (O/P)', 'Balance Sheet', '27', '', 0, '', '', '', '', '', 2023, 'LIABILITY', 0, '2021-05-07 10:39:32', '2021-05-11 09:36:33', 1),
(60, 'Sale Wastage', 'Profit & Loss Accounts', '12', '', 0, '', '', '', '', '', -5000, 'Credit', 0, '2021-05-11 09:18:08', '2021-05-26 12:26:39', 1),
(61, 'Gross Loss', 'Trading Accounts', '2', '', 0, '', '', '', '', '', 71503, 'Credit', 0, '2021-05-26 07:42:05', '2021-05-26 10:03:52', 1),
(62, 'Gross Profit', 'Trading Accounts', '2', '', 0, '', '', '', '', '', 0, 'Credit', 0, '2021-05-26 07:54:58', '2021-05-26 10:11:20', 1),
(63, 'Net Profit', 'Profit & Loss Accounts', '45', '', 0, '', '', '', '', '', 0, 'Credit', 0, '2021-05-29 11:11:32', '2021-05-29 11:11:32', 1),
(64, 'Net Loss', 'Profit & Loss Accounts', '45', '', 0, '', '', '', '', '', 67603, 'Credit', 0, '2021-05-29 11:12:12', '2021-05-29 11:17:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accountsgroup`
--

CREATE TABLE `tbl_accountsgroup` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `effecton` text NOT NULL,
  `sequence` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accountsgroup`
--

INSERT INTO `tbl_accountsgroup` (`id`, `name`, `effecton`, `sequence`, `is_deleted`, `created_at`, `is_user`) VALUES
(1, 'Expenses(Direct)', 'Trading Accounts', 2, 0, '2021-04-06 09:15:16', 1),
(2, 'General Trading Account', 'Trading Accounts', 2, 1, '2021-04-06 09:15:52', 1),
(3, 'Income (Trading)', 'Trading Accounts', 1, 0, '2021-04-06 09:16:55', 1),
(4, 'Jobwork Expense', 'Trading Accounts', 2, 0, '2021-04-06 09:17:30', 1),
(5, 'Jobwork Income (Trading)', 'Trading Accounts', 1, 0, '2021-04-06 09:18:14', 1),
(6, 'Purchase Account', 'Trading Accounts', 2, 0, '2021-04-06 09:18:59', 1),
(7, 'Sales Account', 'Trading Accounts', 1, 0, '2021-04-06 09:19:20', 1),
(8, 'Share (Purchase)', 'Trading Accounts', 2, 0, '2021-04-06 09:20:10', 1),
(9, 'Share (Sales)', 'Trading Accounts', 1, 0, '2021-04-06 09:20:43', 1),
(10, 'Expense Account', 'Profit & Loss Accounts', 2, 0, '2021-04-06 09:23:06', 1),
(11, 'Income', 'Profit & Loss Accounts', 1, 0, '2021-04-06 09:23:23', 1),
(12, 'Income (Other Then Sales)', 'Profit & Loss Accounts', 1, 0, '2021-04-06 09:23:55', 1),
(13, 'Partner Interest', 'Profit & Loss Accounts', 2, 0, '2021-04-06 09:25:01', 1),
(14, 'Partner Remuneration', 'Profit & Loss Accounts', 2, 0, '2021-04-06 09:25:39', 1),
(15, 'Revenue Accounts', 'Profit & Loss Accounts', 2, 0, '2021-04-06 09:26:09', 1),
(16, 'Share (P&L)', 'Profit & Loss Accounts', 3, 1, '2021-04-06 09:26:31', 1),
(17, 'Bank Accounts (Banks)', 'Balance Sheet', 2, 0, '2021-04-06 09:27:18', 1),
(18, 'Bank OCC a/c', 'Balance Sheet', 1, 0, '2021-04-06 09:27:58', 1),
(19, 'Capital Accounts (Banks)', 'Balance Sheet', 1, 0, '2021-04-06 09:28:35', 1),
(20, 'Cash Ledger A/c.', 'Balance Sheet', 98, 1, '2021-04-06 09:29:13', 1),
(21, 'Cash-in-hand', 'Balance Sheet', 2, 0, '2021-04-06 09:29:41', 1),
(22, 'Current Assets', 'Balance Sheet', 2, 0, '2021-04-06 09:30:12', 1),
(23, 'Current Liabilities', 'Balance Sheet', 1, 0, '2021-04-06 09:30:48', 1),
(24, 'Debtors (Retail)', 'Balance Sheet', 3, 1, '2021-04-06 09:31:11', 1),
(25, 'Debtors (Wholesale)', 'Balance Sheet', 3, 1, '2021-04-06 09:31:55', 1),
(26, 'Deposites (Asset)', 'Balance Sheet', 2, 0, '2021-04-06 09:33:09', 1),
(27, 'Duties & Taxes', 'Balance Sheet', 0, 0, '2021-04-06 09:33:40', 1),
(28, 'Fixed Assests', 'Balance Sheet', 2, 0, '2021-04-06 09:34:02', 1),
(29, 'Investments', 'Balance Sheet', 2, 0, '2021-04-06 09:34:32', 1),
(30, 'Loans & Advances (Asset)', 'Balance Sheet', 2, 0, '2021-04-06 09:35:02', 1),
(31, 'Loans (Liability)', 'Balance Sheet', 1, 0, '2021-04-06 09:35:31', 1),
(32, 'Misc. Expenses (Asset)', 'Balance Sheet', 2, 0, '2021-04-06 09:36:09', 1),
(33, 'Mutual Fund', 'Balance Sheet', 3, 1, '2021-04-06 09:36:34', 1),
(34, 'Profit & Loss A/c', 'Balance Sheet', 0, 0, '2021-04-06 09:37:08', 1),
(35, 'Provisions', 'Balance Sheet', 1, 0, '2021-04-06 09:37:36', 1),
(36, 'Reserves & Surplus', 'Balance Sheet', 2, 1, '2021-04-06 09:38:09', 1),
(37, 'Secured Loans', 'Balance Sheet', 1, 0, '2021-04-06 09:38:41', 1),
(38, 'Share (F&O)', 'Balance Sheet', 3, 1, '2021-04-06 09:39:13', 1),
(39, 'Share (Investment)', 'Balance Sheet', 3, 1, '2021-04-06 09:39:39', 1),
(40, 'Stock-in-hand', 'Balance Sheet', 2, 0, '2021-04-06 09:40:15', 1),
(41, 'Sundry Creditors', 'Balance Sheet', 1, 0, '2021-04-06 09:40:52', 1),
(42, 'Sundry Debtors', 'Balance Sheet', 2, 0, '2021-04-06 09:41:16', 1),
(43, 'Suspence Account', 'Balance Sheet', 3, 1, '2021-04-06 09:41:41', 1),
(44, 'Unsecured Loans', 'Balance Sheet', 1, 0, '2021-04-06 09:42:07', 1),
(45, 'General P&L Account', 'Profit & Loss Accounts', 0, 0, '2021-05-29 11:10:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `company` varchar(200) NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `region` text NOT NULL,
  `country` text NOT NULL,
  `postbox` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `extra` varchar(150) NOT NULL,
  `customer_group` text NOT NULL,
  `lang` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `is_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `company`, `phone`, `email`, `address`, `city`, `region`, `country`, `postbox`, `discount`, `tax_id`, `document_id`, `extra`, `customer_group`, `lang`, `is_deleted`, `is_created`, `is_updated`, `is_user`) VALUES
(1, 'kishan', 'dhruva creaion', '05433441234', 'thsgg@gmail.com', '4343444', 'Los Angeles', 'MT', 'India', 0, 0, 32, 23, '3223', '', 'English', 0, '2021-04-05 17:25:53', '2021-04-05 17:25:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customercredit`
--

CREATE TABLE `tbl_customercredit` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `billtype` text NOT NULL,
  `refer` text NOT NULL,
  `orderdate` text NOT NULL,
  `orderduedate` text NOT NULL,
  `taxformat` text NOT NULL,
  `discountFormat` text NOT NULL,
  `notes` text NOT NULL,
  `cartarray` text NOT NULL,
  `totaltax` text NOT NULL,
  `totaldiscount` text NOT NULL,
  `total` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notes`
--

INSERT INTO `tbl_notes` (`id`, `title`, `description`, `created_at`, `is_deleted`, `is_user`) VALUES
(1, 'Hello ', 'Noo', '2021-04-05 12:00:06', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `product_code` text NOT NULL,
  `product_category` text NOT NULL,
  `product_group` text NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `tax_rate` int(11) NOT NULL,
  `discount_rate` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `product_code`, `product_category`, `product_group`, `price`, `description`, `tax_rate`, `discount_rate`, `product_qty`, `is_deleted`, `created_at`, `updated_at`, `is_user`) VALUES
(1, 'rrrr', '22', '1', '1', 2023, 'no', 10, 0, 50, 0, '2021-04-06 08:56:48', '2021-04-06 08:56:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcategory`
--

CREATE TABLE `tbl_productcategory` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productcategory`
--

INSERT INTO `tbl_productcategory` (`id`, `name`, `description`, `is_deleted`, `created_at`, `is_user`) VALUES
(1, 'K Creation', 'Surat', 0, '2021-04-06 08:56:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productgroup`
--

CREATE TABLE `tbl_productgroup` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productgroup`
--

INSERT INTO `tbl_productgroup` (`id`, `name`, `description`, `is_deleted`, `created_at`, `is_user`) VALUES
(1, 'material', '', 0, '2021-04-06 00:23:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchaseorder`
--

CREATE TABLE `tbl_purchaseorder` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `billtype` text NOT NULL,
  `refer` text NOT NULL,
  `orderdate` text NOT NULL,
  `orderduedate` text NOT NULL,
  `taxformat` text NOT NULL,
  `discountFormat` text NOT NULL,
  `notes` text NOT NULL,
  `cartarray` text NOT NULL,
  `totaltax` text NOT NULL,
  `totaldiscount` text NOT NULL,
  `total` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchaseorder`
--

INSERT INTO `tbl_purchaseorder` (`id`, `orderid`, `accountid`, `billtype`, `refer`, `orderdate`, `orderduedate`, `taxformat`, `discountFormat`, `notes`, `cartarray`, `totaltax`, `totaldiscount`, `total`, `is_deleted`, `created_at`, `updated_at`, `is_user`) VALUES
(1, 1, 53, 'PURCHASE ORDER', '', '07/05/2021', '', 'gst', 'b_p', '', 'a:1:{i:0;a:7:{s:12:\"product_name\";s:4:\"rrrr\";s:11:\"product_qty\";s:1:\"2\";s:13:\"product_price\";s:5:\" 2023\";s:11:\"product_tax\";s:2:\"10\";s:8:\"texttaxa\";s:6:\"404.60\";s:16:\"product_discount\";s:1:\"0\";s:7:\"ammount\";s:8:\"4,450.60\";}}', '202.3', '0.00', '4450.60', 0, '2021-05-07 12:19:33', '2021-05-07 12:19:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasestockreturn`
--

CREATE TABLE `tbl_purchasestockreturn` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `billtype` text NOT NULL,
  `refer` text NOT NULL,
  `orderdate` text NOT NULL,
  `orderduedate` text NOT NULL,
  `taxformat` text NOT NULL,
  `discountFormat` text NOT NULL,
  `notes` text NOT NULL,
  `cartarray` text NOT NULL,
  `totaltax` text NOT NULL,
  `totaldiscount` text NOT NULL,
  `total` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salechallan`
--

CREATE TABLE `tbl_salechallan` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `billtype` text NOT NULL,
  `refer` text NOT NULL,
  `orderdate` text NOT NULL,
  `orderduedate` text NOT NULL,
  `taxformat` text NOT NULL,
  `discountFormat` text NOT NULL,
  `notes` text NOT NULL,
  `cartarray` text NOT NULL,
  `totaltax` text NOT NULL,
  `totaldiscount` text NOT NULL,
  `total` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesinvoice`
--

CREATE TABLE `tbl_salesinvoice` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `billtype` text NOT NULL,
  `refer` text NOT NULL,
  `orderdate` text NOT NULL,
  `orderduedate` text NOT NULL,
  `taxformat` text NOT NULL,
  `discountFormat` text NOT NULL,
  `notes` text NOT NULL,
  `cartarray` text NOT NULL,
  `totaltax` text NOT NULL,
  `totaldiscount` text NOT NULL,
  `total` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_salesinvoice`
--

INSERT INTO `tbl_salesinvoice` (`id`, `orderid`, `accountid`, `billtype`, `refer`, `orderdate`, `orderduedate`, `taxformat`, `discountFormat`, `notes`, `cartarray`, `totaltax`, `totaldiscount`, `total`, `is_deleted`, `created_at`, `updated_at`, `is_user`) VALUES
(1, 1, 52, 'Sale Invoice', '', '07/05/2021', '', 'gst', 'b_p', '', 'a:1:{i:0;a:7:{s:12:\"product_name\";s:4:\"rrrr\";s:11:\"product_qty\";s:3:\"100\";s:13:\"product_price\";s:5:\" 2023\";s:11:\"product_tax\";s:2:\"10\";s:8:\"texttaxa\";s:9:\"20,230.00\";s:16:\"product_discount\";s:1:\"0\";s:7:\"ammount\";s:10:\"222,530.00\";}}', '10115', '0.00', '222530.00', 0, '2021-05-07 11:50:27', '2021-05-07 11:50:27', 1),
(2, 2, 53, 'Sale Invoice', '', '11/05/2021', '', 'igst', 'b_p', '', 'a:1:{i:0;a:7:{s:12:\"product_name\";s:4:\"rrrr\";s:11:\"product_qty\";s:2:\"10\";s:13:\"product_price\";s:5:\" 2023\";s:11:\"product_tax\";s:2:\"10\";s:8:\"texttaxa\";s:8:\"2,023.00\";s:16:\"product_discount\";s:1:\"0\";s:7:\"ammount\";s:9:\"22,253.00\";}}', '2023.00', '0.00', '22253.00', 0, '2021-05-11 09:36:34', '2021-05-11 09:36:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesstockreturn`
--

CREATE TABLE `tbl_salesstockreturn` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `billtype` text NOT NULL,
  `refer` text NOT NULL,
  `orderdate` text NOT NULL,
  `orderduedate` text NOT NULL,
  `taxformat` text NOT NULL,
  `discountFormat` text NOT NULL,
  `notes` text NOT NULL,
  `cartarray` text NOT NULL,
  `totaltax` text NOT NULL,
  `totaldiscount` text NOT NULL,
  `total` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `company` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `region` text NOT NULL,
  `country` text NOT NULL,
  `pincode` text NOT NULL,
  `taxid` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`id`, `name`, `company`, `phone`, `email`, `address`, `city`, `region`, `country`, `pincode`, `taxid`, `is_deleted`, `created_at`, `is_user`) VALUES
(1, 'raj', 'NK PVT.', '03456543212', 'thsgg@gmail.com', '4343444', 'Baroda', 'GUJARAT', 'India', '394101', '', 0, '2021-04-05 18:19:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `accountype` text NOT NULL,
  `fromaccount` int(11) NOT NULL,
  `RcptPymt` text NOT NULL,
  `toaccount` text NOT NULL,
  `ammount` text NOT NULL,
  `date` text NOT NULL,
  `income_type` text NOT NULL,
  `income_category` text NOT NULL,
  `income_method` text NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `is_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `accountype`, `fromaccount`, `RcptPymt`, `toaccount`, `ammount`, `date`, `income_type`, `income_category`, `income_method`, `note`, `created_at`, `is_deleted`, `is_user`) VALUES
(1, 'bank', 50, 'Payment', '51', '500000', '06/05/2021', 'CREDIT', 'INCOME', 'CASH', '', '2021-05-06 11:01:04', 0, 1),
(2, 'cash', 48, 'Payment', '53', '10000', '07/05/2021', 'CREDIT', 'INCOME', 'CASH', '', '2021-05-07 08:45:53', 0, 1),
(3, 'bank', 50, 'Receipt', '55', '1100', '07/05/2021', 'CREDIT', 'INCOME', 'CASH', '', '2021-05-07 10:00:20', 0, 1),
(4, 'bank', 50, 'Payment', '45', '100', '11/05/2021', 'CREDIT', 'INCOME', 'BANK', '', '2021-05-11 09:37:25', 0, 1),
(5, 'bank', 50, 'Payment', '46', '300000', '11/05/2021', 'CREDIT', 'INCOME', 'BANK', '', '2021-05-11 10:11:56', 0, 1),
(6, 'cash', 48, 'Receipt', '60', '5000', '26/05/2021', 'CREDIT', 'INCOME', 'CASH', '', '2021-05-26 12:26:39', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(11) NOT NULL,
  `gstno` text NOT NULL,
  `bamkname` text NOT NULL,
  `acno` text NOT NULL,
  `ifsc` text NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` text NOT NULL DEFAULT 'company'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `name`, `username`, `gstno`, `bamkname`, `acno`, `ifsc`, `password`, `date`, `role`) VALUES
(1, 'Khodiyar Creation', 'admin', '6775544443344565', 'THE Varachha Co.Opp Bank', '66879064534', 'VARA009876', '$2y$10$.kkHQD7avza13YLEHibUcOg2vJsfjO/ZHTiv7TIJKUOahDrqy0NCa', '2021-03-31 05:49:23', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblclient_group`
--
ALTER TABLE `tblclient_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accountsgroup`
--
ALTER TABLE `tbl_accountsgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customercredit`
--
ALTER TABLE `tbl_customercredit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_productgroup`
--
ALTER TABLE `tbl_productgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchaseorder`
--
ALTER TABLE `tbl_purchaseorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchasestockreturn`
--
ALTER TABLE `tbl_purchasestockreturn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_salechallan`
--
ALTER TABLE `tbl_salechallan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_salesinvoice`
--
ALTER TABLE `tbl_salesinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_salesstockreturn`
--
ALTER TABLE `tbl_salesstockreturn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblclient_group`
--
ALTER TABLE `tblclient_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_accountsgroup`
--
ALTER TABLE `tbl_accountsgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customercredit`
--
ALTER TABLE `tbl_customercredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_productgroup`
--
ALTER TABLE `tbl_productgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_purchaseorder`
--
ALTER TABLE `tbl_purchaseorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_purchasestockreturn`
--
ALTER TABLE `tbl_purchasestockreturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_salechallan`
--
ALTER TABLE `tbl_salechallan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_salesinvoice`
--
ALTER TABLE `tbl_salesinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_salesstockreturn`
--
ALTER TABLE `tbl_salesstockreturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
