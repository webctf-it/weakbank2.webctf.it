<?php
  session_start();
  $flag=false;
  if(!isset($_SESSION['logged']) && $_SESSION['logged']!=1||$_SESSION['admin']==1)
    header('location: /index.php');
  else{
    $flag=true;
    $admin=$_SESSION['admin'];
    

  include_once "../funcs/dbConn.php";

    //GET INFO UTENTE
    
    //users info
    $id=$_SESSION['id'];
    $result=$conn->query("SELECT titolare,nCarta,saldo from conti_bancari WHERE utente='$id'");
    
    if($result->num_rows>0){
      $row=$result->fetch_assoc();
      $_SESSION['nCarta']=$row['nCarta'];
      $titolare=$row['titolare'];
      $saldo=$row['saldo'];
      $nC='';
      for ($i=0;$i<strlen($row['nCarta'])-3;$i++)
      {
         $nC.='*';
      }
      $nC=$nC.substr($row['nCarta'],strlen($row['nCarta'])-3,3);
    }
  

  $conn->close();
}

?>
<html>

<head>
    <?php include "../header.html"; ?>
    <style>
    .input-field input[type=text]:focus+label {
        color: #ee6e73;
    }

    /* label underline focus color */
    .input-field input[type=text]:focus {
        border-bottom: 1px solid#ee6e73;
        box-shadow: 0 1px 0 0 #ee6e73;
    }
    </style>
</head>

<body>
    <main>
        <?php include('../navbar.php');?>
        <br>

        <!-- inizio pagina -->
        <div class="container">
            <div class="row">
                <div id="info" class="col l5 offset-l3">
                    <ul class="collection z-depth-3">
                        <li class="collection-item">
                            <div><?php echo $titolare;?><i
                                    class="secondary-content material-icons deep-orange-text">person</i></div>
                        </li>
                        <li class="collection-item">
                            <div><?php echo $_SESSION['email'];?><i
                                    class="secondary-content material-icons deep-orange-text">email</i></div>
                        </li>
                        <li class="collection-item">
                            <div><?php echo $nC; ?><i
                                    class="secondary-content material-icons deep-orange-text">credit_card</i></div>
                        </li>
                        <li class="collection-item">
                            <div>€ <span id="saldo"><?php echo $saldo;?></span><i
                                    class="secondary-content material-icons deep-orange-text">euro_symbol</i></div>
                        </li>
                    </ul>
                    <br>


                </div>
            </div>

        </div>

    </main>
    <?php include "../footer.html"; ?>

</body>

</html>