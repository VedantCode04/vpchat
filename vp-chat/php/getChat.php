<?php
session_start();

include_once "config.php";
require_once "decrypt.php";

if (isset($_SESSION['unique_id'])) {
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM messages WHERE (outgoing_id = {$outgoing_id} AND incoming_id = {$incoming_id})
                OR (outgoing_id = {$incoming_id} AND incoming_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $msgId = $row['msg_id'];
            $row['msg'] = decrypt($row['msg']);
            if ($row['outgoing_id'] === $outgoing_id) {           
                $output .= '<div class="chat outgoing">
                                <div class="content">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                
                $output .= '<div class="chat incoming">
                                <div class="content">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
        echo "$output";
    } else {
        $output .= '<div class="text">No messages are available</div>';
    }
    // echo $output;
} else {
    header("../login.php");
}
?>