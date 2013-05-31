-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2013 at 09:29 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `upris`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE IF NOT EXISTS `admininfo` (
  `adminid` int(250) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20004 ;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`adminid`, `email`, `firstname`, `lastname`, `password`) VALUES
(20000, 'admin1', 'jamie', 'anacleto', 'abcdefg'),
(20001, 'admin2', 'super', 'admin', '506eedae51d0bdc3be93c6b1c80a8848'),
(20002, 'admin3', 'iamca', 'cagurangan', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `adviserinfo`
--

CREATE TABLE IF NOT EXISTS `adviserinfo` (
  `adviserid` int(250) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `field` varchar(20) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `hash` varchar(1024) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adviserid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40005 ;

--
-- Dumping data for table `adviserinfo`
--

INSERT INTO `adviserinfo` (`adviserid`, `email`, `firstname`, `lastname`, `password`, `field`, `ins`, `hash`, `active`) VALUES
(40000, 'nilara@gmail.com', 'Nilo', 'Araneta', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'cmsc', 'University Of The Philippines', '', 1),
(40001, 'fdd@gmail.com', 'Francsi', 'Dimzon', '506eedae51d0bdc3be93c6b1c80a8848', 'agr', 'University Of The Philippines', '', 0),
(40002, 'c.iamca@yahoo.com', 'Jenn', 'Aguilar', 'password', 'cmsc', 'Up Baguio', 'a4a042cf4fd6bfb47701cbc8a1653ada', 1),
(40003, 'ciamca.20@gmail.com', 'Iamca', 'Cagurangan', 'password', 'cmsc', 'Up Baguio', '82489c9737cc245530c7a6ebef3753ec', 0),
(40004, 'chuchu@yahoo.com', 'Iamca', 'Huhuhu', 'password', 'agr', 'Biology', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `convoid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`convoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('read','unread') NOT NULL,
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`messageid`),
  UNIQUE KEY `messageid` (`messageid`),
  KEY `messageid_2` (`messageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`from`, `to`, `subject`, `content`, `date`, `status`, `messageid`) VALUES
(10001, 10000, 'first', 'hello jamie from enteng', '2013-05-20 14:36:00', 'read', 1),
(10001, 10000, 'seond', 'asdfh aidhaidhg alsdhas doauy gdasyudgausy dguasg dasydg asuydg asudgau ysdgausy', '2013-05-15 05:23:00', 'read', 2),
(10001, 10000, 'lolz', 'MANILA, Philippines – Taiwanese Minister for Foreign Affairs David Lin said on Sunday, May 19, that Taipei and Manila have reached a consensus on initiating a joint investigation into the shooting of Taiwanese fisherman in Philippine waters.\r\n\r\n“Both sides have agreed to arrange for the other side to conduct fact-finding trips in their respective countries to discover the truth behind the fatal shooting and have shown willingness to cooperate with each other during their individual investigations,” the Taipei Times quoted Lin as saying.\r\n\r\nTaipei Times reported that the bilateral cooperation on the case was termed, both by Lin and Philippine Justice Secretary Leila de Lima, as a “parallel investigation” instead of a “joint investigation” to avoid concerns on both sides about sovereign interference.\r\n\r\n“With the consensus, both sides will determine an agenda and items of cooperation for their investigations on the principle of reciprocity to facilitate the uncovering of the truth and subsequent punishment of those responsible,” Lin added.\r\n\r\nLin''s remarks came after Taiwanese probers who arrived in Manila last week returned to Taiwan without a consensus with the Philippines. He said “the tense atmosphere last week was not conducive to negotiation, which was why the investigation team returned on Saturday seemingly empty-handed.”\r\n\r\nHowever, Manila Economic and Cultural Office (MECO) Chairman Amadeo Perez told Rappler that he has yet to confirm Lin''s statements regarding the parallel investigation between Taiwan and the Philippines.\r\n\r\nEarlier, De Lima said that it would be “impossible” to conduct a joint investigation with Taiwan as the Philippines “is a sovereign country” with its own processes and justice system.\r\n\r\n‘Premature’\r\n\r\nDuring a press conference on May 18, the Taiwanese investigators reported that the Taiwanese fisherman, 65-year-old Hung Shih-cheng was “intentionally murdered” by the Philippine Coast Guard.\r\n\r\nThe Taiwanese team said that based on forensic examination by the Taiwanese authorities, bullet holes were mainly found in the cabin where the Taiwanese fisherman hid, which made the shooting intentional.\r\n\r\nBut Communications Secretary Ricky Carandang rejected Taiwan''s "murder" allegations and reminded that an investigation has been ongoing. "There is an investigation ongoing so any premature statements that tend to confuse the issues and inflame passions should be avoided," Carandang said.\r\n\r\nMECO''s Perez echoed Carandang and said in an interview on dzBB radio Sunday that the Taiwanese probers acted prematurely.\r\n\r\nPerez said they were trying to set up a meeting with Philippine counterparts, and the team should have waited for the results of the Philippine investigation.', '2013-05-15 05:13:00', 'read', 3),
(10002, 10000, 'lols', 'sagd jasdg ajdkjas hjahdbajs djagd jagd a', '2013-05-16 00:00:00', 'read', 4),
(10000, 10001, 'reply', 'asdasdb jsd', '2013-05-16 00:00:00', 'read', 5),
(40000, 10000, 'adviser', 'fbhfbs', '2013-05-16 00:00:00', 'read', 6),
(10000, 10001, 'one', 'asdahdka', '2013-05-08 00:00:00', 'unread', 7),
(10001, 10000, 'two', 'sdgfshys', '2013-05-24 00:00:00', 'read', 8);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postid` int(250) NOT NULL AUTO_INCREMENT,
  `header` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `header`, `content`, `date`) VALUES
(1, 'news flash', 'man in the toilet', '2013-05-17 17:30:07'),
(2, 'another news flash', 'lol asdhbgas jdg asjgdahdg agd jkagkdasg djasdja', '2013-05-17 17:35:18'),
(4, 'UNA stumped on proclamation', 'Binay explained that she skipped the proclamation on Thursday, May 16, because her lawyers advised her that the votes canvassed was not yet substantial for a proclamation.  She was the only one among the top 6 who was absent, with the other candidates coming from the administration slate Team PNoy.', '2013-05-17 17:38:41'),
(5, 'lol', 'MANILA, Philippines – They are asking questions about it but will not question it for now.  The opposition United Nationalist Alliance (UNA) raised questions about the partial proclamation of 6 senatorial candidates but does not yet have any legal move planned to question it.  In a press conference on Friday, May 17, UNA campaign manager Navotas Rep Tobias “Toby” Tiangco and Senator-elect Nancy Binay asked why the National Board of Canvassers (NBOC) decided to push through with the proclamation when it had then canvassed only 23.68% of certificates of canvass (COC).  Tiangco asked, “If 75% of votes have not yet been canvassed, what is the basis to say it cannot affect the number of votes of the top 6? Who of the 6 candidates moved for an early proclamation when only 23.68% of votes were canvassed?”  The Comelec clarified on Friday that it used as basis the tallies that were faxed from the provinces. (Read: Comelec&#39;s defense: We used faxed tallies)  The UNA secretary-general though clarified that he was not “questioning” the proclamation but was only asking the Commission on Elections to explain.  “I believe in the good faith of the Comelec. I’m just asking them why and what was the basis. That’s all. I am not casting doubt on the Comelec,” Tiangco said.  Binay explained that she skipped the proclamation on Thursday, May 16, because her lawyers advised her that the votes canvassed was not yet substantial for a proclamation.  She was the only one among the top 6 who was absent, with the other candidates coming from the administration slate Team PNoy.', '2013-05-17 17:41:22'),
(6, 'another one', 'You can’t do anything’  Lawyers Romulo Macalintal and George Garcia also opposed the partial proclamation. Macalintal is counsel for Sen Gregorio Honasan II while Garcia is the lawyer of Cagayan Rep Juan Ponce “Jack” Enrile Jr and San Juan Rep JV Ejercito.  In a phone interview with Rappler, Macalintal called it a “defective proclamation” with only 23.68% of votes canvassed.  He objected to the proclamation before the NBOC on Thursday but he said the board did not act on his objection.', '2013-05-17 17:41:58'),
(7, 'lol COMELEC', 'MANILA, Philippines (UPDATED) – Explaining the basis for its supposedly rushed proclamations, the Commission on Elections (Comelec) on Friday, May 17, said it partly used faxed tallies in proclaiming 6 initial winners of the senatorial race.  The Comelec earlier ordered local canvassers that have failed to transmit their certificates of canvass (COCs) as of 5 pm on Wednesday, May 15, to fax these directly to the national board of canvassers (NBOC) based in Manila.  The Comelec used these tallies, called grouped canvass reports, to project the numbers from the COCs that the NBOC has yet to receive. The poll body, which sits as the NBOC, however didn&#39;t include these grouped canvass reports in the official tally.  In determining the exact number of votes that a candidate received, the official basis is still the canvassing done in PICC, Pasay City.  In Resolution No. 9706 released to the media on Friday, the Comelec said it used validated grouped canvass reports as basis for the following:  &#34;to determine the votes obtained by all the candidates for senator; and  &#34;to ascertain whether or not the standing of the candidates who may be initially proclaimed as duly elected senators, will be affected by the remaining provincial and city certificates of canvass still to be received by the NBOC&#34;', '2013-05-17 17:48:49'),
(24, '#PHvote with Nancy Binay', 'MANILA, Philippines - Today, Rappler speaks with senator-elect Nancy Binay.\r\n\r\nThe national board of canvassers proclaimed Binay a senator on Thursday, May 16, along with five other candidates. Binay skipped the event.\r\n\r\nThe neophyte senator-elect was criticized during the campaign season for her lack of government experience and non-attendance of senatorial debates.\r\n\r\nShe was also the brunt of intense personal attacks online, but Binay still places in the top 6 as of the latest official count.\r\n\r\nBinay also consistently place in the top 12 of preferred candidates in surveys. Her father, Vice President Jejomar Binay is straightforward about her advantage, saying "She''s my daughter."\r\n\r\nBinay says her first priority as senator will be her campaign platforms: more daycare and feeding centers, and an expanded immunization program.\r\n\r\nWatch her live interview today, May 20, 2013, at 11am.\r\n\r\n- Rappler.com', '2013-05-20 10:48:34'),
(25, ' BY RAPPLER.COM  POSTED ON 05/19/2013 3:13 AM  | UPDATED 05/20/2013 12:25 AM 1', 'BY RAPPLER.COM \r\nPOSTED ON 05/19/2013 3:13 AM  | UPDATED 05/20/2013 12:25 AM\r\n1\r\nComments\r\n7\r\n	\r\n\r\n\r\n0\r\nPinterest\r\n15\r\nShare\r\nReport\r\nMANILA, Philippines  Less than a week after the midterm elections, the who''s who of Philippine politics trooped to PICC, Pasay City, for the proclamation of the country''s 12 new senators.\r\n\r\nLed by Vice President Jejomar Binay, VIP guests witnessed the proclamation ceremonies for 9 administration and 3 opposition candidates. Rappler presents the stars of the proclamation in the slide show below. Click on the individual thumbnails to see larger photographs.', '2013-05-20 10:49:07'),
(26, 'How Gringo captured the last spot', 'MANILA, Philippines - It could have been anybody''s game but Senator-elect Gregorio "Gringo" Honasan of the United Nationalist Alliance (UNA) triumphed in the end and secured the last spot in the Magic 12.\r\n\r\nBased on the official results of the Comelec, it took 13.07 million votes for Honasan to be re-elected to the Philippine Senate. Honasan won his race against his closest rival, UNA bet Richard "Dick" Gordon, who, until the 14th canvass report, was over 600,000 votes behind. Gordon registered 12.25 million votes compared to Honasan''s 12.91 million votes in that canvass.\r\n\r\nThe 15th and 16th canvass reports recorded votes from Marinduque, Samar and Lanao del Norte. Honasan got a total of 160,825 votes in these provinces, further adding to his lead. Gordon, at the end of the 16th canvass, garnered 705,940 votes.\r\n\r\nWhen the 15th canvass from Marinduque and Samar came in, Honasan again pulled away from Gordon, with his votes reaching 13.02 million. His lead was sustained until the 16th canvass, which covered Lanao del Norte.\r\n\r\nGordon did not have a chance to increase his votes, which, until the 16th canvass, was still below 12.5 million.\r\n\r\n<span>Vote drivers</span>\r\n\r\nHonasan''s win was driven by his lead in 3 vote-rich regions -- Calabarzon, the National Capital Region, and Central Luzon, where he got a total of 5.75 million votes.\r\n\r\nHis win in Bicol and the Ilocos region also helped boost his chances for re-election. The two regions gave him as much as 1.7 million votes.\r\n\r\nThis means that in just those 5 regions, Honasan already had 7.45 million votes, more than 50% of his total votes as early as the 14th canvass.\r\n\r\nThe 15 provinces and cities that delivered the most votes for Honasan are:', '2013-05-20 10:49:42'),
(27, 'nl2br', 'Honasan''s win was driven by his lead in 3 vote-rich regions -- Calabarzon, the National Capital Region, and Central Luzon, where he got a total of 5.75 million votes.\r\nHis win in Bicol and the Ilocos region also helped boost his chances for re-election. The two regions gave him as much as 1.7 million votes.\r\nThis means that in just those 5 regions, Honasan already had 7.45 million votes, more than 50% of his total votes as early as the 14th canvass.\r\nThe 15 provinces and cities that delivered the most votes for Honasan are:', '2013-05-20 10:50:45'),
(28, 'nl2bew', 'MANILA, Philippines - Today, Rappler speaks with senator-elect Nancy Binay.\r\nThe national board of canvassers proclaimed Binay a senator on Thursday, May 16, along with five other candidates. Binay skipped the event.\r\nThe neophyte senator-elect was criticized during the campaign season for her lack of government experience and non-attendance of senatorial debates.\r\nShe was also the brunt of intense personal attacks online, but Binay still places in the top 6 as of the latest official count.\r\nBinay also consistently place in the top 12 of preferred candidates in surveys. Her father, Vice President Jejomar Binay is straightforward about her advantage, saying "She''s my daughter."\r\nBinay says her first priority as senator will be her campaign platforms: more daycare and feeding centers, and an expanded immunization program.\r\nWatch her live interview today, May 20, 2013, at 11am.', '2013-05-20 10:52:50'),
(29, 'sdah', 'MANILA,Philippines-Today,Rapplerspeakswithsenator-electNancyBinay.ThenationalboardofcanvassersproclaimedBinayasenatoronThursday,May16,alongwithfiveothercandidates.Binayskippedtheevent.Theneophytesenator-electwascriticizedduringthecampaignseasonforherlackofgovernmentexperienceandnon-attendanceofsenatorialdebates.Shewasalsothebruntofintensepersonalattacksonline,butBinaystillplacesinthetop6asofthelatestofficialcount.Binayalsoconsistentlyplaceinthetop12ofpreferredcandidatesinsurveys.Herfather,VicePresidentJejomarBinayisstraightforwardaboutheradvantage,saying"She''smydaughter."Binaysaysherfirstpriorityassenatorwillbehercampaignplatforms:moredaycareandfeedingcenters,andanexpandedimmunizationprogram.Watchherliveinterviewtoday,May20,2013,at11am.', '2013-05-20 10:54:12'),
(30, 'lolo', 'MANILA, Philippines - Today, Rappler speaks with senator-elect Nancy Binay.\r\nThe national board of canvassers proclaimed Binay a senator on Thursday, May 16, along with five other candidates. Binay skipped the event.\r\nThe neophyte senator-elect was criticized during the campaign season for her lack of government experience and non-attendance of senatorial debates.\r\nShe was also the brunt of intense personal attacks online, but Binay still places in the top 6 as of the latest official count.\r\nBinay also consistently place in the top 12 of preferred candidates in surveys. Her father, Vice President Jejomar Binay is straightforward about her advantage, saying "She''s my daughter."\r\nBinay says her first priority as senator will be her campaign platforms: more daycare and feeding centers, and an expanded immunization program.\r\nWatch her live interview today, May 20, 2013, at 11am.', '2013-05-20 10:54:53'),
(31, 'eq', 'MANILA, Philippines - Today, Rappler speaks with senator-elect Nancy Binay.<br />\r\n<br />\r\nThe national board of canvassers proclaimed Binay a senator on Thursday, May 16, along with five other candidates. Binay skipped the event.<br />\r\n<br />\r\nThe neophyte senator-elect was criticized during the campaign season for her lack of government experience and non-attendance of senatorial debates.<br />\r\n<br />\r\nShe was also the brunt of intense personal attacks online, but Binay still places in the top 6 as of the latest official count.<br />\r\n<br />\r\nBinay also consistently place in the top 12 of preferred candidates in surveys. Her father, Vice President Jejomar Binay is straightforward about her advantage, saying "She''s my daughter."<br />\r\n<br />\r\nBinay says her first priority as senator will be her campaign platforms: more daycare and feeding centers, and an expanded immunization program.<br />\r\n<br />\r\nWatch her live interview today, May 20, 2013, at 11am.', '2013-05-20 10:58:12'),
(32, 'PH waits for Taiwan tempers to cool', 'MANILA, Philippines - The Philippines is waiting for tempers in Taiwan to cool before settling the dispute over a shot Taiwanese fisherman, the head of an office in charge of relations said Sunday, May 19.<br />\r\n<br />\r\nIssues like Manila''s "one-China" policy and comments by Taiwanese investigators branding the incident as murder have complicated the situation, said Amadeo Perez, chairman of the Manila Economic and Cultural Office (MECO).<br />\r\n<br />\r\n"We are waiting for the right time because I was told by the secretary-general for Asian affairs, we should wait for the temperature in Taiwan to cool," Perez said in an interview with dzMM radio.<br />\r\n<br />\r\n"The Taiwanese are highly emotional and... the media in Taiwan is heating things up so tempers are running high."<br />\r\n<br />\r\nAnger has grown in Taiwan after a 65-year-old Taiwanese fisherman was shot dead on May 9 by the Philippine coastguard.<br />\r\n<br />\r\nTaiwan has imposed sanctions against the Philippines, banning the entry of any more workers, recalling its de facto envoy and holding a military exercise in waters near the northern Philippines last week.<br />\r\n<br />\r\nThe coastguard said the fishing vessel had intruded into Philippine waters and tried to ram their own patrol boat.<br />\r\n<br />\r\nA Taiwan investigative team which visited the country last week described the shooting as "murder", but Perez said the Taiwanese had not coordinated with local authorities before making the accusation.<br />\r\n<br />\r\nPerez, whose office is in charge of relations in the absence of diplomatic ties, said lines of communication between his agency and the Taiwanese foreign ministry were still active despite the controversy.<br />\r\n<br />\r\nHe said the Philippine Justice Department was still studying a request for a joint investigation when the Taiwanese made their allegations this weekend.<br />\r\n<br />\r\nThe investigators'' remarks "will further inflame the people of Taiwan", he warned.<br />\r\n<br />\r\nPerez also said Taiwan wanted Philippine President Benigno Aquino personally to write a letter of apology, but this could be considered a violation of the country''s one-China policy -- recognizing Beijing rather than Taipei as the government of China.<br />\r\n<br />\r\nLast week Aquino sent Perez to Taiwan to convey his apologies but Taiwan rejected the message.<br />\r\n<br />\r\nPerez also thanked Taiwan President Ma Ying-jeou for his promise to protect the 87,000 Filipinos working in Taiwan after a Filipino worker there was attacked with a baseball bat amid public fury. <br />\r\n<br />\r\n<span>- Rappler.com</span>', '2013-05-20 11:14:26'),
(33, 'news', 'MANILA, Philippines - The Philippines is waiting for tempers in Taiwan to cool before settling the dispute over a shot Taiwanese fisherman, the head of an office in charge of relations said Sunday, May 19.<br />\r\n<br />\r\nIssues like Manila''s "one-China" policy and comments by Taiwanese investigators branding the incident as murder have complicated the situation, said Amadeo Perez, chairman of the Manila Economic and Cultural Office (MECO).<br />\r\n<br />\r\n"We are waiting for the right time because I was told by the secretary-general for Asian affairs, we should wait for the temperature in Taiwan to cool," Perez said in an interview with dzMM radio.<br />\r\n<br />\r\n"The Taiwanese are highly emotional and... the media in Taiwan is heating things up so tempers are running high."<br />\r\n<br />\r\nAnger has grown in Taiwan after a 65-year-old Taiwanese fisherman was shot dead on May 9 by the Philippine coastguard.<br />\r\n<br />\r\nTaiwan has imposed sanctions against the Philippines, banning the entry of any more workers, recalling its de facto envoy and holding a military exercise in waters near the northern Philippines last week.<br />\r\n<br />\r\nThe coastguard said the fishing vessel had intruded into Philippine waters and tried to ram their own patrol boat.<br />\r\n<br />\r\nA Taiwan investigative team which visited the country last week described the shooting as "murder", but Perez said the Taiwanese had not coordinated with local authorities before making the accusation.<br />\r\n<br />\r\nPerez, whose office is in charge of relations in the absence of diplomatic ties, said lines of communication between his agency and the Taiwanese foreign ministry were still active despite the controversy.<br />\r\n<br />\r\nHe said the Philippine Justice Department was still studying a request for a joint investigation when the Taiwanese made their allegations this weekend.<br />\r\n<br />\r\nThe investigators'' remarks "will further inflame the people of Taiwan", he warned.<br />\r\n<br />\r\nPerez also said Taiwan wanted Philippine President Benigno Aquino personally to write a letter of apology, but this could be considered a violation of the country''s one-China policy -- recognizing Beijing rather than Taipei as the government of China.<br />\r\n<br />\r\nLast week Aquino sent Perez to Taiwan to convey his apologies but Taiwan rejected the message.<br />\r\n<br />\r\nPerez also thanked Taiwan President Ma Ying-jeou for his promise to protect the 87,000 Filipinos working in Taiwan after a Filipino worker there was attacked with a baseball bat amid public fury. ', '2013-05-20 17:23:52'),
(34, 'rhodel agi', 'asdasd<br />\r\na<br />\r\nd as<br />\r\nda sd<br />\r\nas<br />\r\n<br />\r\n<br />\r\na dsa<br />\r\nsd asd<br />\r\na sd<br />\r\n<br />\r\n<br />\r\nasda', '2013-05-23 10:24:34'),
(35, 'Research/Creative Work Load Credit Grants (Without Project Funding)\n', 'MANILA, Philippines  It was a costly and a messy exercise that could have been avoided in the first place. And with the snafu that littered the conduct of the 2013 midterm polls, poll chairman Sixto Brillantes Jr has only himself to blame.<br />\r\n<br />\r\nThis is what former poll commissioner Augusto Lagman said in a scathing open letter that circulated on Wednesday, May 22. He issued it after Brillantes slammed him for his constant criticism of the Commission on Elections (Comelec) in an early morning television program.<br />\r\n<br />\r\nLagman was part of the Comelec from April 2011 to 2012. President Benigno Aquino III did not reappoint him after he was bypassed by the Commission on Appointments.<br />\r\n<br />\r\nIn his letter, Lagman said Brillantes ignored his recommendations on how to implement the automated elections, and should take full responsibility for the mess, instead of silencing his critics.<br />\r\n<br />\r\nLagman said he recommended that they bid out the project management of the automated polls. A unit that would oversee the implementation of the automated elections was necessary because of the Comelecs lack of IT-preparedness, he said.<br />\r\n<br />\r\nComelec did not have enough people to properly implement the automated polls, Lagman said in a phone interview.<br />\r\n<br />\r\nOut of the loop<br />\r\n<br />\r\nThe Project Management Group was necessary, Lagman argued, considering the move of the Comelec to assume some of the automation election projects.<br />\r\n<br />\r\nIn the 2010 national polls, most of the election preparations  from the ballot printing, deployment of precinct count optical scan (PCOS) machines and compact flash (CF) cards, counting, transmission and canvassing of of results  were shouldered by Smartmatic, the winning supplier of the PCOS machines.<br />\r\n<br />\r\nI also suggested that Project Management be bid out to Filipino Systems Integrators so there would be check and balance in the implementation of the project. I added that Smartmatic should not participate in that bidding as they were the major contractor. Logically, Project Management should have been the first to be bid out. This didnt happen. In fact, this didnt happen at all! So effectively, it was just Comelec and, to a large extent, Smartmatic that ran the election project. Imagine, a foreign group practically running Philippine elections  almost a repeat of the 2010 experience, Lagman said in his letter.<br />\r\n<br />\r\nDespite having a background on information technology, Lagman lamented that he was not tapped to help in the automation project and was out of the loop in dealings with Smartmatic. Except for two meetings at the Comelec when Smartmatic was trying to collect some money, I was never part of any PCOS discussion between Smartmatic and Comelec. It would usually be Chairman Brillantes himself and Executive Director [Jose] Tolentino. I was therefore not privy to the details of agreed-upon transactions and special deals, if any. I would only find out about some of these meetings when they were brought up during en banc meetings.<br />\r\n<br />\r\nCostly exercise<br />\r\n<br />\r\nLagman, who is now with the watchdog National Citizens Movement for Free Elections, said Brillantes also shot down his proposal on the Consolidation and Canvassing System which could have saved millions of pesos in public funds.<br />\r\n<br />\r\nI also caused the successful development by Comelec''s IT Department of the Consolidation and Canvassing System (CCS) at the minimal cost of P600,000. An earlier version, which was bought from the vendor, Smartmatic, and used during the 2008 Automated ARMM Election and the 2010 Automated National Elections, cost us P58 million.<br />\r\n<br />\r\nBut heres the thing: Chairman Brillantes did not want to use it, using the lamest of reasons  that the law requires that the technology must have been tried successfully in a previous election. He did not understand that it employs the PC/server technology, which is an old and very common technology. Its also the same system that was used during the 2008 and 2010 elections; only the computer programs were new. He also did not understand that the enhanced version of Smartmatics CCS used in the 2013 elections falls under the same category as the COMELEC-developed CCS. Both use new programs, Lagman wrote.<br />\r\n<br />\r\nThe Comelec has exercised the option to purchase the more than 80,0000 PCOS machines that were used in the 2010 national polls to the tune of P1.2 billion. Included in the purchase contract is the CCS, at no cost to the Comelec.<br />\r\n<br />\r\nThe only good guy?<br />\r\n<br />\r\nInterviewed by Comelec reporters, Brillantes dismissed Lagmans tirades, insisting that he was not helpful when he was poll commissioner. He did not contribute anything. He prepared the CCS, which we did not use. He used the funds of the commission to prepare the CCS, we did not use it.<br />\r\n<br />\r\nLagman issued his open letter to Brillantes, saying he was already fed up with the poll chiefs constant reference that he did nothing when he was in Comelec.<br />\r\n<br />\r\nHe also scored Brillantes for allegedly hinting that he was pushing for manual elections because he would supposedly financially benefit from it.<br />\r\n<br />\r\nOn the contrary, Lagman said, he was not after getting his hands on money at the Comelec. Lagman said hes the only commissioner who returned some P1.25 million in intelligence funds, which was given to him during his tenure at Comelec. Intelligence funds are not subject to the usual auditing rules for liquidation.<br />\r\n<br />\r\nHe said that when a staffer at the Comelec finance unit asked him to sign a document which would show he had liquidated the intelligence fund, he opted to issue a check to return the money, which he deposited in a bank.<br />\r\n<br />\r\nTwo days later, Chairman Brillantes sent me a text message asking me why I returned the money. I said I didnt know what to do with it and besides the money was just sleeping in the bank. I also said I had no intention of making anything big out of it, Lagman said.<br />\r\n<br />\r\nBrillantes said Lagman should be careful about making sweeping statements that portray himself as the only good guy at the poll body.<br />\r\n<br />\r\nHow would he know that he''s the only one who returned it? That is not true. He does not know what he''s talking about.... If he''s trying to claim na siya lang ang mabait dito, talaga namang hindi ko maintindihan. Humahanap lang siya ng gulo... Ang pinag-uusapan, trabaho. Ngayon, pera ang ine-expose niya. (If hes trying to say that hes the only honest man here, then I dont understand what point hes trying to make. Hes just picking a fight. Were talking about his performance, he gets back by exposing funds), the poll chief said.<br />\r\n<br />\r\nAs far as Brillantes was concerned, Lagman accomplished nothing at the poll body. His biggest accomplishment was, he decided a lot of [protest] cases, 400, when hes not even a lawyer, he said in Filipino.', '2013-05-23 11:41:49'),
(36, 'Thesis and Dissertation Grants', 'June 3, 2013 11:00 PM Monday - \nThe 2013 senatorial election is a watershed in the history of the Philippines modern politics. This broad and hasty conclusion must be a running thought among its observers, however premature it may seem, although it will likely be validated after considerable hindsight.<br />\n<br />\nThis election is as much a significant transition in the post-Arroyo era as the 1987 senatorial election was in the post-Marcos era. The first truly electoral exercise after the dictatorship, the 1987 senatorial race led to a resounding victory for the first Aquino presidency.<br />\n<br />\nThe circumstances then and now are of course vastly different. But these two events, more than a generation apart, are scenes in a long and still-ongoing dramedythe morphing of Philippine politics into its present form as a coda of Philippine entertainment.<br />\n<br />\nJoseph Estradas placing 17th in the 1987 senatorial race (then a contest for 24 seats) is a modest showing from our perspective today. Yet it surprised, or perhaps alarmed, his elitist skeptics at the time, and prompted nothing less than Estradas courtesy call with President Cory Aquino.<br />\n<br />\nHis victory was a crack at the high wall of national politics30 years after Rogelio de la Rosas election to the Senate in 1957and it showed the way for his peers in showbiz to literally crowd the political arena, beginning with the Ramos presidency when Estrada became vice president.<br />\n<br />\nYet this tide from showbiz, a distinct phenomenon of post-Marcos democracy, has been a cycle of ebb and risecolliding with that other current in the post-Marcos era, the momentum of civic vigilance that is a continuing legacy of the impassioned anti-Marcos protest movement.<br />\n<br />\nThis clash in the body politic would find its most volatile expression in Edsa Dos, the movement that aborted Estradas presidency, and in the riotous aftermath by Estradas masses that would be acknowledged, if grudgingly by some, as Edsa Tres.<br />\n<br />\nIn retrospect, these events played out in true showbiz fashion, as melodrama or teleserye in the widescreen of politics. This episode also changed, or reshaped, the electorateincluding the masses, to be sure, but more so the conscientious if pedicured class.<br />\n<br />\nWhy their civic vigilance failed to unseat Gloria Macapagal-Arroyo much sooner than her decade-long (as they would say) misrule may be attributed to political fatigue, after they were grossly bummed out by the impunity of said rule and the betrayal of Edsa Dos.<br />\n<br />\nIts not that this and other sectors didnt try to dethrone the most hated president after Ferdinand Marcos. The moment of collective redress finally came in 2010, with the election of Benigno Aquino III a resounding voice spiting GMA.<br />\n<br />\nPopulism and showbiz<br />\n<br />\nEqually telling was how the Second President Aquino signified a sea change, really, in the heretofore divided electorate. For this was a political heir who quite deviated from the classical politics of his family, who has a sister who is a big celebrity, and who embraces the populism now imparted to politics by the showbiz world.<br />\n<br />\nRight upon his inauguration, Noynoy Aquino styled himself as PNoy, at once affirming the culture of jejemon, the youthspeak straight from Orwell that was the vogue in 2010 but has since been eclipsed by our countrys ever-changing cultural lingo. The message nevertheless is clear. Todays political class thrives in populism, speaks and tweets jejenese and its further variations, not necessarily to the bemused horror of the departed Aquino matriarch.<br />\n<br />\nPNoy himself is a grantee of showbiz, thanks to his not-so-little sister. But he has also become his own man, growing in his job as all his predecessors have, and maintaining his favorability with the electorate, even on the heels of such divisive issues as RH and the impeachment trial of Renato Corona.<br />\n<br />\nThese advantages of PNoy throw light into the significance of the 2013 racebecause, like the President, Grace Poe, Loren Legarda and Chiz Escudero are not strictly speaking from showbiz. Yet they have secured and built on their standing through their affiliation with this fieldand their mastery of this game.<br />\n<br />\nFrom the vantage point of their candidacies, one is amazed to realize how far our politics has departed from its fogey past. And how much it has been permeated by the sensibilities of entertainmentlike a metrosexual scent in this otherwise Alpha communitywhich is not at all to be dismissed as an insidious trend, but rather one that refines our politics in its evolving complexity.<br />\n<br />\nYet some facets of old-world politics remain, notably the continuity of the Aquinos and the Angaras and the Binays.<br />\n<br />\nTo be sure, family interests also prevail in showbiz, in business (big and small), and in most other areas of society. Its the preservation impulse among the ruling class at work. And its complicated to Sonny, perhaps, that he is an Angara, because his excellent credentials are surely not exclusive to his person.<br />\n<br />\nStill, our political scene also sorely misses some of its larger-than-life families who have since gone into the twilight, notably the imperious Laurels. Perhaps it can be said that this familys old-school politics is being carried on by their political kin, the Aquinos, who still accord with classicist ideals alongside their populist positioning. How far too theyve gone, as opposed to the persecution and humiliation endured by their earlier generations.', '2013-05-23 11:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE IF NOT EXISTS `proposals` (
  `proposalid` int(250) NOT NULL AUTO_INCREMENT,
  `proponentid` int(250) NOT NULL,
  `status` enum('pending','approved','declined','approvedwcomment','new') NOT NULL,
  `adviserid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `proponents` varchar(250) NOT NULL,
  `field` varchar(250) NOT NULL,
  `duration` int(100) NOT NULL,
  `budget` double NOT NULL,
  `abstract` text NOT NULL,
  `doc` varchar(200) NOT NULL,
  PRIMARY KEY (`proposalid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`proposalid`, `proponentid`, `status`, `adviserid`, `title`, `date`, `proponents`, `field`, `duration`, `budget`, `abstract`, `doc`) VALUES
(1, 10000, 'pending', 1, 'computer biotechnology', '2013-05-14 19:07:38', 'Anacleto, Jamie', 'Computer Science', 60, 20000, 'ksabyagdhasdvhaskdgajdvkjadvahgdvakghdvkahd', './files/UPRISdoc1368586461.pdf'),
(2, 10000, 'pending', 1, 'mouse physics', '2013-05-01 15:44:39', 'Melliza, Frente', 'cmsc', 200, 150000, 'asyufgaouidabudai iaygdua gduays gyuagd uyagduags dua', './files/UPRISdoc1368586461.pdf'),
(3, 10000, 'pending', 0, 'thermodynamics', '2013-05-15 10:17:53', 'Timoteo, Rhodel', 'physics, Chemistry', 120, 500000, ' \r\n\r\najdgsvasj svduavsjd gavgdavhd vajsdhg', './files/UPRISdoc1368586461.pdf'),
(4, 10000, 'pending', 0, 'Information Technology', '2013-05-15 10:54:21', 'Anacleto, J. et.al', 'cmsc', 200, 1200000, 'Her best performance only brought her to the fourth spot in survey results at the height of the campaign period.\r\n\r\nThe Comelec en banc, sitting as the National Board of Canvassers on Monday, released its first tally of certificates of canvass from six areas at about 3:45 p.m. Tuesday.\r\n\r\nThe COCs are from Guimaras, Paranaque, Mandaluyong, Romblon, Iligan City and Dinagata Islands.\r\n\r\nProceedings have been suspended late Monday after polling closed, pending the transmission of election returns from boards of canvassers in provinces and highly urbanized cities.', './files/UPRISdoc1368586461.pdf'),
(5, 10000, 'pending', 0, 'cyber crime', '2013-05-15 14:35:31', 'Sotto, V.', 'IT', 30, 130000, ' \r\nasdbj\r\n', './files/UPRISdoc1368586461.pdf'),
(6, 10000, 'new', 0, 'avvhadgaj', '2013-05-15 15:24:28', 'gsdfjgsjh', 'jdfgsjfg', 23123, 432743298, ' \r\n\r\ndfdssfs', './files/UPRISdoc1368602668.docx'),
(7, 10000, 'approved', 0, 'robotics', '2013-05-16 14:24:42', 'Anacleto, J.', 'Computer Science', 120, 150000, ' dkfbgsifsbfk\r\n', './files/UPRISdoc1368586461.pdf'),
(8, 10000, 'new', 0, 'pedophilia', '2013-05-16 15:34:21', 'Timoteo, R.T.', 'Social Science', 180, 12000, 'baskdbaskhdg akusd  agsdkuasyg das gdasjdhg asdakjshdba', './files/UPRISdoc1368689661.docx'),
(9, 10000, 'new', 0, 'sdgakdbh', '2013-05-16 15:39:40', 'khkdfbgsjhfs', 'kjhgfjskfjhg', 121, 341312, 'sadasda', './files/UPRISdoc1368689980.docx'),
(10, 10000, 'approved', 0, 'asdhgjsg', '2013-05-16 16:34:20', 'gdjfgshfgsj', 'shdgfjdhgf', 2321, 43232, 'sadadas', './files/UPRISdoc1368693260.docx'),
(11, 10000, 'new', 0, 'asdhgjsg', '2013-05-16 16:34:44', 'gdjfgshfgsj', 'shdgfjdhgf', 2321, 43232, 'sadadas', './files/UPRISdoc1368693284.docx'),
(12, 10000, 'approved', 0, 'object trial', '2013-05-16 16:36:22', 'asjdkgfd', 'yutduyt', 123, 12313, 'asdad', './files/UPRISdoc1368693382.docx'),
(13, 10000, 'new', 0, 'trirlasda', '2013-05-16 16:36:55', 'agddfa', 'uydtu', 23, 214321, 'asdgafdja', './files/UPRISdoc1368693415.docx'),
(14, 10000, 'new', 0, 'trytryrtrytryt', '2013-05-16 16:37:14', 'yertffgv', 'gdvgfvhs', 123, 32432, 'arsadd', './files/UPRISdoc1368693434.docx'),
(15, 10000, 'new', 0, 'bla bla bla', '2013-05-16 16:37:42', 'yertffgv', 'gdvgfvhs', 123, 32432, 'arsadd', './files/UPRISdoc1368693462.docx'),
(16, 10000, 'declined', 0, 'asdfad', '2013-05-16 16:38:03', 'yertffgv', 'gdvgfvhs', 123, 32432, 'arsadd', './files/UPRISdoc1368693483.docx'),
(17, 10000, 'approved', 0, 'IT shit', '2013-05-21 09:15:25', 'jamie', 'cmsc', 120, 3871298, 'dsfugaidah', './files/UPRISdoc1369098925.docx'),
(18, 10000, 'approved', 0, 'bla bla', '2013-05-22 10:17:41', 'me', 'cmsc', 120, 746287, 'sakjdhga ajg jhadaj', './files/UPRISdoc1369189061.docx'),
(19, 10000, 'approved', 0, 'latest', '2013-05-22 16:57:45', 'lolz', 'cmsc', 123, 214312, 'ada', './files/UPRISdoc1369213065.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `reviewerinfo`
--

CREATE TABLE IF NOT EXISTS `reviewerinfo` (
  `reviewerid` int(250) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `field` varchar(20) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `hash` varchar(1024) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reviewerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30006 ;

--
-- Dumping data for table `reviewerinfo`
--

INSERT INTO `reviewerinfo` (`reviewerid`, `email`, `firstname`, `lastname`, `password`, `field`, `ins`, `hash`, `active`) VALUES
(30000, 'rtim@gmail.com', 'Rhodel', 'Timoteo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'cmsc', 'University Of Germany', '', 1),
(30001, 'review@gmail.com', 'Marko', 'Reviewer', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'cmsc', 'University Of The Philippines', '', 1),
(30002, 'asdhaj@gmail.com', 'Jamie', 'Anacket', '506eedae51d0bdc3be93c6b1c80a8848', 'qphy', 'University Of The Philippines', '', 0),
(30003, 'lala@gmail.com', 'Dino Ma', 'Dagum', '506eedae51d0bdc3be93c6b1c80a8848', 'agr', 'Isudhf Sofhsd', '', 0),
(30004, 'ciamca@example.com', 'Ian Mher', 'Vienna', '6257ff2c04282acdc83a6e7efeaea015', 'cmsc', 'Up Baguio', '', 1),
(30005, 'reviewer', 'Dino', 'Martin', 'password', 'cmsc', 'upsc', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proposalid` int(11) NOT NULL,
  `reviewerid` int(11) NOT NULL,
  `status` enum('approved','declined','noresponse','new') NOT NULL DEFAULT 'new',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `proposalid`, `reviewerid`, `status`) VALUES
(10, 2, 30001, 'new'),
(13, 19, 30001, 'new'),
(14, 4, 30000, 'new'),
(15, 17, 30000, 'new'),
(16, 2, 30000, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `sitf-admin`
--

CREATE TABLE IF NOT EXISTS `sitf-admin` (
  `sitfid` varchar(32) NOT NULL,
  `firstname` varchar(1024) NOT NULL,
  `lastname` varchar(1024) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitf-admin`
--

INSERT INTO `sitf-admin` (`sitfid`, `firstname`, `lastname`, `email`, `password`) VALUES
('', 'John', 'Mayer', 'sitf', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `userid` int(250) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `field` varchar(20) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10008 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `email`, `firstname`, `lastname`, `password`, `field`, `ins`, `active`) VALUES
(10000, 'jamie@gmail.com', 'Jamie', 'Anacleto', 'shaman', 'cmsc', 'University Of The Philippines', 1),
(10001, 'ciamca.20@gmail.com', 'Iamca', 'Cagurangan', '5f4dcc3b5aa765d61d8327deb882cf99', 'agr', 'Up Baguio', 1),
(10002, 'ciamca@yahoo.com', 'Ian Mher', 'Cagurangan', 'password', 'cmsc', 'Up Baguio', 1),
(10005, 'email@yahoo.com', 'Fname', 'Lname', 'qwerty', 'agr', 'Institute', 1),
(10006, 'email1@yahoo.com', 'Fname', 'Lname', 'qwerty', 'agr', 'Institute', 0),
(10007, 'email2@yahoo.com', 'Fname', 'Lname', 'qwerty', 'agr', 'Institute', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
