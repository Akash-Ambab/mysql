<?php

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $designation = $_POST['des'];

    try {
        $obj -> saveUser($name, $designation);
    }
    catch(Exception $e) {
        echo $e -> getMessage();
    }
}
?>