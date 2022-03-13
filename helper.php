<?php

define('HOST', 'YOUR_HOST');
define('USER', 'YOUR_USER_DB');
define('PASS', 'YOUR_PASSWORD_DB');
define('DB', 'YOUR_DB_NAME');

$db_connect = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to connect');

header('Content-type: application/json');
date_default_timezone_set('Asia/Jakarta');

function response($status_code, $json)
{
  if ($status_code == 200) header("HTTP/1.1 200 OK");
  else header('HTTP/1.1 400 Bad Request');
  echo json_encode($json);
}
