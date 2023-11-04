<?php
include_once "../funcs/dbConn.php";
$flag = false;
$category_filter = empty($_GET['category']) ? '' : $_GET['category'];

//Select filtered news
if ($category_filter == "all") $query = "SELECT * from news";
else $query = "SELECT * FROM news WHERE target='$category_filter'";

$res = $conn->query($query);
if (!$res) trigger_error('Invalid query: ' . $conn->error);
if ($res->num_rows > 0) $rows = $res->fetch_all(MYSQLI_ASSOC);
$numberOfColumns = 6;

//Get badges
$badge_result = $conn->query("SELECT DISTINCT target FROM news");
if ($res->num_rows > 0) $badges = $badge_result->fetch_all(MYSQLI_ASSOC);
else $badges =  '';
?>
<html>

<head>
    <?php include "../header.html"; ?>
</head>

<body>
    <main>
        <?php include('../navbar.php'); ?>
        <div class="container">
            <div class="row mt-3">
                <h2>News in category: <strong><?php echo $category_filter; ?></strong></h2>
            </div>
            <div class="row mt-3">
                <div class="col l2 m3 s3">
                    <a href="/main/allnews.php?category=all">
                        <button class="btn waves-effect waves-light">
                            All
                        </button>
                    </a>
                </div>

                <?php
                if ($badge_result->num_rows) :
                    foreach ($badge_result as $badge) : ?>
                <div class="col l2 m3 s3">

                    <a href="/main/allnews.php?category=<?php echo $badge['target']; ?>">
                        <button class="btn waves-effect waves-light">
                            <?php echo $badge['target']; ?>
                        </button>
                    </a>
                </div>
                <?php endforeach;
            endif;
            ?>

            </div>
            <?php
            if ($res->num_rows > 0) :
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
                            <p class="teal-text"><?php echo $row['target']; ?></p>
                        </div>

                        <div class="card-action center-align">
                            <a href="news.php?news=<?php echo $row['id_news']; ?>">View single news</a>
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

    </main>
    <?php include "../footer.html"; ?>

</body>

</html>
