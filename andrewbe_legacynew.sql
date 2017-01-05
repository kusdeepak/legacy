-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2017 at 03:07 AM
-- Server version: 5.5.52-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `andrewbe_legacynew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `email`, `status`) VALUES
(1, 'admin', '$eoBoyhqtJrNw', 'admin@gmail.com', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `blogId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `seourl` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `imageloc` varchar(225) NOT NULL,
  `displayorder` int(11) NOT NULL,
  `addedon` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`blogId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blogId`, `title`, `subtitle`, `seourl`, `description`, `imageloc`, `displayorder`, `addedon`, `status`) VALUES
(1, 'HEADLINE GOES HERE. THIS CAN BE A FEW LINES.', 'SUBHEADLINE GOES HERE', 'headline-goes-here.-this-can-be-a-few-lines.', '<div class="post-content">\r\n<div class="post-content">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a>incididunt</a> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in <a>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim <a>id est laborum</a>. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p><img alt="" src="../uploads/ckeditorImg/uploads1466427766_blog-image-2.jpg" style="float: left; width: 297px; height: 200px;" />&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a>incididunt</a> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in <a>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim <a>id est laborum</a>. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>\r\n\r\n<h4 class="uppercase">TABLE TITLE</h4>\r\n\r\n<table class="table">\r\n	<thead>\r\n		<tr>\r\n			<th>#</th>\r\n			<th>First Name</th>\r\n			<th>Last Name</th>\r\n			<th>Username</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope="row">1</th>\r\n			<td>Mark</td>\r\n			<td>Otto</td>\r\n			<td>@mdo</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope="row">2</th>\r\n			<td>Jacob</td>\r\n			<td>Thornton</td>\r\n			<td>@fat</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope="row">3</th>\r\n			<td>Larry</td>\r\n			<td>the Bird</td>\r\n			<td>@twitter</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h4 class="uppercase">Subtitle</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a>incididunt</a> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<div class="row">\r\n<div class="col-md-3">\r\n<ul class="li-has-padding">\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-md-6 text-center">\r\n<ul class="li-has-padding">\r\n	<li>Lorem ipsum dolor sit<br />\r\n	amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit<br />\r\n	amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit<br />\r\n	amet enim ad minim</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-md-3">\r\n<ul class="li-has-padding">\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '1_pageimg.jpg', 4, '2016-06-13 03:14:38', 'Y'),
(2, 'This is the blog Title. Blog Title Goes here.', 'Subheadline goes here', 'this-is-the-blog-title.-blog-title-goes-here.', '<div class="post-content">\r\n<div class="post-content">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a>incididunt</a> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in <a>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim <a>id est laborum</a>. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p><img alt="" src="../uploads/ckeditorImg/uploads1466427808_blog-image-2.jpg" style="width: 305px; height: 200px; float: left;" />&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a>incididunt</a> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in <a>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim <a>id est laborum</a>. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>\r\n\r\n<h4 class="uppercase">TABLE TITLE</h4>\r\n\r\n<table class="table">\r\n	<thead>\r\n		<tr>\r\n			<th>#</th>\r\n			<th>First Name</th>\r\n			<th>Last Name</th>\r\n			<th>Username</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope="row">1</th>\r\n			<td>Mark</td>\r\n			<td>Otto</td>\r\n			<td>@mdo</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope="row">2</th>\r\n			<td>Jacob</td>\r\n			<td>Thornton</td>\r\n			<td>@fat</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope="row">3</th>\r\n			<td>Larry</td>\r\n			<td>the Bird</td>\r\n			<td>@twitter</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h4 class="uppercase">Subtitle</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a>incididunt</a> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<div class="row">\r\n<div class="col-md-3">\r\n<ul class="li-has-padding">\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-md-6 text-center">\r\n<ul class="li-has-padding">\r\n	<li>Lorem ipsum dolor sit<br />\r\n	amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit<br />\r\n	amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit<br />\r\n	amet enim ad minim</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-md-3">\r\n<ul class="li-has-padding">\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '2_pageimg.jpg', 2, '2016-06-14 02:31:48', 'Y'),
(3, 'This is the blog Title. Blog Title Goes here.', 'Subheadline goes here', 'this-is-the-blog-title.-blog-title-goes-here.-1', '<div class="post-content">\r\n<div class="post-content">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a>incididunt</a> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in <a>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim <a>id est laborum</a>. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p><img alt="" src="../uploads/ckeditorImg/uploads1466426877_blog-image-2.jpg" style="width: 305px; height: 200px; float: left;" />&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a>incididunt</a> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in <a>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim <a>id est laborum</a>. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>\r\n\r\n<h4 class="uppercase">TABLE TITLE</h4>\r\n\r\n<table class="table">\r\n	<thead>\r\n		<tr>\r\n			<th>#</th>\r\n			<th>First Name</th>\r\n			<th>Last Name</th>\r\n			<th>Username</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th scope="row">1</th>\r\n			<td>Mark</td>\r\n			<td>Otto</td>\r\n			<td>@mdo</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope="row">2</th>\r\n			<td>Jacob</td>\r\n			<td>Thornton</td>\r\n			<td>@fat</td>\r\n		</tr>\r\n		<tr>\r\n			<th scope="row">3</th>\r\n			<td>Larry</td>\r\n			<td>the Bird</td>\r\n			<td>@twitter</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h4 class="uppercase">Subtitle</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a>incididunt</a> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<div class="row">\r\n<div class="col-md-3">\r\n<ul class="li-has-padding">\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-md-6 text-center">\r\n<ul class="li-has-padding">\r\n	<li>Lorem ipsum dolor sit<br />\r\n	amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit<br />\r\n	amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit<br />\r\n	amet enim ad minim</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="col-md-3">\r\n<ul class="li-has-padding">\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n	<li>Lorem ipsum dolor sit amet enim ad minim</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '3_pageimg.jpg', 3, '2016-06-14 02:32:22', 'Y'),
(5, 'Legacy Converting visited by Lt. Governor Kim Guadagno in recognition of being one of New Jersey&#39;s fastest growing companies.', '', 'legacy-converting-visited-by-lt.-governor-kim-guadagno-in-recognition-of-being-one-of-new-jersey''s-fastest-growing-companies.', '<p>&nbsp;</p>\r\n\r\n<h6 style="color: rgb(0, 0, 0); font-family: Arial; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><span style="font-size: medium;">1/28/2014</span></h6>\r\n\r\n<h6 style="color: rgb(0, 0, 0); font-family: Arial; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><span style="font-size: large;"><a href="http://campaign.r20.constantcontact.com/render?ca=1cbd266d-3c7b-4a9b-8af7-6469664ceec7&amp;c=fa7e96e0-5e58-11e3-8359-d4ae529a826e&amp;ch=facc41b0-5e58-11e3-8363-d4ae529a826e">Legacy Converting visited by Lt. Governor Kim Guadagno in recognition of being one of New Jersey&#39;s fastest growing companies.</a></span></h6>\r\n\r\n<p><strong><font size="4"><span style="font-family: Arial"><font size="3"><span style="font-weight: normal"><span style="font-weight: normal"><font size="3"><span style="font-weight: normal"><font size="3"><span style="font-weight: normal"><font size="3"><font size="4"><font size="5"><img alt="" src="../uploads/ckeditorImg/uploads1412774861_2n5h.jpg" /></font></font></font></span></font></span></font></span></span></font></span></font></strong></p>\r\n\r\n<h6><span style="font-size:12px;">For the full press release:<a href="http://www.state.nj.us/governor/news/news/552014/approved/20140128b.html">http://www.state.nj.us/governor/news/news/552014/approved/20140128b.html</a>&nbsp;</span></h6>\r\n\r\n<h6><span style="font-size:12px;">For all media and photos: <a href="http://www.state.nj.us/governor/media/photos/2014/20140128b.shtml">http://www.state.nj.us/governor/media/photos/2014/20140128b.shtml</a></span></h6>\r\n\r\n<p><strong><img alt="" src="../uploads/ckeditorImg/uploads1412774931_qbw8.jpg" /></strong></p>\r\n\r\n<h6 class="uiStreamMessage" style="text-align: left"><span style="font-size: medium"><span style="font-family: Arial"><span style="font-size: small"><span style="font-weight: normal"><span style="font-weight: normal"><span style="font-size: small"><span style="font-weight: normal"><span style="font-size: small"><span style="font-weight: normal"><span style="font-size: small"><span style="font-size: medium">9/30/2013<br />\r\nSeptember&nbsp;Idea of the Month</span></span></span></span></span></span></span></span></span></span></span></h6>\r\n\r\n<p><span style="font-size:14px;">Each month Legacy Converting invites its employees to submit ideas that will help improve productivity and ultimately to reinforce our mission statement ---To build world class relationships and unparalleled flexibility while &ldquo;making it happen&rdquo; each and every day.</span></p>\r\n\r\n<p>The employee of the month will receive a discretionary bonus as well as a donation in their honor made to a charitable foundation of their choosing.</p>\r\n\r\n<h6><span style="font-size:12px;">Past charitable foundations include:</span></h6>\r\n\r\n<p>ASPCA</p>\r\n\r\n<p>St. Jude&#39;s Children&#39;s Hospital</p>\r\n\r\n<p>Cancer Care</p>\r\n\r\n<p>Against Malaria</p>\r\n\r\n<p>Alex&#39;s Lemonade Stand</p>\r\n\r\n<p>Humane Society of Atlantic County</p>\r\n\r\n<p>Lupus Foundation of America</p>', '5_pageimg.jpg', 1, '2016-06-20 08:10:34', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_img` varchar(255) NOT NULL,
  `brand_banner_img` varchar(255) NOT NULL,
  `brand_inner_img` varchar(255) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brand_name`, `brand_desc`, `brand_img`, `brand_banner_img`, `brand_inner_img`) VALUES
(5, 'Everwipe Supercharged Series', '<ul>\r\n	<li>\r\n	<p>Professional Grade Wiping products engineered to perform in almost any work environment.</p>\r\n	</li>\r\n	<li>\r\n	<ul class="home-brand-bullets">\r\n		<li>Professional Wiping Series</li>\r\n		<li>Integrated Dispensing Systems</li>\r\n		<li>Retail Grade Packaging</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '5_ev_prem.png', '5_brand_Super.jpg', '5_ev-supercharged-banner.jpg'),
(6, 'Everwipe Fusion Series', '<ul>\r\n	<li>\r\n	<p>Fusion series offers a true &quot;cloth-like&quot; replacement towel that is strong enough for general cleaning and soft enough for the hands and face.</p>\r\n	</li>\r\n	<li>\r\n	<ul class="home-brand-bullets">\r\n		<li>Made from 100% Recycled content</li>\r\n		<li>7x&#39;s the absorbency of paper towels.</li>\r\n		<li>Universal, cost effective wiper and hand towel combined.</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '6_ev_fusion.png', '6_brand_Fusion.jpg', '6_everwipe-fusion-banner.jpg'),
(7, 'Everwipe Premium Paper Towel Series', '<ul>\r\n	<li>\r\n	<p>A premium Paper Towel line that delivers the highest quality product and packaging while minimizing our environmental footprint.</p>\r\n	</li>\r\n	<li>\r\n	<ul class="home-brand-bullets">\r\n		<li>Eco-Tech T.A.D. technology.</li>\r\n		<li>100% Recycled on select lines.</li>\r\n		<li>Universal and Proprietary Dispensers.</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '7_ev_prem_paper.png', '7_brand_Prem.jpg', '7_everwipe-premium-banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brochure`
--

DROP TABLE IF EXISTS `brochure`;
CREATE TABLE IF NOT EXISTS `brochure` (
  `brochureId` int(11) NOT NULL AUTO_INCREMENT,
  `brochure_name` varchar(255) NOT NULL,
  `brochure_file` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`brochureId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `brochure`
--

INSERT INTO `brochure` (`brochureId`, `brochure_name`, `brochure_file`, `filename`) VALUES
(6, 'Everwipe Supercharged Wiper Series', '6_EverWipeBrochure.pdf.pdf', 'EverWipeBrochure.pdf'),
(7, 'Chem-Ready Brochure', '7_Chem-Ready Flyer.pdf.pdf', 'Chem-Ready Flyer.pdf'),
(8, 'Everwipe Premium Paper Towel Series', '8_Everwipe PPT Series Binder lo res.pdf', 'Everwipe PPT Series Binder lo res.pdf'),
(9, 'Everwipe Fusion Series Brochure', '9_Fusion flyer.pdf', 'Fusion flyer.pdf'),
(10, 'Food Service Series Brochure', '10_FST Brochure.pdf', 'FST Brochure.pdf'),
(11, 'Disinfectant Wipe Brochure', '11_10100 Disinfectant Brochure.pdf.pdf', '10100 Disinfectant Brochure.pdf.pdf'),
(12, 'Legacy Converting Brochure', '12_Legacy Converting Brochure.pdf', 'Legacy Converting Brochure.pdf'),
(13, 'Guest Towel Brochure', '13_Guest Towel Brochure.pdf', 'Guest Towel Brochure.pdf'),
(14, 'Guest Towel Proof Brochure', '14_Guest towel proof.pdf', 'Guest towel proof.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `imgloc` varchar(255) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `category_name`, `Description`, `imgloc`, `imagename`) VALUES
(1, 'Paper Towels', 'A full line of highly innovative roll towels that offer premium quality and environmentally friendly restroom solution .', '1.jpg', 'prod_Paper.jpg'),
(2, 'Dry Towels', 'A full line of wiping products engineered to accomplish nearly any wiping task.', '2.jpg', 'prod_Dry.jpg'),
(3, 'Wet Wipes', 'A full line of pre-saturated wiping products to keep the environment clean, healthy, and safe.', '3.jpg', 'test banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

DROP TABLE IF EXISTS `industries`;
CREATE TABLE IF NOT EXISTS `industries` (
  `industriesId` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) NOT NULL,
  `industries_name` varchar(255) NOT NULL,
  `industries_img_name` varchar(255) NOT NULL,
  `imgname` varchar(255) NOT NULL,
  `small_description` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `display_order` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`industriesId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`industriesId`, `parentId`, `industries_name`, `industries_img_name`, `imgname`, `small_description`, `description`, `display_order`, `status`) VALUES
(1, 0, 'Health Care', '1.jpg', 'ind_health.jpg', 'This is a secondary headline.', '<p><span style="color: rgb(119, 120, 123); font-family: HelveticaNeue, Arial, sans-serif; font-size: 16px; line-height: 24px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt sodales dolor ac vestibulum. Proin eu felis odio. Nulla ut tortor ante. Vivamus tristique erat ac lectus commodo egestas. Aenean malesuada.</span></p>', 1, 'Y'),
(2, 0, 'Food Service', '2.jpg', 'ind_food.jpg', 'This is a secondary headline.', '<p><span style="color: rgb(119, 120, 123); font-family: HelveticaNeue, Arial, sans-serif; font-size: 16px; line-height: 24px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt sodales dolor ac vestibulum. Proin eu felis odio. Nulla ut tortor ante. Vivamus tristique erat ac lectus commodo egestas. Aenean malesuada.</span></p>', 2, 'Y'),
(3, 0, 'Work Place', '3.jpg', 'ind_work.jpg', 'This is a secondary headline.', '<p><span style="color: rgb(119, 120, 123); font-family: HelveticaNeue, Arial, sans-serif; font-size: 16px; line-height: 24px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt sodales dolor ac vestibulum. Proin eu felis odio. Nulla ut tortor ante. Vivamus tristique erat ac lectus commodo egestas. Aenean malesuada.</span></p>', 3, 'Y'),
(4, 0, 'Hospitality', '4.jpg', 'ind_hos.jpg', 'This is a secondary headline.', '<p><span style="color: rgb(119, 120, 123); font-family: HelveticaNeue, Arial, sans-serif; font-size: 16px; line-height: 24px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt sodales dolor ac vestibulum. Proin eu felis odio. Nulla ut tortor ante. Vivamus tristique erat ac lectus commodo egestas. Aenean malesuada.</span></p>', 4, 'Y'),
(5, 0, 'Technology', '5.jpg', 'ind_tech.jpg', 'This is a secondary headline.', '<p><span style="color: rgb(119, 120, 123); font-family: HelveticaNeue, Arial, sans-serif; font-size: 16px; line-height: 24px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt sodales dolor ac vestibulum. Proin eu felis odio. Nulla ut tortor ante. Vivamus tristique erat ac lectus commodo egestas. Aenean malesuada.</span></p>', 5, 'Y'),
(11, 1, 'Dietary', '', '', '', '', 0, 'Y'),
(12, 1, 'House Keeping', '', '', '', '', 1, 'Y'),
(13, 1, 'Infection Control/OR', '', '', '', '', 2, 'Y'),
(14, 1, 'Restroom', '', '', '', '', 3, 'Y'),
(15, 1, 'Maintenance', '', '', '', '', 4, 'Y'),
(16, 1, 'Nursing', '', '', '', '', 5, 'Y'),
(17, 2, 'Restaurant', '', '', '', '', 0, 'Y'),
(18, 2, 'Food Processing', '', '', '', '', 1, 'Y'),
(19, 2, 'Food Feeder', '', '', '', '', 2, 'Y'),
(20, 2, 'Catering', '', '', '', '', 3, 'Y'),
(21, 2, 'Cafeteria', '', '', '', '', 4, 'Y'),
(22, 4, 'Hotels/Lodging', '', '', '', '', 0, 'Y'),
(23, 4, 'Country Clubs', '', '', '', '', 1, 'Y'),
(24, 4, 'Entertainment/Recreation: stadiums, Museums, amusement parks', '', '', '', '', 3, 'Y'),
(25, 4, 'Gyms', '', '', '', '', 4, 'Y'),
(26, 5, 'Aerospace', '', '', '', '', 1, 'Y'),
(27, 5, 'Pharma', '', '', '', '', 2, 'Y'),
(28, 5, 'Micro Processing', '', '', '', '', 3, 'Y'),
(29, 5, 'Laboratory/R&D', '', '', '', '', 4, 'Y'),
(30, 3, 'Manufacturing', '', '', '', '', 0, 'Y'),
(31, 3, 'Automotive', '', '', '', '', 1, 'Y'),
(32, 3, 'Marine', '', '', '', '', 2, 'Y'),
(33, 3, 'Education', '', '', '', '', 3, 'Y'),
(34, 3, 'Office', '', '', '', '', 4, 'Y'),
(35, 3, 'Government', '', '', '', '', 5, 'Y'),
(36, 3, 'Pharma', '', '', '', '', 6, 'Y'),
(37, 3, 'Aviation', '', '', '', '', 7, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `jobId` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`jobId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `post_name`, `description`, `date`) VALUES
(1, 'Director of New Business Development', '', '2014-10-15 03:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `msds`
--

DROP TABLE IF EXISTS `msds`;
CREATE TABLE IF NOT EXISTS `msds` (
  `msdsId` int(11) NOT NULL AUTO_INCREMENT,
  `msds_name` varchar(255) NOT NULL,
  `msds_file` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`msdsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `msds`
--

INSERT INTO `msds` (`msdsId`, `msds_name`, `msds_file`, `filename`) VALUES
(1, '606 series product spec sheet', '1_606 series product spec sheet.pdf', '606 series product spec sheet.pdf'),
(2, 'msds sheet on Gen Series paper', '2_msds sheet on Gen Series paper.r1.pdf', 'msds sheet on Gen Series paper.r1.pdf'),
(3, 'MSDS Yellow Duster 909 series', '3_MSDS Yellow Duster 909 series.R1.pdf', 'MSDS Yellow Duster 909 series.R1.pdf'),
(4, 'MSDS 202,303,404,505 DRC Material', '4_series 202,303,404,505 msds (2).pdf', 'series 202,303,404,505 msds (2).pdf'),
(5, 'T.A.D. Paper MSDS', '5_T.A.D. MSDSr.1.pdf', 'T.A.D. MSDSr.1.pdf'),
(6, 'G6,G7,G8 Series MSDS', '6_G6, G7, G8 Series Nonwoven Fabrics MSDS.pdf', 'G6, G7, G8 Series Nonwoven Fabrics MSDS.pdf'),
(7, 'Disinfectant wipe MSDS', '7_Everwipe Disinfectant MSDS.pdf', 'Everwipe Disinfectant MSDS.pdf'),
(8, 'Disinfectant wipe Efficacy data sheet', '8_10100 Efficacy Sheets.pdf.pdf', '10100 Efficacy Sheets.pdf.pdf'),
(9, 'Chem-Ready', '9_MSDS - Chem-Ready2.pdf', 'MSDS - Chem-Ready2.pdf'),
(10, '01-690 MSDS Sheet', '10_01-690 MSDS Sheet.pdf', '01-690 MSDS Sheet.pdf'),
(11, 'test msdn', '11_msds sheet on Gen Series paper.pdf', 'msds sheet on Gen Series paper.pdf'),
(12, '04105 MSDS', '12_04105 MSDS.pdf', '04105 MSDS.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `date`, `status`) VALUES
(3, 'gwen@hintonsales.com', '2015-03-03 20:09:23', 'Y'),
(4, 'gwen@hintonsales.com', '2015-03-03 20:09:28', 'Y'),
(5, 'aapapr@aol.com', '2015-07-23 14:32:25', 'Y'),
(6, 'jburnett@ecologyworks.com', '2015-10-21 20:29:55', 'Y'),
(8, 'aa@g.co', '2016-05-30 12:09:52', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `newslettertopic`
--

DROP TABLE IF EXISTS `newslettertopic`;
CREATE TABLE IF NOT EXISTS `newslettertopic` (
  `newletter_topic_id` int(2) NOT NULL AUTO_INCREMENT,
  `news_letter_topic_title` varchar(255) NOT NULL,
  `news_letter_topic` text NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`newletter_topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `newslettertopic`
--

INSERT INTO `newslettertopic` (`newletter_topic_id`, `news_letter_topic_title`, `news_letter_topic`, `status`) VALUES
(1, 'test topic', '<p>ddddd ssss</p>', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `pageId` int(11) NOT NULL AUTO_INCREMENT,
  `menutitle` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seourl` varchar(255) NOT NULL,
  `showtitle` enum('Y','N') NOT NULL DEFAULT 'Y',
  `description` text NOT NULL,
  `imageloc` varchar(225) NOT NULL,
  `metatitle` text NOT NULL,
  `metakeyword` text NOT NULL,
  `metadescription` text NOT NULL,
  `displayorder` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`pageId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageId`, `menutitle`, `title`, `seourl`, `showtitle`, `description`, `imageloc`, `metatitle`, `metakeyword`, `metadescription`, `displayorder`, `status`) VALUES
(1, '', 'WHY LEGACY', 'why-legacy', 'Y', '<p><span style="color: rgb(128, 128, 128); font-family: AzoSans, sans-serif; font-size: 16px; line-height: 24px; text-align: center;">We create value for you by giving your customer the right product for their application.</span></p>', '1_pageimg.jpg', '', '', '', 1, 'Y'),
(2, '', 'COMPARE OUR PRODUCTS WITH THE COMPETITION', 'compare-our-products-with-the-competition', 'Y', '<p><span style="color: rgb(119, 120, 123); font-family: HelveticaNeue, Arial, sans-serif; font-size: 16px; line-height: 24px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt sodales dolor ac vestibulum. Proin eu felis odio. Nulla ut tortor ante. Vivamus tristique erat ac lectus commodo egestas. Aenean malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></p>', '2_pageimg.jpg', '', '', '', 4, 'Y'),
(3, '', 'WHY WE DO IT', 'why-we-do-it', 'Y', '<p>To build world class relationships and unparalleled flexibility while &ldquo;making it happen&rdquo; each and every day.</p>', '3_pageimg.jpg', '', '', '', 2, 'Y'),
(4, '', 'HOW WE DO IT', 'how-we-do-it', 'Y', '<p>A world-class manufacturing facility geared toward every wiping solution located in New Jersey with a West Coast distribution&nbsp;center in California.</p>', '4_pageimg.jpg', '', '', '', 3, 'Y'),
(8, '', 'Careers', 'careers', 'Y', '<p>Legacy Converting is a growing and innovative company that is actively seeking skilled employees who value an environment that rewards hard work, critical thinking, continuous improvement, and team building. Our unique corporate atmosphere is built on lean principles which advocate for a &quot;bottom-up&quot; approach where every employee is important, and every employee plays a critical role in our success.</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h2>Benefits of working for Legacy Converting:</h2>\r\n\r\n<ul>\r\n	<li>A growing and stable company with plenty of room for advancement.</li>\r\n	<li>Competitive compensation and performance based advancement as a standard.</li>\r\n	<li>Comprehensive Medical benefits for Full-Time employees.</li>\r\n	<li>Continuous improvement and training programs for qualifying employees.</li>\r\n</ul>\r\n\r\n<h1>&nbsp;</h1>\r\n\r\n<h1>JOB POSTINGS</h1>\r\n\r\n<h2>Director of New Business Development</h2>\r\n\r\n<p><a href="http://beckandstone.com/dev/legacy/apply.php"><img alt="Apply" src="http://beckandstone.com/dev/legacy/images/carapp_btn.png" /> </a></p>', '', '', '', '', 6, 'Y'),
(7, '', 'About Us', 'about-us', 'Y', '<p>Legacy is proud to employ Lean Manufacturing and Six Sigma principles to guarantee our products will be fabricated to exacting standards, with minimal waste, and expedited delivery times. With over 150,000 s.f of converting and distribution capabilities on both coasts, Legacy is strategically situated to manufacture and deliver products quickly. With machinery assets encompassing an array of slitter/rewinders, folding machines, sheeters, interfolders and packaging lines, our highly flexible converting equipment offers a breadth of innovative wiping products with many private labeling options and the ability to produce in short runs and quick turnaround times.</p>\r\n\r\n<p><strong>QUALITY</strong></p>\r\n\r\n<p style="margin-left: 40px;">Legacy recognizes that &quot;what you see&quot; is not always &quot;what you get&quot; from other vendors. The cornerstone of our converting philosophy is that quality delivered 100% of the time translates into 100% customer satisfaction. Legacy guarantees the product you sampled is the product your customers will receive.</p>\r\n\r\n<p><strong>RELIABILITY</strong></p>\r\n\r\n<p style="margin-left: 40px;">Direct lines of communication between the sales department, manufacturing, and warehousing means that no orders are booked until all team members have committed to the orders fulfillment within a specified time. When you place an order with us, it is as good as delivered on or before the promised delivery date. Guaranteed.</p>\r\n\r\n<p><strong>CONVENIENCE</strong></p>\r\n\r\n<p style="margin-left: 40px;">Whether you are a local customer who prefers to save money by picking up with your own truck or one of our global business partners around the world, Legacy is strategically located to get your products delivered within budget. Our 70,000 s.f. state of the art manufacturing and distribution facility is located in Cranbury, NJ. Only several miles away from both NYC and Port Elizabeth, NJ, this facility allows for both convenient pick up for our Tri-State distribution partners or expedited international delivery. Our distribution location in Anaheim, CA enables us to stock many products and offset freight costs to our West Coast customers as well.</p>\r\n\r\n<p><strong>GLOBAL RESOURCES</strong></p>\r\n\r\n<p style="margin-left: 40px;">With over 40 years of building strong partnerships with the non-woven and paper mills worldwide, Legacy Converting has developed a relationship of integrity and trust with its manufacturing liaisons second to none. These alliances mean that adequate supply chains and low minimum quantity orders are never an issue at Legacy Converting.</p>\r\n\r\n<p><strong>INNOVATIVE IDEAS</strong></p>\r\n\r\n<p style="margin-left: 40px;">In a competitive industry such as ours, you need a dynamic team in both the sales and manufacturing sectors to stay fresh and ahead of the competition. Legacy&#39;s sales team has the expertise to develop novel marketing strategies and the unique product packaging to succeed in today&#39;s marketplace. Our manufacturing division has the flexibility and tenacity to make it all possible and help you deliver value to your customers.</p>\r\n\r\n<p><a href="vision.php">Our Vision and Philosophy </a></p>', '', '', '', '', 5, 'Y'),
(6, '', 'Terms & Conditions', 'terms-&-conditions', 'Y', '<p>\r\n<style type="text/css">p.p1 {margin: 0.0px 0.0px 10.0px 0.0px; text-align: center; font: 14.0px Verdana; color: #000000; -webkit-text-stroke: #000000} p.p2 {margin: 0.0px 0.0px 10.0px 0.0px; font: 10.0px Verdana; color: #000000; -webkit-text-stroke: #000000} p.p3 {margin: 0.0px 0.0px 10.0px 30.0px; text-indent: -30.0px; font: 10.0px Verdana; color: #000000; -webkit-text-stroke: #000000} p.p4 {margin: 0.0px 0.0px 10.0px 60.0px; text-indent: -30.0px; font: 10.0px Verdana; color: #000000; -webkit-text-stroke: #000000} p.p5 {margin: 0.0px 0.0px 10.0px 30.0px; font: 10.0px Verdana; color: #000000; -webkit-text-stroke: #000000} p.p6 {margin: 0.0px 0.0px 10.0px 0.0px; font: 14.0px Verdana; color: #000000; -webkit-text-stroke: #000000} li.li2 {margin: 0.0px 0.0px 10.0px 0.0px; font: 10.0px Verdana; color: #000000; -webkit-text-stroke: #000000} span.s1 {font-kerning: none} span.s2 {font: 10.0px Verdana; text-decoration: underline ; font-kerning: none; color: #0000ff; -webkit-text-stroke: 0px #0000ff} span.s3 {font: 11.0px Verdana; font-kerning: none} span.s4 {font: 12.0px Helvetica; color: #000000} span.Apple-tab-span {white-space:pre}\r\n</style>\r\n</p>\r\n\r\n<p class="p1">&nbsp;</p>', '', '', '', '', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `pId` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `sheet_size` varchar(255) NOT NULL,
  `items_per_each` int(11) NOT NULL,
  `each_per_ship_unit` int(11) NOT NULL,
  `each_dimension` varchar(255) NOT NULL,
  `case_total_pcs` varchar(255) NOT NULL,
  `case_dimension` varchar(255) NOT NULL,
  `case_weight` varchar(255) NOT NULL,
  `pallet_unit_quantity` int(11) NOT NULL,
  `pallet_dimensions` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `features_benefits` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `series_brochure` int(11) NOT NULL,
  `MSDS` int(11) NOT NULL,
  `barcodeimage` varchar(255) NOT NULL,
  `brands` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `featured_product` enum('Y','N') NOT NULL DEFAULT 'N',
  `related_products` varchar(225) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `producttype` varchar(255) NOT NULL,
  `addedon` datetime NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `pId`, `pname`, `sheet_size`, `items_per_each`, `each_per_ship_unit`, `each_dimension`, `case_total_pcs`, `case_dimension`, `case_weight`, `pallet_unit_quantity`, `pallet_dimensions`, `product_description`, `features_benefits`, `product_image`, `series_brochure`, `MSDS`, `barcodeimage`, `brands`, `category`, `featured_product`, `related_products`, `industry`, `producttype`, `addedon`) VALUES
(1, '01-690', '01-690', '12', 90, 6, '6.25"H x 6" O.D.', '540', '19.25"x13.13"x7.14"', '6.5', 77, '40"x48"x85"', 'Everwipe''s Chem-Ready material is specifically designed to work with all different types of sanitizers and disinfectants.  This high end material performs like a wiper but does not bind quaternary chemicals like ordinary towels and wipers.  The apertures also allow the material to trap particles from surface wiping.', 'Everwipe''s Chem-ready delivery system allows you to create your own wet wipe system with whatever surfactant you see fit. Greatly reduces surface cross contamination of pathogens. The small roll put when used with the Chem ready buckets is extremely portable and easily resealed to prevent spilling.\r\n\r\nIdeal for Quat, Bleach, and Phenol-based compounds.\r\n\r\nGreatly reduces surface cross-contamination of pathogens.', '1_01-690.jpg', 7, 0, '1_barcode.png', '5', '2', 'Y', '2,4,7,9', '1,11,12,13,14,2,17,18,19,20,21,3,36,4,5', '1,2,5,7', '2014-10-10 11:08:58'),
(2, '04100', '04100', '21.5', 150, 1, '14.5"x11"x6"', '150', '14.5"x11"x6"', '3.5', 177, '', 'Medium Duty White FST Towels with Red Stripe. 21.5"x12.5" sheet size. 150 sheets/case.', '', '2_04100.jpg', 10, 0, '', '5', '2', 'Y', '', '1,2,3,4,5', '', '2014-10-10 11:11:33'),
(3, '404-50', '404-50', '9', 650, 2, '9"x12.5"OD', '1300', '26.5"x13.5"x9.63"', '8.5', 48, '54.25"x40.5"x82.5"', 'Two white centerpull jumbo rolls of Heavyweight DRC Wipers. These rolls can be dispensed from a stand (as shown) or from a jumbo centerpull dispenser.\r\n\r\n2 rolls/case. Stands sold separately.', 'A heavier grade DRC wiper than the 202 series. \r\n\r\nThis wiper offers all of the same benefits of its counterpart but can withstand heavier wiping environments and offers increased absorption capacities. \r\n\r\nIdeally suited for polishing, glazing, paint prep, and solvent based tasks. \r\n\r\nStrong enough for the toughest industrial setting while soft enough for use on the hands and face.', '3_1300-50.jpg', 6, 0, '', '5', '2', 'N', '', '2,3,4,5', '', '2014-10-10 11:14:27'),
(4, '04105', '04105', '21.5', 200, 1, '14.5"x11"x6"', '200', '14.5"x11"x6"', '3.5', 117, '', 'Light Weight Carded Rayon FST Towels. Red and white. 21.5"x12.5" sheet size. 200 sheets/case.', '', '4_04105.jpg', 10, 0, '', '5', '2', 'Y', '', '11,17,18,19,20,21,22,23', '', '2014-10-11 09:04:00'),
(6, '10-BKT-2', '10-BKT-2', '', 0, 2, '8.75"x10.5" OD Bucket', '2', '12.5"x12.5"x11.5"', '3', 54, '', 'Dispenser Bucket with Resealable Lid. Each bucket fits 1 roll of 10-100 disinfectant.', '', '6_10-BKT-2.jpg', 11, 0, '', '5', '2,3', 'N', '', '1,2,3,4', '', '2014-10-11 09:09:32'),
(7, 'PRO-NT-8-E', 'PRO-NT-8-E', '', 1, 1, '15.75"x12.25"x9.25"', '1', '', '8', 36, '', 'Universal 8" Electronic Hands-Free Dispenser. Fits proprietary rolls.', '', '7_PRO-NT-8-E.jpg', 8, 0, '', '7', '1', 'N', '', '1,2,3,4,10,5', '', '2014-10-16 01:51:42'),
(8, 'PRO-NT-10-E', 'PRO-NT-10-E', '', 1, 1, '16.2"x14.6"x9.25"', '1', '', '12', 28, '', 'Universal 10" Electronic Hands-Free Dispenser. Fits proprietary rolls.', '', '8_PRO-NT-10-E.jpg', 8, 0, '', '7', '1', 'N', '', '1,2,3,4,10,5', '', '2014-10-16 01:56:34'),
(9, 'PRO-3000-8', 'PRO-3000-8', 'N/A', 1, 6, '7.875"H x 7.5"OD', '6', '23"x15.38"x8.88"', '14', 45, '48"x40"x83.65"', 'Everwipe''s Premium White T.A.D. 8" Proprietary Hand Towel Rolls w/ Stub. 6 rolls/case. Can only be used in PRO-Series Dispensers.', 'Everwipe Premium Paper Products incorporate Eco-Tech design; which helps reduce waste and is more environmentally friendly.\r\n\r\nMax Pak engineering reduces CO2 emissions in transportation by shipping more product and less air!\r\n\r\nUp to 40% less waste compared to conventional paper towels when used with Everwipe''s proprietary dispensing systems.\r\n\r\nTAD manufacturing process uses nearly 30% less paper through a proprietary drying process...Less paper pulp means fewer trees are used!', '9_p3000-8-w-box.jpg', 6, 5, '', '7', '1', 'N', '', '1,2,3,4,10,5', '', '2014-10-16 02:00:56'),
(10, 'PRO-3000-10', 'PRO-3000-10', 'N/A', 1, 6, '9.875"H x 7.5"OD', '6', '23"x15.38"x10.88"', '18', 35, '48"x40"x80.13"', 'Everwipe''s Premium White T.A.D. 10" Proprietary Hand Towel Rolls w/ Stub. 6 rolls/case. Can only be used in PRO-Series Dispensers.', 'Everwipe Premium Paper Products incorporate Eco-Tech design; which helps reduce waste and is more environmentally friendly.\r\n\r\nMax Pak engineering reduces CO2 emissions in transportation by shipping more product and less air!\r\n\r\nUp to 40% less waste compared to conventional paper towels when used with Everwipe''s proprietary dispensing systems.\r\n\r\nTAD manufacturing process uses nearly 30% less paper through a proprietary drying process...Less paper pulp means fewer trees are used!', '10_p3000-10-w-box.jpg', 6, 5, '', '7', '1', 'N', '', '1,2,3,4,10,5', '', '2014-10-16 02:05:11'),
(11, 'NT-8-E', 'NT-8-E', '', 1, 1, '15.75"x12.25"x9.25"', '1', '', '8', 36, '', 'Universal 8" Electronic Hands-Free Dispenser.', '', '11_11_PRO-NT-8-E(1).jpg', 6, 0, '', '7', '1', 'N', '', '1,2,3,4,5', '', '2014-10-16 02:14:24'),
(12, 'NT-10-E', 'NT-10-E', '', 1, 1, '16.2"x14.6"x9.25"', '1', '', '12', 28, '', 'Universal 10" Electronic Hands-Free Dispenser.', '', '12_12_PRO-NT-10-E(1).jpg', 6, 0, '', '7', '1', 'N', '', '1,2,3,4,5', '', '2014-10-16 02:17:27'),
(13, 'GT-500-817', 'GT-500-817', '8', 100, 5, '', '500', '16.5"x9.5"x9"', '7.5', 117, '', 'Everwipe''s Premium White Airlaid Guest Towels. 8"x17" sheet size. 1/4 folded, polywrapped, and non-printed. 5 packs of 150 pieces. 750 pieces per case.', '', '13_GT-500-1217.jpg', 13, 0, '', '5', '2', 'N', '', '2,4,10', '', '2014-10-16 02:21:12'),
(14, 'GT-500-1217', 'GT-500-1217', '12', 100, 5, '', '500', '16.5"x9.5"x9"', '7.5', 117, '', 'Everwipe''s Premium White Airlaid Guest Towels. 12"x17" sheet size. 1/6 folded, polywrapped, and non-printed. 5 packs per case, 500 pieces per case.', '', '14_GT-500-1217.jpg', 13, 0, '', '5', '2', 'N', '', '2,4,10', '', '2014-10-16 02:24:37'),
(15, 'GEN-6RCP', 'GEN-6RCP', '7.25', 1, 6, '7.25"H x 8"OD', '6', '48"x40"x84.75"', '17', 50, '48"x40"x84.75"', 'Generic White 2-Ply Jumbo Centerpull Hand Towel. 7.25" H x 8" O.D. 6 rolls/case.', 'A generic, cost effective alternative to our popular Everwipe Series. \r\n\r\nWorks in most universal centerpull jumbo roll dispensers.', '15_15_GEN-6RCPJPEG.jpg', 8, 0, '', '5,7', '1', 'N', '', '1,2,3,4,5', '', '2014-10-16 02:28:09'),
(16, 'Adult Wipe', 'Everwipe Adult Wipes', '10x11.5', 80, 12, '', '960', '', '', 0, '', 'Premium Quality Adult wipes 12 packs of 80 pieces', '', '16_16_AdultWipe.jpg', 0, 0, '', '5', '3', 'N', '', '1,3,4', '', '2014-10-16 02:30:26'),
(17, 'CR-BKT-5', 'CR-BKT-5', '', 0, 5, '7"x7.125" OD Bucket', '5', '12.5"x12.5"x11.5"', '2.75', 54, '', 'Dispenser Bucket with Resealable Lid. Each bucket fits 1 roll of Chem-Ready 90ct. disinfectant towels.', '', '17_CR-BKT-5.jpg', 7, 0, '', '5', '2', 'N', '', '1,2,3,4,10,5', '', '2014-10-16 02:32:54'),
(18, '910-2424', '910-2424', '24', 25, 4, '12"x3.75"x6.25"', '100', '13.5"x5.125"x9"', '4.65', 81, '40"x48"x85"', 'Quarterfolded yellow/orange stretchable dust cloth. 24"x24" sheet size. 25 sheets per pack, 4 packs per case, 100 sheets per case.', '', '18_910-2424.jpg', 0, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-16 02:35:48'),
(19, '909-2424-200', '909-2424-200', '24', 50, 4, '12.5"x6.5"x5"', '200', '15"x13.25"x8.75"', '6.75', 81, '40"x48"x86"', 'Quarterfolded yellow-treated dust cloth. 24"x24" sheet size. 50 sheets per pack, 4 packs per case, 200 sheets per case.', '', '19_909-2424-200.jpg', 0, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-16 02:38:33'),
(20, '909-2424', '909-2424', '24', 50, 10, '12.5"x6.5"x5"', '500', '21.25"x12.75"x13.75"', '16.05', 30, '40"x48"x86"', 'Quarterfolded yellow-treated dust cloth. 24"x24" sheet size. 50 sheets per pack, 10 packs per case, 500 sheets per case.', '', '20_909-2424.jpg', 0, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-16 02:41:34'),
(21, '909-1624', '909-1624', '16', 50, 10, '12"x8.25"x4"', '500', '18.75"x12.625"x13"', '10.4', 42, '40"x48"x83.25"', 'Quarterfolded yellow-treated dust cloth. 16"x24" sheet size. 50 sheets per pack, 10 packs per case, 500 sheets per case.', '', '21_909-1624.jpg', 0, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-16 02:44:20'),
(22, '909-1224', '909-1224', '12', 50, 10, '12"x6"x2.625"', '500', '15"x13.25"x9"', '8', 81, '40"x48"x83.75"', 'Quarterfolded yellow-treated dust cloth. 12"x24" sheet size. 50 sheets per pack, 10 packs per case, 500 sheets per case.', '', '22_909-1224.jpg', 0, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-16 02:48:24'),
(23, '909-1217', '909-1217', '12', 50, 10, '13.25"x7.125"x1.5"', '500', '14.75"x13.188"x8.75"', '5.7', 81, '40"x48"', 'Quarterfolded yellow-treated dust cloth. 12"x17" sheet size. 50 sheets per pack, 10 packs per case, 500 sheets per case.', '', '23_909-1217.jpg', 0, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-16 02:54:04'),
(24, '808-10', '808-10', '12', 220, 3, '13.75"x6.75"x10.25"', '660', '21.25"x14.25"x11.25"', '16', 49, '', '1/4 Folded, White, Premium-Blend Spunlace Wiper', '', '24_808-10-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,10,5', '', '2014-10-16 02:56:12'),
(25, '707-100', '707-100', '12', 50, 16, '6.25"x6.25"x3.75"', '800', '26.5"x13.25"x7.5"', '12', 60, '54"x40"x77.75"', 'Quarterfolded white spunlaced towels. 12"x12.5". 50 pieces/bag, 16 bags/case (800 pieces).', 'Ultra soft and silky folded towel. \r\n\r\nIndividually bagged in packs of 50 and can be used in wide array of applications ranging from patient care washcloths to automotive polishing cloths.', '25_707-100.jpg', 6, 0, '', '5', '', 'N', '', '', '', '2014-10-16 02:58:44'),
(26, '606-51', '606-51', '11', 1, 1, '11" H x 12" OD', '1', '', '13.5', 54, '', 'Blue Jumbo Roll Creped Spunlace Wiper. 11"x15" sheet size. 1 roll/case.', '', '26_606-51.jpg', 6, 0, '', '5,6', '2', 'N', '', '1,2,3,4,10,5', '', '2014-10-17 08:09:39'),
(27, '606-41', '606-41', '9', 1, 4, '9.25"x9.25"x9.5"', '', '19"x10.125"x19.5"', '21.30', 40, '40"x49.375"x84.4"', 'Centerpull blue creped spunlace wiper. 9"x15" sheet size. 4 rolls per case.', '', '27_606-41-CASE.jpg', 6, 0, '', '5,6', '2', 'N', '', '1,2,3,4,10,5', '', '2014-10-17 08:14:12'),
(28, '606-31', '606-31', '12', 500, 4, '13.5"x13.5"x8"', '2000', '27.75"x14"x16.5"', '42', 20, '', 'Flat-Pack Blue Creped Spunlace Wiper. 12"x12" sheet size. 4 packs/case, 500 sheets/pack, 2000 sheets/case.', '', '28_606-31-CASE.jpg', 6, 0, '', '5,6', '2', 'N', '', '1,2,3,4,10,5', '', '2014-10-17 08:16:31'),
(29, '606-11', '606-11', '12', 250, 3, '13.75"x6.75"x10.5"', '750', '21.25"x14.25"x11"', '15', 42, '', 'Quarter-Folded Blue Creped Spunlace Wiper. 12"x12.5" sheet size. 3 packs/case, 250 sheets/pack, 750 sheets/case.', '', '29_606-11-CASE.jpg', 6, 1, '', '5,6', '2', 'N', '', '1,2,3,4,10,5', '', '2014-10-17 08:18:51'),
(30, '404-51', '404-51', '9', 650, 2, '9"x12.5"OD', '1300', '26.5"x13.5"x9.63"', '8.5', 48, '54.25"x40.5"x82.5"', 'Two blue centerpull jumbo rolls of Heavyweight DRC Wipers. These rolls can be dispensed from a stand (as shown) or from a jumbo centerpull dispenser.\r\n\r\n2 rolls/case. Stands sold separately.', 'A heavier grade DRC wiper than the 202 series. \r\n\r\nThis wiper offers all of the same benefits of its counterpart but can withstand heavier wiping environments and offers increased absorption capacities. \r\n\r\nIdeally suited for polishing, glazing, paint prep, and solvent based tasks. \r\n\r\nStrong enough for the toughest industrial setting while soft enough for use on the hands and face.', '30_404-51-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,5', '', '2014-10-17 08:22:05'),
(31, '404-41', '404-41', '9', 200, 4, '9"H x 8.5" OD', '800', '', '15', 40, '', 'Everwipe''s Premiere Centerpull Heavy-Weight DRC Blue Wiper. 9"x12" sheet size. 4 rolls/case, 200 sheets/roll, 800 sheets/case.', 'A heavier grade DRC wiper than the 202 series. \r\n\r\nThis wiper offers all of the same benefits of its counterpart but can withstand heavier wiping environments and offers increased absorption capacities. \r\n\r\nIdeally suited for polishing, glazing, paint prep, and solvent based tasks. Strong enough for the toughest industrial setting while soft enough for use on the hands and face.', '31_404-41-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 08:30:25'),
(32, '404-40', '404-40', '9', 200, 4, '9"H x 8.5" OD', '820', '19"x10"x9.5"', '15', 40, '', 'Everwipe''s Premiere Centerpull Heavy-Weight DRC White Wiper. 9"x12" sheet size. 4 rolls/case, 200 sheets/roll, 800 sheets/case.', 'A heavier grade DRC wiper than the 202 series. \r\n\r\nThis wiper offers all of the same benefits of its counterpart but can withstand heavier wiping environments and offers increased absorption capacities. \r\n\r\nIdeally suited for polishing, glazing, paint prep, and solvent based tasks. Strong enough for the toughest industrial setting while soft enough for use on the hands and face.', '32_404-40-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 08:32:51'),
(33, '404-31', '404-31', '12.5', 325, 4, '', '1300', '', '33', 20, '', 'Everwipe''s Premiere Flat-Pack Heavy-Weight DRC Blue Wiper. 12.5"x13" sheet size. 4 packs/case, 325 sheets/pack, 1300 sheets/case.', '', '33_404-31-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 08:35:04'),
(34, '404-30', '404-30', '12.5', 325, 4, '', '1300', '', '33', 20, '', 'Everwipe''s Premiere Flat-Pack Heavy-Weight DRC White Wiper. 12.5"x13" sheet size. 4 packs/case, 325 sheets/pack, 1300 sheets/case.', 'A heavier grade DRC wiper than the 202 series. \r\n\r\nThis wiper offers all of the same benefits of its counterpart but can withstand heavier wiping environments and offers increased absorption capacities. \r\n\r\nIdeally suited for polishing, glazing, paint prep, and solvent based tasks. Strong enough for the toughest industrial setting while soft enough for use on the hands and face.', '34_404-30-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 08:37:15'),
(35, '404-21', '404-21', '16', 100, 10, '9.6"x4.6 x9.1"', '1000', '25.63"x19.75 x10"', '21', 32, '48"x40"x84.4"', 'Heavyweight Interfolded Blue DRC Wiper. 16"x9" sheet size. 10 packs/case, 100 sheets/pack, 1000 sheets/case.', 'Interfolded wiping format offers mobility as well as wall mounting option.\r\n\r\nA heavier grade DRC wiper than the 202 series. \r\n\r\nThis wiper offers all of the same benefits of its counterpart but can withstand heavier wiping environments and offers increased absorption capacities. \r\n\r\nIdeally suited for polishing, glazing, paint prep, and solvent based tasks. Strong enough for the toughest industrial setting while soft enough for use on the hands and face.', '35_404-21-CASE.jpg', 0, 0, '', '5', '2', 'N', '', '1,2,3,4,10,5', '', '2014-10-17 08:39:51'),
(36, '404-20', '404-20', '16', 100, 10, '9.6"x4.6 x9.1"', '1000', '25.63"x19.75 x10"', '24.25', 32, '48"x40"x84.4"', 'Heavyweight Interfolded White DRC Wiper. 16"x9" sheet size. 10 packs/case, 100 sheets/pack, 1000 sheets/case.', 'Interfolded wiping format offers mobility as well as wall mounting option.\r\n\r\nA heavier grade DRC wiper than the 202 series. \r\n\r\nThis wiper offers all of the same benefits of its counterpart but can withstand heavier wiping environments and offers increased absorption capacities. \r\n\r\nIdeally suited for polishing, glazing, paint prep, and solvent based tasks. Strong enough for the toughest industrial setting while soft enough for use on the hands and face.', '36_404-20-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,5', '', '2014-10-17 08:44:04'),
(37, '404-101', '404-101', '12.5', 65, 12, '7.125"x6.125"x4.5"', '780', '20.13"x14.13"x11.13"', '16.6', 42, '48.25"x40.25"x71"', 'Heavyweight, Blue, Quarterfolded DRC Wipers.', 'A heavier grade DRC wiper than the 202 series. \r\n\r\nThis wiper offers all of the same benefits of its counterpart but can withstand heavier wiping environments and offers increased absorption capacities. \r\n\r\nIdeally suited for polishing, glazing, paint prep, and solvent based tasks. Strong enough for the toughest industrial setting while soft enough for use on the hands and face.', '37_37_404-101JPEG.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,5', '', '2014-10-17 08:46:58'),
(38, '404-100', '404-100', '12', 56, 18, '6.25"x6.25"x5.5"', '1008', '22"x11"x19"', '21', 0, '48"x44"x80"', 'Heavyweight, White, Quarterfolded DRC Wipers suitable for both wet and dry environments. 12"x12.5" sheet size. 1008 pieces/case.', 'A heavier grade DRC wiper than the 202 series. \r\n\r\nThis wiper offers all of the same benefits of its counterpart but can withstand heavier wiping environments and offers increased absorption capacities. \r\n\r\nIdeally suited for polishing, glazing, paint prep, and solvent based tasks. Strong enough for the toughest industrial setting while soft enough for use on the hands and face.', '38_38_404-100jpeg.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,5', '', '2014-10-17 08:49:41'),
(39, '303-JUMBO', '303-JUMBO', 'N/A', 1, 1, '10"H x 18"O.D.', '1', '10"H x 18"O.D.', '22', 28, '48"x40"x74.3"', 'Everwipe''s Fusion Series  21" White Jumbo Roll. The ideal "cloth-like" paper alternative in a centerpull format. 10" H x 18" O.D. 3" Core. 1 roll/case.', 'Fusion products offer the everyday cost of a paper towel in a soft yet strong wiper.\r\nMade from 100% Recycled Content.\r\n7x''s absorbency compared to paper towels.\r\n7x''s the usage in each towel used.\r\nSoft enough to use on the face.\r\nStrong enough for the toughest cleaning tasks.\r\nCoreless technology in centerpull lineup.\r\nFits most universal dispensers.', '39_303-Jumbo-roll.jpg', 9, 0, '', '5,6', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 08:52:34'),
(40, '303-810', '303-810', 'N/A', 1, 6, '9.875"H x 7.875" O.D', '6', '23.75"x16.4"x10.9"', '18.5', 35, '49"x40"x81.68"', 'Everwipe''s Fusion Series Universal 10" Hand Roll Towel. The ideal "cloth-like" paper alternative in a centerpull format. 9.875" H x 7.875" O.D. 6 rolls/case.', 'Fusion products offer the everyday cost of a paper towel in a soft yet strong wiper.\r\nMade from 100% Recycled Content.\r\n7x''s absorbency compared to paper towels.\r\n7x''s the usage in each towel used.\r\nSoft enough to use on the face.\r\nStrong enough for the toughest cleaning tasks.\r\nCoreless technology in centerpull lineup.\r\nFits most universal dispensers.', '40_303-810-box&roll.jpg', 9, 0, '40_303-810_Bar_Code.jpeg', '5,6', '2', 'N', '', '1,2,3,4', '', '2014-10-17 08:54:49'),
(41, '303-808', '303-808', 'N/A', 1, 6, '7.875"Hx7.875"OD', '6', '24.25"x16.5"x9"', '16.5', 45, '49"x40.8"x84.63"', 'Everwipe''s Fusion Series White Rolls Towels. The ideal "cloth-like" paper alternative in a centerpull format. 7.875" H x 9" O.D. 6 rolls/case.', 'Fusion products offer the everyday cost of a paper towel in a soft yet strong wiper.\r\nMade from 100% Recycled Content.\r\n7x''s absorbency compared to paper towels.\r\n7x''s the usage in each towel used.\r\nSoft enough to use on the face.\r\nStrong enough for the toughest cleaning tasks.\r\nCoreless technology in centerpull lineup.\r\nFits most universal dispensers.', '41_41_303-810-box&roll(1).jpg', 9, 0, '', '5,6', '2', 'N', '', '1,2,3,4', '', '2014-10-17 08:57:57'),
(42, '303-608', '303-608', '8', 8, 0, '6" OD', '', '', '10.3', 48, '', 'Everwipe''s Fusion Series Centerpull White Roll Towels. The ideal "cloth-like" paper alternative in a centerpull format. 6" O.D. 8 rolls/case.', 'Fusion products offer the everyday cost of a paper towel in a soft yet strong wiper.\r\nMade from 100% Recycled Content.\r\n7x''s absorbency compared to paper towels.\r\n7x''s the usage in each towel used.\r\nSoft enough to use on the face.\r\nStrong enough for the toughest cleaning tasks.\r\nCoreless technology in centerpull lineup.\r\nFits most universal dispensers.', '42_303-608.jpg', 9, 0, '', '5,6', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 09:01:15'),
(43, '303-606', '303-606', '8', 1, 6, '7.875"H x 7.875"O.D.', '6', '24.25"x16.5"x9"', '13', 45, '49"x40.8"x84.63"', 'Everwipe''s Fusion Series Centerpull White Roll Towels. The ideal "cloth-like" paper alternative in a centerpull format. 7.875" H x 7.875" O.D. 6 rolls/case.', 'Fusion products offer the everyday cost of a paper towel in a soft yet strong wiper.\r\nMade from 100% Recycled Content.\r\n7x''s absorbency compared to paper towels.\r\n7x''s the usage in each towel used.\r\nSoft enough to use on the face.\r\nStrong enough for the toughest cleaning tasks.\r\nCoreless technology in centerpull lineup.\r\nFits most universal dispensers.', '43_303-606-box&roll.jpg', 9, 0, '', '5,6', '1,2', 'N', '', '1,2,3,4,10', '', '2014-10-17 09:03:28'),
(44, '303-604', '303-604', '7.875', 1, 4, '7.875" x 9"O.D.', '4', '18.63"x9.5"x16.5"', '13.5', 50, '48"x40"x82.5"', 'Everwipe''s Fusion Series Centerpull White Roll Towels. The ideal "cloth-like" paper alternative in a centerpull format. 7.875" H x 9" O.D. 4 rolls/case.', 'Fusion products offer the everyday cost of a paper towel in a soft yet strong wiper.\r\nMade from 100% Recycled Content.\r\n7x''s absorbency compared to paper towels.\r\n7x''s the usage in each towel used.\r\nSoft enough to use on the face.\r\nStrong enough for the toughest cleaning tasks.\r\nCoreless technology in centerpull lineup.\r\nFits most universal dispensers.', '44_303-604-box&roll.jpg', 9, 4, '', '5,6', '1,2', 'N', '', '1,2,3,4,10,5', '', '2014-10-17 09:05:46'),
(45, '3000-8', 'Everwipe Premium Paper Towel Series', 'N/A', 1, 6, '7.875"H x 7.5"OD', '6', '23"x15.38"x8.88"', '14', 45, '48"x40"x83.65"', 'Everwipe''s Premium White T.A.D. 8" Hard Wound Rolls. 7.875" H x 7.5" O.D. 1.75" core. 6 rolls/case.', 'Everwipe Premium Paper Products incorporate Eco-Tech design; which helps reduce waste and is more environmentally friendly.\r\n\r\nMax Pak engineering reduces CO2 emissions in transportation by shipping more product and less air!\r\n\r\nUp to 40% less waste compared to conventional paper towels when used with Everwipe''s proprietary dispensing systems.\r\n\r\nTAD manufacturing process uses nearly 30% less paper through a proprietary drying process...Less paper pulp means fewer trees are used!', '45_3000-8-w-roll.jpg', 8, 0, '', '5,7', '1', 'N', '', '1,2,3,4', '', '2014-10-17 09:07:53'),
(46, '3000-12', '3000-12', '', 12, 12, '7.875"H x 7.5"O.D.', '', '22.62"x15.12"x16.12"', '25', 20, '48"x40"x72"', 'Everwipe''s Premium 8" TAD Hand Towel Rolls w/ Stub. 7.875"H x 7.5"O.D. 12 rolls/case.', '', '46_3000-12.jpg', 8, 0, '', '5', '', 'N', '', '1', '', '2014-10-17 09:09:52'),
(47, '3000-10', '3000-10', 'N/A', 1, 6, '9.875"H x 7.5"OD', '6', '23"x15.38"x10.88"', '18', 35, '48"x40"x80.13"', 'Everwipe''s Premium White T.A.D. 10" Hard Wound Rolls. 9.875" H x 7.5" O.D. 1.75" core. 6 rolls/case.', 'Everwipe Premium Paper Products incorporate Eco-Tech design; which helps reduce waste and is more environmentally friendly.\r\n\r\nMax Pak engineering reduces CO2 emissions in transportation by shipping more product and less air!\r\n\r\nUp to 40% less waste compared to conventional paper towels when used with Everwipe''s proprietary dispensing systems.\r\n\r\nTAD manufacturing process uses nearly 30% less paper through a proprietary drying process...Less paper pulp means fewer trees are used!', '47_3000-10.jpg', 8, 0, '', '5,7', '1', 'N', '', '2,3,4,10', '', '2014-10-17 09:12:11'),
(48, '202-50', '202-50', '15', 2, 2, '9" H x 13" O.D.', '2', '26.5"x13.5"x9.63"', '8.5', 48, '54.25"x40.5"x82.5"', 'Everwipe''s Premium Jumbo CenterPull Medium Weight DRC White Wiper. 9" H x 13" O.D. 2 Rolls/case.', 'Our most popular and versatile mid-weight DRC wiper.\r\n\r\nIt''s soft, absorbent properties are ideal for polishing, glazing, paint prep, and solvent based tasks. \r\n\r\nStrong enough for industrial applications while soft enough for use on hands and face.', '48_202-50.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 09:14:24'),
(49, '202-40', '202-40', '9', 440, 4, '9" H x 9" OD', '1760 ft per case', '19"x10"x9.5"', '18', 40, '', 'Everwipe''s Premium CenterPull Medium Weight DRC White Wiper. 9" H x 9" O.D. 4 Rolls/case.', 'Our most popular and versatile mid-weight DRC wiper.\r\n\r\nIt''s soft, absorbent properties are ideal for polishing, glazing, paint prep, and solvent based tasks. \r\n\r\nStrong enough for industrial applications while soft enough for use on hands and face.', '49_202-40-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 09:16:44'),
(50, '202-30', '202-30', '12.5', 560, 4, '', '2240', '', '36', 20, '', 'Everwipe''s Premium Flat-Pack Medium Weight DRC White Wiper. 4 packs/case, 560 sheets/pack, 2240 sheets/case.', 'Our most popular and versatile mid-weight DRC wiper.\r\n\r\nIt''s soft, absorbent properties are ideal for polishing, glazing, paint prep, and solvent based tasks. \r\n\r\nStrong enough for industrial applications while soft enough for use on hands and face.', '50_202-30-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 09:18:58'),
(51, '202-20-6', '202-20-6', '9', 125, 6, '9.63"x4.63"x9.13"', '750', '20.13"x14.13"x11.13"', '14.5', 49, '48.25"x40.25"x71"', 'Everwipe''s Premium Interfolded Medium Weight DRC White Wiper. 9"x16.5" sheet size. 750 sheets/case.', 'Our most popular and versatile mid-weight DRC wiper.\r\n\r\nIt''s soft, absorbent properties are ideal for polishing, glazing, paint prep, and solvent based tasks. \r\n\r\nStrong enough for industrial applications while soft enough for use on hands and face.', '51_202-20-CASE.jpg', 6, 0, '', '5', '2', 'N', '', '1,2,3,4,10', '', '2014-10-17 09:21:38'),
(52, '202-100', '202-100', '11', 90, 12, '6.25"x6.75"x5.5"', '1080', '20.13"x14.13"x11.13"', '14.5', 42, '48.25"x40.25"x71"', 'Everwipe''s Premium Quarterfolded Medium Weight White DRC Wipers. 11"x12.5" Sheet size. 12 bags of 90 Sheets, 1080 Sheets/case.', 'Our most popular and versatile mid-weight DRC wiper.\r\n\r\nIt''s soft, absorbent properties are ideal for polishing, glazing, paint prep, and solvent based tasks. \r\n\r\nStrong enough for industrial applications while soft enough for use on hands and face.', '52_202-100.jpg', 6, 4, '', '5', '2', 'N', '', '1,2,3,4,10,5', '', '2014-10-17 09:23:55'),
(53, '202-10', '202-10', '10', 50, 16, '', '800', '26"x13"x7"', '8.5', 54, '', 'Everwipe''s Premium Quarterfold DRC Washcloth in Polybag. 10"x12.5" sheet size. 16 packs/case, 50 sheets/pack, 800 sheets/case.', '', '53_202-10.jpg', 0, 0, '', '5', '', 'N', '', '', '', '2014-10-17 09:26:18'),
(54, '1050-10', '1050-10', '10', 5, 6, '11.5"x 12.5"', '10', '6" * 8"', '2', 54, '6" * 9"', 'Premium Quarterfolded Airlaid Washcloths. 11.5"x 12.5". 50 Pc./Bag w/ 16 Bags/Case.', 'Plush, soft, and durable washcloths ideally suited for patient hygiene, general wiping, and cleaning in health care and institutional settings.\r\n\r\nIndividually-packaged to eliminate risk of contamination and allow distribution to individual nursing stations.', '54_1050-10.jpg', 9, 0, '', '5,6', '2', 'N', '', '1,2,3', '', '2014-10-17 09:29:35'),
(55, '10-DISP', '10-DISP', 'N/A', 1, 1, '', '1', '13.25"x10.75"x10.63"', '3.69', 84, '', 'Centerpull dispenser with window for marketing materials. Features internal drip tray to recycle solution. Fits 1 roll of 10-100.', '', '55_10-DISP.jpg', 11, 0, '', '5', '3', 'N', '', '1,2,3,4,10,5', '', '2014-10-17 09:32:32'),
(56, '10100', '10100', '6x8', 800, 4, '', '3200', '17.5"x17.5"x9.5"', '44 lbs', 36, '', 'Everwipe Disinfectant Wipes. 4 bags/case, 800 sheets/bag, 3200 sheets/case. Bucket sold separately.', '', '56_10-100.jpg', 11, 7, '', '5', '2,3', 'N', '', '1,13,2,3,33,34,35,4,22,23,24,25', '2,5,7,37,40,41,18,57,68,73,92,93,96,97,101,103', '2014-10-17 09:38:28'),
(57, '090-10-EW', '090-10-EW', '', 0, 0, '', '', '', '', 0, '', 'Wall Mount Plate Dispenser for Everwipe Series', '', '57_57_090-10JPEG.jpg', 6, 0, '', '5', '2', 'N', '', '2,3,4', '', '2014-10-17 09:39:38'),
(58, '04201', '04201', '21.5', 150, 1, '14"x11.5"x8"', '150', '14"x11.5"x8"', '4.8', 90, '', 'Heavy Duty Blue FST Towels. Antimicrobial with Blue Stripe. 21.5"x12.5" sheet size. 150 sheets/case.', '', '58_04201.jpg', 10, 0, '', '5,7', '2', 'N', '', '1,2,3,4,10,5', '', '2014-10-17 09:47:31'),
(59, '04200', '04200', '21.5', 150, 1, '14"x11.5"x8"', '150', '14"x11.5"x8"', '4.8', 90, '', 'Heavy Duty White FST Towels. Antimicrobial with Red Stripe. 21.5"x12.5" sheet size. 150 sheets/case.', '', '59_04200.jpg', 10, 0, '', '5', '2', 'Y', '', '2,4', '', '2014-10-17 09:55:09'),
(60, 'G8-51', 'G8-51', '11x13', 475, 475, '', '475', '', '13 lbs.', 0, '', 'Super heavyweight Blue HEF', '', '60_32KL19.jpg', 6, 6, '', '5', '2', 'N', '', '3', '', '2014-11-25 10:37:09'),
(66, '5401-2', '5401-2', '11"x15.5"', 0, 2, '', '750', '', '', 0, '', 'Everwipes 5401 series Multipurpose wiping series offer it''s users an extremely efficient and cost effective way of wiping up small spills and cleaning tasks.  Great for cleaning both glass and hands, the 5400 series is a great all purpose utility wipe.', 'All purpose utility wipe\r\nLint Free\r\nGreat wipe/dry properties', '', 6, 0, '', '', '2', 'N', '', '31', '53,54,55,56', '2014-12-09 05:21:11'),
(67, '808-10-250', '808-10-250', '15x17', 250, 250, '', '250', '', '9', 80, '', 'The ultimate Terry towel alternative.  Ever wipe''s 808 material is the softest and most versatile wiper in the marketplace.  This product can be used as a Microfiber alternative, Terry or Huck towel alternative and White Tee-shirt alternative.  It is truly a disposable wiper that can take out all of the competition.', 'Softer and stronger than a Terry Towel\r\nTwice the absorbtion rate over Terry Towel\r\nCan be used as a Microfiber alternative at a much lower cost\r\nConsistent size sheet\r\nQuarterfolded and bagged for mobile applications', '67_808-10-250.jpg', 6, 0, '', '5', '2', 'N', '', '11,12,15,18,20,30,31,32,33,36,37,22,23,24,26,27,29', '3,4,8,36,38,45,48,51,52,16,55,60,66,71,76,81,86,90,92,93,96,100,11,21,26,31', '2014-12-17 11:21:04'),
(68, '606-31-250', '606-31-250', '12x12', 250, 250, '', '250', '', '5', 0, '', '', 'Everwipe''s hydroentangled spunlace 606 series is virtually lint free and contains no contaminants.  This product is made to use with solvents and it''s delivery system allows', '', 6, 1, '', '', '2', 'N', '', '3,30,31,32,33,34,35,36,37', '15,16,54,55,105,59,60,65,66,70,71,75,76,80,81,85,86', '2015-01-19 08:49:06'),
(69, '707-100-HF', '707-100-HF', '8x12', 50, 800, '', '800', '', '7', 0, '', 'Extremely Soft Spunlace wash cloth half folded for larger wiping areas', '', '69_808-10-250.jpg', 0, 0, '', '', '2', 'N', '', '1,16,2,18', '6,39,45', '2016-02-04 02:09:17'),
(70, '1300-1020', '1300-1020', '10x12.5', 84, 12, '', '1008', '', '11', 48, '', 'Extremely absorbent lint free washcloth.  Used specifically when wetting the washcloth first and cleaning off the patient.  Same wet strength both wet and dry', 'The 1300-1020 is designed specifically for both the healthcare sector and pharma sector where wet strength, softness and low lint need to come together.', '70_808-10-250.jpg', 12, 6, '', '', '', 'N', '', '1,16,2,18', '6', '2016-02-04 02:19:43'),
(71, 'G7-50', 'G7-50', '11x15.75', 800, 1, '', '800', '1.06', '13 lbs', 54, '', 'Heavyweight Hydroentagled Fiber.  Extremely strong both wet and dry.  Virtually lint free.', 'This product is made for high volume use of wiping products.  The Jumbo roll deliver system is design to fit all universal dispensers and when the roll gets smaller, it can also be used in a household paper towel dispenser so there is no pilferage.', '71_G7-50.jpg', 6, 0, '', '5', '2', 'N', '', '', '', '2016-02-16 03:08:14'),
(72, 'G6-10-24', 'G6-10-24', '10', 300, 1, '', '300', '1.0', '5 lbs', 81, '', 'Quarterfolded white Medium weight Hydroentagled fiber.', 'The G6-10-24 is the perfect product for the pharma industry to clean their vats.  It is virtually lint free, has incredible wet strength and it''s delivery system allows clients to put product at the end of their mops to clean very difficult places in the pharma industry.', '72_606-30-250.jpg', 6, 6, '', '', '2', 'N', '', '', '', '2016-02-16 03:10:52'),
(73, 'G7-660', 'G7-660', '12', 60, 6, '', '360', '1.0', '8', 77, '', 'Heavyweight Hydroentangled fiber half folded.  White with a textured embossing pattern for absorption and easy pick up.', 'The G7-660 (Chem-Ready) series wiper is specifically designed to be used with harsh chemicals and solvents.  The product is half-folded on a roll to fit into the Chem-ready bucket which is extremely mobile and allows for one sheet to come out at a time.', '73_01-690.jpg', 6, 0, '', '', '2', 'N', '', '', '', '2016-02-17 11:15:18'),
(74, 'G6-20', 'G6-20', '9x16.75', 126, 1260, '', '1260', '', '18', 42, '', 'The G6 series of Hydroentangled fiber is perfect for cleaning and sanitizing surfaces.  This product is extremely versatile and it''s delivery system allows it to be mobile as well', 'Made for cleaning slot machines, surfaces,food service establishments, cafeterias,etc', '74_202-20-6.jpg', 0, 0, '', '', '2', 'N', '', '', '', '2016-03-23 11:40:48'),
(75, 'G6-100-HF', 'G6-100-HF', '8x12', 50, 800, '', '800', '', '6', 81, '', 'The most economical lint free disposable wipe.  Used in areas where lint is an issue.  The footprint of the towel allows the user to have their hand completely cover when wiping a surface and area.', 'The 1300-1020 is designed specifically for both the healthcare sector and pharma sector where wet strength, softness and low lint need to come together.', '75_808-10-250.jpg', 0, 6, '', '', '2', 'N', '', '', '', '2016-04-07 06:29:48'),
(76, 'G7-20', 'G7-20', '9X17.75', 100, 1000, '', '1000', '', '18', 42, '', 'The G7-20 was made as a mobile rag alternative for the workplace.  This is one of our most versatile products pick pick up grease and oil and overall cleaning.', 'Made specific for grease and oil pick-up.  Great for automotive market where the mobile platform allows customers to move product around the shop and works as a great rag alternative for pick up spills and cleaning surfaces and hands.', '76_202-20-6.jpg', 6, 6, '', '', '2', 'N', '', '3,30,31,32,33,34,35,36,37', '', '2016-04-26 03:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

DROP TABLE IF EXISTS `producttype`;
CREATE TABLE IF NOT EXISTS `producttype` (
  `productTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `industryId` int(11) NOT NULL,
  `productType` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `display_order` int(11) NOT NULL,
  PRIMARY KEY (`productTypeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`productTypeId`, `industryId`, `productType`, `status`, `display_order`) VALUES
(1, 11, 'Food Service Towel', 'Y', 1),
(2, 11, 'Sanitizing System', 'Y', 2),
(3, 11, 'Rag/Towel Atlternative', 'Y', 3),
(4, 12, 'Rag/Towel alternative', 'Y', 1),
(5, 12, 'Sanitizing System', 'Y', 2),
(6, 12, 'Washcloths', 'Y', 3),
(7, 13, 'Sanitizing System', 'Y', 1),
(8, 13, 'Rag/Towel alternative', 'Y', 2),
(9, 26, 'Lintfree/Critical Task', 'Y', 1),
(10, 26, 'Restroom', 'Y', 2),
(11, 26, 'Rag/Towel alternative', 'Y', 3),
(12, 26, 'Breakroom', 'Y', 4),
(13, 26, 'Manitenance', 'Y', 5),
(14, 30, 'Restroom', 'Y', 0),
(15, 30, 'Lint free wipe', 'Y', 1),
(16, 30, 'General wipe', 'Y', 2),
(17, 30, 'Utility/Light duty cleaning', 'Y', 3),
(18, 30, 'Breakroom', 'Y', 4),
(19, 27, 'Lintfree/Critical Task', 'Y', 0),
(20, 27, 'Restroom', 'Y', 1),
(21, 27, 'Rag/Towel Alternative', 'Y', 2),
(22, 27, 'Breakroom', 'Y', 3),
(23, 27, 'Manitenance', 'Y', 4),
(24, 28, 'Lintfree/Critical Task', 'Y', 0),
(25, 28, 'Restroom', 'Y', 1),
(26, 28, 'Rag/Towel Alternative', 'Y', 2),
(27, 28, 'Breakroom', 'Y', 3),
(28, 28, 'Manitenance', 'Y', 4),
(29, 29, 'Lintfree/Critical Task', 'Y', 0),
(30, 29, 'Restroom', 'Y', 1),
(31, 29, 'Rag/Towel Alternative', 'Y', 2),
(32, 29, 'Breakroom', 'Y', 3),
(33, 29, 'Manitenance', 'Y', 4),
(34, 14, 'Roll Towels', 'Y', 0),
(35, 14, 'Toilet Tissue', 'Y', 1),
(36, 14, 'Rag/Towel Alt.', 'Y', 2),
(37, 14, 'Sanitizing System', 'Y', 3),
(38, 15, 'Rag/Towel Alt.', 'Y', 0),
(39, 16, 'Washcloth', 'Y', 0),
(40, 16, 'Sanitizing System', 'Y', 1),
(41, 17, 'Front / Backhouse', 'Y', 0),
(42, 17, 'Restroom', 'Y', 1),
(43, 18, 'Restroom', 'Y', 0),
(44, 18, 'Sanitation', 'Y', 1),
(45, 18, 'Maintenance', 'Y', 2),
(46, 19, 'Restroom', 'Y', 0),
(47, 19, 'Sanitation', 'Y', 1),
(48, 19, 'Maintenance', 'Y', 2),
(49, 20, 'Offsite', 'Y', 0),
(50, 20, 'Restroom', 'Y', 1),
(51, 20, 'Front / Backhouse', 'Y', 2),
(52, 21, 'Front / Backhouse', 'Y', 0),
(53, 31, 'Restroom', 'Y', 0),
(54, 31, 'Lint free wipe', 'Y', 1),
(55, 31, 'General wipe', 'Y', 2),
(56, 31, 'Utility/Light duty cleaning', 'Y', 3),
(57, 31, 'Breakroom', 'Y', 4),
(58, 32, 'Restroom', 'Y', 0),
(59, 32, 'Lint free wipe', 'Y', 1),
(60, 32, 'General wipe', 'Y', 2),
(61, 32, 'Utility/Light duty cleaning', 'Y', 3),
(64, 33, 'Restroom', 'Y', 0),
(63, 32, 'Breakroom', 'Y', 4),
(65, 33, 'Lint free wipe', 'Y', 1),
(66, 33, 'General wipe', 'Y', 2),
(67, 33, 'Utility/Light duty cleaning', 'Y', 3),
(68, 33, 'Breakroom', 'Y', 4),
(69, 34, 'Restroom', 'Y', 0),
(70, 34, 'Lint free wipe', 'Y', 1),
(71, 34, 'General wipe', 'Y', 2),
(72, 34, 'Utility/Light duty cleaning', 'Y', 3),
(73, 34, 'Breakroom', 'Y', 4),
(74, 35, 'Restroom', 'Y', 0),
(75, 35, 'Lint free wipe', 'Y', 1),
(76, 35, 'General wipe', 'Y', 2),
(77, 35, 'Utility/Light duty cleaning', 'Y', 3),
(78, 35, 'Breakroom', 'Y', 4),
(79, 36, 'Restroom', 'Y', 0),
(80, 36, 'Lint free wipe', 'Y', 1),
(81, 36, 'General wipe', 'Y', 2),
(82, 36, 'Utility/Light duty cleaning', 'Y', 3),
(83, 36, 'Breakroom', 'Y', 4),
(84, 37, 'Restroom', 'Y', 0),
(85, 37, 'Lint free wipe', 'Y', 1),
(86, 37, 'General wipe', 'Y', 2),
(87, 37, 'Utility/Light duty cleaning', 'Y', 3),
(88, 37, 'Breakroom', 'Y', 4),
(89, 22, 'Restroom', 'Y', 0),
(90, 22, 'Housekeeping', 'Y', 1),
(91, 22, 'Dining', 'Y', 2),
(92, 22, 'Maintenance', 'Y', 3),
(93, 23, 'Locker rooms', 'Y', 0),
(94, 23, 'Restroom', 'Y', 1),
(95, 23, 'Dining', 'Y', 2),
(96, 23, 'Maintenance', 'Y', 3),
(97, 24, 'Restroom', 'Y', 0),
(98, 24, 'Sanitizing', 'Y', 1),
(99, 24, 'Foodservice', 'Y', 2),
(100, 24, 'Maintenance/General cleaning', 'Y', 3),
(101, 25, 'Surface/Gym wipes', 'Y', 0),
(102, 25, 'Restroom', 'Y', 1),
(103, 25, 'Locker room', 'Y', 2),
(104, 25, 'Personal Care Wipes', 'Y', 3),
(105, 31, 'Paint Booth', 'Y', 5);

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

DROP TABLE IF EXISTS `resume`;
CREATE TABLE IF NOT EXISTS `resume` (
  `resumeId` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `imgloc` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`resumeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`resumeId`, `post_name`, `name`, `phone`, `email`, `imgloc`, `date`) VALUES
(1, 'Director of New Business Development', 'Raymond Karstensen', '847-224-4188', 'rkarstensen@sbcglobal.net', '', '2014-11-14 14:57:07'),
(2, 'Director of New Business Development', 'Anthony Fiorletti', '908-770-2335', 'afiorletti@verizon.net', '2_AFResume9_14.doc', '2014-11-19 23:12:56'),
(3, 'Director of New Business Development', 'Enrico Guillaume', '862.250.7331', 'enricoguillaume@gmail.com', '3_Enrico Guillaume - Sr. Business Advisor, Talent Acquisition - The Talent Heroes.pdf', '2014-11-21 00:25:10'),
(4, 'Director of New Business Development', 'Adam Horwitz', '917-386-4695', 'adamhorw@yahoo.com', '4_horwitzupdatedresume2014M.docx', '2015-01-22 02:55:27'),
(5, 'Director of New Business Development', 'Brian Moy', '6095020552', 'moyb149@gmail.com', '5_BRIAN MOY_RESUME_CAREER .doc', '2015-01-29 18:01:29'),
(6, 'Director of New Business Development', 'Jennifer Echeverry', '609-968-0131', 'J.echeverry17@hotmail.com', '6_Jennifer EcheverryResume.docx', '2015-02-03 14:28:20'),
(7, 'Director of New Business Development', 'Daniel Thompson', '(603) 494-9727', 'cupman777@yahoo.com', '7_Resume Daniel Thompson 2015.doc', '2015-02-12 21:44:51'),
(8, 'Director of New Business Development', 'Patrick Huff', '215 272 1320', 'huff135@verizon.net', '8_Patrick Huff 3 Resume.doc', '2015-05-01 19:18:24'),
(9, 'Director of New Business Development', 'Derrick W Spratley Sr', '609-321-0208', 'spratley85@msn.com', '9_DERRICK SPRATLEY RESUME.doc', '2015-05-29 20:39:54'),
(10, 'Director of New Business Development', 'Derrick W Spratley Sr', '609-321-0208', 'spratley85@msn.com', '10_DERRICK SPRATLEY RESUME.doc', '2015-05-29 20:40:28'),
(11, 'Director of New Business Development', 'Goutham', '+919500882128', 'goutham2g@gmail.com', '11_GouthamCV.docx', '2015-08-18 13:13:29'),
(12, 'Director of New Business Development', 'Bernice Meyers', '6094981216', 'bernicemeyers@gmail.com', '12_Bernice Meyers resume.docx', '2015-10-07 21:35:01'),
(13, 'Director of New Business Development', 'Justine Andreana', '347-215-4452', 'justinemandreana@gmail.com', '13_Justine Andreana Administrative Resume.docx', '2015-12-02 01:48:01'),
(14, 'Director of New Business Development', 'John Koprowicz', '732-567-6383', 'JohnKoprowicz@gmail.com', '14_John Koprowicz  Resume - 2015-11-25.pdf', '2016-01-21 17:51:03'),
(15, 'Director of New Business Development', 'abubakarr', '6102099417', 'sierra4abk@yahoo.com', '15_abubakarr kamara resume m (3) (1) (1).doc', '2016-05-05 21:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `site_name` varchar(100) NOT NULL DEFAULT '',
  `site_url` varchar(100) NOT NULL DEFAULT '',
  `admin_email` varchar(100) NOT NULL DEFAULT '',
  `paypal_email` varchar(255) NOT NULL,
  `results` int(10) NOT NULL DEFAULT '0',
  `ganalytyc` text NOT NULL,
  `fburl` varchar(255) NOT NULL,
  `tweeturl` varchar(255) NOT NULL,
  `linkedinurl` varchar(255) NOT NULL,
  `default_image` varchar(255) NOT NULL,
  `health_care` varchar(255) NOT NULL,
  `foodservice` varchar(255) NOT NULL,
  `work_place` varchar(255) NOT NULL,
  `hospitality` varchar(255) NOT NULL,
  `technology` varchar(255) NOT NULL,
  `what_new` text NOT NULL,
  `what_new_box` text NOT NULL,
  `address1` varchar(225) NOT NULL,
  `address2` varchar(225) NOT NULL,
  `telephone` varchar(225) NOT NULL,
  `copyright` varchar(225) NOT NULL,
  `imageloc` varchar(225) NOT NULL,
  `sales_email` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`site_name`, `site_url`, `admin_email`, `paypal_email`, `results`, `ganalytyc`, `fburl`, `tweeturl`, `linkedinurl`, `default_image`, `health_care`, `foodservice`, `work_place`, `hospitality`, `technology`, `what_new`, `what_new_box`, `address1`, `address2`, `telephone`, `copyright`, `imageloc`, `sales_email`, `fax`) VALUES
('Legacy Converting', 'http://beckandstone.com/dev/legacy/', 'darren@legacyconverting.net', 'darren@legacyconverting.net', 12, '', 'https://www.facebook.com/LegacyConvertingInc', 'https://twitter.com/EverwipeTowels', 'http://www.linkedin.com/company/legacy-converting?trk=tyah', 'imgdefault_image.jpg', 'imghealth_care.jpg', 'imgfoodservice.jpg', 'imgwork_place.jpg', 'imghospitality.jpg', 'imgtechnology.jpg', '<h6 style="color: rgb(0, 0, 0); font-family: Arial; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><span style="font-size: medium;">1/28/2014</span></h6>\r\n\r\n<h6 style="color: rgb(0, 0, 0); font-family: Arial; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><span style="font-size: large;"><a href="http://campaign.r20.constantcontact.com/render?ca=1cbd266d-3c7b-4a9b-8af7-6469664ceec7&amp;c=fa7e96e0-5e58-11e3-8359-d4ae529a826e&amp;ch=facc41b0-5e58-11e3-8363-d4ae529a826e">Legacy Converting visited by Lt. Governor Kim Guadagno in recognition of being one of New Jersey&#39;s fastest growing companies.</a></span></h6>\r\n\r\n<pre>\r\n&nbsp;</pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><font size="4"><span style="font-family: Arial"><font size="3"><span style="font-weight: normal"><span style="font-weight: normal"><font size="3"><span style="font-weight: normal"><font size="3"><span style="font-weight: normal"><font size="3"><font size="4"><font size="5"><img alt="" src="../uploads/ckeditorImg/uploads1412774861_2n5h.jpg" /></font></font></font></span></font></span></font></span></span></font></span></font></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h6><span style="font-size:12px;">For the full press release:<a href="http://www.state.nj.us/governor/news/news/552014/approved/20140128b.html">http://www.state.nj.us/governor/news/news/552014/approved/20140128b.html</a>&nbsp;</span></h6>\r\n\r\n<h6><span style="font-size:12px;">For all media and photos: <a href="http://www.state.nj.us/governor/media/photos/2014/20140128b.shtml">http://www.state.nj.us/governor/media/photos/2014/20140128b.shtml</a></span></h6>\r\n\r\n<pre>\r\n&nbsp;</pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt="" src="../uploads/ckeditorImg/uploads1412774931_qbw8.jpg" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h6 class="uiStreamMessage" style="text-align: left"><span style="font-size: medium"><span style="font-family: Arial"><span style="font-size: small"><span style="font-weight: normal"><span style="font-weight: normal"><span style="font-size: small"><span style="font-weight: normal"><span style="font-size: small"><span style="font-weight: normal"><span style="font-size: small"><span style="font-size: medium">9/30/2013<br />\r\nSeptember&nbsp;Idea of the Month</span></span></span></span></span></span></span></span></span></span></span></h6>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px;">Each month Legacy Converting invites its employees to submit ideas that will help improve productivity and ultimately to reinforce our mission statement ---To build world class relationships and unparalleled flexibility while &ldquo;making it happen&rdquo; each and every day.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The employee of the month will receive a discretionary bonus as well as a donation in their honor made to a charitable foundation of their choosing.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h6><span style="font-size:12px;">Past charitable foundations include:</span></h6>\r\n\r\n<p>ASPCA</p>\r\n\r\n<p>St. Jude&#39;s Children&#39;s Hospital</p>\r\n\r\n<p>Cancer Care</p>\r\n\r\n<p>Against Malaria</p>\r\n\r\n<p>Alex&#39;s Lemonade Stand</p>\r\n\r\n<p>Humane Society of Atlantic County</p>\r\n\r\n<p>Lupus Foundation of America</p>', '<p><img alt="" src="../uploads/ckeditorImg/uploads1413544192_img.png" style="width: 200px; height: 83px;" /></p>\r\n\r\n<p>Legacy receives the coveted NJBIZ award for &quot;Business of the Year&quot; 2011!</p>', '3 Security Dr. Suite 301<br />\r\nCranbury, NJ 08512', '1150 N. Red Gum St. Unit D <br/>\r\nAnaheim, CA 92806', '800-521-4190', '2016 Legacy (Legal Text)', 'logo.png', 'sales@legacyconverting.com', '800-449-0877');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `sliderId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `imageloc` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `displayorder` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`sliderId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sliderId`, `title`, `imageloc`, `description`, `displayorder`, `status`) VALUES
(1, 'Reputation', '1_slideimg.jpg', 'State-of-the-art capabilities that<br />\r\nare unparalleled in the industry.', 1, 'Y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
