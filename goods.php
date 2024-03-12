<!-- 將資料庫連線載入 -->
<?php require_once('connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php"); ?>

<!doctype html>
<html lang="zh-TW">

<head>
    <!-- 引入網頁標題 -->
    <?php require_once("./mod/headfile.php"); ?>
</head>

<body>
    <section class="header">
        <!-- 引入上方導覽列 -->
        <?php require_once("./mod/header.php") ?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-2">
                    <!-- 引入sidebar分類導覽 -->
                    <?php require_once("./mod/sidebar.php"); ?>
                </div>
                <div class="col-md-10">
                    <!-- 建立類別分頁 -->
                    <?php require_once("./mod/breadcrumb.php"); ?>
                    <!-- 產品詳細資訊 -->
                    <?php require_once("./mod/goods_content.php"); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <?php require_once("./mod/footer.php"); ?>
    </section>


    <?php require_once("./mod/jsfile.php"); ?>
</body>

</html>