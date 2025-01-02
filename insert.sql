
-- Ajout de comptes avec comme mot de passe : motdepasse
INSERT INTO users (first_name, last_name, email, password) VALUES
('John', 'Doe', 'john.doe1@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Jane', 'Smith', 'jane.smith2@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Robert', 'Johnson', 'robert.johnson3@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Emily', 'Davis', 'emily.davis4@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Michael', 'Brown', 'michael.brown5@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Sarah', 'Jones', 'sarah.jones6@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('David', 'Garcia', 'david.garcia7@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Laura', 'Martinez', 'laura.martinez8@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Daniel', 'Rodriguez', 'daniel.rodriguez9@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Emma', 'Hernandez', 'emma.hernandez10@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('James', 'Lopez', 'james.lopez11@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Olivia', 'Gonzalez', 'olivia.gonzalez12@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Christopher', 'Wilson', 'christopher.wilson13@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Sophia', 'Anderson', 'sophia.anderson14@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Matthew', 'Thomas', 'matthew.thomas15@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Isabella', 'Taylor', 'isabella.taylor16@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Joshua', 'Moore', 'joshua.moore17@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Ava', 'Jackson', 'ava.jackson18@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Andrew', 'Martin', 'andrew.martin19@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Mia', 'White', 'mia.white20@mail.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm'),
('Enzo', 'RYNDERS--VITU', 'enzo.ryndersvitu@yahoo.com', '$2y$10$aXtUbT/HTcgBiMOtgeEn/.4dpycaHRPjEIX9jdDQaTnqYepQ7oMYm');


INSERT INTO games (name, editor, description, release_date, pc, ps, xbox, switch, image, site) VALUES
('The Legend of Zelda: Breath of the Wild', 'Nintendo', 'Un jeu d\'aventure en monde ouvert où le joueur incarne Link pour sauver Hyrule.', '2017-03-03', 0, 0, 0, 1, 'https://www.zelda.com/breath-of-the-wild/assets/icons/BOTW-Share_icon.jpg', 'https://zelda.com'),
('The Witcher 3: Wild Hunt', 'CD Projekt Red', 'Un RPG épique basé sur l\'univers de Geralt de Riv.', '2015-05-19', 1, 1, 1, 1, 'https://store-images.s-microsoft.com/image/apps.46303.69531514236615003.534d4f71-03cb-4592-929a-b00a7de28b58.abbf704e-3676-4fb7-9f68-f4425de5df24?q=90&w=480&h=270', 'https://thewitcher.com'),
('Cyberpunk 2077', 'CD Projekt Red', 'Un RPG futuriste dans un monde dystopique ouvert.', '2020-12-10', 1, 1, 1, 0, 'https://static.cdprojektred.com/cms.cdprojektred.com/16x9_big/12aaa3b137a18e180bb92682e8f81674dcb7451f-1920x1080.jpg', 'https://cyberpunk.net'),
('Super Mario Odyssey', 'Nintendo', 'Une aventure captivante de Mario dans différents royaumes.', '2017-10-27', 0, 0, 0, 1, 'https://www.nintendo.com/eu/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_SuperMarioOdyssey_image1600w.jpg', 'https://mario.nintendo.com'),
('Minecraft', 'Mojang Studios', 'Un jeu bac à sable où les joueurs peuvent construire et explorer des mondes infinis.', '2011-11-18', 1, 1, 1, 1, 'https://image.api.playstation.com/vulcan/ap/rnd/202407/0401/670c294ded3baf4fa11068db2ec6758c63f7daeb266a35a1.png', 'https://minecraft.net'),
('Elden Ring', 'Bandai Namco Entertainment', 'Un jeu d\'action-RPG dans un univers créé par Hidetaka Miyazaki et George R.R. Martin.', '2022-02-25', 1, 1, 1, 0, 'https://image.api.playstation.com/vulcan/ap/rnd/202107/1612/esnQejHW2fLjVn3QsqMORML0.png', 'https://eldenring.com'),
('Hollow Knight', 'Team Cherry', 'Un jeu d\'action-aventure 2D dans le royaume souterrain de Hallownest.', '2017-02-24', 1, 0, 0, 1, 'https://images.squarespace-cdn.com/content/v1/606d159a953867291018f801/1619987722169-VV6ZASHHZNRBJW9X0PLK/Key_Art_02_layeredjpg.jpg?format=1500w', 'https://hollowknight.com'),
('Red Dead Redemption 2', 'Rockstar Games', 'Une aventure dans l\'Ouest américain avec un scénario captivant.', '2018-10-26', 1, 1, 1, 0, 'https://store-images.s-microsoft.com/image/apps.58752.13942869738016799.078aba97-2f28-440f-97b6-b852e1af307a.95fdf1a1-efd6-4938-8100-8abae91695d6?q=90&w=480&h=270', 'https://rockstargames.com/reddeadredemption2'),
('Animal Crossing: New Horizons', 'Nintendo', 'Un jeu de simulation où le joueur développe une île déserte.', '2020-03-20', 0, 0, 0, 1, 'https://animalcrossingworld.com/wp-content/uploads/2020/01/animal-crossing-new-horizons-key-artwork-january-2020-large-logo.png', 'https://animal-crossing.com'),
('Halo Infinite', '343 Industries', 'Un FPS dans l\'univers de Halo où Master Chief affronte une nouvelle menace.', '2021-12-08', 1, 0, 1, 0, 'https://image.jeuxvideo.com/medias/159542/1595423317-2836-jaquette-avant.png', 'https://halowaypoint.com'),
('Stardew Valley', 'ConcernedApe', 'Un simulateur de ferme avec exploration et relations sociales.', '2016-02-26', 1, 1, 1, 1, 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/413150/capsule_616x353.jpg?t=1711128146', 'https://stardewvalley.net'),
('God of War Ragnarok', 'Santa Monica Studio', 'Une suite épique où Kratos et Atreus explorent le Ragnarok.', '2022-11-09', 0, 1, 0, 0, 'https://image.api.playstation.com/vulcan/ap/rnd/202109/2821/LK1BOGkl8D9asemyQTPNAp69.jpg', 'https://godofwar.playstation.com'),
('Fortnite', 'Epic Games', 'Un jeu de bataille royale populaire avec des modes créatifs.', '2017-07-25', 1, 1, 1, 1, 'https://cdn2.unrealengine.com/fortnite-battle-royale-chapter-2-remix-thumbnail-576x576-e1eee636a610.jpg', 'https://epicgames.com/fortnite'),
('Among Us', 'Innersloth', 'Un jeu multijoueur où les joueurs doivent découvrir l\'imposteur.', '2018-06-15', 1, 1, 1, 1, 'https://cdn1.epicgames.com/salesEvent/salesEvent/amoguslandscape_2560x1440-3fac17e8bb45d81ec9b2c24655758075', 'https://innersloth.com/among-us'),
('Call of Duty: Modern Warfare II', 'Activision', 'Un FPS dans la série Call of Duty.', '2022-10-28', 1, 1, 1, 0, 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/1962660/capsule_616x353.jpg?t=1710969334', 'https://callofduty.com'),
('Splatoon 3', 'Nintendo', 'Un jeu de tir compétitif avec des encres colorées.', '2022-09-09', 0, 0, 0, 1, 'https://www.nintendo.com/eu/media/images/08_content_images/games_6/nintendo_switch_7/nswitch_splatoon3/Splatoon3_Overview_SquadUp_Scr_01.jpg', 'https://splatoon.nintendo.com'),
('Genshin Impact', 'miHoYo', 'Un RPG en monde ouvert avec des éléments d\'action et de gacha.', '2020-09-28', 1, 1, 0, 0, 'https://cdn1.epicgames.com/offer/879b0d8776ab46a59a129983ba78f0ce/genshintall_1200x1600-4a5697be3925e8cb1f59725a9830cafc', 'https://genshin.mihoyo.com'),
('Overwatch 2', 'Blizzard Entertainment', 'Un jeu de tir multijoueur avec des héros uniques.', '2022-10-04', 1, 1, 1, 0, 'https://blz-contentstack-images.akamaized.net/v3/assets/blt2477dcaf4ebd440c/bltdabc3782553659f1/650cc84db1e5551677dcd71d/ow2_xboxshowcase_static_7.png?format=webply&quality=90', 'https://playoverwatch.com'),
('Dark Souls III', 'FromSoftware', 'Un RPG d\'action difficile dans un univers sombre et impitoyable.', '2016-03-24', 1, 1, 1, 0, 'https://static.bandainamcoent.eu/high/dark-souls/dark-souls-3/00-page-setup/ds3_game-thumbnail.jpg', 'https://darksouls3.com'),
('Pokémon Scarlet and Violet', 'Nintendo', 'Une nouvelle aventure Pokémon en monde ouvert.', '2022-11-18', 0, 0, 0, 1, 'https://scarletviolet.pokemon.com/_images/home/header.jpg', 'https://pokemon.com');


INSERT INTO library (user_id, game_id, time_played) VALUES
(21, 1, '10'),
(21, 2, '15'),
(21, 3, '20'),
(21, 4, '25'),
(21, 5, '30'),
(21, 6, '122'),
(21, 7, '18'),
(21, 8, '22'),
(21, 9, '140'),
(21, 10, '138');