<?php
include "funcs/checkLogin.php";
include_once "funcs/dbConn.php";
$result = $conn->query("SELECT id_news,titolo,data,img,target FROM news LIMIT 4");
if ($result->num_rows > 0) $rows = $result->fetch_all(MYSQLI_ASSOC);
$numberOfColumns = 6;
?>
<html>

<head>
    <?php include "header.html"; ?>

</head>

<body>
    <main>
        <?php include('navbar.php'); ?>
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="center-align">Bank's news</h1>
            </div>
            <div id="news">
                <?php
                if ($result->num_rows > 0) :
                    $arrayChunks = array_chunk($rows, $numberOfColumns);
                    foreach ($arrayChunks as $items) : ?>
                <div class="row mt-3">
                    <?php foreach ($items as $row) : ?>
                    <div class="col l6 m12 s12">
                        <div class="card sticky-action" style="overflow: visible;">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="/assets/news/<?php echo $row['img']; ?>">
                            </div>
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4"><?php echo $row['titolo']; ?></span>
                                <p><?php echo $row['data']; ?></p>
                            </div>

                            <div class="card-action center-align">
                                <a href="main/news.php?news=<?php echo $row['id_news']; ?>">View single news</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
                <?php else : ?>
                <h2 class="center-align">No news</h2>
                <?php endif; ?>
            </div>
            <div class="row mt-3">
                <div class="col s12 m12 l12 center-align">
                    <a href="/main/allnews.php?category=all"
                        class="btn-large blue lighten-1 waves-effect waves-light btn">All news</a>
                </div>
            </div>

        </div>
    </main>

    <?php include "footer.html"; ?>
</body>

</html>
