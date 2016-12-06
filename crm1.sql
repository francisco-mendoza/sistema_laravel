-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: crm1
-- ------------------------------------------------------
-- Server version	5.6.27-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actividads`
--

DROP TABLE IF EXISTS `actividads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `idContacto` int(11) DEFAULT NULL,
  `idTipoActividad` int(11) DEFAULT NULL,
  `comentario` longtext,
  `actPadre` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `resultado` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `jerarquia` varchar(255) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `fecha` varchar(155) DEFAULT NULL,
  `fechaHora` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCliente` (`idCliente`),
  KEY `idContacto` (`idContacto`),
  KEY `idTipoActividad` (`idTipoActividad`),
  KEY `estaF_idx` (`estado`),
  KEY `resulF_idx` (`resultado`),
  KEY `usuIF_idx` (`usuario`),
  CONSTRAINT `actividads_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  CONSTRAINT `actividads_ibfk_2` FOREIGN KEY (`idContacto`) REFERENCES `contactos` (`id`),
  CONSTRAINT `actividads_ibfk_3` FOREIGN KEY (`idTipoActividad`) REFERENCES `tipo_actividads` (`id`),
  CONSTRAINT `estaF` FOREIGN KEY (`estado`) REFERENCES `estado_actividads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `resulF` FOREIGN KEY (`resultado`) REFERENCES `resultado_actividads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuIF` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividads`
--

LOCK TABLES `actividads` WRITE;
/*!40000 ALTER TABLE `actividads` DISABLE KEYS */;
INSERT INTO `actividads` VALUES (1,15,27,2,'Se encuentra de vacacioness',NULL,4,11,15,'1',NULL,'2016-01-29',NULL),(2,15,27,2,'Sin Cotacto',1,4,11,15,'1.2',NULL,'2016-01-29',NULL),(16,16,28,1,'Reunion de Coordinacion',NULL,9,6,15,'3',NULL,'2015-09-14',NULL),(22,15,27,2,'test',2,5,2,14,'1.2.17',NULL,'2016-01-29',NULL),(23,15,30,1,'reu',NULL,8,11,15,'23',NULL,'2016-01-29',NULL),(24,15,29,2,'SIGBSC.',NULL,5,3,15,'24',NULL,'2016-01-29',NULL),(25,15,29,4,'Corizacion sistema sigbsc',24,11,11,15,'24.25',NULL,'2016-01-29',NULL),(26,15,29,4,'Corizacion sistema sigbsc',24,11,11,15,'24.26',NULL,'2016-01-29',NULL),(27,15,29,4,'Corizacion sistema sigbsc',24,11,11,15,'24.27',NULL,'2016-01-29',NULL),(28,15,29,4,'Corizacion sistema sigbsc',24,11,11,15,'24.28',NULL,'2016-01-29',NULL),(29,16,28,5,'CAMPAÑA SELECCION',NULL,1,11,15,'29',NULL,'2016-01-29',NULL),(30,16,28,3,'ppromo marzo',NULL,7,5,15,'30',NULL,'2016-01-29',NULL),(31,16,28,2,'Llamada promo marzo',30,5,1,15,'30.31',NULL,'2016-01-29',NULL),(32,16,28,2,'Solicita cotización del SIGBSC',30,5,1,15,'30.32',NULL,'2016-01-29',NULL),(33,16,28,2,'Solicita cotizacion',30,5,1,15,'30.33',NULL,'2016-01-29',NULL),(34,16,28,2,'Solicitud de coptizacion ',31,5,1,15,'30.31.34',NULL,'2016-01-29',NULL),(37,15,27,3,'Correo',NULL,7,4,14,'35',NULL,'2016-02-19',NULL),(38,15,27,1,'reunion',NULL,8,4,14,'35',NULL,'2016-02-19',NULL),(39,15,27,1,'test2',2,9,6,14,'1.2.39',NULL,'2016-02-24',NULL),(40,16,28,2,'hijo solicitud de cotizacion',34,5,1,14,'30.31.34.40',NULL,'2016-02-25',NULL),(42,15,28,1,'tt',NULL,9,6,14,'41',NULL,'2016-02-26',NULL),(43,15,28,2,'tt2',NULL,5,1,14,'43',NULL,'2016-02-26',NULL),(45,15,27,1,'tt3',NULL,9,6,14,'45',NULL,'2016-02-26',NULL),(46,15,28,3,'tt4',NULL,7,4,14,'46',NULL,'2016-02-26',NULL),(47,15,28,2,'hijo1 tt2',43,5,1,14,'43.47',NULL,'2016-02-26',NULL),(48,15,27,2,'tt5',NULL,5,1,14,'48',NULL,'2016-02-26',NULL),(49,15,27,2,'tt6',NULL,5,1,14,'49',NULL,'2016-02-26',NULL),(50,15,27,2,'tt61',NULL,5,1,14,'50',NULL,'2016-02-26',NULL),(51,15,27,1,'tt7',NULL,9,6,14,'51',NULL,'2016-02-26',NULL),(52,15,27,1,'tt72',NULL,9,6,14,'51',NULL,'2016-02-26',NULL),(53,15,27,1,'tt8',NULL,9,6,14,'53',NULL,'2016-02-26',NULL),(61,16,28,1,'asdasd reu test',NULL,8,11,14,'54',NULL,'2016-03-02 16:48:21','2016-03-02T18:30'),(62,15,27,1,'11111',NULL,8,11,14,'62',NULL,'2016-03-02 18:33:31','03/02/2016 06:33:32 PM');
/*!40000 ALTER TABLE `actividads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area_contactos`
--

DROP TABLE IF EXISTS `area_contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_contactos`
--

LOCK TABLES `area_contactos` WRITE;
/*!40000 ALTER TABLE `area_contactos` DISABLE KEYS */;
INSERT INTO `area_contactos` VALUES (3,'CAP','areatest'),(4,'PCG',''),(5,'RRHH',''),(6,'DAF',NULL),(7,'GAB',NULL),(8,'ABAST',NULL);
/*!40000 ALTER TABLE `area_contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo_contactos`
--

DROP TABLE IF EXISTS `cargo_contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo_contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo_contactos`
--

LOCK TABLES `cargo_contactos` WRITE;
/*!40000 ALTER TABLE `cargo_contactos` DISABLE KEYS */;
INSERT INTO `cargo_contactos` VALUES (6,'Asesor',''),(7,'Encargada de la Unidad de Monitoreo Instituci','');
/*!40000 ALTER TABLE `cargo_contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMinisterio` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rut` varchar(15) NOT NULL,
  `codigo` int(11) NOT NULL,
  `sigla` varchar(255) NOT NULL,
  `idRegion` int(11) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `numeroTrabajadores` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccionWeb` varchar(255) NOT NULL,
  `fono` int(11) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `idTipoCliente` int(11) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `presupuesto` int(11) NOT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `telefonoMesaCentral` varchar(80) DEFAULT NULL,
  `sedeCentral` varchar(200) DEFAULT NULL,
  `comerciales` int(11) DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  `idComuna` int(11) DEFAULT NULL,
  `fonoSecretaria` int(11) DEFAULT NULL,
  `fonoContacto` int(11) DEFAULT NULL,
  `fonoJefeDirecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idMinisterio` (`idMinisterio`),
  KEY `idRegion` (`idRegion`),
  KEY `idTipoCliente` (`idTipoCliente`),
  KEY `comer_idx` (`comerciales`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idMinisterio`) REFERENCES `ministerios` (`id`),
  CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`idRegion`) REFERENCES `regions` (`id`),
  CONSTRAINT `clientes_ibfk_3` FOREIGN KEY (`idTipoCliente`) REFERENCES `tipo_clientes` (`id`),
  CONSTRAINT `comer` FOREIGN KEY (`comerciales`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (15,77,'Subsecretaria del Interior y Seguridad Publica','1-9',0,'SUBSE INT',7,'',0,'interior@interior.cl','http://subinterior.gob.cl/',56,'',2,'',0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0),(16,79,'Junta Nacional de Jardines Infantiles ','70072600',0,'JUNJI',7,'Alameda Bernardo O’Higgins 107, piso 6, Santiago',0,'','http://www.junji.cl/',0,'',2,'',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos`
--

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idCargo` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_secretaria` varchar(100) DEFAULT NULL,
  `fono` int(11) DEFAULT NULL,
  `movil` int(11) DEFAULT NULL,
  `idArea` int(11) DEFAULT NULL,
  `idRegion` int(11) DEFAULT NULL,
  `direccionPostal` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `fecha_estado` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `cumpleaños` date DEFAULT NULL,
  `hobbies` longtext,
  `facebook` varchar(100) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCargo` (`idCargo`),
  KEY `idArea` (`idArea`),
  KEY `idRegion` (`idRegion`),
  KEY `idEstado` (`idEstado`),
  KEY `Contactos_6_fk_idx` (`idCliente`),
  CONSTRAINT `Contactos_6_fk` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `contactos_ibfk_2` FOREIGN KEY (`idCargo`) REFERENCES `cargo_contactos` (`id`),
  CONSTRAINT `contactos_ibfk_3` FOREIGN KEY (`idArea`) REFERENCES `area_contactos` (`id`),
  CONSTRAINT `contactos_ibfk_4` FOREIGN KEY (`idRegion`) REFERENCES `regions` (`id`),
  CONSTRAINT `contactos_ibfk_5` FOREIGN KEY (`idEstado`) REFERENCES `estado_contactos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` VALUES (27,'Juan Pablo','Meier Ayala',15,6,'fmeier@interior.gov.cl','',56,56,4,7,'Teatinos 92 Piso 6','',1,NULL,NULL,'0000-00-00','Viajar','',''),(28,'Claudia','Rifo Tapia',16,7,'crifo@junji.cl','',56,0,4,7,'Darío Urzúa Nº 1938','',2,NULL,NULL,'0000-00-00','','',''),(29,'Luis ','Carrasco',15,6,'lcarrasco@interior.gov.cl','sfuentes@psicus.cl',226336160,226336160,4,7,'merced 128','',1,NULL,NULL,'0000-00-00','','',''),(30,'Luis ','Carrasco',15,6,'lcarrasco@interior.gov.cl','sfuentes@psicus.cl',226336160,226336160,4,7,'merced 128','',1,NULL,NULL,'0000-00-00','','','');
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_actividads`
--

DROP TABLE IF EXISTS `estado_actividads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_actividads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idTipoActividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_actividads`
--

LOCK TABLES `estado_actividads` WRITE;
/*!40000 ALTER TABLE `estado_actividads` DISABLE KEYS */;
INSERT INTO `estado_actividads` VALUES (1,'Open',5),(2,'No Open',5),(3,'Clean',5),(4,'No Contesta',2),(5,'Contesta',2),(6,'No Leido',3),(7,'Leido',3),(8,'Agendada',1),(9,'Ejecutada',1),(10,'Suspendida',1),(11,'Enviada',4),(12,'Evaluacion',4),(13,'Rechazada',4),(14,'Aceptada',4),(15,'Cerrada',4);
/*!40000 ALTER TABLE `estado_actividads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_contactos`
--

DROP TABLE IF EXISTS `estado_contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_contactos`
--

LOCK TABLES `estado_contactos` WRITE;
/*!40000 ALTER TABLE `estado_contactos` DISABLE KEYS */;
INSERT INTO `estado_contactos` VALUES (1,'Activo',NULL),(2,'Inactivo',NULL);
/*!40000 ALTER TABLE `estado_contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ministerios`
--

DROP TABLE IF EXISTS `ministerios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ministerios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ministerios`
--

LOCK TABLES `ministerios` WRITE;
/*!40000 ALTER TABLE `ministerios` DISABLE KEYS */;
INSERT INTO `ministerios` VALUES (77,'Ministerio del Interior'),(78,'Ministerio de Vivienda y Urbanismo'),(79,'Ministerio de Educacion');
/*!40000 ALTER TABLE `ministerios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `idContacto` int(11) DEFAULT NULL,
  `nombreProyecto` varchar(255) DEFAULT NULL,
  `codigoProyecto` varchar(45) DEFAULT NULL,
  `montoProyecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCliente` (`idCliente`),
  KEY `idContacto` (`idContacto`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  CONSTRAINT `proyectos_ibfk_2` FOREIGN KEY (`idContacto`) REFERENCES `contactos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_nombre` varchar(64) NOT NULL,
  `region_ordinal` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'Arica y Parinacota','XV'),(2,'Tarapacá','I'),(3,'Antofagasta','II'),(4,'Atacama','III'),(5,'Coquimbo','IV'),(6,'Valparaiso','V'),(7,'Metropolitana de Santiago','RM'),(8,'Libertador General Bernardo O\'Higgins','VI'),(9,'Maule','VII'),(10,'Biobío','VIII'),(11,'La Araucanía','IX'),(12,'Los Ríos','XIV'),(13,'Los Lagos','X'),(14,'Aisén del General Carlos Ibáñez del Campo','XI'),(15,'Magallanes y de la Antártica Chilena','XII');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultado_actividads`
--

DROP TABLE IF EXISTS `resultado_actividads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultado_actividads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `tipo_actividad` int(11) DEFAULT NULL,
  `tipo_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultado_actividads`
--

LOCK TABLES `resultado_actividads` WRITE;
/*!40000 ALTER TABLE `resultado_actividads` DISABLE KEYS */;
INSERT INTO `resultado_actividads` VALUES (1,'Interesado',2,5),(2,'No Interesado',2,5),(3,'Volver a llamar',2,5),(4,'No respondido',3,7),(5,'Respondido',3,7),(6,'Interesado',1,9),(7,'No interesado',1,9),(8,'Fuera de Presupuesto',NULL,13),(9,'No Interesado',NULL,13),(10,'Venta',NULL,14),(11,'Sin Resultado',NULL,NULL);
/*!40000 ALTER TABLE `resultado_actividads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `self_key_table`
--

DROP TABLE IF EXISTS `self_key_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `self_key_table` (
  `id` decimal(10,0) NOT NULL,
  `self_key_id` decimal(10,0) DEFAULT NULL,
  `data` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `self_key_fk` (`self_key_id`),
  CONSTRAINT `self_key_fk` FOREIGN KEY (`self_key_id`) REFERENCES `self_key_table` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `self_key_table`
--

LOCK TABLES `self_key_table` WRITE;
/*!40000 ALTER TABLE `self_key_table` DISABLE KEYS */;
INSERT INTO `self_key_table` VALUES (1,NULL,'México'),(2,1,'Estado de México'),(3,2,'Nezahualcoyotl'),(4,2,'Naucalpan'),(5,1,'Guanajuato'),(6,5,'Celaya'),(7,5,'León'),(8,3,'Hijo 3');
/*!40000 ALTER TABLE `self_key_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_actividads`
--

DROP TABLE IF EXISTS `tipo_actividads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_actividads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `icono` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_actividads`
--

LOCK TABLES `tipo_actividads` WRITE;
/*!40000 ALTER TABLE `tipo_actividads` DISABLE KEYS */;
INSERT INTO `tipo_actividads` VALUES (1,'Reunión / Cita','Agendar una reunión o cita','icon-group'),(2,'Llamada','Llamar al cliente por telefono','icon-phone'),(3,'Email','Enviar un email','icon-envelope'),(4,'Cotización','Enviar una cotización','icon-file-text-alt'),(5,'Campaña','Realizar Campaña Mailchimp','icon-flag-checkered');
/*!40000 ALTER TABLE `tipo_actividads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_clientes`
--

DROP TABLE IF EXISTS `tipo_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_clientes`
--

LOCK TABLES `tipo_clientes` WRITE;
/*!40000 ALTER TABLE `tipo_clientes` DISABLE KEYS */;
INSERT INTO `tipo_clientes` VALUES (1,'Privado',''),(2,'Público','');
/*!40000 ALTER TABLE `tipo_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuarios`
--

DROP TABLE IF EXISTS `tipo_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuarios`
--

LOCK TABLES `tipo_usuarios` WRITE;
/*!40000 ALTER TABLE `tipo_usuarios` DISABLE KEYS */;
INSERT INTO `tipo_usuarios` VALUES (1,'Admin','admin'),(2,'User',NULL);
/*!40000 ALTER TABLE `tipo_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(100) DEFAULT NULL,
  `apellidoUsuario` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tipoUsuario` int(11) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipoUsuario` (`tipoUsuario`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipo_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (14,'Francisco ','Mendoza','fmendoza','$2y$10$BITkzjMlAfmQ2eG6SjPBL.q/it9ULyW5eexLy4KPUtVYAk5vAHEQK',1,'WY42uTkw0PpGKknH4QRHPL9DWL326LzFBw3JJROhRseLk59jdNHm0vfz6ypd'),(15,'Sebastian','Fuentes','sfuentes','$2y$10$BITkzjMlAfmQ2eG6SjPBL.q/it9ULyW5eexLy4KPUtVYAk5vAHEQK',1,'z5HAkHdQWnHOhoeH4FJFfRZxdXwFlNUKNQApR40b6HscsjWi8x9U3kI4yGq4'),(16,'Juabn','Perez','jperez','$2y$10$BITkzjMlAfmQ2eG6SjPBL.q/it9ULyW5eexLy4KPUtVYAk5vAHEQK',1,NULL),(17,'Pedro','Pedro','pedro','$2y$10$BITkzjMlAfmQ2eG6SjPBL.q/it9ULyW5eexLy4KPUtVYAk5vAHEQK',1,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'crm1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-03 11:40:33
