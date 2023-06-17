-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 07:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happy_stationary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `email`, `password`) VALUES
(1, 'anasnadeem193@gmail.com', '193'),
(2, 'Nadeem@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cate_id` int(11) NOT NULL,
  `Cate_name` varchar(255) NOT NULL,
  `Cate_Des` varchar(255) NOT NULL,
  `category_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cate_id`, `Cate_name`, `Cate_Des`, `category_img`) VALUES
(1, 'Stationary', 'Whole sale stationery shop in Pakistan. All kind of school supplies available. Delivering all over the Pakistan.', '../img/Categoryimages/1.PNG'),
(2, 'Art Supplies', '', '../img/Categoryimages/2.jpg'),
(3, 'Sports & Toys', '', '../img/Categoryimages/3.PNG'),
(4, 'School Supplies', '', '../img/Categoryimages/4.jpg'),
(10, 'Skin care', '', '../img/Categoryimages/10.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_email`, `emp_pass`) VALUES
(1, 'Sufi', 'sufi@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `or_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `totalbill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `uid`, `email`, `number`, `address`, `date`, `totalbill`) VALUES
(1, 1, NULL, NULL, NULL, '2022-04-06', 150),
(2, 2, NULL, NULL, NULL, '2022-04-06', 100),
(0, 0, NULL, NULL, NULL, '2022-04-15', 576),
(0, 0, NULL, NULL, NULL, '2022-04-15', 576),
(0, 0, NULL, NULL, NULL, '2022-04-15', 576),
(0, 0, NULL, NULL, NULL, '2022-04-15', 1207),
(0, 0, NULL, NULL, NULL, '2022-04-15', 1207),
(0, 0, NULL, NULL, NULL, '2022-04-15', 576);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `Cate_id` int(11) NOT NULL,
  `product_title` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text DEFAULT NULL,
  `product_img3` text DEFAULT NULL,
  `product_img4` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `product_label` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `Cate_id`, `product_title`, `product_price`, `product_quantity`, `product_desc`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `status`, `product_label`) VALUES
(55, 4, 'White Chalk Box', 40, 13, 'White Chalk Box\r\n\r\nGood quality\r\nWell packed\r\nColore White\r\nUse in schools\r\nUse for blackboard', '../img/Productimages/White Chalk Box.PNG', NULL, NULL, NULL, 'Active', 'None'),
(56, 4, 'Dollar Fountain Pen Ink 60Ml Blue', 46, 3, 'Dollar Fountain Pen Ink 60ML Blue\r\n\r\nQuantity : 60 ml.\r\nThe ink is washable.\r\nThe ink can be used to fill any fountain pen.\r\nThe ink is quite pigmented.\r\nThe colour of the ink does not fade.\r\nIt is advisable to always keep your pen capped when not in use.', '../img/Productimages/ink.PNG', NULL, NULL, NULL, 'Active', 'None'),
(57, 4, 'Chart Paper No- 24 Sky Blue', 34, 3, 'Chart Paper No- 24 Sky Blue\r\n\r\nBright, colorful design allows excellent visibility.\r\nAcid free construction prevents colors from fading.\r\nDecorate your walls.\r\nUse to make art crafts.\r\nHigh quality material.\r\nWell finished and smooth surface to show your ', '../img/Productimages/blue paper.PNG', NULL, NULL, NULL, 'Active', 'None'),
(58, 4, 'Goldfish Lead Pencil Jar Hb-21/2 5000 (48pcs)', 576, 3, 'Goldfish Lead Pencil Jar Hb-21/2 5000 (48pcs)\r\n\r\nOriginally sandalwood scented, this has always been the company’s flagship pencil. Though they’re no longer fragranced, the Goldfish is so famous that asking for a “scented pencil” at any stationery store i', '../img/Productimages/Goldfish Lead Pencil.PNG', NULL, NULL, NULL, 'Active', 'None'),
(59, 4, 'Oro Scale Transpernt 6 inch', 26, 3, 'Oro Scale Transpernt 6 inch\r\n\r\nOro transparent 6 inch rulers feature both metric and imperial measurements, with a conversion table between inches and mm engraved on the reverse.\r\n\r\nUse in school as well as home by children.\r\nBeautiful design.\r\nGreat help', '../img/Productimages/Oro Scale Transpernt 6 inch.PNG', NULL, NULL, NULL, 'Active', 'None'),
(63, 3, 'Transforming Robot Car For Kids', 1173, 3, 'Transforming Robot Car For Kids\r\n\r\nDisfigured BMW super speed robot car for kids auto robot function.\r\nKnock and go action.\r\n3D Lights.\r\nVehicle to robot.\r\nSomething that kids will definitely enjoy.\r\nBattery operated.\r\nTransformer car.', '../img/Productimages/Transforming Robot Car For Kids2.PNG', '../img/Productimages/Transforming Robot Car For Kids.PNG', NULL, NULL, 'Active', 'None'),
(64, 3, 'Remote Control Car With 3D Lights', 1733, 3, 'Remote Control Car With 3D Lights\r\n\r\n3D famous car.\r\n4 channel remote control cars with 3D lights.\r\nIncluded battery and charger.', '../img/Productimages/Remote Control Car With 3D Lights3.PNG', '../img/Productimages/Remote Control Car With 3D Lights2.PNG', '../img/Productimages/Remote Control Car With 3D Lights.PNG', NULL, 'Active', 'None'),
(65, 3, 'Educational Building Blocks For Kids (35 pcs)', 1260, 3, 'Educational Building Blocks For Kids (35 pcs)\r\n\r\n35 piece set is perfect for preschool age building projects.\r\nThese lightweight easy to carry pieces are covered in wipe clean vegan leather.\r\nStorage cart sold separately.', '../img/Productimages/Educational Building Blocks For Kids (35 pcs)2.PNG', '../img/Productimages/Educational Building Blocks For Kids (35 pcs).PNG', NULL, NULL, 'Active', 'None'),
(66, 3, 'Spong Men Backpack Water 8113-67', 2835, 3, 'Spong Men Backpack Water 8113-67\r\n\r\nIdeal Toy for children tossing limit of the weapon is incredible.\r\nLight weight school pack style lash configuration simple to play.\r\nThe firearm works with pressure innovation, simply pull the half piece of the weapon ', '../img/Productimages/Spong Men Backpack Water 8113-672.PNG', '../img/Productimages/Spong Men Backpack Water 8113-67.PNG', NULL, NULL, 'Active', 'None'),
(70, 3, 'Building Blocks For kids', 1103, 3, 'Building Blocks For kids\r\n\r\nBuilding blocks for kids puzzle pieces are chunky enough so small hands can easily grip.\r\nFosters youngsters engine abilities, creative mind, imagination and hand to eye coordination\r\nSuggested age is 3+ years.\r\nInstructive toy', '../img/Productimages/Building Blocks For kids3.PNG', '../img/Productimages/Building Blocks For kids2.PNG', '../img/Productimages/Building Blocks For kids.PNG', NULL, 'Active', 'None'),
(71, 10, 'Green Clean Makeup Removing Cleansing Balm', 5000, 3, 'An award-winning makeup-removing face cleanser that melts away stubborn makeup, SPF, dirt, and oil and leaves skin hydrated with zero residue', '../img/Productimages/Green Cleansing Balm4.PNG', '../img/Productimages/Green Cleansing Balm3.PNG', '../img/Productimages/Green Cleansing Balm2.PNG', '../img/Productimages/Green Cleansing Balm.PNG', 'Active', 'None'),
(72, 10, 'Indigo Overnight Repair Serum in Cream Treatment', 9999, 3, 'A serum-in-moisturizer treatment that visibly calms irritation, strengthens skin’s barrier, and balances the microbiome for a healthy, hydrated glow.', '../img/Productimages/Indigo Overnight Cream4.PNG', '../img/Productimages/Indigo Overnight Cream3.PNG', '../img/Productimages/Indigo Overnight Cream2.PNG', '../img/Productimages/Indigo Overnight Cream.PNG', 'Active', 'None'),
(73, 10, 'Mandelic Acid Treatment', 899, 3, 'A clinically shown, fast-acting, targeted formula that reduces the look of hyperpigmentation and discoloration left behind by blemishes.', '../img/Productimages/Mandelic Acid Treatment4.PNG', '../img/Productimages/Mandelic Acid Treatment3.PNG', '../img/Productimages/Mandelic Acid Treatment2.PNG', '../img/Productimages/Mandelic Acid Treatment.PNG', 'Active', 'None'),
(74, 10, 'The Clarifying Clay Mask Exfoliating Pore Treatment', 4999, 3, 'A clarifying clay mask that subtly warms to open pores, absorb excess oil, gently exfoliate, and decongest skin without drying.', '../img/Productimages/The Clarifying Clay Mask4.PNG', '../img/Productimages/The Clarifying Clay Mask3.PNG', '../img/Productimages/The Clarifying Clay Mask2.PNG', '../img/Productimages/The Clarifying Clay Mask.PNG', 'Active', 'None'),
(75, 10, 'Soy pH-Balanced Hydrating Face Wash', 3999, 3, 'A universal face wash that’s proven to maintain skin’s pH while also cleansing, softening, and hydrating all skin types and tones.', '../img/Productimages/Soy pH-Balanced Hydrating Face Wash4.PNG', '../img/Productimages/Soy pH-Balanced Hydrating Face Wash3.PNG', '../img/Productimages/Soy pH-Balanced Hydrating Face Wash2.PNG', '../img/Productimages/Soy pH-Balanced Hydrating Face Wash.PNG', 'Active', 'None'),
(76, 2, 'Foldable Watercolor Paint Set Of 25 Colors', 2900, 3, 'Foldable watercolor paint Set of 25 colors\r\n\r\nFoldable watercolor paint Set of 25 colors the color is really energetic and deeply pigmented.\r\nSimple to mix to make an everlasting scope of Colors.\r\nQuickly to dry, proof to blurring and mark from the direct', '../img/Productimages/Foldable Watercolor Paint.PNG', NULL, NULL, NULL, 'Active', 'None'),
(77, 2, 'Titi Twist Oil Pastel Crayons 12 Assorted Colors', 600, 3, 'TiTi Twist oil Pastel Crayons 12 Assorted Colors\r\n\r\nHigh premium artist-grade quality oil pastels for all artists. Simple to form sharp skinny lines, soft daring lines, curves, and tones. These drawing twist titi oil pastel crayons is all you ought to ful', '../img/Productimages/Titi Twist Oil Pastel Crayons4.PNG', '../img/Productimages/Titi Twist Oil Pastel Crayons 3.PNG', '../img/Productimages/Titi Twist Oil Pastel Crayons 2.PNG', '../img/Productimages/Titi Twist Oil Pastel Crayons.PNG', 'Active', 'None'),
(78, 2, 'Glass Deco Paints', 380, 3, 'Glass Deco Paints 0253 (1688)\r\n\r\nGreat Painting material for imagination and shading sense.\r\nRepositionable on each lustrous material aside from acrylic surface.\r\nStickers stick to windows with no glue and are anything but difficult to eliminate.\r\n6 color', '../img/Productimages/Glass Deco Paints 2.PNG', '../img/Productimages/Glass Deco Paints 0253 (1688).PNG', NULL, NULL, 'Active', 'None'),
(79, 2, 'Cellophane Paper Sheet(Mix colour)', 30, 3, 'Cellophane Paper Sheet(Mix colour)\r\n\r\nCellophane sheet sheet measures approx. 7.5x 7.5 inches in 8 different vibrant colors.\r\nThese colored plastic wrap is made of premium materals, which laminated to maintain colors, offer extra durability and flexibilit', '../img/Productimages/Cellophane Paper Sheet.PNG', NULL, NULL, NULL, 'Active', 'None'),
(80, 2, 'M&G Water Soluble Color Pencil Set of 48', 235, 3, 'M & G Water Soluble Water Color Pencils in bright and smooth colors in exquisite tin pack for easy storage. Can be used dry and wet. Light weight with an easy grip 6 sided design.\r\n', '../img/Productimages/M&G Water Soluble Color.PNG', NULL, NULL, NULL, 'Active', 'None'),
(81, 1, 'Apple Furr Blaster Pack Pen Golden', 320, 3, 'Apple Furr Blaster Pack Pen Golden', '../img/Productimages/Apple Furr Blaster Pack Pen Golden.PNG', NULL, NULL, NULL, 'Active', 'None'),
(82, 1, 'Lined Design Cover Spiral Notebook', 550, 3, 'Happy Stationary Premium Quality Notebook 80 lined pages Each. Size: 5.5 inches x 8.15 inches Premium Quality Paper 150 Gsm.', '../img/Productimages/Lined Design Cover Spiral Notebook.PNG', NULL, NULL, NULL, 'Active', 'None'),
(83, 1, 'TSC Spiral Notebook Style 20', 550, 3, 'Happy Stationary Premium Quality Notebook 100 lined pages Each. Size: 5.5 inches x 8.15 inches Premium Quality Paper 150 Gsm.', '../img/Productimages/TSC Spiral Notebook.PNG', NULL, NULL, NULL, 'Active', 'None'),
(84, 0, 'Unicorn Glitter Pouch Blue', 795, 3, 'Unicorn Glitter Pouch Blue', '../img/Productimages/Unicorn Glitter Pouch Blue.PNG', NULL, NULL, NULL, 'Active', 'None'),
(85, 1, 'Feather Gel Pen', 195, 3, 'Feather Gel Pen  Random Color And Design Will Be Send You.\r\n', '../img/Productimages/Feather Gel Pen4.PNG', '../img/Productimages/Feather Gel Pen3.PNG', '../img/Productimages/Feather Gel Pen2.PNG', '../img/Productimages/Feather Gel Pen.PNG', 'Active', 'None'),
(86, 1, 'Donut Ballpoint Pen', 112, 3, 'Donut Ballpoint Pen\r\n', '../img/Productimages/Donut Ballpoint Pen4.PNG', '../img/Productimages/Donut Ballpoint Pen3.PNG', '../img/Productimages/Donut Ballpoint Pen2.PNG', '../img/Productimages/Donut Ballpoint Pen.PNG', 'Active', 'None'),
(87, 2, 'Crayola Fine Line Fabric Markers Set Of 10', 1495, 3, 'Bold colors are highly visible on both light and dark fabrics Fine-tip offers an easy way to create vivid, colorful designs Versatile formula works on cotton and polyester clothing and accessories Ink is certified AP nontoxic for safe use Designed for chi', '../img/Productimages/Crayola Fine Line Fabric Markers4.PNG', '../img/Productimages/Crayola Fine Line Fabric3.PNG', '../img/Productimages/Crayola Fine Line Fabric Markers2.PNG', '../img/Productimages/Crayola Fine Line Fabric.PNG', 'Active', 'Hot Trend'),
(88, 2, 'Derwent Artists Colored Pencils Set of 120', 24999, 3, 'Rich, deep aquamarine barrel has an elegantly curved, double-dipped end Large diameter strip allows naturally broad strokes and strong lines Slightly waxed texture for easy blending and shading Good lightfastness; break resistant Full range of 120 colors ', '../img/Productimages/Derwent Artists Colored Pencils4.PNG', '../img/Productimages/Derwent Artists Colored Pencils3.PNG', '../img/Productimages/Derwent Artists Colored Pencils2.PNG', '../img/Productimages/Derwent Artists Colored Pencils.PNG', 'Active', 'Hot Trend'),
(89, 1, 'UNI BALL PEN FINE DELUXE Pigment Ink 0.7mm', 175, 3, 'TIP : Stainless steel BALL : 0.7mm dia. tungsten carbide ball BARREL : Plastic(PP) INK : Water-based pigment ink INK REFILL : N/A INK COLOR : Black, Blue, Red\r\n', '../img/Productimages/UNI BALL PEN FINE DELUXE Pigment3.PNG', '../img/Productimages/UNI BALL PEN FINE DELUXE Pigment2.PNG', '../img/Productimages/UNI BALL PEN FINE DELUXE Pigment Ink.PNG', NULL, 'Active', 'Hot Trend'),
(90, 1, 'Kitty Corn Journal Notebook', 595, 3, 'Kitty Corn Journal Notebook Random Color Will Be Sent You Size: 4.9 Inches x 6.8 Inches\r\n', '../img/Productimages/Kitty Corn Journal Notebook4.PNG', '../img/Productimages/Kitty Corn Journal Notebook3.PNG', '../img/Productimages/Kitty Corn Journal Notebook2.PNG', '../img/Productimages/Kitty Corn Journal Notebook.PNG', 'Active', 'Feature'),
(91, 2, '3D Art Paint Photo Frame With Glitter Glue For kids', 875, 3, '3D Art Paint Photo Frame With Glitter Glue For kids\r\n', '../img/Productimages/3D Art Paint Photo Frame2.PNG', '../img/Productimages/3D Art Paint Photo Frame.PNG', NULL, NULL, 'Active', 'Feature'),
(92, 3, 'ABC Puzzle Wooden Learning Toys', 895, 3, 'ABC Puzzle Wooden Learning Toys\r\n', '../img/Productimages/ABC Puzzle Wooden Learning Toys.PNG', NULL, NULL, NULL, 'Active', 'Feature'),
(93, 3, '3D ABC Wooden Plate', 495, 3, 'Bright colors and visual shapes makes it attractive to ur kids\r\nSafe wooden material, and wear resistant.\r\nMultiple advantages bring to your baby, it can enhance their creativity, color recognition and cognitive ability.\r\nNo area limitation, you can bring', '../img/Productimages/3D ABC Wooden Plate4.png', '../img/Productimages/3D ABC Wooden Plate3.PNG', '../img/Productimages/3D ABC Wooden Plate2.PNG', '../img/Productimages/3D ABC Wooden Plate.PNG', 'Active', 'Best Saler'),
(94, 4, 'Stabilo Trio Eraser 1199 Single Piece', 70, 3, 'High-quality coloured triangular-shaped eraser. Phthalate-Free PVC eraser. Superior quality for effective erasing on various types of paper.\r\n', '../img/Productimages/Stabilo Trio Eraser 1199 Single Piece2.PNG', '../img/Productimages/Stabilo Trio Eraser 1199 Single Piece.PNG', NULL, NULL, 'Active', 'Best Saler'),
(95, 2, 'Sakura Moon Light & White Gel Pen Pack Of 12', 1850, 3, 'Sensationally brilliant opaque colors on dark-color papers and photos with 1.0mm ball. Attractable writing on black or such dark-color papers. Smooth-writing, very dense ink, and constant ink flow from start to end. 5 Fluorescent colors glow under a black', '../img/Productimages/Sakura Moon Light & White3.PNG', '../img/Productimages/Sakura Moon Light & White2.PNG', '../img/Productimages/Sakura Moon Light & White.PNG', NULL, 'Active', 'Best Saler');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passowrd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `first_name`, `last_name`, `email`, `passowrd`) VALUES
(1, 'Anas', 'Nadeem', 'sufi@gmail.com', '124'),
(7, 'arham', 'sohail', 'arhamsohail@gmail.com', ''),
(8, 'ebad', 'naeem', 'ebad@gmail.com', '124'),
(9, 'Fasi', 'Naeem', 'fasi@gmail.com', '123'),
(10, 'tanzeel', 'naeem', 'tanzeel@gmail.com', '123'),
(15, 'sufi', 'g', 'sufi33@gmail.com', '3445');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wid`, `product_id`, `uid`) VALUES
(151, 58, 8),
(152, 65, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cate_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
