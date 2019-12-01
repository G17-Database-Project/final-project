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
        
        <p>Click any of the tabs to search, add, delete, and modify!</p>
        
    </div>
</body>
</html>