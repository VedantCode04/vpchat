<?php

$conn = mysqli_connect("localhost", "root", "", "vpchat");
if ($conn) {
    // echo "database connected";
} else {
    echo "database not connected" . mysqli_connect_error();
}
?>
