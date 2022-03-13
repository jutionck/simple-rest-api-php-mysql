<?php

require_once('helper.php');

$query = "SELECT id, note FROM notes";
$sql = mysqli_query($db_connect, $query);

if ($sql) {
  $result = [];
  while ($row = mysqli_fetch_array($sql)) {
    array_push($result, [
      'id'    => $row['id'],
      'note'  => $row['note'],
    ]);
  };

  echo json_encode(
    [
      'status'  => 'OK',
      'data'    => $result
    ]
  );
}
