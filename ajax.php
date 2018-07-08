<?php
	include 'class/aacevedo.php';
	$class = new Aacevedo();

	$type = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : '';

	switch($type):
	case 'add':    $result = $class->addData();
				   echo $result;
				   break;
	case 'get':	   $id = $_REQUEST['id'];
				   $result = $class->getData($id);
				   echo json_encode($result);
				   break;
    case 'update': $id = $_REQUEST['id']; 
				   $result = $class->updateData($id);
				   echo json_encode($result);
				   break;
	
    case 'delete': $id = $_REQUEST['id'];
				   $result = $class->deleteData($id);
				   echo json_encode($result);
				   break;
	default: $result = $class->getData();
				   echo json_encode($result);
				   break;
	endswitch;
?>