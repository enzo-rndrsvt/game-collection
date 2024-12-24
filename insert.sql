
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



INSERT INTO games (name, description, release_date, pc, ps, xbox, switch, image, site) VALUES
('The Legend of Zelda: Breath of the Wild', 'Un jeu d\'aventure en monde ouvert où le joueur incarne Link pour sauver Hyrule.', '2017-03-03', 0, 0, 0, 1, 'https://example.com/zelda.jpg', 'https://zelda.com'),
('The Witcher 3: Wild Hunt', 'Un RPG épique basé sur l\'univers de Geralt de Riv.', '2015-05-19', 1, 1, 1, 1, 'https://example.com/witcher3.jpg', 'https://thewitcher.com'),
('Cyberpunk 2077', 'Un RPG futuriste dans un monde dystopique ouvert.', '2020-12-10', 1, 1, 1, 0, 'https://example.com/cyberpunk.jpg', 'https://cyberpunk.net'),
('Super Mario Odyssey', 'Une aventure captivante de Mario dans différents royaumes.', '2017-10-27', 0, 0, 0, 1, 'https://example.com/mario.jpg', 'https://mario.nintendo.com'),
('Minecraft', 'Un jeu bac à sable où les joueurs peuvent construire et explorer des mondes infinis.', '2011-11-18', 1, 1, 1, 1, 'https://example.com/minecraft.jpg', 'https://minecraft.net'),
('Elden Ring', 'Un jeu d\'action-RPG dans un univers créé par Hidetaka Miyazaki et George R.R. Martin.', '2022-02-25', 1, 1, 1, 0, 'https://example.com/eldenring.jpg', 'https://eldenring.com'),
('Hollow Knight', 'Un jeu d\'action-aventure 2D dans le royaume souterrain de Hallownest.', '2017-02-24', 1, 0, 0, 1, 'https://example.com/hollowknight.jpg', 'https://hollowknight.com'),
('Red Dead Redemption 2', 'Une aventure dans l\'Ouest américain avec un scénario captivant.', '2018-10-26', 1, 1, 1, 0, 'https://example.com/reddead2.jpg', 'https://rockstargames.com/reddeadredemption2'),
('Animal Crossing: New Horizons', 'Un jeu de simulation où le joueur développe une île déserte.', '2020-03-20', 0, 0, 0, 1, 'https://example.com/animalcrossing.jpg', 'https://animal-crossing.com'),
('Halo Infinite', 'Un FPS dans l\'univers de Halo où Master Chief affronte une nouvelle menace.', '2021-12-08', 1, 0, 1, 0, 'https://example.com/haloinfinite.jpg', 'https://halowaypoint.com'),
('Stardew Valley', 'Un simulateur de ferme avec exploration et relations sociales.', '2016-02-26', 1, 1, 1, 1, 'https://example.com/stardewvalley.jpg', 'https://stardewvalley.net'),
('God of War Ragnarok', 'Une suite épique où Kratos et Atreus explorent le Ragnarok.', '2022-11-09', 0, 1, 0, 0, 'https://example.com/gowragnarok.jpg', 'https://godofwar.playstation.com'),
('Fortnite', 'Un jeu de bataille royale populaire avec des modes créatifs.', '2017-07-25', 1, 1, 1, 1, 'https://example.com/fortnite.jpg', 'https://epicgames.com/fortnite'),
('Among Us', 'Un jeu multijoueur où les joueurs doivent découvrir l\'imposteur.', '2018-06-15', 1, 1, 1, 1, 'https://example.com/amongus.jpg', 'https://innersloth.com/among-us'),
('Call of Duty: Modern Warfare II', 'Un FPS dans la série Call of Duty.', '2022-10-28', 1, 1, 1, 0, 'https://example.com/codmw2.jpg', 'https://callofduty.com'),
('Splatoon 3', 'Un jeu de tir compétitif avec des encres colorées.', '2022-09-09', 0, 0, 0, 1, 'https://example.com/splatoon3.jpg', 'https://splatoon.nintendo.com'),
('Genshin Impact', 'Un RPG en monde ouvert avec des éléments d\'action et de gacha.', '2020-09-28', 1, 1, 0, 0, 'https://example.com/genshinimpact.jpg', 'https://genshin.mihoyo.com'),
('Overwatch 2', 'Un jeu de tir multijoueur avec des héros uniques.', '2022-10-04', 1, 1, 1, 0, 'https://example.com/overwatch2.jpg', 'https://playoverwatch.com'),
('Dark Souls III', 'Un RPG d\'action difficile dans un univers sombre et impitoyable.', '2016-03-24', 1, 1, 1, 0, 'https://example.com/darksouls3.jpg', 'https://darksouls3.com'),
('Pokémon Scarlet and Violet', 'Une nouvelle aventure Pokémon en monde ouvert.', '2022-11-18', 0, 0, 0, 1, 'https://example.com/pokemon.jpg', 'https://pokemon.com');
