SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS 2w4GSUinHO;

USE 2w4GSUinHO;

DROP TABLE IF EXISTS cuentas_por_cobrar;

CREATE TABLE `cuentas_por_cobrar` (
  `Id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `Id_cliente` int(11) DEFAULT NULL,
  `Cuentas` varchar(50) DEFAULT NULL,
  `Tipo_Cuenta` varchar(25) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Deuda_Cuenta_Total` decimal(10,0) DEFAULT NULL,
  `Deposito` decimal(10,0) DEFAULT NULL,
  `Deuda_Actual` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO cuentas_por_cobrar VALUES("9","8","Utilidad antes de impuestos","activo","N/D","500","100","400");
INSERT INTO cuentas_por_cobrar VALUES("10","0","ACTIVO                              ","","Servicios contables para el mes de Julio","1175","0","0");



DROP TABLE IF EXISTS cuentas_por_pagar;

CREATE TABLE `cuentas_por_pagar` (
  `Id_Cuenta` int(100) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(10) NOT NULL,
  `Cuentas` varchar(50) NOT NULL,
  `Tipo_Cuenta` varchar(25) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS empresa;

CREATE TABLE `empresa` (
  `id_empresa` int(100) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(200) NOT NULL,
  `ruc` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `imagen` varchar(2000) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `simbolo_moneda` varchar(200) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO empresa VALUES("1","INVERSIONES FINANCIERAS - IS","200","Tegucigalpa","2424-2334","Empresa Financiera","2021-07-24_23.08.46.png","@gmail.com","L.");
INSERT INTO empresa VALUES("2","Tomate","rojo","far away","5050-5050","nice","","@gmail.com","L.");



DROP TABLE IF EXISTS factura;

CREATE TABLE `factura` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NFACTURA` int(11) DEFAULT NULL,
  `CLIENTE` varchar(255) DEFAULT NULL,
  `DESCRIPCION` varchar(80) DEFAULT NULL,
  `TOTAL` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO factura VALUES("1","121544","Larach","Servicios contables para el mes de Julio","2500");
INSERT INTO factura VALUES("2","584587","Fernando","Servicios contables para el mes de Julio","3500");
INSERT INTO factura VALUES("3","98977","Fernando","Servicios contables para el mes de Julio","5000");
INSERT INTO factura VALUES("7","854785","Fernando","Servicios contables para el mes de Julio","2975");
INSERT INTO factura VALUES("14","125487","Anonimo","Servicios contables para el mes de Julio","2975");
INSERT INTO factura VALUES("15","125487","Anonimo","Servicios contables para el mes de Julio","1175");
INSERT INTO factura VALUES("16","125487","Anonimo","Servicios contables para el mes de Julio","0");
INSERT INTO factura VALUES("17","125487","Anonimo","Servicios contables para el mes de Julio","1175");
INSERT INTO factura VALUES("18","125487","Anonimo","Servicios contables para el mes de Julio","1175");
INSERT INTO factura VALUES("19","0","","Servicios contables para el mes de Julio","0");



DROP TABLE IF EXISTS history_log;

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

INSERT INTO history_log VALUES("1","1","has logged in the system at ","2018-11-27 07:58:26");
INSERT INTO history_log VALUES("2","1","has logged out the system at ","2018-11-27 07:59:03");
INSERT INTO history_log VALUES("3","1","has logged in the system at ","2018-11-30 22:32:20");
INSERT INTO history_log VALUES("4","6","has logged in the system at ","2018-12-01 20:28:15");
INSERT INTO history_log VALUES("13","1","has logged out the system at ","2018-11-30 22:42:36");
INSERT INTO history_log VALUES("14","1","has logged in the system at ","2018-12-04 11:12:37");
INSERT INTO history_log VALUES("15","1","has logged in the system at ","2018-12-19 10:16:00");
INSERT INTO history_log VALUES("16","1","has logged in the system at ","2018-12-19 10:21:46");
INSERT INTO history_log VALUES("17","1","has logged in the system at ","2018-12-19 10:27:32");
INSERT INTO history_log VALUES("18","1","has logged in the system at ","2018-12-19 10:33:11");
INSERT INTO history_log VALUES("19","1","se ha desconectado el sistema en ","2018-12-19 10:39:49");
INSERT INTO history_log VALUES("20","1","has logged in the system at ","2018-12-19 10:40:01");
INSERT INTO history_log VALUES("21","1","se ha desconectado el sistema en ","2018-12-19 10:40:04");
INSERT INTO history_log VALUES("22","1","has logged in the system at ","2018-12-19 10:42:35");
INSERT INTO history_log VALUES("23","1","se ha desconectado el sistema en ","2018-12-19 10:42:44");
INSERT INTO history_log VALUES("24","1","has logged in the system at ","2018-12-19 10:43:07");
INSERT INTO history_log VALUES("25","1","se ha desconectado el sistema en ","2018-12-19 10:44:35");
INSERT INTO history_log VALUES("26","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-14 10:55:46");
INSERT INTO history_log VALUES("27","1","se ha desconectado el sistema en ","2019-01-14 11:02:35");
INSERT INTO history_log VALUES("28","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-14 11:02:41");
INSERT INTO history_log VALUES("29","1","se ha desconectado el sistema en ","2019-01-14 11:09:15");
INSERT INTO history_log VALUES("30","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-16 21:05:23");
INSERT INTO history_log VALUES("31","1","se ha desconectado el sistema en ","2019-01-16 21:05:32");
INSERT INTO history_log VALUES("32","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-16 21:06:19");
INSERT INTO history_log VALUES("33","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-16 21:09:39");
INSERT INTO history_log VALUES("34","1","se ha desconectado el sistema en ","2019-01-16 21:12:48");
INSERT INTO history_log VALUES("35","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-16 21:12:52");
INSERT INTO history_log VALUES("36","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-16 22:33:53");
INSERT INTO history_log VALUES("37","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-17 08:50:57");
INSERT INTO history_log VALUES("38","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-17 22:37:23");
INSERT INTO history_log VALUES("39","1","se ha desconectado el sistema en ","2019-01-18 01:25:04");
INSERT INTO history_log VALUES("40","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-18 03:35:56");
INSERT INTO history_log VALUES("41","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-18 08:25:58");
INSERT INTO history_log VALUES("42","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-18 20:31:12");
INSERT INTO history_log VALUES("43","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-19 06:39:38");
INSERT INTO history_log VALUES("44","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-20 01:27:24");
INSERT INTO history_log VALUES("45","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-20 01:43:21");
INSERT INTO history_log VALUES("46","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-20 02:56:46");
INSERT INTO history_log VALUES("47","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-20 10:44:05");
INSERT INTO history_log VALUES("48","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-20 11:13:20");
INSERT INTO history_log VALUES("49","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-21 11:27:47");
INSERT INTO history_log VALUES("50","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-23 01:38:33");
INSERT INTO history_log VALUES("51","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-23 07:15:31");
INSERT INTO history_log VALUES("52","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-23 10:39:09");
INSERT INTO history_log VALUES("53","1","ha iniciado sesiÃ³n en el sistema en ","2019-01-23 20:39:13");
INSERT INTO history_log VALUES("54","1","se ha desconectado el sistema en ","2019-01-24 01:32:13");
INSERT INTO history_log VALUES("55","1","se ha desconectado el sistema en ","2019-01-24 01:46:48");
INSERT INTO history_log VALUES("56","1","se ha desconectado el sistema en ","2019-01-24 01:48:41");
INSERT INTO history_log VALUES("57","1","se ha desconectado el sistema en ","2019-01-24 01:48:52");
INSERT INTO history_log VALUES("58","1","se ha desconectado el sistema en ","2019-01-24 01:49:01");
INSERT INTO history_log VALUES("59","1","se ha desconectado el sistema en ","2019-01-24 01:52:37");
INSERT INTO history_log VALUES("60","1","se ha desconectado el sistema en ","2019-01-24 01:55:52");
INSERT INTO history_log VALUES("61","1","se ha desconectado el sistema en ","2019-01-24 02:50:25");
INSERT INTO history_log VALUES("62","1","se ha desconectado el sistema en ","2019-01-25 18:59:42");
INSERT INTO history_log VALUES("63","1","se ha desconectado el sistema en ","2019-01-26 12:13:01");
INSERT INTO history_log VALUES("64","1","se ha desconectado el sistema en ","2019-01-26 12:39:03");
INSERT INTO history_log VALUES("65","1","se ha desconectado el sistema en ","2019-01-26 21:34:43");
INSERT INTO history_log VALUES("66","1","se ha desconectado el sistema en ","2019-01-26 21:35:05");
INSERT INTO history_log VALUES("67","1","se ha desconectado el sistema en ","2019-01-26 21:36:18");
INSERT INTO history_log VALUES("68","1","se ha desconectado el sistema en ","2019-01-26 21:37:19");
INSERT INTO history_log VALUES("69","1","se ha desconectado el sistema en ","2019-01-26 21:40:18");
INSERT INTO history_log VALUES("70","1","se ha desconectado el sistema en ","2019-01-26 21:42:37");
INSERT INTO history_log VALUES("71","2","se ha desconectado el sistema en ","2019-01-26 21:53:27");
INSERT INTO history_log VALUES("72","3","se ha desconectado el sistema en ","2019-01-26 23:53:55");
INSERT INTO history_log VALUES("73","2","se ha desconectado el sistema en ","2019-01-27 00:02:46");
INSERT INTO history_log VALUES("74","3","se ha desconectado el sistema en ","2019-01-27 00:26:04");
INSERT INTO history_log VALUES("75","3","se ha desconectado el sistema en ","2019-01-27 00:27:37");
INSERT INTO history_log VALUES("76","4","se ha desconectado el sistema en ","2019-01-27 00:28:53");
INSERT INTO history_log VALUES("77","0","se ha desconectado el sistema en ","2019-02-01 10:49:35");
INSERT INTO history_log VALUES("78","1","se ha desconectado el sistema en ","2019-02-02 01:10:46");
INSERT INTO history_log VALUES("79","1","se ha desconectado el sistema en ","2019-02-08 13:27:52");
INSERT INTO history_log VALUES("80","1","se ha desconectado el sistema en ","2019-02-08 13:29:04");
INSERT INTO history_log VALUES("81","1","se ha desconectado el sistema en ","2019-02-11 12:13:25");
INSERT INTO history_log VALUES("82","1","se ha desconectado el sistema en ","2019-02-17 23:59:49");
INSERT INTO history_log VALUES("83","1","se ha desconectado el sistema en ","2019-02-19 22:06:23");
INSERT INTO history_log VALUES("84","1","se ha desconectado el sistema en ","2019-02-22 23:20:09");
INSERT INTO history_log VALUES("85","1","se ha desconectado el sistema en ","2019-03-30 08:37:10");
INSERT INTO history_log VALUES("86","1","se ha desconectado el sistema en ","2019-04-19 23:40:42");
INSERT INTO history_log VALUES("87","1","se ha desconectado el sistema en ","2019-04-20 00:34:27");
INSERT INTO history_log VALUES("88","1","se ha desconectado el sistema en ","2019-04-24 08:25:28");
INSERT INTO history_log VALUES("89","1","se ha desconectado el sistema en ","2019-04-24 11:54:04");
INSERT INTO history_log VALUES("90","1","se ha desconectado el sistema en ","2019-04-25 10:14:44");
INSERT INTO history_log VALUES("91","1","se ha desconectado el sistema en ","2019-04-25 23:41:34");
INSERT INTO history_log VALUES("92","1","se ha desconectado el sistema en ","2019-04-26 00:25:33");
INSERT INTO history_log VALUES("93","1","se ha desconectado el sistema en ","2019-04-26 04:25:46");
INSERT INTO history_log VALUES("94","1","se ha desconectado el sistema en ","2019-04-28 10:09:37");
INSERT INTO history_log VALUES("95","1","se ha desconectado el sistema en ","2019-05-29 04:17:06");
INSERT INTO history_log VALUES("96","1","se ha desconectado el sistema en ","2019-05-30 11:27:19");
INSERT INTO history_log VALUES("97","1","se ha desconectado el sistema en ","2019-06-04 23:14:56");
INSERT INTO history_log VALUES("98","1","se ha desconectado el sistema en ","2019-06-27 03:36:33");
INSERT INTO history_log VALUES("99","1","se ha desconectado el sistema en ","2019-06-27 07:59:50");
INSERT INTO history_log VALUES("100","1","se ha desconectado el sistema en ","2019-08-11 05:41:03");
INSERT INTO history_log VALUES("101","1","se ha desconectado el sistema en ","2019-08-29 11:38:25");
INSERT INTO history_log VALUES("102","1","se ha desconectado el sistema en ","2019-09-07 11:16:16");
INSERT INTO history_log VALUES("103","5","se ha desconectado el sistema en ","2019-09-07 11:52:24");
INSERT INTO history_log VALUES("104","5","se ha desconectado el sistema en ","2019-09-07 12:13:49");
INSERT INTO history_log VALUES("105","5","se ha desconectado el sistema en ","2019-09-07 12:19:01");
INSERT INTO history_log VALUES("106","5","se ha desconectado el sistema en ","2019-09-07 12:27:56");
INSERT INTO history_log VALUES("107","5","se ha desconectado el sistema en ","2019-09-08 09:00:40");
INSERT INTO history_log VALUES("108","5","se ha desconectado el sistema en ","2019-09-08 09:00:47");
INSERT INTO history_log VALUES("109","5","se ha desconectado el sistema en ","2020-01-10 11:04:44");
INSERT INTO history_log VALUES("110","5","se ha desconectado el sistema en ","2020-01-10 11:04:54");
INSERT INTO history_log VALUES("111","5","se ha desconectado el sistema en ","2020-01-10 11:30:46");
INSERT INTO history_log VALUES("112","5","se ha desconectado el sistema en ","2020-01-10 11:38:04");
INSERT INTO history_log VALUES("113","5","se ha desconectado el sistema en ","2020-01-11 11:41:09");
INSERT INTO history_log VALUES("114","5","se ha desconectado el sistema en ","2020-01-11 11:42:57");
INSERT INTO history_log VALUES("115","5","se ha desconectado el sistema en ","2020-01-11 11:58:26");
INSERT INTO history_log VALUES("116","5","se ha desconectado el sistema en ","2020-01-11 22:51:04");
INSERT INTO history_log VALUES("117","5","se ha desconectado el sistema en ","2020-01-12 00:54:49");
INSERT INTO history_log VALUES("118","5","se ha desconectado el sistema en ","2020-01-12 11:04:17");
INSERT INTO history_log VALUES("119","5","se ha desconectado el sistema en ","2020-01-12 11:51:05");
INSERT INTO history_log VALUES("120","5","se ha desconectado el sistema en ","2020-01-12 11:52:16");
INSERT INTO history_log VALUES("121","5","se ha desconectado el sistema en ","2020-01-12 11:52:21");
INSERT INTO history_log VALUES("122","5","se ha desconectado el sistema en ","2020-01-12 11:53:48");
INSERT INTO history_log VALUES("123","5","se ha desconectado el sistema en ","2020-01-12 11:54:34");
INSERT INTO history_log VALUES("124","5","se ha desconectado el sistema en ","2020-01-12 11:55:40");
INSERT INTO history_log VALUES("125","5","se ha desconectado el sistema en ","2020-01-12 11:55:44");
INSERT INTO history_log VALUES("126","5","se ha desconectado el sistema en ","2020-01-12 11:55:58");
INSERT INTO history_log VALUES("127","5","se ha desconectado el sistema en ","2020-01-12 11:56:08");
INSERT INTO history_log VALUES("128","5","se ha desconectado el sistema en ","2020-01-13 05:59:34");
INSERT INTO history_log VALUES("129","5","se ha desconectado el sistema en ","2020-01-13 09:18:38");
INSERT INTO history_log VALUES("130","5","se ha desconectado el sistema en ","2020-01-13 14:12:00");
INSERT INTO history_log VALUES("131","5","se ha desconectado el sistema en ","2020-01-13 14:31:57");
INSERT INTO history_log VALUES("132","5","se ha desconectado el sistema en ","2020-01-13 14:32:32");
INSERT INTO history_log VALUES("133","5","se ha desconectado el sistema en ","2020-01-15 09:29:50");
INSERT INTO history_log VALUES("134","5","se ha desconectado el sistema en ","2020-02-08 04:28:27");
INSERT INTO history_log VALUES("135","5","se ha desconectado el sistema en ","2020-02-09 07:02:23");
INSERT INTO history_log VALUES("136","5","se ha desconectado el sistema en ","2020-02-12 11:12:23");
INSERT INTO history_log VALUES("137","5","se ha desconectado el sistema en ","2020-02-12 12:07:49");
INSERT INTO history_log VALUES("138","5","se ha desconectado el sistema en ","2020-02-12 13:20:43");
INSERT INTO history_log VALUES("139","5","se ha desconectado el sistema en ","2020-02-12 22:28:22");
INSERT INTO history_log VALUES("140","5","se ha desconectado el sistema en ","2020-02-12 22:55:52");
INSERT INTO history_log VALUES("141","6","se ha desconectado el sistema en ","2020-02-12 22:56:20");
INSERT INTO history_log VALUES("142","5","se ha desconectado el sistema en ","2020-02-12 22:57:49");
INSERT INTO history_log VALUES("143","5","se ha desconectado el sistema en ","2020-02-13 00:30:01");
INSERT INTO history_log VALUES("144","5","se ha desconectado el sistema en ","2020-02-13 01:03:55");
INSERT INTO history_log VALUES("145","5","se ha desconectado el sistema en ","2020-02-13 01:51:57");
INSERT INTO history_log VALUES("146","5","se ha desconectado el sistema en ","2020-02-13 19:58:42");
INSERT INTO history_log VALUES("147","5","se ha desconectado el sistema en ","2020-02-13 20:09:10");
INSERT INTO history_log VALUES("148","5","se ha desconectado el sistema en ","2022-08-01 15:59:04");
INSERT INTO history_log VALUES("149","5","se ha desconectado el sistema en ","2022-08-01 16:17:42");
INSERT INTO history_log VALUES("150","0","se ha desconectado el sistema en ","2022-08-01 16:37:08");
INSERT INTO history_log VALUES("151","0","se ha desconectado el sistema en ","2022-08-01 16:37:43");
INSERT INTO history_log VALUES("152","5","se ha desconectado el sistema en ","2022-08-01 18:43:20");
INSERT INTO history_log VALUES("153","1","se ha desconectado el sistema en ","2022-08-10 22:29:03");



DROP TABLE IF EXISTS libro;

CREATE TABLE `libro` (
  `id_libro` int(200) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `cuenta` varchar(200) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `monto` float NOT NULL,
  `debe_haber` varchar(200) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `temporada` varchar(10) NOT NULL,
  `id_usuario` int(200) NOT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

INSERT INTO libro VALUES("123","2022-08-09 00:00:00","Bancos","N/D","200","debe","8","10","1");
INSERT INTO libro VALUES("124","2022-08-12 00:00:00","Caja","N/D","1000","debe","8","10","1");
INSERT INTO libro VALUES("125","2022-08-11 00:00:00","Cuentas x Cobrar","N/D","500","debe","8","10","1");
INSERT INTO libro VALUES("126","2022-08-26 00:00:00","Documentos por cobrar","N/D","300","debe","8","10","1");
INSERT INTO libro VALUES("127","2022-08-16 00:00:00","Documentos por cobrar","N/D","2000","debe","8","10","1");
INSERT INTO libro VALUES("128","2022-08-13 00:00:00","Pagos Anticipados","N/D","100","debe","8","10","1");
INSERT INTO libro VALUES("129","2022-08-26 00:00:00","Caja","N/D","500","haber","8","10","1");
INSERT INTO libro VALUES("130","2022-08-11 00:00:00","Edificios","N/D","500","debe","8","10","1");
INSERT INTO libro VALUES("131","2022-08-26 00:00:00","Bancos","N/D","1000","debe","8","10","1");
INSERT INTO libro VALUES("132","2022-08-11 00:00:00","Bancos","N/D","1000","debe","8","10","1");
INSERT INTO libro VALUES("133","2022-08-18 00:00:00","Bancos","N/D","1000","debe","1","10","1");
INSERT INTO libro VALUES("134","2022-08-30 00:00:00","Bancos","N/D","1000","haber","8","10","1");
INSERT INTO libro VALUES("135","2022-08-24 00:00:00","Depreciacion Acumulada","N/D","1000","haber","8","10","1");
INSERT INTO libro VALUES("136","2022-08-18 00:00:00","Capital Social","N/D","3000","debe","8","10","1");
INSERT INTO libro VALUES("137","2022-08-18 00:00:00","Caja","N/D","1000","debe","1","10","1");
INSERT INTO libro VALUES("138","2022-08-25 00:00:00","Caja","N/D","500","debe","9","10","1");
INSERT INTO libro VALUES("139","2022-09-14 00:00:00","Caja","N/D","1000","debe","1","10","1");
INSERT INTO libro VALUES("140","2022-09-01 00:00:00","Cuentas x Cobrar","N/D","1000","debe","1","10","1");
INSERT INTO libro VALUES("141","2022-08-01 00:00:00","Bancos","N/D","200","debe","8","10","1");
INSERT INTO libro VALUES("142","2022-09-03 00:00:00","Caja","N/D","1000","debe","8","10","1");
INSERT INTO libro VALUES("143","2022-11-15 00:00:00","Caja","N/D","1000","debe","4","10","1");
INSERT INTO libro VALUES("144","2022-10-20 00:00:00","Pagos Anticipados","N/D","500","debe","9","10","1");
INSERT INTO libro VALUES("145","2022-09-22 00:00:00","Caja","N/D","500","debe","4","10","1");
INSERT INTO libro VALUES("146","2022-08-17 00:00:00","Documentos por cobrar","N/D","250","debe","9","10","1");
INSERT INTO libro VALUES("147","2022-08-12 00:00:00","","N/D","500","debe","8","10","1");
INSERT INTO libro VALUES("148","2022-09-27 00:00:00","Cuentas x Cobrar","gastos varios","670","debe","1","10","1");
INSERT INTO libro VALUES("149","2022-09-27 00:00:00","Inventario","tenemos","600","debe","1","10","1");
INSERT INTO libro VALUES("150","2022-09-08 00:00:00","Bancos","tenemos","445","debe","1","10","1");
INSERT INTO libro VALUES("151","2022-09-27 00:00:00","Pagos Anticipados","PRUEBA","520","debe","1","10","1");
INSERT INTO libro VALUES("152","2022-09-27 00:00:00","Cuentas x Cobrar","gastos varios","200","debe","1","10","1");
INSERT INTO libro VALUES("153","2022-09-27 00:00:00","Cuentas x Cobrar","gastos varios","50","haber","1","10","1");



DROP TABLE IF EXISTS libro2;

CREATE TABLE `libro2` (
  `id_libro` int(200) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cuenta` varchar(200) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `monto` float NOT NULL,
  `debe_haber` varchar(200) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `temporada` varchar(10) NOT NULL,
  `id_usuario` int(200) NOT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO libro2 VALUES("1","2022-08-12","Venta","N/D","250","debe","8","10","1");
INSERT INTO libro2 VALUES("2","2022-08-11","Costo de venta","N/D","500","debe","8","10","1");
INSERT INTO libro2 VALUES("4","2022-08-17","Utilidad antes de impuestos","N/D","100","","8","10","1");
INSERT INTO libro2 VALUES("5","2022-10-18","Gastos de administracion","ND","500","","4","10","84");
INSERT INTO libro2 VALUES("6","2022-10-23","Costo de venta","dxc","250","","4","10","84");



DROP TABLE IF EXISTS product;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proname` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

INSERT INTO product VALUES("128","IMPRESORA","0","2022-08-10 21:54:36");
INSERT INTO product VALUES("129","TINTAS EPSON","8","2022-08-10 21:56:35");
INSERT INTO product VALUES("130","CARPETAS","50","2022-08-10 21:57:36");
INSERT INTO product VALUES("131","FOLDERS","20","2022-08-10 21:58:07");
INSERT INTO product VALUES("132","lapiz","6","2022-08-10 19:16:09");
INSERT INTO product VALUES("133","","","2022-10-15 15:51:41");
INSERT INTO product VALUES("134","Foco","10","2022-10-15 15:52:20");



DROP TABLE IF EXISTS tbl_balance;

CREATE TABLE `tbl_balance` (
  `Id_Balance` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) DEFAULT NULL,
  `Total_Activo` int(11) DEFAULT NULL,
  `Total_Pasivo` int(11) DEFAULT NULL,
  `Total_Patrimonio` int(11) DEFAULT NULL,
  `Total_Pasivo_Patrimonio` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Balance`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_balance VALUES("2","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("3","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("4","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("5","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("6","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("7","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("8","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("9","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("10","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("11","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("12","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("13","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("14","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("15","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("16","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("17","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("18","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("19","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("20","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("21","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("22","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("23","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("24","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("25","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("26","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("27","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("28","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("29","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("30","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("31","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("32","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("33","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("34","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("35","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("36","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("37","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("38","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("39","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("40","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("41","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("42","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("43","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("44","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("45","0","0","0","0","0");
INSERT INTO tbl_balance VALUES("46","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("47","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("48","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("49","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("50","8","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("51","8","4300","0","3000","3000");



DROP TABLE IF EXISTS tbl_bodega_inventario;

CREATE TABLE `tbl_bodega_inventario` (
  `Id_Inventario` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Empresa` int(10) NOT NULL,
  `Id_Proveedor` int(10) NOT NULL,
  `Nombre_Producto` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Precio` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Inventario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_bodega_inventario VALUES("1","2","1","Libros","Para realizar partidas","50","amigo","sin existencia","2022-08-14","2");
INSERT INTO tbl_bodega_inventario VALUES("2","5","5","Cuadernos","Espiral","405","Copan","Existencia","2022-08-02","1");
INSERT INTO tbl_bodega_inventario VALUES("3","2","1","Libros","Para Realizar partidas","50","amigo","sin existencia","2022-08-02","2");
INSERT INTO tbl_bodega_inventario VALUES("4","5","5","cuadernos","Espiral","405","copan","Existencia","2022-08-08","1");



DROP TABLE IF EXISTS tbl_catalago_cuentas;

CREATE TABLE `tbl_catalago_cuentas` (
  `CODIGO_CUENTA` int(11) DEFAULT NULL,
  `ID_CLIENTE` decimal(10,0) DEFAULT NULL,
  `CUENTA` varchar(40) DEFAULT NULL,
  `CLASIFICACION` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_catalago_cuentas VALUES("111201","0","Bancos","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("111101","0","Caja","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("112101","0","Cuentas x Cobrar","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("112102","0","Documentos por cobrar","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("113301","0","Pagos Anticipados","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("113101","0","Inventario","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("1222","0","Edificios","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("122401","0","Otros Activos","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("112402","0","Depreciacion Acumulada","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("222101","0","Deuda a Corto Plazo","PASIVO");
INSERT INTO tbl_catalago_cuentas VALUES("222102","0","Provisiones a Corto Plazo","PASIVO");
INSERT INTO tbl_catalago_cuentas VALUES("222103","0","Cuentas por Pagar","PASIVO");
INSERT INTO tbl_catalago_cuentas VALUES("222201","0","Proveedores","PASIVO");
INSERT INTO tbl_catalago_cuentas VALUES("222104","0","Deuda a Largo Plazo","PASIVO");
INSERT INTO tbl_catalago_cuentas VALUES("222105","0","Provisiones a Largo Plazo","Pasivo");
INSERT INTO tbl_catalago_cuentas VALUES("333301","0","Capital Social","PATRIMONIO");
INSERT INTO tbl_catalago_cuentas VALUES("333302","0","Utilidades Retenidas","PATRIMONIO");
INSERT INTO tbl_catalago_cuentas VALUES("333303","0","Reservas","PATRIMONIO");



DROP TABLE IF EXISTS tbl_catalago_estado;

CREATE TABLE `tbl_catalago_estado` (
  `CODIGO_CUENTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_CUENTA`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_catalago_estado VALUES("1","0","Venta");
INSERT INTO tbl_catalago_estado VALUES("2","0","Costo de venta");
INSERT INTO tbl_catalago_estado VALUES("5","0","Gastos de venta");
INSERT INTO tbl_catalago_estado VALUES("6","0","Gastos de administracion");
INSERT INTO tbl_catalago_estado VALUES("7","0","Gastos financieros");
INSERT INTO tbl_catalago_estado VALUES("9","0","Otros ingresos ");
INSERT INTO tbl_catalago_estado VALUES("11","0","Impuesto ");
INSERT INTO tbl_catalago_estado VALUES("12","0","Otros Gastos");



DROP TABLE IF EXISTS tbl_clientes;

CREATE TABLE `tbl_clientes` (
  `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Empresa` varchar(100) DEFAULT NULL,
  `Nombre_Cliente` varchar(50) DEFAULT NULL,
  `RTN_Cliente` varchar(15) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Tipo_Cliente` varchar(20) DEFAULT NULL,
  `Ciudad` varchar(25) DEFAULT NULL,
  `Fecha_Dato` datetime NOT NULL DEFAULT current_timestamp(),
  `caja` int(25) NOT NULL,
  PRIMARY KEY (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_clientes VALUES("1","empresa conera","Allan caseres","12345678910","carrizal","12356789","activo","tegucigalpa","2022-07-25 14:07:08","0");
INSERT INTO tbl_clientes VALUES("4","jubilados","Mauricio Hernandez ","10987654321","centro","335558595","activo","tegucigalpa","2022-07-25 20:39:42","200");
INSERT INTO tbl_clientes VALUES("8","panaderia ","Hernandez SA","4566878","carrizal","89574085","activo","tegucigalpa","2022-07-26 11:03:25","103723");
INSERT INTO tbl_clientes VALUES("9","inversiones jd","juansito Rojas","2147483647","unah","96769885","activo","Tegucigalpa","2022-07-27 22:04:12","11800");
INSERT INTO tbl_clientes VALUES("10","bimbo","maira bella","2147483647","unah","96769885","activo","Tegucigalpa","2022-08-08 23:01:57","0");



DROP TABLE IF EXISTS tbl_compras;

CREATE TABLE `tbl_compras` (
  `Id_Compra` int(10) NOT NULL AUTO_INCREMENT,
  `No_Factura` int(25) NOT NULL,
  `Tipo_Compra` varchar(25) NOT NULL,
  `Tipo_Producto` varchar(35) NOT NULL,
  `Precio_unitario` int(40) NOT NULL,
  `Cantidad` int(20) NOT NULL,
  `Fecha_de_Ingreso` date NOT NULL,
  `Detalle` varchar(40) NOT NULL,
  `Total_Compra` decimal(30,0) NOT NULL,
  PRIMARY KEY (`Id_Compra`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_compras VALUES("2","1022023","credito","insumo oficina","300","20","2022-07-04","Impresora","300");



DROP TABLE IF EXISTS tbl_errores;

CREATE TABLE `tbl_errores` (
  `COD_ERROR` int(11) NOT NULL,
  `ERROR` varchar(250) DEFAULT NULL,
  `CODIGO` varchar(15) DEFAULT NULL,
  `MENSAJE` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_errores VALUES("1","No se puede conectar a la base de datos","ERR-001","Revise las credenciales de conexion hacia la base de datos");
INSERT INTO tbl_errores VALUES("2","No se puede hacer la consulta a la base de datos","ERR-002","Se presento un error en la consulta hacia la tabla TBL_USUARIO");
INSERT INTO tbl_errores VALUES("3","Error en la consulta hacia la tabla PARAMETROS","ERR-003","Ocurrio un error en la llamada de los parametros");
INSERT INTO tbl_errores VALUES("4","Error en la proceso de actualizacion del estado en la tabla TBL_USUARIO","ERR-004","Revise la consulta hacía la base de datos");



DROP TABLE IF EXISTS tbl_estado;

CREATE TABLE `tbl_estado` (
  `CODIGO_CUENTA` int(11) DEFAULT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_estado VALUES("0","0","Venta");
INSERT INTO tbl_estado VALUES("0","0","Costo de venta");
INSERT INTO tbl_estado VALUES("0","0","Utilidad bruta");
INSERT INTO tbl_estado VALUES("0","0","Gastos de operacion");
INSERT INTO tbl_estado VALUES("0","0","Gastos de venta");
INSERT INTO tbl_estado VALUES("0","0","Gastos de administracion");
INSERT INTO tbl_estado VALUES("0","0","Gastos financieros");
INSERT INTO tbl_estado VALUES("0","0","Utilidad de operacion");
INSERT INTO tbl_estado VALUES("0","0","Otros ingresos no operativos");
INSERT INTO tbl_estado VALUES("0","0","Utilidad antes de impuestos");
INSERT INTO tbl_estado VALUES("0","0","Impuesto a la utilidad");



DROP TABLE IF EXISTS tbl_estado_resultado;

CREATE TABLE `tbl_estado_resultado` (
  `Id_Estado_R` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) NOT NULL,
  `Utilida_Bruta` int(11) NOT NULL,
  `Total_Gasto` int(11) NOT NULL,
  `Utilidad_Operacion` int(11) NOT NULL,
  `Utilidad_Antes_Impu` int(11) NOT NULL,
  `Utilidad_Neta` int(11) NOT NULL,
  PRIMARY KEY (`Id_Estado_R`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_estado_resultado VALUES("24","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("25","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("26","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("27","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("28","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("29","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("30","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("31","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("32","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("33","8","-250","0","-250","-250","-250");
INSERT INTO tbl_estado_resultado VALUES("34","8","-250","0","-250","-250","-250");



DROP TABLE IF EXISTS tbl_kardex;

CREATE TABLE `tbl_kardex` (
  `id_usuario` int(11) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `fecha` varchar(30) DEFAULT NULL,
  `detalle` varchar(15) DEFAULT NULL,
  `nproducto` varchar(30) DEFAULT NULL,
  `cant_entrada` int(11) DEFAULT NULL,
  `total_cante` decimal(10,0) DEFAULT NULL,
  `cant_salida` int(11) DEFAULT NULL,
  `total_cants` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_kardex VALUES("0","","10-08-2022","ENTRADA","IMPRESORA","5","17250","0","0");
INSERT INTO tbl_kardex VALUES("0","","08-10-2022 03:54:52 pm","SALIDA","IMPRESORA                     ","0","0","2","6900");
INSERT INTO tbl_kardex VALUES("0","","10-08-2022","ENTRADA","TINTAS EPSON","10","3750","0","0");
INSERT INTO tbl_kardex VALUES("0","","10-08-2022","ENTRADA","CARPETAS","50","2300","0","0");
INSERT INTO tbl_kardex VALUES("0","","10-08-2022","ENTRADA","FOLDERS","20","575","0","0");
INSERT INTO tbl_kardex VALUES("0","","08-10-2022 07:13:03 pm","SALIDA","TINTAS EPSON                  ","0","0","2","750");
INSERT INTO tbl_kardex VALUES("0","","10-08-2022","ENTRADA","lapiz","6","1175","0","0");
INSERT INTO tbl_kardex VALUES("0","","08-10-2022 07:22:23 pm","SALIDA","IMPRESORA                     ","0","0","3","10350");
INSERT INTO tbl_kardex VALUES("","","","ENTRADA","","0","0","","");
INSERT INTO tbl_kardex VALUES("","","15-10-2022","ENTRADA","Foco","10","300","","");



DROP TABLE IF EXISTS tbl_libro_mayor;

CREATE TABLE `tbl_libro_mayor` (
  `ID_LIBRO_MAYOR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `TEMPORADA` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL,
  `TOTAL_CUENTA` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID_LIBRO_MAYOR`)
) ENGINE=InnoDB AUTO_INCREMENT=951 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_libro_mayor VALUES("634","8","0000-00-00","10","Caja","100");
INSERT INTO tbl_libro_mayor VALUES("635","8","0000-00-00","10","Otros Activos","77");
INSERT INTO tbl_libro_mayor VALUES("636","8","0000-00-00","10","Proveedores","123");
INSERT INTO tbl_libro_mayor VALUES("637","8","0000-00-00","10","Caja","100");
INSERT INTO tbl_libro_mayor VALUES("638","8","0000-00-00","10","Otros Activos","77");
INSERT INTO tbl_libro_mayor VALUES("639","8","0000-00-00","10","Proveedores","123");
INSERT INTO tbl_libro_mayor VALUES("640","8","0000-00-00","10","Caja","100");
INSERT INTO tbl_libro_mayor VALUES("641","8","0000-00-00","10","Otros Activos","77");
INSERT INTO tbl_libro_mayor VALUES("642","8","0000-00-00","10","Proveedores","123");
INSERT INTO tbl_libro_mayor VALUES("643","8","0000-00-00","10","Caja","100");
INSERT INTO tbl_libro_mayor VALUES("644","8","0000-00-00","10","Pagos Anticipados","2000");
INSERT INTO tbl_libro_mayor VALUES("645","8","0000-00-00","10","Inventario","1000");
INSERT INTO tbl_libro_mayor VALUES("646","8","0000-00-00","10","Otros Activos","77");
INSERT INTO tbl_libro_mayor VALUES("647","8","0000-00-00","10","Proveedores","123");
INSERT INTO tbl_libro_mayor VALUES("648","8","0000-00-00","10","Caja","100");
INSERT INTO tbl_libro_mayor VALUES("649","8","0000-00-00","10","Pagos Anticipados","2000");
INSERT INTO tbl_libro_mayor VALUES("650","8","0000-00-00","10","Inventario","1000");
INSERT INTO tbl_libro_mayor VALUES("651","8","0000-00-00","10","Otros Activos","77");
INSERT INTO tbl_libro_mayor VALUES("652","8","0000-00-00","10","Proveedores","123");
INSERT INTO tbl_libro_mayor VALUES("653","8","0000-00-00","10","Caja","200");
INSERT INTO tbl_libro_mayor VALUES("654","8","0000-00-00","10","Pagos Anticipados","2000");
INSERT INTO tbl_libro_mayor VALUES("655","8","0000-00-00","10","Inventario","1000");
INSERT INTO tbl_libro_mayor VALUES("656","8","0000-00-00","10","Otros Activos","77");
INSERT INTO tbl_libro_mayor VALUES("657","8","0000-00-00","10","Proveedores","123");
INSERT INTO tbl_libro_mayor VALUES("658","8","0000-00-00","10","Caja","200");
INSERT INTO tbl_libro_mayor VALUES("659","8","0000-00-00","10","Pagos Anticipados","2000");
INSERT INTO tbl_libro_mayor VALUES("660","8","0000-00-00","10","Inventario","1000");
INSERT INTO tbl_libro_mayor VALUES("661","8","0000-00-00","10","Otros Activos","77");
INSERT INTO tbl_libro_mayor VALUES("662","8","0000-00-00","10","Proveedores","123");
INSERT INTO tbl_libro_mayor VALUES("663","8","0000-00-00","10","Caja","200");
INSERT INTO tbl_libro_mayor VALUES("664","8","0000-00-00","10","Pagos Anticipados","2000");
INSERT INTO tbl_libro_mayor VALUES("665","8","0000-00-00","10","Inventario","1000");
INSERT INTO tbl_libro_mayor VALUES("666","8","0000-00-00","10","Otros Activos","77");
INSERT INTO tbl_libro_mayor VALUES("667","8","0000-00-00","10","Proveedores","123");
INSERT INTO tbl_libro_mayor VALUES("668","8","0000-00-00","10","Caja","200");
INSERT INTO tbl_libro_mayor VALUES("669","8","0000-00-00","10","Pagos Anticipados","2000");
INSERT INTO tbl_libro_mayor VALUES("670","8","0000-00-00","10","Inventario","1000");
INSERT INTO tbl_libro_mayor VALUES("671","8","0000-00-00","10","Otros Activos","77");
INSERT INTO tbl_libro_mayor VALUES("672","8","0000-00-00","10","Proveedores","123");
INSERT INTO tbl_libro_mayor VALUES("673","8","0000-00-00","10","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("674","8","0000-00-00","10","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("675","8","0000-00-00","10","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("676","8","0000-00-00","10","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("677","8","0000-00-00","10","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("678","8","0000-00-00","10","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("679","8","0000-00-00","10","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("680","8","0000-00-00","10","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("681","8","0000-00-00","10","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("682","8","0000-00-00","10","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("683","8","0000-00-00","10","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("684","8","0000-00-00","10","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("685","8","0000-00-00","10","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("686","8","0000-00-00","10","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("687","8","0000-00-00","10","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("688","8","0000-00-00","10","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("689","8","0000-00-00","10","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("690","8","0000-00-00","10","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("691","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("692","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("693","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("694","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("695","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("696","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("697","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("698","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("699","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("700","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("701","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("702","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("703","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("704","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("705","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("706","8","2022-08-01","0","Bancos","2200");
INSERT INTO tbl_libro_mayor VALUES("707","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("708","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("709","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("710","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("711","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("712","8","2022-08-01","0","Bancos","1200");
INSERT INTO tbl_libro_mayor VALUES("713","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("714","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("715","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("716","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("717","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("718","8","2022-08-01","0","Bancos","1200");
INSERT INTO tbl_libro_mayor VALUES("719","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("720","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("721","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("722","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("723","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("724","8","2022-08-01","0","Bancos","1200");
INSERT INTO tbl_libro_mayor VALUES("725","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("726","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("727","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("728","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("729","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("730","8","2022-08-01","0","Bancos","1200");
INSERT INTO tbl_libro_mayor VALUES("731","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("732","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("733","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("734","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("735","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("736","8","2022-08-01","0","Bancos","1200");
INSERT INTO tbl_libro_mayor VALUES("737","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("738","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("739","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("740","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("741","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("742","8","2022-08-01","0","Bancos","1200");
INSERT INTO tbl_libro_mayor VALUES("743","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("744","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("745","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("746","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("747","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("748","8","2022-08-01","0","Bancos","1200");
INSERT INTO tbl_libro_mayor VALUES("749","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("750","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("751","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("752","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("753","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("754","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("755","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("756","8","2022-08-01","0","Bancos","1200");
INSERT INTO tbl_libro_mayor VALUES("757","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("758","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("759","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("760","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("761","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("762","8","2022-08-01","0","Depreciacion Acumulada","-1000");
INSERT INTO tbl_libro_mayor VALUES("763","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("764","8","2022-08-01","0","Bancos","1200");
INSERT INTO tbl_libro_mayor VALUES("765","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("766","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("767","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("768","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("769","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("770","8","2022-08-01","0","Depreciacion Acumulada","-1000");
INSERT INTO tbl_libro_mayor VALUES("771","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("772","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("773","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("774","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("775","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("776","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("777","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("778","8","2022-08-01","0","Depreciacion Acumulada","-1000");
INSERT INTO tbl_libro_mayor VALUES("779","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("780","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("781","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("782","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("783","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("784","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("785","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("786","8","2022-08-01","0","Depreciacion Acumulada","0");
INSERT INTO tbl_libro_mayor VALUES("787","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("788","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("789","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("790","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("791","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("792","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("793","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("794","8","2022-08-01","0","Depreciacion Acumulada","-1000");
INSERT INTO tbl_libro_mayor VALUES("795","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("796","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("797","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("798","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("799","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("800","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("801","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("802","8","2022-08-01","0","Depreciacion Acumulada","-1000");
INSERT INTO tbl_libro_mayor VALUES("803","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("804","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("805","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("806","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("807","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("808","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("809","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("810","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("811","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("812","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("813","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("814","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("815","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("816","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("817","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("818","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("819","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("820","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("821","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("822","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("823","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("824","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("825","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("826","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("827","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("828","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("829","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("830","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("831","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("832","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("833","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("834","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("835","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("836","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("837","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("838","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("839","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("840","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("841","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("842","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("843","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("844","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("845","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("846","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("847","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("848","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("849","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("850","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("851","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("852","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("853","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("854","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("855","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("856","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("857","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("858","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("859","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("860","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("861","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("862","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("863","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("864","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("865","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("866","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("867","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("868","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("869","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("870","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("871","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("872","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("873","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("874","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("875","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("876","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("877","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("878","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("879","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("880","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("881","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("882","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("883","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("884","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("885","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("886","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("887","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("888","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("889","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("890","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("891","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("892","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("893","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("894","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("895","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("896","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("897","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("898","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("899","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("900","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("901","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("902","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("903","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("904","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("905","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("906","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("907","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("908","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("909","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("910","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("911","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("912","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("913","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("914","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("915","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("916","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("917","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("918","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("919","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("920","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("921","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("922","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("923","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("924","8","2022-08-01","0","Bancos","1400");
INSERT INTO tbl_libro_mayor VALUES("925","8","2022-08-01","0","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("926","8","2022-08-01","0","Cuentas x Cobrar","500");
INSERT INTO tbl_libro_mayor VALUES("927","8","2022-08-01","0","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("928","8","2022-08-01","0","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("929","8","2022-08-01","0","Edificios","500");
INSERT INTO tbl_libro_mayor VALUES("930","8","2022-08-01","0","Depreciacion Acumulada","1000");
INSERT INTO tbl_libro_mayor VALUES("931","8","2022-08-01","0","Capital Social","3000");
INSERT INTO tbl_libro_mayor VALUES("932","1","2022-09-11","0","Caja","1000");
INSERT INTO tbl_libro_mayor VALUES("933","1","2022-09-11","0","Cuentas x Cobrar","670");
INSERT INTO tbl_libro_mayor VALUES("934","1","2022-09-11","0","Caja","1000");
INSERT INTO tbl_libro_mayor VALUES("935","1","2022-09-11","0","Cuentas x Cobrar","670");
INSERT INTO tbl_libro_mayor VALUES("936","1","2022-09-11","0","Inventario","600");
INSERT INTO tbl_libro_mayor VALUES("937","1","2022-09-11","0","Caja","1000");
INSERT INTO tbl_libro_mayor VALUES("938","1","2022-09-11","0","Cuentas x Cobrar","670");
INSERT INTO tbl_libro_mayor VALUES("939","1","2022-09-11","0","Inventario","600");
INSERT INTO tbl_libro_mayor VALUES("940","1","2022-09-11","0","Caja","1000");
INSERT INTO tbl_libro_mayor VALUES("941","1","2022-09-11","0","Cuentas x Cobrar","670");
INSERT INTO tbl_libro_mayor VALUES("942","1","2022-09-11","0","Inventario","600");
INSERT INTO tbl_libro_mayor VALUES("943","1","2022-09-06","0","Caja","1000");
INSERT INTO tbl_libro_mayor VALUES("944","1","2022-09-06","0","Caja","1000");
INSERT INTO tbl_libro_mayor VALUES("945","1","2022-09-06","0","Bancos","445");
INSERT INTO tbl_libro_mayor VALUES("946","1","2022-09-06","0","Caja","1000");
INSERT INTO tbl_libro_mayor VALUES("947","1","2022-09-06","0","Bancos","445");
INSERT INTO tbl_libro_mayor VALUES("948","1","2022-09-06","0","Caja","1000");
INSERT INTO tbl_libro_mayor VALUES("949","1","2022-09-06","0","Bancos","445");
INSERT INTO tbl_libro_mayor VALUES("950","1","2022-09-06","0","Caja","1000");



DROP TABLE IF EXISTS tbl_libros;

CREATE TABLE `tbl_libros` (
  `Id_Libro` int(25) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `Id_cliente` int(25) NOT NULL,
  `caja` int(25) NOT NULL,
  PRIMARY KEY (`Id_Libro`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_libros VALUES("1","2022-08-01","8","500");
INSERT INTO tbl_libros VALUES("2","2022-07-01","9","0");
INSERT INTO tbl_libros VALUES("6","2022-07-01","8","0");
INSERT INTO tbl_libros VALUES("7","2022-06-01","9","0");
INSERT INTO tbl_libros VALUES("8","2022-06-01","8","0");
INSERT INTO tbl_libros VALUES("9","2022-05-01","9","0");
INSERT INTO tbl_libros VALUES("10","2022-09-01","8","14400");
INSERT INTO tbl_libros VALUES("11","2022-08-01","4","400");
INSERT INTO tbl_libros VALUES("13","2022-09-01","4","0");
INSERT INTO tbl_libros VALUES("14","2022-07-01","4","0");
INSERT INTO tbl_libros VALUES("15","2022-08-01","10","4779");
INSERT INTO tbl_libros VALUES("16","2022-08-01","8","1077");
INSERT INTO tbl_libros VALUES("17","2022-08-01","8","1077");
INSERT INTO tbl_libros VALUES("18","2022-08-01","8","1077");
INSERT INTO tbl_libros VALUES("19","2022-08-01","8","1077");
INSERT INTO tbl_libros VALUES("20","2022-08-01","8","1077");
INSERT INTO tbl_libros VALUES("21","2022-08-01","8","1077");
INSERT INTO tbl_libros VALUES("22","2022-08-01","8","1000");
INSERT INTO tbl_libros VALUES("23","2022-08-01","8","577");
INSERT INTO tbl_libros VALUES("24","2022-08-01","0","325");
INSERT INTO tbl_libros VALUES("25","2022-08-01","0","325");
INSERT INTO tbl_libros VALUES("26","2022-08-01","0","325");
INSERT INTO tbl_libros VALUES("27","2022-08-01","0","325");
INSERT INTO tbl_libros VALUES("28","2022-08-01","8","1000");
INSERT INTO tbl_libros VALUES("29","2022-08-01","8","800");
INSERT INTO tbl_libros VALUES("30","2022-08-01","8","800");
INSERT INTO tbl_libros VALUES("31","2022-08-01","8","800");
INSERT INTO tbl_libros VALUES("32","2022-08-01","8","800");
INSERT INTO tbl_libros VALUES("33","2022-08-01","8","800");
INSERT INTO tbl_libros VALUES("34","2022-08-01","8","800");
INSERT INTO tbl_libros VALUES("35","2022-08-01","8","1100");
INSERT INTO tbl_libros VALUES("36","2022-08-01","8","1100");
INSERT INTO tbl_libros VALUES("37","2022-08-01","8","600");
INSERT INTO tbl_libros VALUES("38","2022-08-01","8","400");
INSERT INTO tbl_libros VALUES("39","2022-08-01","8","1400");
INSERT INTO tbl_libros VALUES("40","2022-08-01","8","1400");
INSERT INTO tbl_libros VALUES("41","2022-08-01","8","1400");
INSERT INTO tbl_libros VALUES("42","2022-08-01","8","1400");
INSERT INTO tbl_libros VALUES("43","2022-08-01","8","2400");
INSERT INTO tbl_libros VALUES("44","2022-08-01","8","4400");
INSERT INTO tbl_libros VALUES("45","2022-08-01","8","4400");
INSERT INTO tbl_libros VALUES("46","2022-08-01","8","4900");
INSERT INTO tbl_libros VALUES("47","2022-08-01","8","4900");
INSERT INTO tbl_libros VALUES("48","2022-08-01","8","5000");
INSERT INTO tbl_libros VALUES("49","2022-08-01","8","5000");
INSERT INTO tbl_libros VALUES("50","2022-08-01","8","5000");
INSERT INTO tbl_libros VALUES("51","2022-08-01","8","5000");
INSERT INTO tbl_libros VALUES("52","2022-08-01","8","5200");
INSERT INTO tbl_libros VALUES("53","2022-08-01","8","5200");
INSERT INTO tbl_libros VALUES("54","2022-08-01","8","5400");
INSERT INTO tbl_libros VALUES("55","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("56","2022-08-01","8","200");
INSERT INTO tbl_libros VALUES("57","2022-08-01","8","1200");
INSERT INTO tbl_libros VALUES("58","2022-08-01","8","1700");
INSERT INTO tbl_libros VALUES("59","2022-08-01","8","2000");
INSERT INTO tbl_libros VALUES("60","2022-08-01","8","4000");
INSERT INTO tbl_libros VALUES("61","2022-08-01","8","4100");
INSERT INTO tbl_libros VALUES("62","2022-08-01","8","3600");
INSERT INTO tbl_libros VALUES("63","2022-08-01","8","4100");
INSERT INTO tbl_libros VALUES("64","2022-08-01","8","4100");
INSERT INTO tbl_libros VALUES("65","2022-08-01","8","4100");
INSERT INTO tbl_libros VALUES("66","2022-08-01","8","4100");
INSERT INTO tbl_libros VALUES("67","2022-08-01","8","4100");
INSERT INTO tbl_libros VALUES("68","2022-10-01","8","0");
INSERT INTO tbl_libros VALUES("69","2022-10-01","8","0");
INSERT INTO tbl_libros VALUES("70","2022-10-01","8","0");
INSERT INTO tbl_libros VALUES("71","2022-10-01","8","0");
INSERT INTO tbl_libros VALUES("72","2022-07-01","1","0");
INSERT INTO tbl_libros VALUES("73","2022-07-01","1","0");
INSERT INTO tbl_libros VALUES("74","2022-07-01","1","0");
INSERT INTO tbl_libros VALUES("75","2022-08-01","8","6100");
INSERT INTO tbl_libros VALUES("76","2022-08-01","8","6100");
INSERT INTO tbl_libros VALUES("77","2022-08-01","8","6100");
INSERT INTO tbl_libros VALUES("78","2022-08-01","8","5100");
INSERT INTO tbl_libros VALUES("79","2022-08-01","8","5100");
INSERT INTO tbl_libros VALUES("80","2022-08-01","8","4100");
INSERT INTO tbl_libros VALUES("81","2022-08-01","8","7100");
INSERT INTO tbl_libros VALUES("82","2022-08-01","1","1000");
INSERT INTO tbl_libros VALUES("83","2022-08-01","1","2000");
INSERT INTO tbl_libros VALUES("84","2022-08-01","9","0");
INSERT INTO tbl_libros VALUES("85","2022-08-01","9","500");
INSERT INTO tbl_libros VALUES("86","2022-08-01","8","7100");
INSERT INTO tbl_libros VALUES("87","2022-09-01","1","0");
INSERT INTO tbl_libros VALUES("88","2022-09-01","1","0");
INSERT INTO tbl_libros VALUES("89","2022-09-01","1","0");
INSERT INTO tbl_libros VALUES("90","2022-09-01","8","0");
INSERT INTO tbl_libros VALUES("91","2022-09-01","8","0");
INSERT INTO tbl_libros VALUES("92","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("93","2022-08-01","8","8300");
INSERT INTO tbl_libros VALUES("94","2022-09-01","1","2000");
INSERT INTO tbl_libros VALUES("95","2022-09-01","1","2000");
INSERT INTO tbl_libros VALUES("96","2022-11-01","4","0");
INSERT INTO tbl_libros VALUES("97","2022-11-01","4","1000");
INSERT INTO tbl_libros VALUES("98","2022-10-01","9","0");
INSERT INTO tbl_libros VALUES("99","2022-10-01","9","500");
INSERT INTO tbl_libros VALUES("100","2022-09-01","8","1000");
INSERT INTO tbl_libros VALUES("101","2022-08-01","8","8300");
INSERT INTO tbl_libros VALUES("102","2022-09-01","4","0");
INSERT INTO tbl_libros VALUES("103","2022-09-01","4","500");
INSERT INTO tbl_libros VALUES("104","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("105","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("106","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("107","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("108","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("109","2022-08-01","9","500");
INSERT INTO tbl_libros VALUES("110","2022-08-01","9","750");
INSERT INTO tbl_libros VALUES("111","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("112","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("113","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("114","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("115","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("116","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("117","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("118","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("119","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("120","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("121","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("122","2022-08-01","8","7300");
INSERT INTO tbl_libros VALUES("123","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("124","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("125","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("126","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("127","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("128","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("129","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("130","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("131","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("132","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("133","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("134","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("135","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("136","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("137","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("138","2022-08-01","8","0");
INSERT INTO tbl_libros VALUES("139","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("140","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("141","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("142","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("143","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("144","2022-08-11","8","750");
INSERT INTO tbl_libros VALUES("145","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("146","2022-08-10","8","750");
INSERT INTO tbl_libros VALUES("147","2022-08-10","8","750");
INSERT INTO tbl_libros VALUES("148","2022-08-10","8","750");
INSERT INTO tbl_libros VALUES("149","2022-08-10","8","3600");
INSERT INTO tbl_libros VALUES("150","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("151","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("152","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("153","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("154","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("155","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("156","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("157","2022-08-01","8","750");
INSERT INTO tbl_libros VALUES("158","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("159","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("160","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("161","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("162","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("163","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("164","2022-08-01","8","7800");
INSERT INTO tbl_libros VALUES("165","2022-09-11","1","1000");
INSERT INTO tbl_libros VALUES("166","2022-09-11","1","1670");
INSERT INTO tbl_libros VALUES("167","2022-09-11","1","1670");
INSERT INTO tbl_libros VALUES("168","2022-09-11","1","2270");
INSERT INTO tbl_libros VALUES("169","2022-09-11","1","2270");
INSERT INTO tbl_libros VALUES("170","2022-09-11","1","2270");
INSERT INTO tbl_libros VALUES("171","2022-09-06","1","1000");
INSERT INTO tbl_libros VALUES("172","2022-09-06","1","1000");
INSERT INTO tbl_libros VALUES("173","2022-09-06","1","1000");
INSERT INTO tbl_libros VALUES("174","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("175","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("176","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("177","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("178","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("179","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("180","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("181","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("182","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("183","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("184","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("185","2022-09-06","1","1445");
INSERT INTO tbl_libros VALUES("186","2021-12-01","1","6385");
INSERT INTO tbl_libros VALUES("187","2022-09-28","1","0");
INSERT INTO tbl_libros VALUES("188","2022-10-01","1","0");
INSERT INTO tbl_libros VALUES("189","2022-10-01","4","0");
INSERT INTO tbl_libros VALUES("190","2022-10-01","4","0");
INSERT INTO tbl_libros VALUES("191","2022-09-26","4","0");
INSERT INTO tbl_libros VALUES("192","2022-09-26","4","0");
INSERT INTO tbl_libros VALUES("193","2022-09-26","4","0");
INSERT INTO tbl_libros VALUES("194","2022-09-26","4","0");
INSERT INTO tbl_libros VALUES("195","2022-09-26","4","0");
INSERT INTO tbl_libros VALUES("196","2022-10-01","4","0");
INSERT INTO tbl_libros VALUES("197","2022-10-01","4","0");
INSERT INTO tbl_libros VALUES("198","2022-10-10","8","0");
INSERT INTO tbl_libros VALUES("199","2022-10-10","8","0");
INSERT INTO tbl_libros VALUES("200","2022-10-03","1","0");



DROP TABLE IF EXISTS tbl_libros2;

CREATE TABLE `tbl_libros2` (
  `Id_Libro` int(25) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `Id_cliente` int(25) NOT NULL,
  `caja` int(25) NOT NULL,
  PRIMARY KEY (`Id_Libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS tbl_ms_bitacora;

CREATE TABLE `tbl_ms_bitacora` (
  `Id_Bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` datetime DEFAULT NULL,
  `Accion` varchar(2000) DEFAULT NULL,
  `Descripcion` varchar(2000) DEFAULT NULL,
  `Id_Usuario` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`Id_Bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_ms_bitacora VALUES("1","2022-08-10 01:39:04","INSERT","(72, \"paquito\", \"Master\", \"ACTIVO\",\"123\", \"1\", \"2022-07-27 22:27:00.000000\", \"1\", \"SI\", \"2022-06-21 00:00:00.000000\", luizzjm9@gmail.com);","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("2","2022-08-10 01:42:48","UPDATE","(72,\"paquito\",\"MasterXD\", \"ACTIVO\",\"123\",\"1\", \"2022-07-27 22:27:00.000000\", \"1\",\"SI\", \"2022-06-21 00:00:00.000000\", \"luizzjm9@gmail.com 72;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("3","2022-08-10 01:42:54","DELETE","SE HA BORRADO EL USUARIO =paquito;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("4","2022-08-10 03:37:35","DELETE","SE HA BORRADO EL USUARIO =MARYS;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("5","2022-08-10 03:37:42","DELETE","SE HA BORRADO EL USUARIO =ALEJANDRO;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("6","2022-08-10 03:37:52","DELETE","SE HA BORRADO EL USUARIO =ANKLLIES;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("7","2022-08-10 03:37:58","DELETE","SE HA BORRADO EL USUARIO =ANDRESUS;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("8","2022-08-10 03:38:12","DELETE","SE HA BORRADO EL USUARIO =QWE;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("9","2022-08-10 03:38:12","DELETE","SE HA BORRADO EL USUARIO =KEVIN;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("10","2022-08-10 03:38:12","DELETE","SE HA BORRADO EL USUARIO =KEVINZ;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("11","2022-08-10 03:38:46","DELETE","SE HA BORRADO EL USUARIO =ASASASQQQ;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("12","2022-08-10 03:38:46","DELETE","SE HA BORRADO EL USUARIO =LUCASSS;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("13","2022-08-10 03:38:46","DELETE","SE HA BORRADO EL USUARIO =FRIJOL;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("14","2022-08-10 03:38:46","DELETE","SE HA BORRADO EL USUARIO =MAIZ;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("15","2022-08-10 03:43:47","UPDATE","(4,\"JOSE_MARTINEZ\",\"JOSE LUIS MARTINEZ\", \"ACTIVO\",\"QWERTY123456\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"isaiasfp19@gmail.com 4;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("16","2022-08-10 03:43:47","UPDATE","(10,\"ALLAN_HERNANDEZ\",\"ALLAN FRANCISCO HERNANDEZ\", \"ACTIVO\",\"123456QWEERT\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"allan45@gmail.com 10;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("17","2022-08-10 03:43:47","UPDATE","(49,\"MARIO_BROS\",\"MARIO LUIGUI BROS\", \"ACTIVO\",\"QWEasd123\",\"4\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 49;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("18","2022-08-10 03:43:47","UPDATE","(51,\"ADMIN\",\"ADMINISTRADOR\", \"ACTIVO\",\"ADMIN\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 51;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("19","2022-08-10 03:43:47","UPDATE","(62,\"JENNY_BARAHONA\",\"JENNY MARIELA BARAHONA\", \"INACTIVO\",\"123poiJHG\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 62;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("20","2022-08-10 03:43:47","UPDATE","(63,\"CARLOS_AGUILAR\",\"CARLOS JUAQUIN AGUILAR\", \"INACTIVO\",\"123qwe!#QWEz2z\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 63;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("21","2022-08-10 03:43:47","UPDATE","(67,\"MARIANA_IZAGUIR\",\"MARI ANA DOLORES IZAGUIRRE\", \"ACTIVO\",\"QWE123@qweXC\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 67;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("22","2022-08-10 03:43:47","UPDATE","(68,\"PABLO_MONCADA\",\"PABLO JIMENO MONCADA\", \"INACTIVO\",\"QWE123@qwe\",\"4\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"patricia@gmail.com 68;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("23","2022-08-10 03:44:00","UPDATE","(1,\"ADMIN\",\"ADMINISTRADOR\", \"ACTIVO\",\"ADMIN\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 51;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("24","2022-08-10 03:47:10","UPDATE","(1,\"ADMIN\",\"ADMINISTRADOR\", \"ACTIVO\",\"ADMIN\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"admin@gmail.com 1;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("25","2022-08-10 03:47:10","UPDATE","(4,\"JOSE_MARTINEZ\",\"JOSE LUIS MARTINEZ\", \"ACTIVO\",\"QWERTY123456\",\"1\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"luizzjm9@gmail.com 4;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("26","2022-08-10 03:47:10","UPDATE","(49,\"MARIO_BROS\",\"MARIO LUIGUI BROS\", \"ACTIVO\",\"QWEasd123\",\"4\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"marioluigui@gmail.com 49;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("27","2022-08-10 03:47:10","UPDATE","(62,\"JENNY_BARAHONA\",\"JENNY MARIELA BARAHONA\", \"INACTIVO\",\"123poiJHG\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"jenny87@gmail.com 62;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("28","2022-08-10 03:47:10","UPDATE","(63,\"CARLOS_AGUILAR\",\"CARLOS JUAQUIN AGUILAR\", \"INACTIVO\",\"123qwe!#QWEz2z\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"carlosx10@gmail.com 63;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("29","2022-08-10 03:47:10","UPDATE","(67,\"MARIANA_IZAGUIR\",\"MARI ANA DOLORES IZAGUIRRE\", \"ACTIVO\",\"QWE123@qweXC\",\"2\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"Maryiza3@gmail.com 67;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("30","2022-08-10 03:47:10","UPDATE","(68,\"PABLO_MONCADA\",\"PABLO JIMENO MONCADA\", \"INACTIVO\",\"QWE123@qwe\",\"4\", \"0000-00-00 00:00:00.000000\", \"0\",\"\", \"0000-00-00 00:00:00.000000\", \"pablo@gmail.com 68;","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("31","2022-09-27 22:06:12","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("32","2022-09-27 22:10:49","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("33","2022-09-27 22:22:15","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("34","2022-09-27 22:23:49","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("35","2022-09-27 22:37:37","UPDATE","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("36","2022-09-27 23:16:42","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("37","2022-09-27 23:29:38","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("38","2022-09-27 23:32:09","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("39","2022-09-27 23:33:55","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("40","2022-09-27 23:40:31","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("41","2022-09-27 23:45:59","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("42","2022-09-27 23:47:25","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("43","2022-09-28 00:21:04","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("44","2022-09-28 00:24:46","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("45","2022-09-28 00:31:32","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("46","2022-09-28 00:33:33","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("47","2022-09-28 00:36:52","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("48","2022-09-29 15:49:32","UPDATE","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("49","2022-09-29 15:51:31","UPDATE","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("50","2022-09-29 16:47:59","UPDATE","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("51","2022-09-29 16:50:18","INSERT","(89, \"MIOWFF\", \"JOSE DAVID G\", \"INACTIVO\",\"Jose#$%!2344\", \"4\", \"0000-00-00 00:00:00.000000\", \"0\", \"0000-00-00\", \"0000-00-00 00:00:00.000000\", jose1999david2010@gmail.com);","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("52","2022-09-29 21:53:40","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("53","2022-09-29 21:54:12","INSERT","","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("54","2022-09-29 21:54:49","INSERT","(92, \"WILIAM\", \"ALEJANDRA ANTONIETA GUITIERREZ\", \"ACTIVO\",\"WFRG3457\", \"7\", \"2022-07-31 22:25:37.000000\", \"1\", \"1\", \"2022-07-31 22:25:37.000000\", josegarciadiaz1999@hotmail.com);","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("55","2022-09-29 21:55:53","INSERT","(100, \"WILIAM\", \"ALEJANDRA ANTONIETA GUITIERREZ\", \"ACTIVO\",\"WFRG3457\", \"1\", \"2022-07-31 22:25:37.000000\", \"2\", \"1\", \"2022-08-04 22:25:37.000000\", josegarciadiaz1999@hotmail.com);","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("56","2022-09-30 15:01:55","INSERT","(101, \"WILIAMFF\", \"KILIAN EMPABE \", \"INACTIVO\",\"WFRG3457\", \"4\", \"josegarciadiaz1499@hotmail.com);","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("57","2022-09-30 15:04:49","INSERT","(104, \"DULCSHAKIERW\", \"JOSE DAVID GARCIA D\", \"INACTIVO\",\"DJsd23ffff\", \"4\", \"josegarcia5@hotmail.com);","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("58","2022-09-30 15:14:32","INSERT","(105, \"DSDDBBDE\", \"DULce marquez\", \"INACTIVO\",\"JK234fffg\", \"4\", \"josegarcia9@hotmail.com);","ADMIN");
INSERT INTO tbl_ms_bitacora VALUES("59","2022-09-30 15:17:06","DELETE","SE HA BORRADO EL USUARIO =DSDDBBDE;","ADMIN");



DROP TABLE IF EXISTS tbl_objetos;

CREATE TABLE `tbl_objetos` (
  `Id_Objetos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'número secuencial que identifica de manera unica a un objeto',
  `Objetos` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'campo que registra el nombre de un objeto',
  `Descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Campo que registra el nombre de un cargo',
  `Tipo_Objeto` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'campo que registra un tipo de objeto',
  PRIMARY KEY (`Id_Objetos`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_objetos VALUES("1","Facturación","Facturación","Facturación");
INSERT INTO tbl_objetos VALUES("2","Inventarios","Inventarios","Inventarios");
INSERT INTO tbl_objetos VALUES("3","Libro Diario","Libro Diario","Libro Diario");
INSERT INTO tbl_objetos VALUES("4","Reporte Bal. General","Reporte Bal. General","Reporte");
INSERT INTO tbl_objetos VALUES("5","Estado de Resultado","Estado de Resultado","Estado");
INSERT INTO tbl_objetos VALUES("6","Reporte Est. Resultado","Reporte Est. Resultado","Reporte");
INSERT INTO tbl_objetos VALUES("7","Gestión Bitácora","Gestión Bitácora","Gestion");
INSERT INTO tbl_objetos VALUES("8","Gestión Catálogo Cuenta","Gestión Catálogo Cuenta","Gestión");
INSERT INTO tbl_objetos VALUES("9","Gestión Clientes","Gestión Clientes","Gestión");
INSERT INTO tbl_objetos VALUES("10","Gestión Facturas","Gestión Facturas","Gestión");
INSERT INTO tbl_objetos VALUES("12","Gestión Libro Mayor","Gestión Libro Mayor","Gestión");
INSERT INTO tbl_objetos VALUES("13","Gestión Parámetros","Gestión Parámetros","Gestión");
INSERT INTO tbl_objetos VALUES("14","Gestión Preguntas","Gestión Preguntas","Gestión");
INSERT INTO tbl_objetos VALUES("15","Gestión Preguntas Usuarios","Gestión Preguntas Usuarios","Gestión");
INSERT INTO tbl_objetos VALUES("16","Gestión Usuarios","Gestión Usuarios","Gestión");
INSERT INTO tbl_objetos VALUES("17","Gestión Roles","Gestión Roles","Gestión");
INSERT INTO tbl_objetos VALUES("18","Gestión Objetos ","Gestión Objetos","Gestión");
INSERT INTO tbl_objetos VALUES("19","Backup","Backup","Backup");



DROP TABLE IF EXISTS tbl_parametros;

CREATE TABLE `tbl_parametros` (
  `Id_Parametro` int(11) NOT NULL AUTO_INCREMENT,
  `Parametro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Valor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id_Usuario` int(11) DEFAULT NULL,
  `Fecha_Creacion` date DEFAULT NULL,
  `Fecha_Modificacion` date DEFAULT NULL,
  PRIMARY KEY (`Id_Parametro`),
  UNIQUE KEY `TBL_PARAMETROS_UN` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_parametros VALUES("1","Bloquearusuario","4","0","0000-00-00","0000-00-00");



DROP TABLE IF EXISTS tbl_preguntas;

CREATE TABLE `tbl_preguntas` (
  `Id_Preguntas` int(11) NOT NULL AUTO_INCREMENT,
  `Preguntas` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_Preguntas`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_preguntas VALUES("1","¿CUAL ES EL NOMBRE DE TU PRIMER MASCOTA?");
INSERT INTO tbl_preguntas VALUES("2","¿CUAL ES EL NOMBRE DE TU MEJOR AMIGO?");
INSERT INTO tbl_preguntas VALUES("3","¿CUAL ES TU COLOR FAVORITO?");
INSERT INTO tbl_preguntas VALUES("4","¿CUAL ES TU COMIDA FAVORITA?");
INSERT INTO tbl_preguntas VALUES("5","¿CUAL BANDA FAVORITA?");
INSERT INTO tbl_preguntas VALUES("6","¿CUAL ES EL NOMBRE DE TU HERMANO FAVORIT");
INSERT INTO tbl_preguntas VALUES("7","¿CUAL ES TU MATUMATERIA FAVORITA?");
INSERT INTO tbl_preguntas VALUES("8","¿CUAL SERIA TU TRABAJO PERFECTO?");
INSERT INTO tbl_preguntas VALUES("9","¿CUAL ES TU ANIMAL FAVORITO?");
INSERT INTO tbl_preguntas VALUES("10","¿CUAL ES TU LUGAR FAVORITO?");



DROP TABLE IF EXISTS tbl_preguntas_x_usuario;

CREATE TABLE `tbl_preguntas_x_usuario` (
  `Id_Preguntas` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(11) DEFAULT NULL,
  `Preguntas` varchar(40) NOT NULL,
  `Respuestas` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_Preguntas`),
  KEY `fk_id_Usupreg` (`Id_Usuario`),
  CONSTRAINT `fk_id_Usupreg` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_preguntas_x_usuario VALUES("3","62","¿CUAL BANDA FAVORITA?","arroz");
INSERT INTO tbl_preguntas_x_usuario VALUES("4","63","¿CUAL ES TU ANIMAL FAVORITO?","gatito");
INSERT INTO tbl_preguntas_x_usuario VALUES("5","67","¿CUAL ES TU ANIMAL FAVORITO?","perrito");
INSERT INTO tbl_preguntas_x_usuario VALUES("7","73","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("8","74","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("9","75","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("10","76","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("11","77","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("12","78","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("13","79","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("14","80","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("15","81","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("16","82","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("17","83","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("18","84","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("19","85","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("20","86","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("21","87","aaaa","eweer");
INSERT INTO tbl_preguntas_x_usuario VALUES("22","88","aaaa","eweer");



DROP TABLE IF EXISTS tbl_roles;

CREATE TABLE `tbl_roles` (
  `Id_Rol` int(11) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_roles VALUES("1","ADMINISTRADOR","USUARIO ADMINISTRADOR");
INSERT INTO tbl_roles VALUES("2","SECRETARIO","USUARIO SECRETARIO");
INSERT INTO tbl_roles VALUES("3","SEGURIDAD","USUARIO SEGURIDAD");
INSERT INTO tbl_roles VALUES("4","NUEVO","USUARIO NUEVO");
INSERT INTO tbl_roles VALUES("7","INFORMATICA","INFORMATICA");



DROP TABLE IF EXISTS tbl_roles_objetos;

CREATE TABLE `tbl_roles_objetos` (
  `id_Permiso` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Rol` int(11) NOT NULL,
  `Id_Objetos` int(11) NOT NULL,
  `Permiso_Creacion` int(11) NOT NULL,
  `Permiso_Visualizacion` int(11) NOT NULL,
  `Permiso_Eliminacion` int(11) NOT NULL,
  `Permiso_Actualizacion` int(11) NOT NULL,
  `Creado_Por` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Modificado_Por` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Modificacion` date NOT NULL,
  PRIMARY KEY (`id_Permiso`),
  KEY `Id_Objetos` (`Id_Objetos`),
  KEY `Id_Rol` (`Id_Rol`),
  CONSTRAINT `TBL_ROLES_OBJETOS_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `tbl_roles` (`Id_Rol`),
  CONSTRAINT `TBL_ROLES_OBJETOS_ibfk_2` FOREIGN KEY (`Id_Objetos`) REFERENCES `tbl_objetos` (`Id_Objetos`)
) ENGINE=InnoDB AUTO_INCREMENT=1659 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_roles_objetos VALUES("1551","2","1","0","1","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1552","2","2","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1553","2","3","0","1","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1554","2","4","0","1","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1555","2","5","0","1","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1556","2","6","0","1","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1557","2","7","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1558","2","8","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1559","2","9","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1560","2","10","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1561","2","12","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1562","2","13","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1563","2","14","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1564","2","15","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1565","2","16","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1566","2","17","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1567","2","18","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1568","2","19","1","1","0","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1641","1","1","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1642","1","2","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1643","1","3","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1644","1","4","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1645","1","5","0","1","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1646","1","6","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1647","1","7","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1648","1","8","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1649","1","9","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1650","1","10","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1651","1","12","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1652","1","13","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1653","1","14","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1654","1","15","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1655","1","16","0","1","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1656","1","17","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1657","1","18","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1658","1","19","1","1","1","1","","0000-00-00","1","0000-00-00");



DROP TABLE IF EXISTS tbl_usuario;

CREATE TABLE `tbl_usuario` (
  `Id_Usuario` int(10) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nombre_Usuario` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Estado_Usuario` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Contraseña` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Rol` int(10) NOT NULL,
  `Fecha_Ultimo_Conexion` datetime(6) DEFAULT NULL,
  `Preguntas_Contestadas` int(10) DEFAULT NULL,
  `Primer_Ingreso` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fecha_Vencimiento` datetime(6) DEFAULT NULL,
  `Correo_Electronico` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caja` int(10) NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `FK_TBL_USUARIO_Rol` (`Rol`),
  CONSTRAINT `FK_TBL_USUARIO_Rol` FOREIGN KEY (`Rol`) REFERENCES `tbl_roles` (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_usuario VALUES("1","ADMIN","ADMINISTRADOR","ACTIVO","ADMIN","1","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","admin@gmail.com","106433");
INSERT INTO tbl_usuario VALUES("4","JOSE_MARTINEZ","JOSE LUIS MARTINEZ","ACTIVO","AbZOzEf13@","1","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","luizzjm9@gmail.com","222");
INSERT INTO tbl_usuario VALUES("10","ALLAN_HERNANDEZ","ALLAN FRANCISCO HERNANDEZ","ACTIVO","123456QWEERT","1","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","allan45@gmail.com","0");
INSERT INTO tbl_usuario VALUES("49","MARIO_BROS","MARIO LUIGUI BROS","ACTIVO","QWEasd123","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","marioluigui@gmail.com","0");
INSERT INTO tbl_usuario VALUES("62","JENNY_BARAHONA","JENNY MARIELA BARAHONA","ACTIVO","ABCdef123","2","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","joshelm9@gmail.com","0");
INSERT INTO tbl_usuario VALUES("63","CARLOS_AGUILAR","CARLOS JUAQUIN AGUILAR","INACTIVO","123qwe!#QWEz2z","2","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","carlosx10@gmail.com","0");
INSERT INTO tbl_usuario VALUES("67","MARIANA_IZAGUIR","MARI ANA DOLORES IZAGUIRRE","ACTIVO","QWE123@qweXC","2","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","Maryiza3@gmail.com","0");
INSERT INTO tbl_usuario VALUES("68","PABLO_MONCADA","PABLO JIMENO MONCADA","INACTIVO","QWE123@qwe","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","pablo@gmail.com","0");
INSERT INTO tbl_usuario VALUES("73","PABLOEJUL","carlos ancholoti","ACTIVO","Jose1@@@","3","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz1999@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("74","PABLOEJELO","","INACTIVO","Jose12@!*","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz1999@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("75","MARIOTRTI","","INACTIVO","Jo!#@*2%","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz1999@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("76","DFDFVTITO","","INACTIVO","Jo!#@*2%jue&**@","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz1999@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("77","JDDIAZJ","","INACTIVO","J@!jo123","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz1999@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("78","JJDDDIAZ","JOSE DAVID GARCIA","INACTIVO","Jose@!#3","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz1999@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("79","ANGAJBL","ANGEL DIAZ MANUELES","INACTIVO","NIn2#!%*","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz1999@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("80","ADMIRADORT","ANGEL DIAZ MANULANGAS","INACTIVO","jISE#$234","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz9@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("81","KIKIKOLO","KILIAN EMPABE","INACTIVO","Jos@#$%123","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz1999@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("82","KIKILOLO","KILIAN EMPABE diaz","INACTIVO","Jos@#$%123","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","jose1999david2020@gmail.com","0");
INSERT INTO tbl_usuario VALUES("83","KIKILOLOJI","KILIAN EMPABE diazf","INACTIVO","Jos@#$%1wq","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","jose1999david2020@gmail.com","0");
INSERT INTO tbl_usuario VALUES("84","ADMIN","DULCE DIAZ GARCIA","INACTIVO","Jose#$%!234","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz149@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("85","DULCSHAKI","DULCE DIAZ GARCIA","INACTIVO","Jose#$%!234","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz99@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("86","DULCSHAKI","DULCE DIAZ GARCIA","INACTIVO","JBl234%##$%","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz199@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("87","DULCSHAKI","DULCE DIAZ GARCIA","INACTIVO","Jose#$%!2344","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz139@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("88","JULIOERTY","DULCE DIAZ MENDEZ PEREZ","INACTIVO","Jose#$%!2344","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz21@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("89","MIOWFF","JOSE DAVID G","INACTIVO","Jose#$%!2344","4","0000-00-00 00:00:00.000000","0","0000-00-00","0000-00-00 00:00:00.000000","jose1999david2010@gmail.com","0");
INSERT INTO tbl_usuario VALUES("90","CARROAFDF","ALEJANDRA ANTONIETA GUITIERREZ","ACTIVO","ERFDF4365","7","0000-00-00 00:00:00.000000","1","1","0000-00-00 00:00:00.000000","josegarciadiaz199@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("91","CARROADRF","ALEJANDRA ANTONIETA GUITIERREZ","ACTIVO","ERFDF436dfF","7","0000-00-00 00:00:00.000000","1","1","0000-00-00 00:00:00.000000","","300");
INSERT INTO tbl_usuario VALUES("92","WILIAM","ALEJANDRA ANTONIETA GUITIERREZ","ACTIVO","WFRG3457","7","2022-07-31 22:25:37.000000","1","1","2022-07-31 22:25:37.000000","josegarciadiaz1999@hotmail.com","888");
INSERT INTO tbl_usuario VALUES("100","WILIAM","ALEJANDRA ANTONIETA GUITIERREZ","ACTIVO","WFRG3457","1","2022-07-31 22:25:37.000000","2","1","2022-08-04 22:25:37.000000","josegarciadiaz1999@hotmail.com","300");
INSERT INTO tbl_usuario VALUES("101","WILIAMFF","KILIAN EMPABE ","INACTIVO","WFRG3457","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarciadiaz1499@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("104","DULCSHAKIERW","JOSE DAVID GARCIA D","INACTIVO","DJsd23ffff","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","josegarcia5@hotmail.com","0");
INSERT INTO tbl_usuario VALUES("106","FER","Fernando","ACTIVO","Fernando26","2","","","","","josefortizsantos@gmail.com","0");



DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

INSERT INTO user VALUES("20","configuroweb","4b67deeb9aba04a5b54632ad19934f26","Mauricio Sevilla Britto");
INSERT INTO user VALUES("21","Luis","7187f8a707b74d0aceeff15769393052","Luis Steven Vasquez Perez");
INSERT INTO user VALUES("22","Steven","5d41402abc4b2a76b9719d911017c592","steven vasquez");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `caja` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO usuario VALUES("5","admin","a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3","","administrador","sf","fdf","54345","tusolutionweb@gmail.com","325");
INSERT INTO usuario VALUES("6","siba","a1Bz20ydqelm8m1wqlc3fb6589eda475c8887beffb013fbf0b","","administrador","siba","siba","2342423","siba@gmail.com","123");
INSERT INTO usuario VALUES("7","federico","a1Bz20ydqelm8m1wql616706c4d6f7bdf68b30893f860cbb2b","","administrador","federico","federico","federico","federico@gmail.com","0");
INSERT INTO usuario VALUES("8","worrent","a1Bz20ydqelm8m1wql1574612a64e746d204acae6e51b7d695","","empleado","worrent","yafe","3253453453","worrent@gmail.com","0");



SET FOREIGN_KEY_CHECKS=1;