<?php
include_once include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/helpers.inc.php";
?>

<!DOCTYPE html>
<html lang = "en">
<head>
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
  <title>Sign In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="write.css">
  <link rel="stylesheet" href="Signup.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body background ="http://wallpaper-gallery.net/images/inspiring-wallpapers/inspiring-wallpapers-23.jpg">
    <div class = "container-fluid">
        <div class="wrapper"><b>
              <div class="placement">
              <h3 align="center" class="form-signin-heading">Sign In</h3><br/>
              <?PHP if(isset($loginError)): ?>
              <p><?php echo htmlout($loginError); ?></p>
            <?php endif; ?>
              <form action = "" method = "post">
              Email: <input type="text" name="email" value=""><br/><br/>
              Password: <input type="password" name="password" value=""></b>
                      <input type = "hidden" name = "action" value = "login"/>
                      <button type = "submit" value = "Log in" class="button button2">Start Writing!</button>
              </form>
              <a href = "join.html.php">New to our site? Sign up here.</a>
              <br/><br/>

            </div>
        </div>
    </div>
</body>

</html>
