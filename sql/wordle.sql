-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 01:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ics499_animals`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_words`
--

CREATE TABLE `custom_words` (
  `Id` int(50) NOT NULL,
  `word` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `total_plays` int(10) NOT NULL,
  `winning_plays` int(10) NOT NULL,
  `clue` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_words`
--

INSERT INTO `custom_words` (`Id`, `word`, `Email`, `total_plays`, `winning_plays`, `clue`) VALUES
(1, 'test', 'marc.wedo@gmail.com', 0, 0, 'May induce stress in students'),
(2, 'exam', 'john.doe@gmail.com', 0, 0, 'An event that may be proctored'),
(3, 'final', 'marc.wedo@gmail.com', 1, 1, 'Could be a test or sporting event. Either way, there is a lot at stake.'),
(4, 'hello', 'marc.wedo@gmail.com', 1, 1, 'A common greeting'),
(5, 'mule', 'marc.wedo@gmail.com', 0, 0, 'A beast of burden'),
(6, 'మండోదరి', 'marc.wedo@gmail.com', 0, 0, 'ఓ పురాణ పాత్ర');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `preference_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `value` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `puzzle_words`
--

CREATE TABLE `puzzle_words` (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `word` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `total_plays` int(10) NOT NULL,
  `winning_plays` int(10) NOT NULL,
  `clue` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `puzzle_words`
--

INSERT INTO `puzzle_words` (`word`, `date`, `time`, `total_plays`, `winning_plays`, `clue`) VALUES
('ankle', '2022-10-12', '08:00:00', 0, 0, NULL),
('ant', '2022-10-13', '08:00:00', 0, 0, NULL),
('bad', '2022-10-14', '08:00:00', 0, 0, NULL),
('blind', '2022-10-15', '08:00:00', 0, 0, NULL),
('block', '2022-10-16', '08:00:00', 0, 0, NULL),
('cold', '2022-10-17', '08:00:00', 0, 0, NULL),
('cut', '2022-10-18', '08:00:00', 0, 0, NULL),
('dog', '2022-10-19', '08:00:00', 0, 0, NULL),
('duck', '2022-10-20', '08:00:00', 0, 0, NULL),
('eye', '2022-10-21', '08:00:00', 0, 0, NULL),
('fine', '2022-10-22', '08:00:00', 0, 0, NULL),
('fix', '2022-10-23', '08:00:00', 0, 0, NULL),
('flex', '2022-10-24', '08:00:00', 0, 0, NULL),
('flu', '2022-10-25', '08:00:00', 0, 0, NULL),
('fuss', '2022-10-26', '08:00:00', 0, 0, NULL),
('get', '2022-10-27', '08:00:00', 0, 0, NULL),
('half', '2022-10-28', '08:00:00', 0, 0, NULL),
('hay', '2022-10-29', '08:00:00', 0, 0, NULL),
('index', '2022-10-30', '08:00:00', 5, 4, NULL),
('late', '2022-10-31', '08:00:00', 0, 0, NULL),
('mole', '2022-11-01', '08:00:00', 0, 0, 'Name a small mammal'),
('muggy', '2022-11-02', '08:00:00', 0, 0, 'Slang word for humid'),
('open', '2022-11-03', '08:00:00', 9, 8, NULL),
('pitch', '2022-11-04', '08:00:00', 3, 2, NULL),
('quota', '2022-11-05', '08:00:00', 0, 0, NULL),
('reign', '2022-11-06', '08:00:00', 0, 0, NULL),
('relax', '2022-11-07', '08:00:00', 0, 0, NULL),
('south', '2022-11-08', '08:00:00', 0, 0, NULL),
('sun', '2022-11-09', '08:00:00', 0, 0, NULL),
('wrap', '2022-11-10', '08:00:00', 0, 0, NULL),
('rule', '2022-11-11', '08:00:00', 9, 8, NULL),
('love', '2022-11-12', '08:00:00', 3, 2, NULL),
('sound', '2022-11-13', '08:00:00', 0, 0, NULL),
('lord', '2022-11-14', '08:00:00', 0, 0, NULL),
('ring', '2022-11-15', '08:00:00', 0, 0, NULL),
('soul', '2022-11-16', '08:00:00', 0, 0, NULL),
('supper', '2022-11-17', '08:00:00', 0, 0, NULL),
('song', '2022-11-18', '08:00:00', 0, 0, NULL),
('hand', '2022-11-19', '08:00:00', 9, 8, NULL),
('punch', '2022-11-20', '08:00:00', 3, 2, NULL),
('queen', '2022-11-21', '08:00:00', 0, 0, NULL),
('use', '2022-11-22', '08:00:00', 0, 0, NULL),
('long', '2022-11-23', '08:00:00', 0, 0, NULL),
('clap', '2022-11-26', '08:00:00', 0, 0, NULL),
('rain', '2022-11-27', '08:00:00', 0, 0, NULL),
('sunny', '2022-11-28', '08:00:00', 0, 0, NULL),
('hello', '2022-11-29', '08:00:00', 0, 0, NULL),
('baby', '2022-11-30', '08:00:00', 0, 0, NULL),
('hip', '2022-12-01', '08:00:00', 0, 0, 'Name a body part'),
('fan', '2022-12-02', '08:00:00', 0, 0, 'Sports enthusiast'),
('feast', '2022-12-03', '08:00:00', 0, 0, 'Abundance of food'),

('అత్తయ్య', '2022-10-12', '20:00:00', 0, 0, NULL),
('అనాసపండు', '2022-10-13', '20:00:00', 0, 0, NULL),
('అప్పచ్చి', '2022-10-14', '20:00:00', 0, 0, NULL),
('ఆనందమయి', '2022-10-15', '20:00:00', 0, 0, NULL),
('ఆనందము', '2022-10-16', '20:00:00', 0, 0, NULL),
('కలువ', '2022-10-17', '20:00:00', 0, 0, NULL),
('గణపతి', '2022-10-18', '20:00:00', 0, 0, NULL),
('గుంటూరు', '2022-10-19', '20:00:00', 0, 0, NULL),
('చాడీకత్తె', '2022-10-20', '20:00:00', 0, 0, NULL),

('జాస్తిశివయ్య', '2022-10-21', '20:00:00', 0, 0, NULL),
('తింగరోడు', '2022-10-22', '20:00:00', 0, 0, NULL),
('దమ్ముబిర్యాని', '2022-10-23', '20:00:00', 9, 8, NULL),
('దొండకాయ', '2022-10-24', '20:00:00', 0, 0, NULL),
('నాడీకేంద్రం', '2022-10-25', '20:00:00', 0, 0, NULL),
('పాడుగోల', '2022-10-26', '20:00:00', 0, 0, NULL),
('పుల్లయ్య', '2022-10-27', '20:00:00', 0, 0, NULL),
('పూతరేకులు', '2022-10-28', '20:00:00', 0, 0, NULL),
('పైత్యకారి', '2022-10-29', '20:00:00', 0, 0, NULL),
('బెల్లంగవ్వలు', '2022-10-30', '20:00:00', 0, 0, NULL),
('మద్రాసు', '2022-10-31', '20:00:00', 0, 0, NULL),
('మిరపకాయ', '2022-11-01', '20:00:00', 0, 0, NULL),
('మునగ', '2022-11-02', '20:00:00', 0, 0, NULL),
('మురుకు', '2022-11-03', '20:00:00', 0, 0, NULL),
('మొండిసంత', '2022-11-04', '20:00:00', 0, 0, NULL),
('వాణిశ్రీ', '2022-11-05', '20:00:00', 0, 0, NULL),
('వార్తలు', '2022-11-06', '20:00:00', 0, 0, NULL),
('విశాఖపట్నం', '2022-11-07', '20:00:00', 0, 0, NULL),
('సుప్పనాతి', '2022-11-08', '20:00:00', 0, 0, NULL),
('హైదరాబాద్', '2022-11-09', '20:00:00', 0, 0, NULL),

('అడవి', '2022-11-10', '20:00:00', 0, 0, NULL),
('ఆకలి', '2022-11-11', '20:00:00', 0, 0, NULL),
('పర్వతం', '2022-11-12', '20:00:00', 0, 0, NULL),
('సహనం', '2022-11-13', '20:00:00', 0, 0, NULL),
('ఓపిక', '2022-11-14', '20:00:00', 0, 0, NULL),
('ఖరీదు', '2022-11-15', '20:00:00', 0, 0, NULL),
('చదువు', '2022-11-16', '20:00:00', 0, 0, NULL),
('తలుపు', '2022-11-17', '20:00:00', 0, 0, NULL),
('సగము', '2022-11-18', '20:00:00', 0, 0, NULL),
('సాయంత్రం', '2022-11-19', '20:00:00', 0, 0, NULL),
('పోలిక', '2022-11-20', '20:00:00', 0, 0, NULL),
('బరువు', '2022-11-21', '20:00:00', 0, 0, NULL),
('ఏర్పాట్లు', '2022-11-22', '20:00:00', 0, 0, NULL),
('మధ్యస్థ', '2022-11-23', '20:00:00', 0, 0, NULL),
('అద్భుత', '2022-11-24', '20:00:00', 9, 8, NULL),
('ఉపాయం', '2022-11-25', '20:00:00', 0, 0, NULL),
('ముసుగు', '2022-11-26', '20:00:00', 0, 0, NULL),
('కాలుష్యం', '2022-11-27', '20:00:00', 0, 0, NULL),
('బటన్', '2022-11-28', '20:00:00', 0, 0, NULL),
('నగరం', '2022-11-29', '20:00:00', 0, 0, NULL),
('ఉదయము', '2022-11-30', '20:00:00', 0, 0, NULL),
('ఎగతాళి', '2022-12-01', '20:00:00', 0, 0, NULL),
('నిముషము', '2022-12-02', '20:00:00', 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_words`
--
ALTER TABLE `custom_words`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`preference_id`);




--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_words`
--
ALTER TABLE `custom_words`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
