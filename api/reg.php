<?php
include_once "db.php";
// 將多餘的資料pw2移除才能存進資料庫
unset($_POST['pw2']);
$User->save($_POST);
