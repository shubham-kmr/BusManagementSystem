/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : bus

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-07-08 21:28:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admindetails`
-- ----------------------------
DROP TABLE IF EXISTS `admindetails`;
CREATE TABLE `admindetails` (
  `AdminID` int(10) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(30) NOT NULL,
  `Password` varchar(10) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admindetails
-- ----------------------------
INSERT INTO `admindetails` VALUES ('1', 'SHATABDI', '123');
INSERT INTO `admindetails` VALUES ('2', 'ASHOK', '123');
INSERT INTO `admindetails` VALUES ('3', 'SANGAM', '123');
INSERT INTO `admindetails` VALUES ('4', 'ARORA', '123');
INSERT INTO `admindetails` VALUES ('5', 'SHIVOY', '123');

-- ----------------------------
-- Table structure for `busdaymap`
-- ----------------------------
DROP TABLE IF EXISTS `busdaymap`;
CREATE TABLE `busdaymap` (
  `BDId` int(10) NOT NULL AUTO_INCREMENT,
  `BusNo` int(10) NOT NULL,
  `DayId` int(10) NOT NULL,
  PRIMARY KEY (`BDId`),
  KEY `BusNo` (`BusNo`),
  KEY `DayId` (`DayId`),
  CONSTRAINT `busdaymap_ibfk_1` FOREIGN KEY (`BusNo`) REFERENCES `busmaster` (`BusNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `busdaymap_ibfk_2` FOREIGN KEY (`DayId`) REFERENCES `daymaster` (`DayID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of busdaymap
-- ----------------------------
INSERT INTO `busdaymap` VALUES ('1', '7903', '5');
INSERT INTO `busdaymap` VALUES ('8', '1111', '1');
INSERT INTO `busdaymap` VALUES ('9', '1112', '1');
INSERT INTO `busdaymap` VALUES ('10', '2333', '2');
INSERT INTO `busdaymap` VALUES ('11', '2334', '3');
INSERT INTO `busdaymap` VALUES ('12', '1742', '3');
INSERT INTO `busdaymap` VALUES ('13', '1743', '4');
INSERT INTO `busdaymap` VALUES ('14', '7902', '4');
INSERT INTO `busdaymap` VALUES ('16', '7904', '1');
INSERT INTO `busdaymap` VALUES ('17', '7905', '1');
INSERT INTO `busdaymap` VALUES ('18', '1478', '6');
INSERT INTO `busdaymap` VALUES ('19', '1479', '7');
INSERT INTO `busdaymap` VALUES ('20', '5335', '2');
INSERT INTO `busdaymap` VALUES ('21', '5336', '7');

-- ----------------------------
-- Table structure for `busfaremap`
-- ----------------------------
DROP TABLE IF EXISTS `busfaremap`;
CREATE TABLE `busfaremap` (
  `BFId` int(10) NOT NULL AUTO_INCREMENT,
  `BusNo` int(10) DEFAULT NULL,
  `ClassId` int(10) DEFAULT NULL,
  `NoOfSeats` int(10) NOT NULL,
  `Fare` int(10) NOT NULL,
  PRIMARY KEY (`BFId`),
  KEY `BusNo` (`BusNo`),
  KEY `ClassId` (`ClassId`),
  CONSTRAINT `busfaremap_ibfk_1` FOREIGN KEY (`BusNo`) REFERENCES `busmaster` (`BusNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `busfaremap_ibfk_2` FOREIGN KEY (`ClassId`) REFERENCES `classmaster` (`ClassID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of busfaremap
-- ----------------------------
INSERT INTO `busfaremap` VALUES ('1', '1111', '1', '15', '800');
INSERT INTO `busfaremap` VALUES ('2', '1112', '1', '15', '800');
INSERT INTO `busfaremap` VALUES ('3', '1478', '1', '15', '750');
INSERT INTO `busfaremap` VALUES ('4', '1479', '1', '15', '750');
INSERT INTO `busfaremap` VALUES ('5', '1742', '1', '15', '300');
INSERT INTO `busfaremap` VALUES ('6', '1743', '1', '15', '300');
INSERT INTO `busfaremap` VALUES ('7', '2333', '1', '15', '900');
INSERT INTO `busfaremap` VALUES ('8', '2334', '1', '15', '900');
INSERT INTO `busfaremap` VALUES ('9', '5335', '1', '15', '1400');
INSERT INTO `busfaremap` VALUES ('10', '5336', '1', '15', '1400');
INSERT INTO `busfaremap` VALUES ('11', '7902', '1', '15', '1300');
INSERT INTO `busfaremap` VALUES ('12', '7903', '1', '15', '1300');
INSERT INTO `busfaremap` VALUES ('13', '7904', '1', '15', '900');
INSERT INTO `busfaremap` VALUES ('14', '7905', '1', '15', '900');
INSERT INTO `busfaremap` VALUES ('15', '1111', '2', '15', '1600');
INSERT INTO `busfaremap` VALUES ('16', '1112', '2', '15', '1600');
INSERT INTO `busfaremap` VALUES ('17', '1478', '2', '15', '1500');
INSERT INTO `busfaremap` VALUES ('18', '1479', '2', '15', '1500');
INSERT INTO `busfaremap` VALUES ('19', '1742', '2', '15', '600');
INSERT INTO `busfaremap` VALUES ('20', '1743', '2', '15', '600');
INSERT INTO `busfaremap` VALUES ('21', '2333', '2', '15', '1800');
INSERT INTO `busfaremap` VALUES ('22', '2334', '2', '15', '1800');
INSERT INTO `busfaremap` VALUES ('23', '5335', '2', '15', '2800');
INSERT INTO `busfaremap` VALUES ('24', '5336', '2', '15', '2800');
INSERT INTO `busfaremap` VALUES ('25', '7902', '2', '15', '2600');
INSERT INTO `busfaremap` VALUES ('26', '7903', '2', '15', '2600');
INSERT INTO `busfaremap` VALUES ('27', '7904', '2', '15', '1800');
INSERT INTO `busfaremap` VALUES ('28', '7905', '2', '15', '1800');

-- ----------------------------
-- Table structure for `busmaster`
-- ----------------------------
DROP TABLE IF EXISTS `busmaster`;
CREATE TABLE `busmaster` (
  `BusNo` int(10) NOT NULL,
  `BusName` varchar(30) NOT NULL,
  `CompanyId` int(10) NOT NULL,
  `SourceId` int(10) NOT NULL,
  `DestinationId` int(10) NOT NULL,
  `DepartureTime` time NOT NULL,
  `ArrivalTime` time NOT NULL,
  PRIMARY KEY (`BusNo`),
  KEY `CompanyId` (`CompanyId`),
  KEY `SourceId` (`SourceId`),
  KEY `DestinationId` (`DestinationId`),
  CONSTRAINT `busmaster_ibfk_3` FOREIGN KEY (`DestinationId`) REFERENCES `busstationmaster` (`StationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `busmaster_ibfk_1` FOREIGN KEY (`CompanyId`) REFERENCES `companymaster` (`CompanyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `busmaster_ibfk_2` FOREIGN KEY (`SourceId`) REFERENCES `busstationmaster` (`StationID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of busmaster
-- ----------------------------
INSERT INTO `busmaster` VALUES ('1111', 'SHIVOY', '5', '1', '10', '21:00:00', '05:00:00');
INSERT INTO `busmaster` VALUES ('1112', 'SHIVOY', '5', '10', '1', '21:00:00', '05:00:00');
INSERT INTO `busmaster` VALUES ('1478', 'SHATABADI', '1', '1', '2', '21:00:00', '08:00:00');
INSERT INTO `busmaster` VALUES ('1479', 'SHATABADI', '1', '2', '1', '21:00:00', '08:00:00');
INSERT INTO `busmaster` VALUES ('1742', 'ASHOK', '2', '3', '4', '19:00:00', '00:00:00');
INSERT INTO `busmaster` VALUES ('1743', 'ASHOK', '2', '4', '3', '19:00:00', '00:00:00');
INSERT INTO `busmaster` VALUES ('2333', 'ASHOK', '2', '3', '5', '21:00:00', '08:00:00');
INSERT INTO `busmaster` VALUES ('2334', 'ASHOK', '2', '5', '3', '21:00:00', '08:00:00');
INSERT INTO `busmaster` VALUES ('5335', 'ARORA', '4', '8', '10', '22:00:00', '12:00:00');
INSERT INTO `busmaster` VALUES ('5336', 'ARORA', '4', '10', '8', '22:00:00', '12:00:00');
INSERT INTO `busmaster` VALUES ('7902', 'SANGAM', '3', '6', '10', '00:00:00', '13:00:00');
INSERT INTO `busmaster` VALUES ('7903', 'SANGAM', '3', '10', '6', '00:00:00', '13:00:00');
INSERT INTO `busmaster` VALUES ('7904', 'SANGAM', '3', '7', '9', '07:00:00', '04:00:00');
INSERT INTO `busmaster` VALUES ('7905', 'SANGAM', '3', '9', '7', '07:00:00', '04:00:00');

-- ----------------------------
-- Table structure for `busstationmaster`
-- ----------------------------
DROP TABLE IF EXISTS `busstationmaster`;
CREATE TABLE `busstationmaster` (
  `StationID` int(10) NOT NULL,
  `StationName` varchar(40) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  PRIMARY KEY (`StationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of busstationmaster
-- ----------------------------
INSERT INTO `busstationmaster` VALUES ('1', 'KANPUR', 'KANPUR', 'UTTAR PRADESH');
INSERT INTO `busstationmaster` VALUES ('2', 'GREATER NOIDA', 'GREATER NOIDA', 'UTTAR PRADESH');
INSERT INTO `busstationmaster` VALUES ('3', 'ALLAHABAD', 'ALLAHABAD', 'UTTAR PRADESH');
INSERT INTO `busstationmaster` VALUES ('4', 'LUCKNOW', 'LUCKNOW', 'UTTAR PRADESH');
INSERT INTO `busstationmaster` VALUES ('5', 'NOIDA', 'NOIDA', 'UTTAR PRADESH');
INSERT INTO `busstationmaster` VALUES ('6', 'DELHI', 'DELHI', 'DELHI');
INSERT INTO `busstationmaster` VALUES ('7', 'AGRA', 'AGRA', 'UTTAR PRADESH');
INSERT INTO `busstationmaster` VALUES ('8', 'MEERUT', 'MEERUT', 'UTTAR PRADESH');
INSERT INTO `busstationmaster` VALUES ('9', 'VARANASI', 'VARANASI', 'UTTAR PRADESH');
INSERT INTO `busstationmaster` VALUES ('10', 'GORAKHPUR', 'GORAKHPUR', 'UTTAR PRADESH');

-- ----------------------------
-- Table structure for `classmaster`
-- ----------------------------
DROP TABLE IF EXISTS `classmaster`;
CREATE TABLE `classmaster` (
  `ClassID` int(10) NOT NULL,
  `ClassName` varchar(30) NOT NULL,
  PRIMARY KEY (`ClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of classmaster
-- ----------------------------
INSERT INTO `classmaster` VALUES ('1', 'SEATING');
INSERT INTO `classmaster` VALUES ('2', 'SLEEPER');

-- ----------------------------
-- Table structure for `companymaster`
-- ----------------------------
DROP TABLE IF EXISTS `companymaster`;
CREATE TABLE `companymaster` (
  `CompanyID` int(10) NOT NULL,
  `CompanyName` varchar(30) NOT NULL,
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of companymaster
-- ----------------------------
INSERT INTO `companymaster` VALUES ('1', 'SHATABADI TRAVELS');
INSERT INTO `companymaster` VALUES ('2', 'ASHOK TRAVELS');
INSERT INTO `companymaster` VALUES ('3', 'SANGAM TRAVELS');
INSERT INTO `companymaster` VALUES ('4', 'ARORA TRAVELS');
INSERT INTO `companymaster` VALUES ('5', 'SHIVOY TRAVELS');

-- ----------------------------
-- Table structure for `customerdetails`
-- ----------------------------
DROP TABLE IF EXISTS `customerdetails`;
CREATE TABLE `customerdetails` (
  `CustomerId` int(11) NOT NULL AUTO_INCREMENT,
  `PNRNO` double NOT NULL,
  `CustomerName` varchar(30) DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `EmailId` varchar(30) DEFAULT NULL,
  `ContactNo` decimal(10,0) DEFAULT NULL,
  `ClassId` int(10) DEFAULT NULL,
  `BusNo` int(10) DEFAULT NULL,
  `CDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CustomerId`),
  KEY `ClassId` (`ClassId`),
  KEY `BusNo` (`BusNo`),
  CONSTRAINT `customerdetails_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `classmaster` (`ClassID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customerdetails_ibfk_2` FOREIGN KEY (`BusNo`) REFERENCES `busmaster` (`BusNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customerdetails
-- ----------------------------
INSERT INTO `customerdetails` VALUES ('19', '1077112519', 'Shubham', '20', 'Male', 'kanpur', 'shubham_1996@y7mail.com', '9560254172', '1', '1478', '2017-07-08 19:04:12');

-- ----------------------------
-- Table structure for `daymaster`
-- ----------------------------
DROP TABLE IF EXISTS `daymaster`;
CREATE TABLE `daymaster` (
  `DayID` int(10) NOT NULL,
  `DayName` varchar(30) NOT NULL,
  PRIMARY KEY (`DayID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of daymaster
-- ----------------------------
INSERT INTO `daymaster` VALUES ('1', 'MONDAY');
INSERT INTO `daymaster` VALUES ('2', 'TUESDAY');
INSERT INTO `daymaster` VALUES ('3', 'WEDNESDAY');
INSERT INTO `daymaster` VALUES ('4', 'THURSDAY');
INSERT INTO `daymaster` VALUES ('5', 'FRIDAY');
INSERT INTO `daymaster` VALUES ('6', 'SATURDAY');
INSERT INTO `daymaster` VALUES ('7', 'SUNDAY');
