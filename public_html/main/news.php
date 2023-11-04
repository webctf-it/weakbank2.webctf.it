<?php
include_once "../funcs/dbConn.php";
if(isset($_GET['news']) && !empty($_GET['news']))
    $query = "SELECT titolo,data,target,descrizione FROM news WHERE id_news=".$_GET['news']." LIMIT 1";
else
    $query = "SELECT titolo,data,target,descrizione FROM news WHERE 0=1";
$res = $conn->query($query);
?>
<html>

<head>
    <?php include "../header.html"; ?>
</head>

<body>
    <main>
        <?php include('../navbar.php'); ?>
        <br>
        <div class="container">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="card">
                        <div class="card-content white-text">
                            <?php
                            $row = $res->fetch_assoc();
                            echo '
                <h3 class="red-text center" title="titolo">' . $row['titolo'] . '</h3>
                <span class="left white-text badge deep-orange lighten-1" title="target">' . $row['target'] . '</span>
                <span class="center black-text" title="data">' . $row['data'] . '</span><br>
                <div class="row">
                  <div class="col l6 offset-l3">
                    <p class="black-text left-align" title="descrizione">' . $row['descrizione'] . '</p>
                  </div>
                </div>
                ';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "../footer.html"; ?>
</body>

</html>
