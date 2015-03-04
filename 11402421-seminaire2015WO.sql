-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 04 Mars 2015 à 18:44
-- Version du serveur: 5.5.38
-- Version de PHP: 5.4.4-14+deb7u12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `11402421-seminaire2015WO`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `nom` varchar(32) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`nom`, `description`) VALUES
('Théâtre', '');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `date_debut` date NOT NULL,
  `duration` int(11) NOT NULL,
  `location` varchar(128) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `preview` varchar(128) CHARACTER SET utf8 NOT NULL,
  `hour` datetime NOT NULL,
  `campus` varchar(32) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`name`,`date_debut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`name`, `date_debut`, `duration`, `location`, `description`, `preview`, `hour`, `campus`) VALUES
('Autarcie (...)', '2015-03-19', 0, 'Le Forum', 'Autarcie (...) est un jeu de stratégie, entre danse frontale et digressions libres, où se confrontent deux spécialités de la danse hip-hop : le break et le popping. Pendant 50 minutes, quatre danseuses aux espaces de danse et aux techniques très différentes se livrent à un rituel effréné. Le devant de la scène est le point de ralliement où ces quatre individualités fortes s''unissent pour construire, à l''adresse public, une danse guerrière.', '', '2015-03-19 12:30:00', 'vil'),
('Battle-Jeux Vidéos', '2015-03-12', 0, 'Foyer de l''illustration', 'Dans la mouvance des battles de danse et de piano, cette fois-ci en partenariat avec le département MMI de l''IUT et l'' UNEF, le service culturel se transforme en salle de jeux vidéo : avis aux amateurs et game players, vous vous affronterez sur une sélection de jeux et découvrirez les tout nouveaux jeux crées par des étudiants de la licence professionnelle en "Game et level design".', '', '2015-03-12 12:00:00', 'bob'),
('D''où viens-tu?', '2015-03-30', 9, 'Foyer de l''illustration', 'Interroger la provenance, qu''elle soit géographique, linguistique, identitaire, voire de coeur, telle est la teneur de cet atelier qui, dans le cadre d''un module de deuxième année de DUT MMI, vise à faire produire aux étudiants un travail photographique et graphique portant sur le portrait, tout en étudiant les principes de bases de ces médias.', '', '0000-00-00 00:00:00', 'bob'),
('Egg', '2015-03-05', 0, 'Théatre National de Chaillot', 'Il y a plusieurs façons de rassembler les foules. Le sport, la politique, la guerre mais aussi la musique pop en sont de bons exemples. C''est cette galvanisation et cette utilisation des masses que critique Hideki Noda. Le dramaturge et metteur en scène a construit sa pièce autour d''un sport d''équipe imaginaire où l''on jouerait avec de vrais oeufs. Mêlant les niveaux de récits et les époques, la pièce confronte les univers du sport et de la musique à travers une histoire d''amour entre Abe, jeune champion d''"oeuf", et Ichigo, vedette de pop music.', '', '2015-03-05 20:30:00', 'hlm'),
('La Boca Abierta', '2015-03-07', 0, 'Centre Culturel Jean Houdremont, La Courneuve', 'La Boca Abierta, duo formé par Anne Kaempf et Lior Shoov, est en quelque sorte un couple. C''est l''improvisation qui crée la surprise, le mouvement. Plaisir du rire libérateur, de la tension ou de la gêne, ou mieux encore de la catastrophe qui advient effectivement. Un rendez-vous dont on est sûr et qui permet de suspendre le tangage : quelques chansons choisies selon l''humeur dans un vrai répertoire.', '', '2015-03-07 19:00:00', 'hlm'),
('Les Estivants', '2015-03-17', 0, 'Comédie Française', 'Zomergasten - Les Estivants en français - met en scène un groupe d''amis russes qui passent ensemble l''été dans une datcha. Les conversation tournent autour de l''éducation des enfants, de l''amour,du mariage, de la littérature, de la vie... On y boit du thé, on y bavarde et badine, on profite de l''eau et du soleil. Et pourtant, quelque chose est en train de se tramer. Ce cercle d''illuminés notoires, tous membres de la classe supérieure, de l''intelligentsia russe, ne peut cacher une grande nervosité. Dans l''attente de voir leur vie complètement chamboulée, ils se cramponnent les uns aux autres et défendent avec fanatisme leur position chancelante.\r\nLes Estivants, ou Datchniki en russe, est une pièce que Maxime Gorki a écrite en 1905. Son récit dramatise la vie des aristocrates et artistes russes, ainsi que leur attitude face aux bouleversements sociaux du début du XXème siècle.', '', '2015-03-17 20:30:00', 'hlm'),
('Les Trois Soeurs', '2015-03-30', 0, 'Théâtre Gérard Philippe, Saint-Denis', 'Les trois soeurs, Olga, Irina, Macha... Les trois Grâces, les trois Parques... Tchekov ne choisit pas innocemment d''écrire pour un trio féminin. Même s''il adjoint au trio une quatrième figure, le frère, Andreï, qui biaise quelque peu le symbole, il n''en demeure pas moins que trois soeurs, cela impressionne. Le charme a agi chez Jean-Yvs Ruf dès la découverte de cette pièce à part, profonde, mystérieuse. Elle l''a toujours intrigué, fasciné par son caractère sourd, cette sensation de délitement insidieux qui y gagne les âmes.', '', '2015-03-30 20:00:00', 'hlm'),
('Lignes de Faille', '2015-03-19', 0, 'Théâtre du Rond-Point', 'Sol, six ans, sale môme su-gâté, un grain de beauté sur la tempe. Dieu a fait de lui un être parfait. Issu d''une famille protestante et islamophobe, sa mère le fait opérer du grain de beauté qui altère sa perfection. Mais l''opération le défigure, et il se fâche avec Dieu. Premières lignes de faille dans la saga épique. Nancy Huston multiplie les pistes, les pièges, les quêtes d''identité. Les acteurs plongent dans un chef-d''oeuvre homérique. Entre héritage et affranchissement, comment devient-on ce qu''on est, et à quel prix?', '', '2015-03-19 19:00:00', 'hlm'),
('Texto', '2015-03-17', 0, 'La Chaufferie', 'Olivia Rosenthal dévoile ses mécanismes de survie en milieu hostile, Verticales, 2014. Récit d''appretissage, thriller métaphysique ou manuel d''exorcisme, ce livre raconte comment esquiver les coups et si possible comment les rendre (présentation de l''éditeur). Séance animée par Judith Mayer.', '', '2015-03-12 00:00:00', 'vil'),
('Urban Flavors', '2015-03-09', 33, 'Café Expo', 'Le collectif RVNHD envahit le Café Expo et le Forum!\r\nAu programme : concert, exposition, démonstrations de danses, réalisations d''illustrations en live et défilé de mode. Un stand de Lightpainting et une fresque participative seront mis à disposition des étudiants de l''Université Paris 13.', '', '0000-00-00 00:00:00', 'vil'),
('Urban Flavors', '2015-03-24', 0, 'Le Forum', 'Le collectif RVNHD envahit le Café Expo et le Forum!\r\nAu programme : concert, exposition, démonstrations de danses, réalisations d''illustrations en live et défilé de mode. Un stand de Lightpainting et une fresque participative seront mis à disposition des étudiants de l''Université Paris 13.', '', '2015-03-24 12:30:00', 'vil'),
('Vanishing Point', '2015-03-31', 0, 'Théatre National de Chaillot', 'Intérieur d''une voiture enfermée dans un garage. Au volant, Suzanne, laisse tourner le moteur. La fumée des gaz d''échappement envahit le garage. Tentative de suicide? Comment en est-elle arrivée là? A travers le nuage de fumée se profile la silhouette d''un auto-stoppeur. Qui est cet homme? Pourquoi apparaît-il à ce moment-là? A travers les espaces de l''Amérique du Nord, Marc Lainé nous propose un voyage mental vertigineux et fascinant. Il nous entraîne dans la quête d''un amour impossible où réel et fantastique se répondent jusqu''à se superposer.', '', '2015-03-31 20:30:00', 'hlm'),
('Waka Afrika', '2015-03-05', 22, 'Foyer de l''illustration et B.U', 'A travers une exposition de planches de bandes dessinées, de caricatures, de collages, et un espace de lecture, les dessinateurs de l''association l''Afrique dessinée soulèvent quelques problématiques de l''Afrique urbaine contemporaine et de la place de l''Africain dans ce continent en mouvement : le rapport à l''autre, la question du pouvoir et de l''argent, l''immigration...', '', '0000-00-00 00:00:00', 'bob');

-- --------------------------------------------------------

--
-- Structure de la table `RelCategories`
--

CREATE TABLE IF NOT EXISTS `RelCategories` (
  `event` varchar(32) CHARACTER SET utf8 NOT NULL,
  `category` varchar(32) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`event`,`category`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `RelPreferences`
--

CREATE TABLE IF NOT EXISTS `RelPreferences` (
  `id_user` int(8) NOT NULL,
  `category` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_user`,`category`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `RelSubscribe`
--

CREATE TABLE IF NOT EXISTS `RelSubscribe` (
  `user` int(8) NOT NULL,
  `event` varchar(32) NOT NULL,
  PRIMARY KEY (`user`,`event`),
  KEY `event` (`event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `RelSubscribe`
--

INSERT INTO `RelSubscribe` (`user`, `event`) VALUES
(11302484, 'La Boca Abierta');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(8) NOT NULL,
  `pwd` varchar(11) NOT NULL,
  `mail` varchar(128) CHARACTER SET utf8 NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mem_daps` tinyint(1) DEFAULT NULL,
  `mem_sc` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `pwd`, `mail`, `date_reg`, `mem_daps`, `mem_sc`) VALUES
(11302484, '0111904007R', 'mathieu-brossard@caramail.com', '2015-03-04 16:33:28', 0, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `RelCategories`
--
ALTER TABLE `RelCategories`
  ADD CONSTRAINT `RelCategories_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`nom`),
  ADD CONSTRAINT `RelCategories_ibfk_1` FOREIGN KEY (`event`) REFERENCES `events` (`name`);

--
-- Contraintes pour la table `RelPreferences`
--
ALTER TABLE `RelPreferences`
  ADD CONSTRAINT `RelPreferences_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`nom`),
  ADD CONSTRAINT `RelPreferences_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `RelSubscribe`
--
ALTER TABLE `RelSubscribe`
  ADD CONSTRAINT `RelSubscribe_ibfk_2` FOREIGN KEY (`event`) REFERENCES `events` (`name`),
  ADD CONSTRAINT `RelSubscribe_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
