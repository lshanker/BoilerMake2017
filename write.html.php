<!DOCTYPE html>
<html lang = "en">
<head>
  <title>Write a story</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="write.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body background ="http://7-themes.com/data_images/collection/9/4506641-orange-wallpapers.png">
<div class="container-fluid">

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Read a story!</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Write</a></li>
        <li><a href="profile.html.php">My Profile</a></li>
        <li><a href="Myclass.html.php">My Class</a></li>
      </ul>
      <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="Signup.html.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div>
  </nav>


  <div class = "page-header">
    <h1>Write a new story!</h1>
  </div>
  <form action = "index.php" method = "post">
    <textarea type = "text" name = "title" rows = "1" cols = "25%" style="border:solid 7px #666666; resize:none" placeholder="Title..."></textarea><br/><br/>
    <textarea type = "text" name = "storytext" rows= "30" cols=100% style="border:solid 7px #666666; resize:none" placeholder="Write your story here..."></textarea>
    <a href="postsuccess.html.php"><button type = "submit" class="button button1">Post</button></a><br/><br/>
    <input type = "hidden" value = "addstory" name = "action"/>
</form>

  </body>
  </html>
