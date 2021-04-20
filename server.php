<?php
//to start session
session_start();

//initialising variable

$email = "";
$password = "";

$errors = array();

//connect to database
$db = mysqli_connect('localhost', 'root', 'root', 'task1') or die("could not connect to database");

if(isset($_POST['reg_user'])){
//register user

$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);



//form validation

if(empty($email)){
  array_push($errors, "Email is required");
}
if(empty($password)){
  array_push($errors, "Password is required");
}


//check db for existing user with same Username or email id
$user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
  if($user['email'] === $email){
    array_push($errors, "This email is already been used");
  }
}

//Register the user if no error
if(count($errors) == 0){
  $password = md5($password); //this will encrypt the password_1
  $query = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
  mysqli_query($db, $query);

  $_SESSION['email'] = $email;
  $_SESSION['success'] = "You are now logged in";

  header("location: index.php");
}
}

//LOGIN USER
if(isset($_POST['login_user'])){
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  if(empty($email)){
    array_push($errors, "Email is required");
  }
  if(empty($password)){
    array_push($errors, "Password is required");
  }

  if(count($errors) == 0){
    $password = md5($password);
    $query = "SELECT * FROM user WHERE email='$email' ";
    $results = mysqli_query($db, $query);
    if(mysqli_num_rows($results)){
      $_SESSION['email'] = $email;
      $_SESSION['success'] = "Logged in successfully";
      header("location: index.php");

    }
    else{
      array_push($errors, "Wrong email/password. Try again.");
    }
  }
}


 ?>
