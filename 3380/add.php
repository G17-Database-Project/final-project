
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
            <label>Solo:  </label><input type="checkbox" placeholder="Solo" name="art_solo"> 
            <br>
            <label>Band:  </label>
            <input type="checkbox" placeholder="Band" name="art_band">
            <br>
            <label>Record Label:  </label><input type="text" placeholder="Enter Record Label Name" name="art_label">
            <br>    
                
            <button id="btn_add" name="addArt_btn" type="submit">Go</button>
            <br>
            </div>
        </form>
        
    </div>
</body>
</html>
>>>>>>> 8164d0279aa29b6633aef8092bbc01167cd9d29a
