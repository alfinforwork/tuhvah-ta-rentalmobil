-- MySQL dump 10.13  Distrib 5.7.33, for Win64 (x86_64)
--
-- Host: localhost    Database: rizqimulticreative
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `status_rental`
--

DROP TABLE IF EXISTS `status_rental`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_rental` (
  `id_status_rental` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status_rental` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status_rental`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_rental`
--

LOCK TABLES `status_rental` WRITE;
/*!40000 ALTER TABLE `status_rental` DISABLE KEYS */;
INSERT INTO `status_rental` VALUES (1,'Menunggu pembayaran'),(2,'Menunggu konfirmasi dari admin'),(3,'Menunggu pengembalian mobil'),(4,'Mobil dikembalikan');
/*!40000 ALTER TABLE `status_rental` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,'jono','admin','25d55ad283aa400af464c76d713c07ad');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_customer`
--

DROP TABLE IF EXISTS `tb_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `j_kelamin` varchar(20) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_customer`
--

LOCK TABLES `tb_customer` WRITE;
/*!40000 ALTER TABLE `tb_customer` DISABLE KEYS */;
INSERT INTO `tb_customer` VALUES (5,'M Jono Supeno','jono123','jogjakarta','l','0888888888','1234123409870987','25d55ad283aa400af464c76d713c07ad'),(6,'Bambang Pamungkas','bambang21','Sleman','l','082112345678','1234213213213','25d55ad283aa400af464c76d713c07ad'),(7,'Kevin Kuncoro','kevin123','Yogjakarta','l','089089765567','1234567812345678','25d55ad283aa400af464c76d713c07ad'),(8,'David Michael','david123','Sleman, Yogyakarta','l','087654321156','12345678909876545','25d55ad283aa400af464c76d713c07ad'),(9,'Supriadi','massupri','','l','085789987789','','25d55ad283aa400af464c76d713c07ad'),(10,'Supandi','supandi123','','l','088098765567','','25d55ad283aa400af464c76d713c07ad'),(11,'David Fernando','david21','Ngaglik, Sleman','l','088123456789','1234123409870123','25d55ad283aa400af464c76d713c07ad'),(12,'Mr Jono','jono213','Sleman, Yogyakarta','l','087654321156','1234123409870123','25d55ad283aa400af464c76d713c07ad'),(13,'Setiawan Gunadi','setiawan123','Baciro,kota yogyakarta, DIY','l','08232123123','1234123409871234','25d55ad283aa400af464c76d713c07ad'),(14,'doni setyawan','doni21','yogyakarta','l','087654321123','1234123409870987','25d55ad283aa400af464c76d713c07ad'),(15,'dono setiabudi','dono123','yogyakarta','l','087654321123','1234123409871234','25d55ad283aa400af464c76d713c07ad'),(16,'alfin nahrowi','alfin123','sleman','l','08562829','123412341234','25d55ad283aa400af464c76d713c07ad');
/*!40000 ALTER TABLE `tb_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_mitra`
--

DROP TABLE IF EXISTS `tb_mitra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_mitra` (
  `id_mitra` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mitra` varchar(100) NOT NULL,
  `jenis_kelamin` enum('l','p') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_mitra`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_mitra`
--

LOCK TABLES `tb_mitra` WRITE;
/*!40000 ALTER TABLE `tb_mitra` DISABLE KEYS */;
INSERT INTO `tb_mitra` VALUES (1,'Tuhfah Areta Gumilar','l','Kota Yogyakarta','087651123456'),(4,'M Alfin Nahrowi','l','Kota Yogyakarta','082321450987'),(5,'Hernanda Linggar Praditya','l','Kota Yogyakarta','088221879864'),(6,'M Andri Fathurohman','l','Kota Yogyakrta','089765123098'),(7,'Kevin Setyawan','l','Kota Yogyakarta','087123908765');
/*!40000 ALTER TABLE `tb_mitra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_mobil`
--

DROP TABLE IF EXISTS `tb_mobil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_mobil` (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `id_mitra` int(11) DEFAULT NULL,
  `kode_tipe` varchar(120) DEFAULT NULL,
  `merk` varchar(120) DEFAULT NULL,
  `no_plat` varchar(20) DEFAULT NULL,
  `warna` varchar(30) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `status_kepemilikan` char(1) DEFAULT NULL,
  `biaya` float DEFAULT '0',
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mobil`),
  KEY `id_mitra` (`id_mitra`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `tb_mobil_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_mobil_ibfk_2` FOREIGN KEY (`id_mitra`) REFERENCES `tb_mitra` (`id_mitra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_mobil`
--

LOCK TABLES `tb_mobil` WRITE;
/*!40000 ALTER TABLE `tb_mobil` DISABLE KEYS */;
INSERT INTO `tb_mobil` VALUES (10,1,NULL,'MNB','Isuzu Elf','AB 2221 LA','Silver','2015','1','0',1000000,'assets/upload/foto/mobil/downlo1ad.jpg'),(11,1,NULL,'MNB','Isuzu Elf','AB 2220 LA','Silver','2015','1','0',1000000,'assets/upload/foto/mobil/downlo1ad1.jpg'),(12,1,NULL,'MNB','Isuzu Elf','AB 2222 LA','Silver','2015','1','0',1000000,'assets/upload/foto/mobil/downlo1ad2.jpg'),(13,1,NULL,'MNB','Toyota Hiace','AB 1209 AA','Silver','2014','1','0',1100000,'assets/upload/foto/mobil/download_(5).jpg'),(14,1,NULL,'MNB','Toyota Hiace','AB 2190 AA','Silver','2014','1','0',1100000,'assets/upload/foto/mobil/download_(5)1.jpg'),(15,1,NULL,'MPV','Toyota Avanza','AB 3487 KA','Hitam','2011','1','0',450000,'assets/upload/foto/mobil/download_(3).jpg'),(16,1,NULL,'MPV','Toyota Avanza','AB 5511 PP','Silver','2016','1','0',550000,'assets/upload/foto/mobil/download_(9).jpg'),(17,1,NULL,'MPV','Toyota Avanza','AB 3124 GA','Hitam','2016','1','0',550000,'assets/upload/foto/mobil/download_(3).jpg'),(19,1,NULL,'MPV','Suzuki Ertiga','AB 1210 AA','Hitam','2014','1','0',500000,'assets/upload/foto/mobil/ertiga_black.jpg'),(20,1,NULL,'MPV','Suzuki Ertiga','AB 4183 PP','Abu Abu','2014','1','0',500000,'assets/upload/foto/mobil/ertiga.jpg'),(21,1,NULL,'MPV','Suzuki Ertiga','AB 3246 GA','Silver','2014','1','0',500000,'assets/upload/foto/mobil/download_(31).jpg'),(22,1,NULL,'HTB','Honda Jazz','AB 5231 GA','Merah','2013','1','0',450000,'assets/upload/foto/mobil/jazz_merah.jpg'),(24,1,NULL,'HTB','Honda Jazz','AB 3214 GA','Putih','2013','1','0',450000,'assets/upload/foto/mobil/jazz_putih.jpg'),(25,1,NULL,'HTB','Honda Brio','AB 6189 PP','Merah','2017','1','0',450000,'assets/upload/foto/mobil/brio_merah.jpg'),(26,1,NULL,'HTB','Honda Brio','AB 1724 AA','Abu Abu','2017','1','0',450000,'assets/upload/foto/mobil/brio_abu.jpg'),(27,1,1,'MPV','Toyota Avanza','AB 2135 LQ','Silver','2011','1','1',450000,'assets/upload/foto/mobil/avanza_silver.jpg'),(28,1,1,'MPV','Daihatsu Xenia','AB 2357 GA','Hitam','2014','1','1',450000,'assets/upload/foto/mobil/xenia_hitam.jpg'),(29,1,4,'MPV','Daihatsu Xenia','AB 2176 GA','Silver','2014','1','1',450000,'assets/upload/foto/mobil/xenia_silver.jpg'),(30,1,4,'MPV','Daihatsu Luxio','AB 2165 LQ','Silver','2012','1','1',350000,'assets/upload/foto/mobil/Luxio_silver.jpg'),(31,NULL,5,'MPV','Daihatsu Luxio','AB 1075 GA','Abu Abu','2012','1','1',350000,'assets/upload/foto/mobil/luxio_abu.jpg'),(32,1,6,'MPV','Daihatsu Luxio','AB 2176 GA','Abu Abu','2012','1','1',350000,'assets/upload/foto/mobil/luxio_abu1.jpg'),(33,1,7,'HTB','Honda Brio','AB 1784 AA','Orange','2016','1','1',450000,'assets/upload/foto/mobil/download_(7).jpg');
/*!40000 ALTER TABLE `tb_mobil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipe`
--

DROP TABLE IF EXISTS `tipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipe` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `kode_tipe` varchar(20) NOT NULL,
  `nama_tipe` varchar(120) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipe`
--

LOCK TABLES `tipe` WRITE;
/*!40000 ALTER TABLE `tipe` DISABLE KEYS */;
INSERT INTO `tipe` VALUES (1,'HTB','Hatchback'),(2,'SDN','Sedan'),(3,'MPV','Multi Purpose Vehicle'),(4,'MNB','Minibus');
/*!40000 ALTER TABLE `tipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_layanan` enum('sopir','tanpa_sopir') DEFAULT NULL,
  `jaminan_ktp` varchar(100) DEFAULT NULL,
  `jaminan_stnk_nama` varchar(100) DEFAULT NULL,
  `jaminan_stnk_plat` varchar(100) DEFAULT NULL,
  `jaminan_motor_plat` varchar(100) DEFAULT NULL,
  `jaminan_motor_merk` varchar(100) DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_midtrans` varchar(50) NOT NULL DEFAULT '',
  `tgl_rental` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `tgl_pengembalian` datetime DEFAULT NULL,
  `status_pengembalian` varchar(50) NOT NULL,
  `status_rental` int(50) NOT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `tipe_pembayaran` varchar(255) DEFAULT NULL,
  `jenis_pembayaran` varchar(255) DEFAULT NULL,
  `kode_pembayaran` varchar(255) DEFAULT NULL,
  `kode_bank_midtrans` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_rental`),
  KEY `status_rental` (`status_rental`),
  KEY `id_customer` (`id_customer`),
  KEY `id_mobil` (`id_mobil`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`status_rental`) REFERENCES `status_rental` (`id_status_rental`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `tb_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_mobil`) REFERENCES `tb_mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (65,'sopir','2312391243928','jono','AG 4567 RBD','AG 4567 RBD','Scoopy',5,10,'6527122022095009','2022-12-24 15:27:00','2022-12-25 07:06:17','2022-12-26 07:06:17','',4,NULL,'bank','bca','48487137314',NULL),(67,'sopir','2312391243928','jono','AG 4567 RBD','AG 4567 RBD','Scoopy',5,27,'6727122022110134','2022-12-27 18:01:00','2023-01-08 18:01:00','2023-01-09 18:02:00','',4,NULL,'bank','bca','48487626377',NULL),(68,'sopir','2312391243928','jono','AG 4567 RBD','AG 4567 RBD','Scoopy',5,16,'6827122022134600','2022-12-27 20:45:00','2023-01-16 20:45:00',NULL,'',3,NULL,'bank','bca','48487314829',NULL);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-27 22:04:15
