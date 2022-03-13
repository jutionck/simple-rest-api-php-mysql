<?php

require_once('helper.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "SELECT email FROM users WHERE email = '$email'";
$check = mysqli_query($db_connect, $query);

if ($check) {
  if (empty(mysqli_fetch_array($check))) {
    $query = "INSERT INTO users (name, email, password) VALUES ('$note', '$email', '$password')";
    $insert = mysqli_query($db_connect, $query);

    if ($insert) {
      response(200, ['message' => 'Resgister success!']);
    } else {
      response(400, ['message' => 'Not Succesfully registered!']);
    }
  } else {
    response(400, ['message' => 'Email already exists!']);
  }
}
