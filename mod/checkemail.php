<?php
/* 檢測email帳號是否註冊過(已有資料則row值為1=>已註冊) */
include_once("../connections/conn_db.php");
if(isset($_GET['email'])) {
    $email = $_GET['email'];
    $query = "SELECT emailid FROM `member` WHERE `email` = '".$email."'";
    $result = $link->query($query);
    $row = $result->rowCount();
    if($row==0) {
        echo 'true';
        return ;
    }
}
echo 'false';
return ;
?>