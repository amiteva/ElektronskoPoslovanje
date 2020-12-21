SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `cart` (
    `cart_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `user_id` int(11) NOT NULL,
    `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `product` (
    `item_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `item_brand` varchar(200) NOT NULL,
    `item_name` varchar(255) NOT NULL,
    `item_price` double(10,2) NOT NULL,
    `item_msrp` double(10,2) NOT NULL,
    `item_rating` int(11) NOT NULL DEFAULT 0,
    `item_nr` int(11) NOT NULL DEFAULT 0,
    `item_image` varchar(255) NOT NULL,
    `item_register` datetime DEFAULT NOW(),
    `item_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_msrp`, `item_rating`, `item_nr`, `item_image`, `item_register`, `item_desc`) VALUES
(1, 'Fridge', 'VOX SBS 6025 IX', 499.90, 899.90, 5, 60, './assets/products/p1.png', NOW(), 'Ameriški hladilnik VOX Electronics SBS 6025 IX se ponaša z energetskim razredom A+ in prostornino hladilnega dela kar 341 l. Ima LED osvetljavo, anti-bakterijsko zaščito ter NO FROST funkcijo.'),
(2, 'Fridge', 'TESLA RS0905H', 109.90, 139.90, 5, 13, './assets/products/p2.png', NOW(), 'Tesla prostostoječi hladilnik RS0905H ima 83 litrov prostornine hladilnega dela in 10 litrov prostornine zamrzovalnega predala. Uvršča se v energijski razred A+.'),
(3, 'Fridge', 'Gorenje RK6192AXL4', 393.72, 519.90, 5, 25, './assets/products/p3.png', NOW(), 'Prostostoječi kombinirani hladilnik RK6192AXL4 energijskega razreda A++ ponuja 204 litre v hladilnem in 108 litrov v zamrzovalnem delu. Odlikuje ga IonAir tehnologija z vgrajenim ionizatorjem za optimalno klimo za shranjevanje živil. V pomoč pri čiščenju bo FrostLess tehnologija za zmanjšano nastajanje ledu. Navdušuje z elegantno metalizirano sivo barvo.'),
(4, 'Fridge', 'Gorenje RK4181PS4', 267.29, 379.90, 5, 7, './assets/products/p4.png', NOW(), 'Gorenje kombinirani hladilnik RK4181PS4 ima 198 litrov prostornine hladilnega dela in 66 litrov prostornine zamrzovalnega dela. Uvršča se v energijski razred A+.'),
(5, 'Fridge', 'Gorenje RK6192SYBK', 389.90, 539.90, 5, 2, './assets/products/p5.png', NOW(), 'Gorenje RK6192SYBK je prostostoječi kombinirani hladilnik s skupno neto prostornino 314 litrov. Uvršča se v energijski razred A++.'),
(6, 'Oven', 'Bosch HBF153EB0', 299.62, 389.00, 3, 1, './assets/products/p6.png', NOW(), 'Bosch vgradna pečica je s66 litri prostornine in petimi funkcijami pečenja kos praktično vsem kuharskim podvigom. Ponaša se z LED zaslonom in ima tri nivoje za pečenje. 3D kroženje zraka omogoča optimalno porazdelitev temperature po vseh nivojih za vedno popolne rezultate pečenja.'),
(7, 'Oven', 'Gorenje BO735E20B-2', 289.90, 359.90, 5, 7, './assets/products/p7.png', NOW(), 'Gorenje vgradna pečica BO735E20B-2 se med drugim ponaša s prostornino 71 litrov, mehanskim upravljanjem in termičnim varovalom za samodejni izklop.'),
(8, 'Oven', 'Candy FCPKS816X', 311.93, 559.90, 5, 8, './assets/products/p8.png', NOW(), 'Candy vgradna pečica FCPKS816X/E ima 70 litrov prostornine in 9 programov. Uvršča se v energijski razred A.'),
(9, 'Oven', 'Bosch HBA574BR00', 489.90, 629.00, 5, 4, './assets/products/p9.png', NOW(), '71-l vgradna pečica priznanega proizvajalca Bosch je visokokakovostna, učinkovita in priročna pečica z avtomatsko samočistilno funkcijo (piroliza) in sistemom AutoPilot.'),
(10, 'Oven', 'VOX EBB 1000 IX XL', 149.90, 179.99, 4, 5, './assets/products/p10.png', NOW(), 'Vox Electronics vgradna pečica EBB 1000 IX XL ima 72 litrov prostornine. Ima osvetljeno notranjost, upravlja pa se z gumbi na sprednji plošči. Spada v energijski razred A.'),
(11, 'WashingMachine', 'Gorenje WHE62S3', 259.17, 399.90, 5, 32, './assets/products/p11.png', NOW(), 'Gorenje pralni stroj WHE62S3 ima zmogljivost pranja 6 kg in spada v energijski razred A+++. Ima 15 programov in omogoča nastavitev temperature. Opremljen je s senzorjem teže.'),
(12, 'WashingMachine', 'Candy CSP 1272 TWS3', 269.90, 499.90, 5, 129, './assets/products/p12.png', NOW(), 'Candy pralni stroj z zmogljivostjo pranja 7 kilogramov ter do 1200 obratov na minuto pri ožemanju. Pralni stroj se uvršča v A+++ energijski razred. Dodano ima novo tehnologijo Quick Jet, s katerim dosežete neverjetne rezultate pranja pri polni zmogljivosti v le 29 minutah, za manjše količine pranja pa tudi v 14,30 in 44 minutah. Dodan ima tudi program s paro, ki poskrbi za manjšo zmečkanost perila. Opremljen je z napredno funkcijo KG detektor, ki oceni količino perila ter prilagodi čas pranja in porabo vode ter energije. Poleg klasičnega upravljanja ima stroj na voljo tudi možnost dodatnega upravljanja s pametnim telefonom preko NFC sistema.'),
(13, 'WashingMachine', 'TESLA WF60830M', 214.54, 244.90, 5, 21, './assets/products/p13.png', NOW(), 'Pralni stroj Tesla WF60830M spada v energijski razred A++ in ima kapaciteto pranja 6,5 kg. Pri ožemanju doseže do 800 obratov na minuto. Ponuja 23 programov, med katerimi so trije namenjeni dnevnemu pranju perila.'),
(14, 'WashingMachine', 'Gorenje WEI62S3', 329.90, 479.90, 5, 146, './assets/products/p14.png', NOW(), 'Gorenje pralni stroj WaveActive WEI62S3 ima zmogljivost pranja 6 kg in spada v energijski razred A+++. Ima 16 programov in fukcijo AutoWash. Za odlično delovanje poskrbi inverterski motor.'),
(15, 'WashingMachine', 'Bosch WAN28122', 399.90, 469.00, 0, 0, './assets/products/p15.png', NOW(), 'Bosch pralni stroj WAN28122 z zmogljivostjo pranja 7 kg, 55-l bobnom, LED zaslonom, tehnologijo ActiveWater™ in programom AllergyPlus.');


CREATE TABLE `users` (
    `usersId` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `cartId` int(11) DEFAULT NULL,
    `usersName` varchar(128) UNIQUE NOT NULL,
    `usersEmail` varchar(128) UNIQUE NOT NULL,
    `usersUid` varchar(128) NOT NULL,
    `usersPwd` varchar(128) NOT NULL,
    `userStatus` int(11) NOT NULL DEFAULT 1, /*0-innactive, 1-active*/
    `userRole` int(11) NOT NULL /*0-admin, 1-prodajalec, 2-stranka, 3-guest*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `userRole`) VALUES
(1, 'guest', 'none', 'Guest', 'none', 3),
(2, 'Admin', 'admin@gmail.com', 'admin', '$2y$10$rjOaypIQknnY0oePKVHtC.lJtjGHbg7lqt1XNYbp8grJkrpC8UCZS', 0),
(3, 'Seller', 'seller@gmail.com', 'seller', '$2y$10$G.bD/RFCjX/LRronmZCZnOZ73G9DUjZzqhmMH/H4kW.pkDteib4cm', 1),
(4, 'Customer', 'customer@gmail.com', 'customer', '$2y$10$obIhVhlQuGlF4T2X6RP2CeIZpJpCKmhcOVINOP6humqjVx1qfuNle', 2);



CREATE TABLE `wishlist` (
    `cart_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `item_id` int(11) NOT NULL,
    CONSTRAINT `fk_wishlist_users`
        FOREIGN KEY (user_id) REFERENCES users(usersId)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    CONSTRAINT `fk_wishlist_product`
        FOREIGN KEY (item_id) REFERENCES product(item_id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cartItemMatch` (
     `cart_id` int(11) NOT NULL,
     `item_id` int(11) NOT NULL,
     CONSTRAINT `fk_cartItemMatch_users`
         FOREIGN KEY (cart_id) REFERENCES cart(cart_id)
         ON DELETE CASCADE
         ON UPDATE RESTRICT,
     CONSTRAINT `fk_cartItemMatch_product`
         FOREIGN KEY (item_id) REFERENCES product(item_id)
             ON DELETE CASCADE
             ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

