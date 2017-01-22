<?php
include_once include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/helpers.inc.php";
 ?>


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
        <li><a href="write.html.php">Write</a></li>
        <li><a href="profile.html.php">My Profile</a></li>
        <li><a href="Myclass.html.php">Leaderboard</a></li>
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


  <div class = "page-header">
    <h1><center>Add more to the story!</center></h1>
    <h3><center><b> <?php htmlout("Title: " . $_POST['title']); ?> </b></center></h3>
  </div>
  <textarea rows= "15" cols=100%>
    <?php htmlout($storytext); ?></textarea>
    <form action = "postsuccess.html.php" method = "post">
       <textarea type = "text" name = "newtext" rows= "15" cols=100% placeholder="Start writing here..."></textarea>
       <button class="button button9" type = "submit">Share</button></a><br/><br/>
       <input type = "hidden" value = "<?php htmlout($storyid); ?>" name = "storyid"/>
       <input type = "hidden" name = "storytext" value = "  <?php htmlout($storytext); ?>"/>
       <input type = "hidden" name = "action" value = "addtostory"/>
    </form>

  </body>
  </html>
