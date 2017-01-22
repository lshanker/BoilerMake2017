<?php
  //Change the story's text to include the new addition
  if(!session_id()){
  session_start();
  }

  include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/boilerMakedb.inc.php";

  //Get the author's name and points
  $email = mysqli_real_escape_string($link, $_SESSION['email']);
  $result = MySQLi_query($link, "SELECT name, points FROM authors WHERE email = '$email'");

  if(!$result){
    $output = "Error fetching student name.";
    include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/output.html.php";
    exit();
  }

    while($row = mysqli_fetch_array($result)){

    $names[] = array("name" => $row["name"], "points" => $row["points"]);
    }

    $authorName = $names[0]['name'];
    $currPoints = $names[0]['points'];


    $storyid = mysqli_real_escape_string($link, $_POST['storyid']);

    $newtext = mysqli_real_escape_string($link, $_POST['newtext']);
    $originaltext = mysqli_real_escape_string($link, $_POST['storytext']);
    $sqltext = $originaltext . "\n\n>>>>>>>>>>>>The next section was written by " . $authorName . ":\n" .$newtext;
    $sql = "UPDATE stories SET storytext = '$sqltext' WHERE id = '$storyid'";
    if(!MySQLi_query($link, $sql)){
      $output = 'Error adding new story text.';
      include $_SERVER['DOCUMENT_ROOT'] . '/includes/output.html.php';
      exit();
    }

    //Now update the points (+10 for adding to a story)
    $newPoints = $currPoints + 10;
    $sql = "UPDATE authors SET points = '$newPoints' WHERE email = '$email'";
    if(!MySQLi_query($link, $sql)){
      $output = 'Error adding points.';
      include $_SERVER['DOCUMENT_ROOT'] . '/includes/output.html.php';
      exit();
    }
?>


<!DOCTYPE html>
<head>
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
  <title>Write a story</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="postsuccess.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body background ="http://7-themes.com/data_images/collection/9/4506641-orange-wallpapers.png">

<div class="area">
 Thanks for sharing a great story! (You got 10 points!)
</div>
<a href="index.php"><button class="button button4">Browse new stories</button></a>


</body>
</html>
