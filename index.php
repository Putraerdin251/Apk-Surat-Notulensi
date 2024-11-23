<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Aplikasi Notulensi BPS</title>
  <link href="styles/Index_style.css" rel="stylesheet">
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Sign In </h2>

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="images/logo.png" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form class="login" action="conf/autentikasi.php" method="post">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>
</body>
<?php
if (isset($_GET['error'])) {
  $x = ($_GET['error']);
  if ($x == 1) {
    echo "
   <script>
   var Toast = Swal.mixin({
      toast: true,
      position: 'center-top',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
    icon: 'warning',
    title: 'Login Gagal Erorr'
  })
  </script>";
  } else if ($x == 2) {
    echo "
   <script>
   var Toast = Swal.mixin({
      toast: true,
      position: 'center-top',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
    icon: 'warning',
    title: 'Silahkan Input kan Username & Password'
  })
  </script>";
  } else {
    echo '';
  }
}
?>

</html>
<div class="main">
  <input type="checkbox" id="chk" aria-hidden="true">
  <div class="signup">
    <form action="proses_login.php" method="post">
      <label for="chk" aria-hidden="true">Welcome</label>
    </form>
  </div>
  <div class="login">
    <form action="proses_login.php" method="post">
      <label for="chk" aria-hidden="true">Login</label>
      <input type="text" placeholder="Username" id="username" name="username" required>
      <input type="password" placeholder="Password" id="password" name="password" required>
      <button>Login</button>
    </form>

  </div>
</div>
<form class="login">
  <input type="text" placeholder="Username">
  <input type="password" placeholder="Password">
  <button>Login</button>
</form>

<a href="https://codepen.io/davinci/" target="_blank">check my other pens</a>