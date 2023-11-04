<?php
include "utility.php";
$u = new Utility();
if($u->isLogged() && $u->isAdmin()){
	include_once "dbConn.php";
	$id=$_POST['id'];
	$result=$conn->query("DELETE FROM news WHERE id_news='$id'");
	if($result) echo json_encode(array('success'=>1));
	else echo json_encode(array('success'=>0, 'message'=>'DB_error'));
} else echo json_encode(array('success'=>0, 'message'=>'You \'re not authorized'));



?>