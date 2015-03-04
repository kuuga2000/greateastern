-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2014 at 11:15 AM
-- Server version: 5.5.40-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmsyii_greateastern`
--

-- --------------------------------------------------------

--
-- Table structure for table `ge_agents`
--

CREATE TABLE IF NOT EXISTS `ge_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `cell` int(11) NOT NULL,
  `fax_number` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `zip_code` int(6) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0=female;1=male',
  `date_of_birth` date NOT NULL,
  `username` varchar(23) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1=agent;2=client',
  `is_active` int(3) DEFAULT '1' COMMENT '1=active;0=suspended',
  `avatar` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ge_agents`
--

INSERT INTO `ge_agents` (`id`, `first_name`, `last_name`, `phone`, `cell`, `fax_number`, `email`, `address`, `city`, `country_id`, `zip_code`, `gender`, `date_of_birth`, `username`, `password`, `user_type`, `is_active`, `avatar`) VALUES
(1, 'Rinalda', 'Gista', 81967667, 6997979, 797986, 'ryuki.servaiv@gmail.com', 'jalan raya no 90 89', 'Chong Pang City', 1, 111, 0, '2014-10-22', 'ryuki.servaiv@gmail.com', 'sha256:1000:b0PREo8evheXMdBz1UWIuOBA7C1f+VAy:GeNfQG7Zpmrk6JlRW2jSsz9C9OxNVLgW', 0, 1, NULL),
(2, 'Negi Susi', 'Melati', 90809, 8089, 98908, 'kuuga2@itconcept.sg', 'jalan haha 8989', 'Orchard', 1, 1111, 0, '2014-10-23', 'kuuga2@itconcept.sg', 'sha256:1000:zE9uKbngDl5igAztyszJOmbSrxUEAgGQ:FzfvROtzooovmNfRsTD82a2OWWq/P65C', 0, 1, NULL),
(5, 'Kuuga', 'Name', 99987979, 9900099, 899787897, 'kuuga3@itconcept.sg', 'jalan raya no 45 67', 'Jakarta', 3, 12312, 0, '2002-09-12', 'kuuga3@itconcept.sg', 'sha256:1000:rYW4GvuDsM4TxnnUvzs3yKd7eovqkK7D:ooZdrEDg1KyEc9A7ee6n8/aDYmUt/1Dh', 0, 1, NULL),
(9, 'Gabriel', 'Batistuta', 9908908, 234234234, 9809809, 'kuuga4@itconcept.sg', 'jalan raya no 45', 'jakarta', 1, 11232, 0, '1970-01-01', 'blade', 'sha256:1000:lEVmkKEvhvKElDYvaBnYcKCCZ01QGKOd:BmeDYhSyWOFXyqqKjLBkTiRY1U7soeY0', 0, 1, NULL),
(10, 'Brian', 'Zyan', 980890, 908908, 98098, 'kuuga5@itconcept.sg', '9798789', 'jalan', 1, 8098, 0, '1970-01-01', 'kuuga5@itconcept.sg', 'sha256:1000:KQ/NUJJ7tvK5OQFGHAz1ajgihfW05Vvs:I3s5ntjr3uVSJnzm14oH72EwwgtifUT2', 0, 1, NULL),
(11, 'Green', 'Robert', 35345, 345345, 345, 'kuuga6@itconcept.sg', 'sdfsf', '45sdf', 3, 53453, 0, '1970-01-01', 'kuuga6@itconcept.sg', 'sha256:1000:e1vL4HRl297y1grj654rMN9hSeP+Zjro:zE6q/ENSnsrkQPgl/qF9QNT2oVGzlePD', 0, 1, NULL),
(12, 'Ricky', 'Rock', 97897, 9798789, 9789789, 'kuuga7@itconcept.sg', 'jsjjsjs', '345435', 5, 34534, 0, '1970-01-01', 'kuuga7@itconcept.sg', 'sha256:1000:1GxnMaPaO+mHUiaQOHHG7MORa1atAlu6:PG2Brs3GMGSBXl1sgb+kjuL1RfFMpf7z', 0, 1, NULL),
(13, 'Joe', 'Sandi', 99797, 89789789, 897987, 'kuuga8@itconcept.sg', 'testeset', 'setset', 4, 34534, 0, '1970-01-01', 'kuuga8@itconcept.sg', 'sha256:1000:ecSAHDDxun33SNj5kJ/j5cy4edjIZVxN:Yfzp9bm2XA9ZaOh2tOtEOOcNHK4RIpJj', 0, 0, NULL),
(14, 'Bima', 'Satria', 80, 9809, 980, 'ryuki.serviv@gmail.com', 'asdsad', 'asd', 4, 24234, 1, '2011-11-28', 'ryuki.serviv@gmail.com', 'sha256:1000:hKlKNsF39Bzl4i3ofJPxqYgK3RATVFz2:tJJz3ykn7y1pe/lVV8HImfcNIsCrfMKs', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ge_calendar_schedule`
--

CREATE TABLE IF NOT EXISTS `ge_calendar_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(1000) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `category_event` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ge_category_event`
--

CREATE TABLE IF NOT EXISTS `ge_category_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ge_category_event`
--

INSERT INTO `ge_category_event` (`id`, `event_name`) VALUES
(1, 'Birthday'),
(2, 'Anniversary'),
(3, 'Effective Date'),
(4, 'Renewal Date'),
(5, 'Expiration Date'),
(6, 'Application'),
(7, 'Appointment'),
(8, 'Documents'),
(9, 'Email'),
(10, 'Fax'),
(11, 'Follow Up'),
(12, 'Generic Task'),
(13, 'Meeting'),
(14, 'Phone Call'),
(15, 'Quote');

-- --------------------------------------------------------

--
-- Table structure for table `ge_clients`
--

CREATE TABLE IF NOT EXISTS `ge_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(500) NOT NULL,
  `client_email` varchar(70) NOT NULL,
  `phone` char(15) NOT NULL,
  `cell_phone` char(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0=female;1=male',
  `product_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `height` char(11) DEFAULT NULL,
  `weight` char(11) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `policy_number` int(11) NOT NULL,
  `premium` int(11) NOT NULL DEFAULT '0',
  `commission` int(11) NOT NULL DEFAULT '0',
  `renewal` int(11) NOT NULL DEFAULT '0',
  `bonus_commission` int(11) NOT NULL DEFAULT '0',
  `bonus_renewal` int(11) NOT NULL DEFAULT '0',
  `coverage_id` int(11) NOT NULL,
  `is_active` int(11) DEFAULT '1' COMMENT '1=active;0=not active',
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ge_clients`
--

INSERT INTO `ge_clients` (`id`, `client_name`, `client_email`, `phone`, `cell_phone`, `address`, `city`, `country_id`, `zip_code`, `gender`, `product_id`, `status_id`, `agent_id`, `height`, `weight`, `date_of_birth`, `policy_number`, `premium`, `commission`, `renewal`, `bonus_commission`, `bonus_renewal`, `coverage_id`, `is_active`, `created_date`) VALUES
(1, 'Jihan fahira', 'kuuga@gmail.com', '987897897', '98798798', 'jajasjdfkdsh', 'khdf', 19, 345, 1, 1, 2, 1, '5'' 7"', '4', '2005-08-27', 54656, 4234, 111, 1111, 234, 234, 2, 1, '2014-11-20 11:55:01'),
(2, 'John Phile', 'kuuga@itconcept.sg', '345345', '456546', 'jalan', '456', 16, 21213, 0, 1, 2, 1, '5'' 8"', '56', '2009-12-25', 654456, 855, 111, 1111, 885, 969, 3, 1, '2014-11-20 11:55:01'),
(3, 'Batistuta', 'batistuta@gmail.com', '0819787878', '8078798999', 'Jalan raya no 78', 'Bangkok', 4, 12345, 1, 1, 1, 2, '6'' 0"', '25', '2014-11-20', 235489, 12, 111, 1111, 23, 23, 2, 1, '2014-11-20 11:55:01'),
(6, 'zahara', 'ryuki.sservaiv@gmail.com', '088089080', '080890890', 'Jalan hulu balang', 'Lasveg', 1, 12345, 0, 1, 1, 1, '6'' 0"', '125', '1970-01-01', 0, 0, 0, 0, 0, 0, 3, 1, '2014-11-20 11:55:01'),
(7, 'Nobita Dorae', 'kuuga@itconcept.sg', '089809', '080890', 'Jalan kemang raya no 34', 'Tokyo', 20, 11111, 1, 1, 1, 1, '5'' 9"', '123', '1983-04-15', 0, 10, 301, 1111, 2, 2, 2, 1, '2014-11-20 11:55:01'),
(18, 'Jiro Magiro', 'ryuki.servaiv@gmail.com', '9798798789', '97979789', 'jalan kebun kca', 'City Manchenster', 1, 12313, 1, 1, 1, 1, '6'' 1"', '78', '2014-11-13', 2147483647, 0, 111, 1111, 0, 0, 2, 1, '2014-11-24 16:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `ge_company_bg`
--

CREATE TABLE IF NOT EXISTS `ge_company_bg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `background` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ge_company_bg`
--

INSERT INTO `ge_company_bg` (`id`, `company_id`, `background`) VALUES
(12, 1, 'High-End-Interior-Design (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ge_company_logo`
--

CREATE TABLE IF NOT EXISTS `ge_company_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ge_company_logo`
--

INSERT INTO `ge_company_logo` (`id`, `company_id`, `logo`) VALUES
(1, 1, 'iso-logo4(5).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ge_contacts`
--

CREATE TABLE IF NOT EXISTS `ge_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(500) NOT NULL,
  `contact_email` varchar(70) NOT NULL,
  `phone` char(15) NOT NULL,
  `cell_phone` char(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0=female;1=male',
  `product_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `height` char(11) DEFAULT NULL,
  `weight` char(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `premium` int(11) NOT NULL DEFAULT '0',
  `commission` int(11) NOT NULL DEFAULT '0',
  `renewal` int(11) NOT NULL DEFAULT '0',
  `bonus_commission` int(11) NOT NULL DEFAULT '0',
  `bonus_renewal` int(11) NOT NULL DEFAULT '0',
  `coverage_id` int(11) NOT NULL DEFAULT '0',
  `is_active` int(11) DEFAULT '1' COMMENT '1=active;0=not active',
  `temperature_id` int(11) DEFAULT NULL,
  `google_contact_id` varchar(500) DEFAULT NULL,
  `google_etag` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ge_contacts`
--

INSERT INTO `ge_contacts` (`id`, `contact_name`, `contact_email`, `phone`, `cell_phone`, `address`, `city`, `country_id`, `zip_code`, `gender`, `product_id`, `status_id`, `agent_id`, `height`, `weight`, `date_of_birth`, `premium`, `commission`, `renewal`, `bonus_commission`, `bonus_renewal`, `coverage_id`, `is_active`, `temperature_id`, `google_contact_id`, `google_etag`) VALUES
(1, 'Tastoo', 'testo.mail@gmail.com', '535', '345', '345', '345', 6, 345, 0, 0, 0, 1, '4'' 6"', '44', '0000-00-00', 0, 0, 0, 0, 0, 2, 1, 2, 'http://www.google.com/m8/feeds/contacts/bio.rider.rx%40gmail.com/base/5b4a66458b9f5f80', 'R3w5cDVSLyt7I2A9XRdUEUoKQAY.');

-- --------------------------------------------------------

--
-- Table structure for table `ge_countries`
--

CREATE TABLE IF NOT EXISTS `ge_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alpha2Code` char(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=252 ;

--
-- Dumping data for table `ge_countries`
--

INSERT INTO `ge_countries` (`id`, `alpha2Code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Åland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'SH', 'Ascension Island'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'The Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BQ', 'Bonaire'),
(30, 'BA', 'Bosnia and Herzegovina'),
(31, 'BW', 'Botswana'),
(32, 'BV', 'Bouvet Island'),
(33, 'BR', 'Brazil'),
(34, 'IO', 'British Indian Ocean Territory'),
(35, 'VG', 'British Virgin Islands'),
(36, 'BN', 'Brunei'),
(37, 'BG', 'Bulgaria'),
(38, 'BF', 'Burkina Faso'),
(39, 'BI', 'Burundi'),
(40, 'KH', 'Cambodia'),
(41, 'CM', 'Cameroon'),
(42, 'CA', 'Canada'),
(43, 'CV', 'Cape Verde'),
(44, 'KY', 'Cayman Islands'),
(45, 'CF', 'Central African Republic'),
(46, 'TD', 'Chad'),
(47, 'CL', 'Chile'),
(48, 'CN', 'China'),
(49, 'CX', 'Christmas Island'),
(50, 'CC', 'Cocos (Keeling) Islands'),
(51, 'CO', 'Colombia'),
(52, 'KM', 'Comoros'),
(53, 'CG', 'Republic of the Congo'),
(54, 'CD', 'Democratic Republic of the Congo'),
(55, 'CK', 'Cook Islands'),
(56, 'CR', 'Costa Rica'),
(57, 'HR', 'Croatia'),
(58, 'CU', 'Cuba'),
(59, 'CW', 'Curaçao'),
(60, 'CY', 'Cyprus'),
(61, 'CZ', 'Czech Republic'),
(62, 'DK', 'Denmark'),
(63, 'DJ', 'Djibouti'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'Dominican Republic'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egypt'),
(68, 'SV', 'El Salvador'),
(69, 'GQ', 'Equatorial Guinea'),
(70, 'ER', 'Eritrea'),
(71, 'EE', 'Estonia'),
(72, 'ET', 'Ethiopia'),
(73, 'FK', 'Falkland Islands'),
(74, 'FO', 'Faroe Islands'),
(75, 'FJ', 'Fiji'),
(76, 'FI', 'Finland'),
(77, 'FR', 'France'),
(78, 'GF', 'French Guiana'),
(79, 'PF', 'French Polynesia'),
(80, 'TF', 'French Southern and Antarctic Lands'),
(81, 'GA', 'Gabon'),
(82, 'GM', 'Gambia'),
(83, 'GE', 'Georgia'),
(84, 'DE', 'Germany'),
(85, 'GH', 'Ghana'),
(86, 'GI', 'Gibraltar'),
(87, 'GR', 'Greece'),
(88, 'GL', 'Greenland'),
(89, 'GD', 'Grenada'),
(90, 'GP', 'Guadeloupe'),
(91, 'GU', 'Guam'),
(92, 'GT', 'Guatemala'),
(93, 'GG', 'Guernsey'),
(94, 'GN', 'Guinea'),
(95, 'GW', 'Guinea-Bissau'),
(96, 'GY', 'Guyana'),
(97, 'HT', 'Haiti'),
(98, 'HM', 'Heard Island and McDonald Islands'),
(99, 'VA', 'Vatican City'),
(100, 'HN', 'Honduras'),
(101, 'HK', 'Hong Kong'),
(102, 'HU', 'Hungary'),
(103, 'IS', 'Iceland'),
(104, 'IN', 'India'),
(105, 'ID', 'Indonesia'),
(106, 'CI', 'Ivory Coast'),
(107, 'IR', 'Iran'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Republic of Ireland'),
(110, 'IM', 'Isle of Man'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italy'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Japan'),
(115, 'JE', 'Jersey'),
(116, 'JO', 'Jordan'),
(117, 'KZ', 'Kazakhstan'),
(118, 'KE', 'Kenya'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'KG', 'Kyrgyzstan'),
(122, 'LA', 'Laos'),
(123, 'LV', 'Latvia'),
(124, 'LB', 'Lebanon'),
(125, 'LS', 'Lesotho'),
(126, 'LR', 'Liberia'),
(127, 'LY', 'Libya'),
(128, 'LI', 'Liechtenstein'),
(129, 'LT', 'Lithuania'),
(130, 'LU', 'Luxembourg'),
(131, 'MO', 'Macau'),
(132, 'MK', 'Republic of Macedonia'),
(133, 'MG', 'Madagascar'),
(134, 'MW', 'Malawi'),
(135, 'MY', 'Malaysia'),
(136, 'MV', 'Maldives'),
(137, 'ML', 'Mali'),
(138, 'MT', 'Malta'),
(139, 'MH', 'Marshall Islands'),
(140, 'MQ', 'Martinique'),
(141, 'MR', 'Mauritania'),
(142, 'MU', 'Mauritius'),
(143, 'YT', 'Mayotte'),
(144, 'MX', 'Mexico'),
(145, 'FM', 'Federated States of Micronesia'),
(146, 'MD', 'Moldova'),
(147, 'MC', 'Monaco'),
(148, 'MN', 'Mongolia'),
(149, 'ME', 'Montenegro'),
(150, 'MS', 'Montserrat'),
(151, 'MA', 'Morocco'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NL', 'Netherlands'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'KP', 'North Korea'),
(166, 'MP', 'Northern Mariana Islands'),
(167, 'NO', 'Norway'),
(168, 'OM', 'Oman'),
(169, 'PK', 'Pakistan'),
(170, 'PW', 'Palau'),
(171, 'PS', 'Palestine'),
(172, 'PA', 'Panama'),
(173, 'PG', 'Papua New Guinea'),
(174, 'PY', 'Paraguay'),
(175, 'PE', 'Peru'),
(176, 'PH', 'Philippines'),
(177, 'PN', 'Pitcairn Islands'),
(178, 'PL', 'Poland'),
(179, 'PT', 'Portugal'),
(180, 'PR', 'Puerto Rico'),
(181, 'QA', 'Qatar'),
(182, 'XK', 'Republic of Kosovo'),
(183, 'RE', 'Réunion'),
(184, 'RO', 'Romania'),
(185, 'RU', 'Russia'),
(186, 'RW', 'Rwanda'),
(187, 'BL', 'Saint Barthélemy'),
(188, 'SH', 'Saint Helena'),
(189, 'KN', 'Saint Kitts and Nevis'),
(190, 'LC', 'Saint Lucia'),
(191, 'MF', 'Saint Martin'),
(192, 'PM', 'Saint Pierre and Miquelon'),
(193, 'VC', 'Saint Vincent and the Grenadines'),
(194, 'WS', 'Samoa'),
(195, 'SM', 'San Marino'),
(196, 'ST', 'São Tomé and Príncipe'),
(197, 'SA', 'Saudi Arabia'),
(198, 'SN', 'Senegal'),
(199, 'RS', 'Serbia'),
(200, 'SC', 'Seychelles'),
(201, 'SL', 'Sierra Leone'),
(202, 'SG', 'Singapore'),
(203, 'SX', 'Sint Maarten'),
(204, 'SK', 'Slovakia'),
(205, 'SI', 'Slovenia'),
(206, 'SB', 'Solomon Islands'),
(207, 'SO', 'Somalia'),
(208, 'ZA', 'South Africa'),
(209, 'GS', 'South Georgia'),
(210, 'KR', 'South Korea'),
(211, 'SS', 'South Sudan'),
(212, 'ES', 'Spain'),
(213, 'LK', 'Sri Lanka'),
(214, 'SD', 'Sudan'),
(215, 'SR', 'Suriname'),
(216, 'SJ', 'Svalbard and Jan Mayen'),
(217, 'SZ', 'Swaziland'),
(218, 'SE', 'Sweden'),
(219, 'CH', 'Switzerland'),
(220, 'SY', 'Syria'),
(221, 'TW', 'Taiwan'),
(222, 'TJ', 'Tajikistan'),
(223, 'TZ', 'Tanzania'),
(224, 'TH', 'Thailand'),
(225, 'TL', 'East Timor'),
(226, 'TG', 'Togo'),
(227, 'TK', 'Tokelau'),
(228, 'TO', 'Tonga'),
(229, 'TT', 'Trinidad and Tobago'),
(230, 'TN', 'Tunisia'),
(231, 'TR', 'Turkey'),
(232, 'TM', 'Turkmenistan'),
(233, 'TC', 'Turks and Caicos Islands'),
(234, 'TV', 'Tuvalu'),
(235, 'UG', 'Uganda'),
(236, 'UA', 'Ukraine'),
(237, 'AE', 'United Arab Emirates'),
(238, 'GB', 'United Kingdom'),
(239, 'US', 'United States'),
(240, 'UM', 'United States Minor Outlying Islands'),
(241, 'VI', 'United States Virgin Islands'),
(242, 'UY', 'Uruguay'),
(243, 'UZ', 'Uzbekistan'),
(244, 'VU', 'Vanuatu'),
(245, 'VE', 'Venezuela'),
(246, 'VN', 'Vietnam'),
(247, 'WF', 'Wallis and Futuna'),
(248, 'EH', 'Western Sahara'),
(249, 'YE', 'Yemen'),
(250, 'ZM', 'Zambia'),
(251, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `ge_coverage_type`
--

CREATE TABLE IF NOT EXISTS `ge_coverage_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coverage_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ge_coverage_type`
--

INSERT INTO `ge_coverage_type` (`id`, `coverage_name`) VALUES
(1, 'Life'),
(2, 'Health'),
(3, 'Auto');

-- --------------------------------------------------------

--
-- Table structure for table `ge_email_marketing`
--

CREATE TABLE IF NOT EXISTS `ge_email_marketing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marketing_plan_name` varchar(500) NOT NULL,
  `select_recipients` varchar(500) NOT NULL,
  `send_with_temperature` varchar(500) DEFAULT NULL,
  `send_with_status` varchar(500) DEFAULT NULL,
  `send_with_coverage` varchar(500) DEFAULT NULL,
  `send_with_carrier` varchar(500) DEFAULT NULL,
  `send_with_product` varchar(500) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `send_after` int(11) NOT NULL,
  `time_name` char(50) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ge_email_marketing`
--

INSERT INTO `ge_email_marketing` (`id`, `marketing_plan_name`, `select_recipients`, `send_with_temperature`, `send_with_status`, `send_with_coverage`, `send_with_carrier`, `send_with_product`, `template_id`, `send_after`, `time_name`, `agent_id`, `is_active`) VALUES
(1, 'COBA TEST', 'clients,leads', '1', '1', '2', NULL, '1', 3, 1, 'month', 1, 0),
(4, 'bala', 'clients', '', '', '', NULL, '', 3, 1, 'minute', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ge_email_sent`
--

CREATE TABLE IF NOT EXISTS `ge_email_sent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `select_recipients` varchar(500) DEFAULT NULL,
  `send_with_temperature` varchar(500) DEFAULT NULL,
  `send_with_status` varchar(500) DEFAULT NULL,
  `send_with_coverage` varchar(500) DEFAULT NULL,
  `send_with_carrier` varchar(500) DEFAULT NULL,
  `send_with_product` varchar(500) DEFAULT NULL,
  `send_sample_to` varchar(500) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `from_name` varchar(500) DEFAULT NULL,
  `email_subject_line` varchar(500) DEFAULT NULL,
  `from_email_address` varchar(500) DEFAULT NULL,
  `content_email` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `ge_email_sent`
--

INSERT INTO `ge_email_sent` (`id`, `select_recipients`, `send_with_temperature`, `send_with_status`, `send_with_coverage`, `send_with_carrier`, `send_with_product`, `send_sample_to`, `template_id`, `from_name`, `email_subject_line`, `from_email_address`, `content_email`) VALUES
(1, 'clients', '1', '', '', NULL, 'sdfdsf', 'kuuga@yahoo.com', 2, 'sdf', 'test doank', 'kuuga_agent@yahoo.com', ''),
(2, 'clients', '1', '', '', NULL, '', 'ryuki.servaiv@gmail.com', 2, 'AGENT NAME', 'ini hanya coba coba', 'k_kuuga@yahoo.com', ''),
(3, 'clients,leads', '1', '1', '1', NULL, 'asdasd sss xxxxxxxx cccccccccccc', 'ryuki.servaiv@gmail.com', 2, 'sdfdsf', 'testset etst', 'k_kuuga@yahoo.com', ''),
(4, 'clients,leads', '1', '1', '1', NULL, 'asdasd sss xxxxxxxx cccccccccccc', 'ryuki.servaiv@gmail.com', 2, 'sdfdsf', 'testset etst', 'k_kuuga@yahoo.com', ''),
(5, 'clients', '2', '1', '1', NULL, 'teset', 'ryuki.servaiv@gmail.com', 2, 'blade', 'test', 'k_kuuga@yahoo.com', ''),
(6, 'clients', '2', '1', '1', NULL, 'teset', 'ryuki.servaiv@gmail.com', 2, 'blade', 'test', 'k_kuuga@yahoo.com', ''),
(7, 'clients', '2', '1', '1', NULL, 'teset', 'ryuki.servaiv@gmail.com', 2, 'blade', 'test', 'k_kuuga@yahoo.com', ''),
(8, 'clients', '1', '1', '2', NULL, 'TEST', 'ryuki.servaiv@gmail.com', 2, 'BLADO BLADO', 'SAYA MW TEST DOANK', 'ryuki.servaiv@gmail.com', ''),
(9, 'clients', '1', '1', '2', NULL, 'TEST', 'ryuki.servaiv@gmail.com', 2, 'BLADO BLADO', 'SAYA MW TEST DOANK', 'ryuki.servaiv@gmail.com', ''),
(10, 'clients', '1', '1', '2', NULL, 'TEST', 'ryuki.servaiv@gmail.com', 2, 'BLADO BLADO', 'SAYA MW TEST DOANK', 'ryuki.servaiv@gmail.com', ''),
(11, 'clients', '1', '1', '1', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'RYUKI', 'BALA BALA BALA', 'k_kuuga@yahoo.com', ''),
(12, 'clients', '1', '1', '1', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'RYUKI', 'BALA BALA BALA', 'k_kuuga@yahoo.com', ''),
(13, 'clients', '1', '1', '1', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'RYUKI', 'BALA BALA BALA', 'k_kuuga@yahoo.com', ''),
(14, 'clients', '1', '1', '1', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'RYUKI', 'BALA BALA BALA', 'k_kuuga@yahoo.com', ''),
(15, 'clients', '1', '1', '1', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'RYUKI', 'BALA BALA BALA', 'k_kuuga@yahoo.com', ''),
(16, 'leads', '2', '1', '2', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Gonso Testing', 'BARA BARA BARA BERE BERE BERE', 'k_kuuga@yahoo.com', ''),
(17, 'leads', '2', '1', '2', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Gonso Testing', 'BARA BARA BARA BERE BERE BERE', 'k_kuuga@yahoo.com', ''),
(18, 'leads', '2', '1', '2', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Gonso Testing', 'BARA BARA BARA BERE BERE BERE', 'k_kuuga@yahoo.com', ''),
(19, 'clients,leads', '2', '1', '1', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'BIO RIDER', 'INI EMAIL SUBJECT', 'bio.rider.rx@gmail.com', ''),
(20, 'clients,leads', '2', '2', '2', NULL, '1', '', 2, 'Kamen Rider Black', 'BARA TEST', 'bio.rider.rx@gmail.com', ''),
(21, 'clients,leads', '1', '2', '2', NULL, '1', 'bio.rider.rx@gmail.com', 2, 'ryu', 'Maen bola', 'bio.rider.rx@gmail.com', ''),
(22, 'clients,leads', '1', '2', '2', NULL, '1', 'bio.rider.rx@gmail.com', 2, 'ryu', 'Maen bola', 'bio.rider.rx@gmail.com', ''),
(23, 'clients', '2', '2', '3', NULL, '1', '', 2, 'blado', 'test subject', 'bio.rider.rx@gmail.com', ''),
(24, 'clients,leads', '2', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(25, 'clients,leads', '2', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(26, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(27, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(28, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(29, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(30, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(31, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(32, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(33, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(34, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(35, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(36, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(37, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(38, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(39, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(40, 'leads', '3', '1', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(41, 'leads', '3', '2', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(42, 'leads', '3', '2', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(43, 'leads', '3', '2', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(44, 'leads', '1', '2', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(45, 'leads', '1', '2', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(46, 'leads', '1', '2', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(47, 'leads', '1', '2', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(48, 'leads', '1', '2', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(49, 'leads', '1', '2', '2', NULL, '1', '', 2, 'Boni', 'Saya belajar', 'bio.rider.rx@gmail.com', ''),
(50, 'clients', '1', '1', '1', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(51, 'clients', '', '1', '', NULL, '', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(52, 'clients', '', '', '', NULL, '', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(53, 'clients', '', '', '', NULL, '', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(54, 'clients', '', '', '1', NULL, '', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(55, 'clients', '', '1', '1', NULL, '', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(56, 'clients,leads', '', '1', '1', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(57, 'clients,leads', '', '1', '1', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(58, 'clients,leads', '', '1', '', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(59, 'clients,leads', '', '1', '', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(60, 'clients,leads', '', '1', '', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', ''),
(61, 'clients,leads', '', '1', '', NULL, '1', 'ryuki.servaiv@gmail.com', 2, 'Muhammad Al Fatih', 'testing blast', 'bio.rider.rx@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `ge_email_template`
--

CREATE TABLE IF NOT EXISTS `ge_email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(500) NOT NULL,
  `email_subject_line` varchar(500) NOT NULL,
  `from_name` varchar(500) NOT NULL,
  `from_email_address` varchar(500) NOT NULL,
  `bcc_yourself` varchar(500) NOT NULL,
  `email_template` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ge_email_template`
--

INSERT INTO `ge_email_template` (`id`, `template_name`, `email_subject_line`, `from_name`, `from_email_address`, `bcc_yourself`, `email_template`) VALUES
(2, 'Auto Responder - New Lead', 'Thank You for Your Interest', 'Ririn Agent', 'k_kuuga@yahoo.com', 'ryuki.servaiv@gmail.com', '<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">\n	<tbody>\n		<tr>\n			<td>\n			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:626px">\n				<tbody>\n					<tr><!-- Begin Browser View -->\n						<td>\n						<p>&nbsp;</p>\n						</td>\n					</tr>\n					<!-- End Browser View -->\n					<tr>\n						<td>\n						<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n							<tbody>\n								<tr>\n									<td><img alt="" src="http://www.radiusbob.com/drips/images/left-shadow.jpg" style="height:744px; width:13px" /></td>\n									<td>\n									<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n										<tbody>\n											<tr>\n												<td>&nbsp;</td>\n												<td>\n												<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n													<tbody>\n														<tr>\n															<td>\n															<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																<tbody>\n																	<tr>\n																		<td><!-- Begin Company Name Image -->\n																		<h2>AGENCY NAME HERE</h2>\n																		</td>\n																		<!-- End Company Name Image -->\n																		<td>\n																		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																			<tbody>\n																				<tr>\n																					<td>&nbsp;</td>\n																					<!-- Facebook -->\n																					<td>&nbsp;</td>\n																					<!-- Tumblr -->\n																					<td><a href="#"><img alt="" src="http://www.radiusbob.com/drips/images/facebook.jpg" style="height:18px; width:17px" /></a></td>\n																					<!-- Twitter -->\n																					<td><a href="#"><img alt="" src="http://www.radiusbob.com/drips/images/twitter.jpg" style="height:18px; width:18px" /></a></td>\n																					<!-- Flickr -->\n																				</tr>\n																			</tbody>\n																		</table>\n																		</td>\n																	</tr>\n																</tbody>\n															</table>\n															</td>\n														</tr>\n														<tr>\n															<td><!-- Begin Main Image --><img alt="" src="http://www.radiusbob.com/drips/images/header-img.jpg" style="height:228px; width:540px" /></td>\n															<!-- End Main Image -->\n														</tr>\n														<tr>\n															<td><!-- Begin Main Entry -->\n															<h2>Thank You #RECEIVER_NAME#</h2>\n															<!-- Main Heading -->\n\n															<p>We will be calling you shortly to complete your Insurance Quote Request.</p>\n\n															<p>You can also reach us directly at #AGENT_PHONE#. We appreciate the opportunity to be of service to you with this important decision.</p>\n															<!-- End Main Entry --></td>\n														</tr>\n														<tr>\n															<td>\n															<h2>Multiple Insurance Companies, Multiple Options</h2>\n															<!-- Bottom Heading -->\n\n															<p>We represent a number of different Insurance Companies which allows us to research multiple plan offereings to find the best plan for you needs.</p>\n															<!-- Bottom Paragprah --></td>\n														</tr>\n														<tr>\n															<td>\n															<h2>Trusted Expertise</h2>\n															<!-- Bottom Heading -->\n\n															<p>Our licensed agents are experts at cutting through red tape to save you time and money. We have helped thousands of people like you save millions of dollars, while providing health &amp; well being to their loved ones. Please keep in mind that many factors, such as health changes or aging, can cause your rates to go up. Do not wait to take advantage of these great rates! Call me toll free at #AGENT_PHONE#, between 9:00am - 5:00pm to secure this important coverage for you and your family.</p>\n															<!-- Bottom Paragprah --></td>\n														</tr>\n														<tr>\n															<td>\n															<h2>Contact Me</h2>\n															<!-- Bottom Heading -->\n\n															<p>#AGENT_NAME#<br />\n															Insurance Agent<br />\n															<br />\n															Phone: #AGENT_PHONE#<br />\n															Email: #AGENT_EMAIL#</p>\n															<!-- Bottom Paragprah --></td>\n														</tr>\n													</tbody>\n												</table>\n												</td>\n												<td>&nbsp;</td>\n											</tr>\n										</tbody>\n									</table>\n									</td>\n									<td><img alt="" src="http://www.radiusbob.com/drips/images/right-shadow.jpg" style="height:744px; width:13px" /></td>\n								</tr>\n							</tbody>\n						</table>\n						</td>\n					</tr>\n					<tr>\n						<td><img alt="" src="http://www.radiusbob.com/drips/images/footer-bg.jpg" style="height:77px; width:600px" /></td>\n					</tr>\n					<tr><!-- Begin Footer -->\n						<td>\n						<p>Copyright &copy; 2014 Your Agency Name. All Right Reserved.<br />\n						Your Address - <a href="#" style="color: #2284c8;">www.youragency.com</a></p>\n						</td>\n					</tr>\n					<!-- End Footer -->\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(3, 'Monthly Newsletter Template', 'MARKETING ONLINE', '#AGENT_NAME#', 'bio.rider.rx@gmail.com', 'ryuki.servaiv@gmail.com', '<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">\n	<tbody>\n		<tr>\n			<td>\n			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:626px">\n				<tbody>\n					<tr><!-- Begin Browser View -->\n						<td>\n						<p>&nbsp;</p>\n						</td>\n					</tr>\n					<!-- End Browser View -->\n					<tr>\n						<td>\n						<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n							<tbody>\n								<tr>\n									<td><img alt="" src="http://www.radiusbob.com/drips/images/left-shadow.jpg" style="height:744px; width:13px" /></td>\n									<td>\n									<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n										<tbody>\n											<tr>\n												<td>&nbsp;</td>\n												<td>\n												<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n													<tbody>\n														<tr>\n															<td>\n															<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																<tbody>\n																	<tr>\n																		<td><!-- Begin Company Name Image -->\n																		<h2>AGENCY NAME HERE</h2>\n																		</td>\n																		<!-- End Company Name Image -->\n																		<td>\n																		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																			<tbody>\n																				<tr>\n																					<td>&nbsp;</td>\n																					<!-- Facebook -->\n																					<td>&nbsp;</td>\n																					<!-- Tumblr -->\n																					<td><a href="#"><img alt="" src="http://www.radiusbob.com/drips/images/facebook.jpg" style="height:18px; width:17px" /></a></td>\n																					<!-- Twitter -->\n																					<td><a href="#"><img alt="" src="http://www.radiusbob.com/drips/images/twitter.jpg" style="height:18px; width:18px" /></a></td>\n																					<!-- Flickr -->\n																				</tr>\n																			</tbody>\n																		</table>\n																		</td>\n																	</tr>\n																</tbody>\n															</table>\n															</td>\n														</tr>\n														<tr>\n															<td><!-- Begin Main Image --><img alt="" src="http://www.radiusbob.com/drips/images/header-img3.jpg" style="height:228px; width:540px" /></td>\n															<!-- End Main Image -->\n														</tr>\n														<tr>\n															<td><!-- Begin Main Entry -->\n															<h2>Month Year</h2>\n															<!-- Main Heading -->\n\n															<p>#RECEIVER_NAME#,<br />\n															<br />\n															In this month&#39;s edition of our #AGENCY_NAME#&#39;s Newsletter we cover these four:<br />\n															<strong>Carrier Updates<br />\n															In the Community<br />\n															Savings Suggestion of the Month<br />\n															Health &amp; Wellness Tip</strong></p>\n															<!-- End Main Entry --></td>\n														</tr>\n														<tr>\n															<td>\n															<h2>Second Intro Paragraph</h2>\n															<!-- Bottom Heading -->\n\n															<p>More Copy, More Copy, More Copy.</p>\n															<!-- Bottom Paragprah --></td>\n														</tr>\n														<tr>\n															<td>\n															<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																<tbody>\n																	<tr>\n																		<td>\n																		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																			<tbody>\n																				<tr><!-- Begin First Block -->\n																					<td style="background-color:#f9f9f9">\n																					<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																						<tbody>\n																							<tr>\n																								<td><img alt="" src="http://www.radiusbob.com/drips/images/content-img1.jpg" style="height:119px; margin:0px; padding:0; text-align:center; width:234px" /></td>\n																								<!-- First Block Image -->\n																							</tr>\n																							<tr>\n																								<td>\n																								<h2>Carrier or Product Updates</h2>\n																								<!-- First Block Heading -->\n\n																								<p>#Are there any Carrier, Product or other Updates you would like to notifiy Clients About?#</p>\n																								<!-- First Block Paragraph --></td>\n																							</tr>\n																							<tr>\n																								<td><a href="#"><img alt="" src="http://www.radiusbob.com/drips/images/read-more.jpg" style="height:31px; width:87px" /></a></td>\n																								<!-- First Block Read More -->\n																							</tr>\n																						</tbody>\n																					</table>\n																					</td>\n																				</tr>\n																				<!-- End First Block -->\n																			</tbody>\n																		</table>\n																		</td>\n																		<td>&nbsp;</td>\n																		<td>\n																		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																			<tbody>\n																				<tr><!-- Begin Second Block -->\n																					<td style="background-color:#f9f9f9">\n																					<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																						<tbody>\n																							<tr>\n																								<td><img alt="" src="http://www.radiusbob.com/drips/images/content-img2.jpg" style="height:119px; margin:0px; padding:0; text-align:center; width:234px" /></td>\n																								<!-- Second Block Image -->\n																							</tr>\n																							<tr>\n																								<td>\n																								<h2>In the Community</h2>\n																								<!-- Second Block Heading -->\n\n																								<p>#Put Local News, Events or other activities your clients might like to know about for the upcoming month#.</p>\n																								<!-- Second Block Paragraph --></td>\n																							</tr>\n																							<tr>\n																								<td><a href="#"><img alt="" src="http://www.radiusbob.com/drips/images/read-more.jpg" style="height:31px; width:87px" /></a></td>\n																								<!-- Second Block Read More -->\n																							</tr>\n																						</tbody>\n																					</table>\n																					</td>\n																				</tr>\n																			</tbody>\n																		</table>\n																		</td>\n																	</tr>\n																	<!-- End Second Block -->\n																</tbody>\n															</table>\n															</td>\n														</tr>\n														<tr>\n															<td>&nbsp;</td>\n														</tr>\n														<tr>\n															<td>\n															<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																<tbody>\n																	<tr>\n																		<td>\n																		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																			<tbody>\n																				<tr>\n																					<td style="background-color:#f9f9f9">\n																					<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																						<tbody>\n																							<tr>\n																								<td><img alt="" src="http://www.radiusbob.com/drips/images/content-img4.jpg" style="height:119px; margin:0px; padding:0; text-align:center; width:234px" /></td>\n																								<!-- Third Block Image -->\n																							</tr>\n																							<tr>\n																								<td>\n																								<h2>Savings Suggestion of the Month</h2>\n																								<!-- Third Block Heading -->\n\n																								<p>Master the thirty day rule. Whenever you&rsquo;re considering making an unnecessary purchase, wait thirty days and then ask yourself if you still want that item.</p>\n																								<!-- Third Block Paragraph --></td>\n																							</tr>\n																							<tr>\n																								<td><a href="#"><img alt="" src="http://www.radiusbob.com/drips/images/read-more.jpg" style="height:31px; width:87px" /></a></td>\n																								<!-- Third Block Read More -->\n																							</tr>\n																						</tbody>\n																					</table>\n																					</td>\n																				</tr>\n																				<!-- End Third Block -->\n																			</tbody>\n																		</table>\n																		</td>\n																		<!-- Begin Fourth Block-->\n																		<td>&nbsp;</td>\n																		<td>\n																		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																			<tbody>\n																				<tr>\n																					<td style="background-color:#f9f9f9">\n																					<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\n																						<tbody>\n																							<tr>\n																								<td><img alt="" src="http://www.radiusbob.com/drips/images/content-img3.jpg" style="height:119px; margin:0px; padding:0; text-align:center; width:234px" /></td>\n																								<!-- Fourth Block Image -->\n																							</tr>\n																							<tr>\n																								<td>\n																								<h2>Health &amp; Wellness Tips</h2>\n																								<!-- Fourth Block Heading -->\n\n																								<p>There is no better way to rejuvenate your health than by eating more nutritiously. In fact, even a few simple changes in your diet and lifestyle can have a positive impact on your health.</p>\n																								<!-- Fourth Block Paragraph --></td>\n																							</tr>\n																							<tr>\n																								<td><a href="#"><img alt="" src="http://www.radiusbob.com/drips/images/read-more.jpg" style="height:31px; width:87px" /></a></td>\n																								<!-- Fourth Block Read More -->\n																							</tr>\n																						</tbody>\n																					</table>\n																					</td>\n																				</tr>\n																				<!-- End Fourth Block-->\n																			</tbody>\n																		</table>\n																		</td>\n																	</tr>\n																</tbody>\n															</table>\n															</td>\n														</tr>\n														<tr>\n															<td>\n															<h2>Contact Me</h2>\n															<!-- Bottom Heading -->\n\n															<p>#AGENT_NAME#<br />\n															Insurance Agent<br />\n															<br />\n															Phone: #AGENT_PHONE#<br />\n															Email: #AGENT_EMAIL#</p>\n															<!-- Bottom Paragprah --></td>\n														</tr>\n													</tbody>\n												</table>\n												</td>\n												<td>&nbsp;</td>\n											</tr>\n										</tbody>\n									</table>\n									</td>\n									<td><img alt="" src="http://www.radiusbob.com/drips/images/right-shadow.jpg" style="height:744px; width:13px" /></td>\n								</tr>\n							</tbody>\n						</table>\n						</td>\n					</tr>\n					<tr>\n						<td><img alt="" src="http://www.radiusbob.com/drips/images/footer-bg.jpg" style="height:77px; width:600px" /></td>\n					</tr>\n					<tr><!-- Begin Footer -->\n						<td>\n						<p>Copyright &copy; 2014 Your Agency Name. All Right Reserved.<br />\n						Your Address - <a href="#" style="color: #2284c8;">www.youragency.com</a></p>\n						</td>\n					</tr>\n					<!-- End Footer -->\n				</tbody>\n			</table>\n			</td>\n		</tr>\n	</tbody>\n</table>\n');

-- --------------------------------------------------------

--
-- Table structure for table `ge_height`
--

CREATE TABLE IF NOT EXISTS `ge_height` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `height` char(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `ge_height`
--

INSERT INTO `ge_height` (`id`, `height`) VALUES
(1, '4'' 6"'),
(2, '4'' 6"'),
(3, '4'' 7"'),
(4, '4'' 8"'),
(5, '4'' 9"'),
(6, '4'' 10"'),
(7, '4'' 11"'),
(8, '5'' 1"'),
(9, '5'' 2"'),
(10, '5'' 3"'),
(11, '5'' 4"'),
(12, '5'' 5"'),
(13, '5'' 6"'),
(14, '5'' 7"'),
(15, '5'' 8"'),
(16, '5'' 9"'),
(17, '5'' 10"'),
(18, '5'' 11"'),
(19, '6'' 0"'),
(20, '6'' 1"'),
(21, '6'' 2"'),
(22, '6'' 3"'),
(23, '6'' 4"'),
(24, '6'' 5"'),
(25, '6'' 6"'),
(26, '6'' 7"'),
(27, '6'' 8"'),
(28, '6'' 9"');

-- --------------------------------------------------------

--
-- Table structure for table `ge_leads`
--

CREATE TABLE IF NOT EXISTS `ge_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_name` varchar(500) NOT NULL,
  `lead_email` varchar(70) NOT NULL,
  `phone` char(15) NOT NULL,
  `cell_phone` char(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0=female;1=male',
  `product_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `height` char(11) DEFAULT NULL,
  `weight` char(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `premium` int(11) NOT NULL DEFAULT '0',
  `commission` int(11) NOT NULL DEFAULT '0',
  `renewal` int(11) NOT NULL DEFAULT '0',
  `bonus_commission` int(11) NOT NULL DEFAULT '0',
  `bonus_renewal` int(11) NOT NULL DEFAULT '0',
  `coverage_id` int(11) NOT NULL,
  `is_active` int(11) DEFAULT '1' COMMENT '1=active;0=not active',
  `temperature_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `ge_leads`
--

INSERT INTO `ge_leads` (`id`, `lead_name`, `lead_email`, `phone`, `cell_phone`, `address`, `city`, `country_id`, `zip_code`, `gender`, `product_id`, `status_id`, `agent_id`, `height`, `weight`, `date_of_birth`, `premium`, `commission`, `renewal`, `bonus_commission`, `bonus_renewal`, `coverage_id`, `is_active`, `temperature_id`, `created_date`) VALUES
(16, 'Berly', 'kuugaa@gmail.com', '234234', '234234', '23424', 'sdfdsf', 17, 3455, 0, 2, 1, 2, '5'' 6"', '345345', '2014-11-12', 0, 234, 422, 0, 0, 2, 1, 1, '2014-11-20 11:55:01'),
(17, 'Virly', 'kuugaga@gmail.com', '9345940358', '90348590345', 'sdfsdf', 'sdf', 17, 34534, 0, 2, 1, 2, '5'' 9"', '345', NULL, 0, 0, 0, 0, 0, 3, 1, 1, '2014-11-20 11:55:01'),
(18, 'Yeni', 'kuuga@yahoo.com', '234234', '234234', '234234', 'sdfds', 70, 34534, 0, 1, 2, 2, '5'' 6"', '4w5345', NULL, 0, 0, 0, 0, 0, 2, 1, 1, '2014-11-20 11:55:01'),
(19, 'Joshua', 'kuuuga@gmail.com', '98797', '89789789', 'sfsf', 'sdfdsf', 15, 54234, 0, 1, 1, 2, '5'' 6"', '54234', '1970-01-01', 0, 0, 0, 0, 0, 3, 1, 1, '2014-11-20 11:55:01'),
(20, 'Zoro', 'kuugaagag@gmail.com', '345345', '345345', 'sdfdsf', 'sdf', 16, 34534, 1, 1, 1, 2, '5'' 8"', '345', NULL, 0, 0, 0, 0, 0, 3, 1, 1, '2014-11-20 11:55:01'),
(21, 'Yeyen', 'yeyen@gmail.com', '3454', '34543', 'sdf', 'sdf', 15, 345, 0, 2, 1, 5, '5'' 7"', '45', NULL, 0, 0, 0, 0, 0, 2, 1, 1, '2014-11-20 11:55:01'),
(27, 'Bilkis', 'kuug5a@yahoo.com', '0808', '080890', 'jalan raya no t5345', '345', 16, 34543, 0, 1, 1, 1, '5'' 6"', '345', '1970-01-01', 0, 201, 1111, 0, 0, 2, 1, 1, '2014-11-20 11:55:01'),
(28, 'Farah', 'blead@gmail.com', '999789', '9879798', 'jalan raya no 787', 'jakarta', 1, 85258, 0, 1, 2, 1, '5'' 9"', '3443', '2009-12-31', 0, 111, 1111, 0, 0, 2, 1, 1, '2014-11-20 11:55:01'),
(29, 'Roki', 'roki@gmail.com', '0890989089', '9879879899', 'Jalan konaha', 'Johor', 4, 852, 1, 1, 2, 1, '4'' 6"', '963', '2014-11-20', 12, 111, 1111, 63, 96, 3, 1, 1, '2014-11-20 11:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `ge_notes`
--

CREATE TABLE IF NOT EXISTS `ge_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_lead_id` int(11) DEFAULT NULL,
  `to_client_id` int(11) DEFAULT NULL,
  `note` text NOT NULL,
  `from_lead_id` int(11) DEFAULT NULL,
  `from_client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ge_notes`
--

INSERT INTO `ge_notes` (`id`, `to_lead_id`, `to_client_id`, `note`, `from_lead_id`, `from_client_id`) VALUES
(14, 26, NULL, 'teest', NULL, NULL),
(16, NULL, 1, 'asdasdasdasdasd', NULL, NULL),
(17, NULL, 1, 'aaa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ge_products`
--

CREATE TABLE IF NOT EXISTS `ge_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coverage_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `commission` char(100) NOT NULL,
  `renewal` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ge_products`
--

INSERT INTO `ge_products` (`id`, `coverage_id`, `product_name`, `commission`, `renewal`) VALUES
(1, 1, 'GTA', '111', '1111'),
(2, 1, 'GTB', '234', '422'),
(6, 2, 'aasd', '123', '213');

-- --------------------------------------------------------

--
-- Table structure for table `ge_status`
--

CREATE TABLE IF NOT EXISTS `ge_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ge_status`
--

INSERT INTO `ge_status` (`id`, `description`) VALUES
(1, 'New'),
(2, 'Old');

-- --------------------------------------------------------

--
-- Table structure for table `ge_tasks`
--

CREATE TABLE IF NOT EXISTS `ge_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text NOT NULL,
  `event_category_id` int(11) NOT NULL,
  `google_calendar_id` varchar(500) NOT NULL,
  `google_summary_event` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

-- --------------------------------------------------------

--
-- Table structure for table `ge_temperatures`
--

CREATE TABLE IF NOT EXISTS `ge_temperatures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `temperature` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ge_temperatures`
--

INSERT INTO `ge_temperatures` (`id`, `temperature`) VALUES
(1, 'Hot'),
(2, 'Warm'),
(3, 'Cool'),
(4, 'Cold');

-- --------------------------------------------------------

--
-- Table structure for table `ge_weight`
--

CREATE TABLE IF NOT EXISTS `ge_weight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weight` char(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_config`
--

CREATE TABLE IF NOT EXISTS `tb_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tb_config`
--

INSERT INTO `tb_config` (`id`, `name`, `value`) VALUES
(1, 'title', 'IT CONCEPT APPLICATION'),
(2, 'og_facebook', ''),
(3, 'og_twitter', ''),
(4, 'google_anal', ''),
(5, 'inject_code', ''),
(6, 'keywords', 'Foamtec keyword'),
(7, 'description', 'DESCRIPTION'),
(8, 'favicon', '2014-09-30_n_68b69adc70dee486c7546f039ffca906.png'),
(14, 'maintenance', '0'),
(9, 'name', 'IT CONCEPT'),
(10, 'logo', '2014-09-30_n_851f7542dc27e5108833a9f5fa23f8d2.png'),
(11, 'copyright', 'Copyright © 2014. Foamtec. All Rights Reserved. '),
(12, 'phone', '(65) 6368 2898'),
(13, 'fax', '(65) 6368 1831'),
(15, 'address', 'lorem ipsum'),
(16, 'email', 'enquiry@foamtec.com.sg'),
(17, 'barcode', '2014-09-10_n_2af295627321868fda7723030755ff5f.png'),
(18, 'facebook', 'https://www.facebook.com'),
(19, 'twitter', 'https://www.twitter.com'),
(20, 'gplus', 'https://www.plus.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_smptmail`
--

CREATE TABLE IF NOT EXISTS `tb_smptmail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_sender` char(50) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `carbon_copy` text,
  `host_smtp` char(50) NOT NULL,
  `port_smtp` int(11) NOT NULL,
  `username_smtp` char(32) NOT NULL,
  `password_smtp` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_smptmail`
--

INSERT INTO `tb_smptmail` (`id`, `email_sender`, `sender_name`, `carbon_copy`, `host_smtp`, `port_smtp`, `username_smtp`, `password_smtp`) VALUES
(1, 'noreply@budgetdesign.com.sg', 'noreply@budgetdesign.com.sg', 'bio.rider.rx@gmail.com', 'mail.budgetdesign.com.sg', 25, 'testing@budgetdesign.com.sg', 'testing');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
