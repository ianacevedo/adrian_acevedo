<?php
include "class/aacevedo.php";
$class = new Aacevedo();
$id = $_REQUEST['id'];
$result = $class->deleteData($id);
header("location:index.php");
?>