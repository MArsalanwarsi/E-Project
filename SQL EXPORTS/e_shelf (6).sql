-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 09:36 PM
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
-- Database: `e_shelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_des` longtext DEFAULT NULL,
  `book_price` int(11) DEFAULT NULL,
  `book_author` varchar(255) DEFAULT NULL,
  `book_category` varchar(255) DEFAULT NULL,
  `book_pdf` varchar(255) DEFAULT NULL,
  `book_img1` varchar(255) DEFAULT NULL,
  `book_img2` varchar(255) DEFAULT NULL,
  `after_discount_price` int(11) DEFAULT NULL,
  `pdf_price` int(11) DEFAULT 0,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_des`, `book_price`, `book_author`, `book_category`, `book_pdf`, `book_img1`, `book_img2`, `after_discount_price`, `pdf_price`, `status`) VALUES
(8, 'Alice\'s Adventures in Wonderland', 'On a drowsy afternoon by a riverbank, a young and distracted Alice follows a rabbit into a fantastical underground world that grows curiouser and curiouser. Dared, insulted, amused, and threatened by a succession of anthropomorphic creatures, the indomitable Alice falls deeper into a swirl of the imagination where logic has no place.\r\n\r\nReferenced, resourced, analyzed, and embraced since its publication in 1865, Carroll’s masterpiece of the irrational has inspired such varied artists as Walt Disney, Marilyn Manson, Jerome Kern, James Joyce, and Tim Burton. It stands as one of the most extravagantly and ingeniously absurd works in the English language.\r\n\r\nRevised edition: Previously published as Alice\'s Adventures in Wonderland, this edition of Alice\'s Adventures in Wonderland (AmazonClassics Edition) includes editorial revisions.', 2000, 'Lewis Carroll', 'Fantasy', 'yes', '51MDljSTrTL._SY445_SX342_.jpg', 'download.jpg', 1500, 500, 'In Stock'),
(9, 'Earthsea', 'The first novel of Ursula K. Le Guin\'s must-read Earthsea Cycle. \"The magic of Earthsea is primal; the lessons of Earthsea remain as potent, as wise, and as necessary as anyone could dream.\" (Neil Gaiman)\r\n\r\nGed was the greatest sorcerer in Earthsea, but in his youth he was the reckless Sparrowhawk. In his hunger for power and knowledge, he tampered with long-held secrets and loosed a terrible shadow upon the world.\r\n\r\nThis is the tumultuous tale of his testing, how he mastered the mighty words of power, tamed an ancient dragon, and crossed death\'s threshold to restore the balance.\r\n\r\nWith stories as perennial and universally beloved as The Chronicles of Narnia and The Lord of The Rings—but also unlike anything but themselves—Ursula K. Le Guin’s Earthsea novels are some of the most acclaimed and awarded works in literature. They have received accolades such as the National Book Award, a Newbery Honor, the Nebula Award, and many more honors, commemorating their enduring place in the hearts and minds of readers and the literary world alike.\r\n\r\nJoin the millions of fantasy readers who have explored these lands. As The Guardian put it: \"Ursula Le Guin\'s world of Earthsea is a tangled skein of tiny islands cast on a vast sea. The islands\' names pull at my heart like no others: Roke, Perilane, Osskil . . .\"\r\n\r\nThe Earthsea Cycle includes:\r\n\r\nA Wizard of Earthsea\r\nThe Tombs of Atuan\r\nThe Farthest Shore\r\nTehanu\r\nTales from Earthsea\r\nThe Other Wind', 2500, 'Ursula K. Le Guin\'s', 'Fantasy', 'yes', '81B1Dgvi-OL._SY522_.jpg', '91InJW57aHL._AC_UF1000,1000_QL80_.jpg', 2000, 600, 'In Stock'),
(10, 'On the Midwinter Day', 'On the Midwinter Day that is his eleventh birthday, Will Stanton discovers a special gift -- that he is the last of the Old Ones, immortals dedicated to keeping the world from domination by the forces of evil, the Dark. At once, he is plunged into a quest for the six magical Signs that will one day aid the Old Ones in the final battle between the Dark and the Light. And for the twelve days of Christmas, while the Dark is rising, life for Will is full of wonder, terror, and delight.', 1800, 'Bernadette Mayer\'s', 'Fantasy', 'no', 'download.jpeg', '51-CgimL-yL._AC_UF894,1000_QL80_.jpg', 1500, 0, 'In Stock'),
(11, 'Richard Adams\'s Watership Down', 'A phenomenal worldwide bestseller for over thirty years, Richard Adams\'s Watership Down is a timeless classic and one of the most beloved novels of all time. Set in England\'s Downs, a once idyllic rural landscape, this stirring tale of adventure, courage and survival follows a band of very special creatures on their flight from the intrusion of man and the certain destruction of their home. Led by a stouthearted pair of friends, they journey forth from their native Sandleford Warren through the harrowing trials posed by predators and adversaries, to a mysterious promised land and a more perfect society.', 2312, 'Richard Adams', 'Fantasy', 'yes', '519NuH9eNpL._SY445_SX342_.jpg', 'download (1).jpeg', 1230, 233, 'In Stock'),
(12, 'The Fellowship of the Ring', 'Begin your journey into Middle-earth...\r\n\r\nThe inspiration for the upcoming original series on Prime Video, The Lord of the Rings: The Rings of Power.\r\n\r\nThe Fellowship of the Ring is the first part of J.R.R. Tolkien’s epic adventure The Lord of the Rings.\r\n\r\nOne Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them.\r\n\r\nSauron, the Dark Lord, has gathered to him all the Rings of Power—the means by which he intends to rule Middle-earth. All he lacks in his plans for dominion is the One Ring—the ring that rules them all—which has fallen into the hands of the hobbit, Bilbo Baggins.\r\n\r\nIn a sleepy village in the Shire, young Frodo Baggins finds himself faced with an immense task, as his elderly cousin Bilbo entrusts the Ring to his care. Frodo must leave his home and make a perilous journey across Middle-earth to the Cracks of Doom, there to destroy the Ring and foil the Dark Lord in his evil purpose.', 2822, 'J.R.R. Tolkien', 'Fantasy', 'yes', '710YPoKebhL._SY522_.jpg', 'download (2).jpeg', 1278, 250, 'In Stock'),
(13, 'The Hobbit', 'Now a major motion picture.\r\n\r\nA great modern classic and the prelude to THE LORD OF THE RINGS. Bilbo Baggins is a hobbit who enjoys a comfortable, unambitious life, rarely traveling any farther than his pantry or cellar. But his contentment is disturbed when the wizard Gandalf and a company of dwarves arrive on his doorstep one day to whisk him away on an adventure. They have launched a plot to raid the treasure hoard guarded by Smaug the Magnificent, a large and very dangerous dragon. Bilbo reluctantly joins their quest, unaware that on his journey to the Lonely Mountain he will encounter both a magic ring and a frightening creature known as Gollum.\r\n\r\nA glorious account of a magnificent adventure, filled with suspense and seasoned with a quiet humor that is irresistible . . . All those, young or old, who love a fine adventurous tale, beautifully told, will take The Hobbit to their hearts. -New York Times Book Review', 3343, 'J.R.R. Tolkien', 'Fantasy', 'yes', '41XrcrSrU3L._SY445_SX342_.jpg', 'download (3).jpeg', 2244, 144, 'In Stock'),
(14, 'THE LAST UNICORN', 'Collects the full six-issue miniseries THE LAST UNICORN!\r\nWhimsical. Lyrical. Poignant. Adapted for the first time from the acclaimed and beloved novel by Peter S. Beagle, The Last Unicorn is a tale for any age about the wonders of magic, the power of love, and the tragedy of loss. The unicorn, alone in her enchanted wood, discovers that she may be the last of her kind. Reluctant at first, she sets out on a journey to find her fellow unicorns, even if it means facing the terrifying anger of the Red Bull and the malignant evil of the king who wields his power.\r\n', 4323, 'Peter S. Beagle', 'Fantasy', 'no', '81odKCqP2LL._SY522_.jpg', '5bedc56b-1a46-4c61-948a-62968743b27e.webp', 2344, 0, 'In Stock'),
(15, 'The Lion, the Witch and the Wardrobe', 'The Lion, the Witch and the Wardrobe is the second book in C. S. Lewis\'s The Chronicles of Narnia, a series that has become part of the canon of classic literature, drawing readers of all ages into a magical land with unforgettable characters for over fifty years.\r\n\r\nFour adventurers step through a wardrobe door and into the land of Narnia, a land enslaved by the power of the White Witch. But when almost all hope is lost, the return of the Great Lion, Aslan, signals a great change . . . and a great sacrifice.\r\nThis ebook contains the complete text and art. Illustrations in this ebook appear in vibrant full color on a full-color ebook device and in rich black-and-white on all other devices. This is a stand-alone read, but if you would like to explore more of the Narnian realm, pick up The Horse and His Boy, the third book in The Chronicles of Narnia.', 4232, 'C.S. Lewis', 'Fantasy', 'yes', '716D+R1wDUL._SY522_.jpg', 'TheLionfantsy.jpg', 1232, 152, 'In Stock'),
(16, 'The Master and Margarita', 'Satan comes to Soviet Moscow in this critically acclaimed translation of one of the most important and best-loved modern classics in world literature.\r\n\r\nThe Master and Margarita has been captivating readers around the world ever since its first publication in 1967. Written during Stalin’s time in power but suppressed in the Soviet Union for decades, Bulgakov’s masterpiece is an ironic parable on power and its corruption, on good and evil, and on human frailty and the strength of love.\r\n\r\nIn The Master and Margarita, the Devil himself pays a visit to Soviet Moscow. Accompanied by a retinue that includes the fast-talking, vodka-drinking, giant tomcat Behemoth, he sets about creating a whirlwind of chaos that soon involves the beautiful Margarita and her beloved, a distraught writer known only as the Master, and even Jesus Christ and Pontius Pilate. The Master and Margarita combines fable, fantasy, political satire, and slapstick comedy to create a wildly entertaining and unforgettable tale that is commonly considered the greatest novel to come out of the Soviet Union. It appears in this edition in a translation by Mirra Ginsburg that was judged “brilliant” by Publishers Weekly.\r\n\r\nPraise for The Master and Margarita\r\n\r\n“A wild surrealistic romp. . . . Brilliantly flamboyant and outrageous.” —Joyce Carol Oates, The Detroit News\r\n\r\n“Fine, funny, imaginative. . . . The Master and Margarita stands squarely in the great Gogolesque tradition of satiric narrative.” —Saul Maloff, Newsweek\r\n\r\n“A rich, funny, moving and bitter novel. . . . Vast and boisterous entertainment.” —The New York Times\r\n\r\n“The book is by turns hilarious, mysterious, contemplative and poignant. . . . A great work.” —Chicago Tribune\r\n\r\n“Funny, devilish, brilliant satire. . . . It’s literature of the highest order and . . . it will deliver a full measure of enjoyment and enlightenment.” —Publishers Weekly', 3421, 'Mikhail Bulgakov', 'Fantasy', 'yes', '817nt39Nn3L._SY522_.jpg', 'il_570xN.3442890985_nyql.webp', 2323, 123, 'In Stock'),
(17, 'The Sword in the Stone', '\"Learn. That is the only thing that never fails.\"--Merlyn the Wizard\r\n\r\nBefore there was a famous king named Arthur, there was a curious boy named Wart and a kind old wizard named Merlyn. Transformed by Merlyn into the forms of his fantasy, Wart learns the value of history from a snake, of education from a badger, and of courage from a hawk--the lessons that help turn a boy into a man. Together, Wart and Merlyn take the reader through this timeless story of childhood and adventure--The Sword in the Stone.\r\n\r\nT.H. White\'s classic tale of the young Arthur\'s questioning and discovery of his life is unparalleled for its wit and wisdom, and for its colorful characters, from the wise Merlyn to the heroic Robin Wood to the warmhearted King Pellinore.\r\n\r\nGolden Kite Honor artist Dennis Nolan has loved The Sword in the Stone since childhood, and he imbues White\'s tale with magic and mystery in his glowing illustrations. Readers who know Arthur or are meeting him for the first time will delight in this beautiful rendering of one of the greatest stories of all time.\r\n', 2341, 'Terence Hanbury \"Tim\" White ', 'Fantasy', 'yes', '71s5OYjoYsL._SY522_.jpg', '51W5file5hL._SX38_SY50_CR,0,0,38,50_.jpg', 1421, 232, 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(13, 'Fantasy'),
(14, 'Historical Fiction'),
(15, 'Horror'),
(16, 'MysteryThriller'),
(17, 'Non-fiction'),
(18, 'Romance'),
(19, 'Science Fiction'),
(20, 'Self-HelpPersonal Development'),
(21, 'Young Adult (YA)');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `event_description` longtext DEFAULT NULL,
  `event_start` varchar(255) DEFAULT NULL,
  `event_end` varchar(255) DEFAULT NULL,
  `event_req1` longtext DEFAULT NULL,
  `event_req2` longtext DEFAULT NULL,
  `event_req3` longtext DEFAULT NULL,
  `event_req4` longtext DEFAULT NULL,
  `event_img` varchar(255) DEFAULT NULL,
  `rewards` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_description`, `event_start`, `event_end`, `event_req1`, `event_req2`, `event_req3`, `event_req4`, `event_img`, `rewards`, `status`) VALUES
(1, 'Arsalan', 'asd', '2024-11-08T08:28', '2024-11-09T08:28', 'adasd', 'asd', 'asd', 'asd', 'Screenshot 2024-10-27 004356.png', 'asd', 'announced'),
(3, 'asdasdasd', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-11-20T14:50', '2024-11-18T14:50', 'asdasd', '', '', '', '60f1c72b3ee90b01ad321242_Blocked_Websites_Blog_-p-800.jpeg', 'asdd', 'ongoing'),
(5, 'asdasdasd', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-11-20T14:50', '2024-11-18T14:50', 'asdasd', '', '', '', 'bg2000.jpg', 'asdasd', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `Valid` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `events_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `story` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `events_id`, `name`, `email`, `age`, `story`, `status`) VALUES
(4, 3, 'asdasd', 'asd@gmail.com', 12, '1731295046_IT2024062501011697143.pdf', '1ST'),
(5, 3, 'asdasd', 'asd@gmail.com', 123, '1731295814_IT2024062501011697142.pdf', '2ND');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_on`, `updated_on`, `last_login`) VALUES
(1, 'Admin', 'admin@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin', '2024-10-25 06:53:14', '2024-10-25 06:53:14', '2024-10-25 22:18:59'),
(4, 'Arsalan', 'arsalan@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'admin', '2024-11-01 07:50:34', '2024-11-01 07:50:34', '2024-11-01 02:50:34'),
(6, 'sad', 'asd@gm.c', '8240de73bd8e90c593c1ffa8e66700c1ec7e7321', 'admin', '2024-11-01 07:53:53', '2024-11-01 07:53:53', '2024-11-01 02:53:53'),
(8, 'Arsalan Warsi', 'mohammadarsalanwarsi@gmail.com', '5fa339bbbb1eeaced3b52e54f44576aaf0d77d96', 'user', '2024-11-02 08:06:33', '2024-11-02 08:06:33', '2024-11-04 02:59:09'),
(11, 'Arsalan', 'arsalan@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'user', '2024-11-03 05:27:28', '2024-11-03 05:27:28', '2024-11-03 00:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `name`, `logo`, `email`, `phone`, `address`, `info`, `website_link`, `facebook`, `instagram`, `whatsapp`) VALUES
(1, 'E-Shelf', '1.png', 'mohammadarsalanwarsi@gmail.com', '03150207265', 'Gulistan E Johar', 'asdasdasd', 'www.info.com', 'www.fb.com', 'www.insta.com', '03150207265');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_id` (`events_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
