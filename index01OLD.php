<!-- 將資料庫連線載入 -->
<?php require_once('connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php"); ?>

<!doctype html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>鸚仔鋪</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
</head>

<body>
    <section class="header">
        <div class="container-fluid">
            <div class="search row">
                <div class="col-md-6">
                    <a href="#" title="facebook"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" title="LINE"><i class="fa-brands fa-line"></i></a>
                    <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                </div>
                <div class="col-md-3">
                    <div class="searchbar">
                        <form name="search" action="" id="search" method="get">
                            <div class="input-group">
                                <input type="text" name="search-name" class="form-control" placeholder="Search...">
                                <span class="input-group-bth">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fas fa-search fa-lg"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="#" title="會員中心"><i class="fa-solid fa-user"></i></a>
                    <a href="#" title="購物車"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="#" title="願望清單"><i class="fa-solid fa-heart"></i></a>
                </div>
            </div>
            <div class="nav row">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"><img src="./images/logo.jpg" alt="logo" class="logo" title="鸚仔鋪"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="#">所有商品</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">新上架</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">SALE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">主食</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">玩具</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">籠子</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">沐浴</a>
                                </li>
                            </ul>
                        </div>
                        <div class="parrotImg">
                            <img src="./images/egg.png" alt="" width="50px">
                            <img src="./images/parrot.png" alt="" width="100px">
                            <img src="./images/parrot.png" alt="" width="70px">
                            <img src="./images/egg.png" alt="" width="30px">
                            <img src="./images/parrot.png" alt="" width="100px">
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div id="carouselExampleCaptions" class="carousel slide col-md-12" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./images/img01.jpg" class="d-block w-100" alt="鸚仔鋪">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>關於鸚仔鋪</h5>
                                <p>主打「檢驗合格」的鸚鵡認證飼料，鸚鵡穀物飼料全品項均通過「intertek」農藥殘留檢驗全數通過！嚴格把關所有原料品質，共同守護鳥寶健康！</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./images/img02.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>穀物首選</h5>
                                <p>低溫烘培 營養加分 日常補充</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./images/img03.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>熱門鮮果飼料</h5>
                                <p>每日的健康 鸚仔鋪與您共同堅守</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
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
        <div class="container-fluid">
            <div class="row about mt-5 text-center">
                <div class="col-md-3">
                    <h3><i class="fa-solid fa-circle-info"></i>關於</h3>
                    <p><a href="#">關於鸚仔鋪</a></p>
                    <p><a href="#">聯絡我們</a></p>
                    <p><a href="#">購物說明</a></p>
                </div>
                <div class="col-md-3">
                    <h3><i class="fa-solid fa-user-tie"></i>客服資訊</h3>
                    <p><a href="#">Facebook</a></p>
                    <p><a href="#">LINE</a></p>
                    <p><a href="#">Instagram</a></p>
                </div>
                <div class="col-md-3">
                    <h3><i class="fa-solid fa-circle-question"></i>常見問題</h3>
                    <p><a href="#">訂單相關</a></p>
                    <p><a href="#">寄送方式說明</a></p>
                    <p><a href="#">售後服務說明</a></p>
                </div>
                <div class="col-md-3">
                    <h3><i class="fa-solid fa-link"></i>相關連結</h3>
                    <p><a href="#">文創社團</a></p>
                    <p><a href="#">其他周邊</a></p>
                </div>
            </div>
            <div class="row copy text-center">
                <div class="col-md-12">
                    copyright &copy; 2024 yu's parrot web
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>