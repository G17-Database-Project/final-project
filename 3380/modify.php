<?php
require 'dbconfig/config.php'
?>
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

            <label>Tour Name: </label><input type="text" placeholder="Enter Tour Name" name="tour_stop_for_location_change">
            <br>

            <label>Current Tour Stop Location:  </label><input type="text"  name="modify_stopOld">
            <br>
                
            <label>New Tour Stop Location:  </label><input type="text"  name="modify_stopNew">
            <br>
            
            <button id="btn_modify" name="modifyStop_btn" type="submit">Modify</button>
            <br>
            </div>
    
        </form>

        <?php
            if(isset($_POST['modifyStop_btn'])) {
                @$tour_stop_for_location_change=$_POST['tour_stop_for_location_change'];
                @$modify_stopOld=$_POST['modify_stopOld'];
                @$modify_stopNew=$_POST['modify_stopNew'];

                if($tour_stop_for_location_change=="" || $modify_stopOld=="" || $modify_stopNew=="") {
                    echo '<script type="text/javascript">alert("Insert values for all fields")</script>';
                } else {
                    $query = " UPDATE tour_stop SET tour_stop_location = '$modify_stopNew' WHERE tour_name = '$tour_stop_for_location_change' AND tour_stop_location = '$modify_stopOld'";
                    $query_run=mysqli_query($con,$query) or trigger_error(mysqli_error($con)." ".$query);
                }

            } 
        ?>
        
    </div>
</body>
</html>