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
  <link rel="stylesheet" href="Readstory.css">
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
        <li><a href="Myclass.html.php">My Class</a></li>
      </ul>
      <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
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
    <!--Story textbox and add more buttons-->
  <?php foreach ($stories as $story): ?>
   <form action = "index.php" method = "post">
     <div>
    <textarea style="resize:none; width: 70%; border:solid 5px #666666" disabled>
      <?php htmlout($story["title"]); ?></textarea>
    </div>
    <div>
      <a href="Addmore.html.php"><button class="button button3" type = "submit">Read this story!</button></a><br/><br/>
    </div>
      <input type = "hidden" value = "<?php htmlout($story["id"]); ?>" name = "id"/>
      <input type = "hidden" value = "<?php htmlout($story["submissions"]); ?>" name = "submissions"/>
      <input type = "hidden" value = "<?php htmlout($story["storytext"]); ?>" name = "storytext"/>
      <input type = "hidden" value = "<?php htmlout($story["storydate"]); ?>" name = "date"/>
      <input type = "hidden" value = "<?php htmlout($story["title"]); ?>" name = "title"/>
      <input type = "hidden" name = "action" value = "readstory"/>
   </form>
  <?php endforeach; ?>

</div>
  </div>
  </body>
