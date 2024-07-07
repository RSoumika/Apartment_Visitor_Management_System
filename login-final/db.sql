-- Table structure for table admin
-- one person will be responsible for managing the visitor log
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(45) DEFAULT NULL,
  `username` char(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `authority` char(45) NOT NULL DEFAULT 'president',
  PRIMARY KEY (`ID`)
);

-- Default data for table 'admin'
INSERT INTO `admin` (`ID`, `AdminName`, `username`, `MobileNumber`, `Email`, `password`, `authority`)
VALUES (1, 'admin', 'admin', 123456789, 'admin@gmail.com', 'Test@123', 'president');

-- Table structure for table 'visitor'
CREATE TABLE IF NOT EXISTS `visitor` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `VisitorName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `ApartmentNumber` varchar(120) NOT NULL,
  `WhomtoMeet` varchar(120) DEFAULT NULL,
  `ReasontoMeet` varchar(120) DEFAULT NULL,
  `VisitDate` DATE NOT NULL,
  `VisitTime` TIME NOT NULL,
  `Status` ENUM('Inside', 'Outside') NOT NULL DEFAULT 'Outside',
  PRIMARY KEY (`ID`)
);

-- Dumping data for table 'visitor'
INSERT INTO `visitor` (`ID`, `VisitorName`, `MobileNumber`, `Address`, `ApartmentNumber`, `WhomtoMeet`, `ReasontoMeet`, `VisitDate`, `VisitTime`, `Status`) VALUES
(1, 'John', 9879798777, 'C-126, Kamalroad Reliance fresh', '220', 'Mr. Birijesh', 'Deliver Product', '2019-07-12', '06:11:53', 'Outside'),
(2, 'Yogesh Kumar', 6444464646, 'Harikesh Nagar Delhi', '310', 'Alok Kumar', 'Relative', '2019-06-27', '06:41:05', 'Outside'),
(3, 'Test', 4646464444, 'Sample Test', '302', 'Sanchana', 'Some Paper work', '2019-04-03', '06:42:40', 'Outside'),
(4, 'New User', 1234567890, 'New Delhi India', '1234', 'Abc', 'Personal', '2019-07-12', '15:52:09', 'Outside'),
(5, 'Amit', 1908621561, 'Aligarh Uttar Pradesh 201301', '1234', 'Anuj kumar', 'Personal', '2019-07-12', '15:56:42', 'Outside');



-- References
-- Create the residents table
CREATE TABLE IF NOT EXISTS `residents` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `ResidentName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `ApartmentNumber` varchar(120) NOT NULL,
  PRIMARY KEY (`ID`)
);

-- Insert sample data into the residents table
INSERT INTO `residents` (`ResidentName`, `MobileNumber`, `ApartmentNumber`) VALUES
('Gopi', 8894763544, 'S1'),
('Kranthi', 9384725610, 'S2'),
('Kumar Vel', 8562093745, 'S4'),
('Mounika', 6927384051, 'T2'),
('Raghu Pramodh', 5629347081, 'F4'),
('Prasad Babu', 7483920651, 'F2'),
('Nani ', 9038462751, 'F3'),
('Ranga Rao ', 9666182208, 'T4'),
('Phani', 6129483750, 'F1'),
('Sandeep', 4728391056, 'G1'),
('Sireesha', 7283945160, 'T1'),
('Ratna kumari', 3850294617, 'G2'),
('Kanaka Rao', 6495738201, 'T3');


