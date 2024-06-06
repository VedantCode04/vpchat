<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register page</title>
  <link rel="stylesheet" href="css/register.css" />
  <base href="/vp-chat/">
</head>

<body>
  <div class="login-page">
    <div class="reg">
      <p>Register</p>
    </div>
    <div class="form">
      <form action="#" class="register-form" id="regForm" enctype="multipart/form-data" method="POST">
        <!-- error message  -->
        <div class="error">
          Hello
        </div>
        <!-- user name  -->
        <input type="text" placeholder="name" name="uname" required />

        <div class="pass-show">
          <!-- password  -->
          <input type="password" placeholder="password" name="password" required />
          <span>
            <span>
              <img src="img/show.png" alt="" height="20px">
            </span>
          </span>
        </div>
        <!-- email  -->
        <input type="text" placeholder="email address" name="email" required />
        <br />
        <!-- profile -->
        <div class="pfp-input">
          <span>Upload Profile Pic: </span>
          <input type="file" id="pfp" name="profile" required />
        </div>
        <input type="submit" value="Register" class="button" />
        <p class="message">
          Already registered? <a href="login.php">Sign In</a>
        </p>
      </form>
    </div>
  </div>
  </div>
  <script src="Javascript/password.js"></script>
  <script src="Javascript/register.js"></script>
</body>

</html>