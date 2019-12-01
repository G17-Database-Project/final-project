<!DOCTYPE html>
<html>
<head>
    <title>Search DB</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="inner_container">
            <form action="search.php" method="post">
                <label><b>Song Name</b> </label> <button id="btn_go" name="fetch_btn" type="submit">Go</button>
                
                <input type="text" placeholder="Enter Song Name" name="song_name">
                <label><b>Album</b> </label>
                <input type="number" placeholder="Enter Album ID" name="album_ID">
                <label><b>Length</b> </label>
                <input type="number" placeholder="Enter song length in seconds" name="length">
                <label><b>Genre</b> </label>
                <input type="text" placeholder="Enter genre" name="genre">
                
                <center>
                    <button id="btn_insert" name="insert_btn" type="submit">Insert</button>
                    <button id="btn_update" name="update_btn" type="submit">Update</button>
                    <button id="btn_delete" name="delete_btn" type="submit">Delete</button>
                </center>
            </form>
            
            <?php
            
                if(isset($_POST['fetch_btn'])) {
                    echo '<script type="text/javascript">alert("PHP is working")</script>';
                }
            
            ?>
        </div>
</body>
</html>