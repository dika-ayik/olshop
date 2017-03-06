-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2017 at 06:34 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `cover`, `alamat`) VALUES
(1, 'Bella', 'bellamaradewi@gmail.com', '12345', '', 'Lumajang');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `deskripsi`, `cover`, `genre`) VALUES
(1, 'Photoshop Tutorial Handbook''s', '150000', 'Dengan Buku Ini , pembaca dapat mengasah kemampuannya dalam hal mengedit foto', 'img/cover.jpg', 'Multimedia'),
(2, 'RPG Maker VX ACE Guide Book', '200000', 'Dengan Menggunakan panduan ini , pembaca dapat membuat game rpg dengan mudah', 'img/80656_f.jpg', 'Programming'),
(3, 'Resep Masakan Dari Sabang sampai Merauke', '50000', 'Dengan Menggunakan ini , Pembaca bisa memasak dengan mudah dan cepat', 'img/ID_MP2012MTH09KRMTSM_B.jpg', 'Cooking'),
(4, 'The Shadows', '400000', 'dengan menggunakan ini , pembaca dapat berpikir kreatif untuk menciptakan suatu usaha', 'img/4abb4cd46bdda76af852d8a1494ef83a.jpg', 'Biography'),
(5, 'Tiny House Floor Plans', '240000', 'Dengan Menggunakan ini , pengguna dapat membuat berbagai desain rumah yang minimalis dan bergaya', 'img/tiny-house-floor-plans-front-cover.png', 'House Design'),
(6, 'Shingeki No Kyojin Vol 3', '100000', 'Komik Ini menceritakan perjuangan seorang pemuda bernama Eren yang ingin menghabisi semua raksasa - raksasa yang sudah menghancurkan desa tempat tinggalnya', 'admin_lte/img/attack-on-titan-3-hajime-isayama-paperback-cover-art.jpg', 'Komik'),
(7, 'Harry Potter and The Order of The Phoenix', '400000', 'Creator : J.K Rowling', 'img/4e2a019f6266f99ec6a1b0be961212c7.jpg', 'Novel'),
(8, 'Love Me If You Dare', '200000', 'Written By : Toni Blake', 'img/LoveMeIfYouDareCHANGE.jpg', 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `hrg_total` varchar(255) NOT NULL,
  `nama_pembeli` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `nama_rek` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `id_pay` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `tgl`, `nama_barang`, `hrg_total`, `nama_pembeli`, `email`, `kode_pos`, `kota`, `no_telp`, `no_rek`, `nama_rek`, `bank`, `alamat`, `id_pay`) VALUES
(1, '2017-02-18', 'The Shadows', '400000', 'dika', 'dika_ayik@gmail.com', '12121', 'Jember', '121124134', '1123123123123123', 'dika', 'Danamon', 'dika', ''),
(2, '2017-02-20', 'RPG Maker VX ACE Guide Book', '200000', 'yofandi', 'yofandi@gamil.ocm', '13245', 'Lumajang', '08123456', '01972612', 'Yofandi', 'Bank Jabar', 'Yosowilangun', ''),
(3, '0000-00-00', 'The Shadows', '400000', '9090', 'klkjhjh@nbnbhbh.com', '32415', 'nigbhghf', '0797865645', '0966-0564323-8686', 'uyihj', 'Mandiri', 'kl.lkjgjtguigkj bhghjfgvgh', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
