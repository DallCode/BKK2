-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: bkkril
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aktivitas_users`
--

DROP TABLE IF EXISTS `aktivitas_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aktivitas_users` (
  `id_aktivitas_users` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL,
  PRIMARY KEY (`id_aktivitas_users`),
  KEY `aktivitas_users_username_foreign` (`username`),
  CONSTRAINT `aktivitas_users_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aktivitas_users`
--

LOCK TABLES `aktivitas_users` WRITE;
/*!40000 ALTER TABLE `aktivitas_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `aktivitas_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_alumni`
--

DROP TABLE IF EXISTS `data_alumni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_alumni` (
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` enum('AK','BR','DKV','MLOG','MP','RPL','TKJ') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki Laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lulus` year NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `kontak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keahlian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`nik`),
  KEY `data_alumni_username_foreign` (`username`),
  CONSTRAINT `data_alumni_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_alumni`
--

LOCK TABLES `data_alumni` WRITE;
/*!40000 ALTER TABLE `data_alumni` DISABLE KEYS */;
INSERT INTO `data_alumni` VALUES ('3172012207800015','3172012207800015','Satria Galam Pratama','DKV','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3173081806880011','3173081806880011','Reyga Marza Ramadhan','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3173081806880020','3173081806880020','Gita Anggraeni','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3174021705790005','3174021705790005','Hariz May Rayhan','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3174021705790014','3174021705790014','Azmi Fika Meldiana','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3175091201990001','3175091201990001','Budi Imam Praasetyo','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3175091201990010','3175091201990010','Agesti Tuhfan Hartika','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3201100301880002','3201100301880002','Dannish Pradya Utama','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3201100301880011','3201100301880011','Ajeng Galuh Parwati','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3202042403790008','3202042403790008','Nabil Asykaroe','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3202042403790017','3202042403790017','Cintami Nurmaulida Harahap','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3208031606990014','3208031606990014','Sammuel Nisja Tel','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3271041109880013','3271041109880013','Rifa Radwa Prasetya','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3271041109880022','3271041109880022','Intan Andini','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3273012007990012','3273012007990012','Ridwan Maulana','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3273012007990021','3273012007990021','Indriani Nellyza','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3274011304990007','3274011304990007','Muhammad Farrel Ferdinand','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3274011304990016','3274011304990016','Celsila Awal Qirana Mentari','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3275011502990003','3275011502990003','Haanun Syauqoni Al-fatir','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3275011502990012','3275011502990012','Annisa Nur Rahman','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3276062506800006','3276062506800006','Hasban Fardani','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3276062506800015','3276062506800015','BUNGA Azmi Ramania Putri','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3301052509900009','3301052509900009','Rafi Cahyadi','MLOG','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3301052509900018','3301052509900018','Fatah Fauziah','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3304050104980017','3304050104980017','Yudi Fatir Faturohman','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3402021203980004','3402021203980004','Hafid Aljabbaar','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3402021203980013','3402021203980013','Aqila Fitri Raiha','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3471061205990010','3471061205990010','Rama Taufik Azkia','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL),('3471061205990019','3471061205990019','Fika Fahmil Muntaza','AK','Laki Laki',2026,NULL,NULL,NULL,NULL,NULL),('3474011908990016','3474011908990016','Shauqi Julian Rikhsan','RPL','Laki Laki',2025,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `data_alumni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_perusahaan`
--

DROP TABLE IF EXISTS `data_perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_perusahaan` (
  `id_data_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_usaha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`id_data_perusahaan`),
  KEY `data_perusahaan_username_foreign` (`username`),
  CONSTRAINT `data_perusahaan_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_perusahaan`
--

LOCK TABLES `data_perusahaan` WRITE;
/*!40000 ALTER TABLE `data_perusahaan` DISABLE KEYS */;
INSERT INTO `data_perusahaan` VALUES ('P000002','len@gmail.com','PT LEN','IT','0865454533420','Jl. Kekasih',NULL,'Aktif'),('P000003','kabayan@gmail.com','PT Kabayan','IT','0835666257738','Jl. HTS',NULL,'Aktif'),('P000004','bara@gmail.com','PT Bara','IT','0835666257738','Jl. Budi',NULL,'Aktif'),('P000005','paninti@gmail.com','PT Paninti','Kesehatan','083744837623','Jl. gunung batu',NULL,'Aktif'),('P000006','tikter@gmail.com','Titik Terang','IT','083122837467','Jl. cianjur',NULL,'Aktif');
/*!40000 ALTER TABLE `data_perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_lamaran`
--

DROP TABLE IF EXISTS `file_lamaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `file_lamaran` (
  `id_lamaran` bigint unsigned NOT NULL,
  `nama_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `file_lamaran_id_lamaran_foreign` (`id_lamaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_lamaran`
--

LOCK TABLES `file_lamaran` WRITE;
/*!40000 ALTER TABLE `file_lamaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `file_lamaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lamaran`
--

DROP TABLE IF EXISTS `lamaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lamaran` (
  `id_lamaran` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lowongan_pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Terkirim','Lolos Ketahap Selanjutnya','Diterima','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Terkirim',
  PRIMARY KEY (`id_lamaran`),
  KEY `lamaran_id_lowongan_pekerjaan_foreign` (`id_lowongan_pekerjaan`),
  KEY `lamaran_nik_foreign` (`nik`),
  CONSTRAINT `lamaran_id_lowongan_pekerjaan_foreign` FOREIGN KEY (`id_lowongan_pekerjaan`) REFERENCES `lowongan_pekerjaan` (`id_lowongan_pekerjaan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lamaran`
--

LOCK TABLES `lamaran` WRITE;
/*!40000 ALTER TABLE `lamaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `lamaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan_pekerjaan`
--

DROP TABLE IF EXISTS `lowongan_pekerjaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lowongan_pekerjaan` (
  `id_lowongan_pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_data_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_waktu_pekerjaan` enum('Waktu Kerja Standar (Full-Time)','Waktu Kerja Paruh Waktu (Part-Time)','Waktu Kerja Fleksibel (Flexible Hours)','Shift Kerja (Shift Work)','Waktu Kerja Bergilir (Rotating Shifts)','Waktu Kerja Jarak Jauh (Remote Work)','Waktu Kerja Kontrak (Contract Work)','Waktu Kerja Proyek (Project-Based Work)','Waktu Kerja Tidak Teratur (Irregular Hours)','Waktu Kerja Sementara (Temporary Work)') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status` enum('Tertunda','Dipublikasi','Tidak Dipublikasi') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tertunda',
  `waktu` timestamp NOT NULL,
  PRIMARY KEY (`id_lowongan_pekerjaan`),
  KEY `lowongan_pekerjaan_id_data_perusahaan_foreign` (`id_data_perusahaan`),
  CONSTRAINT `lowongan_pekerjaan_id_data_perusahaan_foreign` FOREIGN KEY (`id_data_perusahaan`) REFERENCES `data_perusahaan` (`id_data_perusahaan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan_pekerjaan`
--

LOCK TABLES `lowongan_pekerjaan` WRITE;
/*!40000 ALTER TABLE `lowongan_pekerjaan` DISABLE KEYS */;
INSERT INTO `lowongan_pekerjaan` VALUES ('LP-000001','P000002','Frontend Developers','Waktu Kerja Standar (Full-Time)','Frontend Developer','2024-09-28','Dipublikasi','2024-09-17 00:17:39'),('LP-000002','P000004','Data Analyst','Waktu Kerja Standar (Full-Time)','hcghbn','2024-09-21','Dipublikasi','2024-09-17 00:28:30');
/*!40000 ALTER TABLE `lowongan_pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=368 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (352,'2014_10_12_000000_create_users_table',1),(353,'2014_10_12_100000_create_password_reset_tokens_table',1),(354,'2019_08_19_000000_create_failed_jobs_table',1),(355,'2019_12_14_000001_create_personal_access_tokens_table',1),(356,'2024_07_06_100612_create_aktivitas_users_table',1),(357,'2024_08_06_122925_create_data_alumni_table',1),(358,'2024_08_06_123019_create_data_perusahaan_table',1),(359,'2024_08_06_123336_create_riwayat_pendidikan_formal_table',1),(360,'2024_08_06_123415_create_riwayat_pendidikan_non_formals_table',1),(361,'2024_08_06_123644_create_pengalaman_kerja_table',1),(362,'2024_08_06_123801_create_lowongan_pekerjaan_table',1),(363,'2024_08_06_124347_create_lamaran_table',1),(364,'2024_08_06_124513_create_file_lamaran_table',1),(365,'2014_10_12_100000_create_password_resets_table',2),(366,'2024_07_31_073040_create_perusahaan_table',2),(367,'2024_07_31_073220_create_alumni_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengalaman_kerja`
--

DROP TABLE IF EXISTS `pengalaman_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengalaman_kerja` (
  `id_pengalaman_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_waktu_pekerjaan` enum('Waktu Kerja Standar (Full-Time)','Waktu Kerja Paruh Waktu (Part-Time)','Waktu Kerja Fleksibel (Flexible Hours)','Shift Kerja (Shift Work)','Waktu Kerja Bergilir (Rotating Shifts)','Waktu Kerja Jarak Jauh (Remote Work)','Waktu Kerja Kontrak (Contract Work)','Waktu Kerja Proyek (Project-Based Work)','Waktu Kerja Tidak Teratur (Irregular Hours)','Waktu Kerja Sementara (Temporary Work)') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_awal` year NOT NULL,
  `tahun_akhir` year NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pengalaman_kerja`),
  KEY `pengalaman_kerja_nik_foreign` (`nik`),
  CONSTRAINT `pengalaman_kerja_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `data_alumni` (`nik`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengalaman_kerja`
--

LOCK TABLES `pengalaman_kerja` WRITE;
/*!40000 ALTER TABLE `pengalaman_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengalaman_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_pendidikan_formal`
--

DROP TABLE IF EXISTS `riwayat_pendidikan_formal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat_pendidikan_formal` (
  `id_riwayat_pendidikan_formal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_studi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_awal` year NOT NULL,
  `tahun_akhir` year NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_riwayat_pendidikan_formal`),
  KEY `riwayat_pendidikan_formal_nik_foreign` (`nik`),
  CONSTRAINT `riwayat_pendidikan_formal_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `data_alumni` (`nik`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_pendidikan_formal`
--

LOCK TABLES `riwayat_pendidikan_formal` WRITE;
/*!40000 ALTER TABLE `riwayat_pendidikan_formal` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayat_pendidikan_formal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_pendidikan_non_formal`
--

DROP TABLE IF EXISTS `riwayat_pendidikan_non_formal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat_pendidikan_non_formal` (
  `id_riwayat_pendidikan_non_formal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lembaga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kursus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_riwayat_pendidikan_non_formal`),
  KEY `riwayat_pendidikan_non_formal_nik_foreign` (`nik`),
  CONSTRAINT `riwayat_pendidikan_non_formal_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `data_alumni` (`nik`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_pendidikan_non_formal`
--

LOCK TABLES `riwayat_pendidikan_non_formal` WRITE;
/*!40000 ALTER TABLE `riwayat_pendidikan_non_formal` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayat_pendidikan_non_formal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin BKK','Perusahaan','Alumni') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('3172012207800015','$2y$10$QZ/yzSjxtDkoy9DmKCMfv.h8bUUyavMc3RufZW4jCESaWTYthe4HO','Alumni'),('3173081806880011','$2y$10$8LImvFMnzWVBA1x8rejNJ.xx2CELYz5xuoTeG.65ifkMl/s4Pmwg6','Alumni'),('3173081806880020','$2y$10$mFHZCDkv5uY9wpc8BE90V.KfVn1iXn2/1mes1zIRD3fYMlGZBKvkm','Alumni'),('3174021705790005','$2y$10$Jzm8QQfyBRwuM1KmhGyY/uL3j.vlFtP0WoLfmbALVK3nXA/pEquaW','Alumni'),('3174021705790014','$2y$10$JWMMvEZ6GmdjX0qIPyoQ0eV2NNrTGHDsmGDDSTcKHb8mJIboRYR/C','Alumni'),('3175091201990001','$2y$10$AUBJMzSp34Jf24IXT1jh0./bpInzdeHTof8epKEiLE84FvPUKYn56','Alumni'),('3175091201990010','$2y$10$WFVND3tmgWvZkPz44rfbqeU1YbXxmRzr/niP3Dptl.eoMCmE4TmqS','Alumni'),('3201100301880002','$2y$10$KU6jassB4KjE7itvmG3O6ejjPBrFRT2CppvyA0XTGywP8L50LBCIe','Alumni'),('3201100301880011','$2y$10$rkhcWxjvri3aJt99kcSI1e2RxvIecxaA.Tvvkdsr6hLmUOGvYFJHm','Alumni'),('3202042403790008','$2y$10$b53D36XuzfOwzjT7cVb7Zu.YMk4KL57YwRky9UZlQhmgpTjqbkzXu','Alumni'),('3202042403790017','$2y$10$VjcGLaZ6tPfTpay3yUpiN.HMCZ.5pfHmKzWAnCkDHxZNLwnrpSZ0O','Alumni'),('3208031606990014','$2y$10$lRzNSK/iFFEHcaQOO60bv.TdC/hTJiLhbaaHrqwIGthiaHhdwjNha','Alumni'),('3271041109880013','$2y$10$gxleG6YCZd3SnVwMVmfrsuYGcdB5T0UB3KVj/JA/IzS7c7quQDVjO','Alumni'),('3271041109880022','$2y$10$37/oz0wzAdDFRhyYOOsG6uyfGVnakdeds8ET3eOIRLuH/u5637s4C','Alumni'),('3273012007990012','$2y$10$u/bhEMa/G3qmrsQGqya6F.Ft6iJTPPGXtmbiuefhoMTx7qcmknT7e','Alumni'),('3273012007990021','$2y$10$93CyCax/iavKFK2ngL.6n.XXxmvYjevKwR3uQ4YWY/R.7w.jSvY4y','Alumni'),('3274011304990007','$2y$10$gjjVCKAL2ljsynoHXI8r.uxOu2tfvQT6XCK0gTwhgMgonVbrH0l6O','Alumni'),('3274011304990016','$2y$10$RfnsAeoYEQkit9q.ZwHzk.bbBjVE1Z1bOApDlYi.RnLGuYybHfHAq','Alumni'),('3275011502990003','$2y$10$yXXk8OmUxmeuhhx4xdEnRuodw/yd1A2Ghiq/X5J4zdpU/XdDfSPm2','Alumni'),('3275011502990012','$2y$10$Q298yr505DF747l17ergmOsUyrSE1jyEygAqTDtTj6p5ITOR91Ls.','Alumni'),('3276062506800006','$2y$10$mKTaXciwi44kY.KDABFAWuzT4B0e0utbprfZxu7b9g4o5oHvyvDdO','Alumni'),('3276062506800015','$2y$10$ErUHRl5Z9Sp/LcWw6pXKZOsY4X3nxQgXX3oFCi6se7ubFb/RKw6nO','Alumni'),('3301052509900009','$2y$10$kruv.JhEgkJJI1Z3XmrRvuLOzvF7483tpjaiZ/Gbf7bEe2yaAmjqC','Alumni'),('3301052509900018','$2y$10$v5.SPrY9cVCe/6xf1XS.WuoDU4Bu8QeAeVdwHfAVIYaFZX31CMgCy','Alumni'),('3304050104980017','$2y$10$hVqhVht0WJuK2mXzJk7tE.l.NOE3GtNaaT/SM5Gu52Bq6zdpEelv.','Alumni'),('3402021203980004','$2y$10$V4hjT8nCpOYkxdfIUbXIq.0OAWrDit3GJvlVW/nT1hpnzU.ElYP0W','Alumni'),('3402021203980013','$2y$10$vUFTpbd0WfP9wnUSymd7I.wuU3UVsKHABtN0JwvwDNq7JeEqpddZy','Alumni'),('3471061205990010','$2y$10$X7Tj8.stQPDTK/c2XJcRCuHaFWWttFMM1a5oL4TiAYxo3eVunLGBm','Alumni'),('3471061205990019','$2y$10$fys9LXOxZ8.Qzh5dE.7oO.LDdsrqxiSyUT2VcqGOy2UaX7P38cMoy','Alumni'),('3474011908990016','$2y$10$DXrgz/5wzWJ/ks5cjD4.8.eYIu1IjjKoOrKeVfPOease1A6qrNbgW','Alumni'),('admin@gmail.com','$2y$10$mvfi8kzUkHsrNgajXyHRsOI7oAxhAiKcIGzXimwECJNH4HiDhYmv6','Admin BKK'),('bara@gmail.com','$2y$10$KW/dseIHeTeHhM6XZwtQCOVJi97Yh1BVKZi3olKNV9ZN3QyZu9UQS','Perusahaan'),('kabayan@gmail.com','$2y$10$W/Zaip7rxkOZlua70wi58.J6.pRUEPzos4d0QDbHn3eXB29I8Krve','Perusahaan'),('len@gmail.com','$2y$10$JsIwrTQE0B/GxDsHXB0RWeLSeDJBL3585OSCwRt5uKbNmJRuMvBE6','Perusahaan'),('paninti@gmail.com','$2y$10$K4xlTiSynCM2PG3n0o/aP.Zq3CeWUMUb/PE1e6bZmmWZz8GQ3jGJW','Perusahaan'),('tikter@gmail.com','$2y$10$ID8AWRJHRBvH0C90tDuceun4VU2hkg6aFFizC4geYA/gyEpZmmvvy','Perusahaan');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-18  9:00:23
