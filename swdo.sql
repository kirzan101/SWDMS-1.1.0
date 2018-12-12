/* Social Welfare and Development Office Management System - Canaman*/
-- A Joint Project of Ateneo De Naga University, Department of Computer Studies and the Local Government Unit of Canaman, Camarines Sur --
-- As a Complience for Capstone Project Batch 2018 --
-- Proponents: Christian Kim Escamilla, Alexis Jane Hidalgo, Mercy Palo--
-- Project Adviser: Aileen Rillion, MIM --
-- All Rights Reserved © 2018--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `swdo`
--
CREATE DATABASE IF NOT EXISTS `swdo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `swdo`;

-- List of Tables:

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(1000) NOT NULL,
  PRIMARY KEY (service_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `user_id` int(11) AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `workers` (
  `worker_id` int(11) AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_no` varchar(11) NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (worker_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `client` (
  `client_id` int(11) AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_no` varchar(15) NULL,
  `age` int(3) NULL,
  `sex` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `educ_attainment` varchar(300) NOT NULL,
  `household_id` varchar(255) NULL,
  `barangay` varchar(255) NULL,
  `status` varchar(10) NOT NULL,
  `income` varchar(15) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `position` varchar(100) NOT NULL,
  `family_head` varchar(100) NOT NULL,
  PRIMARY KEY (client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `client_general_details` (
  `client_general_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `religion` varchar(300) NULL,
  `telephone` varchar(20) NULL,
  `provincial_address` varchar(300) NULL,
  `philhealth_no` varchar(20) NULL,
  `admission` varchar(20) NULL,
  `referral1` varchar(300) NULL,
  `referral2` varchar(300) NULL,
  `referral_contact1` varchar(300) NULL,
  `referral_contact2` varchar(300) NULL,
  `house` varchar(300) NULL,
  `lot` varchar(300) NULL,
  `assestment` varchar(10000) NOT NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_general_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_general_fam` (
  `client_general_fam_id` int(11) AUTO_INCREMENT,
  `client_id` int(11)  NULL,
  `name` varchar(200) NULL,
  `fam_age` int(3) NULL,
  `fam_sex` varchar(10) NULL,
  `fam_civil_status` varchar(20) NULL,
  `relationship` varchar(300) NULL,
  `fam_educ_attainment` varchar(300) NULL,
  `fam_skills` varchar(300) NULL,
  `fam_income` varchar(15) NULL,
  `fam_no` int(5) NULL,
  `birthdates` date NULL,
  PRIMARY KEY (client_general_fam_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_solo_details` (
  `client_solo_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `income_monthly` varchar(15) NOT NULL,
  `classification` varchar(10000) NOT NULL,
  `needs` varchar(10000) NOT NULL,
  `fam_resources` varchar(10000) NOT NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_solo_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_pwd_solo` (
  `pwd_solo_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `details` varchar(100) NOT NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (pwd_solo_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_child_details` (
  `client_child_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `reffered_by` varchar(300) NOT NULL,
  `type_of_offense` varchar(300) NULL,
  `committed` varchar(20) NULL,
  `when_happened` date NULL,
  `where_happened` varchar(300) NULL,
  `to_whom` varchar(300) NULL,
  `services_rendered` varchar(10000) NOT NULL,
  `disposition` varchar(10000) NOT NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_child_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `client_training_details` (
  `client_training_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `training_needs_1` varchar(300) NULL,
  `training_needs_2` varchar(300) NULL,
  `training_needs_3` varchar(300) NULL,
  `startup_kit` varchar(300) NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_training_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `client_premarriage_details` (
  `client_premarriage_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `address_marriage` varchar(300) NOT NULL,
  `income_monthly` varchar(15) NOT NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_premarriage_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_couple` (
  `client_couple_id` int(11) AUTO_INCREMENT,
  `husband_id` int(11) NULL,
  `husband_name` varchar(300) NULL,
  `wife_id` int(11) NULL,
  `wife_name` varchar(300) NULL,
  `marriage_date` date NULL,
  `status` varchar(10) NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_couple_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_premarriage_log` (
  `client_premarriage_log_id` int(11) AUTO_INCREMENT,
  `worker_id` int(11) NOT NULL,
  `client_couple_id` int(11) NOT NULL,
  `interview_date` date NOT NULL,
  `interview_time` time NOT NULL,
  `interview_idm` int(11) NULL,
  `interview_idf` int(11) NULL,
  PRIMARY KEY (client_premarriage_log_id),
  FOREIGN KEY (client_couple_id) REFERENCES client_couple(client_couple_id),
  FOREIGN KEY (worker_id) REFERENCES workers(worker_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `client_scsr_details` (
  `client_scsr_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `background_info` varchar(10000) NOT NULL,
  `recommendation` varchar(10000) NOT NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_scsr_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `client_referral_details` (
  `client_referral_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `referral_details` varchar(1000) NOT NULL,
  `referral_letter_details` varchar(100000) NOT NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_referral_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `client_indigency_details` (
  `client_indigency_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `indigency_letter_details` varchar(100000) NOT NULL,
  `interview_id` int(11) NOT NULL,
  PRIMARY KEY (client_indigency_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `client_dwyna_details` (
  `client_dwyna_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `type_of_abuse` varchar(300) NULL,
  `parent_name` varchar(200) NULL,
  `perpetrator` varchar(300) NULL,
  `when_happened` date NULL,
  `where_happened` varchar(300) NULL,
  `services_rendered` varchar(10000) NOT NULL,
  `disposition` varchar(10000) NOT NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_dwyna_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `client_death_aid_details` (
  `client_death_aid_detail_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name_of_deceased` varchar(10000) NOT NULL,
  `interview_id` int(11) NULL,
  PRIMARY KEY (client_death_aid_detail_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id),
  FOREIGN KEY (worker_id) REFERENCES workers(worker_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `interview` (
  `interview_id` int(11) AUTO_INCREMENT,
  `worker_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `interview_date` date NOT NULL,
  `interview_time` time NOT NULL,
  PRIMARY KEY (interview_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id),
  FOREIGN KEY (worker_id) REFERENCES workers(worker_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `interview_log` (
  `interview_log_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL, 
  `service_id` int(11) NOT NULL,
  `interview_id` int(11) NOT NULL,
  PRIMARY KEY (interview_log_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id),
  FOREIGN KEY (worker_id) REFERENCES workers(worker_id),
  FOREIGN KEY (service_id) REFERENCES services(service_id),
  FOREIGN KEY (interview_id) REFERENCES interview(interview_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `assistance` (
  `assistance_id` int(11) AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL, 
  `service_id` int(11) NOT NULL,
  `interview_id` int(11) NOT NULL,
  `amount` decimal(10,2)  NULL,
  `received_date` datetime  NULL,
  PRIMARY KEY (assistance_id),
  FOREIGN KEY (client_id) REFERENCES client(client_id),
  FOREIGN KEY (service_id) REFERENCES services(service_id),
  FOREIGN KEY (interview_id) REFERENCES interview(interview_id),
  FOREIGN KEY (worker_id) REFERENCES workers(worker_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) AUTO_INCREMENT,
  `activity_date` datetime  NULL,
  `details` varchar(10000) NOT NULL,
  PRIMARY KEY (activity_log_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `barangays` (
  `barangay_id` int(11) AUTO_INCREMENT,
  `barangay` varchar(255) NOT NULL,
  PRIMARY KEY (`barangay_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `household` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` varchar(255) NULL,
  `family_head` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE `aics_counter` (
  `aics_counter_id` int(11) AUTO_INCREMENT,
  `interview_id` int(11) NOT NULL,
  PRIMARY KEY (aics_counter_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- List of INSERT VALUES:		

-- Users



INSERT INTO `users` (`username`, `password`, `user_type`, `status`)
VALUES ('admin', md5('admin'), 'A', 'ACTIVE');

INSERT INTO `users` (`username`, `password`, `user_type`, `status`)
VALUES ('MSWDO', md5('MSWDO'), 'M', 'ACTIVE');

INSERT INTO `users` (`username`, `password`, `user_type`, `status`)
VALUES ('DCW', md5('DCW'), 'D', 'ACTIVE');

INSERT INTO `users` (`username`, `password`, `user_type`, `status`)
VALUES ('aide', md5('aide'), 'AA', 'ACTIVE');

INSERT INTO `users` (`username`, `password`, `user_type`, `status`)
VALUES ('job', md5('job'), 'J', 'ACTIVE');

INSERT INTO `users` (`username`, `password`, `user_type`, `status`)
VALUES ('MSWDO2', md5('MSWDO2'), 'M2', 'ACTIVE');

INSERT INTO `users` (`username`, `password`, `user_type`, `status`)
VALUES ('job2', md5('job2'), 'J', 'ACTIVE');

-- Workers

INSERT INTO `workers` (`first_name`,`middle_name`,`last_name`,`contact_no`,`position`,`user_id`)
VALUES ('Francia', 'M.', 'Arcayera', '09500009921', 'MSWDO', 2);

INSERT INTO `workers` (`first_name`,`middle_name`,`last_name`,`contact_no`,`position`,`user_id`)
VALUES ('Clarissa', 'B.', 'Alto', '09000012345', 'SWDO II', 6);

INSERT INTO `workers` (`first_name`,`middle_name`,`last_name`,`contact_no`,`position`,`user_id`)
VALUES ('Cristy', 'P.', 'Acompanado', '09000012354', 'Admin Aide', 4);

INSERT INTO `workers` (`first_name`,`middle_name`,`last_name`,`contact_no`,`position`,`user_id`)
VALUES ('Annabel', 'S.', 'Guarin', '09000032145', 'DCW', 3);

INSERT INTO `workers` (`first_name`,`middle_name`,`last_name`,`contact_no`,`position`,`user_id`)
VALUES ('Rachel', '', 'Caudilla', '09100032145', 'Job Order', 5);

INSERT INTO `workers` (`first_name`,`middle_name`,`last_name`,`contact_no`,`position`,`user_id`)
VALUES ('Magdalena', 'C.', 'Lapiguera', '09100032145', 'Job Order', 7);

INSERT INTO `workers` (`first_name`,`middle_name`,`last_name`,`contact_no`,`position`,`user_id`)
VALUES ('Admin', 'A', 'Admin', '09503936974', 'Admin', 1);

-- Services

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (1, 'Burial Assistance');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (2, 'Educational Assistance');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (3, 'Food Assistance');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (4, 'Medical Assistance');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (5, 'Transportation Assistance');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (6, 'Children in Conflict with the Law');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (7, 'Welfare of Socially Disadvantaged Women, Youth, and other needy Adult');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (8, 'Pre-marriage Counseling');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (9, 'Solo Parent and Persons with Disability ID');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (10, 'Death Aid of Senior Citizen & Persons with Disability');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (11, 'Livelihood Assistance');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (12, 'Referral Letter to other Agencies');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (13, 'Social Case Study Report');

INSERT INTO `services` (`service_id`, `service_name`)
VALUES (14, 'Certificate of Indigency');

-- Insert Barangay

INSERT INTO `barangays` (`barangay`)
VALUES ('Baras');

INSERT INTO `barangays` (`barangay`)
VALUES ('Del Rosario');

INSERT INTO `barangays` (`barangay`)
VALUES ('Dinaga');

INSERT INTO `barangays` (`barangay`)
VALUES ('Fundado');

INSERT INTO `barangays` (`barangay`)
VALUES ('Haring');

INSERT INTO `barangays` (`barangay`)
VALUES ('Iquin');

INSERT INTO `barangays` (`barangay`)
VALUES ('Linaga');

INSERT INTO `barangays` (`barangay`)
VALUES ('Mangayawan');

INSERT INTO `barangays` (`barangay`)
VALUES ('Palo');

INSERT INTO `barangays` (`barangay`)
VALUES ('Pangpang');

INSERT INTO `barangays` (`barangay`)
VALUES ('Poro');

INSERT INTO `barangays` (`barangay`)
VALUES ('San Agustin');

INSERT INTO `barangays` (`barangay`)
VALUES ('San Francisco');

INSERT INTO `barangays` (`barangay`)
VALUES ('San Jose East');

INSERT INTO `barangays` (`barangay`)
VALUES ('San Jose West');

INSERT INTO `barangays` (`barangay`)
VALUES ('San Juan');

INSERT INTO `barangays` (`barangay`)
VALUES ('San Nicolas');

INSERT INTO `barangays` (`barangay`)
VALUES ('San Roque');

INSERT INTO `barangays` (`barangay`)
VALUES ('San Vicente');

INSERT INTO `barangays` (`barangay`)
VALUES ('Santa Cruz');

INSERT INTO `barangays` (`barangay`)
VALUES ('Santa Teresita');

INSERT INTO `barangays` (`barangay`)
VALUES ('Sua');
 
INSERT INTO `barangays` (`barangay`)
VALUES ('Talidtid');

INSERT INTO `barangays` (`barangay`)
VALUES ('Tibgao');
