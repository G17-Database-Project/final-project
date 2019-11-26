CREATE TABLE album (
	album_ID INTEGER PRIMARY KEY,
	album_name VARCHAR(100),
	release_date DATE,
	album_artist_name VARCHAR(100)
);

CREATE TABLE record_label (
	label_name VARCHAR(100) PRIMARY KEY,
	address VARCHAR(200),
	phone_nubmer CHAR(10),
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