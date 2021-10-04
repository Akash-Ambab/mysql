<?php
  require_once './backend/Object.php';

  $name = $_POST['name'];
  $designation = $_POST['designation'];
  $id = $_POST['updateid'];
  
  $data = [
      "name" => $name,
      "designation" => $designation
  ];

  try {
    $result = $obj -> updateData($id, $data);

    if($result) {
      echo "success";
    }
  }
  catch (Exception $e) {
      echo $e -> getMessage();
  }
?>