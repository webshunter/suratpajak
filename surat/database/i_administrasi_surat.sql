/*
Navicat MySQL Data Transfer

Source Server         : mariadb3_local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : i_administrasi_surat

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-01-18 16:54:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `instansi`
-- ----------------------------
DROP TABLE IF EXISTS `instansi`;
CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of instansi
-- ----------------------------
INSERT INTO `instansi` VALUES ('1', 'PIHAK EKSTERN', 'Dari luar KPP Malang Utara', '1', '2018-12-13 14:08:05', '1', '2019-01-17 10:57:16');
INSERT INTO `instansi` VALUES ('3', 'Kanwil DJP Jawa Timur III', 'Jl. Letjen S. Parman 100, Malang', '1', '2018-12-31 07:32:24', null, null);
INSERT INTO `instansi` VALUES ('4', 'Kantor Pusat Direktorat Jenderal Pajak', 'Jl. Gatot Subroto 40- 42, Jakarta', '1', '2018-12-31 07:32:44', '1', '2018-12-31 07:33:08');
INSERT INTO `instansi` VALUES ('5', 'INTERN KPP PRATAMA MALANG UTARA', 'Jl. JA Suprapto 29, Malang', '1', '2019-01-09 11:33:12', null, null);

-- ----------------------------
-- Table structure for `is_kotakberkas`
-- ----------------------------
DROP TABLE IF EXISTS `is_kotakberkas`;
CREATE TABLE `is_kotakberkas` (
  `kode_kotakberkas` varchar(7) NOT NULL,
  `kode_lemari` varchar(2) NOT NULL,
  `kode_rak` varchar(2) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `arsip_kotakberkas` varchar(255) DEFAULT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_kotakberkas`) USING BTREE,
  KEY `created_user` (`created_user`) USING BTREE,
  KEY `updated_user` (`updated_user`) USING BTREE,
  CONSTRAINT `is_kotakberkas_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `sys_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_kotakberkas_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `sys_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of is_kotakberkas
-- ----------------------------
INSERT INTO `is_kotakberkas` VALUES ('B000001', 'A', '1', 'berisi 72 map berkas Wajib Pajak', null, '4', '2018-04-11 07:33:10', '4', '2018-04-12 09:07:30');
INSERT INTO `is_kotakberkas` VALUES ('B000002', 'A', '1', 'LAIN-LAIN', null, '4', '2018-04-13 14:23:47', '4', '2018-04-13 14:23:47');
INSERT INTO `is_kotakberkas` VALUES ('B000003', 'A', '1', 'berisi 67 map berkas Wajib Pajak', null, '4', '2018-04-13 14:29:56', '4', '2018-04-14 13:32:24');
INSERT INTO `is_kotakberkas` VALUES ('B000004', 'A', '1', 'LAIN-LAIN', null, '4', '2018-04-13 16:15:10', '4', '2018-04-13 16:15:10');
INSERT INTO `is_kotakberkas` VALUES ('B000005', 'A', '1', 'berisi 72 map berkas Wajib Pajak', null, '4', '2018-04-13 16:15:32', '4', '2018-04-14 13:33:12');
INSERT INTO `is_kotakberkas` VALUES ('B000006', 'A', '1', 'BERISI 128 MAP BERKAS WAJIB PAJAK', null, '4', '2018-04-16 10:54:17', '4', '2018-04-16 13:43:41');
INSERT INTO `is_kotakberkas` VALUES ('B000007', 'A', '1', 'LAIN-LAIN', null, '4', '2018-04-16 10:54:39', '4', '2018-04-16 10:54:39');
INSERT INTO `is_kotakberkas` VALUES ('B000008', 'A', '1', 'LAIN-LAIN berisi 79 Wajib Pajak', null, '4', '2018-04-16 13:46:09', '4', '2018-04-19 08:09:19');
INSERT INTO `is_kotakberkas` VALUES ('B000009', 'A', '1', 'BERISI 77 MAP BERKAS WAJIB PAJAK', null, '4', '2018-04-16 13:49:11', '4', '2018-04-16 14:55:42');
INSERT INTO `is_kotakberkas` VALUES ('B000010', 'A', '1', 'LAIN-LAIN berisi 92 map berkas Wajib Pajak', null, '4', '2018-04-16 14:47:22', '4', '2018-04-19 08:08:35');
INSERT INTO `is_kotakberkas` VALUES ('B000011', 'A', '1', 'BERISI 104 MAP BERKAS WAJIB PAJAK', null, '4', '2018-04-16 14:59:59', '4', '2018-04-16 16:00:11');
INSERT INTO `is_kotakberkas` VALUES ('B000012', 'A', '1', 'LAIN-LAIN', null, '4', '2018-04-17 12:41:58', '4', '2018-04-17 12:41:58');
INSERT INTO `is_kotakberkas` VALUES ('B000013', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-17 12:42:46', '4', '2018-04-17 12:42:46');
INSERT INTO `is_kotakberkas` VALUES ('B000014', 'A', '2', 'BERISI 46 MAP BERKAS WAJIB PAJAK', null, '4', '2018-04-17 12:43:08', '4', '2018-04-17 13:13:27');
INSERT INTO `is_kotakberkas` VALUES ('B000015', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-17 13:16:02', '4', '2018-04-17 13:16:02');
INSERT INTO `is_kotakberkas` VALUES ('B000016', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-17 13:54:58', '4', '2018-04-17 13:54:58');
INSERT INTO `is_kotakberkas` VALUES ('B000017', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-19 14:42:58', '4', '2018-04-19 14:42:58');
INSERT INTO `is_kotakberkas` VALUES ('B000018', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-19 15:15:25', '4', '2018-04-19 15:15:25');
INSERT INTO `is_kotakberkas` VALUES ('B000019', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-19 15:50:20', '4', '2018-04-19 15:50:20');
INSERT INTO `is_kotakberkas` VALUES ('B000020', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-19 15:53:31', '4', '2018-04-19 15:53:31');
INSERT INTO `is_kotakberkas` VALUES ('B000021', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-23 10:40:14', '4', '2018-04-23 10:40:14');
INSERT INTO `is_kotakberkas` VALUES ('B000022', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-23 10:41:03', '4', '2018-04-23 10:41:03');
INSERT INTO `is_kotakberkas` VALUES ('B000023', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-23 11:09:40', '4', '2018-04-23 11:09:40');
INSERT INTO `is_kotakberkas` VALUES ('B000024', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-23 11:25:15', '4', '2018-04-23 11:25:15');
INSERT INTO `is_kotakberkas` VALUES ('B000025', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 11:50:31', '4', '2018-04-23 11:50:31');
INSERT INTO `is_kotakberkas` VALUES ('B000026', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 12:59:32', '4', '2018-04-23 12:59:32');
INSERT INTO `is_kotakberkas` VALUES ('B000027', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 13:20:40', '4', '2018-04-23 13:20:40');
INSERT INTO `is_kotakberkas` VALUES ('B000028', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 13:36:24', '4', '2018-04-23 13:36:24');
INSERT INTO `is_kotakberkas` VALUES ('B000029', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 13:54:11', '4', '2018-04-23 13:54:11');
INSERT INTO `is_kotakberkas` VALUES ('B000030', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 14:17:04', '4', '2018-04-23 14:17:04');
INSERT INTO `is_kotakberkas` VALUES ('B000031', 'A', '3', 'LAIN-LAINS', null, '4', '2018-04-23 14:29:07', '4', '2018-04-23 14:31:11');
INSERT INTO `is_kotakberkas` VALUES ('B000032', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 14:51:19', '4', '2018-04-23 14:51:19');
INSERT INTO `is_kotakberkas` VALUES ('B000033', 'a', '3', 'lain-lain', null, '4', '2018-04-23 15:26:27', '4', '2018-04-23 15:26:27');
INSERT INTO `is_kotakberkas` VALUES ('B000034', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 15:28:44', '4', '2018-04-23 15:28:44');
INSERT INTO `is_kotakberkas` VALUES ('B000035', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 16:03:15', '4', '2018-04-23 16:03:15');
INSERT INTO `is_kotakberkas` VALUES ('B000036', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 16:10:11', '4', '2018-04-23 16:10:11');
INSERT INTO `is_kotakberkas` VALUES ('B000037', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 10:32:33', '4', '2018-04-24 10:32:33');
INSERT INTO `is_kotakberkas` VALUES ('B000038', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 10:33:41', '4', '2018-04-24 10:33:41');
INSERT INTO `is_kotakberkas` VALUES ('B000039', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 11:00:19', '4', '2018-04-24 11:00:19');
INSERT INTO `is_kotakberkas` VALUES ('B000040', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 11:01:16', '4', '2018-04-24 11:01:16');
INSERT INTO `is_kotakberkas` VALUES ('B000041', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 11:23:47', '4', '2018-04-24 11:23:47');
INSERT INTO `is_kotakberkas` VALUES ('B000042', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 11:24:36', '4', '2018-04-24 11:24:36');
INSERT INTO `is_kotakberkas` VALUES ('B000043', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 13:07:27', '4', '2018-04-24 13:07:27');
INSERT INTO `is_kotakberkas` VALUES ('B000044', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 13:08:43', '4', '2018-04-24 13:08:43');
INSERT INTO `is_kotakberkas` VALUES ('B000045', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 13:37:22', '4', '2018-04-24 13:37:22');
INSERT INTO `is_kotakberkas` VALUES ('B000046', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 13:38:57', '4', '2018-04-24 13:38:57');
INSERT INTO `is_kotakberkas` VALUES ('B000047', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 14:06:29', '4', '2018-04-24 14:06:29');
INSERT INTO `is_kotakberkas` VALUES ('B000048', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 14:07:08', '4', '2018-04-24 14:07:08');
INSERT INTO `is_kotakberkas` VALUES ('B000049', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 11:21:07', '4', '2018-04-25 11:46:05');
INSERT INTO `is_kotakberkas` VALUES ('B000050', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 11:24:58', '4', '2018-04-25 11:24:58');
INSERT INTO `is_kotakberkas` VALUES ('B000051', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 11:45:51', '4', '2018-04-25 11:45:51');
INSERT INTO `is_kotakberkas` VALUES ('B000052', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 11:50:26', '4', '2018-04-25 11:50:26');
INSERT INTO `is_kotakberkas` VALUES ('B000053', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 13:21:45', '4', '2018-04-25 13:21:45');
INSERT INTO `is_kotakberkas` VALUES ('B000054', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 13:22:03', '4', '2018-04-25 13:22:03');
INSERT INTO `is_kotakberkas` VALUES ('B000055', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 13:46:00', '4', '2018-04-25 13:46:00');
INSERT INTO `is_kotakberkas` VALUES ('B000056', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 13:54:32', '4', '2018-04-25 13:54:32');
INSERT INTO `is_kotakberkas` VALUES ('B000057', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 14:19:05', '4', '2018-04-25 14:19:05');
INSERT INTO `is_kotakberkas` VALUES ('B000058', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 14:23:03', '4', '2018-04-25 14:23:03');
INSERT INTO `is_kotakberkas` VALUES ('B000059', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 14:51:17', '4', '2018-04-25 14:51:17');
INSERT INTO `is_kotakberkas` VALUES ('B000060', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 14:55:44', '4', '2018-04-25 14:55:44');
INSERT INTO `is_kotakberkas` VALUES ('B000061', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 15:25:37', '4', '2018-04-25 15:25:37');
INSERT INTO `is_kotakberkas` VALUES ('B000062', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 15:28:35', '4', '2018-04-25 15:28:35');
INSERT INTO `is_kotakberkas` VALUES ('B000063', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-26 14:33:44', '4', '2018-04-26 14:33:44');
INSERT INTO `is_kotakberkas` VALUES ('B000064', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-26 14:37:50', '4', '2018-04-26 14:37:50');
INSERT INTO `is_kotakberkas` VALUES ('B000065', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 15:03:56', '4', '2018-04-26 15:03:56');
INSERT INTO `is_kotakberkas` VALUES ('B000066', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 15:16:12', '4', '2018-04-26 15:16:12');
INSERT INTO `is_kotakberkas` VALUES ('B000067', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 15:39:18', '4', '2018-04-26 15:39:18');
INSERT INTO `is_kotakberkas` VALUES ('B000068', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 15:47:11', '4', '2018-04-26 15:47:11');
INSERT INTO `is_kotakberkas` VALUES ('B000069', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 16:07:31', '4', '2018-04-26 16:07:31');
INSERT INTO `is_kotakberkas` VALUES ('B000070', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 16:21:54', '4', '2018-04-26 16:21:54');
INSERT INTO `is_kotakberkas` VALUES ('B000071', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 16:54:25', '4', '2018-04-26 16:54:25');
INSERT INTO `is_kotakberkas` VALUES ('B000072', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 16:54:34', '4', '2018-04-26 16:54:34');
INSERT INTO `is_kotakberkas` VALUES ('B000073', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 14:03:08', '4', '2018-05-02 14:03:08');
INSERT INTO `is_kotakberkas` VALUES ('B000074', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 14:03:55', '4', '2018-05-02 14:03:55');
INSERT INTO `is_kotakberkas` VALUES ('B000075', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 14:32:46', '4', '2018-05-02 14:32:46');
INSERT INTO `is_kotakberkas` VALUES ('B000076', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 14:32:56', '4', '2018-05-02 14:32:56');
INSERT INTO `is_kotakberkas` VALUES ('B000077', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 15:04:50', '4', '2018-05-02 15:04:50');
INSERT INTO `is_kotakberkas` VALUES ('B000078', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 15:05:25', '4', '2018-05-02 15:05:25');
INSERT INTO `is_kotakberkas` VALUES ('B000079', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 15:29:23', '4', '2018-05-02 15:29:23');
INSERT INTO `is_kotakberkas` VALUES ('B000080', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 15:35:14', '4', '2018-05-02 15:35:14');
INSERT INTO `is_kotakberkas` VALUES ('B000081', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-02 15:55:45', '4', '2018-05-02 15:55:45');
INSERT INTO `is_kotakberkas` VALUES ('B000082', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-02 16:09:50', '4', '2018-05-02 16:09:50');
INSERT INTO `is_kotakberkas` VALUES ('B000083', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-02 16:40:35', '4', '2018-05-02 16:40:35');
INSERT INTO `is_kotakberkas` VALUES ('B000084', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-02 16:51:56', '4', '2018-05-02 16:51:56');
INSERT INTO `is_kotakberkas` VALUES ('B000085', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 13:32:36', '4', '2018-05-03 13:32:36');
INSERT INTO `is_kotakberkas` VALUES ('B000086', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 13:32:48', '4', '2018-05-03 13:32:48');
INSERT INTO `is_kotakberkas` VALUES ('B000087', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:11:25', '4', '2018-05-03 14:11:25');
INSERT INTO `is_kotakberkas` VALUES ('B000088', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:11:34', '4', '2018-05-03 14:11:34');
INSERT INTO `is_kotakberkas` VALUES ('B000089', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:31:51', '4', '2018-05-03 14:31:51');
INSERT INTO `is_kotakberkas` VALUES ('B000090', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:48:26', '4', '2018-05-03 14:48:26');
INSERT INTO `is_kotakberkas` VALUES ('B000091', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:52:49', '4', '2018-05-03 14:52:49');
INSERT INTO `is_kotakberkas` VALUES ('B000092', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:03:05', '4', '2018-05-03 15:03:05');
INSERT INTO `is_kotakberkas` VALUES ('B000093', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:07:05', '4', '2018-05-03 15:07:05');
INSERT INTO `is_kotakberkas` VALUES ('B000094', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:17:06', '4', '2018-05-03 15:17:06');
INSERT INTO `is_kotakberkas` VALUES ('B000095', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:18:58', '4', '2018-05-03 15:18:58');
INSERT INTO `is_kotakberkas` VALUES ('B000096', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:28:20', '4', '2018-05-03 15:28:20');
INSERT INTO `is_kotakberkas` VALUES ('B000097', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 15:35:11', '4', '2018-05-03 15:35:11');
INSERT INTO `is_kotakberkas` VALUES ('B000098', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 15:42:12', '4', '2018-05-03 15:42:12');
INSERT INTO `is_kotakberkas` VALUES ('B000099', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 15:56:31', '4', '2018-05-03 15:56:31');
INSERT INTO `is_kotakberkas` VALUES ('B000100', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 15:56:55', '4', '2018-05-03 15:56:55');
INSERT INTO `is_kotakberkas` VALUES ('B000101', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 16:13:29', '4', '2018-05-03 16:13:29');
INSERT INTO `is_kotakberkas` VALUES ('B000102', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 16:14:32', '4', '2018-05-03 16:14:32');
INSERT INTO `is_kotakberkas` VALUES ('B000103', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 16:31:20', '4', '2018-05-03 16:31:20');
INSERT INTO `is_kotakberkas` VALUES ('B000104', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 16:34:51', '4', '2018-05-03 16:34:51');
INSERT INTO `is_kotakberkas` VALUES ('B000105', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 09:42:09', '4', '2018-05-07 09:42:09');
INSERT INTO `is_kotakberkas` VALUES ('B000106', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 09:43:41', '4', '2018-05-07 09:43:41');
INSERT INTO `is_kotakberkas` VALUES ('B000107', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 09:59:24', '4', '2018-05-07 09:59:24');
INSERT INTO `is_kotakberkas` VALUES ('B000108', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 09:59:31', '4', '2018-05-07 09:59:31');
INSERT INTO `is_kotakberkas` VALUES ('B000109', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 10:18:00', '4', '2018-05-07 10:18:00');
INSERT INTO `is_kotakberkas` VALUES ('B000110', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 10:18:24', '4', '2018-05-07 10:18:24');
INSERT INTO `is_kotakberkas` VALUES ('B000111', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 10:34:35', '4', '2018-05-07 10:34:35');
INSERT INTO `is_kotakberkas` VALUES ('B000112', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 10:38:27', '4', '2018-05-07 10:38:27');
INSERT INTO `is_kotakberkas` VALUES ('B000113', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 10:52:13', '4', '2018-05-07 10:52:13');
INSERT INTO `is_kotakberkas` VALUES ('B000114', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 10:57:44', '4', '2018-05-07 10:57:44');
INSERT INTO `is_kotakberkas` VALUES ('B000115', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:10:19', '4', '2018-05-07 11:10:19');
INSERT INTO `is_kotakberkas` VALUES ('B000116', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:14:41', '4', '2018-05-07 11:14:41');
INSERT INTO `is_kotakberkas` VALUES ('B000117', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:26:52', '4', '2018-05-07 11:26:52');
INSERT INTO `is_kotakberkas` VALUES ('B000118', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:31:51', '4', '2018-05-07 11:31:51');
INSERT INTO `is_kotakberkas` VALUES ('B000119', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:45:22', '4', '2018-05-07 11:45:22');
INSERT INTO `is_kotakberkas` VALUES ('B000120', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:57:09', '4', '2018-05-07 11:57:09');
INSERT INTO `is_kotakberkas` VALUES ('B000121', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 12:59:49', '4', '2018-05-07 12:59:49');
INSERT INTO `is_kotakberkas` VALUES ('B000122', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:10:07', '4', '2018-05-07 13:10:07');
INSERT INTO `is_kotakberkas` VALUES ('B000123', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:17:43', '4', '2018-05-07 13:17:43');
INSERT INTO `is_kotakberkas` VALUES ('B000124', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:22:19', '4', '2018-05-07 13:22:19');
INSERT INTO `is_kotakberkas` VALUES ('B000125', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:33:49', '4', '2018-05-07 13:33:49');
INSERT INTO `is_kotakberkas` VALUES ('B000126', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:37:39', '4', '2018-05-07 13:37:39');
INSERT INTO `is_kotakberkas` VALUES ('B000127', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:49:30', '4', '2018-05-07 13:49:30');
INSERT INTO `is_kotakberkas` VALUES ('B000128', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:51:29', '4', '2018-05-07 13:51:29');
INSERT INTO `is_kotakberkas` VALUES ('B000129', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-07 14:03:46', '4', '2018-05-07 14:03:46');
INSERT INTO `is_kotakberkas` VALUES ('B000130', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-07 14:06:02', '4', '2018-05-07 14:06:02');
INSERT INTO `is_kotakberkas` VALUES ('B000131', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-07 14:18:59', '4', '2018-05-07 14:18:59');
INSERT INTO `is_kotakberkas` VALUES ('B000132', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-07 14:19:12', '4', '2018-05-07 14:19:12');
INSERT INTO `is_kotakberkas` VALUES ('B000133', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 13:55:39', '4', '2018-05-09 13:55:53');
INSERT INTO `is_kotakberkas` VALUES ('B000134', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:09:50', '4', '2018-05-09 14:09:50');
INSERT INTO `is_kotakberkas` VALUES ('B000135', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:40:48', '4', '2018-05-09 14:40:48');
INSERT INTO `is_kotakberkas` VALUES ('B000136', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:41:05', '4', '2018-05-09 14:41:05');
INSERT INTO `is_kotakberkas` VALUES ('B000137', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:51:18', '4', '2018-05-09 14:51:58');
INSERT INTO `is_kotakberkas` VALUES ('B000138', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:53:04', '4', '2018-05-09 14:53:04');
INSERT INTO `is_kotakberkas` VALUES ('B000139', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:04:05', '4', '2018-05-09 15:04:05');
INSERT INTO `is_kotakberkas` VALUES ('B000140', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:05:02', '4', '2018-05-09 15:05:02');
INSERT INTO `is_kotakberkas` VALUES ('B000141', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:22:12', '4', '2018-05-09 15:22:12');
INSERT INTO `is_kotakberkas` VALUES ('B000142', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:22:42', '4', '2018-05-09 15:22:42');
INSERT INTO `is_kotakberkas` VALUES ('B000143', 'C', '2', 'lain-lain', null, '4', '2018-05-09 15:24:43', '4', '2018-05-09 15:24:43');
INSERT INTO `is_kotakberkas` VALUES ('B000144', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:31:44', '4', '2018-05-09 15:32:10');
INSERT INTO `is_kotakberkas` VALUES ('B000145', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 15:43:21', '4', '2018-05-09 15:43:21');
INSERT INTO `is_kotakberkas` VALUES ('B000146', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 15:45:28', '4', '2018-05-09 15:45:28');
INSERT INTO `is_kotakberkas` VALUES ('B000147', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 15:58:45', '4', '2018-05-09 15:58:45');
INSERT INTO `is_kotakberkas` VALUES ('B000148', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:04:35', '4', '2018-05-09 16:04:35');
INSERT INTO `is_kotakberkas` VALUES ('B000149', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:07:29', '4', '2018-05-09 16:07:29');
INSERT INTO `is_kotakberkas` VALUES ('B000150', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:19:57', '4', '2018-05-09 16:19:57');
INSERT INTO `is_kotakberkas` VALUES ('B000151', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:22:26', '4', '2018-05-09 16:22:26');
INSERT INTO `is_kotakberkas` VALUES ('B000152', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:26:24', '4', '2018-05-09 16:26:24');
INSERT INTO `is_kotakberkas` VALUES ('B000153', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:26:35', '4', '2018-05-09 16:26:35');
INSERT INTO `is_kotakberkas` VALUES ('B000154', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:43:26', '4', '2018-05-09 16:43:26');
INSERT INTO `is_kotakberkas` VALUES ('B000155', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:44:16', '4', '2018-05-09 16:44:16');
INSERT INTO `is_kotakberkas` VALUES ('B000156', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:49:26', '4', '2018-05-09 16:49:26');
INSERT INTO `is_kotakberkas` VALUES ('B000157', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:59:50', '4', '2018-05-09 16:59:50');
INSERT INTO `is_kotakberkas` VALUES ('B000158', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 17:00:19', '4', '2018-05-09 17:00:19');
INSERT INTO `is_kotakberkas` VALUES ('B000159', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 17:12:57', '4', '2018-05-09 17:12:57');
INSERT INTO `is_kotakberkas` VALUES ('B000160', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 17:15:16', '4', '2018-05-09 17:15:16');
INSERT INTO `is_kotakberkas` VALUES ('B000161', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 08:47:49', '4', '2018-05-14 08:47:49');
INSERT INTO `is_kotakberkas` VALUES ('B000162', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 09:31:02', '4', '2018-05-14 09:31:02');
INSERT INTO `is_kotakberkas` VALUES ('B000163', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 10:01:43', '4', '2018-05-14 10:01:43');
INSERT INTO `is_kotakberkas` VALUES ('B000164', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 10:36:25', '4', '2018-05-14 10:36:25');
INSERT INTO `is_kotakberkas` VALUES ('B000165', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 11:08:40', '4', '2018-05-14 11:08:40');
INSERT INTO `is_kotakberkas` VALUES ('B000166', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 13:04:39', '4', '2018-05-14 13:04:39');
INSERT INTO `is_kotakberkas` VALUES ('B000167', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 13:31:22', '4', '2018-05-14 13:31:22');
INSERT INTO `is_kotakberkas` VALUES ('B000168', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 14:15:50', '4', '2018-05-14 14:15:50');
INSERT INTO `is_kotakberkas` VALUES ('B000169', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 14:45:47', '4', '2018-05-14 14:45:47');
INSERT INTO `is_kotakberkas` VALUES ('B000170', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 14:46:41', '4', '2018-05-14 14:46:41');
INSERT INTO `is_kotakberkas` VALUES ('B000171', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:03:13', '4', '2018-05-14 15:03:13');
INSERT INTO `is_kotakberkas` VALUES ('B000172', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:06:25', '4', '2018-05-14 15:06:25');
INSERT INTO `is_kotakberkas` VALUES ('B000173', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:16:43', '4', '2018-05-14 15:16:43');
INSERT INTO `is_kotakberkas` VALUES ('B000174', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:21:12', '4', '2018-05-14 15:21:12');
INSERT INTO `is_kotakberkas` VALUES ('B000175', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:27:16', '4', '2018-05-14 15:27:16');
INSERT INTO `is_kotakberkas` VALUES ('B000176', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:40:08', '4', '2018-05-14 15:40:08');
INSERT INTO `is_kotakberkas` VALUES ('B000177', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 15:47:51', '4', '2018-05-14 15:47:51');
INSERT INTO `is_kotakberkas` VALUES ('B000178', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 15:54:08', '4', '2018-05-14 15:54:08');
INSERT INTO `is_kotakberkas` VALUES ('B000179', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:00:03', '4', '2018-05-14 16:00:03');
INSERT INTO `is_kotakberkas` VALUES ('B000180', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:04:04', '4', '2018-05-14 16:04:04');
INSERT INTO `is_kotakberkas` VALUES ('B000181', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:13:32', '4', '2018-05-14 16:13:32');
INSERT INTO `is_kotakberkas` VALUES ('B000182', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:20:40', '4', '2018-05-14 16:20:40');
INSERT INTO `is_kotakberkas` VALUES ('B000183', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:49:43', '4', '2018-05-14 16:49:43');
INSERT INTO `is_kotakberkas` VALUES ('B000184', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:50:06', '4', '2018-05-14 16:50:06');
INSERT INTO `is_kotakberkas` VALUES ('B000185', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:58:06', '4', '2018-05-14 16:58:06');
INSERT INTO `is_kotakberkas` VALUES ('B000186', 'D', '1', 'LAIN - LAIN', null, '4', '2018-05-14 16:58:56', '4', '2018-05-14 16:58:56');
INSERT INTO `is_kotakberkas` VALUES ('B000187', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 17:00:56', '4', '2018-05-14 17:00:56');
INSERT INTO `is_kotakberkas` VALUES ('B000188', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 17:17:58', '4', '2018-05-14 17:17:58');
INSERT INTO `is_kotakberkas` VALUES ('B000189', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 17:21:34', '4', '2018-05-14 17:21:34');
INSERT INTO `is_kotakberkas` VALUES ('B000190', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 17:21:46', '4', '2018-05-14 17:21:46');
INSERT INTO `is_kotakberkas` VALUES ('B000191', 'D', '1', 'LAIN - LAIN', null, '4', '2018-05-15 07:54:21', '4', '2018-05-15 07:54:21');
INSERT INTO `is_kotakberkas` VALUES ('B000192', 'D', '1', 'LAIN - LAIN', null, '4', '2018-05-15 08:25:32', '4', '2018-05-15 08:25:32');
INSERT INTO `is_kotakberkas` VALUES ('B000193', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 08:55:10', '4', '2018-05-15 08:55:10');
INSERT INTO `is_kotakberkas` VALUES ('B000194', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 09:19:48', '4', '2018-05-15 09:19:48');
INSERT INTO `is_kotakberkas` VALUES ('B000195', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 09:53:42', '4', '2018-05-15 09:53:42');
INSERT INTO `is_kotakberkas` VALUES ('B000196', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 10:28:41', '4', '2018-05-15 10:28:41');
INSERT INTO `is_kotakberkas` VALUES ('B000197', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 10:56:45', '4', '2018-05-15 10:56:45');
INSERT INTO `is_kotakberkas` VALUES ('B000198', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 13:12:37', '4', '2018-05-15 13:12:37');
INSERT INTO `is_kotakberkas` VALUES ('B000199', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 13:36:52', '4', '2018-05-15 13:36:52');
INSERT INTO `is_kotakberkas` VALUES ('B000200', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 14:04:19', '4', '2018-05-15 14:04:19');
INSERT INTO `is_kotakberkas` VALUES ('B000201', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:28:46', '4', '2018-05-15 14:28:46');
INSERT INTO `is_kotakberkas` VALUES ('B000202', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:29:00', '4', '2018-05-15 14:29:00');
INSERT INTO `is_kotakberkas` VALUES ('B000203', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:29:11', '4', '2018-05-15 14:29:11');
INSERT INTO `is_kotakberkas` VALUES ('B000204', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:29:38', '4', '2018-05-15 14:29:38');
INSERT INTO `is_kotakberkas` VALUES ('B000205', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:54:45', '4', '2018-05-15 14:54:45');
INSERT INTO `is_kotakberkas` VALUES ('B000206', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:55:39', '4', '2018-05-15 14:55:39');
INSERT INTO `is_kotakberkas` VALUES ('B000207', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 15:15:31', '4', '2018-05-15 15:15:31');
INSERT INTO `is_kotakberkas` VALUES ('B000208', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 15:15:41', '4', '2018-05-15 15:15:41');
INSERT INTO `is_kotakberkas` VALUES ('B000209', 'D', '3', 'LAIN LAIN', null, '4', '2018-05-15 15:19:23', '4', '2018-05-15 15:21:26');
INSERT INTO `is_kotakberkas` VALUES ('B000210', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:20:32', '4', '2018-05-15 15:20:32');
INSERT INTO `is_kotakberkas` VALUES ('B000211', 'D', '3', 'LAIN - LAIN', null, '4', '2018-05-15 15:33:33', '4', '2018-05-15 15:33:33');
INSERT INTO `is_kotakberkas` VALUES ('B000212', 'D', '3', 'LAIN - LAIN', null, '4', '2018-05-15 15:34:10', '4', '2018-05-15 15:34:10');
INSERT INTO `is_kotakberkas` VALUES ('B000213', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:41:31', '4', '2018-05-15 15:41:31');
INSERT INTO `is_kotakberkas` VALUES ('B000214', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:41:40', '4', '2018-05-15 15:41:40');
INSERT INTO `is_kotakberkas` VALUES ('B000215', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:43:21', '4', '2018-05-15 15:43:21');
INSERT INTO `is_kotakberkas` VALUES ('B000216', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:43:41', '4', '2018-05-15 15:43:41');
INSERT INTO `is_kotakberkas` VALUES ('B000217', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:43:57', '4', '2018-05-15 15:43:57');
INSERT INTO `is_kotakberkas` VALUES ('B000218', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:47:46', '4', '2018-05-15 15:47:46');
INSERT INTO `is_kotakberkas` VALUES ('B000219', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:48:01', '4', '2018-05-15 15:48:01');
INSERT INTO `is_kotakberkas` VALUES ('B000220', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:48:18', '4', '2018-05-15 15:48:18');
INSERT INTO `is_kotakberkas` VALUES ('B000221', 'D', '3', 'LAIN - LAIN', null, '4', '2018-05-15 16:11:46', '4', '2018-05-15 16:11:46');
INSERT INTO `is_kotakberkas` VALUES ('B000222', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 16:16:58', '4', '2018-05-15 16:16:58');
INSERT INTO `is_kotakberkas` VALUES ('B000223', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 16:17:20', '4', '2018-05-15 16:17:20');
INSERT INTO `is_kotakberkas` VALUES ('B000224', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 16:17:33', '4', '2018-05-15 16:17:33');
INSERT INTO `is_kotakberkas` VALUES ('B000225', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 16:33:18', '4', '2018-05-15 16:33:18');
INSERT INTO `is_kotakberkas` VALUES ('B000226', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 16:33:27', '4', '2018-05-15 16:33:27');
INSERT INTO `is_kotakberkas` VALUES ('B000227', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 17:05:22', '4', '2018-05-15 17:05:22');
INSERT INTO `is_kotakberkas` VALUES ('B000228', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 17:05:42', '4', '2018-05-15 17:05:42');
INSERT INTO `is_kotakberkas` VALUES ('B000229', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 17:23:06', '4', '2018-05-15 17:23:06');
INSERT INTO `is_kotakberkas` VALUES ('B000230', 'D', '4', 'LAIN - LAIN', null, '4', '2018-05-16 08:41:00', '4', '2018-05-16 08:41:00');
INSERT INTO `is_kotakberkas` VALUES ('B000231', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:35:55', '4', '2018-05-16 09:35:55');
INSERT INTO `is_kotakberkas` VALUES ('B000232', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:36:08', '4', '2018-05-16 09:36:08');
INSERT INTO `is_kotakberkas` VALUES ('B000233', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:36:25', '4', '2018-05-16 09:36:25');
INSERT INTO `is_kotakberkas` VALUES ('B000234', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:37:43', '4', '2018-05-16 09:37:43');
INSERT INTO `is_kotakberkas` VALUES ('B000235', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:37:52', '4', '2018-05-16 09:37:52');
INSERT INTO `is_kotakberkas` VALUES ('B000236', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 10:12:17', '4', '2018-05-16 10:12:17');
INSERT INTO `is_kotakberkas` VALUES ('B000237', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 10:12:25', '4', '2018-05-16 10:12:25');
INSERT INTO `is_kotakberkas` VALUES ('B000238', 'D', '4', 'LAIN - LAIN', null, '4', '2018-05-16 10:12:40', '4', '2018-05-16 10:12:40');
INSERT INTO `is_kotakberkas` VALUES ('B000239', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 10:39:39', '4', '2018-05-16 11:16:20');
INSERT INTO `is_kotakberkas` VALUES ('B000240', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 10:41:49', '4', '2018-05-16 10:41:49');
INSERT INTO `is_kotakberkas` VALUES ('B000241', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 10:42:06', '4', '2018-05-16 10:42:06');
INSERT INTO `is_kotakberkas` VALUES ('B000242', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 11:06:08', '4', '2018-05-16 11:06:08');
INSERT INTO `is_kotakberkas` VALUES ('B000243', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 11:16:31', '4', '2018-05-16 11:16:31');
INSERT INTO `is_kotakberkas` VALUES ('B000244', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 11:16:47', '4', '2018-05-16 11:16:47');
INSERT INTO `is_kotakberkas` VALUES ('B000245', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 13:04:51', '4', '2018-05-16 13:04:51');
INSERT INTO `is_kotakberkas` VALUES ('B000246', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 13:05:11', '4', '2018-05-16 13:05:11');
INSERT INTO `is_kotakberkas` VALUES ('B000247', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 13:15:26', '4', '2018-05-16 13:48:30');
INSERT INTO `is_kotakberkas` VALUES ('B000248', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 13:50:37', '4', '2018-05-16 13:50:37');
INSERT INTO `is_kotakberkas` VALUES ('B000249', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-16 13:50:46', '4', '2018-05-16 13:50:46');
INSERT INTO `is_kotakberkas` VALUES ('B000250', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 14:18:11', '4', '2018-05-16 14:18:11');
INSERT INTO `is_kotakberkas` VALUES ('B000251', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 14:23:18', '4', '2018-05-16 14:23:18');
INSERT INTO `is_kotakberkas` VALUES ('B000252', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 14:46:05', '4', '2018-05-16 14:46:05');
INSERT INTO `is_kotakberkas` VALUES ('B000253', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-16 15:23:46', '4', '2018-05-16 15:23:46');
INSERT INTO `is_kotakberkas` VALUES ('B000254', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-17 08:05:20', '4', '2018-05-17 08:05:20');
INSERT INTO `is_kotakberkas` VALUES ('B000255', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-17 09:02:57', '4', '2018-05-17 09:02:57');
INSERT INTO `is_kotakberkas` VALUES ('B000256', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-17 09:50:15', '4', '2018-05-17 09:50:15');
INSERT INTO `is_kotakberkas` VALUES ('B000257', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-17 10:39:07', '4', '2018-05-17 10:39:07');
INSERT INTO `is_kotakberkas` VALUES ('B000258', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-17 11:21:19', '4', '2018-05-17 11:21:19');
INSERT INTO `is_kotakberkas` VALUES ('B000259', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-17 13:34:35', '4', '2018-05-17 13:34:35');
INSERT INTO `is_kotakberkas` VALUES ('B000260', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-17 14:21:57', '4', '2018-05-17 14:21:57');
INSERT INTO `is_kotakberkas` VALUES ('B000261', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 07:57:22', '4', '2018-05-18 07:57:22');
INSERT INTO `is_kotakberkas` VALUES ('B000262', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 08:35:16', '4', '2018-05-18 08:35:16');
INSERT INTO `is_kotakberkas` VALUES ('B000263', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 09:13:15', '4', '2018-05-18 09:13:15');
INSERT INTO `is_kotakberkas` VALUES ('B000264', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 09:55:24', '4', '2018-05-18 09:55:24');
INSERT INTO `is_kotakberkas` VALUES ('B000265', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 10:36:57', '4', '2018-05-18 10:36:57');
INSERT INTO `is_kotakberkas` VALUES ('B000266', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 13:14:09', '4', '2018-05-18 13:14:09');
INSERT INTO `is_kotakberkas` VALUES ('B000267', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 14:01:36', '4', '2018-05-18 14:01:36');
INSERT INTO `is_kotakberkas` VALUES ('B000268', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-21 07:46:08', '4', '2018-05-21 07:46:08');
INSERT INTO `is_kotakberkas` VALUES ('B000269', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-21 08:35:30', '4', '2018-05-21 08:35:30');
INSERT INTO `is_kotakberkas` VALUES ('B000270', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-21 09:22:21', '4', '2018-05-21 09:22:21');
INSERT INTO `is_kotakberkas` VALUES ('B000271', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-21 10:55:38', '4', '2018-05-21 10:55:38');
INSERT INTO `is_kotakberkas` VALUES ('B000272', 'E', '2', 'LAIN-LAIN', null, '4', '2018-05-21 13:42:43', '4', '2018-05-21 13:43:07');
INSERT INTO `is_kotakberkas` VALUES ('B000273', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:44:15', '4', '2018-05-21 13:44:15');
INSERT INTO `is_kotakberkas` VALUES ('B000274', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:44:32', '4', '2018-05-21 13:44:32');
INSERT INTO `is_kotakberkas` VALUES ('B000275', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:44:49', '4', '2018-05-21 13:44:49');
INSERT INTO `is_kotakberkas` VALUES ('B000276', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:45:02', '4', '2018-05-21 13:45:02');
INSERT INTO `is_kotakberkas` VALUES ('B000277', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:45:33', '4', '2018-05-21 13:45:33');
INSERT INTO `is_kotakberkas` VALUES ('B000278', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 14:32:49', '4', '2018-05-21 14:32:49');
INSERT INTO `is_kotakberkas` VALUES ('B000279', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:01:37', '4', '2018-05-21 15:01:37');
INSERT INTO `is_kotakberkas` VALUES ('B000280', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:14:11', '4', '2018-05-21 15:14:11');
INSERT INTO `is_kotakberkas` VALUES ('B000281', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:14:31', '4', '2018-05-21 15:14:31');
INSERT INTO `is_kotakberkas` VALUES ('B000282', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:14:52', '4', '2018-05-21 15:14:52');
INSERT INTO `is_kotakberkas` VALUES ('B000283', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:15:12', '4', '2018-05-21 15:15:12');
INSERT INTO `is_kotakberkas` VALUES ('B000284', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:15:25', '4', '2018-05-21 15:15:25');
INSERT INTO `is_kotakberkas` VALUES ('B000285', 'E', '3', 'STP TAHUN 2017', null, '4', '2018-05-23 08:07:04', '4', '2018-05-23 08:07:04');
INSERT INTO `is_kotakberkas` VALUES ('B000286', 'E', '3', 'STP TAHUN 2017', null, '4', '2018-05-24 10:43:13', '4', '2018-05-24 10:43:13');
INSERT INTO `is_kotakberkas` VALUES ('B000287', 'E', '3', 'STP TAHUN 2017', null, '4', '2018-05-28 10:45:19', '4', '2018-06-05 11:03:58');
INSERT INTO `is_kotakberkas` VALUES ('B000288', 'E', '3', 'STP TAHUN 2017', null, '4', '2018-06-04 09:20:23', '4', '2018-06-04 09:20:23');
INSERT INTO `is_kotakberkas` VALUES ('B000289', 'E', '4', 'STP TAHUN 2017', null, '4', '2018-06-05 13:09:21', '4', '2018-06-05 13:09:21');
INSERT INTO `is_kotakberkas` VALUES ('B000290', 'E', '4', 'STP TAHUN 2017', null, '4', '2018-06-08 07:54:20', '4', '2018-06-08 07:54:20');
INSERT INTO `is_kotakberkas` VALUES ('B000291', 'E', '4', 'STP TAHUN 2017', null, '4', '2018-06-25 11:23:36', '4', '2018-06-25 11:23:36');
INSERT INTO `is_kotakberkas` VALUES ('B000292', 'E', '4', 'STP SKPKB', null, '4', '2018-08-03 09:23:56', '4', '2018-08-03 09:23:56');
INSERT INTO `is_kotakberkas` VALUES ('B000293', 'E', '04', 'STP SKPKB', null, '4', '2018-08-13 10:20:54', '4', '2018-08-13 10:20:54');
INSERT INTO `is_kotakberkas` VALUES ('B000294', 'E', '04', 'STP SKPKB', null, '4', '2018-08-30 09:04:38', '4', '2018-08-30 09:04:38');

-- ----------------------------
-- Table structure for `is_kotakberkas_copy`
-- ----------------------------
DROP TABLE IF EXISTS `is_kotakberkas_copy`;
CREATE TABLE `is_kotakberkas_copy` (
  `kode_kotakberkas` varchar(7) NOT NULL,
  `kode_lemari` varchar(2) NOT NULL,
  `kode_rak` varchar(2) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `arsip_kotakberkas` varchar(255) DEFAULT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_kotakberkas`) USING BTREE,
  KEY `created_user` (`created_user`) USING BTREE,
  KEY `updated_user` (`updated_user`) USING BTREE,
  CONSTRAINT `is_kotakberkas_copy_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_kotakberkas_copy_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of is_kotakberkas_copy
-- ----------------------------
INSERT INTO `is_kotakberkas_copy` VALUES ('B000001', 'A', '1', 'berisi 72 map berkas Wajib Pajak', null, '4', '2018-04-11 07:33:10', '4', '2018-04-12 09:07:30');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000002', 'A', '1', 'LAIN-LAIN', null, '4', '2018-04-13 14:23:47', '4', '2018-04-13 14:23:47');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000003', 'A', '1', 'berisi 67 map berkas Wajib Pajak', null, '4', '2018-04-13 14:29:56', '4', '2018-04-14 13:32:24');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000004', 'A', '1', 'LAIN-LAIN', null, '4', '2018-04-13 16:15:10', '4', '2018-04-13 16:15:10');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000005', 'A', '1', 'berisi 72 map berkas Wajib Pajak', null, '4', '2018-04-13 16:15:32', '4', '2018-04-14 13:33:12');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000006', 'A', '1', 'BERISI 128 MAP BERKAS WAJIB PAJAK', null, '4', '2018-04-16 10:54:17', '4', '2018-04-16 13:43:41');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000007', 'A', '1', 'LAIN-LAIN', null, '4', '2018-04-16 10:54:39', '4', '2018-04-16 10:54:39');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000008', 'A', '1', 'LAIN-LAIN berisi 79 Wajib Pajak', null, '4', '2018-04-16 13:46:09', '4', '2018-04-19 08:09:19');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000009', 'A', '1', 'BERISI 77 MAP BERKAS WAJIB PAJAK', null, '4', '2018-04-16 13:49:11', '4', '2018-04-16 14:55:42');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000010', 'A', '1', 'LAIN-LAIN berisi 92 map berkas Wajib Pajak', null, '4', '2018-04-16 14:47:22', '4', '2018-04-19 08:08:35');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000011', 'A', '1', 'BERISI 104 MAP BERKAS WAJIB PAJAK', null, '4', '2018-04-16 14:59:59', '4', '2018-04-16 16:00:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000012', 'A', '1', 'LAIN-LAIN', null, '4', '2018-04-17 12:41:58', '4', '2018-04-17 12:41:58');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000013', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-17 12:42:46', '4', '2018-04-17 12:42:46');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000014', 'A', '2', 'BERISI 46 MAP BERKAS WAJIB PAJAK', null, '4', '2018-04-17 12:43:08', '4', '2018-04-17 13:13:27');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000015', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-17 13:16:02', '4', '2018-04-17 13:16:02');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000016', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-17 13:54:58', '4', '2018-04-17 13:54:58');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000017', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-19 14:42:58', '4', '2018-04-19 14:42:58');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000018', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-19 15:15:25', '4', '2018-04-19 15:15:25');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000019', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-19 15:50:20', '4', '2018-04-19 15:50:20');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000020', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-19 15:53:31', '4', '2018-04-19 15:53:31');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000021', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-23 10:40:14', '4', '2018-04-23 10:40:14');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000022', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-23 10:41:03', '4', '2018-04-23 10:41:03');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000023', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-23 11:09:40', '4', '2018-04-23 11:09:40');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000024', 'A', '2', 'LAIN-LAIN', null, '4', '2018-04-23 11:25:15', '4', '2018-04-23 11:25:15');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000025', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 11:50:31', '4', '2018-04-23 11:50:31');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000026', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 12:59:32', '4', '2018-04-23 12:59:32');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000027', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 13:20:40', '4', '2018-04-23 13:20:40');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000028', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 13:36:24', '4', '2018-04-23 13:36:24');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000029', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 13:54:11', '4', '2018-04-23 13:54:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000030', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 14:17:04', '4', '2018-04-23 14:17:04');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000031', 'A', '3', 'LAIN-LAINS', null, '4', '2018-04-23 14:29:07', '4', '2018-04-23 14:31:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000032', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 14:51:19', '4', '2018-04-23 14:51:19');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000033', 'a', '3', 'lain-lain', null, '4', '2018-04-23 15:26:27', '4', '2018-04-23 15:26:27');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000034', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 15:28:44', '4', '2018-04-23 15:28:44');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000035', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 16:03:15', '4', '2018-04-23 16:03:15');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000036', 'A', '3', 'LAIN-LAIN', null, '4', '2018-04-23 16:10:11', '4', '2018-04-23 16:10:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000037', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 10:32:33', '4', '2018-04-24 10:32:33');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000038', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 10:33:41', '4', '2018-04-24 10:33:41');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000039', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 11:00:19', '4', '2018-04-24 11:00:19');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000040', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 11:01:16', '4', '2018-04-24 11:01:16');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000041', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 11:23:47', '4', '2018-04-24 11:23:47');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000042', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 11:24:36', '4', '2018-04-24 11:24:36');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000043', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 13:07:27', '4', '2018-04-24 13:07:27');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000044', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 13:08:43', '4', '2018-04-24 13:08:43');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000045', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 13:37:22', '4', '2018-04-24 13:37:22');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000046', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 13:38:57', '4', '2018-04-24 13:38:57');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000047', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 14:06:29', '4', '2018-04-24 14:06:29');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000048', 'A', '4', 'LAIN-LAIN', null, '4', '2018-04-24 14:07:08', '4', '2018-04-24 14:07:08');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000049', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 11:21:07', '4', '2018-04-25 11:46:05');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000050', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 11:24:58', '4', '2018-04-25 11:24:58');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000051', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 11:45:51', '4', '2018-04-25 11:45:51');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000052', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 11:50:26', '4', '2018-04-25 11:50:26');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000053', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 13:21:45', '4', '2018-04-25 13:21:45');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000054', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 13:22:03', '4', '2018-04-25 13:22:03');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000055', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 13:46:00', '4', '2018-04-25 13:46:00');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000056', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 13:54:32', '4', '2018-04-25 13:54:32');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000057', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 14:19:05', '4', '2018-04-25 14:19:05');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000058', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 14:23:03', '4', '2018-04-25 14:23:03');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000059', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 14:51:17', '4', '2018-04-25 14:51:17');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000060', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 14:55:44', '4', '2018-04-25 14:55:44');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000061', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 15:25:37', '4', '2018-04-25 15:25:37');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000062', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-25 15:28:35', '4', '2018-04-25 15:28:35');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000063', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-26 14:33:44', '4', '2018-04-26 14:33:44');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000064', 'B', '1', 'LAIN-LAIN', null, '4', '2018-04-26 14:37:50', '4', '2018-04-26 14:37:50');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000065', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 15:03:56', '4', '2018-04-26 15:03:56');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000066', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 15:16:12', '4', '2018-04-26 15:16:12');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000067', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 15:39:18', '4', '2018-04-26 15:39:18');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000068', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 15:47:11', '4', '2018-04-26 15:47:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000069', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 16:07:31', '4', '2018-04-26 16:07:31');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000070', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 16:21:54', '4', '2018-04-26 16:21:54');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000071', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 16:54:25', '4', '2018-04-26 16:54:25');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000072', 'B', '2', 'LAIN-LAIN', null, '4', '2018-04-26 16:54:34', '4', '2018-04-26 16:54:34');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000073', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 14:03:08', '4', '2018-05-02 14:03:08');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000074', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 14:03:55', '4', '2018-05-02 14:03:55');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000075', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 14:32:46', '4', '2018-05-02 14:32:46');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000076', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 14:32:56', '4', '2018-05-02 14:32:56');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000077', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 15:04:50', '4', '2018-05-02 15:04:50');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000078', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 15:05:25', '4', '2018-05-02 15:05:25');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000079', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 15:29:23', '4', '2018-05-02 15:29:23');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000080', 'B', '2', 'LAIN-LAIN', null, '4', '2018-05-02 15:35:14', '4', '2018-05-02 15:35:14');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000081', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-02 15:55:45', '4', '2018-05-02 15:55:45');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000082', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-02 16:09:50', '4', '2018-05-02 16:09:50');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000083', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-02 16:40:35', '4', '2018-05-02 16:40:35');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000084', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-02 16:51:56', '4', '2018-05-02 16:51:56');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000085', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 13:32:36', '4', '2018-05-03 13:32:36');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000086', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 13:32:48', '4', '2018-05-03 13:32:48');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000087', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:11:25', '4', '2018-05-03 14:11:25');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000088', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:11:34', '4', '2018-05-03 14:11:34');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000089', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:31:51', '4', '2018-05-03 14:31:51');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000090', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:48:26', '4', '2018-05-03 14:48:26');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000091', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 14:52:49', '4', '2018-05-03 14:52:49');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000092', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:03:05', '4', '2018-05-03 15:03:05');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000093', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:07:05', '4', '2018-05-03 15:07:05');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000094', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:17:06', '4', '2018-05-03 15:17:06');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000095', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:18:58', '4', '2018-05-03 15:18:58');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000096', 'B', '3', 'LAIN-LAIN', null, '4', '2018-05-03 15:28:20', '4', '2018-05-03 15:28:20');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000097', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 15:35:11', '4', '2018-05-03 15:35:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000098', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 15:42:12', '4', '2018-05-03 15:42:12');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000099', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 15:56:31', '4', '2018-05-03 15:56:31');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000100', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 15:56:55', '4', '2018-05-03 15:56:55');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000101', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 16:13:29', '4', '2018-05-03 16:13:29');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000102', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 16:14:32', '4', '2018-05-03 16:14:32');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000103', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 16:31:20', '4', '2018-05-03 16:31:20');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000104', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-03 16:34:51', '4', '2018-05-03 16:34:51');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000105', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 09:42:09', '4', '2018-05-07 09:42:09');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000106', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 09:43:41', '4', '2018-05-07 09:43:41');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000107', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 09:59:24', '4', '2018-05-07 09:59:24');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000108', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 09:59:31', '4', '2018-05-07 09:59:31');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000109', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 10:18:00', '4', '2018-05-07 10:18:00');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000110', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 10:18:24', '4', '2018-05-07 10:18:24');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000111', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 10:34:35', '4', '2018-05-07 10:34:35');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000112', 'B', '4', 'LAIN-LAIN', null, '4', '2018-05-07 10:38:27', '4', '2018-05-07 10:38:27');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000113', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 10:52:13', '4', '2018-05-07 10:52:13');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000114', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 10:57:44', '4', '2018-05-07 10:57:44');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000115', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:10:19', '4', '2018-05-07 11:10:19');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000116', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:14:41', '4', '2018-05-07 11:14:41');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000117', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:26:52', '4', '2018-05-07 11:26:52');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000118', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:31:51', '4', '2018-05-07 11:31:51');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000119', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:45:22', '4', '2018-05-07 11:45:22');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000120', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 11:57:09', '4', '2018-05-07 11:57:09');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000121', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 12:59:49', '4', '2018-05-07 12:59:49');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000122', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:10:07', '4', '2018-05-07 13:10:07');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000123', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:17:43', '4', '2018-05-07 13:17:43');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000124', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:22:19', '4', '2018-05-07 13:22:19');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000125', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:33:49', '4', '2018-05-07 13:33:49');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000126', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:37:39', '4', '2018-05-07 13:37:39');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000127', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:49:30', '4', '2018-05-07 13:49:30');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000128', 'C', '1', 'LAIN-LAIN', null, '4', '2018-05-07 13:51:29', '4', '2018-05-07 13:51:29');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000129', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-07 14:03:46', '4', '2018-05-07 14:03:46');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000130', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-07 14:06:02', '4', '2018-05-07 14:06:02');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000131', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-07 14:18:59', '4', '2018-05-07 14:18:59');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000132', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-07 14:19:12', '4', '2018-05-07 14:19:12');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000133', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 13:55:39', '4', '2018-05-09 13:55:53');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000134', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:09:50', '4', '2018-05-09 14:09:50');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000135', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:40:48', '4', '2018-05-09 14:40:48');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000136', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:41:05', '4', '2018-05-09 14:41:05');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000137', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:51:18', '4', '2018-05-09 14:51:58');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000138', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 14:53:04', '4', '2018-05-09 14:53:04');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000139', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:04:05', '4', '2018-05-09 15:04:05');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000140', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:05:02', '4', '2018-05-09 15:05:02');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000141', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:22:12', '4', '2018-05-09 15:22:12');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000142', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:22:42', '4', '2018-05-09 15:22:42');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000143', 'C', '2', 'lain-lain', null, '4', '2018-05-09 15:24:43', '4', '2018-05-09 15:24:43');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000144', 'C', '2', 'LAIN-LAIN', null, '4', '2018-05-09 15:31:44', '4', '2018-05-09 15:32:10');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000145', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 15:43:21', '4', '2018-05-09 15:43:21');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000146', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 15:45:28', '4', '2018-05-09 15:45:28');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000147', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 15:58:45', '4', '2018-05-09 15:58:45');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000148', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:04:35', '4', '2018-05-09 16:04:35');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000149', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:07:29', '4', '2018-05-09 16:07:29');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000150', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:19:57', '4', '2018-05-09 16:19:57');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000151', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:22:26', '4', '2018-05-09 16:22:26');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000152', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:26:24', '4', '2018-05-09 16:26:24');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000153', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:26:35', '4', '2018-05-09 16:26:35');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000154', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:43:26', '4', '2018-05-09 16:43:26');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000155', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:44:16', '4', '2018-05-09 16:44:16');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000156', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:49:26', '4', '2018-05-09 16:49:26');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000157', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 16:59:50', '4', '2018-05-09 16:59:50');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000158', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 17:00:19', '4', '2018-05-09 17:00:19');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000159', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 17:12:57', '4', '2018-05-09 17:12:57');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000160', 'C', '3', 'LAIN-LAIN', null, '4', '2018-05-09 17:15:16', '4', '2018-05-09 17:15:16');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000161', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 08:47:49', '4', '2018-05-14 08:47:49');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000162', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 09:31:02', '4', '2018-05-14 09:31:02');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000163', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 10:01:43', '4', '2018-05-14 10:01:43');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000164', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 10:36:25', '4', '2018-05-14 10:36:25');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000165', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 11:08:40', '4', '2018-05-14 11:08:40');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000166', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 13:04:39', '4', '2018-05-14 13:04:39');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000167', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 13:31:22', '4', '2018-05-14 13:31:22');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000168', 'C', '4', 'LAIN - LAIN', null, '4', '2018-05-14 14:15:50', '4', '2018-05-14 14:15:50');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000169', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 14:45:47', '4', '2018-05-14 14:45:47');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000170', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 14:46:41', '4', '2018-05-14 14:46:41');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000171', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:03:13', '4', '2018-05-14 15:03:13');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000172', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:06:25', '4', '2018-05-14 15:06:25');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000173', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:16:43', '4', '2018-05-14 15:16:43');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000174', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:21:12', '4', '2018-05-14 15:21:12');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000175', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:27:16', '4', '2018-05-14 15:27:16');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000176', 'C', '4', 'LAIN-LAIN', null, '4', '2018-05-14 15:40:08', '4', '2018-05-14 15:40:08');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000177', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 15:47:51', '4', '2018-05-14 15:47:51');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000178', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 15:54:08', '4', '2018-05-14 15:54:08');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000179', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:00:03', '4', '2018-05-14 16:00:03');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000180', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:04:04', '4', '2018-05-14 16:04:04');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000181', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:13:32', '4', '2018-05-14 16:13:32');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000182', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:20:40', '4', '2018-05-14 16:20:40');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000183', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:49:43', '4', '2018-05-14 16:49:43');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000184', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:50:06', '4', '2018-05-14 16:50:06');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000185', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 16:58:06', '4', '2018-05-14 16:58:06');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000186', 'D', '1', 'LAIN - LAIN', null, '4', '2018-05-14 16:58:56', '4', '2018-05-14 16:58:56');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000187', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 17:00:56', '4', '2018-05-14 17:00:56');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000188', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 17:17:58', '4', '2018-05-14 17:17:58');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000189', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 17:21:34', '4', '2018-05-14 17:21:34');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000190', 'D', '1', 'LAIN-LAIN', null, '4', '2018-05-14 17:21:46', '4', '2018-05-14 17:21:46');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000191', 'D', '1', 'LAIN - LAIN', null, '4', '2018-05-15 07:54:21', '4', '2018-05-15 07:54:21');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000192', 'D', '1', 'LAIN - LAIN', null, '4', '2018-05-15 08:25:32', '4', '2018-05-15 08:25:32');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000193', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 08:55:10', '4', '2018-05-15 08:55:10');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000194', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 09:19:48', '4', '2018-05-15 09:19:48');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000195', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 09:53:42', '4', '2018-05-15 09:53:42');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000196', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 10:28:41', '4', '2018-05-15 10:28:41');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000197', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 10:56:45', '4', '2018-05-15 10:56:45');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000198', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 13:12:37', '4', '2018-05-15 13:12:37');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000199', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 13:36:52', '4', '2018-05-15 13:36:52');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000200', 'D', '2', 'LAIN - LAIN', null, '4', '2018-05-15 14:04:19', '4', '2018-05-15 14:04:19');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000201', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:28:46', '4', '2018-05-15 14:28:46');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000202', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:29:00', '4', '2018-05-15 14:29:00');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000203', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:29:11', '4', '2018-05-15 14:29:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000204', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:29:38', '4', '2018-05-15 14:29:38');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000205', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:54:45', '4', '2018-05-15 14:54:45');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000206', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 14:55:39', '4', '2018-05-15 14:55:39');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000207', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 15:15:31', '4', '2018-05-15 15:15:31');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000208', 'D', '2', 'LAIN-LAIN', null, '4', '2018-05-15 15:15:41', '4', '2018-05-15 15:15:41');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000209', 'D', '3', 'LAIN LAIN', null, '4', '2018-05-15 15:19:23', '4', '2018-05-15 15:21:26');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000210', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:20:32', '4', '2018-05-15 15:20:32');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000211', 'D', '3', 'LAIN - LAIN', null, '4', '2018-05-15 15:33:33', '4', '2018-05-15 15:33:33');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000212', 'D', '3', 'LAIN - LAIN', null, '4', '2018-05-15 15:34:10', '4', '2018-05-15 15:34:10');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000213', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:41:31', '4', '2018-05-15 15:41:31');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000214', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:41:40', '4', '2018-05-15 15:41:40');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000215', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:43:21', '4', '2018-05-15 15:43:21');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000216', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:43:41', '4', '2018-05-15 15:43:41');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000217', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:43:57', '4', '2018-05-15 15:43:57');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000218', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:47:46', '4', '2018-05-15 15:47:46');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000219', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:48:01', '4', '2018-05-15 15:48:01');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000220', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 15:48:18', '4', '2018-05-15 15:48:18');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000221', 'D', '3', 'LAIN - LAIN', null, '4', '2018-05-15 16:11:46', '4', '2018-05-15 16:11:46');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000222', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 16:16:58', '4', '2018-05-15 16:16:58');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000223', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 16:17:20', '4', '2018-05-15 16:17:20');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000224', 'D', '3', 'LAIN-LAIN', null, '4', '2018-05-15 16:17:33', '4', '2018-05-15 16:17:33');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000225', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 16:33:18', '4', '2018-05-15 16:33:18');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000226', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 16:33:27', '4', '2018-05-15 16:33:27');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000227', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 17:05:22', '4', '2018-05-15 17:05:22');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000228', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 17:05:42', '4', '2018-05-15 17:05:42');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000229', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-15 17:23:06', '4', '2018-05-15 17:23:06');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000230', 'D', '4', 'LAIN - LAIN', null, '4', '2018-05-16 08:41:00', '4', '2018-05-16 08:41:00');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000231', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:35:55', '4', '2018-05-16 09:35:55');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000232', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:36:08', '4', '2018-05-16 09:36:08');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000233', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:36:25', '4', '2018-05-16 09:36:25');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000234', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:37:43', '4', '2018-05-16 09:37:43');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000235', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 09:37:52', '4', '2018-05-16 09:37:52');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000236', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 10:12:17', '4', '2018-05-16 10:12:17');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000237', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 10:12:25', '4', '2018-05-16 10:12:25');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000238', 'D', '4', 'LAIN - LAIN', null, '4', '2018-05-16 10:12:40', '4', '2018-05-16 10:12:40');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000239', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 10:39:39', '4', '2018-05-16 11:16:20');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000240', 'D', '4', 'LAIN-LAIN', null, '4', '2018-05-16 10:41:49', '4', '2018-05-16 10:41:49');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000241', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 10:42:06', '4', '2018-05-16 10:42:06');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000242', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 11:06:08', '4', '2018-05-16 11:06:08');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000243', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 11:16:31', '4', '2018-05-16 11:16:31');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000244', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 11:16:47', '4', '2018-05-16 11:16:47');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000245', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 13:04:51', '4', '2018-05-16 13:04:51');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000246', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 13:05:11', '4', '2018-05-16 13:05:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000247', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 13:15:26', '4', '2018-05-16 13:48:30');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000248', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 13:50:37', '4', '2018-05-16 13:50:37');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000249', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-16 13:50:46', '4', '2018-05-16 13:50:46');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000250', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 14:18:11', '4', '2018-05-16 14:18:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000251', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 14:23:18', '4', '2018-05-16 14:23:18');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000252', 'E', '1', 'LAIN-LAIN', null, '4', '2018-05-16 14:46:05', '4', '2018-05-16 14:46:05');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000253', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-16 15:23:46', '4', '2018-05-16 15:23:46');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000254', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-17 08:05:20', '4', '2018-05-17 08:05:20');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000255', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-17 09:02:57', '4', '2018-05-17 09:02:57');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000256', 'E', '1', 'LAIN - LAIN', null, '4', '2018-05-17 09:50:15', '4', '2018-05-17 09:50:15');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000257', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-17 10:39:07', '4', '2018-05-17 10:39:07');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000258', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-17 11:21:19', '4', '2018-05-17 11:21:19');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000259', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-17 13:34:35', '4', '2018-05-17 13:34:35');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000260', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-17 14:21:57', '4', '2018-05-17 14:21:57');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000261', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 07:57:22', '4', '2018-05-18 07:57:22');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000262', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 08:35:16', '4', '2018-05-18 08:35:16');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000263', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 09:13:15', '4', '2018-05-18 09:13:15');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000264', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 09:55:24', '4', '2018-05-18 09:55:24');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000265', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 10:36:57', '4', '2018-05-18 10:36:57');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000266', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 13:14:09', '4', '2018-05-18 13:14:09');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000267', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-18 14:01:36', '4', '2018-05-18 14:01:36');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000268', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-21 07:46:08', '4', '2018-05-21 07:46:08');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000269', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-21 08:35:30', '4', '2018-05-21 08:35:30');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000270', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-21 09:22:21', '4', '2018-05-21 09:22:21');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000271', 'E', '2', 'LAIN - LAIN', null, '4', '2018-05-21 10:55:38', '4', '2018-05-21 10:55:38');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000272', 'E', '2', 'LAIN-LAIN', null, '4', '2018-05-21 13:42:43', '4', '2018-05-21 13:43:07');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000273', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:44:15', '4', '2018-05-21 13:44:15');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000274', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:44:32', '4', '2018-05-21 13:44:32');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000275', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:44:49', '4', '2018-05-21 13:44:49');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000276', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:45:02', '4', '2018-05-21 13:45:02');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000277', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 13:45:33', '4', '2018-05-21 13:45:33');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000278', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 14:32:49', '4', '2018-05-21 14:32:49');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000279', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:01:37', '4', '2018-05-21 15:01:37');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000280', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:14:11', '4', '2018-05-21 15:14:11');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000281', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:14:31', '4', '2018-05-21 15:14:31');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000282', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:14:52', '4', '2018-05-21 15:14:52');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000283', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:15:12', '4', '2018-05-21 15:15:12');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000284', 'E', '3', 'LAIN-LAIN', null, '4', '2018-05-21 15:15:25', '4', '2018-05-21 15:15:25');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000285', 'E', '3', 'STP TAHUN 2017', null, '4', '2018-05-23 08:07:04', '4', '2018-05-23 08:07:04');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000286', 'E', '3', 'STP TAHUN 2017', null, '4', '2018-05-24 10:43:13', '4', '2018-05-24 10:43:13');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000287', 'E', '3', 'STP TAHUN 2017', null, '4', '2018-05-28 10:45:19', '4', '2018-06-05 11:03:58');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000288', 'E', '3', 'STP TAHUN 2017', null, '4', '2018-06-04 09:20:23', '4', '2018-06-04 09:20:23');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000289', 'E', '4', 'STP TAHUN 2017', null, '4', '2018-06-05 13:09:21', '4', '2018-06-05 13:09:21');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000290', 'E', '4', 'STP TAHUN 2017', null, '4', '2018-06-08 07:54:20', '4', '2018-06-08 07:54:20');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000291', 'E', '4', 'STP TAHUN 2017', null, '4', '2018-06-25 11:23:36', '4', '2018-06-25 11:23:36');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000292', 'E', '4', 'STP SKPKB', null, '4', '2018-08-03 09:23:56', '4', '2018-08-03 09:23:56');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000293', 'E', '04', 'STP SKPKB', null, '4', '2018-08-13 10:20:54', '4', '2018-08-13 10:20:54');
INSERT INTO `is_kotakberkas_copy` VALUES ('B000294', 'E', '04', 'STP SKPKB', null, '4', '2018-08-30 09:04:38', '4', '2018-08-30 09:04:38');

-- ----------------------------
-- Table structure for `is_kotakberkas_copy_ori`
-- ----------------------------
DROP TABLE IF EXISTS `is_kotakberkas_copy_ori`;
CREATE TABLE `is_kotakberkas_copy_ori` (
  `kode_kotakberkas` varchar(7) NOT NULL,
  `kode_lemari` varchar(2) NOT NULL,
  `kode_rak` varchar(2) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode_kotakberkas`) USING BTREE,
  KEY `created_user` (`created_user`) USING BTREE,
  KEY `updated_user` (`updated_user`) USING BTREE,
  CONSTRAINT `is_kotakberkas_copy_ori_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_kotakberkas_copy_ori_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of is_kotakberkas_copy_ori
-- ----------------------------
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000001', 'A', '1', 'berisi 72 map berkas Wajib Pajak', '4', '2018-04-11 07:33:10', '4', '2018-04-12 09:07:30');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000002', 'A', '1', 'LAIN-LAIN', '4', '2018-04-13 14:23:47', '4', '2018-04-13 14:23:47');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000003', 'A', '1', 'berisi 67 map berkas Wajib Pajak', '4', '2018-04-13 14:29:56', '4', '2018-04-14 13:32:24');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000004', 'A', '1', 'LAIN-LAIN', '4', '2018-04-13 16:15:10', '4', '2018-04-13 16:15:10');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000005', 'A', '1', 'berisi 72 map berkas Wajib Pajak', '4', '2018-04-13 16:15:32', '4', '2018-04-14 13:33:12');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000006', 'A', '1', 'BERISI 128 MAP BERKAS WAJIB PAJAK', '4', '2018-04-16 10:54:17', '4', '2018-04-16 13:43:41');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000007', 'A', '1', 'LAIN-LAIN', '4', '2018-04-16 10:54:39', '4', '2018-04-16 10:54:39');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000008', 'A', '1', 'LAIN-LAIN berisi 79 Wajib Pajak', '4', '2018-04-16 13:46:09', '4', '2018-04-19 08:09:19');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000009', 'A', '1', 'BERISI 77 MAP BERKAS WAJIB PAJAK', '4', '2018-04-16 13:49:11', '4', '2018-04-16 14:55:42');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000010', 'A', '1', 'LAIN-LAIN berisi 92 map berkas Wajib Pajak', '4', '2018-04-16 14:47:22', '4', '2018-04-19 08:08:35');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000011', 'A', '1', 'BERISI 104 MAP BERKAS WAJIB PAJAK', '4', '2018-04-16 14:59:59', '4', '2018-04-16 16:00:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000012', 'A', '1', 'LAIN-LAIN', '4', '2018-04-17 12:41:58', '4', '2018-04-17 12:41:58');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000013', 'A', '2', 'LAIN-LAIN', '4', '2018-04-17 12:42:46', '4', '2018-04-17 12:42:46');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000014', 'A', '2', 'BERISI 46 MAP BERKAS WAJIB PAJAK', '4', '2018-04-17 12:43:08', '4', '2018-04-17 13:13:27');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000015', 'A', '2', 'LAIN-LAIN', '4', '2018-04-17 13:16:02', '4', '2018-04-17 13:16:02');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000016', 'A', '2', 'LAIN-LAIN', '4', '2018-04-17 13:54:58', '4', '2018-04-17 13:54:58');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000017', 'A', '2', 'LAIN-LAIN', '4', '2018-04-19 14:42:58', '4', '2018-04-19 14:42:58');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000018', 'A', '2', 'LAIN-LAIN', '4', '2018-04-19 15:15:25', '4', '2018-04-19 15:15:25');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000019', 'A', '2', 'LAIN-LAIN', '4', '2018-04-19 15:50:20', '4', '2018-04-19 15:50:20');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000020', 'A', '2', 'LAIN-LAIN', '4', '2018-04-19 15:53:31', '4', '2018-04-19 15:53:31');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000021', 'A', '2', 'LAIN-LAIN', '4', '2018-04-23 10:40:14', '4', '2018-04-23 10:40:14');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000022', 'A', '2', 'LAIN-LAIN', '4', '2018-04-23 10:41:03', '4', '2018-04-23 10:41:03');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000023', 'A', '2', 'LAIN-LAIN', '4', '2018-04-23 11:09:40', '4', '2018-04-23 11:09:40');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000024', 'A', '2', 'LAIN-LAIN', '4', '2018-04-23 11:25:15', '4', '2018-04-23 11:25:15');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000025', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 11:50:31', '4', '2018-04-23 11:50:31');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000026', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 12:59:32', '4', '2018-04-23 12:59:32');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000027', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 13:20:40', '4', '2018-04-23 13:20:40');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000028', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 13:36:24', '4', '2018-04-23 13:36:24');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000029', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 13:54:11', '4', '2018-04-23 13:54:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000030', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 14:17:04', '4', '2018-04-23 14:17:04');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000031', 'A', '3', 'LAIN-LAINS', '4', '2018-04-23 14:29:07', '4', '2018-04-23 14:31:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000032', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 14:51:19', '4', '2018-04-23 14:51:19');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000033', 'a', '3', 'lain-lain', '4', '2018-04-23 15:26:27', '4', '2018-04-23 15:26:27');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000034', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 15:28:44', '4', '2018-04-23 15:28:44');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000035', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 16:03:15', '4', '2018-04-23 16:03:15');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000036', 'A', '3', 'LAIN-LAIN', '4', '2018-04-23 16:10:11', '4', '2018-04-23 16:10:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000037', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 10:32:33', '4', '2018-04-24 10:32:33');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000038', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 10:33:41', '4', '2018-04-24 10:33:41');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000039', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 11:00:19', '4', '2018-04-24 11:00:19');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000040', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 11:01:16', '4', '2018-04-24 11:01:16');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000041', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 11:23:47', '4', '2018-04-24 11:23:47');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000042', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 11:24:36', '4', '2018-04-24 11:24:36');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000043', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 13:07:27', '4', '2018-04-24 13:07:27');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000044', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 13:08:43', '4', '2018-04-24 13:08:43');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000045', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 13:37:22', '4', '2018-04-24 13:37:22');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000046', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 13:38:57', '4', '2018-04-24 13:38:57');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000047', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 14:06:29', '4', '2018-04-24 14:06:29');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000048', 'A', '4', 'LAIN-LAIN', '4', '2018-04-24 14:07:08', '4', '2018-04-24 14:07:08');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000049', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 11:21:07', '4', '2018-04-25 11:46:05');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000050', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 11:24:58', '4', '2018-04-25 11:24:58');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000051', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 11:45:51', '4', '2018-04-25 11:45:51');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000052', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 11:50:26', '4', '2018-04-25 11:50:26');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000053', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 13:21:45', '4', '2018-04-25 13:21:45');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000054', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 13:22:03', '4', '2018-04-25 13:22:03');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000055', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 13:46:00', '4', '2018-04-25 13:46:00');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000056', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 13:54:32', '4', '2018-04-25 13:54:32');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000057', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 14:19:05', '4', '2018-04-25 14:19:05');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000058', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 14:23:03', '4', '2018-04-25 14:23:03');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000059', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 14:51:17', '4', '2018-04-25 14:51:17');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000060', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 14:55:44', '4', '2018-04-25 14:55:44');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000061', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 15:25:37', '4', '2018-04-25 15:25:37');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000062', 'B', '1', 'LAIN-LAIN', '4', '2018-04-25 15:28:35', '4', '2018-04-25 15:28:35');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000063', 'B', '1', 'LAIN-LAIN', '4', '2018-04-26 14:33:44', '4', '2018-04-26 14:33:44');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000064', 'B', '1', 'LAIN-LAIN', '4', '2018-04-26 14:37:50', '4', '2018-04-26 14:37:50');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000065', 'B', '2', 'LAIN-LAIN', '4', '2018-04-26 15:03:56', '4', '2018-04-26 15:03:56');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000066', 'B', '2', 'LAIN-LAIN', '4', '2018-04-26 15:16:12', '4', '2018-04-26 15:16:12');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000067', 'B', '2', 'LAIN-LAIN', '4', '2018-04-26 15:39:18', '4', '2018-04-26 15:39:18');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000068', 'B', '2', 'LAIN-LAIN', '4', '2018-04-26 15:47:11', '4', '2018-04-26 15:47:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000069', 'B', '2', 'LAIN-LAIN', '4', '2018-04-26 16:07:31', '4', '2018-04-26 16:07:31');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000070', 'B', '2', 'LAIN-LAIN', '4', '2018-04-26 16:21:54', '4', '2018-04-26 16:21:54');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000071', 'B', '2', 'LAIN-LAIN', '4', '2018-04-26 16:54:25', '4', '2018-04-26 16:54:25');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000072', 'B', '2', 'LAIN-LAIN', '4', '2018-04-26 16:54:34', '4', '2018-04-26 16:54:34');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000073', 'B', '2', 'LAIN-LAIN', '4', '2018-05-02 14:03:08', '4', '2018-05-02 14:03:08');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000074', 'B', '2', 'LAIN-LAIN', '4', '2018-05-02 14:03:55', '4', '2018-05-02 14:03:55');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000075', 'B', '2', 'LAIN-LAIN', '4', '2018-05-02 14:32:46', '4', '2018-05-02 14:32:46');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000076', 'B', '2', 'LAIN-LAIN', '4', '2018-05-02 14:32:56', '4', '2018-05-02 14:32:56');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000077', 'B', '2', 'LAIN-LAIN', '4', '2018-05-02 15:04:50', '4', '2018-05-02 15:04:50');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000078', 'B', '2', 'LAIN-LAIN', '4', '2018-05-02 15:05:25', '4', '2018-05-02 15:05:25');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000079', 'B', '2', 'LAIN-LAIN', '4', '2018-05-02 15:29:23', '4', '2018-05-02 15:29:23');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000080', 'B', '2', 'LAIN-LAIN', '4', '2018-05-02 15:35:14', '4', '2018-05-02 15:35:14');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000081', 'B', '3', 'LAIN-LAIN', '4', '2018-05-02 15:55:45', '4', '2018-05-02 15:55:45');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000082', 'B', '3', 'LAIN-LAIN', '4', '2018-05-02 16:09:50', '4', '2018-05-02 16:09:50');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000083', 'B', '3', 'LAIN-LAIN', '4', '2018-05-02 16:40:35', '4', '2018-05-02 16:40:35');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000084', 'B', '3', 'LAIN-LAIN', '4', '2018-05-02 16:51:56', '4', '2018-05-02 16:51:56');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000085', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 13:32:36', '4', '2018-05-03 13:32:36');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000086', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 13:32:48', '4', '2018-05-03 13:32:48');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000087', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 14:11:25', '4', '2018-05-03 14:11:25');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000088', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 14:11:34', '4', '2018-05-03 14:11:34');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000089', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 14:31:51', '4', '2018-05-03 14:31:51');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000090', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 14:48:26', '4', '2018-05-03 14:48:26');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000091', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 14:52:49', '4', '2018-05-03 14:52:49');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000092', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 15:03:05', '4', '2018-05-03 15:03:05');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000093', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 15:07:05', '4', '2018-05-03 15:07:05');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000094', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 15:17:06', '4', '2018-05-03 15:17:06');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000095', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 15:18:58', '4', '2018-05-03 15:18:58');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000096', 'B', '3', 'LAIN-LAIN', '4', '2018-05-03 15:28:20', '4', '2018-05-03 15:28:20');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000097', 'B', '4', 'LAIN-LAIN', '4', '2018-05-03 15:35:11', '4', '2018-05-03 15:35:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000098', 'B', '4', 'LAIN-LAIN', '4', '2018-05-03 15:42:12', '4', '2018-05-03 15:42:12');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000099', 'B', '4', 'LAIN-LAIN', '4', '2018-05-03 15:56:31', '4', '2018-05-03 15:56:31');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000100', 'B', '4', 'LAIN-LAIN', '4', '2018-05-03 15:56:55', '4', '2018-05-03 15:56:55');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000101', 'B', '4', 'LAIN-LAIN', '4', '2018-05-03 16:13:29', '4', '2018-05-03 16:13:29');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000102', 'B', '4', 'LAIN-LAIN', '4', '2018-05-03 16:14:32', '4', '2018-05-03 16:14:32');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000103', 'B', '4', 'LAIN-LAIN', '4', '2018-05-03 16:31:20', '4', '2018-05-03 16:31:20');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000104', 'B', '4', 'LAIN-LAIN', '4', '2018-05-03 16:34:51', '4', '2018-05-03 16:34:51');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000105', 'B', '4', 'LAIN-LAIN', '4', '2018-05-07 09:42:09', '4', '2018-05-07 09:42:09');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000106', 'B', '4', 'LAIN-LAIN', '4', '2018-05-07 09:43:41', '4', '2018-05-07 09:43:41');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000107', 'B', '4', 'LAIN-LAIN', '4', '2018-05-07 09:59:24', '4', '2018-05-07 09:59:24');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000108', 'B', '4', 'LAIN-LAIN', '4', '2018-05-07 09:59:31', '4', '2018-05-07 09:59:31');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000109', 'B', '4', 'LAIN-LAIN', '4', '2018-05-07 10:18:00', '4', '2018-05-07 10:18:00');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000110', 'B', '4', 'LAIN-LAIN', '4', '2018-05-07 10:18:24', '4', '2018-05-07 10:18:24');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000111', 'B', '4', 'LAIN-LAIN', '4', '2018-05-07 10:34:35', '4', '2018-05-07 10:34:35');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000112', 'B', '4', 'LAIN-LAIN', '4', '2018-05-07 10:38:27', '4', '2018-05-07 10:38:27');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000113', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 10:52:13', '4', '2018-05-07 10:52:13');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000114', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 10:57:44', '4', '2018-05-07 10:57:44');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000115', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 11:10:19', '4', '2018-05-07 11:10:19');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000116', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 11:14:41', '4', '2018-05-07 11:14:41');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000117', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 11:26:52', '4', '2018-05-07 11:26:52');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000118', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 11:31:51', '4', '2018-05-07 11:31:51');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000119', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 11:45:22', '4', '2018-05-07 11:45:22');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000120', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 11:57:09', '4', '2018-05-07 11:57:09');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000121', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 12:59:49', '4', '2018-05-07 12:59:49');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000122', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 13:10:07', '4', '2018-05-07 13:10:07');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000123', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 13:17:43', '4', '2018-05-07 13:17:43');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000124', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 13:22:19', '4', '2018-05-07 13:22:19');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000125', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 13:33:49', '4', '2018-05-07 13:33:49');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000126', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 13:37:39', '4', '2018-05-07 13:37:39');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000127', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 13:49:30', '4', '2018-05-07 13:49:30');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000128', 'C', '1', 'LAIN-LAIN', '4', '2018-05-07 13:51:29', '4', '2018-05-07 13:51:29');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000129', 'C', '2', 'LAIN-LAIN', '4', '2018-05-07 14:03:46', '4', '2018-05-07 14:03:46');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000130', 'C', '2', 'LAIN-LAIN', '4', '2018-05-07 14:06:02', '4', '2018-05-07 14:06:02');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000131', 'C', '2', 'LAIN-LAIN', '4', '2018-05-07 14:18:59', '4', '2018-05-07 14:18:59');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000132', 'C', '2', 'LAIN-LAIN', '4', '2018-05-07 14:19:12', '4', '2018-05-07 14:19:12');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000133', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 13:55:39', '4', '2018-05-09 13:55:53');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000134', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 14:09:50', '4', '2018-05-09 14:09:50');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000135', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 14:40:48', '4', '2018-05-09 14:40:48');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000136', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 14:41:05', '4', '2018-05-09 14:41:05');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000137', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 14:51:18', '4', '2018-05-09 14:51:58');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000138', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 14:53:04', '4', '2018-05-09 14:53:04');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000139', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 15:04:05', '4', '2018-05-09 15:04:05');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000140', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 15:05:02', '4', '2018-05-09 15:05:02');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000141', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 15:22:12', '4', '2018-05-09 15:22:12');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000142', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 15:22:42', '4', '2018-05-09 15:22:42');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000143', 'C', '2', 'lain-lain', '4', '2018-05-09 15:24:43', '4', '2018-05-09 15:24:43');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000144', 'C', '2', 'LAIN-LAIN', '4', '2018-05-09 15:31:44', '4', '2018-05-09 15:32:10');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000145', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 15:43:21', '4', '2018-05-09 15:43:21');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000146', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 15:45:28', '4', '2018-05-09 15:45:28');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000147', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 15:58:45', '4', '2018-05-09 15:58:45');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000148', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:04:35', '4', '2018-05-09 16:04:35');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000149', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:07:29', '4', '2018-05-09 16:07:29');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000150', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:19:57', '4', '2018-05-09 16:19:57');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000151', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:22:26', '4', '2018-05-09 16:22:26');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000152', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:26:24', '4', '2018-05-09 16:26:24');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000153', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:26:35', '4', '2018-05-09 16:26:35');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000154', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:43:26', '4', '2018-05-09 16:43:26');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000155', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:44:16', '4', '2018-05-09 16:44:16');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000156', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:49:26', '4', '2018-05-09 16:49:26');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000157', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 16:59:50', '4', '2018-05-09 16:59:50');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000158', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 17:00:19', '4', '2018-05-09 17:00:19');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000159', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 17:12:57', '4', '2018-05-09 17:12:57');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000160', 'C', '3', 'LAIN-LAIN', '4', '2018-05-09 17:15:16', '4', '2018-05-09 17:15:16');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000161', 'C', '4', 'LAIN-LAIN', '4', '2018-05-14 08:47:49', '4', '2018-05-14 08:47:49');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000162', 'C', '4', 'LAIN - LAIN', '4', '2018-05-14 09:31:02', '4', '2018-05-14 09:31:02');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000163', 'C', '4', 'LAIN - LAIN', '4', '2018-05-14 10:01:43', '4', '2018-05-14 10:01:43');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000164', 'C', '4', 'LAIN - LAIN', '4', '2018-05-14 10:36:25', '4', '2018-05-14 10:36:25');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000165', 'C', '4', 'LAIN - LAIN', '4', '2018-05-14 11:08:40', '4', '2018-05-14 11:08:40');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000166', 'C', '4', 'LAIN - LAIN', '4', '2018-05-14 13:04:39', '4', '2018-05-14 13:04:39');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000167', 'C', '4', 'LAIN - LAIN', '4', '2018-05-14 13:31:22', '4', '2018-05-14 13:31:22');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000168', 'C', '4', 'LAIN - LAIN', '4', '2018-05-14 14:15:50', '4', '2018-05-14 14:15:50');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000169', 'C', '4', 'LAIN-LAIN', '4', '2018-05-14 14:45:47', '4', '2018-05-14 14:45:47');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000170', 'C', '4', 'LAIN-LAIN', '4', '2018-05-14 14:46:41', '4', '2018-05-14 14:46:41');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000171', 'C', '4', 'LAIN-LAIN', '4', '2018-05-14 15:03:13', '4', '2018-05-14 15:03:13');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000172', 'C', '4', 'LAIN-LAIN', '4', '2018-05-14 15:06:25', '4', '2018-05-14 15:06:25');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000173', 'C', '4', 'LAIN-LAIN', '4', '2018-05-14 15:16:43', '4', '2018-05-14 15:16:43');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000174', 'C', '4', 'LAIN-LAIN', '4', '2018-05-14 15:21:12', '4', '2018-05-14 15:21:12');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000175', 'C', '4', 'LAIN-LAIN', '4', '2018-05-14 15:27:16', '4', '2018-05-14 15:27:16');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000176', 'C', '4', 'LAIN-LAIN', '4', '2018-05-14 15:40:08', '4', '2018-05-14 15:40:08');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000177', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 15:47:51', '4', '2018-05-14 15:47:51');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000178', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 15:54:08', '4', '2018-05-14 15:54:08');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000179', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 16:00:03', '4', '2018-05-14 16:00:03');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000180', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 16:04:04', '4', '2018-05-14 16:04:04');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000181', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 16:13:32', '4', '2018-05-14 16:13:32');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000182', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 16:20:40', '4', '2018-05-14 16:20:40');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000183', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 16:49:43', '4', '2018-05-14 16:49:43');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000184', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 16:50:06', '4', '2018-05-14 16:50:06');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000185', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 16:58:06', '4', '2018-05-14 16:58:06');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000186', 'D', '1', 'LAIN - LAIN', '4', '2018-05-14 16:58:56', '4', '2018-05-14 16:58:56');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000187', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 17:00:56', '4', '2018-05-14 17:00:56');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000188', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 17:17:58', '4', '2018-05-14 17:17:58');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000189', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 17:21:34', '4', '2018-05-14 17:21:34');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000190', 'D', '1', 'LAIN-LAIN', '4', '2018-05-14 17:21:46', '4', '2018-05-14 17:21:46');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000191', 'D', '1', 'LAIN - LAIN', '4', '2018-05-15 07:54:21', '4', '2018-05-15 07:54:21');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000192', 'D', '1', 'LAIN - LAIN', '4', '2018-05-15 08:25:32', '4', '2018-05-15 08:25:32');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000193', 'D', '2', 'LAIN - LAIN', '4', '2018-05-15 08:55:10', '4', '2018-05-15 08:55:10');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000194', 'D', '2', 'LAIN - LAIN', '4', '2018-05-15 09:19:48', '4', '2018-05-15 09:19:48');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000195', 'D', '2', 'LAIN - LAIN', '4', '2018-05-15 09:53:42', '4', '2018-05-15 09:53:42');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000196', 'D', '2', 'LAIN - LAIN', '4', '2018-05-15 10:28:41', '4', '2018-05-15 10:28:41');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000197', 'D', '2', 'LAIN - LAIN', '4', '2018-05-15 10:56:45', '4', '2018-05-15 10:56:45');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000198', 'D', '2', 'LAIN - LAIN', '4', '2018-05-15 13:12:37', '4', '2018-05-15 13:12:37');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000199', 'D', '2', 'LAIN - LAIN', '4', '2018-05-15 13:36:52', '4', '2018-05-15 13:36:52');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000200', 'D', '2', 'LAIN - LAIN', '4', '2018-05-15 14:04:19', '4', '2018-05-15 14:04:19');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000201', 'D', '2', 'LAIN-LAIN', '4', '2018-05-15 14:28:46', '4', '2018-05-15 14:28:46');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000202', 'D', '2', 'LAIN-LAIN', '4', '2018-05-15 14:29:00', '4', '2018-05-15 14:29:00');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000203', 'D', '2', 'LAIN-LAIN', '4', '2018-05-15 14:29:11', '4', '2018-05-15 14:29:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000204', 'D', '2', 'LAIN-LAIN', '4', '2018-05-15 14:29:38', '4', '2018-05-15 14:29:38');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000205', 'D', '2', 'LAIN-LAIN', '4', '2018-05-15 14:54:45', '4', '2018-05-15 14:54:45');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000206', 'D', '2', 'LAIN-LAIN', '4', '2018-05-15 14:55:39', '4', '2018-05-15 14:55:39');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000207', 'D', '2', 'LAIN-LAIN', '4', '2018-05-15 15:15:31', '4', '2018-05-15 15:15:31');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000208', 'D', '2', 'LAIN-LAIN', '4', '2018-05-15 15:15:41', '4', '2018-05-15 15:15:41');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000209', 'D', '3', 'LAIN LAIN', '4', '2018-05-15 15:19:23', '4', '2018-05-15 15:21:26');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000210', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 15:20:32', '4', '2018-05-15 15:20:32');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000211', 'D', '3', 'LAIN - LAIN', '4', '2018-05-15 15:33:33', '4', '2018-05-15 15:33:33');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000212', 'D', '3', 'LAIN - LAIN', '4', '2018-05-15 15:34:10', '4', '2018-05-15 15:34:10');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000213', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 15:41:31', '4', '2018-05-15 15:41:31');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000214', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 15:41:40', '4', '2018-05-15 15:41:40');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000215', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 15:43:21', '4', '2018-05-15 15:43:21');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000216', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 15:43:41', '4', '2018-05-15 15:43:41');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000217', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 15:43:57', '4', '2018-05-15 15:43:57');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000218', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 15:47:46', '4', '2018-05-15 15:47:46');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000219', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 15:48:01', '4', '2018-05-15 15:48:01');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000220', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 15:48:18', '4', '2018-05-15 15:48:18');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000221', 'D', '3', 'LAIN - LAIN', '4', '2018-05-15 16:11:46', '4', '2018-05-15 16:11:46');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000222', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 16:16:58', '4', '2018-05-15 16:16:58');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000223', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 16:17:20', '4', '2018-05-15 16:17:20');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000224', 'D', '3', 'LAIN-LAIN', '4', '2018-05-15 16:17:33', '4', '2018-05-15 16:17:33');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000225', 'D', '4', 'LAIN-LAIN', '4', '2018-05-15 16:33:18', '4', '2018-05-15 16:33:18');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000226', 'D', '4', 'LAIN-LAIN', '4', '2018-05-15 16:33:27', '4', '2018-05-15 16:33:27');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000227', 'D', '4', 'LAIN-LAIN', '4', '2018-05-15 17:05:22', '4', '2018-05-15 17:05:22');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000228', 'D', '4', 'LAIN-LAIN', '4', '2018-05-15 17:05:42', '4', '2018-05-15 17:05:42');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000229', 'D', '4', 'LAIN-LAIN', '4', '2018-05-15 17:23:06', '4', '2018-05-15 17:23:06');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000230', 'D', '4', 'LAIN - LAIN', '4', '2018-05-16 08:41:00', '4', '2018-05-16 08:41:00');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000231', 'D', '4', 'LAIN-LAIN', '4', '2018-05-16 09:35:55', '4', '2018-05-16 09:35:55');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000232', 'D', '4', 'LAIN-LAIN', '4', '2018-05-16 09:36:08', '4', '2018-05-16 09:36:08');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000233', 'D', '4', 'LAIN-LAIN', '4', '2018-05-16 09:36:25', '4', '2018-05-16 09:36:25');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000234', 'D', '4', 'LAIN-LAIN', '4', '2018-05-16 09:37:43', '4', '2018-05-16 09:37:43');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000235', 'D', '4', 'LAIN-LAIN', '4', '2018-05-16 09:37:52', '4', '2018-05-16 09:37:52');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000236', 'D', '4', 'LAIN-LAIN', '4', '2018-05-16 10:12:17', '4', '2018-05-16 10:12:17');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000237', 'D', '4', 'LAIN-LAIN', '4', '2018-05-16 10:12:25', '4', '2018-05-16 10:12:25');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000238', 'D', '4', 'LAIN - LAIN', '4', '2018-05-16 10:12:40', '4', '2018-05-16 10:12:40');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000239', 'D', '4', 'LAIN-LAIN', '4', '2018-05-16 10:39:39', '4', '2018-05-16 11:16:20');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000240', 'D', '4', 'LAIN-LAIN', '4', '2018-05-16 10:41:49', '4', '2018-05-16 10:41:49');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000241', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 10:42:06', '4', '2018-05-16 10:42:06');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000242', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 11:06:08', '4', '2018-05-16 11:06:08');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000243', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 11:16:31', '4', '2018-05-16 11:16:31');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000244', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 11:16:47', '4', '2018-05-16 11:16:47');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000245', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 13:04:51', '4', '2018-05-16 13:04:51');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000246', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 13:05:11', '4', '2018-05-16 13:05:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000247', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 13:15:26', '4', '2018-05-16 13:48:30');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000248', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 13:50:37', '4', '2018-05-16 13:50:37');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000249', 'E', '1', 'LAIN - LAIN', '4', '2018-05-16 13:50:46', '4', '2018-05-16 13:50:46');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000250', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 14:18:11', '4', '2018-05-16 14:18:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000251', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 14:23:18', '4', '2018-05-16 14:23:18');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000252', 'E', '1', 'LAIN-LAIN', '4', '2018-05-16 14:46:05', '4', '2018-05-16 14:46:05');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000253', 'E', '1', 'LAIN - LAIN', '4', '2018-05-16 15:23:46', '4', '2018-05-16 15:23:46');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000254', 'E', '1', 'LAIN - LAIN', '4', '2018-05-17 08:05:20', '4', '2018-05-17 08:05:20');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000255', 'E', '1', 'LAIN - LAIN', '4', '2018-05-17 09:02:57', '4', '2018-05-17 09:02:57');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000256', 'E', '1', 'LAIN - LAIN', '4', '2018-05-17 09:50:15', '4', '2018-05-17 09:50:15');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000257', 'E', '2', 'LAIN - LAIN', '4', '2018-05-17 10:39:07', '4', '2018-05-17 10:39:07');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000258', 'E', '2', 'LAIN - LAIN', '4', '2018-05-17 11:21:19', '4', '2018-05-17 11:21:19');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000259', 'E', '2', 'LAIN - LAIN', '4', '2018-05-17 13:34:35', '4', '2018-05-17 13:34:35');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000260', 'E', '2', 'LAIN - LAIN', '4', '2018-05-17 14:21:57', '4', '2018-05-17 14:21:57');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000261', 'E', '2', 'LAIN - LAIN', '4', '2018-05-18 07:57:22', '4', '2018-05-18 07:57:22');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000262', 'E', '2', 'LAIN - LAIN', '4', '2018-05-18 08:35:16', '4', '2018-05-18 08:35:16');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000263', 'E', '2', 'LAIN - LAIN', '4', '2018-05-18 09:13:15', '4', '2018-05-18 09:13:15');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000264', 'E', '2', 'LAIN - LAIN', '4', '2018-05-18 09:55:24', '4', '2018-05-18 09:55:24');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000265', 'E', '2', 'LAIN - LAIN', '4', '2018-05-18 10:36:57', '4', '2018-05-18 10:36:57');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000266', 'E', '2', 'LAIN - LAIN', '4', '2018-05-18 13:14:09', '4', '2018-05-18 13:14:09');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000267', 'E', '2', 'LAIN - LAIN', '4', '2018-05-18 14:01:36', '4', '2018-05-18 14:01:36');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000268', 'E', '2', 'LAIN - LAIN', '4', '2018-05-21 07:46:08', '4', '2018-05-21 07:46:08');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000269', 'E', '2', 'LAIN - LAIN', '4', '2018-05-21 08:35:30', '4', '2018-05-21 08:35:30');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000270', 'E', '2', 'LAIN - LAIN', '4', '2018-05-21 09:22:21', '4', '2018-05-21 09:22:21');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000271', 'E', '2', 'LAIN - LAIN', '4', '2018-05-21 10:55:38', '4', '2018-05-21 10:55:38');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000272', 'E', '2', 'LAIN-LAIN', '4', '2018-05-21 13:42:43', '4', '2018-05-21 13:43:07');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000273', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 13:44:15', '4', '2018-05-21 13:44:15');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000274', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 13:44:32', '4', '2018-05-21 13:44:32');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000275', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 13:44:49', '4', '2018-05-21 13:44:49');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000276', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 13:45:02', '4', '2018-05-21 13:45:02');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000277', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 13:45:33', '4', '2018-05-21 13:45:33');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000278', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 14:32:49', '4', '2018-05-21 14:32:49');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000279', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 15:01:37', '4', '2018-05-21 15:01:37');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000280', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 15:14:11', '4', '2018-05-21 15:14:11');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000281', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 15:14:31', '4', '2018-05-21 15:14:31');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000282', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 15:14:52', '4', '2018-05-21 15:14:52');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000283', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 15:15:12', '4', '2018-05-21 15:15:12');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000284', 'E', '3', 'LAIN-LAIN', '4', '2018-05-21 15:15:25', '4', '2018-05-21 15:15:25');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000285', 'E', '3', 'STP TAHUN 2017', '4', '2018-05-23 08:07:04', '4', '2018-05-23 08:07:04');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000286', 'E', '3', 'STP TAHUN 2017', '4', '2018-05-24 10:43:13', '4', '2018-05-24 10:43:13');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000287', 'E', '3', 'STP TAHUN 2017', '4', '2018-05-28 10:45:19', '4', '2018-06-05 11:03:58');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000288', 'E', '3', 'STP TAHUN 2017', '4', '2018-06-04 09:20:23', '4', '2018-06-04 09:20:23');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000289', 'E', '4', 'STP TAHUN 2017', '4', '2018-06-05 13:09:21', '4', '2018-06-05 13:09:21');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000290', 'E', '4', 'STP TAHUN 2017', '4', '2018-06-08 07:54:20', '4', '2018-06-08 07:54:20');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000291', 'E', '4', 'STP TAHUN 2017', '4', '2018-06-25 11:23:36', '4', '2018-06-25 11:23:36');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000292', 'E', '4', 'STP SKPKB', '4', '2018-08-03 09:23:56', '4', '2018-08-03 09:23:56');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000293', 'E', '04', 'STP SKPKB', '4', '2018-08-13 10:20:54', '4', '2018-08-13 10:20:54');
INSERT INTO `is_kotakberkas_copy_ori` VALUES ('B000294', 'E', '04', 'STP SKPKB', '4', '2018-08-30 09:04:38', '4', '2018-08-30 09:04:38');

-- ----------------------------
-- Table structure for `surat_keluar`
-- ----------------------------
DROP TABLE IF EXISTS `surat_keluar`;
CREATE TABLE `surat_keluar` (
  `id_surat_keluar` bigint(20) NOT NULL,
  `nomor_agenda` bigint(20) NOT NULL,
  `tanggal_register` date NOT NULL,
  `tujuan_surat` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `arsip` varchar(255) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_surat_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of surat_keluar
-- ----------------------------
INSERT INTO `surat_keluar` VALUES ('1', '1', '2018-12-12', '1', '002/PANAGIHAN/2018', '2018-12-26', 'Permintaan perbaikan SIAS modul Upload File', 'agar segera dikerjakan gapake lama', '1_DAFTAR HARTA.PDF', '1', '2018-12-26 10:51:57', null, null);
INSERT INTO `surat_keluar` VALUES ('2', '1', '2019-01-11', '3', 'BERITA ACARA 12 13 14', '2019-01-10', 'BERITA ACARA KOHIR TIDAK DITERBITKAN', 'BA kohir tidak terbit\r\nBA hasil penelitian data ketetapan tidak urut \r\nba mpn skp salahs', '2_berita acara 12 13 14 malang utara_1.PDF', '1', '2019-01-11 08:36:22', '1', '2019-01-17 15:02:50');

-- ----------------------------
-- Table structure for `surat_masuk`
-- ----------------------------
DROP TABLE IF EXISTS `surat_masuk`;
CREATE TABLE `surat_masuk` (
  `id_surat_masuk` bigint(20) NOT NULL,
  `nomor_agenda` bigint(20) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `asal_surat` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `sifat_surat` enum('Rahasia','Penting','Biasa') NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `arsip` varchar(255) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_surat_masuk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of surat_masuk
-- ----------------------------
INSERT INTO `surat_masuk` VALUES ('3', '1', '2019-01-09', '5', 'KEP-558/WPJ.12/KP.01/2018', '2018-12-31', 'Biasa', 'distribusi rencana penerimaan pajak dari kegiatans', 'kep kepala kantor', '3_KEP558.PDF', '1', '2019-01-09 11:35:08', '1', '2019-01-17 15:02:12');
INSERT INTO `surat_masuk` VALUES ('4', '2', '2019-01-08', '1', 'ND-00314/WPJ.11/KP.07/2018', '2018-12-18', 'Biasa', 'PERMOHONAN KONVERSI KETETAPAN PAJAK GANINA WIDYA R', '97.594.500.7-609.000\r\ndari KPP Surabaya Wonocolo', '4_ganina.pdf.PDF', '1', '2019-01-17 10:56:20', '1', '2019-01-17 10:57:42');

-- ----------------------------
-- Table structure for `surat_masuk_copy`
-- ----------------------------
DROP TABLE IF EXISTS `surat_masuk_copy`;
CREATE TABLE `surat_masuk_copy` (
  `id_surat_masuk` bigint(20) NOT NULL,
  `nomor_agenda` bigint(20) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `asal_surat` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `sifat_surat` enum('Rahasia','Penting','Biasa') NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `arsip` varchar(255) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_surat_masuk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of surat_masuk_copy
-- ----------------------------
INSERT INTO `surat_masuk_copy` VALUES ('1', '1', '2018-12-13', '1', '321', '2018-12-13', 'Penting', 'dsfd', 'dsfdsf', '', '1', '2018-12-13 14:17:04', null, null);
INSERT INTO `surat_masuk_copy` VALUES ('2', '2', '2018-12-13', '2', '3211', '2018-12-12', 'Rahasia', 'tes tes', 'tes tess', '', '1', '2018-12-13 14:50:24', null, null);

-- ----------------------------
-- Table structure for `sys_audit_trail`
-- ----------------------------
DROP TABLE IF EXISTS `sys_audit_trail`;
CREATE TABLE `sys_audit_trail` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  `action` enum('Insert','Update','Delete') NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sys_audit_trail
-- ----------------------------
INSERT INTO `sys_audit_trail` VALUES ('8', '2018-12-13 11:11:27', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>SMK NUSANTARA<b>][Alamat : </b>Jalan Teuku Umar No 100, Kedaton, Bandar Lampung, Lampung<b>][Telepon : </b>081377783334<b>][Fax : </b>081377783334<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo.png<b>],<br> Data Baru = [Nama Instansi : </b>KPP PRATAMA MALANG UTARA<b>][Alamat : </b>Jalan Jaksa Agung Suprapto 29<b>][Telepon : </b>081377783334<b>][Fax : </b>081377783334<b>][Email : </b>malangutara@gmail.com<b>][Website : </b>http://malangutara.com<b>][Logo : </b>logo.png<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('9', '2018-12-13 11:12:18', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Indra Styawantoro<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('10', '2018-12-13 11:12:42', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('11', '2018-12-13 11:13:25', '1', 'Insert', '<b>Insert</b> data backup database pada tabel <b>sys_database</b>.<br><b>[ID : </b>1<b>][Nama File : </b>20181213_111325_database.sql.gz<b>][Ukuran File : </b>2 KB<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('12', '2018-12-13 14:08:05', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>1<b>][Nama Instansi : </b>SEKSI PENAGIHAN<b>][Alamat : </b>LANTAI 3<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('13', '2018-12-13 14:08:15', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>2<b>][Nama Instansi : </b>SEKSI PEMERIKSAAN<b>][Alamat : </b>LANTAI 3<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('14', '2018-12-13 14:17:04', '1', 'Insert', '<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>1<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2018-12-13<b>][ID Instansi : </b>1<b>][Nomor Surat : </b>321<b>][Tanggal Surat : </b>2018-12-13<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>dsfd<b>][Keterangan : </b>dsfdsf<b>][Arsip : </b><b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('15', '2018-12-13 14:42:27', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('16', '2018-12-13 14:44:07', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>KPP PRATAMA MALANG UTARA<b>][Alamat : </b>Jalan Jaksa Agung Suprapto 29<b>][Telepon : </b>081377783334<b>][Fax : </b>081377783334<b>][Email : </b>malangutara@gmail.com<b>][Website : </b>http://malangutara.com<b>][Logo : </b>logo.png<b>],<br> Data Baru = [Nama Instansi : </b>KPP PRATAMA MALANG UTARA<b>][Alamat : </b>Jalan Jaksa Agung Suprapto 29<b>][Telepon : </b>081377783334<b>][Fax : </b>081377783334<b>][Email : </b>malangutara@gmail.com<b>][Website : </b>http://malangutara.com<b>][Logo : </b>djp.jpg<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('17', '2018-12-13 14:50:24', '1', 'Insert', '<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>2<b>][Nomor Agenda : </b>2<b>][Tanggal Diterima : </b>2018-12-13<b>][ID Instansi : </b>2<b>][Nomor Surat : </b>3211<b>][Tanggal Surat : </b>2018-12-12<b>][Sifat Surat : </b>Rahasia<b>][Perihal : </b>tes tes<b>][Keterangan : </b>tes tess<b>][Arsip : </b><b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('18', '2018-12-13 16:03:57', '1', 'Insert', '<b>Insert</b> data backup database pada tabel <b>sys_database</b>.<br><b>[ID : </b>2<b>][Nama File : </b>20181213_160357_database.sql.gz<b>][Ukuran File : </b>2 KB<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('19', '2018-12-13 16:04:10', '1', 'Delete', '<b>Delete</b> data backup database pada tabel <b>sys_database</b>. <br> <b>[ID : </b>1<b>][Nama File : </b>20181213_111325_database.sql.gz<b>]');
INSERT INTO `sys_audit_trail` VALUES ('20', '2018-12-14 08:33:19', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('21', '2018-12-14 08:38:02', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('22', '2018-12-14 08:54:48', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('23', '2018-12-14 08:57:39', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('24', '2018-12-14 08:58:10', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('25', '2018-12-14 10:17:25', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('26', '2018-12-17 07:30:17', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('27', '2018-12-17 09:49:11', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('28', '2018-12-17 10:37:25', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('29', '2018-12-17 11:40:09', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('30', '2018-12-17 14:47:53', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('31', '2018-12-18 07:26:15', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('32', '2018-12-18 07:28:00', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('33', '2018-12-18 08:19:53', '1', 'Insert', '<b>Insert</b> data user baru pada tabel <b>sys_users</b>.<br><b>[ID User : </b>2<b>][Nama User : </b>MOH AGUS SUBEKTI<b>][Username : </b>060087272<b>][Password : </b>9323514d53e4e4bf45ffc09925142cba94aa543a<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('34', '2018-12-18 08:20:39', '1', 'Insert', '<b>Insert</b> data user baru pada tabel <b>sys_users</b>.<br><b>[ID User : </b>3<b>][Nama User : </b>AHMAD CAHYO KARTIKO<b>][Username : </b>060107285<b>][Password : </b>8153f71e19f1b0bbcc630402193c882626799d73<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('35', '2018-12-18 08:21:06', '1', 'Insert', '<b>Insert</b> data user baru pada tabel <b>sys_users</b>.<br><b>[ID User : </b>4<b>][Nama User : </b>HERRY SUSANTO<b>][Username : </b>060093785<b>][Password : </b>740b1b5983518937e5e426990683fb4edea2c65a<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('36', '2018-12-18 10:44:09', '1', 'Delete', '<b>Delete</b> data surat masuk pada tabel <b>surat masuk</b>. <br> <b>[ID Surat Masuk : </b><b>][Asal Surat : </b><b>][Nomor Surat : </b><b>][Tanggal Surat : </b><b>]');
INSERT INTO `sys_audit_trail` VALUES ('37', '2018-12-18 10:46:03', '1', 'Delete', '<b>Delete</b> data surat masuk pada tabel <b>surat masuk</b>. <br> <b>[ID Surat Masuk : </b><b>][Asal Surat : </b><b>][Nomor Surat : </b><b>][Tanggal Surat : </b><b>]');
INSERT INTO `sys_audit_trail` VALUES ('38', '2018-12-18 10:50:29', '1', 'Delete', '<b>Delete</b> data surat masuk pada tabel <b>surat masuk</b>. <br> <b>[ID Surat Masuk : </b><b>][Asal Surat : </b><b>][Nomor Surat : </b><b>][Tanggal Surat : </b><b>]');
INSERT INTO `sys_audit_trail` VALUES ('39', '2018-12-18 11:14:08', '4', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>4<b>][Nama User : </b>HERRY SUSANTO<b>][Username : </b>060093785<b>][Password : </b>740b1b5983518937e5e426990683fb4edea2c65a<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>4<b>][Nama User : </b>HERRY SUSANTO<b>][Username : </b>060093785<b>][Password : </b>740b1b5983518937e5e426990683fb4edea2c65a<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('40', '2018-12-18 11:14:27', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('41', '2018-12-20 08:53:57', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('42', '2018-12-20 09:00:39', '1', 'Delete', '<b>Delete</b> data surat masuk pada tabel <b>surat masuk</b>. <br> <b>[ID Surat Masuk : </b><b>][Asal Surat : </b><b>][Nomor Surat : </b><b>][Tanggal Surat : </b><b>]');
INSERT INTO `sys_audit_trail` VALUES ('43', '2018-12-20 16:36:59', '1', 'Update', '<b>Update</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>Data Lama = [ID Surat Masuk : </b>2<b>][Nomor Agenda : </b>2<b>][Tanggal Diterima : </b>2018-12-13<b>][ID Instansi : </b>2<b>][Nomor Surat : </b>3211<b>][Tanggal Surat : </b>2018-12-12<b>][Sifat Surat : </b>Rahasia<b>][Perihal : </b>tes tes<b>][Keterangan : </b>tes tess<b>][Arsip : </b><b>],<br> Data Baru = [ID Surat Masuk : </b>2<b>][Nomor Agenda : </b>2<b>][Tanggal Diterima : </b>2018-12-13<b>][ID Instansi : </b>2<b>][Nomor Surat : </b>321<b>][Tanggal Surat : </b>2018-12-12<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>tes tes<b>][Keterangan : </b>tes tess<b>][Arsip : </b><b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('44', '2018-12-26 10:51:57', '1', 'Insert', '<b>Insert</b> data surat keluar pada tabel <b>surat keluar</b>.<br><b>[ID Surat Keluar : </b>1<b>][Nomor Agenda : </b>1<b>][Tanggal Register : </b>2018-12-12<b>][ID Instansi : </b>1<b>][Nomor Surat : </b>002/PANAGIHAN/2018<b>][Tanggal Surat : </b>2018-12-26<b>][Perihal : </b>Permintaan perbaikan SIAS modul Upload File<b>][Keterangan : </b>agar segera dikerjakan gapake lama<b>][Arsip : </b>1_DAFTAR HARTA.PDF<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('45', '2018-12-26 10:53:20', '1', 'Update', '<b>Update</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>Data Lama = [ID Surat Masuk : </b>2<b>][Nomor Agenda : </b>2<b>][Tanggal Diterima : </b>2018-12-13<b>][ID Instansi : </b>2<b>][Nomor Surat : </b>321<b>][Tanggal Surat : </b>2018-12-12<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>tes tes<b>][Keterangan : </b>tes tess<b>][Arsip : </b><b>],<br> Data Baru = [ID Surat Masuk : </b>2<b>][Nomor Agenda : </b>2<b>][Tanggal Diterima : </b>2018-12-13<b>][ID Instansi : </b>2<b>][Nomor Surat : </b>321<b>][Tanggal Surat : </b>2018-12-12<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>tes tes<b>][Keterangan : </b>tes tess<b>][Arsip : </b>2_permohonan angsuran surya gemilang.PDF<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('46', '2018-12-26 10:54:34', '1', 'Update', '<b>Update</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>Data Lama = [ID Surat Masuk : </b>1<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2018-12-13<b>][ID Instansi : </b>1<b>][Nomor Surat : </b>321<b>][Tanggal Surat : </b>2018-12-13<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>dsfd<b>][Keterangan : </b>dsfdsf<b>][Arsip : </b><b>],<br> Data Baru = [ID Surat Masuk : </b>1<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2018-12-13<b>][ID Instansi : </b>1<b>][Nomor Surat : </b>321<b>][Tanggal Surat : </b>2018-12-13<b>][Sifat Surat : </b>Biasa<b>][Perihal : </b>dsfd<b>][Keterangan : </b>dsfdsf<b>][Arsip : </b>1_herry_susanto_SK JSPN__1.PDF<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('47', '2018-12-26 15:35:34', '4', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>4<b>][Nama User : </b>HERRY SUSANTO<b>][Username : </b>060093785<b>][Password : </b>740b1b5983518937e5e426990683fb4edea2c65a<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>4<b>][Nama User : </b>HERRY SUSANTO<b>][Username : </b>060093785<b>][Password : </b>740b1b5983518937e5e426990683fb4edea2c65a<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('48', '2018-12-26 15:35:52', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('49', '2018-12-27 11:33:03', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('50', '2018-12-27 11:34:24', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('51', '2018-12-27 15:42:09', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('52', '2018-12-31 07:31:05', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('53', '2018-12-31 07:32:24', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>3<b>][Nama Instansi : </b>Kanwil DJP Jawa Timur III<b>][Alamat : </b>Jl. Letjen S. Parman 100, Malang<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('54', '2018-12-31 07:32:44', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>4<b>][Nama Instansi : </b>Kantor Pusat DJP<b>][Alamat : </b>Jl. Gatot Subroto 40- 42, Jakarta<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('55', '2018-12-31 07:33:08', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>instansi</b>.<br><b>Data Lama = [ID Instansi : </b>4<b>][Nama Instansi : </b>Kantor Pusat DJP<b>][Alamat : </b>Jl. Gatot Subroto 40- 42, Jakarta<b>],<br> Data Baru = [ID Instansi : </b>4<b>][Nama Instansi : </b>Kantor Pusat Direktorat Jenderal Pajak<b>][Alamat : </b>Jl. Gatot Subroto 40- 42, Jakarta<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('56', '2018-12-31 07:33:59', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('57', '2018-12-31 09:40:03', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('58', '2018-12-31 09:42:12', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('59', '2019-01-02 10:37:15', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('60', '2019-01-02 16:34:52', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('61', '2019-01-09 11:31:25', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('62', '2019-01-09 11:33:12', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>5<b>][Nama Instansi : </b>INTERN KPP PRATAMA MALANG UTARA<b>][Alamat : </b>Jl. JA Suprapto 29, Malang<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('63', '2019-01-09 11:35:08', '1', 'Insert', '<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>3<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2019-01-09<b>][ID Instansi : </b>5<b>][Nomor Surat : </b>KEP-558/WPJ.12/KP.01/2018<b>][Tanggal Surat : </b>2018-12-31<b>][Sifat Surat : </b>Biasa<b>][Perihal : </b>distribusi rencana penerimaan pajak dari kegiatan <b>][Keterangan : </b>kep kepala kantor<b>][Arsip : </b>3_KEP558.PDF<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('64', '2019-01-09 11:35:44', '1', 'Delete', '<b>Delete</b> data surat masuk pada tabel <b>surat masuk</b>. <br> <b>[ID Surat Masuk : </b>2<b>][Asal Surat : </b>SEKSI PEMERIKSAAN<b>][Nomor Surat : </b>321<b>][Tanggal Surat : </b>2018-12-12<b>]');
INSERT INTO `sys_audit_trail` VALUES ('65', '2019-01-09 11:35:50', '1', 'Delete', '<b>Delete</b> data surat masuk pada tabel <b>surat masuk</b>. <br> <b>[ID Surat Masuk : </b>1<b>][Asal Surat : </b>SEKSI PENAGIHAN<b>][Nomor Surat : </b>321<b>][Tanggal Surat : </b>2018-12-13<b>]');
INSERT INTO `sys_audit_trail` VALUES ('66', '2019-01-11 08:34:24', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('67', '2019-01-11 08:36:22', '1', 'Insert', '<b>Insert</b> data surat keluar pada tabel <b>surat keluar</b>.<br><b>[ID Surat Keluar : </b>2<b>][Nomor Agenda : </b>1<b>][Tanggal Register : </b>2019-01-11<b>][ID Instansi : </b>3<b>][Nomor Surat : </b>BERITA ACARA 12 13 14<b>][Tanggal Surat : </b>2019-01-10<b>][Perihal : </b>BERITA ACARA KOHIR TIDAK DITERBITKAN<b>][Keterangan : </b>BA kohir tidak terbit\r\nBA hasil penelitian data ketetapan tidak urut \r\nba mpn skp salah<b>][Arsip : </b>2_berita acara 12 13 14 malang utara_1.PDF<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('68', '2019-01-11 08:37:30', '1', 'Delete', '<b>Delete</b> data instansi pada tabel <b>instansi</b>. <br> <b>[ID Instansi : </b>2<b>][Nama Instansi : </b>SEKSI PEMERIKSAAN<b>]');
INSERT INTO `sys_audit_trail` VALUES ('69', '2019-01-17 10:54:42', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('70', '2019-01-17 10:56:20', '1', 'Insert', '<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>4<b>][Nomor Agenda : </b>2<b>][Tanggal Diterima : </b>2019-01-08<b>][ID Instansi : </b>1<b>][Nomor Surat : </b>ND-00314/WPJ.11/KP.07/2018<b>][Tanggal Surat : </b>2018-12-18<b>][Sifat Surat : </b>Biasa<b>][Perihal : </b>PERMOHONAN KONVERSI KETETAPAN PAJAK GANINA WIDYA R<b>][Keterangan : </b>97.594.500.7-609.000<b>][Arsip : </b>4_ganina.pdf.PDF<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('71', '2019-01-17 10:57:16', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>instansi</b>.<br><b>Data Lama = [ID Instansi : </b>1<b>][Nama Instansi : </b>SEKSI PENAGIHAN<b>][Alamat : </b>LANTAI 3<b>],<br> Data Baru = [ID Instansi : </b>1<b>][Nama Instansi : </b>PIHAK EKSTERN<b>][Alamat : </b>Dari luar KPP Malang Utara<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('72', '2019-01-17 10:57:42', '1', 'Update', '<b>Update</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>Data Lama = [ID Surat Masuk : </b>4<b>][Nomor Agenda : </b>2<b>][Tanggal Diterima : </b>2019-01-08<b>][ID Instansi : </b>1<b>][Nomor Surat : </b>ND-00314/WPJ.11/KP.07/2018<b>][Tanggal Surat : </b>2018-12-18<b>][Sifat Surat : </b>Biasa<b>][Perihal : </b>PERMOHONAN KONVERSI KETETAPAN PAJAK GANINA WIDYA R<b>][Keterangan : </b>97.594.500.7-609.000<b>][Arsip : </b>4_ganina.pdf.PDF<b>],<br> Data Baru = [ID Surat Masuk : </b>4<b>][Nomor Agenda : </b>2<b>][Tanggal Diterima : </b>2019-01-08<b>][ID Instansi : </b>1<b>][Nomor Surat : </b>ND-00314/WPJ.11/KP.07/2018<b>][Tanggal Surat : </b>2018-12-18<b>][Sifat Surat : </b>Biasa<b>][Perihal : </b>PERMOHONAN KONVERSI KETETAPAN PAJAK GANINA WIDYA R<b>][Keterangan : </b>97.594.500.7-609.000\r\ndari KPP Surabaya Wonocolo<b>][Arsip : </b>4_ganina.pdf.PDF<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('73', '2019-01-17 14:37:02', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('74', '2019-01-17 15:02:12', '1', 'Update', '<b>Update</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>Data Lama = [ID Surat Masuk : </b>3<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2019-01-09<b>][ID Instansi : </b>5<b>][Nomor Surat : </b>KEP-558/WPJ.12/KP.01/2018<b>][Tanggal Surat : </b>2018-12-31<b>][Sifat Surat : </b>Biasa<b>][Perihal : </b>distribusi rencana penerimaan pajak dari kegiatan <b>][Keterangan : </b>kep kepala kantor<b>][Arsip : </b>3_KEP558.PDF<b>],<br> Data Baru = [ID Surat Masuk : </b>3<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2019-01-09<b>][ID Instansi : </b>5<b>][Nomor Surat : </b>KEP-558/WPJ.12/KP.01/2018<b>][Tanggal Surat : </b>2018-12-31<b>][Sifat Surat : </b>Biasa<b>][Perihal : </b>distribusi rencana penerimaan pajak dari kegiatans<b>][Keterangan : </b>kep kepala kantor<b>][Arsip : </b>3_KEP558.PDF<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('75', '2019-01-17 15:02:50', '1', 'Update', '<b>Update</b> data surat keluar pada tabel <b>surat keluar</b>.<br><b>Data Lama = [ID Surat Keluar : </b>2<b>][Nomor Agenda : </b>1<b>][Tanggal Register : </b>2019-01-11<b>][ID Instansi : </b>3<b>][Nomor Surat : </b>BERITA ACARA 12 13 14<b>][Tanggal Surat : </b>2019-01-10<b>][Perihal : </b>BERITA ACARA KOHIR TIDAK DITERBITKAN<b>][Keterangan : </b>BA kohir tidak terbit\r\nBA hasil penelitian data ketetapan tidak urut \r\nba mpn skp salah<b>][Arsip : </b>2_berita acara 12 13 14 malang utara_1.PDF<b>],<br> Data Baru = [ID Surat Keluar : </b>2<b>][Nomor Agenda : </b>1<b>][Tanggal Register : </b>2019-01-11<b>][ID Instansi : </b>3<b>][Nomor Surat : </b>BERITA ACARA 12 13 14<b>][Tanggal Surat : </b>2019-01-10<b>][Perihal : </b>BERITA ACARA KOHIR TIDAK DITERBITKAN<b>][Keterangan : </b>BA kohir tidak terbit\r\nBA hasil penelitian data ketetapan tidak urut \r\nba mpn skp salahs<b>][Arsip : </b>2_berita acara 12 13 14 malang utara_1.PDF<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('76', '2019-01-18 10:25:09', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('77', '2019-01-18 10:25:42', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');
INSERT INTO `sys_audit_trail` VALUES ('78', '2019-01-18 13:52:51', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Herry<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>');

-- ----------------------------
-- Table structure for `sys_config`
-- ----------------------------
DROP TABLE IF EXISTS `sys_config`;
CREATE TABLE `sys_config` (
  `configID` tinyint(1) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `fax` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`configID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sys_config
-- ----------------------------
INSERT INTO `sys_config` VALUES ('1', 'KPP PRATAMA MALANG UTARA', 'Jalan Jaksa Agung Suprapto 29', '081377783334', '081377783334', 'malangutara@gmail.com', 'http://malangutara.com', 'djp.jpg', '1', '2018-12-13 14:44:07');

-- ----------------------------
-- Table structure for `sys_database`
-- ----------------------------
DROP TABLE IF EXISTS `sys_database`;
CREATE TABLE `sys_database` (
  `dbID` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_size` varchar(10) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dbID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sys_database
-- ----------------------------
INSERT INTO `sys_database` VALUES ('2', '20181213_160357_database.sql.gz', '2 KB', '1', '2018-12-13 16:03:57');

-- ----------------------------
-- Table structure for `sys_users`
-- ----------------------------
DROP TABLE IF EXISTS `sys_users`;
CREATE TABLE `sys_users` (
  `userID` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `user_account_name` varchar(30) NOT NULL,
  `user_account_password` varchar(45) NOT NULL,
  `user_permissions` enum('Administrator','Operator') NOT NULL,
  `block_users` enum('Ya','Tidak') NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sys_users
-- ----------------------------
INSERT INTO `sys_users` VALUES ('1', 'Herry', 'admin', '0937afa17f4dc08f3c0e5dc908158370ce64df86', 'Administrator', 'Tidak', '2019-01-18 13:52:51', '1', '2018-04-01 01:01:01', '1', '2019-01-18 13:52:51');
INSERT INTO `sys_users` VALUES ('2', 'MOH AGUS SUBEKTI', '060087272', '9323514d53e4e4bf45ffc09925142cba94aa543a', 'Administrator', 'Tidak', null, '1', '2018-12-18 08:19:53', null, null);
INSERT INTO `sys_users` VALUES ('3', 'AHMAD CAHYO KARTIKO', '060107285', '8153f71e19f1b0bbcc630402193c882626799d73', 'Operator', 'Tidak', null, '1', '2018-12-18 08:20:39', null, null);
INSERT INTO `sys_users` VALUES ('4', 'HERRY SUSANTO', '060093785', '740b1b5983518937e5e426990683fb4edea2c65a', 'Operator', 'Tidak', '2018-12-26 15:35:34', '1', '2018-12-18 08:21:06', '4', '2018-12-26 15:35:34');
DROP TRIGGER IF EXISTS `instansi_insert`;
DELIMITER ;;
CREATE TRIGGER `instansi_insert` AFTER INSERT ON `instansi` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>',NEW.id_instansi,'<b>][Nama Instansi : </b>',NEW.nama_instansi,'<b>][Alamat : </b>',NEW.alamat,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `instansi_update`;
DELIMITER ;;
CREATE TRIGGER `instansi_update` AFTER UPDATE ON `instansi` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data instansi pada tabel <b>instansi</b>.<br><b>Data Lama = [ID Instansi : </b>',OLD.id_instansi,'<b>][Nama Instansi : </b>',OLD.nama_instansi,'<b>][Alamat : </b>',OLD.alamat,'<b>],<br> Data Baru = [ID Instansi : </b>',NEW.id_instansi,'<b>][Nama Instansi : </b>',NEW.nama_instansi,'<b>][Alamat : </b>',NEW.alamat,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `surat_keluar_insert`;
DELIMITER ;;
CREATE TRIGGER `surat_keluar_insert` AFTER INSERT ON `surat_keluar` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data surat keluar pada tabel <b>surat keluar</b>.<br><b>[ID Surat Keluar : </b>',NEW.id_surat_keluar,'<b>][Nomor Agenda : </b>',NEW.nomor_agenda,'<b>][Tanggal Register : </b>',NEW.tanggal_register,'<b>][ID Instansi : </b>',NEW.tujuan_surat,'<b>][Nomor Surat : </b>',NEW.nomor_surat,'<b>][Tanggal Surat : </b>',NEW.tanggal_surat,'<b>][Perihal : </b>',NEW.perihal,'<b>][Keterangan : </b>',NEW.keterangan,'<b>][Arsip : </b>',NEW.arsip,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `surat_keluar_update`;
DELIMITER ;;
CREATE TRIGGER `surat_keluar_update` AFTER UPDATE ON `surat_keluar` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data surat keluar pada tabel <b>surat keluar</b>.<br><b>Data Lama = [ID Surat Keluar : </b>',OLD.id_surat_keluar,'<b>][Nomor Agenda : </b>',OLD.nomor_agenda,'<b>][Tanggal Register : </b>',OLD.tanggal_register,'<b>][ID Instansi : </b>',OLD.tujuan_surat,'<b>][Nomor Surat : </b>',OLD.nomor_surat,'<b>][Tanggal Surat : </b>',OLD.tanggal_surat,'<b>][Perihal : </b>',OLD.perihal,'<b>][Keterangan : </b>',OLD.keterangan,'<b>][Arsip : </b>',OLD.arsip,'<b>],<br> Data Baru = [ID Surat Keluar : </b>',NEW.id_surat_keluar,'<b>][Nomor Agenda : </b>',NEW.nomor_agenda,'<b>][Tanggal Register : </b>',NEW.tanggal_register,'<b>][ID Instansi : </b>',NEW.tujuan_surat,'<b>][Nomor Surat : </b>',NEW.nomor_surat,'<b>][Tanggal Surat : </b>',NEW.tanggal_surat,'<b>][Perihal : </b>',NEW.perihal,'<b>][Keterangan : </b>',NEW.keterangan,'<b>][Arsip : </b>',NEW.arsip,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `surat_masuk_insert`;
DELIMITER ;;
CREATE TRIGGER `surat_masuk_insert` AFTER INSERT ON `surat_masuk` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>',NEW.id_surat_masuk,'<b>][Nomor Agenda : </b>',NEW.nomor_agenda,'<b>][Tanggal Diterima : </b>',NEW.tanggal_diterima,'<b>][ID Instansi : </b>',NEW.asal_surat,'<b>][Nomor Surat : </b>',NEW.nomor_surat,'<b>][Tanggal Surat : </b>',NEW.tanggal_surat,'<b>][Sifat Surat : </b>',NEW.sifat_surat,'<b>][Perihal : </b>',NEW.perihal,'<b>][Keterangan : </b>',NEW.keterangan,'<b>][Arsip : </b>',NEW.arsip,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `surat_masuk_update`;
DELIMITER ;;
CREATE TRIGGER `surat_masuk_update` AFTER UPDATE ON `surat_masuk` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>Data Lama = [ID Surat Masuk : </b>',OLD.id_surat_masuk,'<b>][Nomor Agenda : </b>',OLD.nomor_agenda,'<b>][Tanggal Diterima : </b>',OLD.tanggal_diterima,'<b>][ID Instansi : </b>',OLD.asal_surat,'<b>][Nomor Surat : </b>',OLD.nomor_surat,'<b>][Tanggal Surat : </b>',OLD.tanggal_surat,'<b>][Sifat Surat : </b>',OLD.sifat_surat,'<b>][Perihal : </b>',OLD.perihal,'<b>][Keterangan : </b>',OLD.keterangan,'<b>][Arsip : </b>',OLD.arsip,'<b>],<br> Data Baru = [ID Surat Masuk : </b>',NEW.id_surat_masuk,'<b>][Nomor Agenda : </b>',NEW.nomor_agenda,'<b>][Tanggal Diterima : </b>',NEW.tanggal_diterima,'<b>][ID Instansi : </b>',NEW.asal_surat,'<b>][Nomor Surat : </b>',NEW.nomor_surat,'<b>][Tanggal Surat : </b>',NEW.tanggal_surat,'<b>][Sifat Surat : </b>',NEW.sifat_surat,'<b>][Perihal : </b>',NEW.perihal,'<b>][Keterangan : </b>',NEW.keterangan,'<b>][Arsip : </b>',NEW.arsip,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `surat_masuk_insert_copy`;
DELIMITER ;;
CREATE TRIGGER `surat_masuk_insert_copy` AFTER INSERT ON `surat_masuk_copy` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>',NEW.id_surat_masuk,'<b>][Nomor Agenda : </b>',NEW.nomor_agenda,'<b>][Tanggal Diterima : </b>',NEW.tanggal_diterima,'<b>][ID Instansi : </b>',NEW.asal_surat,'<b>][Nomor Surat : </b>',NEW.nomor_surat,'<b>][Tanggal Surat : </b>',NEW.tanggal_surat,'<b>][Sifat Surat : </b>',NEW.sifat_surat,'<b>][Perihal : </b>',NEW.perihal,'<b>][Keterangan : </b>',NEW.keterangan,'<b>][Arsip : </b>',NEW.arsip,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `surat_masuk_update_copy`;
DELIMITER ;;
CREATE TRIGGER `surat_masuk_update_copy` AFTER UPDATE ON `surat_masuk_copy` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>Data Lama = [ID Surat Masuk : </b>',OLD.id_surat_masuk,'<b>][Nomor Agenda : </b>',OLD.nomor_agenda,'<b>][Tanggal Diterima : </b>',OLD.tanggal_diterima,'<b>][ID Instansi : </b>',OLD.asal_surat,'<b>][Nomor Surat : </b>',OLD.nomor_surat,'<b>][Tanggal Surat : </b>',OLD.tanggal_surat,'<b>][Sifat Surat : </b>',OLD.sifat_surat,'<b>][Perihal : </b>',OLD.perihal,'<b>][Keterangan : </b>',OLD.keterangan,'<b>][Arsip : </b>',OLD.arsip,'<b>],<br> Data Baru = [ID Surat Masuk : </b>',NEW.id_surat_masuk,'<b>][Nomor Agenda : </b>',NEW.nomor_agenda,'<b>][Tanggal Diterima : </b>',NEW.tanggal_diterima,'<b>][ID Instansi : </b>',NEW.asal_surat,'<b>][Nomor Surat : </b>',NEW.nomor_surat,'<b>][Tanggal Surat : </b>',NEW.tanggal_surat,'<b>][Sifat Surat : </b>',NEW.sifat_surat,'<b>][Perihal : </b>',NEW.perihal,'<b>][Keterangan : </b>',NEW.keterangan,'<b>][Arsip : </b>',NEW.arsip,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `config_update`;
DELIMITER ;;
CREATE TRIGGER `config_update` AFTER UPDATE ON `sys_config` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>',OLD.nama_instansi,'<b>][Alamat : </b>',OLD.alamat,'<b>][Telepon : </b>',OLD.telepon,'<b>][Fax : </b>',OLD.fax,'<b>][Email : </b>',OLD.email,'<b>][Website : </b>',OLD.website,'<b>][Logo : </b>',OLD.logo,'<b>],<br> Data Baru = [Nama Instansi : </b>',NEW.nama_instansi,'<b>][Alamat : </b>',NEW.alamat,'<b>][Telepon : </b>',NEW.telepon,'<b>][Fax : </b>',NEW.fax,'<b>][Email : </b>',NEW.email,'<b>][Website : </b>',NEW.website,'<b>][Logo : </b>',NEW.logo,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `database_insert`;
DELIMITER ;;
CREATE TRIGGER `database_insert` AFTER INSERT ON `sys_database` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data backup database pada tabel <b>sys_database</b>.<br><b>[ID : </b>',NEW.dbID,'<b>][Nama File : </b>',NEW.file_name,'<b>][Ukuran File : </b>',NEW.file_size,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `users_insert_copy_copy`;
DELIMITER ;;
CREATE TRIGGER `users_insert_copy_copy` AFTER INSERT ON `sys_users` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data user baru pada tabel <b>sys_users</b>.<br><b>[ID User : </b>',NEW.userID,'<b>][Nama User : </b>',NEW.fullname,'<b>][Username : </b>',NEW.user_account_name,'<b>][Password : </b>',NEW.user_account_password,'<b>][Hak Akses : </b>',NEW.user_permissions,'<b>][Blokir : </b>',NEW.block_users,'<b>]</b>' ));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `users_update_copy_copy`;
DELIMITER ;;
CREATE TRIGGER `users_update_copy_copy` AFTER UPDATE ON `sys_users` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>',OLD.userID,'<b>][Nama User : </b>',OLD.fullname,'<b>][Username : </b>',OLD.user_account_name,'<b>][Password : </b>',OLD.user_account_password,'<b>][Hak Akses : </b>',OLD.user_permissions,'<b>][Blokir : </b>',OLD.block_users,'<b>],<br> Data Baru = [ID User : </b>',NEW.userID,'<b>][Nama User : </b>',NEW.fullname,'<b>][Username : </b>',NEW.user_account_name,'<b>][Password : </b>',NEW.user_account_password,'<b>][Hak Akses : </b>',NEW.user_permissions,'<b>][Blokir : </b>',NEW.block_users,'<b>]</b>' ));
END
;;
DELIMITER ;
