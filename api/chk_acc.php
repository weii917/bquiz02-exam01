<?php
include_once "db.php";
// 計算資料庫User裡有無acc得出0或1，1=有、0=無
$res = $User->count(['acc' => $_POST['acc']]);
if ($res > 0) {
    echo 1;
} else {
    echo 0;
}

//簡化
//echo $User->count(['acc'=>$_POST['acc']]);