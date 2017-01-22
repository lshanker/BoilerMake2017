<?php
include_once include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/helpers.inc.php";
?>

<!DOCTYPE html>
<html lang = "en">
<head>
  
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
  <title>Sign In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Footer template thing -->
 <link href="sticky-footer.css" rel="stylesheet">
  <link rel="stylesheet" href="write.css">
  <link rel="stylesheet" href="Signup.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body background ="orange.jpg">
    <div class = "container-fluid">
        <div class="wrapper"><b>
              <div class="placement">
 <img src = "downwritesmart_logo.png" style = "width:150px;height:150px;"/>     
		<h1 align = "center" style = "font-family:courier new bold">Down Write Smart</h1> 
        
	<h3 align="center" class="form-signin-heading">Sign In</h3><br/>
              <?PHP if(isset($loginError)): ?>
              <p><?php echo htmlout($loginError); ?></p>
            <?php endif; ?>
              <form action = "" method = "post">
              Email: <input type="text" name="email" value=""><br/><br/>
              Password: <input type="password" name="password" value=""></b>
                      <input type = "hidden" name = "action" value = "login"/></br>
                      <input type = "submit" value = "Start Writing!"/>
              </form>
		</br>
              <a href = "join.html.php">New to our site? Sign up here.</a>
              <br/><br/>
              <br/><br/>
              <br/><br/>
              <br/><br/>
  

		<p>Created during BoilerMake 2017 by Heidi Anderson, Judy Pao, Lucas Shanker, and Mary Truong</p>
            </div>
        </div>
    </div>
</body>



</html>
