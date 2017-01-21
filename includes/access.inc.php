<?php

function testFunction(){
echo "THIS IS A TEST";
}

function userIsLoggedIn()
{

  if(isset($_POST['action']) && $_POST['action'] == 'login'){
    if(!isset($_POST['email']) || $_POST['email']=='' || !isset($_POST['password']) or $_POST['password'] == ''){
          $GLOBALS['loginError'] = 'Please fill in both fields';
          return FALSE;
        }

    //Look for an author in the database
    $password = md5($_POST['password'] . 'ijdb');

    if(databaseContainsAuthor($_POST['email'], $password)){
      session_start();
      $_SESSION['loggedIn'] = TRUE;
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['password'] = $password;
      return TRUE;
    }else{
      session_start();
      unset($_SESSION['loggedIn']);
      unset($_SESSION['email']);
      unset($_SESSION['password']);
      $GLOBALS['loginError'] = 'The specified email or password was incorrect.';
      return FALSE;
    }
  }

  if(isset($_POST['action']) and $_POST['action'] == 'logout'){
    session_start();
    unset($_SESSION['loggedIn']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('Location: ' . $_POST['goto']);
    exit();
  }

	  session_start();
  if(isset($_SESSION['loggedIn'])){
    return databaseContainsAuthor($_SESSION['email'], $_SESSION['password']);
  }

}







function databaseContainsAuthor($email, $password)
{
  include "boilerMakedb.inc.php";

  $email = mysqli_real_escape_string($link,  $email);
  $password =  mysqli_real_escape_string($link,  $password);

  $sql = "SELECT COUNT(*) FROM authors
          WHERE email='$email' AND password = '$password'";
  $result = mysqli_query($link, $sql);

    if(!$result){
      $output = "Error searching for author.";
      include $_SERVER['DOCUMENT_ROOT'] . "/BoilerMake2017/includes/output.html.php";
      exit();
    }

  $row = mysqli_fetch_array($result);

  if($row[0]>0)
  {
    return TRUE;
  }else{
    return FALSE;
  }
}



 ?>
