<?php
require 'dbconfig/config.php'
?>
<!DOCTYPE html>
<html>
<head>
    <title>CS3380 Music DB</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="navBar">
    <ul>
        <li><a class = "activeClass" href="index.php">Home</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href=add.php>Add</a></li>
        <li><a href="delete.php">Delete</a></li>
        <li><a href="modify.php">Modify</a></li>
    </ul>
    </div>
    
    <div id="mainBox">
        <img src="soundSQL.png">
        <h2>Welcome to soundSQL!</h2>
        <p>This is the final project for Fall 2019 CS3380 by Noah Brothers, Kevin Bowers, and Rebecca Shyu.</p>
        <br>
        
        <p>User Manual: This is for end-users who may not have database knowledge. Describe
precisely how to use your system step by step with screenshots of your system interface and
sample outputs.<br><br>

-- straight-up SQL<br><br>

    To maintain the database, values can be inserted, modified, and deleted from the database using a variety of SQL commands and functions. To insert a value into a given table, one can use the INSERT INTO SQL command, with the VALUES being those specified. This should be done in the create_and_insert.sql file. An example of inserting the values for Lizzo as an artist is shown in the screenshots.<br><br>


    To find the date of a tour given the location, the user will first input a location. Then, the query to find the date of a tour is executed. The tour name and tour stop date for all tours with the given location are then retrieved.<br><br>

    To get all of the songs on a given album, the user will need to know the album ID. They will input this. The query will then execute, and the output returned will be all of the songs on the album with this album ID.<br><br>

    To get all artists who are signed to a record label, the user will need to know the name of the record label. They will input this record label name, the query will execute, and it will return all artists who are signed to this record label.<br><br>

    To search for a given song, the user only needs to know the name of the song. They will input this, and the query will execute. The information that will be output will include the song name, its album ID in the database, its length, and the genre. If the user wants to search for a song of a given genre, they just need to input the given genre and all songs in that genre will be returned as the output. To search by album, the user will need to know the album ID. They will input this, and it will be output alongside the song names on the album and the genre.<br><br>

    To insert a song into a given playlist, the user will need to know the name of the playlist they are trying to insert into, the name of the song, and its album ID. The user will input all 3 of these values, and the database will first search for all songs with the given name. Then, it will search for songs of that name whose album ID is the one input. If found, the song will be inserted into the playlist.<br><br>

    To find the length in days between two tour dates, both tour dates need to be input by the user. The datediff function is then used to find the difference in days between these two dates. The output is this difference.<br><br>

    To obtain all of the social media accounts of a given artist, the user will need to input the artist’s name. If the artist with an input name exists in the database, the database will return their Instagram, Twitter, and Facebook handles in that order. Otherwise, nothing will be returned.<br><br>

    To delete a song from the database, the user just needs to input the name of a song that already exists. The database will then delete all songs with the given name.<br><br>

To create an empty playlist, the INSERT INTO command must be used. The user needs only provide the name of a new playlist, as well as their name, and the time it was created will automatically be generated using the now() function. </p>
        
    </div>
</body>
</html>