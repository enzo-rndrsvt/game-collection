CREATE TABLE users
(
    id         INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name  VARCHAR(255) NOT NULL,
    email      VARCHAR(255) NOT NULL,
    password   VARCHAR(255) NOT NULL
);

CREATE TABLE game
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    name         VARCHAR(255) NOT NULL,
    editor       VARCHAR(255) NOT NULL,
    release_date DATE         NOT NULL,
    pc           BOOLEAN      NOT NULL DEFAULT FALSE,
    ps           BOOLEAN      NOT NULL DEFAULT FALSE,
    xbox         BOOLEAN      NOT NULL DEFAULT FALSE,
    switch       BOOLEAN      NOT NULL DEFAULT FALSE,
    image_url    VARCHAR(255) NOT NULL
);

CREATE TABLE library
(
    id          INT PRIMARY KEY AUTO_INCREMENT,
    user_id     INT      NOT NULL,
    game_id     INT      NOT NULL,
    time_played DATETIME NULL COMMENT 'Obligé de mettre un DATETIME plutot qu un TIME à cause des gros porcs qui jouent + de 800h au même jeu',
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (game_id) REFERENCES game (id)
);
