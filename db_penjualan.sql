/*
 Navicat Premium Data Transfer

 Source Server         : Localhost_PHP_7_3
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : db_penjualan

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 08/01/2020 09:30:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_audit_master
-- ----------------------------
DROP TABLE IF EXISTS `tbl_audit_master`;
CREATE TABLE `tbl_audit_master`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aksi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tabel` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `oleh` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` timestamp(0) NULL DEFAULT NULL,
  `src_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_audit_master
-- ----------------------------
INSERT INTO `tbl_audit_master` VALUES (1, 'Insert', 'tbl_uom', '1', '2020-01-08 01:43:19', '1');
INSERT INTO `tbl_audit_master` VALUES (2, 'Insert', 'tbl_suplier', '1', '2020-01-08 01:43:43', '1');
INSERT INTO `tbl_audit_master` VALUES (3, 'Update', 'tbl_suplier', '1', '2020-01-08 01:44:01', '1');
INSERT INTO `tbl_audit_master` VALUES (4, 'Insert', 'tbl_kategori', '1', '2020-01-08 01:45:08', '1');
INSERT INTO `tbl_audit_master` VALUES (5, 'Insert', 'tbl_barang', '1', '2020-01-08 01:45:51', '10-001');
INSERT INTO `tbl_audit_master` VALUES (6, 'Insert', 'tbl_uom', '1', '2020-01-08 01:46:35', '2');
INSERT INTO `tbl_audit_master` VALUES (7, 'Insert', 'tbl_uom', '1', '2020-01-08 01:46:46', '3');
INSERT INTO `tbl_audit_master` VALUES (8, 'Insert', 'tbl_uom', '1', '2020-01-08 01:47:03', '4');
INSERT INTO `tbl_audit_master` VALUES (9, 'Insert', 'tbl_barang', '1', '2020-01-08 01:48:48', '10-002');
INSERT INTO `tbl_audit_master` VALUES (10, 'Update', 'tbl_barang', '1', '2020-01-08 01:48:58', '10-001');
INSERT INTO `tbl_audit_master` VALUES (11, 'Update', 'tbl_barang', '1', '2020-01-08 01:49:06', '10-002');
INSERT INTO `tbl_audit_master` VALUES (12, 'Insert', 'tbl_barang', '1', '2020-01-08 01:49:47', '10-003');
INSERT INTO `tbl_audit_master` VALUES (13, 'Insert', 'tbl_barang', '1', '2020-01-08 02:00:08', '10-004');
INSERT INTO `tbl_audit_master` VALUES (14, 'Insert', 'tbl_barang', '1', '2020-01-08 02:01:27', '10-005');
INSERT INTO `tbl_audit_master` VALUES (15, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:42', '5');
INSERT INTO `tbl_audit_master` VALUES (16, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:42', '6');
INSERT INTO `tbl_audit_master` VALUES (17, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:43', '7');
INSERT INTO `tbl_audit_master` VALUES (18, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:43', '8');
INSERT INTO `tbl_audit_master` VALUES (19, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:43', '9');
INSERT INTO `tbl_audit_master` VALUES (20, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:43', '10');
INSERT INTO `tbl_audit_master` VALUES (21, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:43', '11');
INSERT INTO `tbl_audit_master` VALUES (22, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:43', '12');
INSERT INTO `tbl_audit_master` VALUES (23, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:43', '13');
INSERT INTO `tbl_audit_master` VALUES (24, 'Insert', 'tbl_uom', '1', '2020-01-08 02:07:43', '14');
INSERT INTO `tbl_audit_master` VALUES (25, 'Insert', 'tbl_barang', '1', '2020-01-08 02:09:00', 'BR000011');
INSERT INTO `tbl_audit_master` VALUES (26, 'Insert', 'tbl_barang', '1', '2020-01-08 02:12:58', '');
INSERT INTO `tbl_audit_master` VALUES (27, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-006');
INSERT INTO `tbl_audit_master` VALUES (28, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-007');
INSERT INTO `tbl_audit_master` VALUES (29, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-008');
INSERT INTO `tbl_audit_master` VALUES (30, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-009');
INSERT INTO `tbl_audit_master` VALUES (31, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-010');
INSERT INTO `tbl_audit_master` VALUES (32, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-011');
INSERT INTO `tbl_audit_master` VALUES (33, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-012');
INSERT INTO `tbl_audit_master` VALUES (34, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-013');
INSERT INTO `tbl_audit_master` VALUES (35, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-014');
INSERT INTO `tbl_audit_master` VALUES (36, 'Insert', 'tbl_barang', '1', '2020-01-08 02:13:39', '10-015');
INSERT INTO `tbl_audit_master` VALUES (37, 'Delete', 'tbl_barang', '1', '2020-01-08 02:14:24', '');
INSERT INTO `tbl_audit_master` VALUES (38, 'Update', 'tbl_barang', '1', '2020-01-08 02:23:29', '10-006');
INSERT INTO `tbl_audit_master` VALUES (39, 'Update', 'tbl_barang', '1', '2020-01-08 02:23:45', '10-012');
INSERT INTO `tbl_audit_master` VALUES (40, 'Update', 'tbl_barang', '1', '2020-01-08 02:23:53', '10-010');
INSERT INTO `tbl_audit_master` VALUES (41, 'Update', 'tbl_barang', '1', '2020-01-08 02:23:58', '10-014');
INSERT INTO `tbl_audit_master` VALUES (42, 'Update', 'tbl_barang', '1', '2020-01-08 02:24:03', '10-008');
INSERT INTO `tbl_audit_master` VALUES (43, 'Update', 'tbl_barang', '1', '2020-01-08 02:24:18', '10-007');
INSERT INTO `tbl_audit_master` VALUES (44, 'Update', 'tbl_barang', '1', '2020-01-08 02:24:25', '10-009');
INSERT INTO `tbl_audit_master` VALUES (45, 'Update', 'tbl_barang', '1', '2020-01-08 02:24:31', '10-011');
INSERT INTO `tbl_audit_master` VALUES (46, 'Insert', 'tbl_barang', '1', '2020-01-08 02:26:12', '10-016');
INSERT INTO `tbl_audit_master` VALUES (47, 'Insert', 'tbl_jual', '1', '2020-01-08 02:30:12', '080120000001');
INSERT INTO `tbl_audit_master` VALUES (48, 'Insert', 'tbl_beli', '1', '2020-01-08 02:31:44', 'BL080120000001');

-- ----------------------------
-- Table structure for tbl_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang`;
CREATE TABLE `tbl_barang`  (
  `barang_id` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `barang_nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `barang_harpok` double NULL DEFAULT NULL,
  `barang_harjul` double NULL DEFAULT NULL,
  `barang_harjul_grosir` double NULL DEFAULT NULL,
  `barang_stok` int(11) NULL DEFAULT 0,
  `barang_min_stok` int(11) NULL DEFAULT 0,
  `barang_tgl_input` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `barang_tgl_last_update` datetime(0) NULL DEFAULT NULL,
  `barang_kategori_id` int(11) NULL DEFAULT NULL,
  `barang_user_id` int(11) NULL DEFAULT NULL,
  `barang_uom_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`barang_id`) USING BTREE,
  INDEX `barang_user_id`(`barang_user_id`) USING BTREE,
  INDEX `barang_kategori_id`(`barang_kategori_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_barang
-- ----------------------------
INSERT INTO `tbl_barang` VALUES ('10-001', 'Roti', 2800, 3500, 3000, 45, 0, '2020-01-08 01:45:51', '2020-01-08 01:48:58', 1, 1, 1);
INSERT INTO `tbl_barang` VALUES ('10-002', 'Meses Coklat 1 Kg', 16000, 18000, 17000, 0, 0, '2020-01-08 01:48:47', '2020-01-08 01:49:06', 1, 1, 3);
INSERT INTO `tbl_barang` VALUES ('10-003', 'Simas 1 Kg', 16000, 18000, 17000, 0, 0, '2020-01-08 01:49:46', NULL, 1, 1, 3);
INSERT INTO `tbl_barang` VALUES ('10-004', 'BOS 250gr', 16000, 18000, 17000, 0, 0, '2020-01-08 02:00:07', NULL, 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-005', 'Selai Strawberry 250gr', 7000, 10000, 9000, 0, 0, '2020-01-08 02:01:26', NULL, 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-006', 'Selai Blueberry 250gr', 7000, 10000, 8000, -1, 0, '2020-01-08 02:13:38', '2020-01-08 02:23:29', 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-007', 'Selai Nanas 250gr', 7000, 10000, 8000, 0, 0, '2020-01-08 02:13:39', '2020-01-08 02:24:18', 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-008', 'Selai Melon 250gr', 7000, 10000, 8000, 0, 0, '2020-01-08 02:13:39', '2020-01-08 02:24:03', 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-009', 'Selai Tiramizu 250gr', 7000, 10000, 8000, 0, 0, '2020-01-08 02:13:39', '2020-01-08 02:24:25', 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-010', 'Selai Grenn Tea 250gr', 7000, 10000, 8000, 0, 0, '2020-01-08 02:13:39', '2020-01-08 02:23:53', 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-011', 'Selai Vanilla 250gr', 7000, 10000, 8000, 0, 0, '2020-01-08 02:13:39', '2020-01-08 02:24:31', 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-012', 'Selai Durian 250gr', 7000, 10000, 8000, 0, 0, '2020-01-08 02:13:39', '2020-01-08 02:23:45', 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-013', 'Keju', 7000, 10000, 8000, 0, 0, '2020-01-08 02:13:39', NULL, 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-014', 'Selai Kacang 250gr', 7000, 10000, 8000, 0, 0, '2020-01-08 02:13:39', '2020-01-08 02:23:58', 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-015', 'Kacang Cincang', 7000, 10000, 8000, 0, 0, '2020-01-08 02:13:39', NULL, 1, 1, 2);
INSERT INTO `tbl_barang` VALUES ('10-016', 'Tabung Gas 3kg', 16000, 16000, 16000, 0, 0, '2020-01-08 02:26:11', NULL, 1, 1, 4);

-- ----------------------------
-- Table structure for tbl_beli
-- ----------------------------
DROP TABLE IF EXISTS `tbl_beli`;
CREATE TABLE `tbl_beli`  (
  `beli_nofak` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `beli_tanggal` date NULL DEFAULT NULL,
  `beli_suplier_id` int(11) NULL DEFAULT NULL,
  `beli_user_id` int(11) NULL DEFAULT NULL,
  `beli_kode` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`beli_kode`) USING BTREE,
  INDEX `beli_user_id`(`beli_user_id`) USING BTREE,
  INDEX `beli_suplier_id`(`beli_suplier_id`) USING BTREE,
  INDEX `beli_id`(`beli_kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_beli
-- ----------------------------
INSERT INTO `tbl_beli` VALUES ('080120000001', '2020-01-09', 1, 1, 'BL080120000001');

-- ----------------------------
-- Table structure for tbl_detail_beli
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detail_beli`;
CREATE TABLE `tbl_detail_beli`  (
  `d_beli_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_beli_nofak` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `d_beli_barang_id` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `d_beli_harga` double NULL DEFAULT NULL,
  `d_beli_jumlah` int(11) NULL DEFAULT NULL,
  `d_beli_total` double NULL DEFAULT NULL,
  `d_beli_kode` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`d_beli_id`) USING BTREE,
  INDEX `d_beli_barang_id`(`d_beli_barang_id`) USING BTREE,
  INDEX `d_beli_nofak`(`d_beli_nofak`) USING BTREE,
  INDEX `d_beli_kode`(`d_beli_kode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detail_beli
-- ----------------------------
INSERT INTO `tbl_detail_beli` VALUES (1, '080120000001', '10-001', 2800, 45, 126000, 'BL080120000001');

-- ----------------------------
-- Table structure for tbl_detail_jual
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detail_jual`;
CREATE TABLE `tbl_detail_jual`  (
  `d_jual_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_jual_nofak` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `d_jual_barang_id` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `d_jual_barang_nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `d_jual_barang_harpok` double NULL DEFAULT NULL,
  `d_jual_barang_harjul` double NULL DEFAULT NULL,
  `d_jual_qty` int(11) NULL DEFAULT NULL,
  `d_jual_diskon` double NULL DEFAULT NULL,
  `d_jual_total` double NULL DEFAULT NULL,
  PRIMARY KEY (`d_jual_id`) USING BTREE,
  INDEX `d_jual_barang_id`(`d_jual_barang_id`) USING BTREE,
  INDEX `d_jual_nofak`(`d_jual_nofak`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detail_jual
-- ----------------------------
INSERT INTO `tbl_detail_jual` VALUES (1, '080120000001', '10-006', 'Selai Blueberry 250gr', 'gr', 7000, 10000, 1, 0, 10000);

-- ----------------------------
-- Table structure for tbl_jual
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jual`;
CREATE TABLE `tbl_jual`  (
  `jual_nofak` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jual_tanggal` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `jual_total` double NULL DEFAULT NULL,
  `jual_jml_uang` double NULL DEFAULT NULL,
  `jual_kembalian` double NULL DEFAULT NULL,
  `jual_user_id` int(11) NULL DEFAULT NULL,
  `jual_keterangan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`jual_nofak`) USING BTREE,
  INDEX `jual_user_id`(`jual_user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_jual
-- ----------------------------
INSERT INTO `tbl_jual` VALUES ('080120000001', '2020-01-08 02:30:12', 10000, 11000, 1000, 1, 'eceran');

-- ----------------------------
-- Table structure for tbl_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kategori`;
CREATE TABLE `tbl_kategori`  (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kategori_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kategori
-- ----------------------------
INSERT INTO `tbl_kategori` VALUES (1, 'Bahan Baku');

-- ----------------------------
-- Table structure for tbl_retur
-- ----------------------------
DROP TABLE IF EXISTS `tbl_retur`;
CREATE TABLE `tbl_retur`  (
  `retur_id` int(11) NOT NULL AUTO_INCREMENT,
  `retur_tanggal` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `retur_barang_id` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `retur_barang_nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `retur_barang_satuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `retur_harjul` double NULL DEFAULT NULL,
  `retur_qty` int(11) NULL DEFAULT NULL,
  `retur_subtotal` double NULL DEFAULT NULL,
  `retur_keterangan` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`retur_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_suplier
-- ----------------------------
DROP TABLE IF EXISTS `tbl_suplier`;
CREATE TABLE `tbl_suplier`  (
  `suplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `suplier_nama` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `suplier_alamat` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `suplier_notelp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`suplier_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_suplier
-- ----------------------------
INSERT INTO `tbl_suplier` VALUES (1, 'Pabrik', 'Jagalan, Jebres, Kota Surakarta', '-');

-- ----------------------------
-- Table structure for tbl_uom
-- ----------------------------
DROP TABLE IF EXISTS `tbl_uom`;
CREATE TABLE `tbl_uom`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_uom
-- ----------------------------
INSERT INTO `tbl_uom` VALUES (1, 'Biji', 'Biji');
INSERT INTO `tbl_uom` VALUES (2, 'gr', 'Gram');
INSERT INTO `tbl_uom` VALUES (3, 'Kg', 'Kilogram');
INSERT INTO `tbl_uom` VALUES (4, 'Pcs', 'Pcs');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_password` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_level` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_status` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'Gilang', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1');
INSERT INTO `tbl_user` VALUES (2, 'kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', '2', '1');

SET FOREIGN_KEY_CHECKS = 1;
