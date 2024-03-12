<!-- 將資料庫連線載入 -->
<?php require_once('connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php"); ?>

<!doctype html>
<html lang="zh-TW">

<head>
<?php require_once("./mod/headfile.php"); ?>
</head>

<body>
    <section class="header">
        <?php require_once("./mod/header.php"); ?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php require_once("./mod/carousel.php") ?>
            </div>
            <div class="row item mt-2">
                <div class="col-md-12 text-center">
                    <h2>
                        <i class="fa-solid fa-feather-pointed"></i>
                        <i class="fa-solid fa-feather-pointed"></i>人氣商品
                        <i class="fa-solid fa-feather-pointed"></i>
                        <i class="fa-solid fa-feather-pointed"></i>
                    </h2>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="img-container"><img src="./images/item01.jpg" class="card-img-top" alt="..."></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">鳥窩</h5>
                            <p class="card-text">溫馨角落窩鸚鵡毛毯保暖保溫鳥窩</p>
                            <p class="text-center"><a href="#" class="btn btn-parrot">查看更多</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="img-container"><img src="./images/item02.jpg" class="card-img-top" alt="..."></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">玩具</h5>
                            <p class="card-text">純天然松塔球花丟籠內鸚鵡松鼠磨牙玩耍玩具</p>
                            <p class="text-center"><a href="#" class="btn btn-parrot">查看更多</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="img-container"><img src="./images/item03.jpg" class="card-img-top" alt="..."></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">甜竹</h5>
                            <p class="card-text">甜竹天然高纖維甜竹鸚鵡最愛磨牙玩具</p>
                            <p class="text-center"><a href="#" class="btn btn-parrot">查看更多</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="img-container"><img src="./images/item04.jpg" class="card-img-top" alt="..."></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">三角窩</h5>
                            <p class="card-text">冬款加厚過冬窩鸚鵡窩鳥睡覺窩三角窩</p>
                            <p class="text-center"><a href="#" class="btn btn-parrot">查看更多</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 show">
                <div class="col-md-12 text-center">
                    <h2>
                        <i class="fa-solid fa-feather-pointed"></i>
                        <i class="fa-solid fa-feather-pointed"></i>
                        鸚寶試用展示
                        <i class="fa-solid fa-feather-pointed"></i>
                        <i class="fa-solid fa-feather-pointed"></i>
                    </h2>
                </div>
                <div class="col-md-6 video">
                    <iframe width="100%" height="320px" src="https://www.youtube.com/embed/XUf1jZeDUko?si=5gPdhlToUFPp3YKD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="col-md-6 video">
                    <iframe width="100%" height="320px" src="https://www.youtube.com/embed/ZskPqrXdS2c?si=eSqTzkSaeXzPxtYb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <?php require_once("./mod/footer.php"); ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>