<?php
  //Change the story's text to include the new addition
      include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/boilerMakedb.inc.php";
    $storyid = mysqli_real_escape_string($link, $_POST['storyid']);

    $newtext = mysqli_real_escape_string($link, $_POST['newtext']);
    $originaltext = mysqli_real_escape_string($link, $_POST['storytext']);
    $sqltext = $originaltext . "\n>>>>>>>>>>>>NEW AUTHOR NAME HERE\n" . $newtext;
    $sql = "UPDATE stories SET storytext = '$sqltext' WHERE id = '$storyid'";
    echo $sql;
    if(!MySQLi_query($link, $sql)){
      $output = 'Error adding new story text.';
      include $_SERVER['DOCUMENT_ROOT'] . '/includes/output.html.php';
      exit();
    }
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


  <div class = "col-md-1" ><br /></div>
   <div class = "col-md-7" > <h1><br />Thanks for sharing a great story!</h1>
   <br /><a href="Readstory.html"><button class="button button1">Browse new stories</button></a><br/><br /></div>


  </body>
  </html> 
