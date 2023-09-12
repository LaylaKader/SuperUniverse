-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 12:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmslasuperd`
--

-- --------------------------------------------------------

--
-- Table structure for table `guessing_game`
--

CREATE TABLE `guessing_game` (
  `pic_id` int(11) NOT NULL,
  `pic_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guessing_game`
--

INSERT INTO `guessing_game` (`pic_id`, `pic_name`) VALUES
(1, 'Aquaman'),
(2, 'Batman'),
(3, 'Hulk'),
(4, 'Iron Man'),
(5, 'Scarlet Witch'),
(6, 'Spider-Man'),
(7, 'Superman'),
(8, 'The Flash'),
(9, 'Wonder Woman');

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
  `own_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `superhero_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`own_id`, `user_id`, `superhero_name`) VALUES
(1, 13, 'Batman'),
(3, 13, 'Iron Man'),
(4, 9, 'Wonder Woman'),
(5, 10, 'Superman'),
(6, 13, 'Black Widow');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `superhero_name` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`rate_id`, `user_id`, `superhero_name`, `rating`) VALUES
(1, 13, 'Batman', 4),
(2, 9, 'Batman', 5),
(3, 14, 'Batman', 5),
(4, 9, 'Iron Man', 5),
(5, 9, 'Wonder Woman', 4);

-- --------------------------------------------------------

--
-- Table structure for table `superhero`
--

CREATE TABLE `superhero` (
  `name` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `most_recent_movie` varchar(50) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `superpowers` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superhero`
--

INSERT INTO `superhero` (`name`, `company`, `score`, `cost`, `most_recent_movie`, `description`, `superpowers`) VALUES
('Aquaman', 'DC', 80, 8, 'Zack Snyder\'s Justice League (2021)', 'Created by Paul Norris and Mort Weisinger; debuted in More Fun Comics #73 (November 1941); king of Atlantis; alias of Arthur Curry', 'super strength, flight, super speed, durability, telepathic communication'),
('Batman', 'DC', 70, 7, 'The Batman (2022)', 'Created by artist Bob Kane and writer Bill Finger; debuted in the 27th issue of the comic book Detective Comics on March 30, 1939;  alias of Bruce Wayne, a wealthy American playboy, philanthropist, and industrialist who resides in Gotham City; a vigilante with a stringent moral code and strong sense of justice.', 'intelligence, weaponry, tactician, martial arts, advanced technology, wealth'),
('Black Widow', 'Marvel', 60, 6, 'Black Widow (2021)', 'Created by editor and plotter Stan Lee, scripter Don Rico, and artist Don Heck; debuted in Tales of Suspense #52 (April 1964); alias of Natasha Romanoff.', 'athleticism, gymnastic skills, acrobatic skills, aerial skills, martial arts, combatant, weaponry, hypnosis'),
('Captain America', 'Marvel', 70, 7, 'Avengers: Endgame (2019)', 'Created by cartoonists Joe Simon and Jack Kirby; debuted in  Captain America Comics #1 (cover dated March 1941) from Timely Comics; alter-ego of Steve Rogers, a patriotic supersoldier.', 'combatant, tactician, super strength, agility, athleticism, guns'),
('Cyborg', 'DC', 70, 7, '--', 'Created by writer Marv Wolfman and artist George Pérez and first appears in an insert preview in DC Comics Presents #26 (October 1980); alias of Victor Stone;', 'superhuman strength, speed, stamina, flight, superhuman vision, laser, cybernetics'),
('Doctor Strange', 'Marvel', 90, 9, 'Doctor Strange in the Multiverse of Madness (2022)', 'Created by Steve Ditko with Stan Lee, the character first appeared in Strange Tales #110 (cover-dated July 1963); known as Sorcerer Supreme; lives in  Sanctum Sanctorum.', 'mystical and the martial arts'),
('Green Arrow', 'DC', 65, 7, '--', 'Created by Mort Weisinger and designed by George Papp, he first appeared in More Fun Comics #73 in November 1941; alias of Oliver Queen', 'archery, acrobatics, martial arts, gadgetry, weaponry'),
('Hulk', 'Marvel', 75, 8, 'Avengers: Endgame (2019)', 'Created by writer Stan Lee and artist Jack Kirby; debuted in  the first issue of The Incredible Hulk (May 1962); alter-ego of Dr. Robert Bruce Banner.', 'super strength, intelligence, durability'),
('Iron Man', 'Marvel', 70, 7, 'Avengers: Endgame (2019)', 'Created by writer and editor Stan Lee, developed by scripter Larry Lieber, and designed by artists Don Heck and Jack Kirby; debuted in Tales of Suspense #39 (cover dated March 1963), and received his own title in Iron Man #1 (May 1968); alter-ego of Tony Stark, a wealthy American business magnate, playboy, philanthropist, inventor and ingenious scientist.', 'powered armor, intelligence, flight, energy beams, weaponry, advanced technology, wealth'),
('Scarlet Witch', 'Marvel', 85, 9, 'Doctor Strange in the Multiverse of Madness (2022)', 'Created by writer Stan Lee and artist Jack Kirby; her first appearance was in The X-Men #4 (March 1964); a mutant; alias of Wanda Maximoff.', 'mystical arts, energy beams, resurrection'),
('Spider-Man', 'Marvel', 80, 8, 'Spider-Man: No Way Home (2021)', 'Created by writer-editor Stan Lee and artist Steve Ditko, he first appeared in the anthology comic book Amazing Fantasy #15 (August 1962); alias of Peter Parker; lives in Queens.', 'superhuman strength, agility,  clinging to surfaces, web-shooter, spider-sense'),
('Superman', 'DC', 90, 9, 'Zack Snyder\'s Justice League (2021)', 'Created by writer Jerry Siegel and artist Joe Shuster; debuted in the comic book Action Comics #1 (cover-dated June 1938 and published April 18, 1938); born on the fictional planet Krypton and was named Kal-El; alias of Clark Kent, adopted by farmers Jonathan and Martha Kent in Smallvile; resides in Metropolis; an alien who fights evil.', 'super strength, flight, super speed, energy beams, X-ray vision, durability'),
('The Flash', 'DC', 80, 8, 'Zack Snyder\'s Justice League (2021)', 'Created by writer Gardner Fox and artist Harry Lampert; debuted in  Flash Comics #1 (cover date January 1940/release month November 1939); nicknamed the \"Scarlet Speedster\".', 'super speed, time travel, powered armor, intelligence, advanced technology'),
('Thor', 'Marvel', 80, 8, 'Avengers: Endgame (2019)', 'Based on the Norse deity of the same name; debuted in Journey into Mystery #83 (August 1962); nicknamed Asgardian God Of Thunder.', 'long life, super strength, super speed, durability, thunder, lightning, combatant, flight, energy beams, magic weaponry'),
('Wonder Woman', 'DC', 80, 8, 'Zack Snyder\'s Justice League (2021)', 'Created by American psychologist and writer William Moulton Marston (pen name: Charles Moulton), and artist Harry G. Peter; debuted in All Star Comics #8 published October 21, 1941 with her first feature in Sensation Comics #1 in January 1942; born on the island nation of Themyscira and named Princess Diana of Themyscira; alias of Diana Prince.', 'super strength, super speed, flight, combatant, magic weaponry');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ppurl` text NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `ppurl`, `points`) VALUES
(9, 'Umi', 'umi@gmail.com', '1111', '', 12),
(10, 'Rahim', 'rahim@gamil.com', '1111', '', 11),
(11, 'umiko', 'umiko@gamil.com', 'e2fc714c4727ee9395f324cd2e7f331f', '', 20),
(12, 'spiderman', 'spider@gmail.com', 'f1a81d782dea6a19bdca383bffe68452', '', 20),
(13, 'user1', 'a@b.c', '1111', '', 0),
(14, 'user2', 'b@b.b', '111', 'abc', 20),
(15, 'user3', 'a@b.e', '1234', '', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guessing_game`
--
ALTER TABLE `guessing_game`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `owns`
--
ALTER TABLE `owns`
  ADD PRIMARY KEY (`own_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `superhero_name` (`superhero_name`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `superhero_name` (`superhero_name`);

--
-- Indexes for table `superhero`
--
ALTER TABLE `superhero`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guessing_game`
--
ALTER TABLE `guessing_game`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `owns`
--
ALTER TABLE `owns`
  MODIFY `own_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `owns`
--
ALTER TABLE `owns`
  ADD CONSTRAINT `owns_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `owns_ibfk_2` FOREIGN KEY (`superhero_name`) REFERENCES `superhero` (`name`);

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`superhero_name`) REFERENCES `superhero` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
