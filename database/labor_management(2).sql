-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 01:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labor_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Attendance_Id` int(11) NOT NULL,
  `Employee_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Clock_In_Time` time NOT NULL,
  `Clock_Out_Time` time NOT NULL,
  `Total_Hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Attendance_Id`, `Employee_Id`, `Date`, `Clock_In_Time`, `Clock_Out_Time`, `Total_Hours`) VALUES
(2, 3, '2024-04-01', '08:00:00', '13:00:00', 6),
(3, 2, '2024-04-04', '07:30:00', '00:30:00', 5),
(4, 4, '2023-03-17', '06:00:00', '16:00:00', 8),
(5, 15, '2020-02-25', '09:00:00', '14:00:00', 7),
(12, 17, '2015-03-03', '10:00:00', '15:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `Benefit_Id` int(11) NOT NULL,
  `Employee_Id` int(11) DEFAULT NULL,
  `Health_Insurance` varchar(150) NOT NULL,
  `Retirement_Plans` varchar(350) NOT NULL,
  `Other_Benefits` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`Benefit_Id`, `Employee_Id`, `Health_Insurance`, `Retirement_Plans`, `Other_Benefits`) VALUES
(1, 1, 'Medical Plus', 'Profit-Sharing Plans', 'Flexible Spending Account, Dental Insurance, Vision Coverage'),
(2, 2, 'HealthGuard', 'Pension Plan', 'Life Insurance, Employee Assistance Program, Wellness Program'),
(3, 5, 'Blue Cross', 'Individual Retirement Account', 'Paid Time Off, Tuition Reimbursement, Commuter Benefits'),
(4, 4, 'Aetna', 'Retirement Savings Plan', 'Stock Options, Fitness Subsidy, Legal Assistance'),
(5, 3, 'UnitedHealthcare', 'Defined Benefit Plan', 'Childcare Assistance, Disability Insurance, Travel Benefits'),
(6, 2, 'MISUR', 'fINALLY', 'Medical insurance,school fees'),
(7, 2, 'Mituelle de sante', 'ejoheza', 'food,medical insurance,school fees'),
(9, 3, 'EMMI', 'An oldest person', 'free tower');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_Id` int(11) NOT NULL,
  `First_Name` varchar(250) DEFAULT NULL,
  `Last_Name` varchar(200) DEFAULT NULL,
  `Date_Of_Birth` date DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `Contact_Information` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_Id`, `First_Name`, `Last_Name`, `Date_Of_Birth`, `Position`, `Department`, `Contact_Information`) VALUES
(1, 'John', 'Doe', '1990-01-15', 'Manager', 'IT', '072333344456'),
(2, 'Jane', 'Smith', '2000-05-22', 'Developer', 'Engineering', '07767676767'),
(3, 'Mike', 'Johnson', '1983-08-10', 'Analyst', 'Finance', '078333444555'),
(4, 'Emily', 'Williams', '2001-03-18', 'Designer', 'Marketing', '07934344445'),
(5, 'Chris', 'Anderson', '1995-11-25', 'Engineer', 'IT', '07811112222'),
(8, 'francoics', 'habumugisha', '2000-12-12', 'asdfghjk', 'xcvbnm,', '123456'),
(11, 'Nizeyimana', 'Maurice', '2002-07-25', 'qwertyui', 'IT', '1234567890'),
(13, 'Pauchetino', 'Mauricial', '2002-07-25', 'Manager', 'IT', '1234567890'),
(15, 'Nizeyimana', 'Maurice', '2002-07-27', 'manager', 'it', '123456789'),
(17, 'Mukamana', 'Clementine', '2000-09-27', 'MANAGER', 'HUMAN RESOURCE MANAGEMENT', '0781234566'),
(20, 'MUGISHA', 'Kevin', '2024-04-25', 'Manager', 'ADMINISTRATION', '+250 788812345'),
(23, 'GASANA', 'Chalres', '2024-04-25', 'MANAGER', 'ACCCOUNTING', '+250 1234567');

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `Request_Id` int(11) NOT NULL,
  `Employee_Id` int(11) DEFAULT NULL,
  `Leave_Type` varchar(120) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`Request_Id`, `Employee_Id`, `Leave_Type`, `Start_Date`, `End_Date`, `Status`) VALUES
(1, 4, 'Vacation', '2020-01-01', '2020-01-07', 'Pending'),
(2, 1, 'Sick Leave', '2023-02-10', '2023-02-12', 'Approved'),
(3, 3, 'Personal Leave', '2019-03-15', '2019-03-18', 'Pending'),
(4, 2, 'Maternity Leave', '2022-04-20', '2022-05-05', 'Pending'),
(5, 5, 'Business Trip', '2023-06-01', '2023-06-05', 'Approved'),
(11, 2, 'Training', '2024-04-17', '2024-04-20', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `Payroll_Id` int(11) NOT NULL,
  `Employee_Id` int(11) DEFAULT NULL,
  `Salary` varchar(150) DEFAULT NULL,
  `Overtime` time DEFAULT NULL,
  `Deductions` float DEFAULT NULL,
  `Net_Pay` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`Payroll_Id`, `Employee_Id`, `Salary`, `Overtime`, `Deductions`, `Net_Pay`) VALUES
(1, 5, '50000 RWF', '02:30:00', 1000.5, 48999.5),
(2, 2, '60000 RWF', '01:45:00', 800.75, 59199.2),
(3, 3, '75000 RWF', '03:15:00', 1200.25, 73699.8),
(4, 4, '45000 RWF', '00:45:00', 500, 44499.5),
(5, 1, '80000 RWF', '02:00:00', 1500, 78499),
(12, 8, '300000RWF', '02:00:00', 50000, 250000),
(15, 2, '600000RWF', '13:00:00', 100000, 500000),
(16, 1, '10000', '11:00:00', 1000, 9000),
(17, 1, '10000', '11:00:00', 1000, 9500);

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `Performance_Id` int(11) NOT NULL,
  `Employee_Id` int(11) DEFAULT NULL,
  `Evaluation_Period` date DEFAULT NULL,
  `Key_Performance_Indicators` varchar(245) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Comments` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`Performance_Id`, `Employee_Id`, `Evaluation_Period`, `Key_Performance_Indicators`, `Rating`, `Comments`) VALUES
(1, 2, '2022-12-01', 'KPI 1', 5, 'Great job!'),
(2, 1, '2022-12-02', 'KPI 2', 2, 'Well done.'),
(3, 3, '2022-12-03', 'KPI 3', 3, 'Room for improvement.'),
(4, 5, '2022-12-04', 'KPI 4', 1, 'Excellent performance.'),
(5, 4, '2022-12-17', 'KPI 8', 4, 'Good Effort'),
(21, 3, '2024-04-16', 'KPI7', 6, 'Best Performer'),
(22, 4, '2024-04-25', 'KPI5', 7, 'On The Top Level'),
(23, 1, '2024-04-09', 'kpi3', 12, 'Veery well');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `Training_Id` int(11) NOT NULL,
  `Employee_Id` int(11) DEFAULT NULL,
  `Training_Type` varchar(300) DEFAULT NULL,
  `Trainner` varchar(85) DEFAULT NULL,
  `Duration` varchar(30) DEFAULT NULL,
  `Completion_Status` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`Training_Id`, `Employee_Id`, `Training_Type`, `Trainner`, `Duration`, `Completion_Status`) VALUES
(1, 5, 'Onboarding', 'Joseph Gatete', '2 weeks', 'Completed'),
(2, 2, 'Technical Skills', 'Jane Goldon', '1 month', 'In Progress'),
(3, 3, 'Leadership Workshop', 'Michael James', '3 days', 'Not Started'),
(4, 4, 'Communication Skills', 'Jenifer Lily', '2 weeks', 'Completed'),
(5, 1, 'Project Management', 'Benjamin Davis', '1 month', 'Not Started'),
(6, 8, 'Human resource', 'Mr doggi', '4weeks', 'finished'),
(11, 13, 'management', 'prof hacher', '3weeks', 'finished'),
(12, 8, 'Aploading', '1Year', 'Finished', 'Frank Rampard'),
(13, 2, 'New Technology', 'In Progress', 'Frank Moses', '2Months'),
(14, 3, 'Customer Care', 'Ish Kevin', '3Days', 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'NIZEYIMANA', 'Mauricee', 'nizeyimanamaurice1', 'nizeyimanamaurice123@gmail.com', '0791051095', '$2y$10$/9F94Ud0OFPViRul0FTO5OKGrHWG26ewOyCxNgMaEOXoWHz5lHj32', '2024-04-09 10:06:33', '12', 0),
(5, 'uwamahoro', 'Mauricee', 'uwa1', 'uwamahoro@gmail.com', '0791051095', '$2y$10$n4WqSuKKgsaR87jkKV.m9.0AWdSwfCwDhJg0aAI7K8qAL/UDz64Ai', '2024-04-09 10:12:43', '098786', 0),
(7, 'shanse', 'Mauricee', 'sh', 'shanse@gmail.com', '0791051098', '$2y$10$kxqy74d3qzTPnUKUQuE.PehoFKtZ0x8X1Ohkzb8KcFby3SJS6DIcK', '2024-04-09 10:14:07', '098789', 0),
(8, 'BIZIMANA', 'David', 'BIZIMANAD@', 'bizimanadavid@gmail.com', '078577522', '$2y$10$6BB6vunstm.U4/.HkrOrOui/8dcIJa.dPpGx45y6/AhWQxU4cvJR6', '2024-04-20 15:20:28', '12345', 0),
(9, 'Tumukunde ', 'Marie jose', 'Tjose1', 'tumukundejose@gmail.com', '078654321', '$2y$10$e9wdH8U14Q/V/iOVhVWXmeNlCsCjmijrk4HW6pU7NdkyZuyUHsR7u', '2024-04-22 16:38:50', '1234', 0),
(10, 'KAMUGISHA', 'Jaque', 'MUGISHA@1', 'mugishajaque@gmail.com', '0791234567', '$2y$10$ofX1pcsH.uLHk428Fa8xXexGTPnKpWIbuT4WtXX2rjGMjsIuJ8LnK', '2024-04-25 11:39:14', '12345', 0),
(12, 'NIZEYIMANA', 'Maurice', 'Maurice@55', 'nizeyimanamaurice69@gmail.com', '0799306816', '$2y$10$h0p2QZ/mqL5RwX3Lze/7tOMj52jrIC.EH14.ppf41XWr1x1OtzRLO', '2024-04-29 14:35:25', '123', 0),
(13, 'Maurice', 'Official', 'MauriceOfficial@55', 'mauriceofficial@gmaiil.com', '0738238414', '$2y$10$T89CkP27YgegyDPBFIlfGuLbwYJu.aeK4f0HMwM/7m6K/IBe2XUPG', '2024-04-29 14:37:30', '123', 0),
(14, 'UWASE', 'Evelyne', 'Uwase1', 'uwaseevelyne12@gmail.com', '0793832313', '$2y$10$g5jdWcP4vzJpZaZAI2DzdOJuYH7HWDjRzWJmCMOZrbcSl/aV4mn5q', '2024-04-30 09:59:31', '122', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Attendance_Id`),
  ADD KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`Benefit_Id`),
  ADD KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_Id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`Request_Id`),
  ADD KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`Payroll_Id`),
  ADD KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`Performance_Id`),
  ADD KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`Training_Id`),
  ADD KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `Attendance_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `Benefit_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `Request_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `Payroll_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `Performance_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `Training_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employee` (`Employee_Id`);

--
-- Constraints for table `benefits`
--
ALTER TABLE `benefits`
  ADD CONSTRAINT `benefits_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employee` (`Employee_Id`);

--
-- Constraints for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD CONSTRAINT `leave_request_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employee` (`Employee_Id`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employee` (`Employee_Id`);

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employee` (`Employee_Id`);

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employee` (`Employee_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
