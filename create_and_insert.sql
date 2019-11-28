CREATE TABLE album (
	album_ID INTEGER PRIMARY KEY,
	album_name VARCHAR(100),
	release_date DATE,
	album_artist_name VARCHAR(100)
);

CREATE TABLE record_label (
	label_name VARCHAR(100) PRIMARY KEY,
	address VARCHAR(200),
	phone_number CHAR(10),
	ceo VARCHAR(100)
);



CREATE TABLE artist (
	artist_name VARCHAR(100) PRIMARY KEY,
	first_release_date DATE,
	solo_flag boolean,
	band_flag boolean,
	label_name VARCHAR(100),
	FOREIGN KEY (label_name) REFERENCES record_label(label_name)
);



CREATE TABLE artist_socials (
	artist_name VARCHAR(100),
	instagram VARCHAR(50),
	twitter VARCHAR(50),
	facebook VARCHAR(100),
	PRIMARY KEY (artist_name, instagram, twitter, facebook),
	FOREIGN KEY (artist_name) REFERENCES artist(artist_name)
);



CREATE TABLE upcoming_tour (
	tour_name VARCHAR(200) PRIMARY KEY
);



CREATE TABLE tour_stop (
	tour_name VARCHAR(200),
	tour_stop_date DATE,
	tour_stop_location VARCHAR(100),
	PRIMARY KEY (tour_name, tour_stop_date, tour_stop_location)
);




CREATE TABLE song (
	song_name VARCHAR(100),
	album_ID INTEGER,
	length INTEGER,
	genre VARCHAR(50),
	PRIMARY KEY (song_name, album_ID),
	FOREIGN KEY (album_ID) REFERENCES album(album_ID)
);



CREATE TABLE playlist (
	playlist_name VARCHAR(100) PRIMARY KEY,
	date_created DATE,
	creator_name VARCHAR(100)
);



CREATE TABLE playlist_song (
	playlist_name VARCHAR(100),
	song_name VARCHAR(100),
	album_ID INTEGER,
	PRIMARY KEY (playlist_name, song_name, album_ID),
	FOREIGN KEY (playlist_name) REFERENCES playlist(playlist_name),
	FOREIGN KEY (song_name) REFERENCES song(song_name),
	FOREIGN KEY (album_ID) REFERENCES album(album_ID)
);

/*insert data*/

-- inserting into album
INSERT INTO album Values (1, 'Cuz I Love You','2019-04-19', 'Lizzo');

-- inserting into record label
INSERT INTO record_label Values ('Atlantic Records', '1633 Broadway, New York, NY 10019', '212-707-2000', 'Craig Kallman');

-- inserting into artist
INSERT INTO artist Values ('Lizzo', '2013-10-15', TRUE, FALSE, 'Atlantic Records');

-- inserting into artist socials
INSERT INTO artist_socials Values ('Lizzo', 'lizzobeeating', 'lizzo', 'Lizzo');

-- inserting into upcoming tour 
INSERT INTO upcoming_tour Values ('Cuz I Love You Too');

-- inserting into tour stop
INSERT INTO tour_stop Values ('Cuz I Love You Too', '2019-11-30', 'Nashville, TN');

INSERT INTO tour_stop Values ('Cuz I Love You Too', '2019-12-01', 'Tampa, FL');

INSERT INTO tour_stop Values ('Cuz I Love You Too', '2019-12-03', 'Fort Worth, TX');

INSERT INTO tour_stop Values ('Cuz I Love You Too', '2019-12-05', 'San Jose, CA');

INSERT INTO tour_stop Values ('Cuz I Love You Too', '2019-12-06', 'Inglewood, CA');

INSERT INTO tour_stop Values ('Cuz I Love You Too', '2019-12-10', 'Indianapolis, IN');

-- inserting into song
INSERT INTO song Values ('Cuz I Love You', 1, 180, 'Pop');

INSERT INTO song Values ('Juice', 1, 195, 'Pop');

INSERT INTO song Values ('Tempo', 1, 175, 'Pop');

INSERT INTO song Values ('Truth Hurts', 1, 173, 'Pop');


/* deleting from databases */

DELETE FROM tour_stop WHERE tour_stop_date = '2019-12-06';

DELETE FROM artist_socials WHERE facebook = 'Lizzo';

/* modify database */

UPDATE tour_stop 
    SET tour_stop_location = 'Columbia, MO'
    WHERE tour_stop_location = 'Nashville, TN' IN (SELECT tour_stop_location
                                                   FROM tour_stop
                                                   WHERE tour_name = 'Cuz I Love You Too');
    
UPDATE artist_socials
    SET instagram = 'lizzo'
    WHERE instagram = 'lizzobeeating';

/* queries */

-- find_date_by_location (location is user input)
SELECT tour_name, tour_stop_date
FROM tour_stop
WHERE tour_stop_location = 'Fort Worth, TX';

-- get all songs on album (album ID is user input)
SELECT song_name
FROM song S, album A
WHERE S.album_ID = A.album_ID AND album_ID = 1;

-- get all artists from record label (label name is user input)
SELECT artist_name
FROM artist
WHERE label_name = 'Atlantic Records';

-- add song is in the overall add into database



