<?php
require_once "decrypt.php";
while ($row = mysqli_fetch_assoc($sql)) {
    $result .= '<a href="chat.php?user_id='.$row['unique_id'].' " class="userdata">
        <div class="data">
          <img src="php/images/' . $row['image'] . '" alt="" />
          <span>' . decrypt($row['uname']) . '</span>
        </div>
        <div class="' . $row['status'] . '"><span>'.$row['status'].'</span></div>
      </a>';
}

?>