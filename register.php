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
    <style>
        .register .input-group>.form-control {
            width: 100%;
        }

        span.error-tips,
        span.error-tips::before {
            font-family: "Font Awesome 5 Free";
            color: red;
            font-weight: 900;
            content: "\f05e";
        }

        span.valid-tips,
        span.valid-tips::before {
            font-family: "Font Awesome 5 Free";
            color: darkgreen;
            font-weight: 900;
            content: "\f00c";
        }
    </style>
    <script type="text/javascript" src="./js/commlib.js"></script>
</head>

<body>
    <section class="header">
        <!-- 引入上方導覽列 -->
        <?php require_once("./mod/header.php") ?>
    </section>
    <?php
    if (isset($_POST['formctl']) && $_POST['formctl'] == 'reg') {
        $email = $_POST['email'];
        $pw1 = md5($_POST['pw1']);
        $cname = $_POST['cname'];
        $tssn = $_POST['tssn'];
        $birthday = $_POST['birthday'];
        $mobile = $_POST['mobile'];
        $myZip = $_POST['myZip'] == '' ? NULL : $_POST['myZip'];
        $address = $_POST['address'] == '' ? NULL : $_POST['address'];
        $imgname = $_POST['imgname'] == '' ? NULL : $_POST['imgname'];
        $insertsql = "INSERT INTO member (email, pw1, cname, tssn, birthday, imgname) VALUES ('" . $email . "','" . $pw1 . "','" . $cname . "','" . $tssn . "','" . $birthday . "','" . $imgname . "')";
        $Result = $link->query($insertsql);
        $emailid = $link->lastInsertId();  //讀取剛新增的會員編號
        if ($Result) {
            //將會員姓名、電話、寫入addbook
            $insertsql = "INSERT INTO addbook (emailid, setdefault, cname, mobile, myZip, address) VALUES ('" . $emailid . "','1','" . $cname . "','" . $mobile . "','" . $myZip . "','" . $address . "')";
            $Result = $link->query($insertsql);
            $_SESSION['login'] = true;  //設定會員註冊完直接登入
            $_SESSION['emailid'] = $emailid;
            $_SESSION['email'] = $email;
            $_SESSION['cname'] = $cname;
            echo "<script language = 'javascript'>alert('謝謝您，會員資料已完成註冊');location.href='index.php';</script>";
        }
    }
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-2">
                    <!-- sidebar分類導覽 -->
                    <?php require_once("./mod/sidebar.php"); ?>
                </div>
                <div class="col-md-10 register">
                    <!-- 會員註冊 -->
                    <?php //require_once("./mod/register_content.php"); 
                    ?>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1>會員註冊頁面</h1>
                            <p>請輸入相關資料，*為必需輸入欄位</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-2 text-left">
                            <form action="register.php" id="reg" name="reg" method="POST">
                                <div class="input-group mb-3">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="*請輸入email帳號">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" id="pw1" name="pw1" class="form-control" placeholder="*請輸入密碼">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" id="pw2" name="pw2" class="form-control" placeholder="*請再次確認密碼">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" id="cname" name="cname" class="form-control" placeholder="*請輸入姓名">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" id="tssn" name="tssn" class="form-control" placeholder="請輸入身份證字號">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" id="birthday" name="birthday" onfocus="(this.type='date')" class="form-control" placeholder="*請選擇生日">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="請輸入手機號碼">
                                </div>
                                <div class="input-group mb-3">
                                    <select name="myCity" id="myCity" class="form-control">
                                        <option value="">請選擇市區</option>
                                        <?php $city = "SELECT * FROM city WHERE State=0";
                                        $city_rs = $link->query($city);
                                        while ($city_rows = $city_rs->fetch()) { ?>
                                            <option value="<?php echo $city_rows['AutoNo']; ?>"><?php echo $city_rows['Name']; ?></option>
                                        <?php } ?>
                                    </select><br>
                                    <select name="myTown" id="myTown" class="form-control">
                                        <option value="">請選擇地區</option>
                                    </select>
                                </div>
                                <label for="address" class="form-label" id="zipcode" name="zipcode">郵遞區號：地址</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="myZip" id="myZip" value="">
                                    <input type="text" id="address" name="address" class="form-control" placeholder="請輸入後續地址">
                                </div>
                                <label for="fileToUpload" class="form-label">上傳相片：</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" title="請上傳相片圖示" accept="image/x-png,image/jpeg,image/gif,image/jpg">
                                    <p class="mt-1"><button type="button" class="btn btn-danger" id="uploadForm" name="uploadForm">開始上傳</button></p>

                                    <div id="progress-div01" class="progress" style="width:100%; display:none;">
                                        <div id="progress-bar01" class="progress-bar progress-bar-striped" role="progressbar" aria-label="Default striped example" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div>

                                    <input type="hidden" name="uploadname" id="uploadname" value="">
                                    <img src="" alt="photo" id="showimg" name="showimg" style="display:none;">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="captcha" id="captcha" value="">
                                    <a href="javascript:void(0);" title="按我更新認證碼" onclick="getCaptcha();">
                                        <canvas id="can"></canvas>
                                    </a>
                                    <input type="text" name="recaptcha" id="recaptcha" class="form-control" placeholder="請輸入認證碼">
                                </div>
                                <input type="hidden" name="formctl" id="formctl" value="reg">
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-success btn-lg">送出</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <?php require_once("./mod/footer.php"); ?>
    </section>


    <?php require_once("./mod/jsfile.php"); ?>
    <script type="text/javascript" src="./js/jquery.validate.js"></script>
    <script type="text/javascript">
        //自訂身分證格式驗證
        jQuery.validator.addMethod("tssn", function(value, element, param) {
            var tssn = /^[a-zA-Z]{1}[1-2]{1}[0-9]{8}$/;
            return this.optional(element) || (tssn.test(value));
        });
        //自訂手機格式驗證
        jQuery.validator.addMethod("checkphone", function(value, element, param) {
            var checkphone = /^[0]{1}[9]{1}[0-9]{8}$/;
            return this.optional(element) || (checkphone.test(value));
        });
        //自訂郵遞區號驗證
        jQuery.validator.addMethod("checkMyTown", function(value, element, param) {
            return (value !== "");
        });

        //驗證form #reg表單
        $('#reg').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: './mod/checkemail.php'
                },
                pw1: {
                    required: true,
                    maxlength: 20,
                    minlength: 4,
                },
                pw2: {
                    required: true,
                    equalTo: '#pw1'
                },
                cname: {
                    required: true,
                },
                tssn: {
                    required: true,
                    tssn: true,
                },
                birthday: {
                    required: true,
                },
                mobile: {
                    required: true,
                    checkphone: true,
                },
                address: {
                    required: true,
                },
                myTown: {
                    checkMyTown: true,
                },
                recaptcha: {
                    required: true,
                    equalTo: '#captcha',
                },
            },

            messages: {
                email: {
                    required: 'email信箱不得為空白',
                    email: 'email信箱格式有誤',
                    remote: 'email信箱已經註冊'
                },
                pw1: {
                    required: '密碼不得為空白',
                    maxlength: '密碼最大長度為20位(4-20位英文字母與數字的組合)',
                    minlength: '密碼最小長度為4位(4-20位英文字母與數字的組合)',
                },
                pw2: {
                    required: '確認密碼不得為空白',
                    equalTo: '兩次輸入的密碼必須一致！'
                },
                cname: {
                    required: '使用者名稱不得為空白',
                },
                tssn: {
                    required: '身份證ID不得為空白',
                    tssn: '身份證ID格式有誤',
                },
                birthday: {
                    required: '生日不得為空白',
                },
                mobile: {
                    required: '手機號碼不得為空白',
                    checkphone: '手機號碼格式有誤',
                },
                address: {
                    required: '地址不得為空白',
                },
                myTown: {
                    checkMyTown: '需選擇郵遞區號',
                },
                recaptcha: {
                    required: '驗證碼不得為空白！',
                    equalTo: '驗證碼需相同！',
                },
            },
        })

        $(function() {
            //取得縣市代碼後查鄉鎮市的名稱
            $("#myCity").change(function() {
                var CNo = $('#myCity').val();
                if (CNo == "") {
                    return false;
                }
                $.ajax({
                    url: './mod/Town_ajax.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        CNo: CNo,
                    },
                    success: function(data) {
                        if (data.c == true) {
                            $('#myTown').html(data.m);
                            $('#myZip').val("");
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function(data) {
                        alert("系統目前無法連接到後台資料庫");
                    }
                })
            });
            //取得鄉鎮市代碼，查詢郵遞區號放入#myZip,#zipcode
            $("#myTown").change(function() {
                var AutoNo = $('#myTown').val();
                if (AutoNo == "") {
                    return false;
                }
                $.ajax({
                    url: './mod/Zip_ajax.php',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        AutoNo: AutoNo,
                    },
                    success: function(data) {
                        if (data.c == true) {
                            $('#myZip').val(data.Post);
                            $('#zipcode').html(data.Post + data.Cityname + data.Name);
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function(data) {
                        alert("系統目前無法連接到後台資料庫");
                    }
                })
            });
        });

        //啟動認證碼功能
        getCaptcha();

        function getCaptcha() {
            var inputTxt = document.getElementById("captcha");

            //captchaCode("canvas的ID",寬,高,背景顏色,文字顏色,字體大小,文字數量)
            inputTxt.value = captchaCode("can", 150, 50, "orange", "white", "28px", 5);
        }

        //取得元素ID
        function getId(el) {
            return document.getElementById(el)
        }
        //圖示上傳處理
        $("#uploadForm").click(function(e) {
            var fileName = $("#fileToUpload").val();
            var idxDot = fileName.lastIndexOf(".") + 1;
            let extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
            if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
                $("#progress-div01").css("display", "flex");
                let file1 = getId("fileToUpload").files[0];
                let formdata = new FormData();
                formdata.append("file1", file1);
                let ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "./mod/file_upload_parser.php");
                ajax.send(formdata);
                return false
            } else {
                alert("目前只支援jpg, jpeg, png, gif檔案格式上傳!");
            }
        });
        //上傳過程顯示百分比
        function progressHandler(event) {
            let percent = Math.round((event.loaded / event.total) * 100)
            $("#progress-bar01").css("width", percent + "%")
            $("#progress-bar01").html(percent + "%")
        }
        //上傳完成處理顯示圖片
        function completeHandler(event) {
            let data = JSON.parse(event.target.responseText)
            if (data.success == 'true') {
                $('#uploadname').val(data.fileName)
                $('#showimg').attr({
                    'src': 'uploads/' + data.fileName,
                    'style': 'display:block;'
                })
                $('button.btn.btn-danger').attr({
                    'style': 'display:none;'
                })
            } else {
                alert(data.error)
            }
        }

        function errorHandler(event) {
            alert("Upload Failed: 上傳發生錯誤")
        }

        function abortHandler(event) {
            alert("Upload Aborted: 上傳作業取消")
        }
    </script>
</body>

</html>