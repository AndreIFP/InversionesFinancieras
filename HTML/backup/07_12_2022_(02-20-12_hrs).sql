SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS 2w4GSUinHO;

USE 2w4GSUinHO;

DROP TABLE IF EXISTS Rangosdeperiodos;

CREATE TABLE `Rangosdeperiodos` (
  `Id_periodo` int(15) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(15) DEFAULT NULL,
  `Fechainicio` date DEFAULT NULL,
  `Fechafinal` date DEFAULT NULL,
  PRIMARY KEY (`Id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO Rangosdeperiodos VALUES("5","25","2022-12-01","2022-12-31");
INSERT INTO Rangosdeperiodos VALUES("6","25","2022-11-01","2022-11-30");
INSERT INTO Rangosdeperiodos VALUES("7","24","2022-11-01","2022-11-30");
INSERT INTO Rangosdeperiodos VALUES("8","27","2022-12-01","2022-12-31");
INSERT INTO Rangosdeperiodos VALUES("9","28","2022-12-01","2022-12-31");
INSERT INTO Rangosdeperiodos VALUES("10","28","2022-11-01","2022-11-30");
INSERT INTO Rangosdeperiodos VALUES("11","28","2022-10-01","2022-10-31");
INSERT INTO Rangosdeperiodos VALUES("12","29","2022-11-06","2022-12-06");
INSERT INTO Rangosdeperiodos VALUES("13","29","2022-10-01","2022-10-31");



DROP TABLE IF EXISTS TBL_Factura_1;

CREATE TABLE `TBL_Factura_1` (
  `N_Factura` int(6) NOT NULL AUTO_INCREMENT,
  `Fecha` varchar(20) DEFAULT NULL,
  `Nombre_Cliente` varchar(50) DEFAULT NULL,
  `RTN_Cliente` varchar(15) DEFAULT NULL,
  `Suma_Neta` varchar(50) DEFAULT NULL,
  `Concepto` varchar(75) DEFAULT NULL,
  `FechaD` int(2) DEFAULT NULL,
  `FechaM` varchar(10) DEFAULT NULL,
  `FechaA` int(4) DEFAULT NULL,
  `Total_Honorarios` int(10) DEFAULT NULL,
  `Valores_Retenidos` int(10) DEFAULT NULL,
  `Total_Neto` int(10) DEFAULT NULL,
  PRIMARY KEY (`N_Factura`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO TBL_Factura_1 VALUES("7","19-11-2022 - 11:29","don juan","198502310876","cien","PlayStation","23","octubre","2022","100","50","150");



DROP TABLE IF EXISTS TBL_PREGUNTAS_X_USUARIO;

CREATE TABLE `TBL_PREGUNTAS_X_USUARIO` (
  `Id_Preguntas` int(15) DEFAULT NULL,
  `Id_Usuario` int(15) DEFAULT NULL,
  `Preguntas` varchar(100) DEFAULT NULL,
  `Respuestas` varchar(100) DEFAULT NULL,
  `Id_preguntauser` int(12) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id_preguntauser`),
  KEY `TBL_PREGUNTAS_X_USUARIO_FK` (`Id_Preguntas`),
  KEY `TBL_PREGUNTAS_X_USUARIO_FK_1` (`Id_Usuario`),
  CONSTRAINT `TBL_PREGUNTAS_X_USUARIO_FK` FOREIGN KEY (`Id_Preguntas`) REFERENCES `tbl_preguntas` (`Id_Preguntas`),
  CONSTRAINT `TBL_PREGUNTAS_X_USUARIO_FK_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO TBL_PREGUNTAS_X_USUARIO VALUES("1","1","HGG","GG","1");
INSERT INTO TBL_PREGUNTAS_X_USUARIO VALUES("3","135","¿CUAL ES TU COLOR FAVORITO?","verde","2");
INSERT INTO TBL_PREGUNTAS_X_USUARIO VALUES("5","136","¿CUAL BANDA FAVORITA?","badbunny","3");



DROP TABLE IF EXISTS Tbl_Balanza;

CREATE TABLE `Tbl_Balanza` (
  `Id_Balanza` int(15) NOT NULL AUTO_INCREMENT,
  `Id_cliente` int(15) DEFAULT NULL,
  `Id_detalle` int(15) DEFAULT NULL,
  `COD_CUENTA` int(12) DEFAULT NULL,
  `Mhaber` decimal(10,2) DEFAULT NULL,
  `Mdebe` decimal(10,2) DEFAULT NULL,
  `Sdebe` decimal(10,2) DEFAULT NULL,
  `SAcreedor` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Id_Balanza`),
  KEY `Tbl_Balanza_FK` (`Id_detalle`),
  CONSTRAINT `Tbl_Balanza_FK` FOREIGN KEY (`Id_detalle`) REFERENCES `tbl_detallleasientos` (`Id_detalle`)
) ENGINE=InnoDB AUTO_INCREMENT=521 DEFAULT CHARSET=utf8mb4;

INSERT INTO Tbl_Balanza VALUES("364","18","313","1101","140.00","0.00","140.00","176.00");
INSERT INTO Tbl_Balanza VALUES("365","18","316","6401","0.00","40.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("366","18","314","6402","0.00","100.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("367","18","340","2101","0.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("368","18","341","3103","0.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("369","18","339","6504","140.00","0.00","140.00","176.00");
INSERT INTO Tbl_Balanza VALUES("370","19","343","1101","200.00","50.00","150.00","176.00");
INSERT INTO Tbl_Balanza VALUES("371","19","346","1201","50.00","0.00","50.00","176.00");
INSERT INTO Tbl_Balanza VALUES("372","19","344","6401","0.00","200.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("373","19","348","2101","0.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("374","19","349","3103","0.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("375","19","347","6504","200.00","0.00","200.00","176.00");
INSERT INTO Tbl_Balanza VALUES("376","20","351","1101","500.00","0.00","500.00","176.00");
INSERT INTO Tbl_Balanza VALUES("377","20","353","1102","300.00","0.00","300.00","176.00");
INSERT INTO Tbl_Balanza VALUES("378","20","354","2101","0.00","20.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("379","20","352","6402","0.00","500.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("380","20","355","3103","0.00","80.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("381","20","356","6504","400.00","0.00","400.00","176.00");
INSERT INTO Tbl_Balanza VALUES("382","21","359","1101","500.00","0.00","500.00","176.00");
INSERT INTO Tbl_Balanza VALUES("383","21","357","1102","150.00","0.00","150.00","176.00");
INSERT INTO Tbl_Balanza VALUES("384","21","358","1201","0.00","150.00","-150.00","176.00");
INSERT INTO Tbl_Balanza VALUES("385","21","360","6502","0.00","500.00","-500.00","176.00");
INSERT INTO Tbl_Balanza VALUES("386","21","362","2101","0.00","100.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("387","21","363","3103","0.00","400.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("388","21","361","6504","500.00","0.00","500.00","176.00");
INSERT INTO Tbl_Balanza VALUES("389","22","366","1101","0.00","300.00","-300.00","176.00");
INSERT INTO Tbl_Balanza VALUES("390","22","368","1102","0.00","400.00","-400.00","176.00");
INSERT INTO Tbl_Balanza VALUES("391","22","367","1105","400.00","0.00","400.00","176.00");
INSERT INTO Tbl_Balanza VALUES("392","22","365","6401","300.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("393","22","370","2101","0.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("394","22","371","3103","0.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("395","22","369","6504","-300.00","0.00","-300.00","176.00");
INSERT INTO Tbl_Balanza VALUES("396","23","375","1101","0.00","228371.00","-228371.00","176.00");
INSERT INTO Tbl_Balanza VALUES("397","23","373","1102","0.00","660000.00","-660000.00","176.00");
INSERT INTO Tbl_Balanza VALUES("398","23","376","2101","228371.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("399","23","374","6506","660000.00","0.00","660000.00","176.00");
INSERT INTO Tbl_Balanza VALUES("400","23","377","3103","0.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("401","23","378","6504","0.00","0.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("402","24","379","1101","5000.00","0.00","5000.00","176.00");
INSERT INTO Tbl_Balanza VALUES("403","24","381","1102","500.00","0.00","500.00","176.00");
INSERT INTO Tbl_Balanza VALUES("404","24","380","6401","0.00","5000.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("405","24","382","6402","0.00","500.00","0.00","176.00");
INSERT INTO Tbl_Balanza VALUES("423","24","382","2105","0.00","0.00","0.00","70.40");
INSERT INTO Tbl_Balanza VALUES("424","25","383","1101","5000.00","0.00","5000.00","0.00");
INSERT INTO Tbl_Balanza VALUES("425","25","385","1102","500.00","0.00","500.00","0.00");
INSERT INTO Tbl_Balanza VALUES("426","25","384","6401","0.00","5000.00","0.00","5000.00");
INSERT INTO Tbl_Balanza VALUES("427","25","386","6402","0.00","500.00","0.00","500.00");
INSERT INTO Tbl_Balanza VALUES("498","25","","2105","0.00","0.00","0.00","1100.00");
INSERT INTO Tbl_Balanza VALUES("499","25","","3104","0.00","0.00","0.00","4400.00");
INSERT INTO Tbl_Balanza VALUES("500","27","387","1101","200.00","0.00","200.00","0.00");
INSERT INTO Tbl_Balanza VALUES("501","27","389","1102","100.00","0.00","100.00","0.00");
INSERT INTO Tbl_Balanza VALUES("502","27","388","6401","0.00","200.00","0.00","200.00");
INSERT INTO Tbl_Balanza VALUES("503","27","390","6506","0.00","100.00","-100.00","0.00");
INSERT INTO Tbl_Balanza VALUES("504","27","","2105","0.00","0.00","0.00","40.00");
INSERT INTO Tbl_Balanza VALUES("505","27","","3104","0.00","200.00","0.00","360.00");
INSERT INTO Tbl_Balanza VALUES("506","28","393","1101","200.00","0.00","200.00","0.00");
INSERT INTO Tbl_Balanza VALUES("507","28","395","1102","100.00","0.00","100.00","0.00");
INSERT INTO Tbl_Balanza VALUES("508","28","394","6401","0.00","200.00","0.00","200.00");
INSERT INTO Tbl_Balanza VALUES("509","28","396","6402","0.00","100.00","0.00","100.00");
INSERT INTO Tbl_Balanza VALUES("510","28","","2105","0.00","0.00","0.00","60.00");
INSERT INTO Tbl_Balanza VALUES("511","28","","3104","0.00","0.00","0.00","240.00");
INSERT INTO Tbl_Balanza VALUES("512","29","","2105","0.00","0.00","0.00","10.00");
INSERT INTO Tbl_Balanza VALUES("513","29","","3104","0.00","0.00","0.00","40.00");
INSERT INTO Tbl_Balanza VALUES("514","29","401","1102","50.00","0.00","50.00","0.00");
INSERT INTO Tbl_Balanza VALUES("515","29","402","6401","0.00","150.00","0.00","150.00");
INSERT INTO Tbl_Balanza VALUES("516","29","","2105","0.00","0.00","0.00","10.00");
INSERT INTO Tbl_Balanza VALUES("517","29","","3104","0.00","0.00","0.00","40.00");
INSERT INTO Tbl_Balanza VALUES("518","29","403","1101","100.00","0.00","100.00","0.00");
INSERT INTO Tbl_Balanza VALUES("519","29","","2105","0.00","0.00","0.00","30.00");
INSERT INTO Tbl_Balanza VALUES("520","29","","3104","0.00","0.00","0.00","120.00");



DROP TABLE IF EXISTS Tbl_BalanzaGeneral;

CREATE TABLE `Tbl_BalanzaGeneral` (
  `IdBalanzaG` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Activo` decimal(10,2) DEFAULT NULL,
  `Pasivo` decimal(10,2) DEFAULT NULL,
  `Patrimonio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`IdBalanzaG`),
  KEY `Tbl_BalanzaGeneral_FK` (`Id_Cliente`),
  CONSTRAINT `Tbl_BalanzaGeneral_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS Tbl_EResultado;

CREATE TABLE `Tbl_EResultado` (
  `Id_Eresultado` int(15) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(15) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ingresos` decimal(10,2) DEFAULT NULL,
  `CostoVentas` decimal(10,2) DEFAULT NULL,
  `UtilidadBruta` decimal(10,2) DEFAULT NULL,
  `GastosOperacionales` decimal(10,2) DEFAULT NULL,
  `Gastosventas` decimal(10,2) DEFAULT NULL,
  `Gastosfinancieros` decimal(10,2) DEFAULT NULL,
  `OtrosGastos` decimal(10,2) DEFAULT NULL,
  `Otrosingresos` decimal(10,2) DEFAULT NULL,
  `UtilidadAntes` decimal(10,2) DEFAULT NULL,
  `ISV` decimal(10,2) DEFAULT NULL,
  `UtilidadPerdida` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Id_Eresultado`),
  KEY `Tbl_EResultado_FK` (`Id_Cliente`),
  CONSTRAINT `Tbl_EResultado_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4;

INSERT INTO Tbl_EResultado VALUES("129","18","","40.00","0.00","40.00","0.00","0.00","0.00","0.00","100.00","140.00","28.00","112.00");
INSERT INTO Tbl_EResultado VALUES("130","18","","40.00","0.00","40.00","0.00","0.00","0.00","0.00","100.00","140.00","28.00","112.00");
INSERT INTO Tbl_EResultado VALUES("131","18","","40.00","0.00","40.00","0.00","0.00","140.00","0.00","100.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("132","19","","200.00","0.00","200.00","0.00","0.00","0.00","0.00","0.00","200.00","40.00","160.00");
INSERT INTO Tbl_EResultado VALUES("133","19","","200.00","0.00","200.00","0.00","0.00","200.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("134","19","","200.00","0.00","200.00","0.00","0.00","200.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("135","20","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","500.00","500.00","100.00","400.00");
INSERT INTO Tbl_EResultado VALUES("136","20","","0.00","0.00","0.00","0.00","0.00","400.00","0.00","500.00","100.00","20.00","80.00");
INSERT INTO Tbl_EResultado VALUES("137","20","","0.00","0.00","0.00","0.00","0.00","400.00","0.00","500.00","100.00","20.00","80.00");
INSERT INTO Tbl_EResultado VALUES("138","21","","0.00","0.00","0.00","-500.00","0.00","0.00","0.00","0.00","500.00","100.00","400.00");
INSERT INTO Tbl_EResultado VALUES("139","22","","-300.00","0.00","-300.00","0.00","0.00","0.00","0.00","0.00","-300.00","-60.00","-240.00");
INSERT INTO Tbl_EResultado VALUES("140","22","","-300.00","0.00","-300.00","0.00","0.00","-300.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("141","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("142","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("143","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("144","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("145","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("146","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("147","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("148","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("149","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("150","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("151","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO Tbl_EResultado VALUES("152","23","","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00","0.00");



DROP TABLE IF EXISTS cuentas_por_pagar;

CREATE TABLE `cuentas_por_pagar` (
  `Id_Cuenta` int(100) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(10) NOT NULL,
  `Cuentas` varchar(50) NOT NULL,
  `Tipo_Cuenta` varchar(25) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Cuenta`),
  KEY `cuentas_por_pagar_FK` (`Id_Usuario`),
  CONSTRAINT `cuentas_por_pagar_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS factura;

CREATE TABLE `factura` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NFACTURA` int(11) DEFAULT NULL,
  `Id_Cliente` int(12) DEFAULT NULL,
  `DESCRIPCION` varchar(80) DEFAULT NULL,
  `TOTAL` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `factura_FK` (`Id_Cliente`),
  CONSTRAINT `factura_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS history_log;

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `history_log_FK` (`Id_Usuario`),
  CONSTRAINT `history_log_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

INSERT INTO history_log VALUES("1","1","has logged in the system at ","2018-11-27 07:58:26");
INSERT INTO history_log VALUES("2","1","has logged out the system at ","2018-11-27 07:59:03");
INSERT INTO history_log VALUES("3","1","has logged in the system at ","2018-11-30 22:32:20");
INSERT INTO history_log VALUES("4","1","has logged in the system at ","2018-12-01 20:28:15");
INSERT INTO history_log VALUES("5","1","has logged out the system at ","2018-11-30 22:42:36");



DROP TABLE IF EXISTS product;

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `NFactura` varchar(25) NOT NULL,
  `Proveedor` varchar(70) NOT NULL,
  `proname` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8;

INSERT INTO product VALUES("1","","","Celular","12","2022-11-11 23:03:27");
INSERT INTO product VALUES("141","","","Celularh","1","2022-11-11 23:14:37");
INSERT INTO product VALUES("142","","","Carro","8","2022-11-11 23:15:16");
INSERT INTO product VALUES("143","","","lapizzzz","240","2022-11-12 00:48:41");
INSERT INTO product VALUES("144","","","tv","115","2022-11-12 00:51:03");
INSERT INTO product VALUES("145","","","3Lt","5","2022-11-12 01:17:00");
INSERT INTO product VALUES("146","","","borradores","13","2022-11-12 10:08:38");
INSERT INTO product VALUES("147","","","merca de la buena","6","2022-11-19 23:48:45");
INSERT INTO product VALUES("148","","","nice","4","2022-11-19 23:52:23");
INSERT INTO product VALUES("149","24","LARACH","Pelo","1","2022-11-21 16:15:27");
INSERT INTO product VALUES("150","24","LARACH","Pelo","1","2022-11-21 16:15:27");
INSERT INTO product VALUES("151","03513543","LARACH","Lapiz","1","2022-11-21 16:16:13");
INSERT INTO product VALUES("152","03513543","LARACH","Lapiz","1","2022-11-21 16:16:13");
INSERT INTO product VALUES("153","00233543","LARACH","cargador","2","2022-11-21 16:19:06");
INSERT INTO product VALUES("154","00233543","LARACH","cargador","1","2022-11-21 16:19:06");
INSERT INTO product VALUES("155","044","mai tyson","cables","1","2022-12-07 01:58:05");
INSERT INTO product VALUES("156","044","mai tyson","vasos","3","2022-12-07 01:58:05");



DROP TABLE IF EXISTS tbl_asientos;

CREATE TABLE `tbl_asientos` (
  `Id_asiento` int(15) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(15) DEFAULT NULL,
  `Id_Usuario` int(15) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `montoTotal` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Id_asiento`),
  KEY `tbl_asientos_FK` (`Id_Cliente`),
  KEY `tbl_asientos_FK_1` (`Id_Usuario`),
  CONSTRAINT `tbl_asientos_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`),
  CONSTRAINT `tbl_asientos_FK_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_asientos VALUES("229","17","1","2022-11-30","ventas","100");
INSERT INTO tbl_asientos VALUES("230","17","1","2022-12-02","Compra de papel","100");
INSERT INTO tbl_asientos VALUES("231","18","1","2022-12-01","caja","100");
INSERT INTO tbl_asientos VALUES("232","18","1","2022-12-02","Hola","10");
INSERT INTO tbl_asientos VALUES("233","18","1","2022-11-27","15","15");
INSERT INTO tbl_asientos VALUES("234","18","1","2022-12-02","10","10");
INSERT INTO tbl_asientos VALUES("235","18","1","2022-11-30","Pago de edificio","5");
INSERT INTO tbl_asientos VALUES("248","18","1","2022-12-05","IMPUESTO POR PAGAR","28");
INSERT INTO tbl_asientos VALUES("249","18","1","2022-12-05","RESULTADO DE EJERCICIO ANTERIOR","112");
INSERT INTO tbl_asientos VALUES("250","19","1","2022-12-05","sdsdsdddsasadwwas","250");
INSERT INTO tbl_asientos VALUES("251","19","1","2022-12-05","IMPUESTO POR PAGAR","40");
INSERT INTO tbl_asientos VALUES("252","19","1","2022-12-05","RESULTADO DE EJERCICIO ANTERIOR","160");
INSERT INTO tbl_asientos VALUES("253","20","1","2022-12-05","Maaa","800");
INSERT INTO tbl_asientos VALUES("254","20","1","2022-12-05","RESULTADO DE EJERCICIO ANTERIOR","400");
INSERT INTO tbl_asientos VALUES("255","21","1","2022-12-05","papamauri","650");
INSERT INTO tbl_asientos VALUES("256","21","1","2022-12-05","IMPUESTO POR PAGAR","100");
INSERT INTO tbl_asientos VALUES("257","21","1","2022-12-05","RESULTADO DE EJERCICIO ANTERIOR","400");
INSERT INTO tbl_asientos VALUES("258","22","1","2022-12-05","paposo","700");
INSERT INTO tbl_asientos VALUES("259","22","1","2022-12-05","IMPUESTO POR PAGAR","-60");
INSERT INTO tbl_asientos VALUES("260","23","1","2022-12-05","papapa","888371");
INSERT INTO tbl_asientos VALUES("261","23","1","2022-12-05","RESULTADO DE EJERCICIO ANTERIOR","0");
INSERT INTO tbl_asientos VALUES("262","24","1","2022-12-05","partst","5500");
INSERT INTO tbl_asientos VALUES("263","25","1","2022-12-06","sdsdsdddsasadww","5500");
INSERT INTO tbl_asientos VALUES("264","27","1","2022-12-06","NUEVO","300");
INSERT INTO tbl_asientos VALUES("265","27","1","2022-12-06","NUEVO2","200");
INSERT INTO tbl_asientos VALUES("266","28","1","2022-12-06","NUEVO","300");
INSERT INTO tbl_asientos VALUES("267","29","1","2022-11-05","prueba23","300");
INSERT INTO tbl_asientos VALUES("268","29","1","2022-11-25","NUEVO2","50");
INSERT INTO tbl_asientos VALUES("269","29","1","2022-10-15","NUEVO","100");



DROP TABLE IF EXISTS tbl_catalago_cuentas;

CREATE TABLE `tbl_catalago_cuentas` (
  `CODIGO_CUENTA` int(11) NOT NULL,
  `Id_Usuario` int(11) DEFAULT NULL,
  `CUENTA` varchar(40) DEFAULT NULL,
  `Mayor` int(8) DEFAULT NULL,
  `Movimiento` varchar(10) DEFAULT NULL,
  `CLASIFICACION` varchar(20) DEFAULT NULL,
  `Estado_Cuenta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_CUENTA`),
  KEY `tbl_catalago_cuentas_FK` (`Id_Usuario`),
  CONSTRAINT `tbl_catalago_cuentas_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_catalago_cuentas VALUES("1",""," ACTIVOS ","1","","","Activo");
INSERT INTO tbl_catalago_cuentas VALUES("2",""," PASIVOS ","2","","","Activo");
INSERT INTO tbl_catalago_cuentas VALUES("3",""," CAPITAL ","31","","","Activo");
INSERT INTO tbl_catalago_cuentas VALUES("6","","ESTADO DE RESULTADOS","6","","","");
INSERT INTO tbl_catalago_cuentas VALUES("11",""," ACTIVO CIRCULANTE ","11","","","Activo");
INSERT INTO tbl_catalago_cuentas VALUES("12",""," ACTIVOS FIJOS ","12","","","Activo");
INSERT INTO tbl_catalago_cuentas VALUES("21",""," PASIVOS CORRIENTES","21","","","Activo");
INSERT INTO tbl_catalago_cuentas VALUES("22",""," PASIVOS A LARGO PLAZO ","22","","","Activo");
INSERT INTO tbl_catalago_cuentas VALUES("64","","INGRESOS","64","","","");
INSERT INTO tbl_catalago_cuentas VALUES("65","","GASTOS","65","","","");
INSERT INTO tbl_catalago_cuentas VALUES("1101","1","CAJA","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("1102","1","BANCOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("1103","1","INVERSIONES TEMPORALES","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("1104","1","CUENTAS POR COBRAR","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("1105","1","INVENTARIOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("1201","1","MOBILIARIO Y EQUIPO","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("1202","1","OTROS ACTIVOS FIJOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("1203","1","DEPRECIACIÓN ACUMULADA","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("2101","1","CUENTAS POR PAGAR","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("2102","1","ACREEDORES VARIOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("2103","1","RETENCIONES","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("2104","1","PROVISIONES","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("2105","1","IMPUESTOS POR PAGAR","","","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("2201","1","PRESTAMOS BANCARIOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("3101","1","CAPITAL SOCIAL","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("3102","1","RESERVAS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("3103","1","RESULTADOS ACUMULADOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("3104","1","UTILIDAD O PÉRDIDA DEL PERIODO","","","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("6401","1","INGRESO POR XXX","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("6402","1","OTROS INGRESOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("6501","1","COSTO DE VENTAS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("6502","1","GASTOS DE OPERACION","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("6503","1","GASTOS DE VENTAS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("6504","1","GASTOS DE ADMINISTRACION","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("6505","1","GASTOS FINANCIEROS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("6506","1","OTROS GASTOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("110101","1"," CAJA CHICA ADMINISTRACION TEGUCIGALPA ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("110102","1"," CAJA CHICA COMAYAGUA ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("110103","1"," CAJA CHICA DOLLARES $$ ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("110201","1"," BANCO PROMERICA CTA.NO. 6-000-542543 ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("110202","1"," BANCO PROMERICA CTA.NO. 6-000-601481 ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("110203","1"," BANCO XXXXXXX CTA.NO.XXXXXXX ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("120101","1"," EDIFICIOS ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("120102","1"," MOBILIARIO Y EQUIPO DE OFICINA ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("120103","1","VEHICULOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("120104","1"," MUEBLES Y ENSERES DE OFICINA ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("120301","1"," DEPRECIACION ACUM.MOBILIARIO Y EQUIP ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("120302","1"," DEPRECIACION ACUM.EQUIPO DE COMPUTO ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("120303","1"," DEPRECIACION ACUMULADA DE VEHICULOS ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("210101","1","PRESTAMOS POR PAGAR A XXX","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("210102","1","PRESTAMO DE XXXX","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("210201","1","IMPREMA","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("210301","1"," I.H.S.S. ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("210401","1"," SUELDOS Y SALARIOS ADMINISTRACION ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("210402","1"," AGUINALDOS 13AVO.MES ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("210403","1"," HONORARIOS POR PAGAR ","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("220101","1","PRESTAMO DE Bco. xxx","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("220102","1","PRESTAMO DE COOPERATIVA XXX","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("310101","1","CAPITAL SOCIAL","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("310201","1","RESERVA LEGAL","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("310202","1","RESERVA DE PREVISION","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("310203","1","RESERVA DE REINVERSION","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("310204","1","RESERVA DE EDUCACIÓN","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("310301","1","UTILIDADES NO DISTRIBUIDAS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("310302","1","PERDIDAS NO APLICADAS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("310303","1","UTILIDADES O PERDIDAS DEL PERIODO","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("640101","1","VENTAS DE XXXX","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("640201","1","DONACIONES","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("650101","1","FLETES Y ACARREOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("650201","1","PAPELERIA Y UTILIES DE OFINA","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("650301","1","COMISIONES SOBRE VENTAS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("650401","1","PAGO DE EMPLEADOS","","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("650501","1","INTERESES SOBRE PRESTAMOS","","NULL","","ACTIVO");



DROP TABLE IF EXISTS tbl_catalago_estado;

CREATE TABLE `tbl_catalago_estado` (
  `CODIGO_CUENTA` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_CUENTA`),
  KEY `tbl_catalago_estado_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_catalago_estado_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;




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
  PRIMARY KEY (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_clientes VALUES("17","ESM JPLSL clien17","FANNY VENTURA 17","121600018900","LLANO ALEGRE, SANTA ELENA","88941525","ACTIVO","SANTA ELENA","2022-11-27 13:16:02");
INSERT INTO tbl_clientes VALUES("18","ESM JPLS cliente 18","FANNY VENTURA 18","121600018900","LLANO ALEGRE, SANTA ELENA","88941525","ACTIVO","SANTA ELENA","2022-11-27 13:16:02");
INSERT INTO tbl_clientes VALUES("19","EMPRESA DE SERVICIOS MULTIPLES JPLSL","BENITEZ MARQUEZ","1219198900003","LLANO ALEGRE SANTA ELENA","88941525","ACTIVO","SANTA ELENA","2022-12-02 15:42:34");
INSERT INTO tbl_clientes VALUES("20","BANCO HONDURENO DE PRODUCCION DE MAURIS","MAURICIO HERNANDEZ","2000899","LA CASA DE MAURI","987263677","ACTIVO","TEGUCIGALPA","2022-12-05 21:58:21");
INSERT INTO tbl_clientes VALUES("21","BANCO HONDURENO DE PRODUCCION AGRICOLA ","LUSIN","20009776","LA CASA DE LUIS","987223677","ACTIVO","TEGUCIGALPA","2022-12-05 22:14:30");
INSERT INTO tbl_clientes VALUES("22","BANCO HONDURENO DE PRODUCCION ","JUAN MA","20054","LA CASA DE JUAN","987263677","ACTIVO","TEGUCIGALPA","2022-12-05 22:21:48");
INSERT INTO tbl_clientes VALUES("23","BANCO HONDURENO DE ISAAC","ISAAC","209876","LA CASA DE ISAAC","987223677","ACTIVO","TEGUCIGALPA","2022-12-05 22:50:15");
INSERT INTO tbl_clientes VALUES("24","BANCO PAZ","MAURICIO MONTOYA","208776","ASSASASS","98332677","ACTIVO","TEGUCIGALPA","2022-12-05 23:44:40");
INSERT INTO tbl_clientes VALUES("25","LUISMI CLUBS","LUISMO","22265","LA CASA DE LUISWWW","987233677","ACTIVO","TEGUCIGALPA","2022-12-06 01:39:17");
INSERT INTO tbl_clientes VALUES("26","BAR MAURIS","ESPERANZA","34456","LA CASA DE ESPERANZA","98763523","ACTIVO","TEGUCIGALPA","2022-12-06 01:40:01");
INSERT INTO tbl_clientes VALUES("27","NUEVA","NUEVO","123456789","UNAH","123456789","ACTIVO","FAR FAR AWAY","2022-12-06 16:47:26");
INSERT INTO tbl_clientes VALUES("28","MIMI","MIMI MA","321654987","UNAH","987654321","ACTIVO","TEGUCIGALPA","2022-12-06 16:56:08");
INSERT INTO tbl_clientes VALUES("29","MONICA","MONICAS","132798465","UNAH","654987321","ACTIVO","TEGUCIGALPA","2022-12-06 19:36:01");



DROP TABLE IF EXISTS tbl_detallleasientos;

CREATE TABLE `tbl_detallleasientos` (
  `Id_detalle` int(15) NOT NULL AUTO_INCREMENT,
  `CODIGO_CUENTA` int(15) DEFAULT NULL,
  `debito` decimal(10,0) DEFAULT NULL,
  `credito` decimal(10,0) DEFAULT NULL,
  `Id_asiento` int(15) DEFAULT NULL,
  `descripcion` varchar(80) NOT NULL,
  `Estado` int(15) DEFAULT 0,
  PRIMARY KEY (`Id_detalle`),
  KEY `tbl_detallleasientos_FK` (`CODIGO_CUENTA`),
  KEY `tbl_detallleasientos_FK_1` (`Id_asiento`),
  CONSTRAINT `tbl_detallleasientos_FK` FOREIGN KEY (`CODIGO_CUENTA`) REFERENCES `tbl_catalago_cuentas` (`CODIGO_CUENTA`),
  CONSTRAINT `tbl_detallleasientos_FK_1` FOREIGN KEY (`Id_asiento`) REFERENCES `tbl_asientos` (`Id_asiento`)
) ENGINE=InnoDB AUTO_INCREMENT=405 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_detallleasientos VALUES("313","1101","100","0","231","110101","1");
INSERT INTO tbl_detallleasientos VALUES("314","6402","0","100","231","640201","1");
INSERT INTO tbl_detallleasientos VALUES("315","1101","10","0","232","0","1");
INSERT INTO tbl_detallleasientos VALUES("316","6401","0","10","232","640101","1");
INSERT INTO tbl_detallleasientos VALUES("317","1101","15","0","233","110101","1");
INSERT INTO tbl_detallleasientos VALUES("318","6401","0","15","233","640101","1");
INSERT INTO tbl_detallleasientos VALUES("319","1101","10","0","234","110101","1");
INSERT INTO tbl_detallleasientos VALUES("320","6401","0","10","234","640101","1");
INSERT INTO tbl_detallleasientos VALUES("321","1101","5","0","235","110101","1");
INSERT INTO tbl_detallleasientos VALUES("322","6401","0","5","235","640101","1");
INSERT INTO tbl_detallleasientos VALUES("339","6504","28","0","248","650401","1");
INSERT INTO tbl_detallleasientos VALUES("340","2101","0","28","248","210101","1");
INSERT INTO tbl_detallleasientos VALUES("341","3103","0","112","249","310303","1");
INSERT INTO tbl_detallleasientos VALUES("342","6504","112","0","249","650401","1");
INSERT INTO tbl_detallleasientos VALUES("343","1101","200","0","250","110101","1");
INSERT INTO tbl_detallleasientos VALUES("344","6401","0","200","250","640101","1");
INSERT INTO tbl_detallleasientos VALUES("345","1101","0","50","250","110101","1");
INSERT INTO tbl_detallleasientos VALUES("346","1201","50","0","250","120102","1");
INSERT INTO tbl_detallleasientos VALUES("347","6504","40","0","251","650401","1");
INSERT INTO tbl_detallleasientos VALUES("348","2101","0","40","251","210101","1");
INSERT INTO tbl_detallleasientos VALUES("349","3103","0","160","252","310303","1");
INSERT INTO tbl_detallleasientos VALUES("350","6504","160","0","252","650401","1");
INSERT INTO tbl_detallleasientos VALUES("351","1101","500","0","253","110101","1");
INSERT INTO tbl_detallleasientos VALUES("352","6402","0","500","253","640201","1");
INSERT INTO tbl_detallleasientos VALUES("353","1102","300","0","253","110201","1");
INSERT INTO tbl_detallleasientos VALUES("354","2101","0","300","253","210101","1");
INSERT INTO tbl_detallleasientos VALUES("355","3103","0","400","254","310303","1");
INSERT INTO tbl_detallleasientos VALUES("356","6504","400","0","254","650401","1");
INSERT INTO tbl_detallleasientos VALUES("357","1102","150","0","255","110202","1");
INSERT INTO tbl_detallleasientos VALUES("358","1201","0","150","255","120102","1");
INSERT INTO tbl_detallleasientos VALUES("359","1101","500","0","255","110101","1");
INSERT INTO tbl_detallleasientos VALUES("360","6502","0","500","255","650201","1");
INSERT INTO tbl_detallleasientos VALUES("361","6504","100","0","256","650401","1");
INSERT INTO tbl_detallleasientos VALUES("362","2101","0","100","256","210101","1");
INSERT INTO tbl_detallleasientos VALUES("363","3103","0","400","257","310303","1");
INSERT INTO tbl_detallleasientos VALUES("364","6504","400","0","257","650401","1");
INSERT INTO tbl_detallleasientos VALUES("365","6401","300","0","258","640101","1");
INSERT INTO tbl_detallleasientos VALUES("366","1101","0","300","258","110101","1");
INSERT INTO tbl_detallleasientos VALUES("367","1105","400","0","258","0","1");
INSERT INTO tbl_detallleasientos VALUES("368","1102","0","400","258","110202","1");
INSERT INTO tbl_detallleasientos VALUES("369","6504","-60","0","259","650401","1");
INSERT INTO tbl_detallleasientos VALUES("370","2101","0","-60","259","210101","1");
INSERT INTO tbl_detallleasientos VALUES("371","3103","0","-240","259","310303","1");
INSERT INTO tbl_detallleasientos VALUES("372","6504","-240","0","259","650401","1");
INSERT INTO tbl_detallleasientos VALUES("373","1102","0","660000","260","110201","1");
INSERT INTO tbl_detallleasientos VALUES("374","6506","660000","0","260","0","1");
INSERT INTO tbl_detallleasientos VALUES("375","1101","0","228371","260","110101","1");
INSERT INTO tbl_detallleasientos VALUES("376","2101","228371","0","260","210101","1");
INSERT INTO tbl_detallleasientos VALUES("377","3103","0","0","261","310303","1");
INSERT INTO tbl_detallleasientos VALUES("378","6504","0","0","261","650401","1");
INSERT INTO tbl_detallleasientos VALUES("379","1101","5000","0","262","110101","1");
INSERT INTO tbl_detallleasientos VALUES("380","6401","0","5000","262","640101","1");
INSERT INTO tbl_detallleasientos VALUES("381","1102","500","0","262","110202","1");
INSERT INTO tbl_detallleasientos VALUES("382","6402","0","500","262","640201","1");
INSERT INTO tbl_detallleasientos VALUES("383","1101","5000","0","263","110101","1");
INSERT INTO tbl_detallleasientos VALUES("384","6401","0","5000","263","640101","1");
INSERT INTO tbl_detallleasientos VALUES("385","1102","500","0","263","110202","1");
INSERT INTO tbl_detallleasientos VALUES("386","6402","0","500","263","640201","1");
INSERT INTO tbl_detallleasientos VALUES("387","1101","200","0","264","110102","1");
INSERT INTO tbl_detallleasientos VALUES("388","6401","0","200","264","640101","1");
INSERT INTO tbl_detallleasientos VALUES("389","1102","100","0","264","110202","1");
INSERT INTO tbl_detallleasientos VALUES("390","6506","0","100","264","0","1");
INSERT INTO tbl_detallleasientos VALUES("391","6506","200","0","265","0","0");
INSERT INTO tbl_detallleasientos VALUES("392","3104","0","200","265","0","1");
INSERT INTO tbl_detallleasientos VALUES("393","1101","200","0","266","110102","1");
INSERT INTO tbl_detallleasientos VALUES("394","6401","0","200","266","640101","1");
INSERT INTO tbl_detallleasientos VALUES("395","1102","100","0","266","110202","1");
INSERT INTO tbl_detallleasientos VALUES("396","6402","0","100","266","640201","1");
INSERT INTO tbl_detallleasientos VALUES("397","1101","200","0","267","110101","1");
INSERT INTO tbl_detallleasientos VALUES("398","6401","0","200","267","640101","1");
INSERT INTO tbl_detallleasientos VALUES("399","1102","100","0","267","110202","1");
INSERT INTO tbl_detallleasientos VALUES("400","6401","0","100","267","640101","1");
INSERT INTO tbl_detallleasientos VALUES("401","1102","50","0","268","110201","1");
INSERT INTO tbl_detallleasientos VALUES("402","6401","0","50","268","640101","1");
INSERT INTO tbl_detallleasientos VALUES("403","1101","100","0","269","110103","1");
INSERT INTO tbl_detallleasientos VALUES("404","6401","0","100","269","640101","1");



DROP TABLE IF EXISTS tbl_errores;

CREATE TABLE `tbl_errores` (
  `COD_ERROR` int(11) NOT NULL,
  `ERROR` varchar(250) DEFAULT NULL,
  `CODIGO` varchar(15) DEFAULT NULL,
  `MENSAJE` varchar(250) DEFAULT NULL,
  `Id_Usuario` int(12) DEFAULT NULL,
  PRIMARY KEY (`COD_ERROR`),
  KEY `tbl_errores_FK` (`Id_Usuario`),
  CONSTRAINT `tbl_errores_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_errores VALUES("1","No se puede conectar a la base de datos","ERR-001","Revise las credenciales de conexion hacia la base de datos","");
INSERT INTO tbl_errores VALUES("2","No se puede hacer la consulta a la base de datos","ERR-002","Se presento un error en la consulta hacia la tabla TBL_USUARIO","");
INSERT INTO tbl_errores VALUES("3","Error en la consulta hacia la tabla PARAMETROS","ERR-003","Ocurrio un error en la llamada de los parametros","");
INSERT INTO tbl_errores VALUES("4","Error en la proceso de actualizacion del estado en la tabla TBL_USUARIO","ERR-004","Revise la consulta hacía la base de datos","");



DROP TABLE IF EXISTS tbl_estado;

CREATE TABLE `tbl_estado` (
  `CODIGO_CUENTA` int(11) DEFAULT NULL,
  `Id_Cliente` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL,
  KEY `tbl_estado_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_estado_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS tbl_kardex;

CREATE TABLE `tbl_kardex` (
  `Id_Usuario` int(11) NOT NULL,
  `fecha` varchar(30) DEFAULT current_timestamp(),
  `detalle` varchar(15) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `proname` varchar(15) DEFAULT NULL,
  `cant_entrada` int(11) DEFAULT NULL,
  `total_cante` decimal(10,0) DEFAULT NULL,
  `cant_salida` int(11) DEFAULT NULL,
  `total_cants` decimal(10,0) DEFAULT NULL,
  `Id_kardex` int(15) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id_kardex`),
  KEY `tbl_kardex_FK` (`Id_Usuario`),
  KEY `tbl_kardex_FK_1` (`id_product`),
  CONSTRAINT `tbl_kardex_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`),
  CONSTRAINT `tbl_kardex_FK_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_kardex VALUES("1","2022-11-12","ENTRADA","1","COOL","120","1150","","","17");
INSERT INTO tbl_kardex VALUES("1","2022-11-12","ENTRADA","1","lapizzzz","120","1150","","","18");
INSERT INTO tbl_kardex VALUES("1","2022-11-13","ENTRADA","1","tv","120","725","","","19");
INSERT INTO tbl_kardex VALUES("1","11-12-2022 01:01:37 am","SALIDA","1","tv             ","","","1","6","23");
INSERT INTO tbl_kardex VALUES("1","11-12-2022 01:03:47 am","SALIDA","1","tv             ","","","1","6","24");
INSERT INTO tbl_kardex VALUES("1","2022-11-12","ENTRADA","1","3Lt","6","460","","","25");
INSERT INTO tbl_kardex VALUES("1","11-12-2022 01:18:06 am","SALIDA","1","3Lt            ","","","1","77","26");
INSERT INTO tbl_kardex VALUES("1","2022-11-12","ENTRADA","1","borradores","10","12","","","27");
INSERT INTO tbl_kardex VALUES("1","11-13-2022 10:32:58 am","SALIDA","1","borradores     ","","","5","6","28");
INSERT INTO tbl_kardex VALUES("1","11-13-2022 10:44:20 am","SALIDA","1","borradores     ","","","2","2","29");
INSERT INTO tbl_kardex VALUES("1","2022-11-13","ENTRADA","1","borradores","10","12","","","30");
INSERT INTO tbl_kardex VALUES("1","2022-11-19","ENTRADA","1","merca de la bue","6","","","","31");
INSERT INTO tbl_kardex VALUES("1","2022-11-18","ENTRADA","1","nice","4","","","","32");
INSERT INTO tbl_kardex VALUES("1","","ENTRADA","149","Pelo","1","","","","33");
INSERT INTO tbl_kardex VALUES("1","","ENTRADA","150","Pelo","1","","","","34");
INSERT INTO tbl_kardex VALUES("1","","ENTRADA","151","Lapiz","1","","","","35");
INSERT INTO tbl_kardex VALUES("1","","ENTRADA","152","Lapiz","1","","","","36");
INSERT INTO tbl_kardex VALUES("1","2022-11-21 16:19:06","ENTRADA","153","cargador","2","","","","37");
INSERT INTO tbl_kardex VALUES("1","2022-11-21 16:19:06","ENTRADA","154","cargador","1","","","","38");
INSERT INTO tbl_kardex VALUES("1","2022-12-07 01:58:05","ENTRADA","155","cables","1","","","","39");
INSERT INTO tbl_kardex VALUES("1","2022-12-07 01:58:05","ENTRADA","156","vasos","3","","","","40");



DROP TABLE IF EXISTS tbl_libros;

CREATE TABLE `tbl_libros` (
  `Id_Libro` int(25) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `Id_Cliente` int(11) NOT NULL,
  `caja` int(25) NOT NULL,
  PRIMARY KEY (`Id_Libro`),
  KEY `tbl_libros_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_libros_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=406 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_libros VALUES("387","2022-11-27","17","0");
INSERT INTO tbl_libros VALUES("388","2022-11-27","17","0");
INSERT INTO tbl_libros VALUES("389","2022-11-27","17","0");
INSERT INTO tbl_libros VALUES("390","2022-11-27","17","0");
INSERT INTO tbl_libros VALUES("391","2022-11-27","17","0");
INSERT INTO tbl_libros VALUES("392","2022-11-27","17","0");
INSERT INTO tbl_libros VALUES("393","2022-11-27","17","0");
INSERT INTO tbl_libros VALUES("394","2022-11-27","17","0");
INSERT INTO tbl_libros VALUES("395","2022-11-02","17","0");
INSERT INTO tbl_libros VALUES("396","2022-11-02","17","0");
INSERT INTO tbl_libros VALUES("397","2022-11-02","17","0");
INSERT INTO tbl_libros VALUES("398","2022-11-02","17","0");
INSERT INTO tbl_libros VALUES("399","2022-11-02","17","0");
INSERT INTO tbl_libros VALUES("400","2022-11-02","17","0");
INSERT INTO tbl_libros VALUES("401","2022-11-02","17","0");
INSERT INTO tbl_libros VALUES("402","2022-11-02","17","0");
INSERT INTO tbl_libros VALUES("403","2022-11-09","17","0");
INSERT INTO tbl_libros VALUES("404","2022-11-09","17","0");
INSERT INTO tbl_libros VALUES("405","2022-11-09","17","0");



DROP TABLE IF EXISTS tbl_ms_bitacora;

CREATE TABLE `tbl_ms_bitacora` (
  `Id_Bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` datetime DEFAULT NULL,
  `Accion` varchar(2000) DEFAULT NULL,
  `Descripcion` varchar(2000) DEFAULT NULL,
  `Id_Usuario` int(12) DEFAULT NULL,
  PRIMARY KEY (`Id_Bitacora`),
  KEY `tbl_ms_bitacora_FK` (`Id_Usuario`),
  CONSTRAINT `tbl_ms_bitacora_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_ms_bitacora VALUES("3","2022-11-11 01:54:50","INSERTAR","SE CREO EL USUARIO = NN","1");
INSERT INTO tbl_ms_bitacora VALUES("4","2022-11-13 00:43:24","INSERTAR","SE CREO EL USUARIO = CARTAGENA","134");
INSERT INTO tbl_ms_bitacora VALUES("5","2022-11-13 00:43:40","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO CARTAGENA DE INACTIVO A ACTIVO","134");
INSERT INTO tbl_ms_bitacora VALUES("6","2022-11-13 00:50:24","INSERTAR","SE CREO EL USUARIO = THELUIZZ","135");
INSERT INTO tbl_ms_bitacora VALUES("7","2022-11-13 00:51:03","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO THELUIZZ DE INACTIVO A ACTIVO","135");
INSERT INTO tbl_ms_bitacora VALUES("8","2022-11-13 00:52:50","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO THELUIZZ DE ACTIVO A ACTIVO","135");
INSERT INTO tbl_ms_bitacora VALUES("9","2022-11-13 08:38:16","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO FANNYY DE INACTIVO A ACTIVO","112");
INSERT INTO tbl_ms_bitacora VALUES("11","2022-12-07 01:17:34","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO FANNY DE ACTIVO A ACTIVO","2");
INSERT INTO tbl_ms_bitacora VALUES("12","2022-12-07 01:39:49","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO THELUIZZ DE ACTIVO A ACTIVO","135");
INSERT INTO tbl_ms_bitacora VALUES("13","2022-12-07 01:40:21","INSERTAR","SE CREO EL USUARIO = MAURI","136");
INSERT INTO tbl_ms_bitacora VALUES("14","2022-12-07 01:41:35","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO MAURI DE INACTIVO A ACTIVO","136");
INSERT INTO tbl_ms_bitacora VALUES("15","2022-12-07 01:44:40","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO MAURI DE ACTIVO A ACTIVO","136");
INSERT INTO tbl_ms_bitacora VALUES("16","2022-12-07 01:46:39","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO MAURI DE ACTIVO A ACTIVO","136");
INSERT INTO tbl_ms_bitacora VALUES("17","2022-12-07 01:47:18","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO MAURI DE ACTIVO A ACTIVO","136");
INSERT INTO tbl_ms_bitacora VALUES("18","2022-12-07 01:49:16","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO MAURI DE ACTIVO A ACTIVO","136");



DROP TABLE IF EXISTS tbl_objetos;

CREATE TABLE `tbl_objetos` (
  `Id_Objetos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'número secuencial que identifica de manera unica a un objeto',
  `Objetos` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'campo que registra el nombre de un objeto',
  `Descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Campo que registra el nombre de un cargo',
  `Tipo_Objeto` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'campo que registra un tipo de objeto',
  PRIMARY KEY (`Id_Objetos`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `Id_Usuario` int(10) DEFAULT NULL,
  `Fecha_Creacion` date DEFAULT NULL,
  `Fecha_Modificacion` date DEFAULT NULL,
  PRIMARY KEY (`Id_Parametro`),
  KEY `tbl_parametros_FK` (`Id_Usuario`),
  CONSTRAINT `tbl_parametros_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_parametros VALUES("1","Bloquearusuario","4","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("2","Correo Reporte","E-mail: edgard_issa7@yahoo.com","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("3","Telefono Reporte","Tel: 2227-9327 ; Cel: 9776-9891","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("4","Direccion Empresa","Tegucigalpa","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("5","Impuesto","20","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("6","Minutos_Vigencia_Token","10","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("7","web","www.InversionesFinancieras.com","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("8","RTN","08011972047876","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("9","Correo Seguridad","inversionesfinancierasish@gmail.com","1","","");
INSERT INTO tbl_parametros VALUES("10","CAI","FC3388-ED92E4-8E43A9-36D5A8-AFE2F2-78","1","","");
INSERT INTO tbl_parametros VALUES("11","Rango_Inicial","000-001-01-00000001","1","","");
INSERT INTO tbl_parametros VALUES("12","Rango_Final","000-001-01-00000100","1","","");
INSERT INTO tbl_parametros VALUES("13","Punto_emision","000","1","","");
INSERT INTO tbl_parametros VALUES("14","Establecimiento","001","","","");
INSERT INTO tbl_parametros VALUES("15","Tipo_documento","01","","","");
INSERT INTO tbl_parametros VALUES("16","CAI","5","","","");
INSERT INTO tbl_parametros VALUES("18","PLAY","255","","","");



DROP TABLE IF EXISTS tbl_preguntas;

CREATE TABLE `tbl_preguntas` (
  `Id_Preguntas` int(11) NOT NULL AUTO_INCREMENT,
  `Preguntas` varchar(40) NOT NULL,
  PRIMARY KEY (`Id_Preguntas`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO tbl_preguntas VALUES("21","nx");



DROP TABLE IF EXISTS tbl_roles;

CREATE TABLE `tbl_roles` (
  `Id_Rol` int(11) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Estado` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_roles VALUES("1","ADMINISTRADOR","ACTIVO","USUARIO ADMINISTRADOR");
INSERT INTO tbl_roles VALUES("2","SECRETARIO","ACTIVO","USUARIO SECRETARIO");
INSERT INTO tbl_roles VALUES("3","SEGURIDAD","ACTIVO","USUARIO SEGURIDAD");
INSERT INTO tbl_roles VALUES("4","NUEVO","ACTIVO","USUARIO NUEVO");
INSERT INTO tbl_roles VALUES("5","CONTADOR","ACTIVO","Contador");
INSERT INTO tbl_roles VALUES("6","SUPERVISOR","INACTIVO","Sepervisor");
INSERT INTO tbl_roles VALUES("9","N","INACTIVO","K");
INSERT INTO tbl_roles VALUES("10","PRUEBA","INACTIVO","hollaa");



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
) ENGINE=InnoDB AUTO_INCREMENT=1731 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_roles_objetos VALUES("1605","6","1","0","0","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1606","6","2","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1607","6","3","0","0","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1608","6","4","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1609","6","5","0","0","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1610","6","6","0","0","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1611","6","7","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1612","6","8","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1613","6","9","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1614","6","10","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1615","6","12","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1616","6","13","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1617","6","14","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1618","6","15","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1619","6","16","0","0","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1620","6","17","0","0","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1621","6","18","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1622","6","19","0","0","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1641","5","1","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1642","5","2","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1643","5","3","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1644","5","4","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1645","5","5","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1646","5","6","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1647","5","7","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1648","5","8","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1649","5","9","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1650","5","10","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1651","5","12","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1652","5","13","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1653","5","14","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1654","5","15","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1655","5","16","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1656","5","17","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1657","5","18","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1658","5","19","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1695","1","1","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1696","1","2","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1697","1","3","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1698","1","4","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1699","1","5","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1700","1","6","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1701","1","7","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1702","1","8","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1703","1","9","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1704","1","10","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1705","1","12","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1706","1","13","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1707","1","14","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1708","1","15","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1709","1","16","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1710","1","17","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1711","1","18","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1712","1","19","1","1","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1713","2","1","0","1","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1714","2","2","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1715","2","3","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1716","2","4","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1717","2","5","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1718","2","6","0","0","0","0","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1719","2","7","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1720","2","8","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1721","2","9","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1722","2","10","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1723","2","12","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1724","2","13","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1725","2","14","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1726","2","15","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1727","2","16","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1728","2","17","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1729","2","18","1","0","1","1","","0000-00-00","1","0000-00-00");
INSERT INTO tbl_roles_objetos VALUES("1730","2","19","1","0","0","1","","0000-00-00","1","0000-00-00");



DROP TABLE IF EXISTS tbl_token;

CREATE TABLE `tbl_token` (
  `Id_token` int(11) NOT NULL AUTO_INCREMENT,
  `Token` varchar(100) NOT NULL,
  `Id_Usuario` int(10) NOT NULL,
  `Fecha_inicio` datetime NOT NULL,
  `Fecha_final` datetime NOT NULL,
  PRIMARY KEY (`Id_token`),
  KEY `tbl_token_FK` (`Id_Usuario`),
  CONSTRAINT `tbl_token_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_token VALUES("3","urUkxEgadtlVkcabK5bs","134","2022-11-13 00:46:04","2022-11-13 00:56:04");
INSERT INTO tbl_token VALUES("5","FcD6LhVMSyEkMqsPmsya","1","2022-12-05 03:36:12","2022-12-05 03:46:12");



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
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_usuario VALUES("1","ADMIN","ADMINISTRADOR","ACTIVO","ADMIN","1","2022-10-28 20:34:41.000000","0","","2022-10-28 20:34:41.000000","admin@gmail.com","106433");
INSERT INTO tbl_usuario VALUES("2","FANNY","FANNY2","ACTIVO","Osit@123","2","2022-10-28 20:35:13.000000","0","","2022-10-28 20:35:13.000000","merarifannny@gmail.com","0");
INSERT INTO tbl_usuario VALUES("111","AAA","FANNY","INACTIVO","ADMIN1@23","4","","","","","merannny@gmail.com","0");
INSERT INTO tbl_usuario VALUES("112","FANNYY","JOSE LUIS martinez","ACTIVO","ADMIN1@23","4","","","","","hhh@gmail.com","0");
INSERT INTO tbl_usuario VALUES("127","NN","AAA","INACTIVO","ADMIN1234","4","","","","","gggg@gmail.com","0");
INSERT INTO tbl_usuario VALUES("128","GGG","AAA","INACTIVO","ADMIN1234","4","","","","","npp@gmail.com","0");
INSERT INTO tbl_usuario VALUES("129","PP","AAA","INACTIVO","ADMIN1234","4","","","","","nn@gmail.com","0");
INSERT INTO tbl_usuario VALUES("130","OP","QR","INACTIVO","ADMIN1234","4","","","","","opp@gmail.com","0");
INSERT INTO tbl_usuario VALUES("131","UI","AAA","INACTIVO","ADMIN1234","4","","","","","NNN@gmail.com","0");
INSERT INTO tbl_usuario VALUES("132","GF","AAA","INACTIVO","ADMIN1234","4","","","","","snsn@gmail.com","0");
INSERT INTO tbl_usuario VALUES("133","FANNYMMM","AAA","INACTIVO","Osit@123","4","","","","","y@gmail.com","0");
INSERT INTO tbl_usuario VALUES("134","CARTAGENA","ESPERANZA CARTAGENA","ACTIVO","Hola123@","2","","","","","cartagenaesperanza16@gmail.com","0");
INSERT INTO tbl_usuario VALUES("135","THELUIZZ","jose luis martinez","ACTIVO","Luiz98@xd","1","","","13-11-2022","","luiz@gmail.com","0");
INSERT INTO tbl_usuario VALUES("136","MAURI","MAURI","ACTIVO","1234QwXD123","2","","","","","luizzjm9@gmail.com","0");



SET FOREIGN_KEY_CHECKS=1;