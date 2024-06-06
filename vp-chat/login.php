<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login page</title>
  <link rel="stylesheet" href="css/login.css" />
  <base href="/vp-chat/">

</head>

<body>
  <div class="login-page">
    <div class="reg">
      <p>Login</p>
    </div>
    <div class="form">
      <form class="login-form" action="">
        <div class="error">
          <p>Error !!</p>
        </div>
        <input type="text" placeholder="email" name="email"/>
        <div class="pass-show">
          <input type="password" placeholder="password" name="password"/>
          <span>
            <span>
              <img src="img/show.png" alt="" height="20px">
            </span>
          </span>
        </div>
        <input type="submit" value="Login" class="button" id="submit"/>
        <p class="message">
          Not registered? <a href="register.php">Create an account</a>
        </p>
      </form>
    </div>
  </div>
  <script src="Javascript/password.js"></script>
  <script src="Javascript/login.js"></script>
</body>

</html>