<?php










//If the user submits an add new story form
if(isset($_POST["action"]) && $_POST["action"]=="addstory"){
  include_once $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/boilerMakedb.inc.php";

  $storytext = mysqli_real_escape_string($link, $_POST["storytext"]);
  $title = mysqli_real_escape_string($link, $_POST['title']);
  $sql = "INSERT INTO stories SET storytext = '$storytext', storydate = 'CURDATE()', title = '$title'";
  if(!MySQLi_query($link, $sql)){
    $output = 'Error adding submitted story.';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/output.html.php';
    exit();
  }

  header('Location: .');
  exit();
  }









  //If the user clicks on "read this story"
  if(isset($_POST["action"]) && $_POST["action"]=="readstory"){
    $storytext = $_POST["storytext"];
    $date = $_POST["storydate"];
    $submissions = $_POST["submissions"];
    $storyid = $_POST["id"];
    $title = $_POST["title"];

    include "Addmore.html.php";
  }








  //Generate the list of stories for the main page
  include_once $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/boilerMakedb.inc.php";


  $result = MySQLi_query($link, "SELECT * FROM stories");

  if(!$result){
    $output = "Error fetching stories: " . MySQLi_error($link);
    include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/output.html.php";
    exit();
  }

  while($row = mysqli_fetch_array($result)){
    $stories[] = array("id" => $row["id"], "storytext" => $row["storytext"],
                        "date" => $row["date"], "submissions" => $row["submissions"], "title" => $row["title"]);
  }

  include "Readstory.html.php";

 ?>
