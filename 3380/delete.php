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
            <label>Tour Name: </label><input type="text" placeholder="Enter Tour Name" name="delete_stop_tour_name">
            <br>
            <label>Stop Date:  </label><input type="date"  name="delete_stop">
            <br>
            <button id="btn_delete" name="deleteStop_btn" type="submit">Delete</button>
            <br>
            </div>
            
            <div class="innerBox">
            <label id="mainLabel">Delete Artist's Facebook:  </label>
            <br>
            <label>Facebook Name:  </label><input type="text" placeholder="Enter Facebook Name" name="delete_fb">
            <br>
            <button id="btn_delete" name="deleteFB_btn" type="submit">Delete</button>
            <br>
            </div>
        </form>

        <?php
            if(isset($_POST['deleteStop_btn'])) {
                @$delete_stop_tour_name=$_POST['delete_stop_tour_name'];
                @$delete_stop=$_POST['delete_stop'];

                if($delete_stop=="" || $delete_stop_tour_name=="") {
                    echo '<script type="text/javascript">alert("delete_stop: $delete_stop")</script>';
                    echo '<script type="text/javascript">alert("delete_stop_tour_name: $delete_stop_tour_name")</script>';
                } else {
                    $query = " DELETE FROM tour_stop WHERE tour_name = '$delete_stop_tour_name' AND tour_stop_date = '$delete_stop' ";
                    $query_run=mysqli_query($con,$query) or trigger_error(mysqli_error($con)." ".$query);
                }

            } 

            if(isset($_POST['deleteFB_btn'])) {
                @$delete_fb=$_POST['delete_fb'];

                if($delete_fb=="") {
                    echo '<script type="text/javascript">alert("Insert values for delete_fb")</script>';
                } else {
                    $query = " DELETE FROM artist_socials WHERE facebook = '$delete_fb' ";
                    $query_run=mysqli_query($con,$query) or trigger_error(mysqli_error($con)." ".$query);
                }

            } 

        ?>
        
    </div>
</body>
</html>