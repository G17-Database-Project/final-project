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
        <li><a href=add.php>Add</a></li>
        <li><a class="activeClass" href="delete.php">Delete</a></li>
        <li><a href="modify.php">Modify</a></li>
    </ul>
    </div>
    
    
    <div id="mainBox">
        <h1>Delete Something!</h1>
        <form action="delete.php" method="post">
            <div class="innerBox">
            <label id="mainLabel">Delete Tour Stop:  </label>
            <br>
            <label>Stop Date:  </label><input type="date"  name="delete_stop" required>
            <br>
            
            <button id="btn_delete" name="deleteStop_btn" type="submit">Delete</button>
            <br>
            </div>
            
            <div class="innerBox">
            <label id="mainLabel">Delete Artist's Facebook:  </label>
            <br>
            <label>Facebook Name:  </label><input type="text" placeholder="Enter Facebook Name" name="delete_fb" required>
            <br>
            <button id="btn_delete" name="deleteFB_btn" type="submit">Delete</button>
            <br>
            </div>
        </form>
        
    </div>
</body>
</html>