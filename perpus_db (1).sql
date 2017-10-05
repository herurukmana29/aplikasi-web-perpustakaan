-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 09 Mei 2017 pada 06.45
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `perpus_db`
--
CREATE DATABASE IF NOT EXISTS `perpus_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `perpus_db`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `NA` int(12) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `Alamat` text NOT NULL,
  `Nohp` int(12) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`NA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`NA`, `Nama`, `jk`, `Alamat`, `Nohp`, `Email`) VALUES
(123, 'asep', 'laki laki', 'gunung waru', 897867667, 'asep@gmail.com'),
(334, 'siti azizah', 'perempuan', 'tasik', 2147483647, 'sitiaz@gmail.com'),
(456, 'heru', 'laki laki', 'kampung gunung waru', 2147483647, 'heru@gmail.com'),
(678, 'gita', 'perempuan', 'cigalontang', 978686786, 'gita@gmail.com'),
(1234, 'heru rukmana', 'laki laki', 'gunung waru', 2147483647, 'herurukmana294@gmail.com'),
(54647, 'ari', 'laki laki', 'cigalontang', 2147483647, 'ari@gmail.com'),
(997878, 'muhamad fauzi', 'laki laki', 'warung cikopi', 2147483647, 'mfauzi@gmail.com'),
(4653563, 'ucup', 'laki laki', 'warung legok', 2147483647, 'ucup@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `Kdbuku` int(5) NOT NULL,
  `Jdlbuku` varchar(20) NOT NULL,
  `Jmlbuku` int(6) NOT NULL,
  `Kdpenerbit` int(10) NOT NULL,
  `stokbuku` int(6) NOT NULL,
  PRIMARY KEY (`Kdbuku`,`Kdpenerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`Kdbuku`, `Jdlbuku`, `Jmlbuku`, `Kdpenerbit`, `stokbuku`) VALUES
(75857, 'kisah menarik', 89, 767676, 67),
(78978, 'lutung kasarung', 5, 6788678, 78),
(567889, 'kabayan', 3, 987878, 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
--

CREATE TABLE IF NOT EXISTS `denda` (
  `Kddenda` int(6) NOT NULL,
  `Jns_denda` varchar(20) NOT NULL,
  `Denda` varchar(20) NOT NULL,
  PRIMARY KEY (`Kddenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `denda`
--

INSERT INTO `denda` (`Kddenda`, `Jns_denda`, `Denda`) VALUES
(768768, 'bulanan', '12000'),
(786786, 'harian', '12000'),
(786876, 'harian', '14000'),
(4845657, 'bulanan', '1000'),
(6575466, 'bulanan', '10000'),
(67756767, 'harian', '2000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE IF NOT EXISTS `detail_pinjam` (
  `Id` int(6) NOT NULL,
  `Kdbuku` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`Id`, `Kdbuku`) VALUES
(786786, 7575656),
(76576745, 5676);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembalian`
--

CREATE TABLE IF NOT EXISTS `kembalian` (
  `Kdkembali` int(6) NOT NULL,
  `Kdpinjam` int(6) NOT NULL,
  `Denda` varchar(10) NOT NULL,
  PRIMARY KEY (`Kdkembali`,`Kdpinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kembalian`
--

INSERT INTO `kembalian` (`Kdkembali`, `Kdpinjam`, `Denda`) VALUES
(6767, 5756, '14000'),
(786786, 7575656, '12000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Id` int(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Level` varchar(5) NOT NULL,
  PRIMARY KEY (`Password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`Id`, `Username`, `Nama`, `Password`, `Level`) VALUES
(0, '', '', '', ''),
(123456, 'jajang', 'jajang', '123', '2'),
(123456677, 'asep', 'asep', '1234', '3'),
(12, 'alip', 'alif', '123456789', '2'),
(6436, 'gfhgf', 'yeueu', '2367', '2'),
(654656, 'heru234', 'heru', '2904', '2'),
(657467467, 'agung', 'agung', '321', '1'),
(2147483647, 'gan', 'agan', '432', '2'),
(756765, 'usap', 'usap', '478', '7'),
(6767567, 'zizah', 'zizah', '567', '2'),
(786786, 'heru rukmana', 'heru rukmana', 'heru123', '2'),
(657567, 'heru', 'heru rukmana', 'heru1234', '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `Kdpenerbit` int(5) NOT NULL,
  `Nmpenerbit` varchar(20) NOT NULL,
  `Alamat` text NOT NULL,
  `nohp` int(12) NOT NULL,
  PRIMARY KEY (`Kdpenerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`Kdpenerbit`, `Nmpenerbit`, `Alamat`, `nohp`) VALUES
(686867, 'ujang', 'jakarta', 2147483647),
(674576576, 'ferdi', 'bogor', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `Kdpinjam` int(6) NOT NULL,
  `Tglpinjam` date NOT NULL,
  `Tglkembali` date NOT NULL,
  `Nmpinjam` varchar(20) NOT NULL,
  PRIMARY KEY (`Kdpinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`Kdpinjam`, `Tglpinjam`, `Tglkembali`, `Nmpinjam`) VALUES
(786786, '2017-08-12', '2017-08-14', 'heru rukmana'),
(8887878, '2017-08-14', '2017-08-20', 'asep'),
(56747657, '2017-08-12', '2017-08-20', 'ari'),
(65767676, '2017-08-18', '2017-08-20', 'muhammad alif'),
(2147483647, '2017-08-06', '2017-08-21', 'angga');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
