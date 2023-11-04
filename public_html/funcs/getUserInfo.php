<?php
include "utility.php";
$u = new Utility();
if($u->isLogged() && $u->isAdmin()){
  include_once "dbConn.php";
  $id=$_POST['id'];
  $info=array();
  $result=$conn->query("SELECT titolare,nCarta,cvv,data_scadenza FROM conti_bancari WHERE id_conto='$id'");
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $info['success']=1;
      $info['titolare']=$row['titolare'];
      $info['nCarta']=$row['nCarta'];
      $info['cvv']=$row['cvv'];
      $info['data_scadenza']=$row['data_scadenza'];
    }
    echo json_encode($info);
  }else{
    echo json_encode(array('success'=>0,'message'=>'DB_error'));
  }
} else echo json_encode(array('success'=>0,'message'=>'You\'re not authorized'));


?>