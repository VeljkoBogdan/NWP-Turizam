-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 05:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bogdan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id_agency` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_information` varchar(255) NOT NULL DEFAULT 'Not set',
  `website` varchar(255) NOT NULL DEFAULT 'Not set',
  `operating_hours` varchar(255) NOT NULL DEFAULT 'Unknown',
  `establishment_date` varchar(255) NOT NULL DEFAULT 'Unknown',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_info_hidden` int(32) NOT NULL DEFAULT 0,
  `is_banned` int(32) NOT NULL DEFAULT 0,
  `verification_id` varchar(255) NOT NULL,
  `verification_status` int(32) NOT NULL DEFAULT 0,
  `is_enabled` int(32) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id_agency`, `name`, `address`, `contact_information`, `website`, `operating_hours`, `establishment_date`, `email`, `password`, `is_info_hidden`, `is_banned`, `verification_id`, `verification_status`, `is_enabled`) VALUES
(1, 'City Tours Co.', '123 Main Street, Cityville', '+123-456-7890', 'www.citytoursco.com', 'Mon-Fri: 9am-6pm', '2022-01-01', '', '', 1, 0, '', 0, 0),
(2, 'Adventure Explorers', '456 Adventure Avenue, Outdoor City', '+987-654-3210', 'www.adventureexplorers.com', 'Mon-Sun: 8am-8pm', '2021-03-15', '', '', 1, 0, '', 0, 0),
(3, 'Urban Travel Hub', '789 Downtown Plaza, Metropolis', '+456-789-0123', 'www.urbantravelhub.com', 'Tue-Sat: 10am-7pm', '2020-07-22', '', '', 1, 0, '', 0, 0),
(4, 'Nature Wanderlust', '321 Nature Lane, Green Valley', '+789-012-3456', 'www.naturewanderlust.com', 'Mon-Sun: 9am-5pm', '2019-05-10', '', '', 1, 0, '', 0, 0),
(5, 'Cultural Connections', '567 Heritage Street, Historical Town', '+234-567-8901', 'www.culturalconnections.com', 'Wed-Mon: 11am-8pm', '2020-11-30', '', '', 1, 0, '', 0, 0),
(6, 'Sky High Adventures', '890 Skyview Road, Sky City', '+345-678-9012', 'www.skyhighadventures.com', 'Thu-Sat: 12pm-10pm', '2021-09-18', '', '', 1, 0, '', 0, 0),
(7, 'Seafront Escapes', '432 Oceanfront Drive, Coastal Village', '+678-901-2345', 'www.seafrontescapes.com', 'Mon-Sun: 8am-6pm', '2018-12-05', '', '', 1, 0, '', 0, 0),
(8, 'Historical Journeys Ltd.', '654 Past Lane, Old Town', '+901-234-5678', 'www.historicaljourneys.com', 'Tue-Fri: 10am-5pm', '2019-08-14', '', '', 1, 0, '', 0, 0),
(9, 'Mountain Majesty Tours', '789 Summit Trail, Alpine City', '+345-678-9012', 'www.mountainmajesty.com', 'Mon-Sat: 9am-7pm', '2020-02-28', '', '', 1, 0, '', 0, 0),
(10, 'City Lights Expeditions', '876 Downtown Boulevard, Nightfall City', '+567-890-1234', 'www.citylightsexpeditions.com', 'Wed-Sun: 7pm-2am', '2021-06-09', '', '', 1, 0, '', 0, 0),
(11, 'Safari Adventures Ltd.', '210 Safari Park Road, Wild Reserve', '+123-456-7890', 'www.safariadventures.com', 'Mon-Sun: 8am-6pm', '2018-10-03', '', '', 1, 0, '', 0, 0),
(12, 'Snowy Peaks Tours', '543 Alpine Avenue, Snowville', '+789-012-3456', 'www.snowypeakstours.com', 'Fri-Sun: 10am-4pm', '2019-04-21', '', '', 1, 0, '', 0, 0),
(13, 'Sunset Cruises Co.', '876 Pier Drive, Coastal Harbor', '+234-567-8901', 'www.sunsetcruises.com', 'Tue-Sat: 5pm-10pm', '2020-04-12', '', '', 1, 0, '', 0, 0),
(14, 'City Biking Adventures', '321 Bike Lane, Cyclist City', '+901-234-5678', 'www.citybikingadventures.com', 'Mon-Sun: 8am-7pm', '2019-12-01', '', '', 1, 0, '', 0, 0),
(15, 'Historic Homes Tours', '654 Heritage Lane, Vintage Village', '+345-678-9012', 'www.historichomestours.com', 'Thu-Mon: 11am-6pm', '2021-01-25', '', '', 1, 0, '', 0, 0),
(16, 'Tropical Getaways Ltd.', '543 Palm Beach Road, Island Paradise', '+567-890-1234', 'www.tropicalgetaways.com', 'Mon-Sun: 9am-8pm', '2020-06-30', '', '', 1, 0, '', 0, 0),
(17, 'Wine Country Tours', '210 Vineyard Lane, Winery Valley', '+123-456-7890', 'www.winecountrytours.com', 'Fri-Sun: 12pm-5pm', '2018-07-17', '', '', 1, 0, '', 0, 0),
(18, 'Hidden Treasures Expeditions', '876 Secret Street, Enigma City', '+789-012-3456', 'www.hiddentreasures.com', 'Wed-Sat: 10am-6pm', '2019-10-08', '', '', 1, 0, '', 0, 0),
(19, 'Green Thumb Travels', '432 Garden Avenue, Botanical Town', '+234-567-8901', 'www.greenthumbtravels.com', 'Tue-Fri: 9am-4pm', '2020-03-07', '', '', 1, 0, '', 0, 0),
(20, 'Highland Hiking Tours', '567 Mountain Trail, Highland Village', '+901-234-5678', 'www.highlandhiking.com', 'Mon-Sat: 7am-6pm', '2021-04-14', '', '', 1, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `description`) VALUES
(1, 'Historical Landmarks', 'Explore the rich history of the city through its iconic landmarks and monuments.'),
(2, 'Museums and Galleries', 'Immerse yourself in art, culture, and history at the city’s museums and galleries.'),
(3, 'Parks and Gardens', 'Enjoy the beauty of nature in the city’s parks, gardens, and green spaces.'),
(4, 'Architectural Wonders', 'Marvel at the city’s architectural masterpieces and modern skyscrapers.'),
(5, 'Cultural Festivals', 'Experience the vibrant cultural scene through local festivals and events.'),
(6, 'Shopping Districts', 'Shop for unique souvenirs and trendy items in the city’s bustling shopping districts.'),
(7, 'Culinary Delights', 'Indulge in the local cuisine at the city’s best restaurants and food markets.'),
(8, 'Outdoor Adventures', 'Embark on thrilling outdoor activities and adventures in and around the city.'),
(9, 'Nightlife Hotspots', 'Discover the city’s vibrant nightlife with trendy bars, clubs, and live music venues.'),
(10, 'Beaches and Waterfronts', 'Relax on beautiful beaches and enjoy scenic views along the waterfront.'),
(11, 'Family-Friendly Attractions', 'Plan family-friendly outings to amusement parks, zoos, and kid-friendly attractions.'),
(12, 'Art and Street Performances', 'Witness live performances, street art, and entertainment throughout the city.'),
(13, 'Science and Technology Centers', 'Explore interactive exhibits and cutting-edge technology at science centers.'),
(14, 'Religious and Spiritual Sites', 'Visit historic churches, temples, mosques, and other spiritual landmarks.'),
(15, 'City Tours and Sightseeing', 'Discover the city’s highlights with guided tours and sightseeing adventures.'),
(16, 'Sports and Recreation', 'Engage in sports and recreational activities in the city’s parks and facilities.'),
(17, 'Hidden Gems', 'Uncover lesser-known gems and off-the-beaten-path attractions in the city.'),
(18, 'Scenic Views and Lookouts', 'Capture breathtaking views of the city from scenic viewpoints and lookouts.'),
(19, 'Local Markets', 'Experience the local culture and flavors at bustling markets and street vendors.'),
(20, 'Educational Institutions', 'Visit universities, libraries, and educational institutions for knowledge and history.');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id_city` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `population` int(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `timezone` varchar(32) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `latitude` varchar(32) NOT NULL,
  `longitude` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id_city`, `name`, `country`, `population`, `region`, `timezone`, `image`, `latitude`, `longitude`) VALUES
(21, 'Tokyo', 'Japan', 37393000, 'Asia', 'Asia/Tokyo', NULL, '35.6895', '139.6917'),
(22, 'Delhi', 'India', 30252000, 'Asia', 'Asia/Kolkata', NULL, '28.6139', '77.2090'),
(23, 'Shanghai', 'China', 27058000, 'Asia', 'Asia/Shanghai', NULL, '31.2304', '121.4737'),
(24, 'Sao Paulo', 'Brazil', 21399392, 'South America', 'America/Sao_Paulo', NULL, '-23.5505', '-46.6333'),
(25, 'Mumbai', 'India', 23355000, 'Asia', 'Asia/Kolkata', NULL, '19.0760', '72.8777'),
(26, 'Mexico City', 'Mexico', 21782378, 'North America', 'America/Mexico_City', NULL, '19.4326', '-99.1332'),
(27, 'Beijing', 'China', 21700000, 'Asia', 'Asia/Shanghai', NULL, '39.9042', '116.4074'),
(28, 'Osaka', 'Japan', 19128300, 'Asia', 'Asia/Tokyo', NULL, '34.6937', '135.5023'),
(29, 'Cairo', 'Egypt', 20076000, 'Africa', 'Africa/Cairo', NULL, '30.0444', '31.2357'),
(30, 'New York City', 'United States', 18713220, 'North America', 'America/New_York', NULL, '40.7128', '-74.0060'),
(31, 'Karachi', 'Pakistan', 16367000, 'Asia', 'Asia/Karachi', NULL, '24.8607', '67.0011'),
(32, 'Chongqing', 'China', 16568000, 'Asia', 'Asia/Chongqing', NULL, '29.4316', '106.9123'),
(33, 'Istanbul', 'Turkey', 15029231, 'Europe', 'Europe/Istanbul', NULL, '41.0082', '28.9784'),
(34, 'Lahore', 'Pakistan', 13376000, 'Asia', 'Asia/Karachi', NULL, '31.5204', '74.3587'),
(35, 'Lima', 'Peru', 10110000, 'South America', 'America/Lima', NULL, '-12.0464', '-77.0428'),
(36, 'Bangkok', 'Thailand', 10115800, 'Asia', 'Asia/Bangkok', NULL, '13.7563', '100.5018'),
(37, 'London', 'United Kingdom', 9304016, 'Europe', 'Europe/London', NULL, '51.5074', '-0.1278'),
(38, 'Bogota', 'Colombia', 7437179, 'South America', 'America/Bogota', NULL, '4.7110', '-74.0721'),
(39, 'Lagos', 'Nigeria', 14958000, 'Africa', 'Africa/Lagos', NULL, '6.5244', '3.3792'),
(40, 'Rio de Janeiro', 'Brazil', 13260000, 'South America', 'America/Sao_Paulo', NULL, '-22.9068', '-43.1729'),
(41, 'Manila', 'Philippines', 13923452, 'Asia', 'Asia/Manila', NULL, '14.5995', '120.9842'),
(42, 'Kinshasa', 'Democratic Republic of the Congo', 135171000, 'Africa', 'Africa/Kinshasa', NULL, '-4.4419', '15.2663'),
(43, 'Tianjin', 'China', 13215000, 'Asia', 'Asia/Shanghai', NULL, '39.0842', '117.2008'),
(44, 'Guangzhou', 'China', 13080500, 'Asia', 'Asia/Shanghai', NULL, '23.1291', '113.2644'),
(45, 'Bangalore', 'India', 12651000, 'Asia', 'Asia/Kolkata', NULL, '12.9716', '77.5946'),
(46, 'Chennai', 'India', 10971074, 'Asia', 'Asia/Kolkata', NULL, '13.0827', '80.2707'),
(47, 'Ho Chi Minh City', 'Vietnam', 8921000, 'Asia', 'Asia/Ho_Chi_Minh', NULL, '10.7769', '106.7009'),
(48, 'Hyderabad', 'India', 9792100, 'Asia', 'Asia/Kolkata', NULL, '17.3850', '78.4867'),
(49, 'Wuhan', 'China', 10233000, 'Asia', 'Asia/Shanghai', NULL, '30.5928', '114.3055'),
(50, 'Luanda', 'Angola', 9875000, 'Africa', 'Africa/Luanda', NULL, '-8.8383', '13.2344'),
(51, 'Ahmedabad', 'India', 7906700, 'Asia', 'Asia/Kolkata', NULL, '23.0225', '72.5714'),
(52, 'Kolkata', 'India', 7807000, 'Asia', 'Asia/Kolkata', NULL, '22.5726', '88.3639'),
(53, 'Nairobi', 'Kenya', 4397073, 'Africa', 'Africa/Nairobi', NULL, '-1.286389', '36.817223'),
(54, 'Paris', 'France', 2190327, 'Europe', 'Europe/Paris', NULL, '48.8566', '2.3522'),
(55, 'Los Angeles', 'United States', 3990456, 'North America', 'America/Los_Angeles', NULL, '34.0522', '-118.2437'),
(56, 'Belgrade', 'Serbia', 1233795, 'Europe', 'Europe/Belgrade', NULL, '44.7866', '20.4489'),
(57, 'Novi Sad', 'Serbia', 341625, 'Europe', 'Europe/Belgrade', NULL, '45.2671', '19.8335'),
(58, 'Niš', 'Serbia', 183544, 'Europe', 'Europe/Belgrade', NULL, '43.3194', '21.8967'),
(59, 'Kragujevac', 'Serbia', 179417, 'Europe', 'Europe/Belgrade', NULL, '44.0128', '20.9176'),
(60, 'Subotica', 'Serbia', 105681, 'Europe', 'Europe/Belgrade', NULL, '46.1008', '19.6670'),
(61, 'Zrenjanin', 'Serbia', 132051, 'Europe', 'Europe/Belgrade', NULL, '45.3816', '20.3825'),
(62, 'Pančevo', 'Serbia', 123414, 'Europe', 'Europe/Belgrade', NULL, '44.8700', '20.6401'),
(63, 'Čačak', 'Serbia', 117072, 'Europe', 'Europe/Belgrade', NULL, '43.8910', '20.3498'),
(64, 'Novi Pazar', 'Serbia', 123588, 'Europe', 'Europe/Belgrade', NULL, '43.1370', '20.5139'),
(65, 'Kraljevo', 'Serbia', 125488, 'Europe', 'Europe/Belgrade', NULL, '43.7294', '20.6860'),
(66, 'Smederevo', 'Serbia', 107528, 'Europe', 'Europe/Belgrade', NULL, '44.6642', '20.9271'),
(67, 'Valjevo', 'Serbia', 90489, 'Europe', 'Europe/Belgrade', NULL, '44.2664', '19.8730'),
(68, 'Vranje', 'Serbia', 80471, 'Europe', 'Europe/Belgrade', NULL, '42.5511', '21.8964'),
(69, 'Užice', 'Serbia', 71807, 'Europe', 'Europe/Belgrade', NULL, '43.8560', '19.8445'),
(70, 'Šabac', 'Serbia', 53480, 'Europe', 'Europe/Belgrade', NULL, '44.7489', '19.7050'),
(71, 'Požarevac', 'Serbia', 44704, 'Europe', 'Europe/Belgrade', NULL, '44.6214', '21.1877'),
(72, 'Leskovac', 'Serbia', 144206, 'Europe', 'Europe/Belgrade', NULL, '42.9976', '21.9440'),
(73, 'Kruševac', 'Serbia', 128752, 'Europe', 'Europe/Belgrade', NULL, '43.5814', '21.3305'),
(74, 'Sombor', 'Serbia', 47189, 'Europe', 'Europe/Belgrade', NULL, '45.7744', '19.1125'),
(75, 'Jagodina', 'Serbia', 72092, 'Europe', 'Europe/Belgrade', NULL, '43.9755', '21.2572'),
(76, 'Zaječar', 'Serbia', 44085, 'Europe', 'Europe/Belgrade', NULL, '43.9019', '22.2763'),
(77, 'Prokuplje', 'Serbia', 44704, 'Europe', 'Europe/Belgrade', NULL, '43.2349', '21.5939'),
(78, 'Sremska Mitrovica', 'Serbia', 37296, 'Europe', 'Europe/Belgrade', NULL, '44.9790', '19.6218'),
(79, 'Bačka Palanka', 'Serbia', 54615, 'Europe', 'Europe/Belgrade', NULL, '45.2534', '19.2342'),
(80, 'Kikinda', 'Serbia', 37718, 'Europe', 'Europe/Belgrade', NULL, '45.8304', '20.4658'),
(81, 'Negotin', 'Serbia', 18421, 'Europe', 'Europe/Belgrade', NULL, '44.2265', '22.5301'),
(82, 'Pirot', 'Serbia', 38122, 'Europe', 'Europe/Belgrade', NULL, '43.1500', '22.5879'),
(83, 'Bor', 'Serbia', 48150, 'Europe', 'Europe/Belgrade', NULL, '44.0719', '22.0976'),
(84, 'Vršac', 'Serbia', 35415, 'Europe', 'Europe/Belgrade', NULL, '45.1194', '21.3019'),
(85, 'Loznica', 'Serbia', 73579, 'Europe', 'Europe/Belgrade', NULL, '44.5346', '19.2310'),
(86, 'test', 'test', 300, 'test', 'test', 'Error during check!', '20', '20');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id_favorite` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `id_city` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id_favorite`, `id_user`, `id_city`) VALUES
(1, 4, 28),
(2, 4, 28),
(3, 4, 28),
(4, 4, 28),
(5, 4, 28),
(6, 4, 21);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_sights`
--

CREATE TABLE `favorite_sights` (
  `id_favorite` int(32) NOT NULL,
  `id_sight` int(32) NOT NULL,
  `id_user` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite_sights`
--

INSERT INTO `favorite_sights` (`id_favorite`, `id_sight`, `id_user`) VALUES
(1, 4, 1),
(2, 4, 4),
(3, 4, 7),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sights`
--

CREATE TABLE `sights` (
  `id_sight` int(32) NOT NULL,
  `id_city` int(32) NOT NULL,
  `id_agency` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `hours` varchar(32) NOT NULL,
  `fee` varchar(32) NOT NULL DEFAULT 'No fee',
  `image` varchar(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'Unkown / Contact for more info',
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `times_searched` int(255) NOT NULL DEFAULT 0,
  `times_clicked` int(255) NOT NULL DEFAULT 0,
  `id_category` int(32) NOT NULL,
  `indoors_outdoors` varchar(32) NOT NULL DEFAULT 'indoors',
  `wifi` varchar(32) NOT NULL DEFAULT 'No',
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sights`
--

INSERT INTO `sights` (`id_sight`, `id_city`, `id_agency`, `name`, `address`, `hours`, `fee`, `image`, `contact_info`, `status`, `latitude`, `longitude`, `times_searched`, `times_clicked`, `id_category`, `indoors_outdoors`, `wifi`, `description`) VALUES
(1, 57, 2, 'Test1', 'Test`', '8am-3pm', '0', '0', 'Test', 'open', '20', '20', 0, 2, 5, 'Outdoors', 'yes', 'Test description'),
(2, 24, 5, 'efefe', 'fefefe', 'fefef', 'fefef', '0', 'fefef', 'open', '20', '20', 0, 1, 10, 'Outdoors', 'yes', 'fefefeef'),
(3, 21, 1, 'f', 'f', 'f', 'f', '0', 'f', 'open', '20', '20', 0, 1, 1, 'Outdoors', 'yes', 'fefe'),
(4, 21, 1, 'test', '1', '1', '1', '0', 'f', 'open', '20', '20', 0, 0, 1, 'Outdoors', 'yes', 'f'),
(5, 21, 1, 'test', '1', '1', '1', '0', 'f', 'open', '20', '20', 0, 0, 1, 'Outdoors', 'yes', 'f'),
(6, 21, 1, 'f', 'f', 'f', 'f', '0', 'f', 'open', '20', '20', 0, 1, 1, 'Outdoors', 'yes', 'htht'),
(7, 21, 1, 'fefe', 'fefe', 'fefe', 'fef', '0', 'fefe', 'open', '20', '20', 0, 1, 1, 'Outdoors', 'yes', 'fefefef'),
(8, 21, 1, 'f', 'f', 'f', 'f', 'uploads/1706445885-9877.png', 'f', 'open', '20', '20', 0, 3, 1, 'Outdoors', 'yes', 'fefefe'),
(9, 21, 1, 'test', 'Test`', 'test', 'test', 'uploads/1706451062-3371.webp', 'test', 'open', '10', '10', 0, 1, 8, 'Indoors', 'yes', 'test'),
(10, 74, 1, 'f', 'd', 'd', 'f', 'Error during check!', 'f', 'open', '10', '10', 0, 1, 1, 'Outdoors', 'yes', 'fef'),
(13, 21, 23, 'test', 'test', 'f', 'f', 'Error during check!', 'f', 'closed', '20', '20', 0, 4, 8, 'Outdoors', 'no', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_banned` int(32) NOT NULL DEFAULT 0,
  `verification_id` varchar(255) NOT NULL,
  `verification_status` varchar(255) NOT NULL DEFAULT '0',
  `id_user` int(255) NOT NULL,
  `is_admin` int(8) NOT NULL DEFAULT 0,
  `is_agency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `is_banned`, `verification_id`, `verification_status`, `id_user`, `is_admin`, `is_agency`) VALUES
('veljko', 'bogdan', 'veljko@mail.com', '$2y$10$EL2meKioWEeHTUVWsIuRS.NIYPI5P6AI2F.8AURGEvK9swWcBgiZO', 0, 'ac1ba21be45a66f6d610166384aee97f', '0', 1, 0, 0),
('veljko', 'bogdan', 'action@dr.com', '$2y$10$JOUJmj60Ti7WnUd3oJh9COuDocoym7DGmZNCYQnH5cqJ1a3vYQveO', 0, '440a93563fcdbe3e5f221e38fae7fd62', '1', 5, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id_agency`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id_favorite`);

--
-- Indexes for table `favorite_sights`
--
ALTER TABLE `favorite_sights`
  ADD PRIMARY KEY (`id_favorite`);

--
-- Indexes for table `sights`
--
ALTER TABLE `sights`
  ADD PRIMARY KEY (`id_sight`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id_agency` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id_city` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id_favorite` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favorite_sights`
--
ALTER TABLE `favorite_sights`
  MODIFY `id_favorite` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sights`
--
ALTER TABLE `sights`
  MODIFY `id_sight` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
