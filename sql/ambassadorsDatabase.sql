create database ambassadors;

use ambassadors;


/* Creates the Seasons table */
create table Seasons (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
seasonNumber INT UNSIGNED NOT NULL,
startDate DATE NOT NULL,
endDate DATE NOT NULL,
weight INT UNSIGNED NOT NULL
);

/* Creates the Championships table */
create table Championships (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
edition VARCHAR(255),
year YEAR NOT NULL,
weight INT UNSIGNED NOT NULL
);

/* Creates the championshipSeason table */
create table championshipSeason	(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
championshipID INT UNSIGNED NOT NULL,
seasonID int UNSIGNED NOT NULL,
FOREIGN KEY(championshipID) REFERENCES Championships(id),
FOREIGN KEY(seasonID) REFERENCES Seasons(id)
);

/* INSERT queries for seasons */
INSERT INTO seasons VALUES (
null,
1,
'2018-05-01',
'2019-05-01',
2
);

INSERT INTO seasons VALUES (
null,
2,
'2019-05-01',
'2020-05-01',
3
);

INSERT INTO seasons VALUES (
null,
3,
'2020-05-01',
'2021-05-01',
4
);


/* INSERT queries for championships */
INSERT INTO championships VALUES    (
null,
'IBJJF Worlds',
'Adults',
'2018',
7);

INSERT INTO championships VALUES    (
null,
'IBJJF Worlds',
'Master',
'2018',
7);

INSERT INTO championships VALUES    (
null,
'IBJJF Pans',
null,
'2019',
6);

INSERT INTO championships VALUES    (
null,
'IBJJF Europeans',
null,
'2019',
6);

INSERT INTO championships VALUES    (
null,
'IBJJF Brazilian Nationals',
null,
'2018',
6);

INSERT INTO championships VALUES    (
null,
'UAE World Pro',
null,
'2019',
6);

INSERT INTO championships VALUES    (
null,
'UAE World Slam',
null,
'2018',
5);

INSERT INTO championships VALUES    (
null,
'UAE World Slam',
null,
'2019',
5);

INSERT INTO championships VALUES    (
null,
'GB COMPNET Summer Cup',
null,
'2018',
5);

INSERT INTO championships VALUES    (
null,
'GB COMPNET Copa Master Carlos Gracie Sr',
null,
'2018',
5);

INSERT INTO championships VALUES    (
null,
'GB COMPNET Mitsuyo Maeda I',
null,
'2018',
5);

INSERT INTO championships VALUES    (
null,
'IBJJF American Nationals',
null,
'2018',
5);


/* INSERT queries for championshipSeason */
/*World Adults SeasonI 2018 */
INSERT INTO championshipSeason VALUES   (
null,
1,
1);

/*World Master SeasonI 2018 */
INSERT INTO championshipSeason VALUES   (
null,
2,
1);

/*IBJFF Pans SeasonI 2019 */
INSERT INTO championshipSeason VALUES   (
null,
3,
1);

/*IBJFF Europeans SeasonI 2019 */
INSERT INTO championshipSeason VALUES   (
null,
4,
1);

/*IBJFF Brazilian Nationals SeasonI 2018 */
INSERT INTO championshipSeason VALUES   (
null,
5,
1);

/*UAE Grand Pro SeasonI 2019 */
INSERT INTO championshipSeason VALUES   (
null,
6,
1);

/*UAE Grand Slam SeasonI 2018 */
INSERT INTO championshipSeason VALUES   (
null,
7,
1);

/*UAE Grand Slam SeasonI 2019 */
INSERT INTO championshipSeason VALUES   (
null,
8,
1);

/*COMPNET Summer Cup SeasonI 2019 */
INSERT INTO championshipSeason VALUES   (
null,
9,
1);

/*COMPNET Copa Carlos Gracie SR SeasonI 2019 */
INSERT INTO championshipSeason VALUES   (
null,
10,
1);

/*COMPNET Mitsuyo Maeda I SeasonI 2019 */
INSERT INTO championshipSeason VALUES   (
null,
11,
1);


/*IBJJF American Nationals SeasonI 2019 */
INSERT INTO championshipSeason VALUES   (
null,
12,
1);



