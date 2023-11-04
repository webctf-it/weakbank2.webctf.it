<?php
session_start();
if(!isset($_SESSION['logged'])&&$_SESSION['logged']!=1||$_SESSION['admin']!=1)
  header('location: /index.php');

include_once "../funcs/dbConn.php";

?>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Material Icons Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css" integrity="sha384-VP0GfisErC22dnswxVzLKdy1z+wIV3p/iGyahqdhsuFvfu9wrRUaXUAdLWPN7E8m" crossorigin="anonymous">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <main>
        <?php include("admin_navbar.php");?>
        <div class="container">
            <div class="row center-align">
                <h3>List of clients</h3>
            </div>
            <div class="row center-align">
                <div class="col l4 m12 offset-l4 ">
                    <?php
                         $result=$conn->query("SELECT id_conto,titolare,nCarta,cvv,data_scadenza,email FROM conti_bancari AS c INNER JOIN users AS u ON u.id_utente=c.utente;");
                        if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo '
                                <div class="col l12 m12">
                                <div class="card small white" id="'.$row['id_conto'].'">
                                    <div class="card-content">
                                    <span class="grey-text">Holder: '.$row['titolare'].'</span><br><br>
                                    <span class="grey-text">Email: '.$row['email'].'</span><br><br>
                                    <span class="grey-text">Card Number: '.$row['nCarta'].'</span><br><br>
                                    <span class="grey-text">Expiration Date: '.$row['data_scadenza'].'</span>
                                    </div>
                                </div>
                                </div>
                            ';
                        }

                        }else{
                        echo "There are not clients";
                        }
                    ?>
                </div>
            </div>
        </div>

    </main>

    <?php include"../footer.html";?>

    <script src="/js/admin.js"></script>
</body>

</html>
