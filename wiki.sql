-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 juin 2022 à 18:24
-- Version du serveur : 8.0.27
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wiki`
--
USE `wiki`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, '1ere Category', '/uploads/images/fond-38973d9f9a5be8dce5d0b3a675c8a9e4.jpg'),
(2, '2eme Category', 'https://cdn.discordapp.com/attachments/247154144136134656/941129513717362728/FLJbOO5XsAMd87e.png'),
(3, '3eme Category', 'https://cdn.discordapp.com/attachments/280510643692371979/943138471416045578/2122022_32Set5CUdyrContextArticle_Udyr_05FR013.png'),
(4, '4eme Category', 'https://cdn.discordapp.com/attachments/280510643692371979/943138581856288788/2122022_32Set5CUdyrContextArticle_Udyr2_05FR013T4.png'),
(5, 'Vtubers', '/uploads/images/calicute-c69f372686af6d87ee0394886d951fcf.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `champion`
--

DROP TABLE IF EXISTS `champion`;
CREATE TABLE IF NOT EXISTS `champion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blurb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1529 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `champion`
--

INSERT INTO `champion` (`id`, `name`, `main_image`, `price`, `title`, `blurb`, `tags`, `icon`) VALUES
(1371, 'Akali', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Akali_0.jpg', 3150, 'the Rogue Assassin', 'Abandoning the Kinkou Order and her title of the Fist of Shadow, Akali now strikes alone, ready to be the deadly weapon her people need. Though she holds onto all she learned from her master Shen, she has pledged to defend Ionia from its enemies, one...', 'a:1:{i:0;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Akali.png'),
(1372, 'Akshan', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Akshan_0.jpg', 6300, 'the Rogue Sentinel', 'Raising an eyebrow in the face of danger, Akshan fights evil with dashing charisma, righteous vengeance, and a conspicuous lack of shirts. He is highly skilled in the art of stealth combat, able to evade the eyes of his enemies and reappear when they...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Akshan.png'),
(1373, 'Alistar', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Alistar_0.jpg', 1350, 'the Minotaur', 'Always a mighty warrior with a fearsome reputation, Alistar seeks revenge for the death of his clan at the hands of the Noxian empire. Though he was enslaved and forced into the life of a gladiator, his unbreakable will was what kept him from truly...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Alistar.png'),
(1374, 'Amumu', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Amumu_0.jpg', 450, 'the Sad Mummy', 'Legend claims that Amumu is a lonely and melancholy soul from ancient Shurima, roaming the world in search of a friend. Doomed by an ancient curse to remain alone forever, his touch is death, his affection ruin. Those who claim to have seen him describe..', 'a:2:{i:0;s:4:\"Tank\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Amumu.png'),
(1375, 'Anivia', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Anivia_0.jpg', 3150, 'the Cryophoenix', 'Anivia is a benevolent winged spirit who endures endless cycles of life, death, and rebirth to protect the Freljord. A demigod born of unforgiving ice and bitter winds, she wields those elemental powers to thwart any who dare disturb her homeland...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Anivia.png'),
(1376, 'Annie', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Annie_0.jpg', 450, 'the Dark Child', 'Dangerous, yet disarmingly precocious, Annie is a child mage with immense pyromantic power. Even in the shadows of the mountains north of Noxus, she is a magical outlier. Her natural affinity for fire manifested early in life through unpredictable...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Annie.png'),
(1377, 'Aphelios', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Aphelios_0.jpg', 6300, 'the Weapon of the Faithful', 'Emerging from moonlight\'s shadow with weapons drawn, Aphelios kills the enemies of his faith in brooding silence—speaking only through the certainty of his aim, and the firing of each gun. Though fueled by a poison that renders him mute, he is guided by..', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Aphelios.png'),
(1378, 'Ashe', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ashe_0.jpg', 450, 'the Frost Archer', 'Iceborn warmother of the Avarosan tribe, Ashe commands the most populous horde in the north. Stoic, intelligent, and idealistic, yet uncomfortable with her role as leader, she taps into the ancestral magics of her lineage to wield a bow of True Ice...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Ashe.png'),
(1379, 'Aurelion Sol', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/AurelionSol_0.jpg', 6300, 'The Star Forger', 'Aurelion Sol once graced the vast emptiness of the cosmos with celestial wonders of his own devising. Now, he is forced to wield his awesome power at the behest of a space-faring empire that tricked him into servitude. Desiring a return to his...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/AurelionSol.png'),
(1380, 'Azir', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Azir_0.jpg', 4800, 'the Emperor of the Sands', 'Azir was a mortal emperor of Shurima in a far distant age, a proud man who stood at the cusp of immortality. His hubris saw him betrayed and murdered at the moment of his greatest triumph, but now, millennia later, he has been reborn as an Ascended...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Azir.png'),
(1381, 'Bard', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Bard_0.jpg', 4800, 'the Wandering Caretaker', 'A traveler from beyond the stars, Bard is an agent of serendipity who fights to maintain a balance where life can endure the indifference of chaos. Many Runeterrans sing songs that ponder his extraordinary nature, yet they all agree that the cosmic...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Bard.png'),
(1382, 'Blitzcrank', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Blitzcrank_0.jpg', 3150, 'the Great Steam Golem', 'Blitzcrank is an enormous, near-indestructible automaton from Zaun, originally built to dispose of hazardous waste. However, he found this primary purpose too restricting, and modified his own form to better serve the fragile people of the Sump...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Blitzcrank.png'),
(1383, 'Brand', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Brand_0.jpg', 4800, 'the Burning Vengeance', 'Once a tribesman of the icy Freljord named Kegan Rodhe, the creature known as Brand is a lesson in the temptation of greater power. Seeking one of the legendary World Runes, Kegan betrayed his companions and seized it for himself—and, in an instant, the..', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Brand.png'),
(1384, 'Braum', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Braum_0.jpg', 4800, 'the Heart of the Freljord', 'Blessed with massive biceps and an even bigger heart, Braum is a beloved hero of the Freljord. Every mead hall north of Frostheld toasts his legendary strength, said to have felled a forest of oaks in a single night, and punched an entire mountain into...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Braum.png'),
(1385, 'Caitlyn', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Caitlyn_0.jpg', 4800, 'the Sheriff of Piltover', 'Renowned as its finest peacekeeper, Caitlyn is also Piltover\'s best shot at ridding the city of its elusive criminal elements. She is often paired with Vi, acting as a cool counterpoint to her partner\'s more impetuous nature. Even though she carries a...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Caitlyn.png'),
(1386, 'Camille', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Camille_0.jpg', 6300, 'the Steel Shadow', 'Weaponized to operate outside the boundaries of the law, Camille is the Principal Intelligencer of Clan Ferros—an elegant and elite agent who ensures the Piltover machine and its Zaunite underbelly runs smoothly. Adaptable and precise, she views sloppy...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Camille.png'),
(1387, 'Cassiopeia', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Cassiopeia_0.jpg', 4800, 'the Serpent\'s Embrace', 'Cassiopeia is a deadly creature bent on manipulating others to her sinister will. Youngest and most beautiful daughter of the noble Du Couteau family of Noxus, she ventured deep into the crypts beneath Shurima in search of ancient power. There, she was...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Cassiopeia.png'),
(1388, 'Cho\'Gath', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Chogath_0.jpg', 1350, 'the Terror of the Void', 'From the moment Cho\'Gath first emerged into the harsh light of Runeterra\'s sun, the beast was driven by the most pure and insatiable hunger. A perfect expression of the Void\'s desire to consume all life, Cho\'Gath\'s complex biology quickly converts...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Chogath.png'),
(1389, 'Corki', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Corki_0.jpg', 3150, 'the Daring Bombardier', 'The yordle pilot Corki loves two things above all others: flying, and his glamorous mustache... though not necessarily in that order. After leaving Bandle City, he settled in Piltover and fell in love with the wondrous machines he found there. He...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Corki.png'),
(1390, 'Darius', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Darius_0.jpg', 4800, 'the Hand of Noxus', 'There is no greater symbol of Noxian might than Darius, the nation\'s most feared and battle-hardened commander. Rising from humble origins to become the Hand of Noxus, he cleaves through the empire\'s enemies—many of them Noxians themselves. Knowing that..', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Darius.png'),
(1391, 'Diana', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Diana_0.jpg', 4800, 'Scorn of the Moon', 'Bearing her crescent moonblade, Diana fights as a warrior of the Lunari—a faith all but quashed in the lands around Mount Targon. Clad in shimmering armor the color of winter snow at night, she is a living embodiment of the silver moon\'s power. Imbued...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Diana.png'),
(1392, 'Draven', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Draven_0.jpg', 4800, 'the Glorious Executioner', 'In Noxus, warriors known as Reckoners face one another in arenas where blood is spilled and strength tested—but none has ever been as celebrated as Draven. A former soldier, he found that the crowds uniquely appreciated his flair for the dramatic, and...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Draven.png'),
(1393, 'Dr. Mundo', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/DrMundo_0.jpg', 450, 'the Madman of Zaun', 'Utterly mad, tragically homicidal, and horrifyingly purple, Dr. Mundo is what keeps many of Zaun\'s citizens indoors on particularly dark nights. Now a self-proclaimed physician, he was once a patient of Zaun\'s most infamous asylum. After \"curing\" the...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/DrMundo.png'),
(1394, 'Ekko', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ekko_0.jpg', 4800, 'the Boy Who Shattered Time', 'A prodigy from the rough streets of Zaun, Ekko manipulates time to twist any situation to his advantage. Using his own invention, the Zero Drive, he explores the branching possibilities of reality to craft the perfect moment. Though he revels in this...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Ekko.png'),
(1395, 'Elise', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Elise_0.jpg', 4800, 'the Spider Queen', 'Elise is a deadly predator who dwells in a shuttered, lightless palace, deep within the oldest city of Noxus. Once mortal, she was the mistress of a powerful house, but the bite of a vile demigod transformed her into something beautiful, yet utterly...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Elise.png'),
(1396, 'Evelynn', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Evelynn_0.jpg', 1350, 'Agony\'s Embrace', 'Within the dark seams of Runeterra, the demon Evelynn searches for her next victim. She lures in prey with the voluptuous façade of a human female, but once a person succumbs to her charms, Evelynn\'s true form is unleashed. She then subjects her victim...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Evelynn.png'),
(1397, 'Ezreal', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ezreal_0.jpg', 3150, 'the Prodigal Explorer', 'A dashing adventurer, unknowingly gifted in the magical arts, Ezreal raids long-lost catacombs, tangles with ancient curses, and overcomes seemingly impossible odds with ease. His courage and bravado knowing no bounds, he prefers to improvise his way...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Ezreal.png'),
(1398, 'Fiddlesticks', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Fiddlesticks_0.jpg', 1350, 'the Ancient Fear', 'Something has awoken in Runeterra. Something ancient. Something terrible. The ageless horror known as Fiddlesticks stalks the edges of mortal society, drawn to areas thick with paranoia where it feeds upon terrorized victims. Wielding a jagged scythe...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Fiddlesticks.png'),
(1399, 'Fiora', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Fiora_0.jpg', 4800, 'the Grand Duelist', 'The most feared duelist in all Valoran, Fiora is as renowned for her brusque manner and cunning mind as she is for the speed of her bluesteel rapier. Born to House Laurent in the kingdom of Demacia, Fiora took control of the family from her father in...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Fiora.png'),
(1400, 'Fizz', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Fizz_0.jpg', 4800, 'the Tidal Trickster', 'Fizz is an amphibious yordle, who dwells among the reefs surrounding Bilgewater. He often retrieves and returns the tithes cast into the sea by superstitious captains, but even the saltiest of sailors know better than to cross him—for many are the tales..', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Fizz.png'),
(1401, 'Galio', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Galio_0.jpg', 3150, 'the Colossus', 'Outside the gleaming city of Demacia, the stone colossus Galio keeps vigilant watch. Built as a bulwark against enemy mages, he often stands motionless for decades until the presence of powerful magic stirs him to life. Once activated, Galio makes the...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Galio.png'),
(1402, 'Gangplank', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Gangplank_0.jpg', 3150, 'the Saltwater Scourge', 'As unpredictable as he is brutal, the dethroned reaver king Gangplank is feared far and wide. Once, he ruled the port city of Bilgewater, and while his reign is over, there are those who believe this has only made him more dangerous. Gangplank would see..', 'a:1:{i:0;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Gangplank.png'),
(1403, 'Garen', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Garen_0.jpg', 450, 'The Might of Demacia', 'A proud and noble warrior, Garen fights as one of the Dauntless Vanguard. He is popular among his fellows, and respected well enough by his enemies—not least as a scion of the prestigious Crownguard family, entrusted with defending Demacia and its...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Garen.png'),
(1404, 'Gnar', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Gnar_0.jpg', 4800, 'the Missing Link', 'Gnar is a primeval yordle whose playful antics can erupt into a toddler\'s outrage in an instant, transforming him into a massive beast bent on destruction. Frozen in True Ice for millennia, the curious creature broke free and now hops about a changed...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Gnar.png'),
(1405, 'Gragas', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Gragas_0.jpg', 3150, 'the Rabble Rouser', 'Equal parts jolly and imposing, Gragas is a massive, rowdy brewmaster on his own quest for the perfect pint of ale. Hailing from parts unknown, he now searches for rare ingredients among the unblemished wastes of the Freljord, trying each recipe as he...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Gragas.png'),
(1406, 'Graves', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Graves_0.jpg', 4800, 'the Outlaw', 'Malcolm Graves is a renowned mercenary, gambler, and thief—a wanted man in every city and empire he has visited. Even though he has an explosive temper, he possesses a strict sense of criminal honor, often enforced at the business end of his...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Graves.png'),
(1407, 'Gwen', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Gwen_0.jpg', 6300, 'The Hallowed Seamstress', 'A former doll transformed and brought to life by magic, Gwen wields the very tools that once created her. She carries the weight of her maker\'s love with every step, taking nothing for granted. At her command is the Hallowed Mist, an ancient and...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Gwen.png'),
(1408, 'Hecarim', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Hecarim_0.jpg', 4800, 'the Shadow of War', 'Hecarim is a spectral fusion of man and beast, cursed to ride down the souls of the living for all eternity. When the Blessed Isles fell into shadow, this proud knight was obliterated by the destructive energies of the Ruination, along with all his...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Hecarim.png'),
(1409, 'Heimerdinger', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Heimerdinger_0.jpg', 3150, 'the Revered Inventor', 'A brilliant yet eccentric yordle scientist, Professor Cecil B. Heimerdinger is one of the most innovative and esteemed inventors Piltover has ever known. Relentless in his work to the point of neurotic obsession, he thrives on answering the universe\'s...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Heimerdinger.png'),
(1410, 'Illaoi', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Illaoi_0.jpg', 6300, 'the Kraken Priestess', 'Illaoi\'s powerful physique is dwarfed only by her indomitable faith. As the prophet of the Great Kraken, she uses a huge, golden idol to rip her foes\' spirits from their bodies and shatter their perception of reality. All who challenge the “Truth Bearer..', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Illaoi.png'),
(1411, 'Irelia', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Irelia_0.jpg', 4800, 'the Blade Dancer', 'The Noxian occupation of Ionia produced many heroes, none more unlikely than young Irelia of Navori. Trained in the ancient dances of her province, she adapted her art for war, using the graceful and carefully practised movements to levitate a host of...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Irelia.png'),
(1412, 'Ivern', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ivern_0.jpg', 6300, 'the Green Father', 'Ivern Bramblefoot, known to many as the Green Father, is a peculiar half man, half tree who roams Runeterra\'s forests, cultivating life everywhere he goes. He knows the secrets of the natural world, and holds deep friendships with all things that grow...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Ivern.png'),
(1413, 'Janna', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Janna_0.jpg', 1350, 'the Storm\'s Fury', 'Armed with the power of Runeterra\'s gales, Janna is a mysterious, elemental wind spirit who protects the dispossessed of Zaun. Some believe she was brought into existence by the pleas of Runeterra\'s sailors who prayed for fair winds as they navigated...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Janna.png'),
(1414, 'Jarvan IV', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/JarvanIV_0.jpg', 4800, 'the Exemplar of Demacia', 'Prince Jarvan, scion of the Lightshield dynasty, is heir apparent to the throne of Demacia. Raised to be a paragon of his nation\'s greatest virtues, he is forced to balance the heavy expectations placed upon him with his own desire to fight on the front..', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/JarvanIV.png'),
(1415, 'Jax', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Jax_0.jpg', 1350, 'Grandmaster at Arms', 'Unmatched in both his skill with unique armaments and his biting sarcasm, Jax is the last known weapons master of Icathia. After his homeland was laid low by its own hubris in unleashing the Void, Jax and his kind vowed to protect what little remained...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Jax.png'),
(1416, 'Jayce', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Jayce_0.jpg', 4800, 'the Defender of Tomorrow', 'Jayce is a brilliant inventor who has pledged his life to the defense of Piltover and its unyielding pursuit of progress. With his transforming hextech hammer in hand, Jayce uses his strength, courage, and considerable intelligence to protect his...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Jayce.png'),
(1417, 'Jhin', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Jhin_0.jpg', 6300, 'the Virtuoso', 'Jhin is a meticulous criminal psychopath who believes murder is art. Once an Ionian prisoner, but freed by shadowy elements within Ionia\'s ruling council, the serial killer now works as their cabal\'s assassin. Using his gun as his paintbrush, Jhin...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Jhin.png'),
(1418, 'Jinx', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Jinx_0.jpg', 4800, 'the Loose Cannon', 'A manic and impulsive criminal from Zaun, Jinx lives to wreak havoc without care for the consequences. With an arsenal of deadly weapons, she unleashes the loudest blasts and brightest explosions to leave a trail of mayhem and panic in her wake. Jinx...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Jinx.png'),
(1419, 'Kai\'Sa', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Kaisa_0.jpg', 6300, 'Daughter of the Void', 'Claimed by the Void when she was only a child, Kai\'Sa managed to survive through sheer tenacity and strength of will. Her experiences have made her a deadly hunter and, to some, the harbinger of a future they would rather not live to see. Having entered..', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Kaisa.png'),
(1420, 'Kalista', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Kalista_0.jpg', 4800, 'the Spear of Vengeance', 'A specter of wrath and retribution, Kalista is the undying spirit of vengeance, an armored nightmare summoned from the Shadow Isles to hunt deceivers and traitors. The betrayed may cry out in blood to be avenged, but Kalista only answers those willing...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Kalista.png'),
(1421, 'Karma', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Karma_0.jpg', 3150, 'the Enlightened One', 'No mortal exemplifies the spiritual traditions of Ionia more than Karma. She is the living embodiment of an ancient soul reincarnated countless times, carrying all her accumulated memories into each new life, and blessed with power that few can...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Karma.png'),
(1422, 'Karthus', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Karthus_0.jpg', 3150, 'the Deathsinger', 'The harbinger of oblivion, Karthus is an undying spirit whose haunting songs are a prelude to the horror of his nightmarish appearance. The living fear the eternity of undeath, but Karthus sees only beauty and purity in its embrace, a perfect union of...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Karthus.png'),
(1423, 'Kassadin', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Kassadin_0.jpg', 3150, 'the Void Walker', 'Cutting a burning swath through the darkest places of the world, Kassadin knows his days are numbered. A widely traveled Shuriman guide and adventurer, he had chosen to raise a family among the peaceful southern tribes—until the day his village was...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Kassadin.png'),
(1424, 'Katarina', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Katarina_0.jpg', 3150, 'the Sinister Blade', 'Decisive in judgment and lethal in combat, Katarina is a Noxian assassin of the highest caliber. Eldest daughter to the legendary General Du Couteau, she made her talents known with swift kills against unsuspecting enemies. Her fiery ambition has driven..', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Katarina.png'),
(1425, 'Kayle', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Kayle_0.jpg', 450, 'the Righteous', 'Born to a Targonian Aspect at the height of the Rune Wars, Kayle honored her mother\'s legacy by fighting for justice on wings of divine flame. She and her twin sister Morgana were the protectors of Demacia for many years—until Kayle became disillusioned..', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Kayle.png'),
(1426, 'Kayn', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Kayn_0.jpg', 6300, 'the Shadow Reaper', 'A peerless practitioner of lethal shadow magic, Shieda Kayn battles to achieve his true destiny—to one day lead the Order of Shadow into a new era of Ionian supremacy. He wields the sentient darkin weapon Rhaast, undeterred by its creeping corruption of..', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Kayn.png'),
(1427, 'Kennen', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Kennen_0.jpg', 4800, 'the Heart of the Tempest', 'More than just the lightning-quick enforcer of Ionian balance, Kennen is the only yordle member of the Kinkou. Despite his small, furry stature, he is eager to take on any threat with a whirling storm of shuriken and boundless enthusiasm. Alongside his...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Kennen.png'),
(1428, 'Kha\'Zix', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Khazix_0.jpg', 4800, 'the Voidreaver', 'The Void grows, and the Void adapts—in none of its myriad spawn are these truths more apparent than Kha\'Zix. Evolution drives the core of this mutating horror, born to survive and to slay the strong. Where it struggles to do so, it grows new, more...', 'a:1:{i:0;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Khazix.png'),
(1429, 'Kindred', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Kindred_0.jpg', 4800, 'The Eternal Hunters', 'Separate, but never parted, Kindred represents the twin essences of death. Lamb\'s bow offers a swift release from the mortal realm for those who accept their fate. Wolf hunts down those who run from their end, delivering violent finality within his...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Kindred.png'),
(1430, 'Kled', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Kled_0.jpg', 6300, 'the Cantankerous Cavalier', 'A warrior as fearless as he is ornery, the yordle Kled embodies the furious bravado of Noxus. He is an icon beloved by the empire\'s soldiers, distrusted by its officers, and loathed by the nobility. Many claim Kled has fought in every campaign the...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Kled.png'),
(1431, 'Kog\'Maw', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/KogMaw_0.jpg', 4800, 'the Mouth of the Abyss', 'Belched forth from a rotting Void incursion deep in the wastelands of Icathia, Kog\'Maw is an inquisitive yet putrid creature with a caustic, gaping mouth. This particular Void-spawn needs to gnaw and drool on anything within reach to truly understand it..', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/KogMaw.png'),
(1432, 'LeBlanc', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Leblanc_0.jpg', 3150, 'the Deceiver', 'Mysterious even to other members of the Black Rose cabal, LeBlanc is but one of many names for a pale woman who has manipulated people and events since the earliest days of Noxus. Using her magic to mirror herself, the sorceress can appear to anyone...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Leblanc.png'),
(1433, 'Lee Sin', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/LeeSin_0.jpg', 4800, 'the Blind Monk', 'A master of Ionia\'s ancient martial arts, Lee Sin is a principled fighter who channels the essence of the dragon spirit to face any challenge. Though he lost his sight many years ago, the warrior-monk has devoted his life to protecting his homeland...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/LeeSin.png'),
(1434, 'Leona', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Leona_0.jpg', 4800, 'the Radiant Dawn', 'Imbued with the fire of the sun, Leona is a holy warrior of the Solari who defends Mount Targon with her Zenith Blade and the Shield of Daybreak. Her skin shimmers with starfire while her eyes burn with the power of the celestial Aspect within her...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Leona.png'),
(1435, 'Lillia', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Lillia_0.jpg', 6300, 'the Bashful Bloom', 'Intensely shy, the fae fawn Lillia skittishly wanders Ionia\'s forests. Hiding just out of sight of mortals—whose mysterious natures have long captivated, but intimidated, her—Lillia hopes to discover why their dreams no longer reach the ancient Dreaming..', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Lillia.png'),
(1436, 'Lissandra', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Lissandra_0.jpg', 4800, 'the Ice Witch', 'Lissandra\'s magic twists the pure power of ice into something dark and terrible. With the force of her black ice, she does more than freeze—she impales and crushes those who oppose her. To the terrified denizens of the north, she is known only as \'\'The...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Lissandra.png'),
(1437, 'Lucian', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Lucian_0.jpg', 4800, 'the Purifier', 'Lucian, a Sentinel of Light, is a grim hunter of undying spirits, pursuing them relentlessly and annihilating them with his twin relic pistols. After the wraith Thresh slew his wife, Lucian embarked on the path of vengeance—but even with her return to...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Lucian.png'),
(1438, 'Lulu', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Lulu_0.jpg', 4800, 'the Fae Sorceress', 'The yordle mage Lulu is known for conjuring dreamlike illusions and fanciful creatures as she roams Runeterra with her fairy companion Pix. Lulu shapes reality on a whim, warping the fabric of the world, and what she views as the constraints of this...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Lulu.png'),
(1439, 'Lux', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Lux_0.jpg', 3150, 'the Lady of Luminosity', 'Luxanna Crownguard hails from Demacia, an insular realm where magical abilities are viewed with fear and suspicion. Able to bend light to her will, she grew up dreading discovery and exile, and was forced to keep her power secret, in order to preserve...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Lux.png'),
(1440, 'Malphite', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Malphite_0.jpg', 1350, 'Shard of the Monolith', 'A massive creature of living stone, Malphite struggles to impose blessed order on a chaotic world. Birthed as a servitor-shard to an otherworldly obelisk known as the Monolith, he used his tremendous elemental strength to maintain and protect his...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Malphite.png'),
(1441, 'Malzahar', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Malzahar_0.jpg', 4800, 'the Prophet of the Void', 'A zealous seer dedicated to the unification of all life, Malzahar truly believes the newly emergent Void to be the path to Runeterra\'s salvation. In the desert wastes of Shurima, he followed the voices that whispered in his mind, all the way to ancient...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Malzahar.png'),
(1442, 'Maokai', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Maokai_0.jpg', 4800, 'the Twisted Treant', 'Maokai is a rageful, towering treant who fights the unnatural horrors of the Shadow Isles. He was twisted into a force of vengeance after a magical cataclysm destroyed his home, surviving undeath only through the Waters of Life infused within his...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Maokai.png'),
(1443, 'Master Yi', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/MasterYi_0.jpg', 450, 'the Wuju Bladesman', 'Master Yi has tempered his body and sharpened his mind, so that thought and action have become almost as one. Though he chooses to enter into violence only as a last resort, the grace and speed of his blade ensures resolution is always swift. As one of...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/MasterYi.png'),
(1444, 'Miss Fortune', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/MissFortune_0.jpg', 3150, 'the Bounty Hunter', 'A Bilgewater captain famed for her looks but feared for her ruthlessness, Sarah Fortune paints a stark figure among the hardened criminals of the port city. As a child, she witnessed the reaver king Gangplank murder her family—an act she brutally...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/MissFortune.png'),
(1445, 'Wukong', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/MonkeyKing_0.jpg', 4800, 'the Monkey King', 'Wukong is a vastayan trickster who uses his strength, agility, and intelligence to confuse his opponents and gain the upper hand. After finding a lifelong friend in the warrior known as Master Yi, Wukong became the last student of the ancient martial...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/MonkeyKing.png'),
(1446, 'Mordekaiser', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Mordekaiser_0.jpg', 1350, 'the Iron Revenant', 'Twice slain and thrice born, Mordekaiser is a brutal warlord from a foregone epoch who uses his necromantic sorcery to bind souls into an eternity of servitude. Few now remain who remember his earlier conquests, or know the true extent of his powers—but..', 'a:1:{i:0;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Mordekaiser.png'),
(1447, 'Morgana', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Morgana_0.jpg', 1350, 'the Fallen', 'Conflicted between her celestial and mortal natures, Morgana bound her wings to embrace humanity, and inflicts her pain and bitterness upon the dishonest and the corrupt. She rejects laws and traditions she believes are unjust, and fights for truth from..', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Morgana.png'),
(1448, 'Nami', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Nami_0.jpg', 4800, 'the Tidecaller', 'A headstrong young vastaya of the seas, Nami was the first of the Marai tribe to leave the waves and venture onto dry land, when their ancient accord with the Targonians was broken. With no other option, she took it upon herself to complete the sacred...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Nami.png'),
(1449, 'Nasus', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Nasus_0.jpg', 1350, 'the Curator of the Sands', 'Nasus is an imposing, jackal-headed Ascended being from ancient Shurima, a heroic figure regarded as a demigod by the people of the desert. Fiercely intelligent, he was a guardian of knowledge and peerless strategist whose wisdom guided the ancient...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Nasus.png'),
(1450, 'Nautilus', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Nautilus_0.jpg', 4800, 'the Titan of the Depths', 'A lonely legend as old as the first piers sunk in Bilgewater, the armored goliath known as Nautilus roams the dark waters off the coast of the Blue Flame Isles. Driven by a forgotten betrayal, he strikes without warning, swinging his enormous anchor to...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Nautilus.png'),
(1451, 'Neeko', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Neeko_0.jpg', 6300, 'the Curious Chameleon', 'Hailing from a long lost tribe of vastaya, Neeko can blend into any crowd by borrowing the appearances of others, even absorbing something of their emotional state to tell friend from foe in an instant. No one is ever sure where—or who—Neeko might be...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Neeko.png'),
(1452, 'Nidalee', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Nidalee_0.jpg', 3150, 'the Bestial Huntress', 'Raised in the deepest jungle, Nidalee is a master tracker who can shapeshift into a ferocious cougar at will. Neither wholly woman nor beast, she viciously defends her territory from any and all trespassers, with carefully placed traps and deft spear...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Nidalee.png'),
(1453, 'Nocturne', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Nocturne_0.jpg', 4800, 'the Eternal Nightmare', 'A demonic amalgamation drawn from the nightmares that haunt every sentient mind, the thing known as Nocturne has become a primordial force of pure evil. It is liquidly chaotic in aspect, a faceless shadow with cold eyes and armed with wicked-looking...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Nocturne.png'),
(1454, 'Nunu & Willump', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Nunu_0.jpg', 450, 'the Boy and His Yeti', 'Once upon a time, there was a boy who wanted to prove he was a hero by slaying a fearsome monster—only to discover that the beast, a lonely and magical yeti, merely needed a friend. Bound together by ancient power and a shared love of snowballs, Nunu...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Nunu.png'),
(1455, 'Olaf', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Olaf_0.jpg', 3150, 'the Berserker', 'An unstoppable force of destruction, the axe-wielding Olaf wants nothing but to die in glorious combat. Hailing from the brutal Freljordian peninsula of Lokfar, he once received a prophecy foretelling his peaceful passing—a coward\'s fate, and a great...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Olaf.png'),
(1456, 'Orianna', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Orianna_0.jpg', 4800, 'the Lady of Clockwork', 'Once a curious girl of flesh and blood, Orianna is now a technological marvel comprised entirely of clockwork. She became gravely ill after an accident in the lower districts of Zaun, and her failing body had to be replaced with exquisite artifice...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Orianna.png'),
(1457, 'Ornn', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ornn_0.jpg', 6300, 'The Fire below the Mountain', 'Ornn is the Freljordian spirit of forging and craftsmanship. He works in the solitude of a massive smithy, hammered out from the lava caverns beneath the volcano Hearth-Home. There he stokes bubbling cauldrons of molten rock to purify ores and fashion...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Ornn.png'),
(1458, 'Pantheon', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Pantheon_0.jpg', 3150, 'the Unbreakable Spear', 'Once an unwilling host to the Aspect of War, Atreus survived when the celestial power within him was slain, refusing to succumb to a blow that tore stars from the heavens. In time, he learned to embrace the power of his own mortality, and the stubborn...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Pantheon.png'),
(1459, 'Poppy', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Poppy_0.jpg', 450, 'Keeper of the Hammer', 'Runeterra has no shortage of valiant champions, but few are as tenacious as Poppy. Bearing the legendary hammer of Orlon, a weapon twice her size, this determined yordle has spent untold years searching in secret for the fabled “Hero of Demacia,” said...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Poppy.png'),
(1460, 'Pyke', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Pyke_0.jpg', 6300, 'the Bloodharbor Ripper', 'A renowned harpooner from the slaughter docks of Bilgewater, Pyke should have met his death in the belly of a gigantic jaull-fish… and yet, he returned. Now, stalking the dank alleys and backways of his former hometown, he uses his new supernatural...', 'a:2:{i:0;s:7:\"Support\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Pyke.png'),
(1461, 'Qiyana', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Qiyana_0.jpg', 6300, 'Empress of the Elements', 'In the jungle city of Ixaocan, Qiyana plots her own ruthless path to the high seat of the Yun Tal. Last in line to succeed her parents, she faces those who stand in her way with brash confidence and unprecedented mastery over elemental magic. With the...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Qiyana.png'),
(1462, 'Quinn', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Quinn_0.jpg', 4800, 'Demacia\'s Wings', 'Quinn is an elite ranger-knight of Demacia, who undertakes dangerous missions deep in enemy territory. She and her legendary eagle, Valor, share an unbreakable bond, and their foes are often slain before they realize they are fighting not one, but two...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Quinn.png'),
(1463, 'Rakan', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Rakan_0.jpg', 6300, 'The Charmer', 'As mercurial as he is charming, Rakan is an infamous vastayan troublemaker and the greatest battle-dancer in Lhotlan tribal history. To the humans of the Ionian highlands, his name has long been synonymous with wild festivals, uncontrollable parties...', 'a:1:{i:0;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Rakan.png'),
(1464, 'Rammus', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Rammus_0.jpg', 1350, 'the Armordillo', 'Idolized by many, dismissed by some, mystifying to all, the curious being Rammus is an enigma. Protected by a spiked shell, he inspires increasingly disparate theories on his origin wherever he goes—from demigod, to sacred oracle, to a mere beast...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Rammus.png'),
(1465, 'Rek\'Sai', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/RekSai_0.jpg', 4800, 'the Void Burrower', 'An apex predator, Rek\'Sai is a merciless Void-spawn that tunnels beneath the ground to ambush and devour unsuspecting prey. Her insatiable hunger has laid waste to entire regions of the once-great empire of Shurima—merchants, traders, even armed...', 'a:1:{i:0;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/RekSai.png'),
(1466, 'Rell', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Rell_0.jpg', 6300, 'the Iron Maiden', 'The product of brutal experimentation at the hands of the Black Rose, Rell is a defiant, living weapon determined to topple Noxus. Her childhood was one of misery and horror, enduring unspeakable procedures to perfect and weaponize her magical control...', 'a:1:{i:0;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Rell.png'),
(1467, 'Renata Glasc', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Renata_0.jpg', 6300, 'the Chem-Baroness', 'Renata Glasc rose from the ashes of her childhood home with nothing but her name and her parents\' alchemical research. In the decades since, she has become Zaun\'s wealthiest chem-baron, a business magnate who built her power by tying everyone\'s...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Renata.png'),
(1468, 'Renekton', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Renekton_0.jpg', 4800, 'the Butcher of the Sands', 'Renekton is a terrifying, rage-fueled Ascended being from the scorched deserts of Shurima. Once, he was his empire\'s most esteemed warrior, leading the nation\'s armies to countless victories. However, after the empire\'s fall, Renekton was entombed...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Renekton.png'),
(1469, 'Rengar', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Rengar_0.jpg', 4800, 'the Pridestalker', 'Rengar is a ferocious vastayan trophy hunter who lives for the thrill of tracking down and killing dangerous creatures. He scours the world for the most fearsome beasts he can find, especially seeking any trace of Kha\'Zix, the void creature who...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Rengar.png'),
(1470, 'Riven', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Riven_0.jpg', 4800, 'the Exile', 'Once a swordmaster in the warhosts of Noxus, Riven is an expatriate in a land she previously tried to conquer. She rose through the ranks on the strength of her conviction and brutal efficiency, and was rewarded with a legendary runic blade and a...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Riven.png');
INSERT INTO `champion` (`id`, `name`, `main_image`, `price`, `title`, `blurb`, `tags`, `icon`) VALUES
(1471, 'Rumble', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Rumble_0.jpg', 4800, 'the Mechanized Menace', 'Rumble is a young inventor with a temper. Using nothing more than his own two hands and a heap of scrap, the feisty yordle constructed a colossal mech suit outfitted with an arsenal of electrified harpoons and incendiary rockets. Though others may scoff..', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Rumble.png'),
(1472, 'Ryze', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ryze_0.jpg', 450, 'the Rune Mage', 'Widely considered one of the most adept sorcerers on Runeterra, Ryze is an ancient, hard-bitten archmage with an impossibly heavy burden to bear. Armed with immense arcane power and a boundless constitution, he tirelessly hunts for World Runes—fragments..', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Ryze.png'),
(1473, 'Samira', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Samira_0.jpg', 6300, 'the Desert Rose', 'Samira stares death in the eye with unyielding confidence, seeking thrill wherever she goes. After her Shuriman home was destroyed as a child, Samira found her true calling in Noxus, where she built a reputation as a stylish daredevil taking on...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Samira.png'),
(1474, 'Sejuani', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Sejuani_0.jpg', 4800, 'Fury of the North', 'Sejuani is the brutal, unforgiving Iceborn warmother of the Winter\'s Claw, one of the most feared tribes of the Freljord. Her people\'s survival is a constant, desperate battle against the elements, forcing them to raid Noxians, Demacians, and Avarosans...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Sejuani.png'),
(1475, 'Senna', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Senna_0.jpg', 6300, 'the Redeemer', 'Cursed from childhood to be haunted by the supernatural Black Mist, Senna joined a sacred order known as the Sentinels of Light, and fiercely fought back—only to be killed, her soul imprisoned in a lantern by the cruel wraith Thresh. But refusing to...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Senna.png'),
(1476, 'Seraphine', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Seraphine_0.jpg', 6300, 'the Starry-Eyed Songstress', 'Born in Piltover to Zaunite parents, Seraphine can hear the souls of others—the world sings to her, and she sings back. Though these sounds overwhelmed her in her youth, she now draws on them for inspiration, turning the chaos into a symphony. She...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Seraphine.png'),
(1477, 'Sett', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Sett_0.jpg', 6300, 'the Boss', 'A leader of Ionia\'s growing criminal underworld, Sett rose to prominence in the wake of the war with Noxus. Though he began as a humble challenger in the fighting pits of Navori, he quickly gained notoriety for his savage strength, and his ability to...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Sett.png'),
(1478, 'Shaco', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Shaco_0.jpg', 3150, 'the Demon Jester', 'Crafted long ago as a plaything for a lonely prince, the enchanted marionette Shaco now delights in murder and mayhem. Corrupted by dark magic and the loss of his beloved charge, the once-kind puppet finds pleasure only in the misery of the poor souls...', 'a:1:{i:0;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Shaco.png'),
(1479, 'Shen', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Shen_0.jpg', 3150, 'the Eye of Twilight', 'Among the secretive, Ionian warriors known as the Kinkou, Shen serves as their leader, the Eye of Twilight. He longs to remain free from the confusion of emotion, prejudice, and ego, and walks the unseen path of dispassionate judgment between the spirit..', 'a:1:{i:0;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Shen.png'),
(1480, 'Shyvana', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Shyvana_0.jpg', 3150, 'the Half-Dragon', 'Shyvana is a creature with the magic of a rune shard burning within her heart. Though she often appears humanoid, she can take her true form as a fearsome dragon, incinerating her foes with fiery breath. Having saved the life of the crown prince Jarvan...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Shyvana.png'),
(1481, 'Singed', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Singed_0.jpg', 450, 'the Mad Chemist', 'Singed is a Zaunite alchemist of unmatched intellect, who has devoted his life to pushing the boundaries of knowledge—with no price, even his own sanity, too high to pay. Is there a method to his madness? His concoctions rarely fail, but it appears to...', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Singed.png'),
(1482, 'Sion', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Sion_0.jpg', 1350, 'The Undead Juggernaut', 'A war hero from a bygone era, Sion was revered in Noxus for choking the life out of a Demacian king with his bare hands—but, denied oblivion, he was resurrected to serve his empire even in death. His indiscriminate slaughter claimed all who stood in his..', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Sion.png'),
(1483, 'Sivir', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Sivir_0.jpg', 450, 'the Battle Mistress', 'Sivir is a renowned fortune hunter and mercenary captain who plies her trade in the deserts of Shurima. Armed with her legendary jeweled crossblade, she has fought and won countless battles for those who can afford her exorbitant price. Known for her...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Sivir.png'),
(1484, 'Skarner', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Skarner_0.jpg', 4800, 'the Crystal Vanguard', 'Skarner is an immense crystalline scorpion from a hidden valley in Shurima. Part of the ancient Brackern race, Skarner and his kin are known for their great wisdom and deep connection to the land, as their souls are fused with powerful life crystals...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Skarner.png'),
(1485, 'Sona', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Sona_0.jpg', 1350, 'Maven of the Strings', 'Sona is Demacia\'s foremost virtuoso of the stringed etwahl, speaking only through her graceful chords and vibrant arias. This genteel manner has endeared her to the highborn, though others suspect her spellbinding melodies to actually emanate magic—a...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Sona.png'),
(1486, 'Soraka', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Soraka_0.jpg', 450, 'the Starchild', 'A wanderer from the celestial dimensions beyond Mount Targon, Soraka gave up her immortality to protect the mortal races from their own more violent instincts. She endeavors to spread the virtues of compassion and mercy to everyone she meets—even...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Soraka.png'),
(1487, 'Swain', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Swain_0.jpg', 4800, 'the Noxian Grand General', 'Jericho Swain is the visionary ruler of Noxus, an expansionist nation that reveres only strength. Though he was cast down and crippled in the Ionian wars, his left arm severed, he seized control of the empire with ruthless determination… and a new...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Swain.png'),
(1488, 'Sylas', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Sylas_0.jpg', 6300, 'the Unshackled', 'Raised in one of Demacia\'s lesser quarters, Sylas of Dregbourne has come to symbolize the darker side of the Great City. As a boy, his ability to root out hidden sorcery caught the attention of the notorious mageseekers, who eventually imprisoned him...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Sylas.png'),
(1489, 'Syndra', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Syndra_0.jpg', 4800, 'the Dark Sovereign', 'Syndra is a fearsome Ionian mage with incredible power at her command. As a child, she disturbed the village elders with her reckless and wild magic. She was sent away to be taught greater control, but eventually discovered her supposed mentor was...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Syndra.png'),
(1490, 'Tahm Kench', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/TahmKench_0.jpg', 4800, 'The River King', 'Known by many names throughout history, the demon Tahm Kench travels the waterways of Runeterra, feeding his insatiable appetite with the misery of others. Though he may appear singularly charming and proud, he swaggers through the physical realm like a..', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/TahmKench.png'),
(1491, 'Taliyah', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Taliyah_0.jpg', 6300, 'the Stoneweaver', 'Taliyah is a nomadic mage from Shurima, torn between teenage wonder and adult responsibility. She has crossed nearly all of Valoran on a journey to learn the true nature of her growing powers, though more recently she has returned to protect her tribe...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Taliyah.png'),
(1492, 'Talon', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Talon_0.jpg', 4800, 'the Blade\'s Shadow', 'Talon is the knife in the darkness, a merciless killer able to strike without warning and escape before any alarm is raised. He carved out a dangerous reputation on the brutal streets of Noxus, where he was forced to fight, kill, and steal to survive...', 'a:1:{i:0;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Talon.png'),
(1493, 'Taric', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Taric_0.jpg', 1350, 'the Shield of Valoran', 'Taric is the Aspect of the Protector, wielding incredible power as Runeterra\'s guardian of life, love, and beauty. Shamed by a dereliction of duty and exiled from his homeland Demacia, Taric ascended Mount Targon to find redemption, only to discover a...', 'a:2:{i:0;s:7:\"Support\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Taric.png'),
(1494, 'Teemo', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Teemo_0.jpg', 1350, 'the Swift Scout', 'Undeterred by even the most dangerous and threatening of obstacles, Teemo scouts the world with boundless enthusiasm and a cheerful spirit. A yordle with an unwavering sense of morality, he takes pride in following the Bandle Scout\'s Code, sometimes...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Teemo.png'),
(1495, 'Thresh', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Thresh_0.jpg', 4800, 'the Chain Warden', 'Sadistic and cunning, Thresh is an ambitious and restless spirit of the Shadow Isles. Once the custodian of countless arcane secrets, he was undone by a power greater than life or death, and now sustains himself by tormenting and breaking others with...', 'a:2:{i:0;s:7:\"Support\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Thresh.png'),
(1496, 'Tristana', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Tristana_0.jpg', 1350, 'the Yordle Gunner', 'While many other yordles channel their energy into discovery, invention, or just plain mischief-making, Tristana was always inspired by the adventures of great warriors. She had heard much about Runeterra, its factions, and its wars, and believed her...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Tristana.png'),
(1497, 'Trundle', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Trundle_0.jpg', 3150, 'the Troll King', 'Trundle is a hulking and devious troll with a particularly vicious streak, and there is nothing he cannot bludgeon into submission—not even the Freljord itself. Fiercely territorial, he chases down anyone foolish enough to enter his domain. Then, his...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Trundle.png'),
(1498, 'Tryndamere', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Tryndamere_0.jpg', 1350, 'the Barbarian King', 'Fueled by unbridled fury and rage, Tryndamere once carved his way through the Freljord, openly challenging the greatest warriors of the north to prepare himself for even darker days ahead. The wrathful barbarian has long sought revenge for the...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Tryndamere.png'),
(1499, 'Twisted Fate', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/TwistedFate_0.jpg', 1350, 'the Card Master', 'Twisted Fate is an infamous cardsharp and swindler who has gambled and charmed his way across much of the known world, earning the enmity and admiration of the rich and foolish alike. He rarely takes things seriously, greeting each day with a mocking...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/TwistedFate.png'),
(1500, 'Twitch', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Twitch_0.jpg', 3150, 'the Plague Rat', 'A Zaunite plague rat by birth, but a connoisseur of filth by passion, Twitch is not afraid to get his paws dirty. Aiming a chem-powered crossbow at the gilded heart of Piltover, he has vowed to show those in the city above just how filthy they really...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Twitch.png'),
(1501, 'Udyr', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Udyr_0.jpg', 1350, 'the Spirit Walker', 'Udyr is more than a man; he is a vessel for the untamed power of four primal animal spirits. When tapping into the spirits\' bestial natures, Udyr can harness their unique strengths: The tiger grants him speed and ferocity, the turtle resilience, the...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Udyr.png'),
(1502, 'Urgot', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Urgot_0.jpg', 3150, 'the Dreadnought', 'Once a powerful Noxian headsman, Urgot was betrayed by the empire for which he had killed so many. Bound in iron chains, he was forced to learn the true meaning of strength in the Dredge—a prison mine deep beneath Zaun. Emerging in a disaster that...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Urgot.png'),
(1503, 'Varus', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Varus_0.jpg', 4800, 'the Arrow of Retribution', 'One of the ancient darkin, Varus was a deadly killer who loved to torment his foes, driving them almost to insanity before delivering the killing arrow. He was imprisoned at the end of the Great Darkin War, but escaped centuries later in the remade...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Varus.png'),
(1504, 'Vayne', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Vayne_0.jpg', 4800, 'the Night Hunter', 'Shauna Vayne is a deadly, remorseless Demacian monster hunter, who has dedicated her life to finding and destroying the demon that murdered her family. Armed with a wrist-mounted crossbow and a heart full of vengeance, she is only truly happy when...', 'a:2:{i:0;s:8:\"Marksman\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Vayne.png'),
(1505, 'Veigar', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Veigar_0.jpg', 1350, 'the Tiny Master of Evil', 'An enthusiastic master of dark sorcery, Veigar has embraced powers that few mortals dare approach. As a free-spirited inhabitant of Bandle City, he longed to push beyond the limitations of yordle magic, and turned instead to arcane texts that had been...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Veigar.png'),
(1506, 'Vel\'Koz', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Velkoz_0.jpg', 4800, 'the Eye of the Void', 'It is unclear if Vel\'Koz was the first Void-spawn to emerge on Runeterra, but there has certainly never been another to match his level of cruel, calculating sentience. While his kin devour or defile everything around them, he seeks instead to...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Velkoz.png'),
(1507, 'Vex', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Vex_0.jpg', 6300, 'the Gloomist', 'In the black heart of the Shadow Isles, a lone yordle trudges through the spectral fog, content in its murky misery. With an endless supply of teen angst and a powerful shadow in tow, Vex lives in her own self-made slice of gloom, far from the revolting..', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Vex.png'),
(1508, 'Vi', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Vi_0.jpg', 6300, 'the Piltover Enforcer', 'Once a criminal from the mean streets of Zaun, Vi is a hotheaded, impulsive, and fearsome woman with only a very loose respect for authority figures. Growing up all but alone, Vi developed finely honed survival instincts as well as a wickedly abrasive...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Vi.png'),
(1509, 'Viego', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Viego_0.jpg', 6300, 'The Ruined King', 'Once ruler of a long-lost kingdom, Viego perished over a thousand years ago when his attempt to bring his wife back from the dead triggered the magical catastrophe known as the Ruination. Transformed into a powerful, unliving wraith tortured by an...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Viego.png'),
(1510, 'Viktor', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Viktor_0.jpg', 4800, 'the Machine Herald', 'The herald of a new age of technology, Viktor has devoted his life to the advancement of humankind. An idealist who seeks to lift the people of Zaun to a new level of understanding, he believes that only by embracing a glorious evolution of technology...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Viktor.png'),
(1511, 'Vladimir', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Vladimir_0.jpg', 3150, 'the Crimson Reaper', 'A fiend with a thirst for mortal blood, Vladimir has influenced the affairs of Noxus since the empire\'s earliest days. In addition to unnaturally extending his life, his mastery of hemomancy allows him to control the minds and bodies of others as easily..', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Vladimir.png'),
(1512, 'Volibear', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Volibear_0.jpg', 3150, 'the Relentless Storm', 'To those who still revere him, the Volibear is the storm made manifest. Destructive, wild, and stubbornly resolute, he existed before mortals walked the Freljord\'s tundra, and is fiercely protective of the lands that he and his demi-god kin created...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Volibear.png'),
(1513, 'Warwick', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Warwick_0.jpg', 450, 'the Uncaged Wrath of Zaun', 'Warwick is a monster who hunts the gray alleys of Zaun. Transformed by agonizing experiments, his body is fused with an intricate system of chambers and pumps, machinery filling his veins with alchemical rage. Bursting out of the shadows, he preys upon...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Warwick.png'),
(1514, 'Xayah', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Xayah_0.jpg', 6300, 'the Rebel', 'Deadly and precise, Xayah is a vastayan revolutionary waging a personal war to save her people. She uses her speed, guile, and razor-sharp feather blades to cut down anyone who stands in her way. Xayah fights alongside her partner and lover, Rakan, to...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Xayah.png'),
(1515, 'Xerath', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Xerath_0.jpg', 4800, 'the Magus Ascendant', 'Xerath is an Ascended Magus of ancient Shurima, a being of arcane energy writhing in the broken shards of a magical sarcophagus. For millennia, he was trapped beneath the desert sands, but the rise of Shurima freed him from his ancient prison. Driven...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Xerath.png'),
(1516, 'Xin Zhao', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/XinZhao_0.jpg', 1350, 'the Seneschal of Demacia', 'Xin Zhao is a resolute warrior loyal to the ruling Lightshield dynasty. Once condemned to the fighting pits of Noxus, he survived countless gladiatorial bouts, but after being freed by Demacian forces, he swore his life and allegiance to these brave...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/XinZhao.png'),
(1517, 'Yasuo', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Yasuo_0.jpg', 4800, 'the Unforgiven', 'An Ionian of deep resolve, Yasuo is an agile swordsman who wields the air itself against his enemies. As a proud young man, he was falsely accused of murdering his master—unable to prove his innocence, he was forced to slay his own brother in self...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Yasuo.png'),
(1518, 'Yone', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Yone_0.jpg', 6300, 'the Unforgotten', 'In life, he was Yone—half-brother of Yasuo, and renowned student of his village\'s sword school. But upon his death at the hands of his brother, he found himself hunted by a malevolent entity of the spirit realm, and was forced to slay it with its own...', 'a:2:{i:0;s:8:\"Assassin\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Yone.png'),
(1519, 'Yorick', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Yorick_0.jpg', 4800, 'Shepherd of Souls', 'The last survivor of a long-forgotten religious order, Yorick is both blessed and cursed with power over the dead. Trapped on the Shadow Isles, his only companions are the rotting corpses and shrieking spirits that he gathers to him. Yorick\'s monstrous...', 'a:2:{i:0;s:7:\"Fighter\";i:1;s:4:\"Tank\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Yorick.png'),
(1520, 'Yuumi', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Yuumi_0.jpg', 6300, 'the Magical Cat', 'A magical cat from Bandle City, Yuumi was once the familiar of a yordle enchantress, Norra. When her master mysteriously disappeared, Yuumi became the Keeper of Norra\'s sentient Book of Thresholds, traveling through portals in its pages to search for...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Yuumi.png'),
(1521, 'Zac', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Zac_0.jpg', 4800, 'the Secret Weapon', 'Zac is the product of a toxic spill that ran through a chemtech seam and pooled in an isolated cavern deep in Zaun\'s Sump. Despite such humble origins, Zac has grown from primordial ooze into a thinking being who dwells in the city\'s pipes, occasionally..', 'a:2:{i:0;s:4:\"Tank\";i:1;s:7:\"Fighter\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Zac.png'),
(1522, 'Zed', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Zed_0.jpg', 4800, 'the Master of Shadows', 'Utterly ruthless and without mercy, Zed is the leader of the Order of Shadow, an organization he created with the intent of militarizing Ionia\'s magical and martial traditions to drive out Noxian invaders. During the war, desperation led him to unlock...', 'a:1:{i:0;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Zed.png'),
(1523, 'Zeri', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Zeri_0.jpg', 6300, 'The Spark of Zaun', 'A headstrong, spirited young woman from Zaun\'s working-class, Zeri channels her electric magic to charge herself and her custom-crafted gun. Her volatile power mirrors her emotions, its sparks reflecting her lightning-fast approach to life. Deeply...', 'a:1:{i:0;s:8:\"Marksman\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Zeri.png'),
(1524, 'Ziggs', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ziggs_0.jpg', 4800, 'the Hexplosives Expert', 'With a love of big bombs and short fuses, the yordle Ziggs is an explosive force of nature. As an inventor\'s assistant in Piltover, he was bored by his predictable life and befriended a mad, blue-haired bomber named Jinx. After a wild night on the town...', 'a:1:{i:0;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Ziggs.png'),
(1525, 'Zilean', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Zilean_0.jpg', 1350, 'the Chronokeeper', 'Once a powerful Icathian mage, Zilean became obsessed with the passage of time after witnessing his homeland\'s destruction by the Void. Unable to spare even a minute to grieve the catastrophic loss, he called upon ancient temporal magic to divine all...', 'a:2:{i:0;s:7:\"Support\";i:1;s:4:\"Mage\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Zilean.png'),
(1526, 'Zoe', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Zoe_0.jpg', 6300, 'the Aspect of Twilight', 'As the embodiment of mischief, imagination, and change, Zoe acts as the cosmic messenger of Targon, heralding major events that reshape worlds. Her mere presence warps the arcane mathematics governing realities, sometimes causing cataclysms without...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Zoe.png'),
(1527, 'Zyra', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Zyra_0.jpg', 4800, 'Rise of the Thorns', 'Born in an ancient, sorcerous catastrophe, Zyra is the wrath of nature given form—an alluring hybrid of plant and human, kindling new life with every step. She views the many mortals of Valoran as little more than prey for her seeded progeny, and thinks..', 'a:2:{i:0;s:4:\"Mage\";i:1;s:7:\"Support\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Zyra.png'),
(1528, 'Ahri', 'https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ahri_0.jpg', 3150, 'the Nine-Tailed Fox', 'Innately connected to the latent power of Runeterra, Ahri is a vastaya who can reshape magic into orbs of raw energy. She revels in toying with her prey by manipulating their emotions before devouring their life essence. Despite her predatory nature...', 'a:2:{i:0;s:4:\"Mage\";i:1;s:8:\"Assassin\";}', 'https://ddragon.leagueoflegends.com/cdn/12.4.1/img/champion/Ahri.png');

-- --------------------------------------------------------

--
-- Structure de la table `command_shop`
--

DROP TABLE IF EXISTS `command_shop`;
CREATE TABLE IF NOT EXISTS `command_shop` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `is_payed` tinyint(1) NOT NULL,
  `total_price` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DC0E22FA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `command_shop`
--

INSERT INTO `command_shop` (`id`, `user_id`, `created_at`, `is_payed`, `total_price`) VALUES
(1, 2, '2022-03-08 17:28:22', 0, 20),
(2, 2, '2022-03-08 17:31:22', 0, 20),
(3, 2, '2022-03-08 17:31:44', 0, 20),
(4, 2, '2022-03-08 17:37:00', 0, 65),
(5, 2, '2022-03-08 17:42:26', 0, 65),
(6, 2, '2022-03-08 17:48:02', 0, 65),
(7, 2, '2022-03-08 17:52:53', 0, 65),
(8, 2, '2022-03-08 18:06:52', 1, 65),
(9, 2, '2022-03-08 18:22:07', 0, 65),
(10, 2, '2022-03-08 18:30:03', 0, 65),
(11, 2, '2022-03-08 18:33:13', 0, 65),
(12, 2, '2022-03-08 18:36:08', 1, 65),
(13, 2, '2022-03-08 18:37:01', 0, 65),
(14, 2, '2022-03-08 18:39:33', 0, 65),
(15, 2, '2022-03-08 18:56:57', 0, 65),
(16, 2, '2022-03-08 19:04:15', 0, 65),
(17, 2, '2022-03-09 08:29:47', 0, 704),
(18, 2, '2022-03-09 08:31:42', 0, 704),
(19, 2, '2022-03-09 08:33:20', 0, 704),
(20, 2, '2022-03-09 08:34:03', 0, 704),
(21, 2, '2022-03-09 08:35:36', 0, 704),
(22, 2, '2022-03-09 08:36:58', 0, 704),
(23, 2, '2022-03-09 08:37:41', 1, 704),
(24, 6, '2022-03-18 14:30:29', 1, 704),
(25, 2, '2022-04-28 09:18:25', 0, 4213);

-- --------------------------------------------------------

--
-- Structure de la table `command_shop_line`
--

DROP TABLE IF EXISTS `command_shop_line`;
CREATE TABLE IF NOT EXISTS `command_shop_line` (
  `id` int NOT NULL AUTO_INCREMENT,
  `command_shop_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_97D71D86A27C973E` (`command_shop_id`),
  KEY `IDX_97D71D864584665A` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `command_shop_line`
--

INSERT INTO `command_shop_line` (`id`, `command_shop_id`, `product_id`, `quantity`) VALUES
(1, 1, 6, 4),
(2, 2, 6, 4),
(3, 3, 6, 4),
(4, 4, 6, 13),
(5, 5, 6, 13),
(6, 6, 6, 13),
(7, 7, 6, 13),
(8, 8, 6, 13),
(9, 9, 6, 13),
(10, 10, 6, 13),
(11, 11, 6, 13),
(12, 12, 6, 13),
(13, 13, 6, 13),
(14, 14, 6, 13),
(15, 15, 6, 13),
(16, 16, 6, 13),
(17, 17, 5, 1),
(18, 18, 5, 1),
(19, 19, 5, 1),
(20, 20, 5, 1),
(21, 21, 5, 1),
(22, 22, 5, 1),
(23, 23, 5, 1),
(24, 24, 5, 1),
(25, 25, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `content_collection`
--

DROP TABLE IF EXISTS `content_collection`;
CREATE TABLE IF NOT EXISTS `content_collection` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6574D3C0A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `content_collection`
--

INSERT INTO `content_collection` (`id`, `created_at`, `user_id`) VALUES
(4, '2022-03-18 15:47:03', 6);

-- --------------------------------------------------------

--
-- Structure de la table `delivery_address`
--

DROP TABLE IF EXISTS `delivery_address`;
CREATE TABLE IF NOT EXISTS `delivery_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `command_shop_id` int NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_750D05FA27C973E` (`command_shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `command_shop_id`, `country`, `city`, `postal_code`, `street`, `commentary`) VALUES
(1, 1, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(2, 2, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(3, 3, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(4, 4, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(5, 5, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(6, 6, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(7, 7, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(8, 8, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(9, 9, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(10, 10, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(11, 11, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(12, 12, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(13, 13, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(14, 14, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(15, 15, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(16, 16, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(17, 17, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(18, 18, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(19, 19, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(20, 20, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(21, 21, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(22, 22, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(23, 23, 'France', 'Ile de France', '75000', '4 rue aller non', NULL),
(24, 24, 'a', 'a', 'a', 'a', NULL),
(25, 25, 'iiiiiii', 'iiiiiiiiiiii', 'iii', 'iiiiii', 'iiiiiiii');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220318145215', '2022-03-18 14:52:29', 3811),
('DoctrineMigrations\\Version20220318145523', '2022-03-18 14:55:30', 3961),
('DoctrineMigrations\\Version20220318153153', '2022-03-18 15:31:58', 2958),
('DoctrineMigrations\\Version20220318153238', '2022-03-18 15:32:43', 3717),
('DoctrineMigrations\\Version20220318163136', '2022-03-18 16:31:41', 1137),
('DoctrineMigrations\\Version20220318163418', '2022-03-18 16:34:24', 4729),
('DoctrineMigrations\\Version20220602183544', '2022-06-02 18:36:01', 2630),
('DoctrineMigrations\\Version20220602183811', '2022-06-02 18:38:21', 411),
('DoctrineMigrations\\Version20220603125048', '2022-06-03 12:50:57', 4269),
('DoctrineMigrations\\Version20220603125922', '2022-06-03 12:59:32', 2751),
('DoctrineMigrations\\Version20220603142314', '2022-06-03 14:23:20', 1388);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `image`, `price`) VALUES
(1, 1, '1er Produit', 'https://cdn.discordapp.com/attachments/280510643692371979/941825334930718750/FLWUZcLXMAAaiXc.png', 1500000),
(2, 2, '2eme Produit', 'https://media.discordapp.net/attachments/280510643692371979/941434565975765052/1644525888984.jpg?width=705&height=697', 1245),
(3, 2, '3eme Produit', 'https://cdn.discordapp.com/attachments/280510643692371979/938003177788297216/FB_IMG_1643301631447.jpg', 4213),
(4, 2, '4eme Produit', 'https://cdn.discordapp.com/attachments/280510643692371979/936345607373750272/2zeafrf46ae81.png', 133788),
(5, 1, '5eme Produit', 'https://cdn.discordapp.com/attachments/280510643692371979/936345024147378246/xp47hm03x8e81.png', 704),
(6, 1, '6eme Produit', 'https://cdn.discordapp.com/attachments/280510643692371979/936279722625736774/vo8s8rodm6e81.png', 5),
(7, 5, 'selim u noob', '/uploads/images/image-b22e8616b662671e989bf5efe1e78b67.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `selected_champion`
--

DROP TABLE IF EXISTS `selected_champion`;
CREATE TABLE IF NOT EXISTS `selected_champion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content_collection_id` int DEFAULT NULL,
  `champion_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_521C8489A9370EC` (`content_collection_id`),
  KEY `IDX_521C8489FA7FD7EB` (`champion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `selected_champion`
--

INSERT INTO `selected_champion` (`id`, `content_collection_id`, `champion_id`) VALUES
(13, 4, 1376);

-- --------------------------------------------------------

--
-- Structure de la table `spell`
--

DROP TABLE IF EXISTS `spell`;
CREATE TABLE IF NOT EXISTS `spell` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_passive` tinyint(1) NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spell_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooldown` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `champion_id` int NOT NULL,
  `spell_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_toggle` tinyint(1) NOT NULL,
  `is_both` tinyint(1) NOT NULL,
  `range_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `damage_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D03FCD8DFA7FD7EB` (`champion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `pseudo`, `image`, `cover`) VALUES
(1, 'admin1@admin.admin', '[\"ROLE_ADMIN\"]', '$2y$13$ymVZdbwOekFkvaUIyt7EWOGEi52c1xlrys/siAvrMvaNqvUAu3oN.', 'Admin1 admin', 'admin1', 'https://cdn.discordapp.com/attachments/247154144136134656/942814853708546108/unknown.png', NULL),
(2, 'user1.user@user.user', '[]', '$2y$13$7IEJb2iTrnXnhSSVdBcaTeAE20fcWj1Au8j3wCcNUp87jif2IGX.u', 'user1', 'Le User Premier', '/uploads/images/85810903-p0-2674993bdb93e774a4d64e415811b590.png', '/uploads/images/83774126-p0-master1200-09d67c1f000944a1b5e37d118bde9dfa.jpg'),
(3, 'user2.user@user.user', '[]', '$2y$13$Hn3fzDQ5J2o8u/H0/xfxEuFMD9LFqaEphhCLfH0Efy54J1NnWMUEu', 'user2', 'User2', NULL, NULL),
(4, 'user3.user@user.user', '[]', '$2y$13$amO/SLoeI0Vvkd4RACrYwOQMIEh0pCEsCr0XpuAOleyiZM6cmcKMe', 'user3', 'User3', NULL, NULL),
(5, 'admin2@admin.admin', '[\"ROLE_ADMIN\"]', '$2y$13$QAl2GWhXqRbuJpNMbNeLiefTv.NS4cpFyM2chx7MrYL98uBvfMzKq', 'admin2', 'admin2', NULL, NULL),
(6, 'user4@user.user', '[]', '$2y$13$Hzvh8MjQJyN23t4lhoxXHeYHtohQl3pFNcsnscOCw6J2zMK2zfn4K', 'user4 user', 'User le 4ème', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `command_shop`
--
ALTER TABLE `command_shop`
  ADD CONSTRAINT `FK_DC0E22FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `command_shop_line`
--
ALTER TABLE `command_shop_line`
  ADD CONSTRAINT `FK_97D71D864584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_97D71D86A27C973E` FOREIGN KEY (`command_shop_id`) REFERENCES `command_shop` (`id`);

--
-- Contraintes pour la table `content_collection`
--
ALTER TABLE `content_collection`
  ADD CONSTRAINT `FK_6574D3C0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD CONSTRAINT `FK_750D05FA27C973E` FOREIGN KEY (`command_shop_id`) REFERENCES `command_shop` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `selected_champion`
--
ALTER TABLE `selected_champion`
  ADD CONSTRAINT `FK_521C8489A9370EC` FOREIGN KEY (`content_collection_id`) REFERENCES `content_collection` (`id`),
  ADD CONSTRAINT `FK_521C8489FA7FD7EB` FOREIGN KEY (`champion_id`) REFERENCES `champion` (`id`);

--
-- Contraintes pour la table `spell`
--
ALTER TABLE `spell`
  ADD CONSTRAINT `FK_D03FCD8DFA7FD7EB` FOREIGN KEY (`champion_id`) REFERENCES `champion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
