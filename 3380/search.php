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
            <br>
            <input type="text" placeholder="Enter Song Name" name="song_name">
            <button id="btn_search" name="fetch_btn" type="submit">Go</button>
            <br>
            </div>
            
            <div class="innerBox">
            <label>Search for Album</label>
            <br>
            <input type="text" placeholder="Enter Album ID" name="album_id">
            <button id="btn_search" name="album_btn" type="submit">Go</button>
            <br>
            </div>
            
            <div class="innerBox">
            <label>Search for Artists</label>
            <br>
            <input type="text" placeholder="Enter Artist Name" name="artist_name">
            <button id="btn_search" name="artist_btn" type="submit">Go</button>
            </div>
        </form>
        
    </div>
</body>
</html>