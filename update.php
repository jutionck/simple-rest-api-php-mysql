<?php

require_once('helper.php');

parse_str(file_get_contents('php://input'), $value);

$id   = $value['id'];
$note = $value['note'];

$query = "UPDATE notes SET note = '$note' WHERE id = '$id'";
$sql = mysqli_query($db_connect, $query);


if ($sql) {
  echo json_encode(
    [
      'status' => 'OK',
      'message' => 'Succesfully updated!'
    ]
  );
} else {
  echo json_encode(
    [
      'status' => 'BAD REQUEST',
      'message' => 'Not Succesfully updated!'
    ]
  );
}
