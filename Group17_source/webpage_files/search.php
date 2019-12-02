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

        <?php

            $playlist_info = "";

            $playlist_length_query="SELECT playlist_name, SUM(length) length FROM playlist_song P, song S WHERE P.song_name = S.song_name AND P.album_id = S.album_id GROUP BY playlist_name";
            $query_run=mysqli_query($con, $playlist_length_query) or trigger_error(mysqli_error($con)." ".$playlist_length_query);

            if($query_run && mysqli_num_rows($query_run)>0) {
                while($row = mysqli_fetch_assoc($query_run)){

                    // trigger_error($row['playlist_name'].$row['length']);
                    $playlist_info .= "Name: '".$row['playlist_name']."'&nbsp;&nbsp;&nbsp;&nbsp;Length: ".$row['length']." seconds<br/>";

                }
            }

                    



            $song_name = "";
            $album_ID = "";
            $length = "";
            $genre = "";
            $album_results_ID = "";
            $album_results_name = "";
            $album_results_release_date = "";
            $album_results_artist = "";
            $artist_results_name = "";
            $artist_results_first_release_date = "";
            $artist_results_isBand = "";
            $artist_results_label_name = "";


            // Song search
            if(isset($_POST['song_btn'])) {
                @$song_name=$_POST['song_name'];
                @$album_ID=$_POST['album_ID'];
                @$length=$_POST['length'];
                @$genre=$_POST['genre'];

                if($song_name!="") {
                    $query="SELECT * FROM song WHERE song_name='$song_name' ";
                    $query_run=mysqli_query($con,$query) or trigger_error(mysqli_error($con)." ".$query); 
                    if($query_run) {
                        if(mysqli_num_rows($query_run)>0) {
                            $row=mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                            $song_name=$row['song_name'];
                            $album_ID=$row['album_ID'];
                            $length=$row['length'];
                            $genre=$row['genre'];
                        } else {
                            trigger_error(("No results"));
                        }
                    }
                }

            }

            // Album search
            if(isset($_POST['album_btn'])) {
                @$album_name=$_POST['album_name'];

                if($album_name!="") {
                    $query="SELECT * FROM album WHERE album_name='$album_name' ";
                    $query_run=mysqli_query($con, $query) or trigger_error(mysqli_error($con)." ".$query);

                    if($query_run) {
                        if(mysqli_num_rows($query_run)>0) {
                            $row=mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                            //$album_results_name=mysqli_num_rows($query_run);
                            $album_results_ID=$row['album_ID'];
                            $album_results_name=$row['album_name'];
                            $album_results_release_date=$row['release_date'];
                            $album_results_artist=$row['album_artist_name'];

                        } else {
                            $album_results_name="Issue getting results";
                        }
                    }
                }
            }

            // SELECT * FROM artist WHERE artist_name='$artist_name'

            // Artist search
            if(isset($_POST['artist_btn'])) {
                @$artist_name=$_POST['artist_name'];

                if($artist_name!="") {
                    $query="SELECT * FROM artist WHERE artist_name='$artist_name'";
                    $query_run=mysqli_query($con, $query) or trigger_error(mysqli_error($con)." ".$query);

                    if($query_run) {
                        if(mysqli_num_rows($query_run)>0) {
                            $row=mysqli_fetch_array($query_run,MYSQLI_ASSOC);

                            $artist_results_name=$row['artist_name'];
                            $artist_results_first_release_date=$row['first_release_date'];

                            if($row['solo_flag']==0) {
                                $isBand="YES";
                            } else {
                                $isBand="NO";
                            }
                            $artist_results_isBand=$isBand;

                            $artist_results_label_name=$row['label_name'];

                        } else {
                            $artist_results_name="Issue getting results";
                        }
                    }
                }
            }

        ?>

        <form action="search.php" method="post">
            <div class="innerBox">
            <label>Search for Song</label>
            <button id="btn_search" name="song_btn" type="submit">Go</button>
            <br><br>
            <label>Name</label>
            <input type="text" placeholder="Song Name" name="song_name" value="<?php echo $song_name; ?>">
            <br><br>
            <label>Album ID</label>
            <input type="text" placeholder="Album ID" name="album_ID" value="<?php echo $album_ID; ?>">
            <br><br>
            <label>Length(seconds)</label>
            <input type="text" placeholder="Length" name="length" value="<?php echo $length; ?>">
            <br><br>
            <label>Genre</label>
            <input type="text" placeholder="Genre" name="genre" value="<?php echo $genre; ?>">
            </div>
            
            <div class="innerBox">
            <label>Search for Album</label><button id="btn_search" name="album_btn" type="submit">Go</button>
            <br><br>
            <input type="text" placeholder="Enter Album Name" name="album_name">
            <br>
            <label>Results</label>
            <br>
            Album ID:
            <input type="text" name="album_results_ID" placeholder="Result album ID" value="<?php echo $album_results_ID; ?>" readonly><br>
            Album Name:
            <input type="text" name="album_results_name" placeholder="Result album name" value="<?php echo $album_results_name; ?>" readonly><br>
            Release Date:
            <input type="text" name="album_results_release_date" placeholder="Result album release date" value="<?php echo $album_results_release_date; ?>" readonly><br>
            Artist:
            <input type="text" name="album_results_artist" placeholder="Result album artist" value="<?php echo $album_results_artist; ?>" readonly><br>
            </div>

            <div class="innerBox">
            <label>Search for Artist</label><button id="btn_search" name="artist_btn" type="submit">Go</button>
            <br><br>
            <input type="text" placeholder="Enter Artist Name" name="artist_name">
            <br>
            <label>Results</label>
            <br>
            Artist Name:
            <input type="text" name="artist_results_name" placeholder="Result artist name" value="<?php echo $artist_results_name; ?>" readonly><br>
            First Release Date:
            <input type="text" name="artist_results_first_release_date" placeholder="Result artist first release date" value="<?php echo $artist_results_first_release_date; ?>" readonly><br>
            Is artist a band?
            <input type="text" name="artist_results_isBand" placeholder="'YES' if band, 'NO' if solo" value="<?php echo $artist_results_isBand; ?>" readonly><br>
            Label:
            <input type="text" name="artist_results_label_name" placeholder="Result artist label" value="<?php echo $artist_results_label_name; ?>" readonly><br>
            </div>
            
        </form>

        
        
        <button id = "playlist_btn" onclick="showPlaylist()">Click to toggle playlist info</button>
        <br>  
        <p id="showPlay"></p>
        <br>
    </div>
    
    <script>
        function showPlaylist() {
            var playlistInfo = <?php echo json_encode($playlist_info); ?>;
            //do this to replace the html of the ID
            if(document.getElementById("showPlay").innerHTML=="") {
                document.getElementById("showPlay").innerHTML = "Playlists:<br/>".concat(playlistInfo);
            } else {
                document.getElementById("showPlay").innerHTML = "";
            }
        }
    
    </script>
</body>
</html>