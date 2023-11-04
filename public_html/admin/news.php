<?php
session_start();
if(!isset($_SESSION['logged'])&&$_SESSION['logged']!=1&&$_SESSION['admin']!=1)
  header('location: index.php');

include_once "../funcs/dbConn.php";

?>
<html lang="it">

<head>
    <?php include "../header.html"; ?>
</head>

<body>
    <main>
        <?php include("admin_navbar.php");?>
        <div class="row">
            <div class="col l4 offset-l1">
                <ul class="collapsible" id="news-list">
                    <?php
                  $result=$conn->query("SELECT * FROM news");
                  if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                      echo '
                      <li>
                      <div class="collapsible-header"><i class="material-icons">library_books</i>'.$row["titolo"].'</div>
                      <div class="collapsible-body" id="'.$row["id_news"].'">
                        <div class="row">
                          <span><b>Description:</b>'.$row["descrizione"].'</span><br>
                          <span><b>Date:</b>'.$row["data"].'</span><br>
                          <span><b>Target:</b>'.$row["target"].'</span><br>
                          <span><b>Cover:</b></span><br>
                          <img src="/assets/news/'.$row["img"].'" class="responsive-img"style="height:300px;">
                        </div>
                        <div class="row">
                          <a href="/main/news.php?news='.$row["id_news"].'"><button type="button"  class="btn orange">Go to news</button></a>
                        </div>
                      </div>
                    </li>
                      ';
                    }
                  }else{
                    echo 'No news';
                  }
              ?>
                </ul>
            </div>
            <!--fine col l5-->
            <div class="col l5 offset-l1">
                <div class="col l12">
                    <div class="card z-depth-2">
                        <div class="card-content">
                            <span class="card-title center red-text">Add News</span>
                            <form method="POST" id="upload_news">
                                <div class="row">
                                    <div class="input-field col l6 offset-l2">
                                        <textarea id="titolo" name="titolo" class="materialize-textarea"
                                            placeholder="Title" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l6 offset-l2">
                                        <textarea id="descrizione" name="descrizione" class="materialize-textarea"
                                            placeholder="Description" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col l3 offset-l2">
                                        <input type="text" id="target" name="target" placeholder="Target" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col l5 offset-l2">
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>File</span>
                                                <input type="file" id="cover">
                                                <span class="helper-text" id="response-message"></span>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="center">
                                    <input type="submit" value="Add News" name="aggiungi_news"
                                        class="btn blue col l7 offset-l2">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--fine row interna-->
        </div>
        <!--fine row-->
    </main>

    <?php include "../footer.html"; ?>
    <script src="/js/news.js"></script>
</body>

</html>
