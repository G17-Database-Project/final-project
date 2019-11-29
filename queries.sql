
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
