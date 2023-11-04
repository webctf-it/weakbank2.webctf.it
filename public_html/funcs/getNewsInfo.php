<?php
include "utility.php";
$u = new Utility();
if($u->isLogged() && $u->isAdmin()){
  include_once "dbConn.php";
  $id=$_POST['id'];
  $info=array();
  $result=$conn->query("SELECT id_news,titolo,descrizione,data,target,img FROM news WHERE id_news='$id'");
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $info['success']=1;
      $info['id_news'] = $row['id_news'];
      $info['titolo']=$row['titolo'];
      $info['descrizione']=$row['descrizione'];
      $info['data']=$row['data'];
      $info['target']=$row['target'];
      $info['img']=$row['img'];
    }
    echo json_encode($info);
  }else{
    echo json_encode(array('success'=>0,'message'=>'DB_error'));
  }
}else echo json_encode(array('success'=>0,'message'=>'You\'re not authorized'));

?>