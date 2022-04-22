-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2020 at 08:22 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_for`
--

DROP TABLE IF EXISTS `applied_for`;
CREATE TABLE IF NOT EXISTS `applied_for` (
  `jobid` int(11) NOT NULL,
  `jobseeker` varchar(50) NOT NULL,
  `desired_salary` int(11) DEFAULT NULL,
  `desired_start_date` date DEFAULT NULL,
  PRIMARY KEY (`jobseeker`,`jobid`),
  KEY `jobid_idx` (`jobid`) USING BTREE,
  KEY `jobseeker_idx` (`jobseeker`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_for`
--

INSERT INTO `applied_for` (`jobid`, `jobseeker`, `desired_salary`, `desired_start_date`) VALUES
(1, 'a', 100000, '2020-12-13'),
(3, 'k', 100000, '2020-12-14'),
(7, 'k', 100000, '2020-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `name` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `contact_fname` varchar(50) DEFAULT NULL,
  `contact_lname` varchar(50) DEFAULT NULL,
  `contact_street` varchar(255) DEFAULT NULL,
  `contact_city` varchar(50) DEFAULT NULL,
  `contact_state` varchar(50) DEFAULT NULL,
  `contact_postal` varchar(20) DEFAULT NULL,
  `contact_country` varchar(100) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`name`, `location`, `contact_fname`, `contact_lname`, `contact_street`, `contact_city`, `contact_state`, `contact_postal`, `contact_country`, `contact_email`, `contact_phone`) VALUES
('in', 'deed', 'get', 'served', 'this ', 'time', 'Alabama', '1573', 'Australia', 'sumthing@that.ifeel', '4654341'),
('involve', 'Hard place', 'Death', 'bed', 'cementaryville dr no 159', 'talent ', 'Ohio', '78945', 'FeerLand ', 'taletn@freeland.bed', '1583697'),
('Shopping center', 'open space', 'Love', 'win', 'whoseville drive ', 'Minot', 'North dakota ', '45678', 'AnnCountry', 'whovill@openspace.com', '159753');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `jobseeker` varchar(50) NOT NULL,
  `areaofstudy` varchar(100) NOT NULL,
  `degree` enum('None','High School','Bachelors','Associates','Masters','Doctorate') NOT NULL DEFAULT 'None',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `gpa` decimal(5,4) DEFAULT NULL,
  `ed_facility_name` varchar(100) NOT NULL,
  `ed_facility_city` varchar(50) NOT NULL,
  PRIMARY KEY (`jobseeker`,`areaofstudy`,`degree`),
  KEY `ed_facility_idx` (`ed_facility_name`,`ed_facility_city`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`jobseeker`, `areaofstudy`, `degree`, `start_date`, `end_date`, `gpa`, `ed_facility_name`, `ed_facility_city`) VALUES
('ira.newgrad', 'Computer Sciences', 'High School', '2020-12-13', '2020-12-16', '4.0000', 'cgjhg', 'ghjg');

-- --------------------------------------------------------

--
-- Table structure for table `education_facilities`
--

DROP TABLE IF EXISTS `education_facilities`;
CREATE TABLE IF NOT EXISTS `education_facilities` (
  `name` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postal` varchar(20) NOT NULL,
  `type` enum('University','College','Technical School','High School','Grade School') NOT NULL DEFAULT 'University',
  PRIMARY KEY (`name`,`city`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_facilities`
--

INSERT INTO `education_facilities` (`name`, `city`, `state`, `postal`, `type`) VALUES
('cgjhg', 'ghjg', 'ghjg', 'ghj', 'High School'),
('Col', 'Ctypw', 'Cstate', '45651', 'College'),
('ghjgch', 'fhfg', 'fgh', 'xfhj', 'College'),
('Grade', 'Gtype', 'Gstate', '4318', 'Grade School'),
('HighS', 'Htypw', 'Hcity', '543', 'High School'),
('i', 'DO', 'no', '1569/', 'Technical School'),
('I ', 'Hate', 'this', '123', 'University'),
('Ok', 'be ', 'serious', '1654', 'High School'),
('sdgv', 'sds', 'adsd', '84564', 'Grade School'),
('Tech', 'Ttype', 'Cstate', '213', 'Technical School'),
('Uni', 'Utype', 'Ustate', '15975', 'University');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `jobid` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) NOT NULL,
  `description` varchar(1023) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `required_education` text,
  `required_skills` text,
  `required_job_specific` text,
  `required_prior_experience` text,
  `employer` varchar(50) NOT NULL,
  PRIMARY KEY (`jobid`),
  KEY `employer_id` (`employer`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobid`, `position`, `description`, `salary`, `start_date`, `posted_date`, `required_education`, `required_skills`, `required_job_specific`, `required_prior_experience`, `employer`) VALUES
(1, 'Academic Advisor', 'Academic Advisors work with students in high schools, colleges and universities to help them fulfill requirements for degrees and graduation. Academic advisors also help students select and plan a course of study that will help prepare them for desired career paths. Some academic advisors travel to employment and college fairs to meet potential students and facilitate good relationships with employers and other schools.', '42393', '2020-12-19', '2020-12-01', 'A bachelor\'s or master\'s degree ', 'Clearly articulated required skills and qualifications help candidates assess their suitability for the position. You’ll want to include education and experience requirements, as well as desirable interpersonal skills and character traits.', 'An academic advisor counsels and guides high school, college or university students. The advisor must have a thorough understanding of various degree programs and required classes. Students seek academic advisors as they plan for their future careers. Academic advisors also help transfer students to ensure they acclimate to their new schools and credits are properly transferred.', 'A good candidate possesses the required level of experience. For entry-level positions, candidates may only need one or two years of experience. If you’re interested in candidates who won’t require extensive training or who might train or supervise others, ask for three to five additional years of experience.', 'isa.hirer'),
(2, 'Account Clerk', 'Account Clerks manage accounts and provide support for the accounting, finance and sales departments. They may also be responsible for payroll or maintaining vendor accounts and processing procurement requests for goods and services', '18511', '2020-12-19', '2020-12-01', 'The Account Clerk position generally requires a high school diploma and at least 1 year of bookkeeping or related experience. Some companies prefer some accounting credits from a college program. Business school training is also accepted. However, there are companies that will hire entry-level Account Clerks with just basic clerical knowledge and a valid driver’s license', 'Account Clerks should have a comprehensive understanding of bookkeeping and accounting practices, along with strong communication skills', 'Bookkeeping and general accounting. Creating and maintaining spreadsheets.\r\nInvoicing and reconciliation for varying departments.', 'The average experience requirement for an Account Clerk is about 1 to 3 years in a clerical, data entry or business-related setting. Depending on the scope of the position and responsibilities and duties for your specific company, you may be willing to train the right person who possesses exceptional people skills and embodies the mission of your business. The Account Clerk position can be filled by a candidate who has at least 1 year of general business office experience and is willing to learn', 'emp'),
(3, 'Accountant ', 'An Accountant oversees the management and reporting of financial data of an organization. Accountants are tasked with preparing, examining and analyzing a company’s accounts, financial records and other financial obligations. They do so to ensure compliance with financial reporting and other standard procedures', '57290', '2020-12-19', '2020-12-01', 'In the absence of a bachelor’s degree, some certifications can suffice. A Certified Public Accountant (CPA) is subjected to thorough training that involves a specified number of hours doing coursework, practical work and written and oral examinations. Other certifications include Certified Management Accountant and Certified Financial Analyst (CFA), among others', 'Experience with accounting software and data entry. Excellent understanding of accounting rules and procedures including the Generally Accepted Accounting Principles (GAAP). Advanced knowledge and experience of spreadsheets.', 'Reconciling the company\'s bank statements and bookkeeping ledgers.', 'A successful candidate should have experience with accounting and financial software and should stay up to date with current trends. Expert-level knowledge of working with spreadsheets is crucial. Experience with word processing software is essential for generating and writing reports for record-keeping as well as presentations.', 'isa.hirer'),
(4, 'Animator ', 'An animator is an artist who creates a series of images known as frames, to simulate movement. Animators draw images by hand or using computer software. Animation may be two-dimensional (2D), three-dimensional (3D), or computer-generated. An animator may work in the entertainment, gaming and advertising industries.', '17444', '2020-12-19', '2020-12-01', 'Many Animators possess a Bachelor’s Degree in Fine Art, Graphic Design, Illustration, Animation or a related discipline. These courses offer modules in visual effects, drawing, illustration, modeling, rendering and lighting. Some Animators only possess Associate’s degrees. Postgraduate degrees in film animation or web publishing are also useful, depending on the medium.', 'Excellent creativity and originality. Superior graphic design skills. Proficiency in design and animation software. In-depth understanding of mathematical and geometric concepts.', 'Conceptualizing ideas for characters, scenes, backgrounds and other animation elements. Creating character sketches for new animations based on design briefs. Producing storyboards for animation projects. Designing backgrounds, sets and other elements of the animated environment.', 'A qualified Animator will have at least one year of experience in the field. Animators should be able to conceptualize characters from ideation to final execution. Animators should be comfortable working with computer graphics tools and using them to create storyboards for animation projects. An experienced animator should have a proven record of delivering creative projects to client specifications and within required timelines', 'isa.hirer'),
(5, 'Business Developer', 'A Business Developer is responsible for the business development aspect of an organization. Primary duties include identifying business opportunities, building and maintaining successful relationships with prospects and existing clients, collaborating with executives on business strategy to determine objectives, evaluating current business performance and maximizing business reach and potential.', '60000', '2020-12-19', '2020-12-01', 'Bachelor\'s degree is required.', 'Demonstrated achievement in B2B sales. Proficiency in Microsoft Office applications, including Outlook, Word, Excel, PowerPoint and Access and industry-specific analysis software. Basic understanding of the industry, with the ability to become a subject matter expert on the job.', 'Oversee the sales process to attract new clients. Work with senior team members to identify and manage risks. Research and identify new market opportunities.', 'A great job title typically includes a general term, level of experience and any special requirements. The general term will optimize your job title to show up in a general search for jobs of the same nature. The level of experience will help you attract the most qualified applicants by outlining the amount of responsibility and prior knowledge required. And if your position is specialized, consider including the specialization in the job title as well. But avoid using internal titles, abbreviations or acronyms to make sure people understand what your job posting is before clicking.', 'isa.hirer'),
(6, 'Dental Assistant', 'Preparing exam rooms, sterilizing instruments and ensuring necessary equipment is ready for dentists. \r\nAssisting dentists during procedures by handing them instruments and anticipating needs. Processing lab work for the dentist. Advising patients on recommended oral hygiene.', '17000', '2020-12-19', '2020-12-01', 'Training and certifications requirements for a Dental Assistant will vary by state, so be sure to research this before posting your open position. Some states require Dental Assistants who conduct X-rays, apply sealant or fluoride to be licensed. If your business is in a state that requires a license, note this in your job description. Dental Assistants are generally required to have completed an accredited training program. A high school diploma or GED is also usually required.', 'Knowledge of dentistry, particularly dental procedures, instruments and hygiene. Experience administering dental X-rays. Organizational and multi-tasking skills, general office aptitude. Customer service and communication skills to ensure patients feel comfortable during appointments', 'A Dental Assistant performs many tasks including scheduling appointments, record-keeping, taking X-rays and assisting dentists with patients. Some states allow Dental Assistants to perform some dental procedures, such as applying sealant and fluoride. Dental Assistants work under the direction of a licensed dentist to complete lab work and prep materials for the dentist to use during procedures.', 'Larger practices may require less experience and hire entry-level Dental Assistants who will work with and learn from other colleagues. Smaller dental practices may require a more experienced Dental Assistant who can work independently. In this case, a minimum of two years’ experience and a Dental Assistant license is suggested', 'emp'),
(7, 'Dean of Students', 'A Dean of Students job description summarizes key skills, responsibilities, activities and qualifications for a listed position. A good job description should provide potential applicants with information about the name and title of the person they would be reporting to, salary expectations, the type of work they will perform, any available employee benefits and information about your company’s mission and culture. Interested individuals should be able to determine if they are interested in and qualified for your position. Customize this Indeed Dean of Students sample job description with your organization’s information to meet the needs of your post.', '77517', '2020-12-19', '2020-12-01', 'A Dean of Students is usually required to hold a master’s degree for larger colleges and universities, while smaller schools may also accept a bachelor’s degree. Areas of study degrees are usually obtained in can include marketing, social work and accounting. Many deans of students begin their careers as college professors, moving later into administration with some earning their Ph.D. in the field they taught.', 'Computer skills: A Dean of Students needs to be comfortable using computers in order to use the necessary software for managing student and school records. Interpersonal skills: A Dean of Students needs to establish positive relationships with co-workers, students and their families. Organizational skills: A Dean of Students should be organized in order to manage records, coordinate activities with staff and prioritize tasks.', 'A Dean of Students may work in admissions helping make determinations on which applicants will be admitted, may assist in preparing promotional materials highlighting the school or can work in the financial aid department establishing packages of institutional and federal financial aid for prospective students.', 'Most employers prefer hiring applicants who have multiple years of administrative experience in a postsecondary setting. Some Deans of Students previously work as a resident assistant or in a registrar’s office while in college to begin gaining the necessary experience. Deans of Students with advanced educational degrees are more likely to be promoted to higher-level positions within their departments or schools with some even becoming college presidents.', 'isa.hirer');

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

DROP TABLE IF EXISTS `job_history`;
CREATE TABLE IF NOT EXISTS `job_history` (
  `jobseeker` varchar(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `supervisor_fname` varchar(50) DEFAULT NULL,
  `supervisor_lname` varchar(50) DEFAULT NULL,
  `supervisor_email` varchar(100) DEFAULT NULL,
  `supervisor_phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`jobseeker`,`company`,`start_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `username` varchar(50) NOT NULL,
  `phash` varchar(255) NOT NULL,
  `usertype` enum('employer','jobseeker','admin') NOT NULL DEFAULT 'jobseeker',
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postal` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `employing_company` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `employing_company_idx` (`employing_company`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`username`, `phash`, `usertype`, `fname`, `lname`, `email`, `phone`, `dob`, `street`, `city`, `state`, `postal`, `country`, `employing_company`) VALUES
('', '$2y$10$3KZRDztDtsgP3lmOecegSuERSqx6tGpuIOj2Eq0tbH5PM9zI9pjha', 'jobseeker', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('$Emuser', '$Hash_EmPassword', 'employer', '$EmFname', '$EmLname', '$EmEmail', '$EmNumber', NULL, '$EmStreet', '$EmCity', '$EmState', '$EmPostal', '$EmCountry', NULL),
('a', '$2y$10$QOGsTogMuUssa2FHQMBI4OHBfUlLKpXvoMMK3oAjTyPhrkVLi1MR.', 'jobseeker', 'dfd', 'Love', 'Love', '6846', '2020-12-04', 'Love', 'Love', '', '6456', 'Afghanistan', NULL),
('admin', '$2y$10$Y.r09sAjZhrX.o7QbtyBG.dtUY/M1tCXLH0ViYVIVWtD7jNe7By/q', 'admin', 'admin', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('emp', '$2y$10$dIdK8rN6rsJLwlQhiJPVreLqWqbOF2Hlguib.GB.wz0R2bVIazOEm', 'employer', 'emp', 'emp', 'emp', '423', '0034-03-04', 'emp', 'emp', 'Alabama', 'emp', 'Ã…land Islands', 'in'),
('ira.newgrad', '$2y$10$b6PSJLoHUYrSLD2Ao1ZVpey4JRggHWEyWtak6G0z0Aq2qv.DU18eu', 'jobseeker', 'ira', 'newgrad', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('isa.hirer', '$2y$10$fkjCEqDaNV.we6qe2pAZqeFxmFrtlqpWMTjrXesP2/JEj98o2U7Pm', 'employer', 'isa', 'hirer', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('k', '$2y$10$nanZOwZqW0ydBrlC1GK9Y.aS64mdSbPk2TsLGaDOvkRJzxC7syTGq', 'employer', 'k', 'k', 'k', 'k', '2019-11-07', 'k', 'k', '', 'k', 'Afghanistan', 'involve'),
('q', '$2y$10$B1/7NtIKGEG1uH7Z5f2Douh/0YMQO6biiPKhzH03pSiM2LycpmpoC', 'employer', 'q', 'q', 'q', 'q', '2019-10-07', 'q', 'qq', '', 'qqq', 'Afghanistan', 'in');

-- --------------------------------------------------------

--
-- Table structure for table `skills_certifications`
--

DROP TABLE IF EXISTS `skills_certifications`;
CREATE TABLE IF NOT EXISTS `skills_certifications` (
  `jobseeker` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `certification_date` date DEFAULT NULL,
  PRIMARY KEY (`jobseeker`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied_for`
--
ALTER TABLE `applied_for`
  ADD CONSTRAINT `applied_jobid_fk` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`jobid`),
  ADD CONSTRAINT `applied_jobseeker_fk` FOREIGN KEY (`jobseeker`) REFERENCES `people` (`username`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `ed_facility_education_fk` FOREIGN KEY (`ed_facility_name`,`ed_facility_city`) REFERENCES `education_facilities` (`name`, `city`),
  ADD CONSTRAINT `jobseeker_education_fk` FOREIGN KEY (`jobseeker`) REFERENCES `people` (`username`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `job_employer_fk` FOREIGN KEY (`employer`) REFERENCES `people` (`username`);

--
-- Constraints for table `job_history`
--
ALTER TABLE `job_history`
  ADD CONSTRAINT `history_jobseeker_fk` FOREIGN KEY (`jobseeker`) REFERENCES `people` (`username`);

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `employing_company_fk` FOREIGN KEY (`employing_company`) REFERENCES `companies` (`name`);

--
-- Constraints for table `skills_certifications`
--
ALTER TABLE `skills_certifications`
  ADD CONSTRAINT `skills_certs_jobseeker_fk` FOREIGN KEY (`jobseeker`) REFERENCES `people` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
