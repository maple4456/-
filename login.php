<!-- 將資料庫連線載入 -->
<?php require_once('connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php"); ?>
<?php
//取得要返回的php頁面
if (isset($_GET['sPath'])) {
    $sPath = $_GET['sPath'].".php";
} else {
    //登入完成預設要進入首頁
    $sPath = "index.php";
}
//檢查是否完成登入驗證
if (isset($_SESSION['login'])) {
    header(sprintf("location: %s", $sPath));
}
?>

<!doctype html>
<html lang="zh-TW">

<head>
    <!-- 引入網頁標題 -->
    <?php require_once("./mod/headfile.php"); ?>
    <!-- 會員登入專用css設定 -->
    <style type="text/css">

        /* Card component */
        .mycard.mycard-container {
            max-width: 400px;
            height: 450px;
        }

        .mycard {
            background-color: #F7F7F7;
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 50px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        .profile-img-card {
            margin: 0 auto 10px auto;
            display: block;
            width: 100px;
        }

        .profile-name-card {
            font-size: 20px;
            text-align: center;
        }

        .form-signin input[type="email"],
        .form-signin input[type="password"],
        .form-signin button {
            width: 100%;
            height: 44px;
            font-size: 16px;
            display: block;
            margin-bottom: 20px;
        }

        .btn.btn-signin {
            font-weight: 700;
            background-color: #7B904B;
            color: #fff;
            height: 38px;
            transition: background-color 1s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: #273b09;
        }

        .other a {
            color: #7B904B;
            text-decoration: none;
        }

        .other a:hover,
        .other a:active,
        .other a:focus {
            color: #273b09;
        }
    </style>
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
                    <!-- 引入會員登入系統 -->
                    <?php require_once("./mod/login_content.php"); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <?php require_once("./mod/footer.php"); ?>
    </section>


    <?php require_once("./mod/jsfile.php"); ?>
    <script type="text/javascript" src="./js/commlib.js"></script>
    <div id="loading" name="loading" style="display:none; position:fixed; width:100%; height:100%; top:0; left:0; background-color:rgba(255, 255, 255, .5); z-index:9999;"><i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position:absolute; top:50%; left:50%;"></i></div>

    <script type="text/javascript">
        $(function() {
            $("#form1").submit(function() {
                const inputAccount = $("#inputAccount").val();
                const inputPassword = MD5($("#inputPassword").val());
                $("#lodaing").show();
                //利用$ajax函數呼叫後台的auth_user.php驗證帳號密碼
                $.ajax({
                    url: 'auth_user.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        inputAccount: inputAccount,
                        inputPassword: inputPassword,
                    },
                    success: function(data) {
                        if (data.c == true) {
                            alert(data.m);
                            //window.location.reload();
                            window.location.href = "<?php echo $sPath ?>";
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function(data) {
                        alert("系統目前無法連接到後台資料庫");
                    }
                });
            });
        });
    </script>
</body>

</html>