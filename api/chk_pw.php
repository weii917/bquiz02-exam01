<?php
include_once "db.php";
// 計算資料庫User裡有無$_POST來的acc、pw=>1筆代表有
// 存進session['user'] 登入成功
$res = $User->count($_POST);

if ($res) {
    $_SESSION['user'] = $_POST['acc'];
}

echo $res;
