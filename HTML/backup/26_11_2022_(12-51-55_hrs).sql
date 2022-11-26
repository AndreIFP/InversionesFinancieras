SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS 2w4GSUinHO;

USE 2w4GSUinHO;

DROP TABLE IF EXISTS TBL_Balance_General;

CREATE TABLE `TBL_Balance_General` (
  `Id_Balance_General` int(10) NOT NULL AUTO_INCREMENT,
  `Tipo_Cuenta` varchar(100) DEFAULT NULL,
  `Id_Cliente` int(10) DEFAULT NULL,
  `Monto` decimal(10,2) DEFAULT NULL,
  `Fecha_Inicial` date DEFAULT NULL,
  `Fecha_Final` date DEFAULT NULL,
  PRIMARY KEY (`Id_Balance_General`),
  KEY `TBL_Balance_General_FK` (`Id_Cliente`),
  CONSTRAINT `TBL_Balance_General_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO TBL_PREGUNTAS_X_USUARIO VALUES("1","1","HGG","GG","1");
INSERT INTO TBL_PREGUNTAS_X_USUARIO VALUES("3","135","¿CUAL ES TU COLOR FAVORITO?","verde","2");



DROP TABLE IF EXISTS cuentas_por_cobrar;

CREATE TABLE `cuentas_por_cobrar` (
  `Id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) DEFAULT NULL,
  `Cuentas` varchar(50) DEFAULT NULL,
  `Tipo_Cuenta` varchar(25) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Deuda_Cuenta_Total` decimal(10,0) DEFAULT NULL,
  `Deposito` decimal(10,0) DEFAULT NULL,
  `Deuda_Actual` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Id_cuenta`),
  KEY `cuentas_por_cobrar_FK` (`Id_Cliente`),
  CONSTRAINT `cuentas_por_cobrar_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO cuentas_por_cobrar VALUES("1","1","","activo","nhhh","500","0","0");



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

INSERT INTO factura VALUES("20","598432","0","NINGUNO ","1150");



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



DROP TABLE IF EXISTS libro;

CREATE TABLE `libro` (
  `id_libro` int(200) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `cuenta` varchar(200) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `monto` float NOT NULL,
  `debe_haber` varchar(200) NOT NULL,
  `Id_Cliente` int(10) NOT NULL,
  `temporada` varchar(10) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_libro`),
  KEY `libro_FK` (`Id_Cliente`),
  KEY `libro_FK_1` (`Id_Usuario`),
  CONSTRAINT `libro_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`),
  CONSTRAINT `libro_FK_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=latin1;

INSERT INTO libro VALUES("1","2022-08-09 00:00:00","Bancos","N/D","200","debe","1","10","1");
INSERT INTO libro VALUES("2","2022-08-12 00:00:00","Caja","N/D","1000","debe","1","10","1");
INSERT INTO libro VALUES("3","2022-08-11 00:00:00","Cuentas x Cobrar","N/D","500","debe","3","10","1");
INSERT INTO libro VALUES("4","2022-08-26 00:00:00","Documentos por cobrar","N/D","300","debe","4","10","1");
INSERT INTO libro VALUES("5","2022-08-16 00:00:00","Documentos por cobrar","N/D","2000","debe","5","10","1");
INSERT INTO libro VALUES("6","2022-08-13 00:00:00","Pagos Anticipados","N/D","100","debe","1","10","1");
INSERT INTO libro VALUES("291","2022-10-31 19:10:31","A","----","60","debe","2","--","2");
INSERT INTO libro VALUES("292","2022-10-31 19:10:58","A","----","60","haber","2","--","2");
INSERT INTO libro VALUES("296","2022-11-17 00:00:00","Documentos por cobrar","22","4","debe","3","10","1");
INSERT INTO libro VALUES("297","2022-11-10 00:00:00","Cuentas x Cobrar","nhhh","200","debe","4","10","1");
INSERT INTO libro VALUES("298","2022-11-23 00:00:00","Caja","nhhh","200","debe","4","10","1");
INSERT INTO libro VALUES("299","2022-11-25 00:00:00","Caja","22","500","debe","4","10","1");
INSERT INTO libro VALUES("300","2022-11-24 00:00:00","Caja","w","500","haber","4","10","1");
INSERT INTO libro VALUES("301","2022-11-25 00:00:00","BBBB","22","300","debe","3","10","1");
INSERT INTO libro VALUES("302","2022-11-11 00:00:00","BBBB","nhhh","600","debe","3","10","1");
INSERT INTO libro VALUES("303","2022-11-17 00:00:00","BBBB","nhhh","300","debe","4","10","1");
INSERT INTO libro VALUES("308","2022-11-11 00:00:00","BANCOS","nhhh","300","debe","1","10","1");
INSERT INTO libro VALUES("309","2022-11-11 00:00:00","BBBB","nhhh","500","debe","1","10","1");
INSERT INTO libro VALUES("310","2022-11-13 00:00:00","Caja","efectivo","15000","debe","2","10","1");
INSERT INTO libro VALUES("311","2022-11-13 00:00:00","Caja","retiro","5000","haber","2","10","1");
INSERT INTO libro VALUES("312","2022-11-13 00:00:00","Capital Social","money","7000","debe","2","10","1");
INSERT INTO libro VALUES("313","2022-11-13 00:00:00","Edificios","local","2500","debe","2","10","1");
INSERT INTO libro VALUES("314","2022-11-13 00:00:00","Caja","nada","1000","haber","2","10","1");
INSERT INTO libro VALUES("315","2022-11-13 00:00:00","Proveedores","juan","5000","debe","2","10","1");
INSERT INTO libro VALUES("316","2022-11-13 00:00:00","Proveedores","juan","2500","haber","2","10","1");
INSERT INTO libro VALUES("317","2022-10-13 00:00:00","CAJA CHICA","prueba de cuenta anterior","1000","debe","16","10","1");
INSERT INTO libro VALUES("318","2022-11-02 00:00:00","CAJA CHICA","yes","5000","debe","16","10","1");
INSERT INTO libro VALUES("319","2022-11-03 00:00:00","CAJA CHICA","hola","500","haber","16","10","1");
INSERT INTO libro VALUES("320","2022-11-02 00:00:00","Bancos","yes","5000","debe","16","10","1");
INSERT INTO libro VALUES("321","2022-11-03 00:00:00","Bancos","hola","500","haber","16","10","1");



DROP TABLE IF EXISTS libro2;

CREATE TABLE `libro2` (
  `id_libro` int(200) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cuenta` varchar(200) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `monto` float NOT NULL,
  `debe_haber` varchar(200) NOT NULL,
  `Id_Cliente` int(10) NOT NULL,
  `temporada` varchar(10) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_libro`),
  KEY `libro2_FK` (`Id_Cliente`),
  KEY `libro2_FK_1` (`Id_Usuario`),
  CONSTRAINT `libro2_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`),
  CONSTRAINT `libro2_FK_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO libro2 VALUES("1","2022-08-12","Venta","N/D","250","debe","1","10","1");
INSERT INTO libro2 VALUES("2","2022-08-11","Costo de venta","N/D","1","debe","1","10","1");
INSERT INTO libro2 VALUES("3","2022-08-17","Utilidad antes de impuestos","N/D","1","","1","10","1");
INSERT INTO libro2 VALUES("5","2022-11-10","Gastos de venta","nhhh","300","","1","10","1");
INSERT INTO libro2 VALUES("9","2022-11-13","Venta","nada","5000","","2","10","1");
INSERT INTO libro2 VALUES("10","2022-11-13","Otros Gastos","nada","1000","","2","10","1");
INSERT INTO libro2 VALUES("11","2022-11-10","Venta","yes","1000","","16","10","1");



DROP TABLE IF EXISTS product;

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `NFactura` varchar(25) NOT NULL,
  `Proveedor` varchar(70) NOT NULL,
  `proname` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;

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



DROP TABLE IF EXISTS tbl_balance;

CREATE TABLE `tbl_balance` (
  `Id_Balance` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) DEFAULT NULL,
  `Total_Activo` int(11) DEFAULT NULL,
  `Total_Pasivo` int(11) DEFAULT NULL,
  `Total_Patrimonio` int(11) DEFAULT NULL,
  `Total_Pasivo_Patrimonio` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Balance`),
  KEY `tbl_balance_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_balance_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_balance VALUES("2","1","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("3","2","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("4","3","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("5","4","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("6","5","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("7","1","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("8","2","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("9","3","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("10","4","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("11","4","4300","0","3000","3000");
INSERT INTO tbl_balance VALUES("12","4","4300","0","3000","3000");



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

INSERT INTO tbl_catalago_cuentas VALUES("0","1","FANNY MERARI","0","NULL","","ACTIVO");
INSERT INTO tbl_catalago_cuentas VALUES("1","0"," ACTIVOS ","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("2","0"," PASIVOS ","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("3","0"," CAPITAL ","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("4","0"," INGRESOS ","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("5","0","GASTOS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("11","0","ACTIVO CORRIENTE","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("12","0","ACTIVO NO CORRIENTE","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("22","0","PASIVO CIRCULATE","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("23","0","PASIVO A LARGO PLAZO","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("1101","0","CAJA","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("1102","0","BANCOS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("1103","0","INVERSIONES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("1104","0","CUENTAS POR COBRAR","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("1105","0","INVENTARIOS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("1201","0","PROPIEDAD PLANTA Y EQUIPO","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("1202","0","DEPRECIACION Y AMORTIZACION","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("2201","0","PROVEEDORES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("2202","0","IMPUESTOS POR PAGAR","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("2203","0","RETENCIONES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("2204","0","PROVISIONES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("30301","0","CAPITAL Y PATRIMONIO","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("30302","0","RESERVAS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("30303","0","RESULTADOS DE OPERACION","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110101","0","CAJA CHICA","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110102","0","CAJA TGU","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110103","0","CAJA SPS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110201","0","BANCO ATLANTIDA","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110202","0","BANCO PROMERICA","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110301","0","INVERSION TEMPORAL1","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110302","0","INVERSION TEMPORAL2","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110401","0","CUENTAS X COBRAR A CLIENTES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110402","0","CUENTAS X COBRAR A EMPLEADOS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110403","0","CUENTAS X COBRAR A PARTCULARES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110501","0","INVENATRIO DE MERCADERIA","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110502","0","INVENATRIO DE PRODUCTOS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("110503","0","INVENATRIO DE MERCADERIA OTROS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120101","0","EDIFICIOS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120102","0","MOBILIARIO Y EQUIPO DE OFICINA","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120103","0","EQUIPO DE COMPUTO","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120104","0","VEHICULOS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120105","0","MUEBLES Y ENSERES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120106","0","EQUIPO DE COMPUTO CMG","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120107","0","EDIFICIOS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120201","0","DEPRECIACIÓN DE EDIFICIOS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120202","0","DEPRESIACION DE MOBILIARIO Y EQUIPO","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120203","0","DEPRECIACION DE VEHICULO","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("120204","0","DEPRECIACION DE EQUIPO DE COMPUTO","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220101","0","PROVEEDOR NACIONAL","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220102","0","PROVEEDOR EXTRANJERO","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220201","0","IIMPUESTO SOBRE LA RENTA","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220202","0","IIMPUESTO SOBRE LA VENTA","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220203","0","IMPUESTOS MUNICIPALES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220301","0","IHSS","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220302","0","INFOP","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220303","0","RAP","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220401","0","SUELDOS Y SALARIOS AMON","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220402","0","AGUINALDOS 13AVO MES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220403","0","AGUINALDOS 14AVO MES","0","","","");
INSERT INTO tbl_catalago_cuentas VALUES("220404","0","HONORARIOS POR PAGAR","0","","","");



DROP TABLE IF EXISTS tbl_catalago_estado;

CREATE TABLE `tbl_catalago_estado` (
  `CODIGO_CUENTA` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_CUENTA`),
  KEY `tbl_catalago_estado_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_catalago_estado_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_catalago_estado VALUES("1","1","Venta");
INSERT INTO tbl_catalago_estado VALUES("2","2","Costo de venta");
INSERT INTO tbl_catalago_estado VALUES("5","3","Gastos de venta");
INSERT INTO tbl_catalago_estado VALUES("6","4","Gastos de administracion");
INSERT INTO tbl_catalago_estado VALUES("7","5","Gastos financieros");
INSERT INTO tbl_catalago_estado VALUES("9","5","Otros ingresos ");
INSERT INTO tbl_catalago_estado VALUES("11","1","Impuesto ");
INSERT INTO tbl_catalago_estado VALUES("12","2","Otros Gastos");



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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_clientes VALUES("1","empresa conera","Allan caseres","12345678910","carrizal","12356789","activo","tegucigalpa","2022-07-25 14:07:08","0");
INSERT INTO tbl_clientes VALUES("2","jubilados","Mauricio Hernandez ","10987654321","centro","335558595","activo","tegucigalpa","2022-07-25 20:39:42","200");
INSERT INTO tbl_clientes VALUES("3","panaderia ","Hernandez SA","4566878","carrizal","89574085","activo","tegucigalpa","2022-07-26 11:03:25","103723");
INSERT INTO tbl_clientes VALUES("4","inversiones jd","juansito Rojas","2147483647","unah","96769885","activo","Tegucigalpa","2022-07-27 22:04:12","11800");
INSERT INTO tbl_clientes VALUES("5","BIMBOOOON","maira bella","2147483647","unah","96769885","ACTIVO","TEGUCIGALKPAXKXX","2022-08-08 23:01:57","0");
INSERT INTO tbl_clientes VALUES("14","INVERS","K NN","788","LLANO ALEGRE, SANTA ELENA","88941525","ACTIVO","SANTA ELENA","2022-10-28 23:07:03","0");
INSERT INTO tbl_clientes VALUES("16","BANCO HONDURENO DE PRODUCCION AGRICOLA S.A.","JUAN MANUEL","198502310876","COLONIA ROSARIO DE LAS CAMPANAS","96769885","ACTIVO","TEGUCIGALPA","2022-11-13 11:24:30","0");



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

INSERT INTO tbl_errores VALUES("1","No se puede conectar a la base de datos","ERR-001","Revise las credenciales de conexion hacia la base de datos","0");
INSERT INTO tbl_errores VALUES("2","No se puede hacer la consulta a la base de datos","ERR-002","Se presento un error en la consulta hacia la tabla TBL_USUARIO","0");
INSERT INTO tbl_errores VALUES("3","Error en la consulta hacia la tabla PARAMETROS","ERR-003","Ocurrio un error en la llamada de los parametros","0");
INSERT INTO tbl_errores VALUES("4","Error en la proceso de actualizacion del estado en la tabla TBL_USUARIO","ERR-004","Revise la consulta hacía la base de datos","0");



DROP TABLE IF EXISTS tbl_estado;

CREATE TABLE `tbl_estado` (
  `CODIGO_CUENTA` int(11) DEFAULT NULL,
  `Id_Cliente` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL,
  KEY `tbl_estado_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_estado_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_estado VALUES("1","1","Venta");
INSERT INTO tbl_estado VALUES("1","1","Costo de venta");
INSERT INTO tbl_estado VALUES("1","1","Utilidad bruta");
INSERT INTO tbl_estado VALUES("1","1","Gastos de operacion");
INSERT INTO tbl_estado VALUES("1","1","Gastos de venta");
INSERT INTO tbl_estado VALUES("2","1","Gastos de administracion");
INSERT INTO tbl_estado VALUES("2","1","Gastos financieros");
INSERT INTO tbl_estado VALUES("2","1","Utilidad de operacion");
INSERT INTO tbl_estado VALUES("2","1","Otros ingresos no operativos");
INSERT INTO tbl_estado VALUES("2","1","Utilidad antes de impuestos");
INSERT INTO tbl_estado VALUES("2","1","Impuesto a la utilidad");



DROP TABLE IF EXISTS tbl_estado_resultado;

CREATE TABLE `tbl_estado_resultado` (
  `Id_Estado_R` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) NOT NULL,
  `Utilida_Bruta` int(11) NOT NULL,
  `Total_Gasto` int(11) NOT NULL,
  `Utilidad_Operacion` int(11) NOT NULL,
  `Utilidad_Antes_Impu` int(11) NOT NULL,
  `Utilidad_Neta` int(11) NOT NULL,
  PRIMARY KEY (`Id_Estado_R`),
  KEY `tbl_estado_resultado_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_estado_resultado_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_estado_resultado VALUES("1","1","250","0","250","250","250");
INSERT INTO tbl_estado_resultado VALUES("2","1","250","0","250","250","250");
INSERT INTO tbl_estado_resultado VALUES("3","2","250","0","250","250","250");
INSERT INTO tbl_estado_resultado VALUES("4","2","250","0","25","250","250");
INSERT INTO tbl_estado_resultado VALUES("24","1","250","0","250","250","250");
INSERT INTO tbl_estado_resultado VALUES("25","1","250","0","250","250","250");
INSERT INTO tbl_estado_resultado VALUES("26","2","250","0","250","250","250");
INSERT INTO tbl_estado_resultado VALUES("27","2","250","0","25","250","250");



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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_kardex VALUES("1","2022-11-12","ENTRADA","1","COOL","120","1150","0","0","17");
INSERT INTO tbl_kardex VALUES("1","2022-11-12","ENTRADA","1","lapizzzz","120","1150","0","0","18");
INSERT INTO tbl_kardex VALUES("1","2022-11-13","ENTRADA","1","tv","120","725","0","0","19");
INSERT INTO tbl_kardex VALUES("1","11-12-2022 01:01:37 am","SALIDA","1","tv             ","0","0","1","6","23");
INSERT INTO tbl_kardex VALUES("1","11-12-2022 01:03:47 am","SALIDA","1","tv             ","0","0","1","6","24");
INSERT INTO tbl_kardex VALUES("1","2022-11-12","ENTRADA","1","3Lt","6","460","0","0","25");
INSERT INTO tbl_kardex VALUES("1","11-12-2022 01:18:06 am","SALIDA","1","3Lt            ","0","0","1","77","26");
INSERT INTO tbl_kardex VALUES("1","2022-11-12","ENTRADA","1","borradores","10","12","0","0","27");
INSERT INTO tbl_kardex VALUES("1","11-13-2022 10:32:58 am","SALIDA","1","borradores     ","0","0","5","6","28");
INSERT INTO tbl_kardex VALUES("1","11-13-2022 10:44:20 am","SALIDA","1","borradores     ","0","0","2","2","29");
INSERT INTO tbl_kardex VALUES("1","2022-11-13","ENTRADA","1","borradores","10","12","0","0","30");
INSERT INTO tbl_kardex VALUES("1","2022-11-19","ENTRADA","1","merca de la bue","6","0","0","0","31");
INSERT INTO tbl_kardex VALUES("1","2022-11-18","ENTRADA","1","nice","4","0","0","0","32");
INSERT INTO tbl_kardex VALUES("1","","ENTRADA","149","Pelo","1","0","0","0","33");
INSERT INTO tbl_kardex VALUES("1","","ENTRADA","150","Pelo","1","0","0","0","34");
INSERT INTO tbl_kardex VALUES("1","","ENTRADA","151","Lapiz","1","0","0","0","35");
INSERT INTO tbl_kardex VALUES("1","","ENTRADA","152","Lapiz","1","0","0","0","36");
INSERT INTO tbl_kardex VALUES("1","2022-11-21 16:19:06","ENTRADA","153","cargador","2","0","0","0","37");
INSERT INTO tbl_kardex VALUES("1","2022-11-21 16:19:06","ENTRADA","154","cargador","1","0","0","0","38");



DROP TABLE IF EXISTS tbl_libro_mayor;

CREATE TABLE `tbl_libro_mayor` (
  `ID_LIBRO_MAYOR` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `TEMPORADA` int(11) DEFAULT NULL,
  `CUENTA` varchar(30) DEFAULT NULL,
  `TOTAL_CUENTA` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID_LIBRO_MAYOR`),
  KEY `tbl_libro_mayor_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_libro_mayor_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=952 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_libro_mayor VALUES("1","1","2022-10-28","10","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("2","2","2022-10-28","10","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("3","3","2022-10-28","10","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("4","4","2022-10-28","10","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("5","5","2022-10-28","10","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("6","1","2022-10-28","10","Documentos por cobrar","2300");
INSERT INTO tbl_libro_mayor VALUES("7","2","2022-10-28","10","Pagos Anticipados","100");
INSERT INTO tbl_libro_mayor VALUES("8","3","2022-10-28","10","Caja","500");
INSERT INTO tbl_libro_mayor VALUES("951","2","2022-10-03","0","Documentos por cobrar","-45");



DROP TABLE IF EXISTS tbl_libro_mayor2;

CREATE TABLE `tbl_libro_mayor2` (
  `id_libro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cuenta` varchar(200) NOT NULL,
  `monto` float NOT NULL,
  `Id_Cliente` int(200) NOT NULL,
  `total_cuenta` float NOT NULL,
  KEY `tbl_libro_mayor2_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_libro_mayor2_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_libro_mayor2 VALUES("1","2022-11-11","BANCOS","0","1","300");
INSERT INTO tbl_libro_mayor2 VALUES("1","2022-11-11","BBBB","0","1","500");
INSERT INTO tbl_libro_mayor2 VALUES("2","2022-11-13","Caja","0","2","9000");
INSERT INTO tbl_libro_mayor2 VALUES("2","2022-11-13","Capital Social","0","2","7000");
INSERT INTO tbl_libro_mayor2 VALUES("2","2022-11-13","Edificios","0","2","2500");
INSERT INTO tbl_libro_mayor2 VALUES("2","2022-11-13","Proveedores","0","2","2500");
INSERT INTO tbl_libro_mayor2 VALUES("16","2022-10-13","CAJA CHICA","0","16","5500");
INSERT INTO tbl_libro_mayor2 VALUES("16","2022-11-02","Bancos","0","16","4500");



DROP TABLE IF EXISTS tbl_libros;

CREATE TABLE `tbl_libros` (
  `Id_Libro` int(25) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `Id_Cliente` int(11) NOT NULL,
  `caja` int(25) NOT NULL,
  PRIMARY KEY (`Id_Libro`),
  KEY `tbl_libros_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_libros_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_libros VALUES("1","2022-08-01","1","500");
INSERT INTO tbl_libros VALUES("2","2022-07-01","2","0");
INSERT INTO tbl_libros VALUES("3","2022-07-01","3","0");
INSERT INTO tbl_libros VALUES("4","2022-06-01","4","0");
INSERT INTO tbl_libros VALUES("5","2022-06-01","5","0");
INSERT INTO tbl_libros VALUES("191","2022-10-28","2","0");
INSERT INTO tbl_libros VALUES("192","2022-10-28","2","0");
INSERT INTO tbl_libros VALUES("193","2022-10-03","2","0");
INSERT INTO tbl_libros VALUES("194","2022-10-03","2","0");
INSERT INTO tbl_libros VALUES("195","2022-10-03","2","0");
INSERT INTO tbl_libros VALUES("196","2022-10-03","2","0");
INSERT INTO tbl_libros VALUES("197","2022-10-03","2","0");
INSERT INTO tbl_libros VALUES("198","2022-10-03","2","0");
INSERT INTO tbl_libros VALUES("199","2022-10-03","2","0");
INSERT INTO tbl_libros VALUES("200","2022-10-03","2","0");
INSERT INTO tbl_libros VALUES("201","2022-10-03","2","0");
INSERT INTO tbl_libros VALUES("202","2022-10-03","2","-45");
INSERT INTO tbl_libros VALUES("203","2022-10-03","2","-45");
INSERT INTO tbl_libros VALUES("204","2022-10-26","2","778");
INSERT INTO tbl_libros VALUES("205","2022-10-26","2","778");
INSERT INTO tbl_libros VALUES("206","2022-10-26","2","778");
INSERT INTO tbl_libros VALUES("207","2022-10-26","2","778");
INSERT INTO tbl_libros VALUES("208","2022-10-26","2","778");
INSERT INTO tbl_libros VALUES("209","2022-10-26","2","778");
INSERT INTO tbl_libros VALUES("210","2022-10-26","2","778");
INSERT INTO tbl_libros VALUES("211","2022-10-26","2","778");
INSERT INTO tbl_libros VALUES("212","2022-10-26","2","778");
INSERT INTO tbl_libros VALUES("213","2022-10-26","3","0");
INSERT INTO tbl_libros VALUES("214","2022-10-26","3","0");
INSERT INTO tbl_libros VALUES("215","2022-10-26","3","0");
INSERT INTO tbl_libros VALUES("216","2022-10-26","3","0");
INSERT INTO tbl_libros VALUES("217","2022-10-26","3","0");
INSERT INTO tbl_libros VALUES("218","2022-10-26","3","0");
INSERT INTO tbl_libros VALUES("219","2022-10-26","3","0");
INSERT INTO tbl_libros VALUES("220","2022-10-27","3","0");
INSERT INTO tbl_libros VALUES("221","2022-10-27","3","0");
INSERT INTO tbl_libros VALUES("222","2022-10-27","3","0");
INSERT INTO tbl_libros VALUES("223","2022-10-27","3","0");
INSERT INTO tbl_libros VALUES("224","2022-10-27","3","0");
INSERT INTO tbl_libros VALUES("225","2022-10-06","2","778");
INSERT INTO tbl_libros VALUES("226","2022-10-29","4","0");
INSERT INTO tbl_libros VALUES("227","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("228","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("229","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("230","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("231","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("232","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("233","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("234","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("235","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("236","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("237","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("238","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("239","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("240","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("241","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("242","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("243","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("244","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("245","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("246","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("247","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("248","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("249","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("250","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("251","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("252","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("253","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("254","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("255","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("256","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("257","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("258","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("259","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("260","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("261","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("262","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("263","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("264","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("265","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("266","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("267","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("268","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("269","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("270","2022-11-03","3","0");
INSERT INTO tbl_libros VALUES("271","2022-10-28","4","0");
INSERT INTO tbl_libros VALUES("272","2022-10-28","4","0");
INSERT INTO tbl_libros VALUES("273","2022-11-07","2","0");
INSERT INTO tbl_libros VALUES("274","2022-11-07","2","0");
INSERT INTO tbl_libros VALUES("275","2022-11-16","4","0");
INSERT INTO tbl_libros VALUES("276","2022-11-17","4","0");
INSERT INTO tbl_libros VALUES("277","2022-11-17","3","0");
INSERT INTO tbl_libros VALUES("278","2022-11-17","3","0");
INSERT INTO tbl_libros VALUES("279","2022-11-17","3","4");
INSERT INTO tbl_libros VALUES("280","2022-11-17","3","4");
INSERT INTO tbl_libros VALUES("281","2022-11-24","5","0");
INSERT INTO tbl_libros VALUES("282","2022-11-08","3","0");
INSERT INTO tbl_libros VALUES("283","2022-11-23","4","0");
INSERT INTO tbl_libros VALUES("284","2022-11-23","4","0");
INSERT INTO tbl_libros VALUES("285","2022-11-23","4","200");
INSERT INTO tbl_libros VALUES("286","2022-11-23","4","700");
INSERT INTO tbl_libros VALUES("287","2022-11-23","4","200");
INSERT INTO tbl_libros VALUES("288","2022-11-23","4","200");
INSERT INTO tbl_libros VALUES("289","2022-11-23","4","200");
INSERT INTO tbl_libros VALUES("290","2022-11-01","4","200");
INSERT INTO tbl_libros VALUES("291","2022-11-17","1","0");
INSERT INTO tbl_libros VALUES("292","2022-11-17","1","0");
INSERT INTO tbl_libros VALUES("293","2022-11-17","1","0");
INSERT INTO tbl_libros VALUES("294","2022-11-17","1","0");
INSERT INTO tbl_libros VALUES("295","2022-11-17","1","0");
INSERT INTO tbl_libros VALUES("296","2022-10-30","2","0");
INSERT INTO tbl_libros VALUES("297","2022-10-30","2","0");
INSERT INTO tbl_libros VALUES("298","2022-10-30","2","0");
INSERT INTO tbl_libros VALUES("299","2022-10-30","2","0");
INSERT INTO tbl_libros VALUES("300","2022-10-30","2","0");
INSERT INTO tbl_libros VALUES("301","2022-10-30","2","0");
INSERT INTO tbl_libros VALUES("302","2022-11-25","3","0");
INSERT INTO tbl_libros VALUES("303","2022-11-25","3","0");
INSERT INTO tbl_libros VALUES("304","2022-11-25","3","0");
INSERT INTO tbl_libros VALUES("305","2022-11-01","4","400");
INSERT INTO tbl_libros VALUES("306","2022-11-01","4","700");
INSERT INTO tbl_libros VALUES("307","2022-11-01","4","700");
INSERT INTO tbl_libros VALUES("308","2022-11-01","4","700");
INSERT INTO tbl_libros VALUES("309","2022-11-01","4","700");
INSERT INTO tbl_libros VALUES("310","2022-11-01","4","700");
INSERT INTO tbl_libros VALUES("311","2022-11-01","2","120");
INSERT INTO tbl_libros VALUES("312","2022-11-01","2","120");
INSERT INTO tbl_libros VALUES("313","2022-11-01","2","120");
INSERT INTO tbl_libros VALUES("314","2022-11-01","2","120");
INSERT INTO tbl_libros VALUES("315","2022-11-01","2","120");
INSERT INTO tbl_libros VALUES("316","2022-11-01","2","420");
INSERT INTO tbl_libros VALUES("317","2022-11-01","2","420");
INSERT INTO tbl_libros VALUES("318","2022-11-01","2","420");
INSERT INTO tbl_libros VALUES("319","2022-11-01","2","720");
INSERT INTO tbl_libros VALUES("320","2022-10-30","1","0");
INSERT INTO tbl_libros VALUES("321","2022-10-30","1","300");
INSERT INTO tbl_libros VALUES("322","2022-10-30","1","300");
INSERT INTO tbl_libros VALUES("323","2022-10-30","1","800");
INSERT INTO tbl_libros VALUES("324","2022-10-30","1","800");
INSERT INTO tbl_libros VALUES("325","2022-10-30","1","800");
INSERT INTO tbl_libros VALUES("326","2022-10-30","1","800");
INSERT INTO tbl_libros VALUES("327","2022-11-24","3","300");
INSERT INTO tbl_libros VALUES("328","2022-11-24","3","300");
INSERT INTO tbl_libros VALUES("329","2022-11-12","2","0");
INSERT INTO tbl_libros VALUES("330","2022-11-11","2","300");
INSERT INTO tbl_libros VALUES("331","2022-11-11","2","300");
INSERT INTO tbl_libros VALUES("332","2022-11-11","2","300");
INSERT INTO tbl_libros VALUES("333","2022-11-11","2","0");
INSERT INTO tbl_libros VALUES("334","2022-11-11","2","0");
INSERT INTO tbl_libros VALUES("335","2022-11-11","2","0");
INSERT INTO tbl_libros VALUES("336","2022-10-01","2","1620");
INSERT INTO tbl_libros VALUES("337","2022-10-01","2","1620");
INSERT INTO tbl_libros VALUES("338","2022-10-01","2","1620");
INSERT INTO tbl_libros VALUES("339","2022-11-01","2","1620");
INSERT INTO tbl_libros VALUES("340","2022-11-01","2","1620");
INSERT INTO tbl_libros VALUES("341","2022-11-01","2","1620");
INSERT INTO tbl_libros VALUES("342","2022-11-01","2","16620");
INSERT INTO tbl_libros VALUES("343","2022-11-01","2","16620");
INSERT INTO tbl_libros VALUES("344","2022-11-01","2","11620");
INSERT INTO tbl_libros VALUES("345","2022-11-01","2","11620");
INSERT INTO tbl_libros VALUES("346","2022-11-01","2","11020");
INSERT INTO tbl_libros VALUES("347","2022-11-01","2","10720");
INSERT INTO tbl_libros VALUES("348","2022-11-01","2","17720");
INSERT INTO tbl_libros VALUES("349","2022-11-01","2","20220");
INSERT INTO tbl_libros VALUES("350","2022-11-01","2","20220");
INSERT INTO tbl_libros VALUES("351","2022-11-01","2","20220");
INSERT INTO tbl_libros VALUES("352","2022-11-01","2","19220");
INSERT INTO tbl_libros VALUES("353","2022-11-01","2","19220");
INSERT INTO tbl_libros VALUES("354","2022-11-01","2","19220");
INSERT INTO tbl_libros VALUES("355","2022-11-01","2","19160");
INSERT INTO tbl_libros VALUES("356","2022-11-01","2","19100");
INSERT INTO tbl_libros VALUES("357","2022-11-01","2","19100");
INSERT INTO tbl_libros VALUES("358","2022-11-01","2","19100");
INSERT INTO tbl_libros VALUES("359","2022-11-01","2","18800");
INSERT INTO tbl_libros VALUES("360","2022-11-01","2","18500");
INSERT INTO tbl_libros VALUES("361","2022-11-01","2","18500");
INSERT INTO tbl_libros VALUES("362","2022-11-01","2","18500");
INSERT INTO tbl_libros VALUES("363","2022-11-01","2","23500");
INSERT INTO tbl_libros VALUES("364","2022-11-01","2","21000");
INSERT INTO tbl_libros VALUES("365","2022-11-01","4","700");
INSERT INTO tbl_libros VALUES("366","2022-11-01","2","0");
INSERT INTO tbl_libros VALUES("367","2022-11-01","2","0");
INSERT INTO tbl_libros VALUES("368","2022-11-01","2","0");
INSERT INTO tbl_libros VALUES("369","2022-11-01","2","0");
INSERT INTO tbl_libros VALUES("370","2022-11-01","2","0");
INSERT INTO tbl_libros VALUES("371","2022-11-01","2","0");
INSERT INTO tbl_libros VALUES("372","2022-11-01","16","0");
INSERT INTO tbl_libros VALUES("373","2022-11-01","16","0");
INSERT INTO tbl_libros VALUES("374","2022-11-01","16","0");
INSERT INTO tbl_libros VALUES("375","2022-11-01","16","0");
INSERT INTO tbl_libros VALUES("376","2022-11-01","16","0");
INSERT INTO tbl_libros VALUES("377","2022-11-01","16","5000");
INSERT INTO tbl_libros VALUES("378","2022-11-01","16","4500");
INSERT INTO tbl_libros VALUES("379","2022-11-01","16","4500");
INSERT INTO tbl_libros VALUES("380","2022-11-01","16","4500");
INSERT INTO tbl_libros VALUES("381","2022-11-01","16","9500");
INSERT INTO tbl_libros VALUES("382","2022-11-01","16","9000");
INSERT INTO tbl_libros VALUES("383","2022-11-01","16","9000");
INSERT INTO tbl_libros VALUES("384","2022-11-01","16","0");
INSERT INTO tbl_libros VALUES("385","2022-11-01","16","0");
INSERT INTO tbl_libros VALUES("386","2022-11-01","16","0");
INSERT INTO tbl_libros VALUES("387","2022-11-08","3","600");
INSERT INTO tbl_libros VALUES("388","2022-11-08","3","600");
INSERT INTO tbl_libros VALUES("389","2022-11-15","1","0");
INSERT INTO tbl_libros VALUES("390","2022-11-02","1","800");
INSERT INTO tbl_libros VALUES("391","2022-11-02","1","800");
INSERT INTO tbl_libros VALUES("392","2022-11-15","2","0");
INSERT INTO tbl_libros VALUES("393","2022-11-15","2","0");
INSERT INTO tbl_libros VALUES("394","2022-11-25","1","0");
INSERT INTO tbl_libros VALUES("395","2022-11-25","1","0");



DROP TABLE IF EXISTS tbl_libros2;

CREATE TABLE `tbl_libros2` (
  `Id_Libro` int(25) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `Id_Cliente` int(11) NOT NULL,
  `caja` int(25) NOT NULL,
  PRIMARY KEY (`Id_Libro`),
  KEY `tbl_libros2_FK` (`Id_Cliente`),
  CONSTRAINT `tbl_libros2_FK` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_ms_bitacora VALUES("3","2022-11-11 01:54:50","INSERTAR","SE CREO EL USUARIO = NN","1");
INSERT INTO tbl_ms_bitacora VALUES("4","2022-11-13 00:43:24","INSERTAR","SE CREO EL USUARIO = CARTAGENA","134");
INSERT INTO tbl_ms_bitacora VALUES("5","2022-11-13 00:43:40","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO CARTAGENA DE INACTIVO A ACTIVO","134");
INSERT INTO tbl_ms_bitacora VALUES("6","2022-11-13 00:50:24","INSERTAR","SE CREO EL USUARIO = THELUIZZ","135");
INSERT INTO tbl_ms_bitacora VALUES("7","2022-11-13 00:51:03","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO THELUIZZ DE INACTIVO A ACTIVO","135");
INSERT INTO tbl_ms_bitacora VALUES("8","2022-11-13 00:52:50","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO THELUIZZ DE ACTIVO A ACTIVO","135");
INSERT INTO tbl_ms_bitacora VALUES("9","2022-11-13 08:38:16","ACTUALIZAR","SE CAMBIO EL ESTADO DEL USUARIO FANNYY DE INACTIVO A ACTIVO","112");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_parametros VALUES("1","Bloquearusuario","4","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("2","Correo Reporte","merarifannny@gmail.com","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("3","Telefono Reporte","88965678","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("4","Direccion Empresa","Tegucigalpa","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("5","Impuesto","20","1","0000-00-00","0000-00-00");
INSERT INTO tbl_parametros VALUES("6","Minutos_Vigencia_Token","10","1","0000-00-00","0000-00-00");



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
) ENGINE=InnoDB AUTO_INCREMENT=1713 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_roles_objetos VALUES("1551","2","1","0","1","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1552","2","2","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1553","2","3","0","1","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1554","2","4","0","1","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1555","2","5","0","1","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1556","2","6","0","1","0","0","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1557","2","7","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1558","2","8","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1559","2","9","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1560","2","10","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1561","2","12","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1562","2","13","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1563","2","14","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1564","2","15","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1565","2","16","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1566","2","17","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1567","2","18","1","1","1","1","","2022-10-28","1","2022-10-28");
INSERT INTO tbl_roles_objetos VALUES("1568","2","19","1","1","0","1","","2022-10-28","1","2022-10-28");
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_token VALUES("1","2LOewwpdVLYXI7Nd5mWi","1","2022-10-22 10:56:41","2022-10-22 11:06:41");
INSERT INTO tbl_token VALUES("3","urUkxEgadtlVkcabK5bs","134","2022-11-13 00:46:04","2022-11-13 00:56:04");



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
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_usuario VALUES("1","ADMIN","ADMINISTRADOR","ACTIVO","ADMIN","1","2022-10-28 20:34:41.000000","0","","2022-10-28 20:34:41.000000","admin@gmail.com","106433");
INSERT INTO tbl_usuario VALUES("2","FANNY","FANNY","ACTIVO","Osit@123","2","2022-10-28 20:35:13.000000","0","","2022-10-28 20:35:13.000000","merarifannny@gmail.com","0");
INSERT INTO tbl_usuario VALUES("111","AAA","FANNY","INACTIVO","ADMIN1@23","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","merannny@gmail.com","0");
INSERT INTO tbl_usuario VALUES("112","FANNYY","JOSE LUIS martinez","ACTIVO","ADMIN1@23","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","hhh@gmail.com","0");
INSERT INTO tbl_usuario VALUES("127","NN","AAA","INACTIVO","ADMIN1234","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","gggg@gmail.com","0");
INSERT INTO tbl_usuario VALUES("128","GGG","AAA","INACTIVO","ADMIN1234","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","npp@gmail.com","0");
INSERT INTO tbl_usuario VALUES("129","PP","AAA","INACTIVO","ADMIN1234","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","nn@gmail.com","0");
INSERT INTO tbl_usuario VALUES("130","OP","QR","INACTIVO","ADMIN1234","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","opp@gmail.com","0");
INSERT INTO tbl_usuario VALUES("131","UI","AAA","INACTIVO","ADMIN1234","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","NNN@gmail.com","0");
INSERT INTO tbl_usuario VALUES("132","GF","AAA","INACTIVO","ADMIN1234","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","snsn@gmail.com","0");
INSERT INTO tbl_usuario VALUES("133","FANNYMMM","AAA","INACTIVO","Osit@123","4","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","y@gmail.com","0");
INSERT INTO tbl_usuario VALUES("134","CARTAGENA","ESPERANZA CARTAGENA","ACTIVO","Hola123@","2","0000-00-00 00:00:00.000000","0","","0000-00-00 00:00:00.000000","cartagenaesperanza16@gmail.com","0");
INSERT INTO tbl_usuario VALUES("135","THELUIZZ","jose luis martinez","ACTIVO","Luiz98@xd","1","0000-00-00 00:00:00.000000","0","13-11-2022","0000-00-00 00:00:00.000000","luizzjm9@gmail.com","0");



SET FOREIGN_KEY_CHECKS=1;