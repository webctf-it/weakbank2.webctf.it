<?php
  include_once "dbConn.php";
  $response = '';
  $flag = false;
  $email = $_POST['email'];
  $password =$_POST['pass'];
  //prepared stmt
  $query = "SELECT id_utente,email,admin FROM users WHERE email = ? AND password = ? LIMIT 1";
  if($stmt = $conn->prepare($query)){
    $stmt->bind_param("ss",$email,$password);

    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        session_start();
        $_SESSION['logged'] = 1;
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id_utente'];
        $_SESSION['admin']=$row['admin'];
        $response = json_encode(array(
          'success'=>1,
          'admin'=>$_SESSION['admin'],
          'r'=>$row
        ));
      }
      
    }else $response=  json_encode(array('success'=>0,'message'=>'Login incorrect, try again'));
  }else $response = json_encode(array('success' =>0,'message'=>'DB_error'));
  $stmt->close();
  echo $response;


?>