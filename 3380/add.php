
<?php
require 'dbconfig/config.php'
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
        <li><a href="search.php">Search</a></li>
        <li><a class="activeClass" href=add.php>Add</a></li>
        <li><a href="delete.php">Delete</a></li>
        <li><a href="modify.php">Modify</a></li>
    </ul>
    </div>
    
    
    <div id="mainBox">
        <h1>Add Here!</h1>
        <form action="add.php" method="post">
            <div class="innerBox">
            <label id="mainLabel">Add Album:  </label>
            <br>
            <label>Name:  </label><input type="text" placeholder="Enter Album Name" name="alb_name" required>
            <br>
            <label>Release Date:  </label><input type="date" placeholder="Enter Release Date" name="alb_release">
            <br>
            <label>Album Artist:  </label><input type="text" placeholder="Enter  Artist Name" name="alb_artist">
            <br>
            
            <button id="btn_add" name="addAlb_btn" type="submit">Go</button>
            <br>
            </div>
            
            <div class="innerBox">
            <label id="mainLabel">Add Artist:  </label>
            <br>
            <label>Name:  </label><input type="text" placeholder="Enter Artist Name" name="art_name" required>
            <br>
            <label>First Release Date:  </label><input type="date" placeholder="Enter First Release Date" name="art_release">
            <br>
            <label>Check this box if artist is a band  </label><input type="checkbox" name="art_isBand"> 
            <br>
            <label>Record Label:  </label><input type="text" placeholder="Enter Record Label Name" name="art_label">
            <br>    
                
            <button id="btn_add" name="addArt_btn" type="submit">Go</button>
            <br>
            </div>
        </form>

        <?php

            // ADD ALBUM
        
            if(isset($_POST['addAlb_btn'])) {
                @$alb_name=$_POST['alb_name'];
                @$alb_release=$_POST['alb_release'];
                @$alb_artist=$_POST['alb_artist'];

                if($alb_name=="" || $alb_release=="" || $alb_artist=="") {
                    echo '<script type="text/javascript">alert("Insert values for all fields")</script>';
                } else {
                    $query = " INSERT INTO album (album_name, release_date, album_artist_name) VALUES ('$alb_name','$alb_release', '$alb_artist')";
                    $query_run=mysqli_query($con,$query) or trigger_error(mysqli_error($con)." ".$query);
                }

            } 


            // ADD ARTIST

            if(isset($_POST['addArt_btn'])) {
                @$art_name=$_POST['art_name'];
                @$art_release=$_POST['art_release'];
                @$art_label=$_POST['art_label'];
                if(isset($_POST['art_isBand'])) {
                    @$solo_flag='FALSE';
                    @$band_flag='TRUE';
                } else {
                    @$solo_flag='TRUE';
                    @$band_flag='FALSE';
                }

                if($art_name=="" || $art_release=="" || $art_label=="") {
                    echo '<script type="text/javascript">alert("Insert values for all fields")</script>';
                } else {
                    $query1 = "INSERT IGNORE INTO record_label (label_name) VALUES ('$art_label')";
                    $query_run=mysqli_query($con,$query1) or trigger_error(mysqli_error($con)." ".$query1);
                    $query2 = "INSERT INTO artist VALUES ('$art_name', '$art_release', $solo_flag, $band_flag, '$art_label')";
                    $query_run=mysqli_query($con,$query2) or trigger_error(mysqli_error($con)." ".$query2);
                    
                }
            }

        ?>
        
    </div>
</body>
</html>
