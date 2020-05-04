-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 04 mai 2020 à 14:05
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `BDD_Jean_forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `publication` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id`, `titre`, `contenu`, `date_creation`, `publication`) VALUES
(1, 'Alaska chapitre 1', 'On passe sa vie coincé dans le labyrinthe à essayer de trouver le moyen d\'en sortir, en se régalant à l\'avance à cette perspective. Et rêver l\'avenir permet de continuer, sauf qu\'on ne passe jamais à la réalisation. On se sert de l\'avenir pour échapper au présent.Alors je suis retourné dans ma chambre et je me suis écroulé sur mon lit, en me disant que si les gens étaient de la pluie, j\'étais de la bruine et elle, un ouragan.', '2020-04-28 09:21:28', 0),
(2, 'Alaska chapitre 2', 'Tentative en 1931 par Hubert Wilkins ,citoyen australien.Il part à l\'aventure avec un sous marin réformé de la première guerre mondiale, loué symbolquement 1 dollar l\'année par les Etats Unis.   Il part le 4 Juin 1931.Lors de la traversée en direction de l\'Angleterre, les moteurs tombent en panne.Après avoir dérivés; ils sont secourus par un navire militaire américain qui remorque le sous marin jusqu\'à Plymouth. Après sa réparation, il repart vers la Suède. De nouveau, il passe un mois en cale sèche. Un officier de la marine suédoise, après une inspection, le déclara non conforme pour l\'armée suédoise. Il appareille ensuite vers le spitzberg et la banquise. Une inspection de la coque avant la plongée, montre que les gouvernes de plongée ont disparues. Les conditions sont dures, le sous marin n\'est pas équipé de chauffage.', '2020-04-15 15:31:07', 0),
(3, 'Alaska chapitre 3', 'Après avoir été des territoires des États-Unis pendant plusieurs décennies, l’Alaska et Hawaii obtiennent le statut d’État en 1959, respectivement le 3 janvier et le 21août. Cette intégration fait suite à plusieurs demandes et à des référendums qui ont permis de mesurer l’intérêt des Alaskains et des Hawaiiens pour une adhésion aux États-Unis.\r\n\r\nLes États-Unis obtiennent l’Alaska de la Russie en 1867 pour 7,2 millions de dollars. Elle devient un territoire américain en 1912, sans pour autant avoir le statut d’État. Les îles Hawaii sont pour leur part un protectorat des États-Unis en 1894, avant de devenir elles aussi un territoire. La présence de bases militaires américaines contribue à leur intérêt stratégique pour le gouvernement des États-Unis, surtout à partir de la Seconde Guerre mondiale et de la guerre froide. Pearl Harbor, par exemple, est située sur l’île d’Oahu, à Hawaii. L’Alaska possède aussi d’importantes ressources naturelles. En octobre 1946, un référendum consultatif indique que les Alaskains seraient intéressés à joindre les 48 États américains. Hawaii tient un exercice semblable le 27 juin 1959, avec des résultats comparables. À Washington, les réticences à une telle adhésion diminuent graduellement. Dès son élection, en 1952, le président Dwight Eisenhower avait fait savoir qu’il la souhaitait. Le fait qu’Hawaii soit considérée comme favorable aux républicains et l’Alaska davantage aux démocrates facilite l’obtention d’appuis des deux côtés de la Chambre des représentants et du Sénat. Des votes tenus en 1959 ouvrent la porte à l’adhésion qui est rendue officielle en 1959, soit le 3 janvier (Alaska) et le 21 août (Hawaii). L’Alaska devient le plus grand État américain en dimension, mais avec une faible densité de population. Hawaii est pour sa part le seul État insulaire des États-Unis qui comptent maintenant 50 États. Il s’agit du premier ajout d’États au pays de l’Oncle Sam depuis ceux du Nouveau-Mexique et de l’Arizona, en 1912. En conséquence, le drapeau américain légèrement modifié, avec maintenant 50 étoiles, sera officiellement adopté le 4 juillet 1960.', '2020-04-16 15:31:07', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `contenu_commentaire` text NOT NULL,
  `signaler` tinyint(1) NOT NULL DEFAULT '0',
  `date_commentaire` datetime NOT NULL,
  `id_chapitre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `contenu_commentaire`, `signaler`, `date_commentaire`, `id_chapitre`) VALUES
(1, 'Pat', 'Tres joli blog, vivement le prochain chapitre.', 0, '2020-04-13 09:34:18', 1),
(2, 'GOD', 'Ma creation(l\'Alaska), je ne suis pas peux fière.', 0, '2020-04-15 15:30:01', 1),
(3, 'Voyageur des lettres', 'Très joli roman, il me tarde de lire la suite.', 0, '2020-04-15 15:33:54', 2),
(4, 'Alaski-fan', 'Il me tarde de partir skier la-bas!', 0, '2020-04-15 15:33:54', 3),
(5, 'jp', 'joli blog', 1, '2020-04-28 15:17:37', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mot_passe` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `utilisateur_role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `mot_passe`, `email`, `utilisateur_role`) VALUES
(1, 'JForteroche', '$2y$10$7xG9GEnRz6qyYp0TppBANOVysFL/Rab1zhDhwympfaEO.WAx3xhNW', 'jf@jf.fr', 'SUPER_ADMIN'),
(2, 'jp', '$2y$10$GYhJVegkSD2zyYp6sVvyi.GSbt2YySVLNr1YZLeiKqMqlBj163DvS', 'jp@jpl.fr', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chapitre_commentaire` (`id_chapitre`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `unique_username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_chapitre_commentaire` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
