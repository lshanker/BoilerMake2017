<?php

  include_once include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/boilerMakedb.inc.php";













  //Generate the list of stories for the main page
  include_once include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/boilerMakedb.inc.php";


  $result = MySQLi_query($link, "SELECT * FROM stories");

  if(!$result){
    $output = "Error fetching stories: " . MySQLi_error($link);
    include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/output.html.php";
    exit();
  }

  while($row = mysqli_fetch_array($result)){
    $stories[] = array("id" => $row["id"], "storytext" => $row["storytext"],
                        "date" => $row["date"], "submissions" => $row["submissions"]);
  }

  include "Readstory.html.php";

 ?>
