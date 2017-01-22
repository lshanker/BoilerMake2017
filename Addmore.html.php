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
        <a class="navbar-brand" href="#">Read a story!</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="write.html.php">Write</a></li>
        <li><a href="profile.html.php">My Profile</a></li>
        <li><a href="Myclass.html.php">Leaderboard</a></li>
      </ul>
      <form class="navbar-form navbar-left" action = "index.php" method = "post">
      <div class="form-group">
        <input type="text" name = "keywords" class="form-control" placeholder="Search by title"/>
      </div>
      <button type="submit" name = "action" value = "search" class="btn btn-default">Submit</button>
      <input type = "hidden" name = "message" value = "Search results:"/>
     </form>
      <ul class="nav navbar-nav navbar-right">
    <form action = "index.php" method = "post">
        <button type="submit" class="btn btn-default">Logout</button>
        <input type = "hidden" name = "action" value = "logout"/>
        <input type = "hidden" name = "goto" value = "index.php"/>
    </form>
    </ul>
    </div>
  </nav>
  <div align="center">



  <div class = "page-header">
    <h1>Add more to the story!</h1>
    <h3>   <b>   <?php htmlout("Title: " . $_POST['title']); ?> </b></h3>
  </div>
  <textarea style="resize:none; width: 70%; border:solid 5px #666666" disabled>
    <?php htmlout($storytext); ?></textarea>
    <form action = "postsuccess.html.php" method = "post">
       <textarea type = "text" name = "newtext" rows= "30" cols=100% style="border:solid 7px #666666; resize:none" placeholder="Start writing here..."></textarea>
       <button class="button button1" type = "submit">Share</button></a><br/><br/>
       <input type = "hidden" value = "<?php htmlout($storyid); ?>" name = "storyid"/>
       <input type = "hidden" name = "storytext" value = "  <?php htmlout($storytext); ?>"/>
       <input type = "hidden" name = "action" value = "addtostory"/>
    </form>

  </body>
  </html>
