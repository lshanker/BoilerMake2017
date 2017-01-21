<!DOCTYPE html>
<html lang = "en">
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="/join.css">

</head>

<body>
<div class="container-fluid">

  <form action = "index.php" method = "post">
    <!--First row-->
    <div class="row">
        <!--First column-->
        <div class="col-md-6">
            <div class="md-form">
                <i class="fa fa-envelope prefix"></i>
                <input type="email" id="form81" class="form-control validate" name = "email">
                <label for="form81" data-error="wrong" data-success="right">Type your email</label>
            </div>
        </div>

        <!--Second column-->
        <div class="col-md-6">
            <div class="md-form">
                <i class="fa fa-lock prefix"></i>
                <input type="password" id="form82" class="form-control validate" name = "password">
                <label for="form82" data-error="wrong" data-success="right">Type your password</label>
            </div>
        </div>
    </div>
    <!--/.First row-->

    <!--Third row-->
    <div class="row">

        <!--Second column-->
        <div class="col-md-4">
            <div class="md-form">
                <input type="text" id="form51" class="form-control" name = 'name'>
                <label for="form51" class="">Full Name</label>
            </div>
        </div>

    </div>
    <!--/.Third row-->
      <button type = "submit"  class="button button2">Create Account</button>
      <input type = "hidden" name = "action" value = "join"/>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
  </html>
