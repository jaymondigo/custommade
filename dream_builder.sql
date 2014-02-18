-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2014 at 10:42 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dream_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_status`
--

CREATE TABLE IF NOT EXISTS `account_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`id`, `status`) VALUES
(1, 'Open'),
(2, 'Locked'),
(3, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE IF NOT EXISTS `account_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `type`) VALUES
(1, 'Dreamer'),
(2, 'Supplier'),
(3, 'Engineer'),
(4, 'Architect');

-- --------------------------------------------------------

--
-- Table structure for table `house_designs`
--

CREATE TABLE IF NOT EXISTS `house_designs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`account_id`),
  KEY `account_idx` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `name` text,
  `stocks` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `height` double DEFAULT NULL,
  `width` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `material_supplier_idx` (`supplier`),
  KEY `material_type_idx` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `product_id`, `supplier`, `name`, `stocks`, `price`, `type`, `height`, `width`, `created_at`, `updated_at`) VALUES
(1, '80801270', 1, 'Hallow Blocks', 2147483647, 100, 1, 100, 200, '2014-01-05 00:00:00', '2014-01-05 00:00:00'),
(2, '0998098789', 2, 'Cement', 9900, 200, 2, NULL, NULL, '2014-01-05 00:00:00', '2014-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `material_types`
--

CREATE TABLE IF NOT EXISTS `material_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `material_types`
--

INSERT INTO `material_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'solid', '2014-01-05 00:00:00', '2014-01-05 00:00:00'),
(2, 'liquid', '2014-01-05 00:00:00', '2014-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` enum('profile_picture','file','image_attachment','') DEFAULT NULL,
  `owner` int(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `name`, `type`, `owner`, `url`, `slug`, `caption`, `description`, `link`, `created_at`, `updated_at`) VALUES
(1, 'arnel', 'profile_picture', 8, 'http://localhost/dream-builder/public/assets/medias/profile/small/arnel.jpg', 'arnel.jpg', 'arnel', 'arnel', '', '2014-01-05 00:00:00', '2014-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `owner`) VALUES
(1, 'jillberth', 'jillberth@dreambuilder.com', 4),
(2, 'Archie', 'archie@dreambuilder.com', 4),
(3, 'Angeline', 'angeline@dreambuilder.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_branch`
--

CREATE TABLE IF NOT EXISTS `suppliers_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `location` text,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `contact_number` varchar(45) DEFAULT NULL,
  `contact_person` text,
  `contact_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`supplier_id`),
  KEY `supplier_idx` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suppliers_branch`
--

INSERT INTO `suppliers_branch` (`id`, `supplier_id`, `location`, `longitude`, `latitude`, `contact_number`, `contact_person`, `contact_email`) VALUES
(1, 1, 'Cebu City', 1000, 200, '7399810', 'Jillberth Estillore', 'jillberth.estillore@gmail.com'),
(2, 2, 'Mandaue City', 121, 21, '5433899', 'Arnel T. Lenteria', 'arnel.lenteria@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthdate` date NOT NULL,
  `type` int(11) DEFAULT '5',
  `status` int(11) DEFAULT '2',
  `last_signin` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_type_idx` (`type`),
  KEY `account_status_idx` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `gender`, `birthdate`, `type`, `status`, `last_signin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'dreamer', 'dreamer@dreambuildersolutions.com', '$2y$08$c8oQszncUz7ADUEYLaFJj.NbnzHqsupQzBae4oK4h.LxbZHMQkzXC', 'Dreamer', 'Builder', 1, '2013-11-21', 1, 1, '2013-11-27 00:00:00', NULL, NULL, '0000-00-00 00:00:00'),
(5, '', 'architect@dreambuildersolutions.com', '$2y$08$c8oQszncUz7ADUEYLaFJj.NbnzHqsupQzBae4oK4h.LxbZHMQkzXC', 'Architect', 'Builder', 2, '2013-11-18', 4, 1, '2013-11-21 00:00:00', NULL, NULL, '0000-00-00 00:00:00'),
(6, '', 'engineer@dreambuildersolutions.com', '$2y$08$c8oQszncUz7ADUEYLaFJj.NbnzHqsupQzBae4oK4h.LxbZHMQkzXC', 'Engineer', 'Builder', 1, '2013-11-10', 3, 1, '2013-11-19 00:00:00', NULL, NULL, '0000-00-00 00:00:00'),
(7, '', 'supplier@dreambuildersolutions.com', '$2y$08$c8oQszncUz7ADUEYLaFJj.NbnzHqsupQzBae4oK4h.LxbZHMQkzXC', 'Supplier', 'Builder', 1, '2013-11-20', 2, 1, '2013-11-27 00:00:00', NULL, NULL, '0000-00-00 00:00:00'),
(8, '', 'arnel.lenteria@gmail.com', '$2y$08$jII32NEjqDrcojVQdNBo4uibyYTz.qBjZOcNjLbgNx5dof5iQtylC', 'Arnel', 'Lenteria', 0, '0000-00-00', 1, 2, '0000-00-00 00:00:00', '2013-12-31 05:37:39', '2013-12-31 05:37:39', '0000-00-00 00:00:00'),
(9, '', 'lenteria.arnel2010@yahoo.com', '$2y$08$He5xxVj7M1dlOL.NoTFYnumdV39c5.hOkz3TNkLvJoa/Gb.eaJHO.', 'Arnel', 'Lenteria', 0, '0000-00-00', 3, 2, '0000-00-00 00:00:00', '2013-12-31 05:38:47', '2013-12-31 05:38:47', '0000-00-00 00:00:00'),
(10, '', 'arnel.lenteria@gmail.com2', '$2y$08$ob4IlbszMXDuOKt5fDK40OedczF71dFp1XaK.fqv5kKPlApBzVh.q', 'Arnel', 'Lenteria', 0, '0000-00-00', 1, 2, '0000-00-00 00:00:00', '2013-12-31 11:02:11', '2013-12-31 11:02:11', '0000-00-00 00:00:00'),
(11, '', 'dreamer@dreambuildersolutions.com', 'dreambuilder', '', '', 0, '0000-00-00', 1, 2, '0000-00-00 00:00:00', NULL, NULL, '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `house_designs`
--
ALTER TABLE `house_designs`
  ADD CONSTRAINT `design_ownder` FOREIGN KEY (`account_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `material_supplier` FOREIGN KEY (`supplier`) REFERENCES `suppliers_branch` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `material_type` FOREIGN KEY (`type`) REFERENCES `material_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `owner` FOREIGN KEY (`owner`) REFERENCES `users` (`id`);

--
-- Constraints for table `suppliers_branch`
--
ALTER TABLE `suppliers_branch`
  ADD CONSTRAINT `supplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `account_status` FOREIGN KEY (`status`) REFERENCES `account_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `account_type` FOREIGN KEY (`type`) REFERENCES `account_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
