-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 06:42 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addressbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'Skin Care', 1),
(2, 'Hair Care', 1),
(3, 'Makeup', 1),
(4, 'Jewellery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'maaz', 'maaz@gmail.com', '123456', 'test query', '2022-10-30 22:45:56'),
(2, 'Maaz Tajammul', 'maaztajammul63@gmail.com', '03133987079', 'Hi there! Chal post kar', '2022-11-13 07:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `mihpayid` varchar(20) NOT NULL,
  `payu_status` varchar(10) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(1, 1, 'Janssen -Intensive Face Scrub 50ml', 4900, 3910, 10, '730575209_janssen--intensive-face-scrub-50ml.jpg', 'Janssen', 'About:\r\nCream peeling for demanding skin. With finely ground peach granules.\r\n\r\nHow to use:\r\nApply Intensive Face Scrub onto the cleansed skin of the face and neckline. Distribute and massage in gently for a few minutes with moistened fingers. Then remove thoroughly with warm water or compresses. Then re-cleanse with tonic. Apply 1-2 x per week. Ideal before applying a highly concentrated active substance preparation or a self-bronzing product.\r\n\r\nTip: Simply stroke stubborn granules off from dry skin using a thick brush.\r\n\r\nNote: Any use of a peeling product causes the epidermis to become thinner and sensitizes it towards UV light. It is therefore vital to ensure adequate UV protection for a few days and to apply Face Guard during the day. Only then apply the care cream on top as usual.\r\n\r\nIngredients:\r\n• Finely ground peach kernels: Abrasive particles, ground and rounded, smooth the skin surface\r\n\r\n• Macadamia oil: Cares for the skin, leaving it feeling velvety and soft', '', '', '', 1),
(2, 1, 'LOreal Paris - Hyaluron Expert Replumping Moisturizing Night Cream 50 ml', 1499, 1274, 10, '290228652_loreal-paris---hyaluron-expert-replumping-moisturizing-night-cream-50-ml.jpg', 'Loreal Paris', 'New Hyaluron Expert Powered by high concentration of 2 types Of Hyaluronic Acid: 1) High Molecular Hyaluronic Acid to help moisturize and smooth skin\'s surface 2) Micro Hyaluronic Acid helps replumps skin with moisture.\r\n• The skin is replumped with moisture, fine lines are smoothed, fresh skin and glow are back.\r\n• Lightweight and non-greasy.\r\n• Tested under dermatological control.\r\n• Suitable for all skin types, even sensitive.\r\n\r\nHOW TO USE\r\nApply every night with circular movements on a thoroughly cleansed face and neck.\r\nFor the best results use together with the other products from Hyaluron Expert range: a replumping moisturizing day cream to smooth & nourish skin, and a replumping moisturizing anti-wrinkle eye cream for the eye zone.\r\n\r\nINGREDIENTS\r\nAQUA / WATER, GLYCERIN, ETHYLHEXYL SALICYLATE, NIACINAMIDE, DIMETHICONE, C12-15 ALKYL BENZOATE, OCTOCRYLENE, PENTYLENE GLYCOL, BUTYL METHOXYDIBENZOYLMETHANE, OCTYLDODECANOL, ISOPROPYL ISOSTEARATE, TRIETHANOLAMINE, BEHENYL ALCOHOL, PHENYLBENZIMIDAZOLE SULFONIC ACID, AMMONIUM POLYACRYLOYLDIMETHYL TAURATE, IRIS FLORENTINA ROOT EXTRACT, CAPRYLOYL SALICYLIC ACID, DISODIUM EDTA, ETHYLHEXYLGLYCERIN, HYDROLYZED OPUNTIA FICUS-INDICA FLOWER EXTRACT, SODIUM HYALURONATE, PANTHENOL, TOCOPHERYL ACETATE, CETYL ALCOHOL, ALUMINA AMMONIUM ACRYLOYLDIMETHYLTAURATE/STEARETH-25 METHACRYLATE CROSSPOLYMER, BUTYLENE GLYCOL, CAPRYLYL GLYCOL, CARBOMER, CETEARYL ALCOHOL, CETEARYL GLUCOSIDE, DISODIUM STEAROYL GLUTAMATE, MYRISTIC ACID, PALMITIC ACID, PEG-100 STEARATE, PTFE, STEARIC ACID, TITANIUM DIOXIDE, DIMETHICONOL, ALPHA-ISOMETHYL IONONE, BENZYL ALCOHOL, CITRAL, CITRONELLOL, GERANIOL •LIMONENE, LINALOOL, CHLORPHENESIN, PHENOXYETHANOL, PARFUM / FRAGRANCE. (F.I.L. B234977/1).\r\n\r\n\r\n**Colors may slightly vary in physical due to lighting and photographic shades.', '', '', '', 1),
(3, 1, 'LOreal Paris - Revitalift Classic Anti Aging Day Cream 50 ML', 1899, 1614, 10, '804578350_loreal-paris---revitalift-classic-anti-aging-day-cream-50-ml.jpg', 'LOreal Paris', 'Turn back the clock with Revitalift.\r\n• L\'Oréal Paris® Revitalift Day Cream is enriched with Advanced Pro-Retinol.\r\n• A powerful dermatologist-inspired anti-wrinkle ingredient known to help smooth the skin\'s surface.\r\n• The formula is also enriched with Fibrelastyl, a firming complex which helps reinforce skin elasticity for a firmer skin.\r\n\r\nHOW TO USE\r\nApply daily on a perfectly cleansed face and neck using circular motions.\r\n\r\nINGREDIENTS\r\nIn general, Vitamin A is often referred to in skin care as retinol; the active form of retinol (Vitamin A) is retinoic acid.\r\nAqua / Water, Cyclohexasiloxane, Glycerin, Paraffinum Liquidum / Mineral Oil, Myristyl Myristate, Butyrospermum Parkii Butter / Shea Butter, Stearic Acid, Palmitic Acid, Peg-100 Stearate, Cera Alba / Beeswax, Glyceryl Stearate, Peg-20 Stearate, Stearyl Alcohol, Glycine Soja Protein / Soybean Protein, Triethanolamine, Isohexadecane, Salicyloyl Phytosphingosine, Drometrizole Trisiloxane, Phenyl Ethyl Alcohol, Disodium Edta, Hydrolyzed Soy Protein, Acetyl Trifluoromethylphenyl Valylglycine, Faex Extract / Yeast Extract, Ethylhexyl Methoxycinnamate, Polysorbate 80, Acrylamide/Sodium Acryloyldimethyltaurate Copolymer, Acrylonitrile/Methyl Ethacrylate/Vinylidene Chloride, Copolymer, Cetyl Alcohol, Retinyl Palmitate, Methylparaben, Sodium Dehydroacetate, Chlorhexidine Digluconate, Chlorphenesin, Ethylparaben, Linalool, Geraniol, Alpha-Isomethyl Ionone, Amyl Cinnamal, Limonene, Citronellol, Butylphenyl Methylpropional, Hexyl Cinnamal, Benzyl Alcohol, Benzyl Benzoate, Benzyl Salicylate, Parfum / Fragrance, Phenoxyethanol. (F.I.L. B173286/1)\r\n\r\n\r\n**Colors may slightly vary in physical due to lighting and photographic shades.', '', '', '', 1),
(4, 2, 'Dove - Intensive Repair Shampoo 355ml', 740, 666, 10, '717045854_dove---intensive-repair-355ml.jpg', 'Dove', 'Dove Nutritive Solutions Intensive Repair Dry Hair Shampoo for damaged hair helps to treat the appearance of heat damaged hair so that it looks healthy, strong against breakage and beautiful. This hair shampoo treatment for damaged hair helps to restore your hairs strength against breakage, making it progressively healthier-looking. Its unique formula helps to visibly repair and progressively nourish damaged hair with continuous use when used as a system with Dove Nutritive Solutions Intensive Repair hair conditioner, so you can help protect your hair against future damage with this nourishing shampoo. Dove Nutritive Solutions Intensive Repair Strengthening Shampoo, formulated with Nutri-Keratin Repair Actives and part of the Dove Nutritive Solutions range, helps your hair to recover from damage in two different ways. The formula repairs signs of surface damage, making your hair look and feel smooth and strong against breakage. By helping to reinforce your hair against breakage, it can also prevent the appearance of split ends and damage caused by coloring and heat styling. It also penetrates the strands to provide hair nourishment deep inside, making your hair look healthy.', '', '', '', 1),
(5, 2, 'Dove - Fortifying Ritual Conditioner 355ml', 740, 666, 10, '171349452_dove---fortifying-ritual-conditioner-355ml.jpg', 'Dove', 'Dove Shine & Smoothness Conditioner and Conditioner are inspired by Indian rituals to give you hair care that goes further. Enriched with mango butter and almond oil, known for their nourishing and moisturizing properties, Dove Shine & Smoothness Conditioner help moisturize dry, dull hair to make each strand soft and smooth. The gentle, caring formula of this conditioning system is specially designed to nourish dull hair from root to tip, leaving every strand moisturized with a radiant shine. Plus, its sweet, delicate tropical scent will whisk you away to the holiday of your dreams. If you like washing your hair every day, you need your shampoo to be as caring as possible. This Conditioner with almond oil, when paired with Dove Smoothness & Shine Conditioner, is perfect for moisturizing your locks and giving dry, dull hair the everyday care it deserves.', '', '', '', 1),
(6, 2, 'Framesi - FramColor 2001 - 5/NP Light Chestnut', 900, 765, 10, '735237711_5NPLightChestnut.jpg', 'Framesi', 'Framcolor 2001 is a permanent and luminous color with an anti-age formula. It contains Amaranth and Coconut oil which keep the hair hydrated and shiny. It contains Vitamin C which blocks color oxidation, keeping hair young and vital. It also contains Booster System Hi-Technology, ensuring best and even hair color results at all time. It enables lightening and coverage in one gesture. Parabens and gluten free. Get the best hair colors in Pakistan only at MakeUpCityShop.com.\r\nFramcolor 2001 Natural Perfects is a color series which provides superior grey coverage with natural looking hair and radiance. Use it to cover your greys and preserve your natural looks. It gives a natural warm coverage. It can also be used for fashion colors and highlights. It is recommended to be used with Professional Activator 20 (developer) for 30-35 minutes to achieve a perfect coverage, Professional Activator 30 or 40 (developer) for 45 minutes to achieve a fashion color and Professional Activator 5 or 10 (developer) for 5-15 minutes for toning and highlights. It is to be used in the ratio 1:2 (color:developer).\r\n- Provides up to 100% of grey coverage\r\n- Gives perfectly natural results for coverage, fashion base and highlights\r\n- Recommended to be used with Professional Activator 5, 10, 20, 30 or 40 (developer) depending on the usage\r\n- Recommended time: 5-45 minutes depending on the usage', '', '', '', 1),
(7, 3, 'ST London - Matte Moist Lipstick -129 - Pink Rouge', 1010, 656, 10, '651932626_MatteMoistLipstickPinkRouge129.jpg', 'ST London', 'About:\r\nUltra-smooth, high coverage lipstick that glides on your lipstick giving vibrant color in just 1 swipe. Gives a matte finish, while still keeping lips moisturized.\r\nBenefits:\r\nLong lasting, comfortable wear, intense color in first swipe.\r\nHow to use or apply:\r\nApply the lipstick directly on to your lips or with the help of ST London lip brush.\r\n\r\n**Colors may slightly vary in physical due to lighting and photographic shades.', '', '', '', 1),
(8, 3, 'GOSH-BB Powder', 2670, 801, 10, '792103520_gosh---bb-powder.jpg', 'Gosh', 'The silky BB POWDER combines light-coverage makeup. It is ideal for those who prefer a flawlessly matt look or just need a little anti-shine magic in certain areas. Perfect to use with any foundation for a natural and mattifying look.\r\nIMPORTANT POINTS\r\n• Light coverage\r\n• Natural look\r\n• Matt finish\r\n• Silky texture\r\n• Vegan\r\n**Colors may slightly vary in physical due to lighting and photographic shades.', '', '', '', 1),
(9, 3, 'ST London - Sparkling Eye Liner - Purple', 1390, 903, 10, '251215809_SparklingEyeLinerPurple.jpg', 'ST London', 'ST London’s Sparkling Eye Liner is a super-soft easy to glide liquid liner with a shimmery effect and a stay that lasts all day.\r\n\r\n\r\n**Colors may slightly vary in physical due to lighting and photographic shades.', '', '', '', 1),
(10, 4, 'Pearl Crescent Necklace', 899, 809, 10, '249793094_Pearl Crescent Necklace.jpg', 'LimeLight', 'Herringbone and singaporean chains in layered necklace style\r\nPearl and crescent pendants\r\nClasp closure\r\nColor: Golden\r\nMaterial: Metal', '', '', '', 1),
(11, 4, 'Green Tone Earrings Set', 499, 424, 10, '212154632_Green Tone Earrings Set.jpg', 'LimeLight', 'Earrings in green shade\r\nPush back closure\r\nColor: Green\r\nMaterial: Plastic', '', '', '', 1),
(12, 4, 'EMERALD AND POLKI PAIR OF BANGLES', 12000, 9600, 10, '771338907_EMERALD AND POLKI PAIR OF BANGLES.jpg', 'Noor Jahan Jewels', 'Each bangle 24 k gold plated handcrafted signature designer polki bangles, enchanted with real ruby, jade and Polki stones, (can be customize in any color scheme on demand)', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(1, 'Maaz Tajammul', 'admin', 'maaztajammul63@gmail.com', '923133987079', '2022-11-16 12:24:03'),
(2, 'Maaz Tajammul', 'maaz', 'maaztajammul67@gmail.com', '923133987079', '2022-11-16 12:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
