-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 05:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultas`
--
CREATE DATABASE `consulta`;

USE `consulta`;
-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_patient_id` int(15) NOT NULL,
  `app_doctor_id` int(15) NOT NULL,
  `app_date` date NOT NULL,
  `app_time` varchar(10) DEFAULT NULL,
  `app_doctorusername` varchar(50) DEFAULT NULL,
  `app_patientusername` varchar(50) DEFAULT NULL,
  `app_number` int(11) NOT NULL,
  `app_patientname` varchar(50) NOT NULL,
  `app_doctorname` varchar(50) NOT NULL,
  `app_hospital` varchar(50) NOT NULL,
  `app_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--
-- --------------------------------------------------------

--
-- Table structure for table `availability_weekday`
--

--
-- Table structure for table `availability_weekday`
--

CREATE TABLE `availability_weekday` (
  `doctor_username` varchar(100) NOT NULL,
  `time` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability_weekday`
--

INSERT INTO `availability_weekday` (`doctor_username`, `time`) VALUES
('Dr(a): Regis', '10:30am'),
('Dr(a): Regis', '10am'),
('Dr(a): Regis', '11:30am'),
('Dr(a): Regis', '11am'),
('Dr(a): Regis', '12:30pm'),
('Dr(a): Regis', '12pm'),
('Dr(a): Regis', '1:30pm'),
('Dr(a): Regis', '1pm'),
('Dr(a): Regis', '2:30pm'),
('Dr(a): Regis', '2pm'),
('Dr(a): Regis', '3:30pm'),
('Dr(a): Regis', '3pm'),
('Dr(a): Regis', '4:30pm'),
('Dr(a): Regis', '4pm'),
('Dr(a): Regis', '5:30pm'),
('Dr(a): Regis', '5pm'),
('Dr(a): Regis', '6:30pm'),
('Dr(a): Regis', '6pm'),
('Dr(a): Regis', '7pm'),
('Dr(a): Regis', '9:30am'),
('Dr(a): João', '10:30am'),
('Dr(a): João', '10am'),
('Dr(a): João', '11:30am'),
('Dr(a): João', '11am'),
('Dr(a): João', '12:30pm'),
('Dr(a): João', '12pm'),
('Dr(a): João', '1:30pm'),
('Dr(a): João', '1pm'),
('Dr(a): João', '2:30pm'),
('Dr(a): João', '2pm'),
('Dr(a): João', '3:30pm'),
('Dr(a): João', '3pm'),
('Dr(a): João', '4:30pm'),
('Dr(a): João', '4pm'),
('Dr(a): João', '5:30pm'),
('Dr(a): João', '5pm'),
('Dr(a): João', '6:30pm'),
('Dr(a): João', '6pm'),
('Dr(a): João', '7:30pm'),
('Dr(a): João', '7pm'),
('Dr(a): João', '8:30pm'),
('Dr(a): João', '8pm'),
('Dr(a): João', '9:30am'),
('Dr(a): João', '9pm'),
('Dr(a): Maria', '10:30am'),
('Dr(a): Maria', '10am'),
('Dr(a): Maria', '11:30am'),
('Dr(a): Maria', '11am'),
('Dr(a): Maria', '12:30pm'),
('Dr(a): Maria', '12pm'),
('Dr(a): Maria', '1:30pm'),
('Dr(a): Maria', '1pm'),
('Dr(a): Maria', '2:30pm'),
('Dr(a): Maria', '2pm'),
('Dr(a): Maria', '3:30pm'),
('Dr(a): Maria', '3pm'),
('Dr(a): Maria', '4:30pm'),
('Dr(a): Maria', '4pm'),
('Dr(a): Maria', '5pm'),
('Dr(a): Maria', '9:30am'),
('Dr(a): Leila', '10:30am'),
('Dr(a): Leila', '10am'),
('Dr(a): Leila', '11:30am'),
('Dr(a): Leila', '11am'),
('Dr(a): Leila', '12:30pm'),
('Dr(a): Leila', '12pm'),
('Dr(a): Leila', '1:30pm'),
('Dr(a): Leila', '1pm'),
('Dr(a): Leila', '2:30pm'),
('Dr(a): Leila', '2pm'),
('Dr(a): Leila', '3:30pm'),
('Dr(a): Leila', '3pm'),
('Dr(a): Leila', '4:30pm'),
('Dr(a): Leila', '4pm'),
('Dr(a): Leila', '5:30pm'),
('Dr(a): Leila', '5pm'),
('Dr(a): Leila', '6:30pm'),
('Dr(a): Leila', '6pm'),
('Dr(a): Leila', '9:30am'),
('Dr(a): Ricardo', '10:30am'),
('Dr(a): Ricardo', '10am'),
('Dr(a): Ricardo', '11:30am'),
('Dr(a): Ricardo', '11am'),
('Dr(a): Ricardo', '12:30pm'),
('Dr(a): Ricardo', '12pm'),
('Dr(a): Ricardo', '1:30pm'),
('Dr(a): Ricardo', '1pm'),
('Dr(a): Ricardo', '2:30pm'),
('Dr(a): Ricardo', '2pm'),
('Dr(a): Ricardo', '3:30pm'),
('Dr(a): Ricardo', '3pm'),
('Dr(a): Ricardo', '4:30pm'),
('Dr(a): Ricardo', '4pm'),
('Dr(a): Ricardo', '5:30pm'),
('Dr(a): Ricardo', '5pm'),
('Dr(a): Ricardo', '6:30pm'),
('Dr(a): Ricardo', '6pm'),
('Dr(a): Ricardo', '7:30pm'),
('Dr(a): Ricardo', '7pm'),
('Dr(a): Ricardo', '8pm'),
('Dr(a): Regina', '10:30am'),
('Dr(a): Regina', '10am'),
('Dr(a): Regina', '11:30am'),
('Dr(a): Regina', '11am'),
('Dr(a): Regina', '12:30pm'),
('Dr(a): Regina', '12pm'),
('Dr(a): Regina', '1:30pm'),
('Dr(a): Regina', '1pm'),
('Dr(a): Regina', '2:30pm'),
('Dr(a): Regina', '2pm'),
('Dr(a): Regina', '3:30pm'),
('Dr(a): Regina', '3pm'),
('Dr(a): Regina', '4:30pm'),
('Dr(a): Regina', '4pm'),
('Dr(a): Regina', '5:30pm'),
('Dr(a): Regina', '5pm'),
('Dr(a): Regina', '6:30pm'),
('Dr(a): Regina', '6pm'),
('Dr(a): Regina', '7:30pm'),
('Dr(a): Regina', '7pm'),
('Dr(a): Regina', '8:30pm'),
('Dr(a): Regina', '8pm'),
('Dr(a): Regina', '9:30am');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
CREATE TABLE `doctor` (
  
  
   `doctor_username` varchar(50) NOT NULL,
  `doctor_password` varchar(50) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `doctor_lname` varchar(50) NOT NULL,
  `doctor_fname` varchar(50) NOT NULL,
  `doctor_mname` varchar(50) DEFAULT NULL,
  `doctor_specialization` int(5) NOT NULL,
  `doctor_hospital` int(5) NOT NULL,
  `contactno` varchar(50) DEFAULT NULL,
  `doctor_deleted` varchar(1) NOT NULL DEFAULT 'n',
  `doctor_licenseno` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` ( `doctor_username`, `doctor_password`, `doctor_email`, `doctor_lname`, `doctor_fname`, `doctor_mname`, `doctor_specialization`, `doctor_hospital`, `contactno`, `doctor_deleted`, `doctor_licenseno`) VALUES
('Dr(a): Regis', '79cfeb94595de33b3326c06ab1c7dbda', 'Regis@gmail.com', 'Dr(a): Regis', 'Roseo', '', 34, 1, '9724087894', 'n', 345678),
('Dr(a): João', 'e99a18c428cb38d5f260853678922e03', 'john123@gmail.com', 'Dr(a): João', 'Nascimento', '', 4, 4, '5687951234', 'n', 564285),
('Dr(a): Maria', 'e99a18c428cb38d5f260853678922e03', 'saif@gmail.com', 'Dr(a): Maria', 'Sousa', '', 10, 6, '1548647963', 'n', 345679),
('Dr(a): Leila', 'e99a18c428cb38d5f260853678922e03', 'sanjay@gmail.com', 'Dr(a): Leila', 'Aparecida', '', 6, 1, '1548647963', 'n', 123457),
('Dr(a): Ricardo', '3042c5e85752ec688acf999fbfc3568d', 'Ricardoala@gmail.com', 'Dr(a): Ricardo', 'Nunis', '', 42, 5, '1548647963', 'n', 56543),
('Dr(a): Regina', 'd01a1afce4514f8b0f4ade054181a1bb', 'Regina@gmail.com', 'Dr(a): Regina', 'Aurora', '', 1, 1, '9724087894', 'n', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `hospitalinfo`
--

CREATE TABLE `hospitalinfo` (
  `HospitalID` int(5) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hospitalinfo`
--


INSERT INTO `hospitalinfo` (`HospitalID`, `Name`) VALUES
(1, 'Hospital Central'),
(2, 'Ambulatório Descentralizado de São Miguel Paulista Zona Leste'),
(3, 'Ambulatório Descentralizado Vila Carrão Zona Leste'),
(4, 'Ambulatório Descentralizado de Santo Amaro - Zona Sul'),
(5, 'Ambulatório Descentralizado da Lapa Zona Oeste'),
(6, 'Ambulatório Descentralizado do Tucuruvi - Zona Norte');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int NOT NULL,
  `patient_username` varchar(50) DEFAULT NULL,
  `patient_password` varchar(50) DEFAULT NULL,
  `patient_eadd` varchar(50) DEFAULT NULL,
  `patient_lname` varchar(50) DEFAULT NULL,
  `patient_fname` varchar(50) DEFAULT NULL,
  `patient_mname` varchar(50) DEFAULT NULL,
  `patient_deleted` varchar(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 


--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_username`, `patient_password`, `patient_eadd`, `patient_lname`, `patient_fname`, `patient_mname`, `patient_deleted`) VALUES
(1435, 'Mariob', '0b6cf9be8f90c78560c6bc929a494feb', 'Mariob@gmail.com', 'Souza', 'Mario', 'Rhit', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `specializationinfo`
--

CREATE TABLE `specializationinfo` (
  `SpecializationID` int(5) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `specializationinfo`
--

INSERT INTO `specializationinfo` (`SpecializationID`, `Name`) VALUES
(1, 'ACUPUNTURA'),
(2, 'ALERGIA'),
(3, 'ANESTESISTA'),
(4, 'AUDIOMETRIA'),
(5, 'CARDIOLOGIA'),
(6, 'CLÍNICA_MÉDICA'),
(7, 'CIRURGIA_CABEÇA_PESCOÇO'),
(8, 'CIRURGIA DE MÃO'),
(9, 'CIRURGIA_PLÁSTICA'),
(10, 'CIRURGIA_TORÁCICA'),
(11, 'CIRURGIA_VASCULAR'),
(12, 'DERMATOLOGIA'),
(13, 'ENDOCRINOLOGIA'),
(14, 'FISIATRIA'),
(15, 'FISIOTERAPIA'),
(16, 'FONOAUDIOLOGIA'),
(17, 'GASTROCLÍNICA'),
(18, 'GASTROCIRURGIA'),
(19, 'GERONTO_GERIATRIA'),
(20, 'GINECOLOGIA '),
(21, 'HEMATOLOGIA'),
(22, 'HOMEOPATIA'),
(23, 'MOLÉSTIAS_INFECCIOSAS'),
(24, 'NEFROLOGIA'),
(25, 'NEUROCLÍNICA'),
(26, ' NEUROINFANTIL'),
(27, 'NEUROCIRURGIA'),
(28, 'NUTRIÇÃO'),
(29, 'OBSTETRÍCIA/PRÉ-NATAL'),
(30, 'ODONTOLOGIA '),
(31, 'OFTALMO GERAL'),
(32, 'OFTALMOLOGIA-GLAUCOMA'),
(33, 'ONCOLOGIA'),
(34, 'ORTOPEDIA GERAL'),
(35, 'OTORRINO GERAL'),
(36, 'PNEUMOLOGIA'),
(37, 'PEDIATRIA_HEBIATRIA'),
(38, 'PSICOLOGIA_ADULTO'),
(39, 'PSIQUIATRIA_ESPECIALIDADES'),
(40, 'PROCTOLOGIA'),
(41, 'REUMATOLOGIA'),
(42, 'TERAPIA_OCUPACIONAL'),
(43, 'UROLOGIA');

--
-- Indexes for table `availability_weekday`
--
ALTER TABLE `availability_weekday`
  ADD PRIMARY KEY ( `doctor_username`,`time`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_username`),
  ADD KEY `FK_Hospital` (`doctor_hospital`),
  ADD KEY `doctor_specialization` (`doctor_specialization`);

--
-- Indexes for table `hospitalinfo`
--
ALTER TABLE `hospitalinfo`
  ADD PRIMARY KEY (`HospitalID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `specializationinfo`
--
ALTER TABLE `specializationinfo`
  ADD PRIMARY KEY (`SpecializationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospitalinfo`
--
ALTER TABLE `hospitalinfo`
  MODIFY `HospitalID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `availability_weekday`
--
ALTER TABLE `availability_weekday`
  ADD CONSTRAINT `availability_weekday_ibfk_1` FOREIGN KEY (`doctor_username`) REFERENCES `doctor` (`doctor_username`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FK_Hospital` FOREIGN KEY (`doctor_hospital`) REFERENCES `hospitalinfo` (`HospitalID`),
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`doctor_specialization`) REFERENCES `specializationinfo` (`SpecializationID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

