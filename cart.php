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
                    <!-- sidebar分類導覽 -->
                    <?php require_once("./mod/sidebar.php"); ?>
                </div>
                <div class="col-md-10">
                    <!-- 購物車內容模組 -->
                    <?php require_once("./mod/cart_content.php"); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <?php require_once("./mod/footer.php"); ?>
    </section>


    <?php require_once("./mod/jsfile.php"); ?>
    <script type="text/javascript">
        //將變更的數量寫入後台資料庫
        $("input").change(function() {
            var qty = $(this).val();
            const cartid = $(this).attr("cartid");
            if (qty <= 0 || qty >= 50) {
                alert("更改數量需大於0以上，以及小於50以下。");
                return false;
            }
            $.ajax({
                url: './mod/change_qty.php',
                type: 'post',
                dataType: 'json',
                data: {
                    cartid: cartid,
                    qty: qty,
                },
                success: function(data) {
                    if (data.c == true) {
                        //alert(data.m);
                        window.location.reload();
                    } else {
                        alert(data.m);
                    }
                },
                error: function(data) {
                    alert("系統目前無法連接到後台資料庫");
                }
            });
        });
    </script>
</body>

</html>