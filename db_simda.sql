/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 10.4.27-MariaDB : Database - kelompok1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kelompok1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `kelompok1`;

/*Table structure for table `daftarpesanan` */

DROP TABLE IF EXISTS `daftarpesanan`;

CREATE TABLE `daftarpesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idBarang` int(11) NOT NULL,
  `idPemesan` int(11) NOT NULL,
  `jumlahBarang` varchar(6) NOT NULL,
  `tanggalPakai` date NOT NULL,
  `waktuPakai` time NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `keperluan` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `daftarpesanan` */

insert  into `daftarpesanan`(`id`,`idBarang`,`idPemesan`,`jumlahBarang`,`tanggalPakai`,`waktuPakai`,`status`,`keperluan`,`created_at`,`updated_at`) values 
(1,2,2,'1','2023-06-20','22:42:00','1','Rapat','2023-06-20 23:42:53','2023-06-20 23:47:20'),
(2,2,2,'1','2023-06-20','22:43:00','1','Rapat','2023-06-20 23:43:31','2023-06-20 23:46:25'),
(3,2,3,'9','2023-06-22','21:00:00','1','Rapat','2023-06-21 00:04:35','2023-06-21 00:05:07'),
(4,2,3,'2','2023-06-22','05:00:00','1','Di Jual ','2023-06-21 02:16:39','2023-06-21 02:17:59'),
(5,2,3,'1','2023-06-26','01:21:00','0','Ujian Susulan','2023-06-21 02:21:53','2023-06-21 02:21:53'),
(6,6,3,'3','2023-06-26','06:00:00','0','Ujian','2023-06-21 02:22:17','2023-06-21 02:22:17');

/*Table structure for table `dataambilbarang` */

DROP TABLE IF EXISTS `dataambilbarang`;

CREATE TABLE `dataambilbarang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idBarang` int(11) NOT NULL,
  `kodeBarang` varchar(30) NOT NULL,
  `namaPengambil` varchar(50) NOT NULL,
  `jumlahBarang` varchar(6) NOT NULL,
  `tanggalAmbil` date NOT NULL,
  `waktuAmbil` time NOT NULL,
  `keperluan` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `dataambilbarang` */

insert  into `dataambilbarang`(`id`,`idBarang`,`kodeBarang`,`namaPengambil`,`jumlahBarang`,`tanggalAmbil`,`waktuAmbil`,`keperluan`,`created_at`,`updated_at`) values 
(1,3,'ATK02','Alan','2','2023-06-20','22:35:00','Pengisian tinita printer lab1A','2023-06-20 23:35:39','2023-06-20 23:35:39');

/*Table structure for table `databarang` */

DROP TABLE IF EXISTS `databarang`;

CREATE TABLE `databarang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodeBarang` varchar(30) NOT NULL,
  `fileBarcode` varchar(70) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `jenisBarang` varchar(2) NOT NULL,
  `gambarBarang` varchar(70) NOT NULL,
  `stokBarang` varchar(6) NOT NULL,
  `jmlDimiliki` varchar(6) NOT NULL,
  `satuan` varchar(40) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `databarang` */

insert  into `databarang`(`id`,`kodeBarang`,`fileBarcode`,`namaBarang`,`jenisBarang`,`gambarBarang`,`stokBarang`,`jmlDimiliki`,`satuan`,`created_at`,`updated_at`) values 
(1,'ATK01','BNBsEclqUQYvokzLaHry.png','pena','1','','10','10','20','2023-06-20 23:32:24','2023-06-20 23:32:39'),
(2,'ELE01','','Laptop','1','','9','10','1','2023-06-20 23:33:31','2023-06-21 00:06:08'),
(3,'ATK02','bKFENMdAucSrdvMmqfSb.png','Tinta','2','','8','10','1','2023-06-20 23:34:15','2023-06-20 23:58:57'),
(5,'ELE02','','Flashdisk','1','','100','100','1','2023-06-21 00:10:10','2023-06-21 00:10:10'),
(6,'ELE03','','Mouse','1','','100','100','1','2023-06-21 00:10:27','2023-06-21 00:10:27'),
(7,'ELE04','','Terminal','1','','10','10','2','2023-06-21 00:11:18','2023-06-21 00:11:18'),
(8,'GD01','','LAB 1 A','1','','1','1','1','2023-06-21 00:11:38','2023-06-21 00:11:38'),
(9,'GD02','','GSG','1','','1','1','1','2023-06-21 00:11:54','2023-06-21 00:11:54'),
(10,'GD05','','LAB 4 GSG','1','','1','1','1','2023-06-21 01:17:03','2023-06-21 01:18:44');

/*Table structure for table `datapinjambarang` */

DROP TABLE IF EXISTS `datapinjambarang`;

CREATE TABLE `datapinjambarang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idBarang` int(11) NOT NULL,
  `kodeBarang` varchar(30) NOT NULL,
  `namaPeminjam` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `jumlahBarang` varchar(6) NOT NULL,
  `jumlahKembali` varchar(6) NOT NULL,
  `tanggalPinjam` date NOT NULL,
  `waktuPinjam` time NOT NULL,
  `namaKembali` varchar(50) NOT NULL,
  `tanggalKembali` date DEFAULT NULL,
  `waktuKembali` time DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `keperluan` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `datapinjambarang` */

insert  into `datapinjambarang`(`id`,`idBarang`,`kodeBarang`,`namaPeminjam`,`phone`,`jumlahBarang`,`jumlahKembali`,`tanggalPinjam`,`waktuPinjam`,`namaKembali`,`tanggalKembali`,`waktuKembali`,`status`,`keperluan`,`created_at`,`updated_at`) values 
(1,2,'ELE01','Alvian','','1','0','2023-06-20','22:47:00','',NULL,NULL,'0','Rapat','2023-06-20 23:47:20','2023-06-20 23:47:20'),
(2,2,'ELE01','wira','','9','9','2023-06-26','02:00:00','Alan','2023-06-30','23:06:00','1','Rapat','2023-06-21 00:05:07','2023-06-21 00:06:08'),
(3,10,'GD05','DINAN','','1','1','2023-06-22','00:17:00','Alan','2023-06-23','00:18:00','1','KTD','2023-06-21 01:17:53','2023-06-21 01:18:44');

/*Table structure for table `instansi` */

DROP TABLE IF EXISTS `instansi`;

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namaInstansi` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(60) NOT NULL,
  `api` varchar(60) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `instansi` */

insert  into `instansi`(`id`,`namaInstansi`,`alamat`,`logo`,`api`,`created_at`,`updated_at`) values 
(1,'Universitas Teknokrat Indonesi','jl. Za Pagar Alam','1687276630_9b8132a826e2023758a2.png','',NULL,'2023-06-20 23:57:11');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values 
(1,'2023-01-22-003229','App\\Database\\Migrations\\Pengguna','default','App',1687274971,1),
(2,'2023-01-22-003628','App\\Database\\Migrations\\DataBarang','default','App',1687274971,1),
(3,'2023-02-02-124220','App\\Database\\Migrations\\DataPinjamBarang','default','App',1687274971,1),
(4,'2023-02-02-141244','App\\Database\\Migrations\\DaftarPesanan','default','App',1687274971,1),
(5,'2023-02-05-041914','App\\Database\\Migrations\\DataAmbilBarang','default','App',1687274971,1),
(6,'2023-02-14-062210','App\\Database\\Migrations\\DataInstansi','default','App',1687274971,1);

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `level` enum('1','2') NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id`,`email`,`pass`,`nama`,`phone`,`level`,`created_at`,`updated_at`) values 
(1,'admin@admin.com','$2y$10$QVvjgFGdNELuJIggL3IO0.BLqhWXvAw8keQP49yhzYWgYO/BPOj5O','Pustik','','2',NULL,'2023-06-20 23:57:33'),
(2,'guru1@admin.com','$2y$10$QVvjgFGdNELuJIggL3IO0.BLqhWXvAw8keQP49yhzYWgYO/BPOj5O','Alvian','','1',NULL,NULL),
(3,'user@gmail.com','$2y$10$9KWyivXb..4//MhmU.7T.ebVo9fYbhtth0INlBH67F0aF.3PzYy3K','wira','','1','2023-06-20 23:49:37','2023-06-20 23:51:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
