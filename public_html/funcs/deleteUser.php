<?php
include "utility.php";
$u = new Utility();
if($u->isLogged() && $u->isAdmin()){
  include_once "dbConn.php";
  $id=$_POST['id'];

  $result=$conn->query("SELECT utente FROM conti_bancari WHERE id_conto='$id'");
  if($result->num_rows>0){
    $row=$result->fetch_assoc();
    $id_utente=$row['utente'];
    $result=$conn->query("DELETE FROM conti_bancari WHERE id_conto='$id'");
    $result=$conn->query("DELETE FROM users WHERE id_utente='$id_utente'");
    echo json_encode(array('success'=>1));
  }else echo json_encode(array('success'=>0, 'message'=>'DB_error'));
}else  echo json_encode(array('success'=>0, 'message'=>'You \'re not authorized'));


?>