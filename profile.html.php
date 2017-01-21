<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/helpers.inc.php";

session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/boilerMakedb.inc.php";

$result = MySQLi_query($link, "SELECT name, grade, points FROM authors WHERE email = 'lshanke@purdue.edu'");

if(!$result){
  $output = "Error fetching student info: " . MySQLi_error($link);
  include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/output.html.php";
  exit();
}

  while($row = mysqli_fetch_array($result)){
  $userInfos[] = array("name" => $row["name"], "grade" => $row["grade"],
                      "points" => $row["points"]);
  }

  $userInfo = $userInfos[0];

 ?>

<!DOCTYPE html>
<html lang = "en">
<head>
  <title>Write a story</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="profile.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<body background ="http://7-themes.com/data_images/collection/9/4506641-orange-wallpapers.png">
<div class="container-fluid">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Read a story!</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="write.html.php">Write</a></li>
        <li class="active"><a href="#">My Profile</a></li>
        <li><a href="Myclass.html.php">My Class</a></li>
      </ul>
      <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div>
  </nav>


  <div class="container">
  <div class = "row">
    <div class = "col-md-3" ><br /><br /><br /><IMG SRC="https://www.cesarsway.com/sites/newcesarsway/files/styles/large_article_preview/public/Common-dog-behaviors-explained.jpg?itok=FSzwbBoi" ALT="some text" WIDTH=250 HEIGHT=250>
    <h4>Grade: <?php htmlout($userInfo['grade']) ?></h4>
    <h4>Points: <?php htmlout($userInfo['points']) ?></h4>
    </div>
      <div class = "col-md-7">
      <h1><?php htmlout($userInfo['name']) ?><br /></h1>
      <h4>Woodside Elemntary School<br /><br /><br /></h4><div class="table-responsive">
  <table class = "table">
    <thread>
      <tr>
        <th><h4>My Stories</h4></th>
      </tr>
    </thread>
    <tbody>
      <tr>
        <td>All About My Dog</td>
      </tr>
      <tr>
        <td>Where I Went Over Christmas</td>
      </tr>
      <tr>
        <td>How I Broke My Arm</td>
      </tr>
    </tbody>
  </table>
</div>
        </ul>
    </div>
  </div>
</div>

  </body>
  </html>
