<!DOCTYPE html>
<html>
<head>
    <title>Modify DB</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="navBar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href=add.php>Add</a></li>
        <li><a href="delete.php">Delete</a></li>
        <li><a class="activeClass" href="modify.php">Modify</a></li>
    </ul>
    </div>
    
    
    <div id="mainBox">
        <h1>Modify Something!</h1>
        <form action="modify.php" method="post">
            <div class="innerBox">
            <label id="mainLabel">Modify a tour stop:  </label>
            <br>
            <label>Current Tour Stop Location:  </label><input type="text"  name="modify_stopOld" required>
            <br>
                
            <label>New Tour Stop Location:  </label><input type="text"  name="modify_stopNew" required>
            <br>
            
            <button id="btn_modify" name="modifyStop_btn" type="submit">Modify</button>
            <br>
            </div>
    
        </form>
        
    </div>
</body>
</html>