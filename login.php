<?php

require_once('helper.php');

$email = $_GET['email'];
$password = md5($_GET['password']);

$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$check = mysqli_query($db_connect, $query);

if ($check) {
  if (empty(mysqli_fetch_array($check))) {
    response(400, ['message' => 'User not found!']);
  } else {

    $date = date('Y-m-d');
    mysqli_query($db_connect, "UPDATE user SET last_login = '$date' WHERE email = '$email'");
    $user = mysqli_query($db_connect, $query);

    $result = [];
    while ($row = mysqli_fetch_array($user)) {
      $result = [
        'id'          => $row['id'],
        'name'        => $row['name'],
        'email'       => $row['email'],
        'last_login'  => $row['last_login'],
      ];
    };
    response(200, ['message' => 'Login success!', 'data' => $result]);
  }
} else {
  response(400, ['message' => 'Error!']);
}
