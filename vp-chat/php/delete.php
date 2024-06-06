<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    if(isset($delete_id)){
        $sql = mysqli_query($conn, "DELETE FROM users WHERE unique_id = {$delete_id} ");
        $sql2 = mysqli_query($conn, "DELETE FROM messages WHERE incoming_id = {$delete_id} OR outgoing_id = {$delete_id}");
        if ($sql && $sql2) {
            session_unset();
            session_destroy();
            header("location: ../login.php");
        }
    }
} else {
    header("location: ../login.php");
}
?>