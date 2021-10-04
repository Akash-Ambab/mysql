<?php

require_once './backend/Object.php';

$id = $_POST['id'];
$pageNo = $_POST['pageNo'];

try {
  $result = $obj -> deleteData($id);

  if($result) {
    echo "Deleted";
  }
}
catch (Exception $e) {
    echo $e -> getMessage();
}
?>