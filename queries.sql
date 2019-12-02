
/* queries */

-- find_date_by_location (location is user input)
SELECT tour_name, tour_stop_date
FROM tour_stop
WHERE tour_stop_location = 'Fort Worth, TX';

-- get all songs on album (album ID is user input)
SELECT song_name
FROM song S, album A
WHERE S.album_ID = A.album_ID AND S.album_ID = 1;

-- get all artists from record label (label name is user input)
SELECT artist_name
FROM artist
WHERE label_name = 'Atlantic Records';

-- add song is in the overall add into database and doesn't need its query


-- Searches for song in song table --
    
-- Based on song name
SELECT song_name, album_ID, length, genre
FROM song
WHERE song_name = 'Truth Hurts';

-- Based on genre
SELECT song_name
FROM song
WHERE genre = 'Pop';

-- Based on album
SELECT song_name, album_ID, genre
FROM song
WHERE album_ID = 1;



-- Add song to playlist based on playlist name, song name and album ID

INSERT IGNORE INTO playlist_song 
VALUES ('Vibes Playlist', 
            (
                SELECT song_name
                FROM song
                WHERE song_name = 'Truth Hurts' AND 
                album_ID = (SELECT album_ID
                FROM album
                WHERE album_name = 'Cuz I Love You')
            ),
            (
                SELECT album_ID
                FROM song
                WHERE song_name = 'Truth Hurts' AND 
                album_ID = (SELECT album_ID
                FROM album
                WHERE album_name = 'Cuz I Love You')  
            ) 
       );



-- Find length of a given tour in days

select datediff(
    (SELECT tour_stop_date FROM tour_stop WHERE tour_name = 'Cuz I Love You Too' ORDER BY tour_stop_date DESC LIMIT 1), 
    (SELECT tour_stop_date FROM tour_stop WHERE tour_name = 'Cuz I Love You Too' ORDER BY tour_stop_date ASC LIMIT 1)
);



-- Get all of an artists social media handles

SELECT *
FROM artist_socials
WHERE (
          SELECT IF( 
              EXISTS(
                  SELECT *
                  FROM artist
                  WHERE artist_name = 'Lizzo'
              ), 1, 0
          ) = 1
      )
      AND artist_name = 'Lizzo';
      


-- Search for tour information

SELECT *
FROM tour_stop
INNER JOIN upcoming_tour USING (tour_name)
WHERE tour_name = 'Cuz I Love You Too';

-- Deletes a song from the database

DELETE FROM song
WHERE song_name = 'Truth Hurts';

-- Finds the total time of a given playlist

SELECT playlist_name, SUM(length)
FROM playlist_song P, song S
WHERE P.song_name = S.song_name AND P.album_id = S.album_id
GROUP BY playlist_name;

-- Inserts an empty playlist into the database.

INSERT INTO playlist
VALUES('Noah\'s Playlist', now(), 'Noah Brothers');




























































