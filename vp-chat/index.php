<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/index.css" />
    <title>VP-CHAT</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <base href="/vp-chat/">

  </head>
  <body id="home">
    <div class="navbar">
      <nav>
        <img src="img/logo.png" alt="VP-CHAT" id="logo" />
        <div>
          <ul>
            <li><a href="#about" class="jump">About</a></li>
            <li><a href="#features" class="jump">Features</a></li>
            <li><a href="#why" class="jump">Why us?</a></li>
            <li><a href="login.php" class="jump login">Login</a></li>
            <li><a href="register.php" class="jump login">Register</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="container">
      <div class="header">
        <div class="heading">
          <div class="title">
            <div>
              Welcome to
              <span style="color: #00f2ff; padding-left: 1rem; font-weight: 400">VP-CHAT</span>
            </div>
          </div>
        </div>
      </div>
      <div class="info desc">
        <div id="about" class="moveleft">
          <h2 class="animation">What is VP-CHAT ?</h2>
          <p>
            VP-CHAT is a cutting-edge chat application that revolutionizes the
            way you connect with others. Whether you're seeking real-time
            conversations, secure messaging, or the ability to stay connected no
            matter where you are, VP-CHAT has you covered. Our user-friendly
            platform offers seamless registration, encrypted password
            protection, and a host of features to make your communication
            experience extraordinary.
          </p>
        </div>
      </div>

      <div class="features desc">
        <div class="moveleft">
          <h2 class="animation" id="features">Features</h2>
          <ul>
            <li>
              Register for a new account or login using your existing
              credentials.
            </li>
            <li>
              Securely store passwords in encrypted form for user privacy.
            </li>
            <li>Chat with other registered users in real-time.</li>
            <li>Display online/offline status of users.</li>
            <li>Search for specific registered accounts.</li>
          </ul>
        </div>
      </div>

      <div class="desc why-section" id="why">
        <div class="moveleft">
          <h2 class="animation" id="why">Why VP-CHAT ?</h2>
          <ul>
            <li>
              <span class="material-symbols-outlined"> lock </span>
              <p>Secure</p>
            </li>
            <li>
              <span class="material-symbols-outlined"> sync </span>
              <p>Syncronized</p>
            </li>
            <li>
              <span class="material-symbols-outlined"> login </span>
              <p>Login anywhere</p>
            </li>

            <li>
              <span class="material-symbols-outlined"> encrypted </span>
              <p>Encrypted data</p>
            </li>

            <li>
              <span class="material-symbols-outlined"> chat </span>
              <p>Real-time Communication</p>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <footer>
      <div>
        <p>&copy;2023 : Vedant and Pujan Enterprises</p>
      </div>

      <div class="creators">
        <img src="img/MyPfp.jpg" alt="vedant" />
        <img src="img/pfp2.jpg" alt="pujan" />
      </div>
    </footer>
  </body>
</html>
