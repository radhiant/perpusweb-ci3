/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - perpusweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`perpusweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `perpusweb`;

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `id_anggota` varchar(40) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgllahir` varchar(50) DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `anggota` */

insert  into `anggota`(`id_anggota`,`nama_lengkap`,`notelp`,`jk`,`tempat`,`tgllahir`,`umur`,`alamat`,`foto`) values 
('A0001','Radhian Sobarna','087754224567','Laki-laki','Sumedang','04/23/2000','20','Desa Sukatali, Kec Situraja','radhian.jpg'),
('A0002','Dhea Mawarni','087827817289','Perempuan','Sumedang','04/14/2000','20','Desa Cihanja, Kec ganeas','dhea.jpg'),
('A0003','Heri Perdi','089980089789','Laki-laki','Sumedang','04/12/2000','20','Sumedang','man.png');

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id_buku` varchar(20) DEFAULT NULL,
  `id_kategori` varchar(20) DEFAULT NULL,
  `id_penerbit` varchar(20) DEFAULT NULL,
  `id_rak` varchar(20) DEFAULT NULL,
  `judul` varchar(60) DEFAULT NULL,
  `pengarang` varchar(60) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `jmlhal` int(4) DEFAULT NULL,
  `jmlbuku` int(4) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `buku` */

insert  into `buku`(`id_buku`,`id_kategori`,`id_penerbit`,`id_rak`,`judul`,`pengarang`,`isbn`,`jmlhal`,`jmlbuku`,`tahun`,`sinopsis`,`foto`) values 
('B0001','K0001','P0002','Rak-01','Lancar JavaScript','Jubile Enterprice','12345678',140,56,2019,'-','lancar_javascript.jpg'),
('B0002','K0001','P0002','Rak-01','Belajar Otodidak CodeIgniter','Budi Raharjo','12345679',130,61,2020,'-','belajar_codeigniter.jpg'),
('B0003','K0001','P0002','Rak-01','Pro PHP & Jquery 7 Hari','WARDANA','12345681',100,15,2020,'-','web_profesional_dengan_php_jquery.jpg'),
('B0004','K0006','P0004','Rak-04','Otodidak Web Programming','Muhammad Ibnu Sa\'ad','123523453424',100,25,2019,'-','ID_OWP2020MTH01WP.jpg');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) DEFAULT NULL,
  `kategori` varchar(40) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`kategori`,`keterangan`) values 
('K0001','Programing',''),
('K0002','Sains',''),
('K0004','Pendidikan',''),
('K0005','Pemula',''),
('K0006','Informatika','');

/*Table structure for table `p_buku` */

DROP TABLE IF EXISTS `p_buku`;

CREATE TABLE `p_buku` (
  `id_pbuku` int(5) NOT NULL AUTO_INCREMENT,
  `id_pinjam` varchar(50) DEFAULT NULL,
  `id_buku` varchar(50) DEFAULT NULL,
  `qty` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_pbuku`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

/*Data for the table `p_buku` */

insert  into `p_buku`(`id_pbuku`,`id_pinjam`,`id_buku`,`qty`) values 
(57,'PJM0001','B0004','10'),
(58,'PJM0002','B0003','5'),
(59,'PJM0002','B0004','10');

/*Table structure for table `peminjaman` */

DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `id_pinjam` varchar(10) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `id_anggota` varchar(5) DEFAULT NULL,
  `tempo` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `usr_input` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `peminjaman` */

insert  into `peminjaman`(`id_pinjam`,`tgl_pinjam`,`id_anggota`,`tempo`,`status`,`ket`,`usr_input`) values 
('PJM0001','2020-09-15','A0003','2020-09-18','Pinjam','','Admin'),
('PJM0002','2020-09-15','A0003','2020-09-18','Kembali','','Admin');

/*Table structure for table `penerbit` */

DROP TABLE IF EXISTS `penerbit`;

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(20) DEFAULT NULL,
  `penerbit` varchar(60) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penerbit` */

insert  into `penerbit`(`id_penerbit`,`penerbit`,`keterangan`) values 
('P0001','Ria Ricis',''),
('P0002','Boy William',''),
('P0003','Radhian Sobarna',''),
('P0004','Widi P','');

/*Table structure for table `pengadaan` */

DROP TABLE IF EXISTS `pengadaan`;

CREATE TABLE `pengadaan` (
  `id_pengadaan` varchar(10) DEFAULT NULL,
  `id_buku` varchar(60) DEFAULT NULL,
  `asal_buku` varchar(60) DEFAULT NULL,
  `jml` int(4) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `tgl` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengadaan` */

insert  into `pengadaan`(`id_pengadaan`,`id_buku`,`asal_buku`,`jml`,`ket`,`tgl`) values 
('PNG0001','B0003','Sumedang',5,'-','2020-04-15'),
('PNG0002','B0002','Sumedang',6,'-','2020-04-22'),
('PNG0003','B0001','Sumedang',6,'-','2020-04-21'),
('PNG0004','B0004','Sumedang',5,'-','2020-09-15');

/*Table structure for table `pengembalian` */

DROP TABLE IF EXISTS `pengembalian`;

CREATE TABLE `pengembalian` (
  `id_kembali` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_kembali` varchar(20) DEFAULT NULL,
  `id_pinjam` varchar(20) DEFAULT NULL,
  `terlambat` varchar(15) DEFAULT NULL,
  `denda` varchar(15) DEFAULT NULL,
  `id_admin` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_kembali`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengembalian` */

insert  into `pengembalian`(`id_kembali`,`tgl_kembali`,`id_pinjam`,`terlambat`,`denda`,`id_admin`) values 
(16,'2020-09-15','PJM0002','-','-',NULL);

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `level` enum('Petugas','Kepala','Administrasi') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_user`,`nama`,`email`,`pass`,`notelp`,`status`,`level`,`foto`) values 
('U0001','Admin','admin@gmail.com','admin123','087892878222','Aktif','Administrasi','user.png'),
('U0003','Dhea Mawarni','dhea@gmail.com','petugas123','087892871888','Aktif','Petugas','dhea.jpg'),
('U0004','Radhian Sobarna','radhiantsobarna@gmail.com','radhiant99','087817379229','Aktif','Kepala','aeng.jpeg');

/*Table structure for table `rak` */

DROP TABLE IF EXISTS `rak`;

CREATE TABLE `rak` (
  `id_rak` varchar(20) DEFAULT NULL,
  `rak` varchar(60) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `rak` */

insert  into `rak`(`id_rak`,`rak`,`keterangan`) values 
('Rak-01','Khusus Pemula',''),
('Rak-02','Khusus Pelajar',''),
('Rak-03','Sastra',''),
('Rak-04','Coding','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
