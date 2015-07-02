-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 09:37 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rental`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `denda`(no_trans int)
begin
declare dnd int;
select datediff(kembali_pd, tgl_keluar) into dnd;
update detail_sewa set denda = dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_denda`(no_trans int)
begin
declare dnd int;
select datediff(kembali_pada, tgl_kembali) into dnd from detail_sewa;
update detail_sewa set denda = dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_denda1`(no_trans int)
begin
declare dnd int;
select datediff(kembali_pada, tgl_keluar) into dnd;
update detail_sewa set denda = dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_denda2`(no_trans int)
begin
declare dnd int;
select datediff(kembali_pada, tgl_keluar) into dnd from detail_sewa;
update detail_sewa set denda = dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_denda3`(no_trans int)
begin
declare dnd int;
select datediff(kembali_pada, tgl_kembali) into dnd from detail_sewa;
update detail_sewa set denda = dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_dnd`(no_trans int)
begin
declare kembali char;
declare kembalipd char;

select tgl_kembali into kembali from detail_sewa where kode_sewa = no_trans;
select kembali_pada into kembalipd from detail_sewa where kode_sewa = no_trans;


update detail_sewa set denda=dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_dnd1`(no_trans int)
begin
declare kembali char;
declare kembalipd char;
declare denda int;

select tgl_kembali into kembali from detail_sewa where kode_sewa = no_trans;
select kembali_pada into kembalipd from detail_sewa where kode_sewa = no_trans;

select datediff(kembalipd, kembali) into denda;

update detail_sewa set denda=dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_dnd2`(no_trans int)
begin
declare kembali char;
declare kembalipd char;
declare dnd int;

select tgl_kembali into kembali from detail_sewa where kode_sewa = no_trans;
select kembali_pada into kembalipd from detail_sewa where kode_sewa = no_trans;

select datediff(kembalipd, kembali) into dnd;

update detail_sewa set denda=dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_dnd3`(no_trans int)
begin
declare kembali char;
declare kembalipd char;
declare dnd int;

select tgl_kembali into kembali from detail_sewa where kode_sewa = no_trans;
select kembali_pada into kembalipd from detail_sewa where kode_sewa = no_trans;

select datediff(kembalipd, kembali) into dnd;

update detail_sewa set denda=denda where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_dnd4`(no_trans int)
begin
declare kembali char;
declare kembalipd char;
declare dnd int;

select tgl_kembali into kembali from detail_sewa where kode_sewa = no_trans;
select kembali_pada into kembalipd from detail_sewa where kode_sewa = no_trans;

select datediff(kembalipd, kembali) into dnd;

update detail_sewa set denda=dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitung_dnd5`(no_trans int)
begin
declare dnd int;

select datediff(
(select kembali_pada from detail_sewa where kode_sewa = no_trans),
(select tgl_kembali from detail_sewa where kode_sewa = no_trans))
into dnd;

update detail_sewa set denda=dnd where kode_sewa = no_trans;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), alamat varchar(30), tlp varchar(15),
hrg int, tp varchar(20))
begin
  declare hitung1 int; declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  select kode_penyetor into kp from penyetor where nama=pnytr;
  select count(nama) into hitung1 from penyetor;
  select count(kode_mobil) into hitung2 from mobil;
  select kode_merk into merek from merk where nama=mrk;
  select count(nama) into hitung3 from merk;
  set hitung1 = hitung1+1;
  set hitung2 = hitung2+1;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah1`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), alamat varchar(30), tlp varchar(15),
hrg int, tp varchar(20))
begin
  declare hitung1 int; declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  select kode_penyetor into kp from penyetor where nama=pnytr;
  select count(nama) into hitung1 from penyetor;
  select count(kode_mobil) into hitung2 from mobil;
  select kode_merk into merek from merk where nama=mrk;
  select count(nama) into hitung3 from merk;
  set hitung1 = hitung1+1;
  set hitung2 = hitung2+1;
  if hitung1<10 then
    set kdPen=concat("P0",hitung1);
  elseif hitung1<100 then
    set kdPen = concat("P", hitung1);
  end if;
  if hitung2<10 then
    set kdMobil=concat("M0", hitung2);
  elseif hitung2<100 then
    set kdMobil = concat("M",hitung2);
  end if;

  if merek="" then
  case hitung3
    when hitung3 < 10 then set merek=concat("r0", hitung3);
    when hitung3<100 then set merek=concat("r",hitung3);
  end case;
  insert into merk set kode_merk = merek, nama=mrk;
  end if;

  if kp="" then
  case hitung1
  when hitung1<10 then set merek=concat("r0", hitung1);
  when hitung1<100 then set merek=concat("r",hitung1);
  end case;
  insert into penyetor set kode_penyetor = kp, nama=pnytr;
  end if;


  CASE tp
    when 'City Car' then set tp='CCR';
  end CASE;
  insert into mobil set kode_mobil=kdMobil, kode_jenis=tp,
  kode_merk=merek, kode_penyetor=kp, nama=nm, harga=hrg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah2`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), alamat varchar(30), tlp varchar(15),
hrg int, tp varchar(20))
begin
  declare hitung1 int; declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  select kode_penyetor into kp from penyetor where nama=pnytr;
  select count(nama) into hitung1 from penyetor;
  select count(kode_mobil) into hitung2 from mobil;
  select kode_merk into merek from merk where nama=mrk;
  select count(nama) into hitung3 from merk;
  set hitung1 = hitung1+1;
  set hitung2 = hitung2+1;
  if hitung1<10 then
    set kdPen=concat("S0",hitung1);
  elseif hitung1<100 then
    set kdPen = concat("S", hitung1);
  end if;
  if hitung2<10 then
    set kdMobil=concat("M0", hitung2);
  elseif hitung2<100 then
    set kdMobil = concat("M",hitung2);
  end if;

  if merek="" then
  case hitung3
    when hitung3 < 10 then set merek=concat("r0", hitung3);
    when hitung3<100 then set merek=concat("r",hitung3);
  end case;
  insert into merk set kode_merk = merek, nama=mrk;
  end if;

  if kp="" then
  case hitung1
  when hitung1<10 then set merek=concat("r0", hitung1);
  when hitung1<100 then set merek=concat("r",hitung1);
  end case;
  insert into penyetor set kode_penyetor = kp, nama=pnytr;
  end if;


  CASE tp
    when 'City Car' then set tp='CCR';
  end CASE;
  insert into mobil set kode_mobil=kdMobil, kode_jenis=tp,
  kode_merk=merek, kode_penyetor=kp, nama=nm, harga=hrg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_mbl2`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), hrg int, tp varchar(20))
begin
  declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  select kode_penyetor into kp from penyetor where nama=pnytr;
  select count(kode_mobil) into hitung2 from mobil;
  select kode_merk into merek from merk where nama=mrk;
  select count(nama) into hitung3 from merk;

  set hitung2 = hitung2+1;
  set hitung3 = hitung3+1;

  if hitung2<10 then
    set kdMobil=concat("M0", hitung2);
  elseif hitung2<100 then
    set kdMobil = concat("M",hitung2);
  end if;

  if merek="" then
  case hitung3
    when hitung3<10 then set merek=concat("r0", hitung3);
    when hitung3<100 then set merek=concat("r",hitung3);
  end case;
  insert into merk set kode_merk = merek, nama=mrk;
  end if;

  CASE tp
    when 'City Car' then set tp='CCR';
  end CASE;
  insert into mobil set kode_mobil=kdMobil, kode_jns=tp,
  kode_merk=merek, kode_penyetor=kp, nama=nm, harga=hrg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_mbl3`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), hrg int, tp varchar(20))
begin
  declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  select kode_penyetor into kp from penyetor where nama=pnytr;
  select count(kode_mobil) into hitung2 from mobil;
  select kode_merk into merek from merk where nama=mrk;
  select count(nama) into hitung3 from merk;

  set hitung2 = hitung2+1;
  set hitung3 = hitung3+1;

  if hitung2<10 then
    set kdMobil=concat("M0", hitung2);
  elseif hitung2<100 then
    set kdMobil = concat("M",hitung2);
  end if;

  if merek="" then
  case hitung3
    when hitung3<10 then set merek=concat("r0", hitung3);
    when hitung3<100 then set merek=concat("r",hitung3);
  end case;
  insert into merk set kode_merk = merek, nama=mrk;
  end if;

  CASE tp
    when 'City Car' then set tp='CCR';
  end CASE;
  insert into mobil set kode_mobil=kdMobil, kode_jenis=tp,
  kode_merk=merek, kode_penyetor=kp, nama=nm, harga=hrg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_mbl4`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), hrg int, tp varchar(20))
begin
  declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  select kode_penyetor into kp from penyetor where nama=pnytr;
  select count(kode_mobil) into hitung2 from mobil;
  select kode_merk into merek from merk where nama=mrk;
  select count(nama) into hitung3 from merk;

  set hitung2 = hitung2+1;
  set hitung3 = hitung3+1;

  if hitung2<10 then
    set kdMobil=concat("M0", hitung2);
  elseif hitung2<100 then
    set kdMobil = concat("M",hitung2);
  end if;

  if merek="" then
  case hitung3
    when hitung3<10 then set merek=concat("r0", hitung3);
    when hitung3<100 then set merek=concat("r",hitung3);
  end case;
  insert into merk set kode_merk = merek, nama=mrk;
  select kode_merk into merek from merk where nama=mrk;
  end if;

  CASE tp
    when 'City Car' then set tp='CCR';
  end CASE;
  insert into mobil set kode_mobil=kdMobil, kode_jenis=tp,
  kode_merk=merek, kode_penyetor=kp, nama=nm, harga=hrg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_mbl5`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), hrg int, tp varchar(20))
begin
  declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  select kode_penyetor into kp from penyetor where nama=pnytr;
  select count(kode_mobil) into hitung2 from mobil;
  select kode_merk into merek from merk where nama=mrk;
  select count(nama) into hitung3 from merk;

  set hitung2 = hitung2+1;
  set hitung3 = hitung3+1;

  if hitung2<10 then
    set kdMobil=concat("M0", hitung2);
  elseif hitung2<100 then
    set kdMobil = concat("M",hitung2);
  end if;

  if merek=null then
  case hitung3
    when hitung3<10 then set merek=concat("r0", hitung3);
    when hitung3<100 then set merek=concat("r",hitung3);
  end case;
  insert into merk set kode_merk = merek, nama=mrk;
  select kode_merk into merek from merk where nama=mrk;
  end if;

  CASE tp
    when 'City Car' then set tp='CCR';
  end CASE;
  insert into mobil set kode_mobil=kdMobil, kode_jenis=tp,
  kode_merk=merek, kode_penyetor=kp, nama=nm, harga=hrg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_mbl6`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), hrg int, tp varchar(20))
begin
  declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  select kode_penyetor into kp from penyetor where nama=pnytr;
  select count(kode_mobil) into hitung2 from mobil;
  select kode_merk into merek from merk where nama=mrk;
  select count(nama) into hitung3 from merk;

  set hitung2 = hitung2+1;
  set hitung3 = hitung3+1;

  if hitung2<10 then
    set kdMobil=concat("M0", hitung2);
  elseif hitung2<100 then
    set kdMobil = concat("M",hitung2);
  end if;

  if merek=null then
  case hitung3
    when hitung3<10 then set merek=concat("r0", hitung3);
    when hitung3<100 then set merek=concat("r",hitung3);
  end case;


  end if;
  insert into merk set kode_merk = merek, nama=mrk;
  select kode_merk into merek from merk where nama=mrk;

  CASE tp
    when 'City Car' then set tp='CCR';
  end CASE;
  insert into mobil set kode_mobil=kdMobil, kode_jenis=tp,
  kode_merk=merek, kode_penyetor=kp, nama=nm, harga=hrg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_mbl7`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), hrg int, tp varchar(20))
begin
  declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  Set kp = (select kode_penyetor from penyetor where nama = pnytr);
  select count(kode_mobil) into hitung2 from mobil;
  set merek = (select kode_merk from merk where nama=mrk);
  select count(nama) into hitung3 from merk;

  set hitung2 = hitung2+1;
  set hitung3 = hitung3+1;

  if hitung2<10 then
    set kdMobil=concat("M0", hitung2);
  elseif hitung2<100 then
    set kdMobil = concat("M",hitung2);
  end if;

  if merek="" then
  case hitung3
    when hitung3<10 then set merek=concat("r0", hitung3);
    when hitung3<100 then set merek=concat("r",hitung3);
  end case;
  insert into merk set kode_merk = merek, nama=mrk;
  end if;

  CASE tp
    when 'City Car' then set tp='CCR';
  end CASE;
  insert into mobil set kode_mobil=kdMobil, kode_jenis=tp,
  kode_merk=merek, kode_penyetor=kp, nama=nm, harga=hrg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_mbl8`(mrk varchar(20), nm varchar(20),
pnytr varchar(20), hrg int, tp varchar(20))
begin
  declare hitung2 int;declare hitung3 int;
  declare kdMobil char(3);declare kdPen char(3);
  declare merek char(3);declare kp char(3);

  Set kp = (select kode_penyetor from penyetor where nama = pnytr);
  select count(kode_mobil) into hitung2 from mobil;
  set merek = (select kode_merk from merk where nama=mrk);
  select count(nama) into hitung3 from merk;

  set hitung2 = hitung2+1;
  set hitung3 = hitung3+1;

  if hitung2<10 then
    set kdMobil=concat("M0", hitung2);
  elseif hitung2<100 then
    set kdMobil = concat("M",hitung2);
  end if;

  if merek=null then
  case hitung3
    when hitung3<10 then set merek=concat("r0", hitung3);
    when hitung3<100 then set merek=concat("r",hitung3);
  end case;
  insert into merk set kode_merk = merek, nama=mrk;
  end if;

  CASE tp
    when 'City Car' then set tp='CCR';
  end CASE;
  insert into mobil set kode_mobil=kdMobil, kode_jenis=tp,
  kode_merk=merek, kode_penyetor=kp, nama=nm, harga=hrg;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `daftar_mobil`
--
CREATE TABLE IF NOT EXISTS `daftar_mobil` (
`kode mobil` int(11)
,`nama mobil` varchar(15)
,`merk` varchar(13)
,`tipe` varchar(10)
,`harga` int(11)
,`status` varchar(6)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `data_mobil`
--
CREATE TABLE IF NOT EXISTS `data_mobil` (
`kode mobil` int(11)
,`nama mobil` varchar(15)
,`merk` varchar(13)
,`tipe` varchar(10)
,`harga` int(11)
,`tgl_kembali` date
,`status` varchar(6)
);
-- --------------------------------------------------------

--
-- Table structure for table `detail_sewa`
--

CREATE TABLE IF NOT EXISTS `detail_sewa` (
  `kode_karyawan` int(11) DEFAULT NULL,
  `kode_sewa` int(11) NOT NULL,
  `kode_mobil` int(11) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `kembali_pada` date DEFAULT NULL,
  `denda` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  PRIMARY KEY (`kode_sewa`),
  KEY `kode_mobil` (`kode_mobil`),
  KEY `kode_karyawan` (`kode_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_sewa`
--

INSERT INTO `detail_sewa` (`kode_karyawan`, `kode_sewa`, `kode_mobil`, `tgl_keluar`, `tgl_kembali`, `kembali_pada`, `denda`, `Harga`) VALUES
(1, 113, 8, '2015-05-27', '2015-05-29', NULL, 0, 1000000),
(1, 114, 9, '2015-05-28', '2015-05-30', NULL, 0, 1300000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_penyetor`
--
CREATE TABLE IF NOT EXISTS `info_penyetor` (
`kode mobil` int(11)
,`kode penyetor` int(11)
,`nama mobil` varchar(15)
,`merk` varchar(13)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_pnytr`
--
CREATE TABLE IF NOT EXISTS `info_pnytr` (
`kode mobil` int(11)
,`kode_penyetor` int(11)
,`nama mobil` varchar(15)
,`merk` varchar(13)
);
-- --------------------------------------------------------

--
-- Table structure for table `jenis_mobil`
--

CREATE TABLE IF NOT EXISTS `jenis_mobil` (
  `kode_jenis` char(3) NOT NULL DEFAULT '',
  `jenis` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kode_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_mobil`
--

INSERT INTO `jenis_mobil` (`kode_jenis`, `jenis`) VALUES
('CCR', 'City Car'),
('CGR', 'City Gerob');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `kode_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(40) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `Telepon` varchar(15) NOT NULL,
  `Jabatan` varchar(10) NOT NULL DEFAULT 'operator',
  PRIMARY KEY (`kode_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kode_karyawan`, `nama`, `alamat`, `password`, `Telepon`, `Jabatan`) VALUES
(1, 'Paijo', 'asdjskladj', '1234', '0000000', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
  `kode_merk` char(3) NOT NULL DEFAULT '',
  `nama` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`kode_merk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`kode_merk`, `nama`) VALUES
('r01', 'Suzuki'),
('r02', 'Daihatsu'),
('r03', 'Toyota'),
('r04', 'Honda'),
('r05', 'KIA');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `kode_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jenis` char(3) DEFAULT NULL,
  `kode_merk` char(3) DEFAULT NULL,
  `kode_penyetor` int(3) DEFAULT NULL,
  `nama` varchar(15) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT '1',
  PRIMARY KEY (`kode_mobil`),
  KEY `kode_jenis` (`kode_jenis`),
  KEY `kode_merk` (`kode_merk`),
  KEY `kode_penyetor` (`kode_penyetor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`kode_mobil`, `kode_jenis`, `kode_merk`, `kode_penyetor`, `nama`, `harga`, `stok`) VALUES
(8, 'CCR', 'r01', 4, 'Ertiga', 500000, 0),
(9, 'CCR', 'r03', 4, 'Avansa', 650000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penyetor`
--

CREATE TABLE IF NOT EXISTS `penyetor` (
  `kode_penyetor` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `No_telp` char(15) DEFAULT NULL,
  PRIMARY KEY (`kode_penyetor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `penyetor`
--

INSERT INTO `penyetor` (`kode_penyetor`, `nama`, `alamat`, `No_telp`) VALUES
(4, 'Rahardyam', 'asd', '3');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE IF NOT EXISTS `penyewa` (
  `Kode_sewa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `telepon` char(15) DEFAULT NULL,
  `SIM` enum('Y','T') DEFAULT 'T',
  `STNK` enum('Y','T') NOT NULL DEFAULT 'T',
  `tgl_transaksi` date NOT NULL,
  PRIMARY KEY (`Kode_sewa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`Kode_sewa`, `nama`, `alamat`, `telepon`, `SIM`, `STNK`, `tgl_transaksi`) VALUES
(113, 'as', 'asd', '2', 'Y', 'Y', '2015-05-28'),
(114, 'asd', 'sad', 'asd', 'Y', 'Y', '2015-05-28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `preview`
--
CREATE TABLE IF NOT EXISTS `preview` (
`kode_sewa` int(11)
,`nama` varchar(20)
,`pinjam` varchar(10)
,`kembali` varchar(10)
,`nama_mobil` varchar(15)
,`harga` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `table_mobil`
--
CREATE TABLE IF NOT EXISTS `table_mobil` (
`kode mobil` int(11)
,`nama mobil` varchar(15)
,`merk` varchar(13)
,`tipe` varchar(10)
,`harga` int(11)
,`tgl_kembali` date
,`status` varchar(6)
);
-- --------------------------------------------------------

--
-- Structure for view `daftar_mobil`
--
DROP TABLE IF EXISTS `daftar_mobil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftar_mobil` AS select `m`.`kode_mobil` AS `kode mobil`,`m`.`nama` AS `nama mobil`,`m2`.`nama` AS `merk`,`t`.`jenis` AS `tipe`,`m`.`harga` AS `harga`,if((`m`.`stok` = 1),'Ready','Kosong') AS `status` from ((`mobil` `m` join `jenis_mobil` `t`) join `merk` `m2`) where ((`m`.`kode_merk` = `m2`.`kode_merk`) and (`m`.`kode_jenis` = `t`.`kode_jenis`)) group by `m`.`kode_mobil`;

-- --------------------------------------------------------

--
-- Structure for view `data_mobil`
--
DROP TABLE IF EXISTS `data_mobil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_mobil` AS select `m`.`kode_mobil` AS `kode mobil`,`m`.`nama` AS `nama mobil`,`r`.`nama` AS `merk`,`j`.`jenis` AS `tipe`,`m`.`harga` AS `harga`,`d`.`tgl_kembali` AS `tgl_kembali`,if((`m`.`stok` = 1),'Ready','kosong') AS `status` from (((`mobil` `m` join `merk` `r`) join `jenis_mobil` `j`) join `detail_sewa` `d`) where ((`m`.`kode_merk` = `r`.`kode_merk`) and (`m`.`kode_mobil` = `d`.`kode_mobil`) and (`m`.`kode_jenis` = `j`.`kode_jenis`)) group by `m`.`kode_mobil`;

-- --------------------------------------------------------

--
-- Structure for view `info_penyetor`
--
DROP TABLE IF EXISTS `info_penyetor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_penyetor` AS select `m`.`kode_mobil` AS `kode mobil`,`p`.`kode_penyetor` AS `kode penyetor`,`m`.`nama` AS `nama mobil`,`r`.`nama` AS `merk` from ((`mobil` `m` join `penyetor` `p`) join `merk` `r`) where ((`m`.`kode_penyetor` = `p`.`kode_penyetor`) and (`m`.`kode_merk` = `r`.`kode_merk`));

-- --------------------------------------------------------

--
-- Structure for view `info_pnytr`
--
DROP TABLE IF EXISTS `info_pnytr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_pnytr` AS select `m`.`kode_mobil` AS `kode mobil`,`p`.`kode_penyetor` AS `kode_penyetor`,`m`.`nama` AS `nama mobil`,`r`.`nama` AS `merk` from ((`mobil` `m` join `penyetor` `p`) join `merk` `r`) where ((`m`.`kode_penyetor` = `p`.`kode_penyetor`) and (`m`.`kode_merk` = `r`.`kode_merk`));

-- --------------------------------------------------------

--
-- Structure for view `preview`
--
DROP TABLE IF EXISTS `preview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `preview` AS select `p`.`Kode_sewa` AS `kode_sewa`,`p`.`nama` AS `nama`,date_format(`d`.`tgl_keluar`,'%d-%m-%Y') AS `pinjam`,date_format(`d`.`tgl_kembali`,'%d-%m-%Y') AS `kembali`,`m`.`nama` AS `nama_mobil`,`d`.`Harga` AS `harga` from ((`penyewa` `p` join `detail_sewa` `d`) join `mobil` `m`) where ((`p`.`Kode_sewa` = `d`.`kode_sewa`) and (`d`.`kode_mobil` = `m`.`kode_mobil`));

-- --------------------------------------------------------

--
-- Structure for view `table_mobil`
--
DROP TABLE IF EXISTS `table_mobil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `table_mobil` AS select `m`.`kode_mobil` AS `kode mobil`,`m`.`nama` AS `nama mobil`,`r`.`nama` AS `merk`,`j`.`jenis` AS `tipe`,`m`.`harga` AS `harga`,`d`.`tgl_kembali` AS `tgl_kembali`,if((`m`.`stok` = 1),'Ready','kosong') AS `status` from (((`mobil` `m` join `merk` `r`) join `jenis_mobil` `j`) join `detail_sewa` `d`) where ((`m`.`kode_merk` = `r`.`kode_merk`) and (`m`.`kode_mobil` = `d`.`kode_mobil`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD CONSTRAINT `detail_sewa_ibfk_2` FOREIGN KEY (`kode_sewa`) REFERENCES `penyewa` (`Kode_sewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_sewa_ibfk_3` FOREIGN KEY (`kode_mobil`) REFERENCES `mobil` (`kode_mobil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_sewa_ibfk_4` FOREIGN KEY (`kode_karyawan`) REFERENCES `karyawan` (`kode_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_mobil` (`kode_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mobil_ibfk_2` FOREIGN KEY (`kode_merk`) REFERENCES `merk` (`kode_merk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mobil_ibfk_3` FOREIGN KEY (`kode_penyetor`) REFERENCES `penyetor` (`kode_penyetor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
