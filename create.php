<?php

require_once('helper.php');

$note = $_POST['note'];
$query = "INSERT INTO notes (note) VALUES ('$note')";
$sql = mysqli_query($db_connect, $query);


if ($sql) {
  echo json_encode(
    [
      'status' => 'OK',
      'message' => 'Succesfully created!'
    ]
  );
} else {
  echo json_encode(
    [
      'status' => 'BAD REQUEST',
      'message' => 'Not Succesfully created!'
    ]
  );
}
