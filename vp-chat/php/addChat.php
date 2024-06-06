<?php 
    session_start();

    include_once "config.php";
    require_once "encrypt.php";
    if(isset($_SESSION['unique_id'])){
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $message = encrypt($message);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT into messages (incoming_id, outgoing_id, msg)
            VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    } else {
        header("../login.php");
    }
?>