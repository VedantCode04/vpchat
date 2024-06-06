<?php
session_start();
include_once "php/config.php";
require_once "php/decrypt.php";

if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}

$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id} ");
if (mysqli_num_rows($sql) > 0) {
  $row = mysqli_fetch_assoc($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/chat.css" />
  <base href="/vp-chat/">

</head>

<body>
  <div class="container">
    <header>
      <a href="user.php"><img src="img/back.svg" alt="Back" id="back"></a>
      <div>
        <img src="php/images/<?php echo $row['image']; ?>" alt="<?php echo decrypt($row['uname']); ?>" />
        <h2><span><?php echo decrypt($row['uname']) ?></span></h2>
      </div>
    </header>
    <div class="chat-content">
    </div>
    <form class="text-input" method="POST">
      <input type="text" name="message" placeholder="enter message to send" id="inputMessage" />
      <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']?>" id="outgoing_id" hidden/>
      <input type="text" name="incoming_id" value="<?php echo $user_id?>" id="incoming_id" hidden/>
      <button><span> <img src="img/send.png" alt="send"> </span></button>
    </form>

    <script src="Javascript/chat.js"></script>
</body>

</html>