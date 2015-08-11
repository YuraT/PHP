DROP TABLE months;

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