<?php
session_start();
include_once "php/config.php";
require_once "php/decrypt.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
  $row = mysqli_fetch_assoc($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>user</title>
  <link rel="stylesheet" href="css/user.css" />
  <base href="/vp-chat/">
</head>

<body>
  <div class="container">
    <header>
      <img src="php/images/<?php echo $row['image']; ?>" alt="">
      <div>
        <h2>Hello, <span><?php echo decrypt($row['uname']) ?></span></h2>
      </div>
      <div class="actions">
        <a class="logout"><span><img src="img/logout.png" alt="" id="logout"> </span></a>
        <a class="delete"><span><img src="img/delete.png" alt="" id="delete"> </span></a>
      </div>
    </header>
    <div class="search">
      <input type="text" placeholder="Find User" id="search" />
    </div>
    <div class="userlist">
    </div>
  </div>

  <script src="Javascript/user.js"></script>
  <script>
    let deleteBtn = document.querySelector(".delete")
    let logoutBtn = document.querySelector(".logout")
    deleteBtn.onclick = () => {
      if (confirm("Are you sure you want to delete your account ? All data will be ereased")) {
        window.location.href = "php/delete.php?delete_id=<?php echo $row['unique_id'] ?>";
      }
    }

    logoutBtn.onclick = () => {
      if (confirm("do you want to logout ? You will need to login again to use this website")) {
        window.location.href = "php/logout.php?logout_id=<?php echo $row['unique_id'] ?>"
      }
    }
  </script>
</body>

</html>