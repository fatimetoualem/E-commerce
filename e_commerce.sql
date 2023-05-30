-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2023 at 09:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `idCategory` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`idCategory`, `name`) VALUES
(1, 'Teint'),
(2, 'Yeux'),
(3, 'Levres'),
(4, 'Accesoire');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `idFavorites` int NOT NULL,
  `idUser` int NOT NULL,
  `idProduit` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idOrder` int NOT NULL,
  `nOrder` varchar(20) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total` float NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `payment` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shipping` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `userId` int DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProduct` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int NOT NULL,
  `categoryId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProduct`, `title`, `image`, `description`, `price`, `quantity`, `categoryId`) VALUES
(1, 'GUERLAIN', 'fond_de_teint_guerlain1.png', 'Terracotta Le Teint\r\nFond De Teint Perfection Naturelle\r\nFraîcheur Bonne Mine', '22', 10, 1),
(2, 'MAKE UP FOR EVER HD Skin', 'fond_de_teint_makeUpForEver1.png', 'Fond De Teint Longue Tenue ImperceptibleDécouvrez HD Skin\r\nle nouveau fond de teint', '44', 8, 1),
(3, 'HUDA BEAUTY', 'palette_huda1.png', 'Nude Obsessions\r\nPalette De 9 Ombres À Paupières\r\nDécouvrez nos 3 mini palettes d\'ombres à paupières Nude Obsessions', '33', 12, 2),
(4, 'NARS', 'palette_nars1.png', 'Voyageur Eyeshadow Palette\r\nPalette De Fards À Paupières Format Voyage', '12', 12, 2),
(5, 'TOO FACED', 'fond_de_teint_tooFaced1.png', 'Born This Way Matte\r\nFond De Teint Longue Tenue 24 Heures\r\nCe fond de teint matte Born This Way préserve parfaitement', '45', 10, 1),
(6, 'Dior', 'fond_de_teint_dior1.png', 'Dior Forever\r\nFond De Teint Mat 24 H Sans Transfert – Enrichi En Soin & Clean', '55', 6, 1),
(7, 'Dior', 'anti_cerne_dior1.png', 'Dior Forever Skin Correct\r\nCorrecteur Anticerne Haute Couvrance Tenue 24H', '29', 6, 1),
(8, 'TARTE ', 'anti_cerne_tarte1.png', 'Shape Tape™\r\nAnticernes', '18', 8, 1),
(9, 'HUDA BEAUTY', 'anti_cerne_huda1.png', 'FAUXFILTER Luminous Matte\r\nAnticernes Liquide', '34', 11, 1),
(10, 'TOO FACED', 'anti_cerne_tooFaced1.png', 'Born This Way Super Coverage Concealer\r\nCorrecteur Anticernes', '23', 6, 1),
(11, 'DIOR BACKSTAGE', 'palette_dior1.png', 'Dior Backstage Eye Palette\r\nPalette Yeux\r\nFards Pigmentés Multi-Usage', '29', 10, 2),
(12, 'SEPHORA COLLECTION', 'palette_sephora1.png', 'Color Shifter\r\nCouleurs À Superposer Et À TransformerHackez tous vos looks en un instant avec ces 5 mini palettes yeux', '9', 16, 2),
(13, 'BENEFIT COSMETICS', 'mascara_benefit1.png', 'BADgal BANG !\r\nMascara Volumateur \r\nUn pas de géant pour les cils,\r\ndécouvrez le meilleur mascara volume', '28', 12, 2),
(14, 'SEPHORA COLLECTION', 'mascara_sephora1.png', 'Big By Definition Waterproof\r\nMascara Volume Effet Cils Démultipliés\r\nParce que chaque cil compte, SEPHORA COLLECTION lance son mascara Big By', '9', 8, 2),
(15, 'REM BEAUTY', 'mascara_remBeauty.png', 'Flourishing\r\nMascara AllongeantDécouvrez ce mascara\r\nà la formule allongeante\r\net nourrissante', '25', 10, 2),
(16, 'TOO FACED', 'mascara_tooFaced1.png', 'Better Than Sex Mascara\r\nMascara Volumisateur\r\nLe Mascara Volumisateur\r\nBetter Than Sex de Too Faced \r\n', '8', 19, 2),
(17, 'MAC', 'rouge_a_levres_mac1.png', 'Retro Matte\r\nLipstick Valentine\'s Day\r\nRouge À Lèvres Ultra Mat\r\n', '29', 10, 3),
(18, ' REVOLUTION SKINCARE', 'rouge_a_levres_revolution1.png', 'Satin Kiss Lipstick #heart Race 3,50 Gr\r\nRouge à lèvres', '9', 10, 3),
(19, 'CHARLOTTE TILBURY', 'rouge_a_levres_charlotte1.png', 'Matte Revolution\r\nRouge À Lèvres\r\nObtenez de jolies lèvres ultra-lisses ! Le rouge à lèvres Matte Revolution', '25', 4, 3),
(20, 'CLINIQUE', 'rouge_a_levres_clinique1.png', 'Almost Lipstick\r\nBaume À Lèvres\r\nLe baume à lèvres culte Clinique pour un fini naturel et une couleur unique', '35', 10, 3),
(21, 'DIOR BACKSTAGE', 'rouge_a_levres_dior1.png', 'Dior Addict Lip Glow Oil\r\nHuile À Lèvres Colorée\r\nNourrissante & Brillante', '55', 4, 3),
(22, 'FENTY BEAUTY', 'rouge_a_levres_fenty1.png', 'Gloss Bomb Cream\r\nLaque À Lèvres Couleur Intense\r\nNotre Le gloss iconique de FENTY BEAUTY, désormais décliné en une version laquée', '32', 6, 3),
(23, 'LANCÔME', 'rouge_a_levres_lancome1.png', 'L\'Absolu Rouge Drama Ink\r\nEncre À Lèvres Semi-Mate Longue Tenue', '43', 8, 3),
(24, 'MAYBELLINE NEW YORK', 'rouge_a_levres_maybeline1.png', 'Gloss à lèvres Lifter Gloss\r\nGloss à lèvres hydratant et effet repulpant\r\n', '8', 5, 3),
(25, 'Nocibé', 'faux_cile_nocine1.png', 'ceci est un faux cile de Nocibé', '5', 5, 4),
(26, 'Nocibé', 'eponge_nocibe1.png', 'Ceci est un eponge de fond de teint de Nocibé', '5', 11, 4),
(27, 'Nocibé', 'cotton_nocibe1.png', 'Reusable Cotton Pads \r\nCotons Démaquillants\r\n\r\n\r\n\r\n', '2', 4, 4),
(28, 'Tweezerman', 'curler_nocibe1.png', 'Procurl Lash Curler\r\nRecourbe-cils', '34', 2, 4),
(29, 'IT COSMETICS', 'pinceau_itCosmetique1.png', 'Heavenly Luxe\r\nPinceau fond de teint liquide, crème, poudre', '29', 4, 4),
(32, 'D+ FOR CARE', 'forCare_nocibe1.png', 'Shaker D+ FOR CARE\r\nShaker D+ FOR CARE', '33', 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `productsinorder`
--

CREATE TABLE `productsinorder` (
  `productId` int NOT NULL,
  `orderId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `gender` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `postalCode` int NOT NULL,
  `city` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `role`, `gender`, `name`, `firstName`, `email`, `address`, `password`, `postalCode`, `city`) VALUES
(18, 'user', 'Madame', 'Alem', 'Fatimetou', 'fatimetoualem@gmail.com', '14 rue mokhtardadah', '91b5ee39622e3578e6e06139360c516b63684a42', 14900, 'Nouakchott'),
(19, 'user', 'Monsieur', 'Zeyad', 'Mohamed', 'mohamedzeyad@gmail.com', '22 rue maradin', 'edd140da54a99e3fd713a6545cd343e887b0894c', 13190, 'Aix-En-Provence');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`idFavorites`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `productsinorder`
--
ALTER TABLE `productsinorder`
  ADD KEY `productId` (`productId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `idCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `idFavorites` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `products` (`idProduct`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`categoryId`) REFERENCES `categorys` (`idCategory`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `productsinorder`
--
ALTER TABLE `productsinorder`
  ADD CONSTRAINT `productsinorder_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`idProduct`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `productsinorder_ibfk_3` FOREIGN KEY (`orderId`) REFERENCES `orders` (`idOrder`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
