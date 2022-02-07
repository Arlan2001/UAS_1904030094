-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2022 at 06:06 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` int(10) NOT NULL,
  `Nama_Mhs` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(50) NOT NULL,
  `Program_Studi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `Nama_Mhs`, `Jenis_Kelamin`, `Program_Studi`) VALUES
(1803040004, 'Genjeih', 'Perempuan', 'Manajemen'),
(1803040006, 'Mega', 'Perempuan', 'Manajemen'),
(1803040080, 'Pandu Maulana', 'Laki-Laki', 'Teknik Informatika'),
(1904030031, 'Agung Maulana', 'Laki-Laki', 'Farmasi'),
(1904030041, 'Ahmad Sodul', 'Laki-Laki', 'Kedokteran'),
(1904030051, 'Maulia', 'Perempuan', 'Farmasi'),
(1904030061, 'Herni Irma Wati', 'Perempuan', 'Teknik Sipil'),
(1904030071, 'Romadoni', 'Laki-Laki', 'Teknik Kimia'),
(1904030094, 'Refnandida Arlan F', 'Laki-Laki', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `Kode` int(10) NOT NULL,
  `Mata_kuliah` varchar(50) NOT NULL,
  `SKS` int(10) NOT NULL,
  `Dosen_Pengajar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`Kode`);