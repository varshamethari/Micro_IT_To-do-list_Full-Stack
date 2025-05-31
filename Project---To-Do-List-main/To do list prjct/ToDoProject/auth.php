<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="nav">
      <div class="tbl-btn">
        <div class="btn">
          <button onclick="LogIn()" class="login">Log In</button>
          <button onclick="SignUp()" class="signup">Sign Up</button>
        </div>
      </div>
    </div>

    <!-- <div class="tbl-btn">
      <div class="btn">
        <button onclick="LogIn()" class="login">Log In</button>
        <button onclick="SignUp()" class="signup">Sign Up</button>
      </div> -->
    <!-- </div> -->

    <div class="loginFormContainer">
      <form class="loginForm" id="loginForm" method="POST" action="login.php">
        <h3>E-mail</h3>
        <input type="email"  name="email" />
        <h3>Password</h3>
        <input type="password" name="password" />
        <br />
       <input type="submit" class="submitBtn">
      </form>

      <form class="signUpForm" method="POST" action="signup.php">
        <h3>Name</h3>
        <input type="text" name="first_name"  />

        <h3>Surname</h3>
        <input type="text" name="last_name" />

        <h3>E-mail</h3>
        <input type="email" name="email" />
        <h3>Password</h3>
        <input type="password" name="password" />
        <br />
        <input type="submit"  class="submitBtn">
      </form>
    </div>
    <script>
      function LogIn() {
        document.querySelector(".signUpForm").style.display = "none";
        let form = (document.querySelector(".loginForm").style.display =
          "flex");
      }

      function SignUp() {
        document.querySelector(".loginForm").style.display = "none";
        let form = (document.querySelector(".signUpForm").style.display =
          "flex");
      }


    </script>
  </body>
</html>
