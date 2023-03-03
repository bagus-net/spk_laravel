/*
 Navicat Premium Data Transfer

 Source Server         : bagus
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : spk-wp-topsis-laravel

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 21/02/2023 11:12:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for spk_bobot
-- ----------------------------
DROP TABLE IF EXISTS `spk_bobot`;
CREATE TABLE `spk_bobot`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kriteria` int NULL DEFAULT NULL,
  `nilai_bobot` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of spk_bobot
-- ----------------------------
INSERT INTO `spk_bobot` VALUES (1, 1, '0.4');
INSERT INTO `spk_bobot` VALUES (2, 2, '0.25');
INSERT INTO `spk_bobot` VALUES (3, 3, '0.25');
INSERT INTO `spk_bobot` VALUES (4, 4, '0.1');
INSERT INTO `spk_bobot` VALUES (5, 5, '0.25');

-- ----------------------------
-- Table structure for spk_komputer
-- ----------------------------
DROP TABLE IF EXISTS `spk_komputer`;
CREATE TABLE `spk_komputer`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `merk_komputer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type_komputer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga_komputer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stok` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of spk_komputer
-- ----------------------------
INSERT INTO `spk_komputer` VALUES (1, 'Asus', 'Paket PC Rakitan Enter School Upstream', '4.100.000', 4, NULL, NULL);
INSERT INTO `spk_komputer` VALUES (3, 'Asus', 'PC Rakitan Enter Gaming E-Sports Spectre', '6.649.000', 10, NULL, NULL);
INSERT INTO `spk_komputer` VALUES (4, 'Asrock', 'PC Rakitan EnterKomputer Gaming E-Sports Nucleus', '13.649.000', 5, NULL, NULL);

-- ----------------------------
-- Table structure for spk_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `spk_kriteria`;
CREATE TABLE `spk_kriteria`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of spk_kriteria
-- ----------------------------
INSERT INTO `spk_kriteria` VALUES (1, 'Harga', 'cost', NULL, NULL);
INSERT INTO `spk_kriteria` VALUES (2, 'Processor', 'benefit', NULL, NULL);
INSERT INTO `spk_kriteria` VALUES (3, 'Ram', 'benefit', NULL, NULL);
INSERT INTO `spk_kriteria` VALUES (4, 'Storage', 'benefit', NULL, NULL);
INSERT INTO `spk_kriteria` VALUES (5, 'Vga', 'benefit', NULL, NULL);

-- ----------------------------
-- Table structure for spk_users
-- ----------------------------
DROP TABLE IF EXISTS `spk_users`;
CREATE TABLE `spk_users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `divisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of spk_users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
