
CREATE TABLE months (id INTEGER PRIMARY KEY AUTO_INCREMENT, month TEXT, number_of_days INTEGER, season TEXT);

INSERT INTO months (month, number_of_days, season) VALUES ("January", 31, "Winter");
INSERT INTO months (month, number_of_days, season) VALUES ("February", 28, "Winter");
INSERT INTO months (month, number_of_days, season) VALUES ("March", 31, "Spring");
INSERT INTO months (month, number_of_days, season) VALUES ("April", 30, "Spring");
INSERT INTO months (month, number_of_days, season) VALUES ("May", 31, "Spring");
INSERT INTO months (month, number_of_days, season) VALUES ("June", 30, "Summer");
INSERT INTO months (month, number_of_days, season) VALUES ("July", 31, "Summer");
INSERT INTO months (month, number_of_days, season) VALUES ("August", 31, "Summer");
INSERT INTO months (month, number_of_days, season) VALUES ("September", 30, "Fall");
INSERT INTO months (month, number_of_days, season) VALUES ("October", 31, "Fall");
INSERT INTO months (month, number_of_days, season) VALUES ("November", 30, "Fall");
INSERT INTO months (month, number_of_days, season) VALUES ("December", 31, "Winter");

CREATE TABLE users (ID INTEGER PRIMARY KEY AUTO_INCREMENT, username TEXT, password TEXT);

INSERT INTO users (username, password) VALUES ("YuraT", "password");
INSERT INTO users (username, password) VALUES ("WhizKidz", "whizkidz!");

CREATE TABLE notes (ID INTEGER PRIMARY KEY AUTO_INCREMENT, user_ID INTEGER, notes_text TEXT);

INSERT INTO notes (user_ID, notes_text) VALUES (1, "note1");
INSERT INTO notes (user_ID, notes_text) VALUES (1, "note444444");
INSERT INTO notes (user_ID, notes_text) VALUES (1, "note3");

INSERT INTO notes (user_ID, notes_text) VALUES (2, "whizkidzNote1");
INSERT INTO notes (user_ID, notes_text) VALUES (2, "note for whizkidz");
INSERT INTO notes (user_ID, notes_text) VALUES (2, "whizkidz last note");