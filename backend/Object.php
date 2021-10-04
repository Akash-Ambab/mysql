<?php

  require_once './backend/UsersClass.php';
  try{
    $obj = new UsersClass();
  }
  catch(Exception $e){
    echo $e->getMessage();
  }

?>