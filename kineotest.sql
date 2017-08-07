-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2017 at 06:07 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kineotest`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `constituency_id` int(10) UNSIGNED NOT NULL,
  `party_id` int(10) UNSIGNED NOT NULL,
  `election_id` int(10) UNSIGNED NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Candidate Storage table';

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `constituency_id`, `party_id`, `election_id`, `description`) VALUES
(1, 'Candidate 0', 32, 6, 2, ''),
(2, 'Candidate 1', 32, 1, 2, ''),
(3, 'Candidate 2', 32, 4, 2, ''),
(4, 'Candidate 3', 32, 2, 2, ''),
(5, 'Candidate 4', 32, 3, 2, ''),
(6, 'Candidate 5', 32, 5, 2, ''),
(7, 'Candidate 6', 32, 7, 2, ''),
(8, 'Candidate 0', 45, 6, 2, NULL),
(9, 'Candidate 1', 45, 1, 2, NULL),
(10, 'Candidate 2', 45, 4, 2, NULL),
(11, 'Candidate 3', 45, 2, 2, NULL),
(12, 'Candidate 4', 45, 3, 2, NULL),
(13, 'Candidate 5', 45, 5, 2, NULL),
(14, 'Candidate 6', 45, 7, 2, NULL),
(15, 'Candidate 0', 234, 6, 2, NULL),
(16, 'Candidate 1', 234, 1, 2, NULL),
(17, 'Candidate 2', 234, 4, 2, NULL),
(18, 'Candidate 3', 234, 2, 2, NULL),
(19, 'Candidate 4', 234, 3, 2, NULL),
(20, 'Candidate 5', 234, 5, 2, NULL),
(21, 'Candidate 6', 234, 7, 2, NULL),
(22, 'Candidate 0', 634, 6, 2, NULL),
(23, 'Candidate 1', 634, 1, 2, NULL),
(24, 'Candidate 2', 634, 4, 2, NULL),
(25, 'Candidate 3', 634, 2, 2, NULL),
(26, 'Candidate 4', 634, 3, 2, NULL),
(27, 'Candidate 5', 634, 5, 2, NULL),
(28, 'Candidate 6', 634, 7, 2, NULL),
(29, 'Candidate 0', 87, 6, 2, NULL),
(30, 'Candidate 1', 87, 1, 2, NULL),
(31, 'Candidate 2', 87, 4, 2, NULL),
(32, 'Candidate 3', 87, 2, 2, NULL),
(33, 'Candidate 4', 87, 3, 2, NULL),
(34, 'Candidate 5', 87, 5, 2, NULL),
(35, 'Candidate 6', 87, 7, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `constituency`
--

CREATE TABLE `constituency` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) CHARACTER SET utf32 NOT NULL,
  `nation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `constituency`
--

INSERT INTO `constituency` (`id`, `name`, `nation_id`) VALUES
(1, 'Aldershot', 1),
(2, 'Aldridge-Brownhills', 1),
(3, 'Altrincham and Sale West', 1),
(4, 'Amber Valley', 1),
(5, 'Arundel and South Downs', 1),
(6, 'Ashfield', 1),
(7, 'Ashford', 1),
(8, 'Ashton-under-Lyne', 1),
(9, 'Aylesbury', 1),
(10, 'Banbury', 1),
(11, 'Barking', 1),
(12, 'Barnsley Central', 1),
(13, 'Barnsley East', 1),
(14, 'Barrow and Furness', 1),
(15, 'Basildon and Billericay', 1),
(16, 'Basingstoke', 1),
(17, 'Bassetlaw', 1),
(18, 'Bath', 1),
(19, 'Batley and Spen', 1),
(20, 'Battersea', 1),
(21, 'Beaconsfield', 1),
(22, 'Beckenham', 1),
(23, 'Bedford', 1),
(24, 'Bermondsey and Old Southwark', 1),
(25, 'Berwick-upon-Tweed', 1),
(26, 'Bethnal Green and Bow', 1),
(27, 'Beverley and Holderness', 1),
(28, 'Bexhill and Battle', 1),
(29, 'Bexleyheath and Crayford', 1),
(30, 'Birkenhead', 1),
(31, 'Birmingham, Edgbaston', 1),
(32, 'Birmingham, Erdington', 1),
(33, 'Birmingham, Hall Green', 1),
(34, 'Birmingham, Hodge Hill', 1),
(35, 'Birmingham, Ladywood', 1),
(36, 'Birmingham, Northfield', 1),
(37, 'Birmingham, Perry Barr', 1),
(38, 'Birmingham, Selly Oak', 1),
(39, 'Birmingham, Yardley', 1),
(40, 'Bishop Auckland', 1),
(41, 'Blackburn', 1),
(42, 'Blackpool North and Cleveleys', 1),
(43, 'Blackpool South', 1),
(44, 'Blackley and Broughton', 1),
(45, 'Blaydon', 1),
(46, 'Blyth Valley', 1),
(47, 'Bognor Regis and Littlehampton', 1),
(48, 'Bolsover', 1),
(49, 'Bolton North East', 1),
(50, 'Bolton South East', 1),
(51, 'Bolton West', 1),
(52, 'Bootle', 1),
(53, 'Boston and Skegness', 1),
(54, 'Bosworth', 1),
(55, 'Bournemouth East', 1),
(56, 'Bournemouth West', 1),
(57, 'Bracknell', 1),
(58, 'Bradford East', 1),
(59, 'Bradford South', 1),
(60, 'Bradford West', 1),
(61, 'Braintree', 1),
(62, 'Brent Central', 1),
(63, 'Brent North', 1),
(64, 'Brentford and Isleworth', 1),
(65, 'Brentwood and Ongar', 1),
(66, 'Bridgwater and West Somerset', 1),
(67, 'Brigg and Goole', 1),
(68, 'Brighton, Kemptown', 1),
(69, 'Brighton, Pavilion', 1),
(70, 'Bristol East', 1),
(71, 'Bristol North West', 1),
(72, 'Bristol South', 1),
(73, 'Bristol West', 1),
(74, 'Broadland', 1),
(75, 'Bromley and Chislehurst', 1),
(76, 'Bromsgrove', 1),
(77, 'Broxbourne', 1),
(78, 'Broxtowe', 1),
(79, 'Buckingham', 1),
(80, 'Burnley', 1),
(81, 'Burton', 1),
(82, 'Bury North', 1),
(83, 'Bury South', 1),
(84, 'Bury St Edmunds', 1),
(85, 'Calder Valley', 1),
(86, 'Camberwell and Peckham', 1),
(87, 'Camborne and Redruth', 1),
(88, 'Cambridge', 1),
(89, 'Cannock Chase', 1),
(90, 'Canterbury', 1),
(91, 'Carlisle', 1),
(92, 'Carshalton and Wallington', 1),
(93, 'Castle Point', 1),
(94, 'Central Devon', 1),
(95, 'Central Suffolk and North Ipswich', 1),
(96, 'Charnwood', 1),
(97, 'Chatham and Aylesford', 1),
(98, 'Cheadle', 1),
(99, 'Chelmsford', 1),
(100, 'Chelsea and Fulham', 1),
(101, 'Cheltenham', 1),
(102, 'Chesham and Amersham', 1),
(103, 'Chesterfield', 1),
(104, 'Chichester', 1),
(105, 'Chingford and Woodford Green', 1),
(106, 'Chippenham', 1),
(107, 'Chipping Barnet', 1),
(108, 'Chorley', 1),
(109, 'Christchurch', 1),
(110, 'Cities of London and Westminster', 1),
(111, 'City of Chester', 1),
(112, 'City of Durham', 1),
(113, 'Clacton', 1),
(114, 'Cleethorpes', 1),
(115, 'Colchester', 1),
(116, 'Colne Valley', 1),
(117, 'Congleton', 1),
(118, 'Copeland', 1),
(119, 'Corby', 1),
(120, 'Coventry North East', 1),
(121, 'Coventry North West', 1),
(122, 'Coventry South', 1),
(123, 'Crawley', 1),
(124, 'Crewe and Nantwich', 1),
(125, 'Croydon Central', 1),
(126, 'Croydon North', 1),
(127, 'Croydon South', 1),
(128, 'Dagenham and Rainham', 1),
(129, 'Darlington', 1),
(130, 'Dartford', 1),
(131, 'Daventry', 1),
(132, 'Denton and Reddish', 1),
(133, 'Derby North', 1),
(134, 'Derby South', 1),
(135, 'Derbyshire Dales', 1),
(136, 'Devizes', 1),
(137, 'Dewsbury', 1),
(138, 'Don Valley', 1),
(139, 'Doncaster Central', 1),
(140, 'Doncaster North', 1),
(141, 'Dover', 1),
(142, 'Dudley North', 1),
(143, 'Dudley South', 1),
(144, 'Dulwich and West Norwood', 1),
(145, 'Ealing Central and Acton', 1),
(146, 'Ealing North', 1),
(147, 'Ealing, Southall', 1),
(148, 'Easington', 1),
(149, 'East Devon', 1),
(150, 'East Ham', 1),
(151, 'East Hampshire', 1),
(152, 'East Surrey', 1),
(153, 'East Worthing and Shoreham', 1),
(154, 'East Yorkshire', 1),
(155, 'Eastbourne', 1),
(156, 'Eastleigh', 1),
(157, 'Eddisbury', 1),
(158, 'Edmonton', 1),
(159, 'Ellesmere Port and Neston', 1),
(160, 'Elmet and Rothwell', 1),
(161, 'Eltham', 1),
(162, 'Enfield North', 1),
(163, 'Enfield, Southgate', 1),
(164, 'Epping Forest', 1),
(165, 'Epsom and Ewell', 1),
(166, 'Erewash', 1),
(167, 'Erith and Thamesmead', 1),
(168, 'Esher and Walton', 1),
(169, 'Exeter', 1),
(170, 'Fareham', 1),
(171, 'Faversham and Mid Kent', 1),
(172, 'Feltham and Heston', 1),
(173, 'Filton and Bradley Stoke', 1),
(174, 'Finchley and Golders Green', 1),
(175, 'Folkestone and Hythe', 1),
(176, 'Forest of Dean', 1),
(177, 'Fylde', 1),
(178, 'Gainsborough', 1),
(179, 'Garston and Halewood', 1),
(180, 'Gateshead', 1),
(181, 'Gedling', 1),
(182, 'Gillingham and Rainham', 1),
(183, 'Gloucester', 1),
(184, 'Gosport', 1),
(185, 'Grantham and Stamford', 1),
(186, 'Gravesham', 1),
(187, 'Great Grimsby', 1),
(188, 'Great Yarmouth', 1),
(189, 'Greenwich and Woolwich', 1),
(190, 'Guildford', 1),
(191, 'Hackney North and Stoke Newington', 1),
(192, 'Hackney South and Shoreditch', 1),
(193, 'Halesowen and Rowley Regis', 1),
(194, 'Halifax', 1),
(195, 'Haltemprice and Howden', 1),
(196, 'Halton', 1),
(197, 'Hammersmith', 1),
(198, 'Hampstead and Kilburn', 1),
(199, 'Harborough', 1),
(200, 'Harlow', 1),
(201, 'Harrogate and Knaresborough', 1),
(202, 'Harrow East', 1),
(203, 'Harrow West', 1),
(204, 'Hartlepool', 1),
(205, 'Harwich and North Essex', 1),
(206, 'Hastings and Rye', 1),
(207, 'Havant', 1),
(208, 'Hayes and Harlington', 1),
(209, 'Hazel Grove', 1),
(210, 'Hemel Hempstead', 1),
(211, 'Hemsworth', 1),
(212, 'Hendon', 1),
(213, 'Henley', 1),
(214, 'Hereford and South Herefordshire', 1),
(215, 'Hertford and Stortford', 1),
(216, 'Hertsmere', 1),
(217, 'Hexham', 1),
(218, 'Heywood and Middleton', 1),
(219, 'High Peak', 1),
(220, 'Hitchin and Harpenden', 1),
(221, 'Holborn and St Pancras', 1),
(222, 'Hornchurch and Upminster', 1),
(223, 'Hornsey and Wood Green', 1),
(224, 'Horsham', 1),
(225, 'Houghton and Sunderland South', 1),
(226, 'Hove', 1),
(227, 'Huddersfield', 1),
(228, 'Huntingdon', 1),
(229, 'Hyndburn', 1),
(230, 'Ilford North', 1),
(231, 'Ilford South', 1),
(232, 'Ipswich', 1),
(233, 'Isle of Wight', 1),
(234, 'Islington North', 1),
(235, 'Islington South and Finsbury', 1),
(236, 'Jarrow', 1),
(237, 'Keighley', 1),
(238, 'Kenilworth and Southam', 1),
(239, 'Kensington', 1),
(240, 'Kettering', 1),
(241, 'Kingston and Surbiton', 1),
(242, 'Kingston upon Hull East', 1),
(243, 'Kingston upon Hull North', 1),
(244, 'Kingston upon Hull West and Hessle', 1),
(245, 'Kingswood', 1),
(246, 'Knowsley', 1),
(247, 'Lancaster and Fleetwood', 1),
(248, 'Leeds Central', 1),
(249, 'Leeds East', 1),
(250, 'Leeds North East', 1),
(251, 'Leeds North West', 1),
(252, 'Leeds West', 1),
(253, 'Leicester East', 1),
(254, 'Leicester South', 1),
(255, 'Leicester West', 1),
(256, 'Leigh', 1),
(257, 'Lewes', 1),
(258, 'Lewisham, Deptford', 1),
(259, 'Lewisham East', 1),
(260, 'Lewisham West and Penge', 1),
(261, 'Leyton and Wanstead', 1),
(262, 'Lichfield', 1),
(263, 'Lincoln', 1),
(264, 'Liverpool, Riverside', 1),
(265, 'Liverpool, Walton', 1),
(266, 'Liverpool, Wavertree', 1),
(267, 'Liverpool, West Derby', 1),
(268, 'Loughborough', 1),
(269, 'Louth and Horncastle', 1),
(270, 'Ludlow', 1),
(271, 'Luton North', 1),
(272, 'Luton South', 1),
(273, 'Macclesfield', 1),
(274, 'Maidenhead', 1),
(275, 'Maidstone and The Weald', 1),
(276, 'Makerfield', 1),
(277, 'Maldon', 1),
(278, 'Manchester Central', 1),
(279, 'Manchester, Gorton', 1),
(280, 'Manchester, Withington', 1),
(281, 'Mansfield', 1),
(282, 'Meon Valley', 1),
(283, 'Meriden', 1),
(284, 'Mid Bedfordshire', 1),
(285, 'Mid Derbyshire', 1),
(286, 'Mid Dorset and North Poole', 1),
(287, 'Mid Norfolk', 1),
(288, 'Mid Sussex', 1),
(289, 'Mid Worcestershire', 1),
(290, 'Middlesbrough', 1),
(291, 'Middlesbrough South and East Cleveland', 1),
(292, 'Milton Keynes North', 1),
(293, 'Milton Keynes South', 1),
(294, 'Mitcham and Morden', 1),
(295, 'Mole Valley', 1),
(296, 'Morecambe and Lunesdale', 1),
(297, 'Morley and Outwood', 1),
(298, 'New Forest East', 1),
(299, 'New Forest West', 1),
(300, 'Newark', 1),
(301, 'Newbury', 1),
(302, 'Newcastle-under-Lyme', 1),
(303, 'Newcastle upon Tyne Central', 1),
(304, 'Newcastle upon Tyne East', 1),
(305, 'Newcastle upon Tyne North', 1),
(306, 'Newton Abbot', 1),
(307, 'Normanton, Pontefract and Castleford', 1),
(308, 'North Cornwall', 1),
(309, 'North Devon', 1),
(310, 'North Dorset', 1),
(311, 'North Durham', 1),
(312, 'North East Bedfordshire', 1),
(313, 'North East Cambridgeshire', 1),
(314, 'North East Derbyshire', 1),
(315, 'North East Hampshire', 1),
(316, 'North East Hertfordshire', 1),
(317, 'North East Somerset', 1),
(318, 'North Herefordshire', 1),
(319, 'North Norfolk', 1),
(320, 'North Shropshire', 1),
(321, 'North Somerset', 1),
(322, 'North Swindon', 1),
(323, 'North Thanet', 1),
(324, 'North Tyneside', 1),
(325, 'North Warwickshire', 1),
(326, 'North West Cambridgeshire', 1),
(327, 'North West Durham', 1),
(328, 'North West Hampshire', 1),
(329, 'North West Leicestershire', 1),
(330, 'North West Norfolk', 1),
(331, 'North Wiltshire', 1),
(332, 'Northampton North', 1),
(333, 'Northampton South', 1),
(334, 'Norwich North', 1),
(335, 'Norwich South', 1),
(336, 'Nottingham East', 1),
(337, 'Nottingham North', 1),
(338, 'Nottingham South', 1),
(339, 'Nuneaton', 1),
(340, 'Old Bexley and Sidcup', 1),
(341, 'Oldham East and Saddleworth', 1),
(342, 'Oldham West and Royton', 1),
(343, 'Orpington', 1),
(344, 'Oxford East', 1),
(345, 'Oxford West and Abingdon', 1),
(346, 'Pendle', 1),
(347, 'Penistone and Stocksbridge', 1),
(348, 'Penrith and The Border', 1),
(349, 'Peterborough', 1),
(350, 'Plymouth, Moor View', 1),
(351, 'Plymouth, Sutton and Devonport', 1),
(352, 'Poole', 1),
(353, 'Poplar and Limehouse', 1),
(354, 'Portsmouth North', 1),
(355, 'Portsmouth South', 1),
(356, 'Preston', 1),
(357, 'Pudsey', 1),
(358, 'Putney', 1),
(359, 'Rayleigh and Wickford', 1),
(360, 'Reading East', 1),
(361, 'Reading West', 1),
(362, 'Redcar', 1),
(363, 'Redditch', 1),
(364, 'Reigate', 1),
(365, 'Ribble Valley', 1),
(366, 'Richmond (Yorks)', 1),
(367, 'Richmond Park', 1),
(368, 'Rochdale', 1),
(369, 'Rochester and Strood', 1),
(370, 'Rochford and Southend East', 1),
(371, 'Romford', 1),
(372, 'Romsey and Southampton North', 1),
(373, 'Rossendale and Darwen', 1),
(374, 'Rother Valley', 1),
(375, 'Rotherham', 1),
(376, 'Rugby', 1),
(377, 'Ruislip, Northwood and Pinner', 1),
(378, 'Runnymede and Weybridge', 1),
(379, 'Rushcliffe', 1),
(380, 'Rutland and Melton', 1),
(381, 'Saffron Walden', 1),
(382, 'Salisbury', 1),
(383, 'Salford and Eccles', 1),
(384, 'Scarborough and Whitby', 1),
(385, 'Scunthorpe', 1),
(386, 'Sedgefield', 1),
(387, 'Sefton Central', 1),
(388, 'Selby and Ainsty', 1),
(389, 'Sevenoaks', 1),
(390, 'Sheffield, Brightside and Hillsborough', 1),
(391, 'Sheffield Central', 1),
(392, 'Sheffield, Hallam', 1),
(393, 'Sheffield, Heeley', 1),
(394, 'Sheffield South East', 1),
(395, 'Sherwood', 1),
(396, 'Shipley', 1),
(397, 'Shrewsbury and Atcham', 1),
(398, 'Sittingbourne and Sheppey', 1),
(399, 'Skipton and Ripon', 1),
(400, 'Sleaford and North Hykeham', 1),
(401, 'Slough', 1),
(402, 'Solihull', 1),
(403, 'Somerton and Frome', 1),
(404, 'South Basildon and East Thurrock', 1),
(405, 'South Cambridgeshire', 1),
(406, 'South Derbyshire', 1),
(407, 'South Dorset', 1),
(408, 'South East Cambridgeshire', 1),
(409, 'South East Cornwall', 1),
(410, 'South Holland and The Deepings', 1),
(411, 'South Leicestershire', 1),
(412, 'South Norfolk', 1),
(413, 'South Northamptonshire', 1),
(414, 'South Ribble', 1),
(415, 'South Shields', 1),
(416, 'South Staffordshire', 1),
(417, 'South Suffolk', 1),
(418, 'South Swindon', 1),
(419, 'South Thanet', 1),
(420, 'South West Bedfordshire', 1),
(421, 'South West Devon', 1),
(422, 'South West Hertfordshire', 1),
(423, 'South West Norfolk', 1),
(424, 'South West Surrey', 1),
(425, 'South West Wiltshire', 1),
(426, 'Southampton, Itchen', 1),
(427, 'Southampton, Test', 1),
(428, 'Southend West', 1),
(429, 'Southport', 1),
(430, 'Spelthorne', 1),
(431, 'St Albans', 1),
(432, 'St Austell and Newquay', 1),
(433, 'St Helens North', 1),
(434, 'St Helens South and Whiston', 1),
(435, 'St Ives', 1),
(436, 'Stafford', 1),
(437, 'Staffordshire Moorlands', 1),
(438, 'Stalybridge and Hyde', 1),
(439, 'Stevenage', 1),
(440, 'Stockport', 1),
(441, 'Stockton North', 1),
(442, 'Stockton South', 1),
(443, 'Stoke-on-Trent Central', 1),
(444, 'Stoke-on-Trent North', 1),
(445, 'Stoke-on-Trent South', 1),
(446, 'Stone', 1),
(447, 'Stourbridge', 1),
(448, 'Stratford-on-Avon', 1),
(449, 'Streatham', 1),
(450, 'Stretford and Urmston', 1),
(451, 'Stroud', 1),
(452, 'Suffolk Coastal', 1),
(453, 'Sunderland Central', 1),
(454, 'Surrey Heath', 1),
(455, 'Sutton and Cheam', 1),
(456, 'Sutton Coldfield', 1),
(457, 'Tamworth', 1),
(458, 'Tatton', 1),
(459, 'Taunton Deane', 1),
(460, 'Telford', 1),
(461, 'Tewkesbury', 1),
(462, 'The Cotswolds', 1),
(463, 'The Wrekin', 1),
(464, 'Thirsk and Malton', 1),
(465, 'Thornbury and Yate', 1),
(466, 'Thurrock', 1),
(467, 'Tiverton and Honiton', 1),
(468, 'Tonbridge and Malling', 1),
(469, 'Tooting', 1),
(470, 'Torbay', 1),
(471, 'Torridge and West Devon', 1),
(472, 'Totnes', 1),
(473, 'Tottenham', 1),
(474, 'Truro and Falmouth', 1),
(475, 'Tunbridge Wells', 1),
(476, 'Twickenham', 1),
(477, 'Tynemouth', 1),
(478, 'Uxbridge and South Ruislip', 1),
(479, 'Vauxhall', 1),
(480, 'Wakefield', 1),
(481, 'Wallasey', 1),
(482, 'Walsall North', 1),
(483, 'Walsall South', 1),
(484, 'Walthamstow', 1),
(485, 'Wansbeck', 1),
(486, 'Wantage', 1),
(487, 'Warley', 1),
(488, 'Warrington North', 1),
(489, 'Warrington South', 1),
(490, 'Warwick and Leamington', 1),
(491, 'Washington and Sunderland West', 1),
(492, 'Watford', 1),
(493, 'Waveney', 1),
(494, 'Wealden', 1),
(495, 'Weaver Vale', 1),
(496, 'Wellingborough', 1),
(497, 'Wells', 1),
(498, 'Welwyn Hatfield', 1),
(499, 'Wentworth and Dearne', 1),
(500, 'West Bromwich East', 1),
(501, 'West Bromwich West', 1),
(502, 'West Dorset', 1),
(503, 'West Ham', 1),
(504, 'West Lancashire', 1),
(505, 'West Suffolk', 1),
(506, 'West Worcestershire', 1),
(507, 'Westminster North', 1),
(508, 'Westmorland and Lonsdale', 1),
(509, 'Weston-Super-Mare', 1),
(510, 'Wigan', 1),
(511, 'Wimbledon', 1),
(512, 'Winchester', 1),
(513, 'Windsor', 1),
(514, 'Wirral South', 1),
(515, 'Wirral West', 1),
(516, 'Witham', 1),
(517, 'Witney', 1),
(518, 'Woking', 1),
(519, 'Wokingham', 1),
(520, 'Wolverhampton North East', 1),
(521, 'Wolverhampton South East', 1),
(522, 'Wolverhampton South West', 1),
(523, 'Worcester', 1),
(524, 'Workington', 1),
(525, 'Worsley and Eccles South', 1),
(526, 'Worthing West', 1),
(527, 'Wycombe', 1),
(528, 'Wyre and Preston North', 1),
(529, 'Wyre Forest', 1),
(530, 'Wythenshawe and Sale East', 1),
(531, 'Yeovil', 1),
(532, 'York Central', 1),
(533, 'York Outer', 1),
(534, 'Aberdeen North', 2),
(535, 'Aberdeen South', 2),
(536, 'Airdrie and Shotts', 2),
(537, 'Angus', 2),
(538, 'Argyll and Bute', 2),
(539, 'Ayr, Carrick and Cumnock', 2),
(540, 'Banff and Buchan', 2),
(541, 'Berwickshire, Roxburgh and Selkirk', 2),
(542, 'Caithness, Sutherland and Easter Ross', 2),
(543, 'Central Ayrshire', 2),
(544, 'Coatbridge, Chryston and Bellshill', 2),
(545, 'Cumbernauld, Kilsyth and Kirkintilloch East', 2),
(546, 'Dumfries and Galloway', 2),
(547, 'Dumfriesshire, Clydesdale and Tweeddale', 2),
(548, 'Dundee East', 2),
(549, 'Dundee West', 2),
(550, 'Dunfermline and West Fife', 2),
(551, 'East Dunbartonshire', 2),
(552, 'East Kilbride, Strathaven and Lesmahagow', 2),
(553, 'East Lothian', 2),
(554, 'East Renfrewshire', 2),
(555, 'Edinburgh East', 2),
(556, 'Edinburgh North and Leith', 2),
(557, 'Edinburgh South', 2),
(558, 'Edinburgh South West', 2),
(559, 'Edinburgh West', 2),
(560, 'Falkirk', 2),
(561, 'Glasgow Central', 2),
(562, 'Glasgow East', 2),
(563, 'Glasgow North', 2),
(564, 'Glasgow North East', 2),
(565, 'Glasgow North West', 2),
(566, 'Glasgow South', 2),
(567, 'Glasgow South West', 2),
(568, 'Glenrothes', 2),
(569, 'Gordon', 2),
(570, 'Inverclyde', 2),
(571, 'Inverness, Nairn, Badenoch and Strathspey', 2),
(572, 'Kilmarnock and Loudoun', 2),
(573, 'Kirkcaldy and Cowdenbeath', 2),
(574, 'Lanark and Hamilton East', 2),
(575, 'Linlithgow and East Falkirk', 2),
(576, 'Livingston', 2),
(577, 'Midlothian', 2),
(578, 'Moray', 2),
(579, 'Motherwell and Wishaw', 2),
(580, 'Na h-Eileanan an Iar', 2),
(581, 'North Ayrshire and Arran', 2),
(582, 'North East Fife', 2),
(583, 'Ochil and South Perthshire', 2),
(584, 'Orkney and Shetland', 2),
(585, 'Paisley and Renfrewshire North', 2),
(586, 'Paisley and Renfrewshire South', 2),
(587, 'Perth and North Perthshire', 2),
(588, 'Ross, Skye and Lochaber', 2),
(589, 'Rutherglen and Hamilton West', 2),
(590, 'Stirling', 2),
(591, 'West Aberdeenshire and Kincardine', 2),
(592, 'West Dunbartonshire', 2),
(593, 'Aberavon', 3),
(594, 'Aberconwy', 3),
(595, 'Alyn and Deeside', 3),
(596, 'Arfon', 3),
(597, 'Blaenau Gwent', 3),
(598, 'Brecon and Radnorshire', 3),
(599, 'Bridgend', 3),
(600, 'Caerphilly', 3),
(601, 'Cardiff Central', 3),
(602, 'Cardiff North', 3),
(603, 'Cardiff South and Penarth', 3),
(604, 'Cardiff West', 3),
(605, 'Carmarthen East and Dinefwr', 3),
(606, 'Carmarthen West and South Pembrokeshire', 3),
(607, 'Ceredigion', 3),
(608, 'Clwyd South', 3),
(609, 'Clwyd West', 3),
(610, 'Cynon Valley', 3),
(611, 'Delyn', 3),
(612, 'Dwyfor Meirionnydd', 3),
(613, 'Gower', 3),
(614, 'Islwyn', 3),
(615, 'Llanelli', 3),
(616, 'Merthyr Tydfil and Rhymney', 3),
(617, 'Monmouth', 3),
(618, 'Montgomeryshire', 3),
(619, 'Neath', 3),
(620, 'Newport East', 3),
(621, 'Newport West', 3),
(622, 'Ogmore', 3),
(623, 'Pontypridd', 3),
(624, 'Preseli Pembrokeshire', 3),
(625, 'Rhondda', 3),
(626, 'Swansea East', 3),
(627, 'Swansea West', 3),
(628, 'Torfaen', 3),
(629, 'Vale of Clwyd', 3),
(630, 'Vale of Glamorgan', 3),
(631, 'Wrexham', 3),
(632, 'Ynys Môn', 3),
(633, 'Belfast East', 4),
(634, 'Belfast North', 4),
(635, 'Belfast South', 4),
(636, 'Belfast West', 4),
(637, 'East Antrim', 4),
(638, 'East Londonderry', 4),
(639, 'Fermanagh and South Tyrone', 4),
(640, 'Foyle', 4),
(641, 'Lagan Valley', 4),
(642, 'Mid Ulster', 4),
(643, 'Newry and Armagh', 4),
(644, 'North Antrim', 4),
(645, 'North Down', 4),
(646, 'South Antrim', 4),
(647, 'South Down', 4),
(648, 'Strangford', 4),
(649, 'Upper Bann', 4),
(650, 'West Tyrone', 4);

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Election data storage table';

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`id`, `name`, `description`, `date`, `active`) VALUES
(1, 'Past Election', 'An election that happened in the past', '2016-08-03 00:00:00', 1),
(2, 'Present Election', 'An election that should be happening soon', '2017-08-09 00:00:00', 1),
(3, 'Future Election', 'An election that will happen in the future but which is not yet available to vote on', '2020-08-09 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nation`
--

CREATE TABLE `nation` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Nation list storage table';

--
-- Dumping data for table `nation`
--

INSERT INTO `nation` (`id`, `name`) VALUES
(1, 'England'),
(2, 'Scotland'),
(3, 'Wales'),
(4, 'Northern Ireland');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `name`, `description`) VALUES
(1, 'The Conservative Party', NULL),
(2, 'The Labour Party', NULL),
(3, 'The Liberal Democrat Party', NULL),
(4, 'The Green Party', NULL),
(5, 'The Monster Raving Loony Party', NULL),
(6, 'The BlackAdder Party', NULL),
(7, 'The Social Communist Party', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `constituency_id` int(10) UNSIGNED NOT NULL,
  `conf_hash` varchar(256) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User storage table';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `constituency_id`, `conf_hash`, `confirmed`, `created`, `modified`) VALUES
(1, 'User1', 'user1@test.com', 'user1', 32, '', 1, '2016-08-02 23:00:00', '2016-08-02 23:00:00'),
(2, 'User2', 'user2@test.com', 'user2', 45, '', 1, '2016-08-02 23:00:00', '2016-08-02 23:00:00'),
(3, 'User3', 'user3@test.com', 'user3', 87, '', 1, '2016-08-02 23:00:00', '2016-08-02 23:00:00'),
(4, 'User4', 'user4@test.com', 'user4', 234, '9aslds8htqhe7ff7uajwn4dfe', 0, '2016-08-02 23:00:00', '2016-08-02 23:00:00'),
(5, 'User5', 'user5@test.com', 'user5', 634, '', 1, '2017-08-07 15:53:28', '2016-08-02 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_election`
--

CREATE TABLE `user_election` (
  `voting` tinyint(1) NOT NULL,
  `election_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `candidate_id` int(10) UNSIGNED NOT NULL,
  `constituency_id` int(10) UNSIGNED NOT NULL,
  `party_id` int(10) UNSIGNED NOT NULL,
  `election_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='voting records storage table - not user id is NOT recorded';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_election_id` (`election_id`);

--
-- Indexes for table `constituency`
--
ALTER TABLE `constituency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constituency_nation_id` (`nation_id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `confirmed` (`confirmed`);

--
-- Indexes for table `user_election`
--
ALTER TABLE `user_election`
  ADD KEY `user_election_voting` (`voting`),
  ADD KEY `election_id` (`election_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `election_id` (`election_id`),
  ADD KEY `constituency_id` (`constituency_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `constituency`
--
ALTER TABLE `constituency`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;
--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nation`
--
ALTER TABLE `nation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
