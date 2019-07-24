/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : db_penjualan

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 24/07/2019 22:55:46
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
  `barang_tgl_input` timestamp(0) NULL DEFAULT current_timestamp(0),
  `barang_tgl_last_update` datetime(0) NULL DEFAULT NULL,
  `barang_kategori_id` int(11) NULL DEFAULT NULL,
  `barang_user_id` int(11) NULL DEFAULT NULL,
  `barang_uom_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`barang_id`) USING BTREE,
  INDEX `barang_user_id`(`barang_user_id`) USING BTREE,
  INDEX `barang_kategori_id`(`barang_kategori_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_jual
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jual`;
CREATE TABLE `tbl_jual`  (
  `jual_nofak` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jual_tanggal` timestamp(0) NULL DEFAULT current_timestamp(0),
  `jual_total` double NULL DEFAULT NULL,
  `jual_jml_uang` double NULL DEFAULT NULL,
  `jual_kembalian` double NULL DEFAULT NULL,
  `jual_user_id` int(11) NULL DEFAULT NULL,
  `jual_keterangan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`jual_nofak`) USING BTREE,
  INDEX `jual_user_id`(`jual_user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kategori`;
CREATE TABLE `tbl_kategori`  (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kategori_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_retur
-- ----------------------------
DROP TABLE IF EXISTS `tbl_retur`;
CREATE TABLE `tbl_retur`  (
  `retur_id` int(11) NOT NULL AUTO_INCREMENT,
  `retur_tanggal` timestamp(0) NULL DEFAULT current_timestamp(0),
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_uom
-- ----------------------------
DROP TABLE IF EXISTS `tbl_uom`;
CREATE TABLE `tbl_uom`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `tbl_user` VALUES (1, 'M Fikri Setiadi', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1');
INSERT INTO `tbl_user` VALUES (2, 'fikri', 'kasir', 'e10adc3949ba59abbe56e057f20f883e', '2', '1');

SET FOREIGN_KEY_CHECKS = 1;
