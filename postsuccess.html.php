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
  <link rel="stylesheet" href="postsuccess.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body background ="http://7-themes.com/data_images/collection/9/4506641-orange-wallpapers.png">
<div class="container-fluid">


<div class="area">
 Thanks for sharing a great story!
</div>

<a href="index.php"><button class="button button4">Browse new stories</button></a><br/><br/>

  </body>
  </html>
