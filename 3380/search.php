<?php
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search DB</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="navBar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a class = "activeClass" href="search.php">Search</a></li>
        <li><a href=add.php>Add</a></li>
        <li><a href="delete.php">Delete</a></li>
        <li><a href="modify.php">Modify</a></li>
    </ul>
    </div>
    
    <div id="mainBox">
        <h1>Search here!</h1>
        <form action="search.php" method="post">
            <div class="innerBox">
            <label>Search for Song</label>
            <button id="btn_search" name="fetch_btn" type="submit">Go</button>
            <br><br>
            <input type="text" placeholder="Song Name" name="song_name">
            <br><br>
            <input type="text" placeholder="Album ID" name="album_id">
            <br><br>
            <input type="text" placeholder="Length" name="length">
            <br><br>
            <input type="text" placeholder="Genre" name="genre">
            </div>
            
            <div class="innerBox">
            <label>Search for Album</label>
            <br>
            <input type="text" placeholder="Enter Album ID" name="album_id">
            <button id="btn_search" name="album_btn" type="submit">Go</button>
            <br>
            <input hidden type="text" name="albumResults" value="Results: " readonly><br>
            </div>
            
            <div class="innerBox">
            <label>Search for Artists</label>
            <br>
            <input type="text" placeholder="Enter Artist Name" name="artist_name">
            <button id="btn_search" name="artist_btn" type="submit">Go</button>
            <br>  
            <input hidden type="text" name="artResults" value="Results: " readonly><br>
            </div>
            
        </form>
        
        <button id = "playlist_btn" onclick="showPlaylist()">Click here to view Playlists</button>
        <br>  
        <p id="showPlay"></p>
        <br>
    </div>
    
    <script>
        function showPlaylist() {
            //do this to replace the html of the ID
            if(document.getElementById("showPlay").innerHTML=="") {
                document.getElementById("showPlay").innerHTML = "Playlists:<br>";
            } else {
                document.getElementById("showPlay").innerHTML = "";
            }
        }
    
    </script>
</body>
</html>