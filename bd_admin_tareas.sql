-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 05:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_admin_tareas`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `IDAlumno` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Contrasenya` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`IDAlumno`, `Nombre`, `Email`, `Contrasenya`) VALUES
(1, 'alumno', 'alumno@mail.com', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `profesor_admin`
--

CREATE TABLE `profesor_admin` (
  `IDProfesor` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Contrasenya` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profesor_admin`
--

INSERT INTO `profesor_admin` (`IDProfesor`, `Nombre`, `Email`, `Contrasenya`) VALUES
(1, 'oscar', 'profesor@mail.com', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE `tareas` (
  `IDTarea` int(11) NOT NULL,
  `Titulo` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(1500) DEFAULT NULL,
  `Fecha_creada` timestamp NULL DEFAULT current_timestamp(),
  `Fecha_entrega` timestamp NULL DEFAULT NULL,
  `Documento` tinyblob DEFAULT NULL,
  `Calificado` tinyint(4) NOT NULL DEFAULT 0,
  `lk` int(11) DEFAULT NULL,
  `IDProfesor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`IDTarea`, `Titulo`, `Descripcion`, `Fecha_creada`, `Fecha_entrega`, `Documento`, `Calificado`, `lk`, `IDProfesor`) VALUES
(32, 'Historia sobre la tecnología', 'Realizar un documento Word sobre como surgió la tecnología, realizar una línea de tiempo con las fechas mas relevantes.', '2022-04-02 21:59:28', '2022-04-05 22:00:00', 0x446965676f204a6f73c3a92053616e646f76616c2056616c64c3a9732046534a2041736572746976696461642e646f6378, 0, NULL, NULL),
(33, 'Diseño y creación de una base de datos relacional en SQL Server', '1. Crear una base de datos.\r\n2. Crear tablas implementando en los campos diferentes tipos de datos.\r\n3. Identificar las llaves primarias y foráneas en una tabla.', '2022-04-02 22:00:40', '2022-04-10 18:00:00', NULL, 0, NULL, NULL),
(34, 'Diseño de seguridad de una base de datos', 'Diseñar seguridad a nivel de base de datos.\r\nAdministrar los usuarios de una base de datos.\r\nControlar el uso de esquemas de una base de datos', '2022-04-02 22:01:52', '2022-04-17 02:00:00', NULL, 0, NULL, NULL),
(36, 'Arreglos unidimensionales (vectores)', 'Solicite al usuario un listado de 12 números enteros de todo tipo (positivos, negativos, ceros), para luevo ver en pantalla los resultados.', '2022-04-02 22:04:09', '2022-05-02 01:00:00', 0x534352554d20446576656c6f70657220526573756d656e2e646f6378, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`IDAlumno`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `profesor_admin`
--
ALTER TABLE `profesor_admin`
  ADD PRIMARY KEY (`IDProfesor`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`IDTarea`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `IDAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profesor_admin`
--
ALTER TABLE `profesor_admin`
  MODIFY `IDProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `IDTarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `fk_tareas_Alumnos1` FOREIGN KEY (`lk`) REFERENCES `alumnos` (`IDAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tareas_profesor/admin` FOREIGN KEY (`IDProfesor`) REFERENCES `profesor_admin` (`IDProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
