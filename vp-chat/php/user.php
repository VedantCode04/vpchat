<?php 
    session_start();

    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
    $result = "";
    if(mysqli_num_rows($sql) == 0){
        $result = "no users available";
    } elseif (mysqli_num_rows($sql) > 0) {
        include "data.php";
    }

    echo $result;
?>
