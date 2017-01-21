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

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="Readstory.html">Read a story!</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="write.html">Write a new story</a></li>
        <li><a href="Profile.html">My Profile</a></li>
      </ul>
      <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="Signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div>
  </nav>

  <form>
    <!--First row-->
    <div class="row">
        <!--First column-->
        <div class="col-md-6">
            <div class="md-form">
                <i class="fa fa-envelope prefix"></i>
                <input type="email" id="form81" class="form-control validate">
                <label for="form81" data-error="wrong" data-success="right">Type your email</label>
            </div>
        </div>

        <!--Second column-->
        <div class="col-md-6">
            <div class="md-form">
                <i class="fa fa-lock prefix"></i>
                <input type="password" id="form82" class="form-control validate">
                <label for="form82" data-error="wrong" data-success="right">Type your password</label>
            </div>
        </div>
    </div>
    <!--/.First row-->

    <!--Third row-->
    <div class="row">

        <!--First column-->
        <div class="col-md-4">
            <div class="md-form">
                <input type="text" id="form41" class="form-control">
                <label for="form41" class="">School</label>
            </div>
        </div>

        <!--Second column-->
        <div class="col-md-4">
            <div class="md-form">
                <input type="text" id="form51" class="form-control">
                <label for="form51" class="">Grade</label>
            </div>
        </div>

    </div>
    <!--/.Third row-->
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
  </html> 
