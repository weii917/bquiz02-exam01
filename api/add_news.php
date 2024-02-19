<?php
include_once "db.php";
$_POST['good'] = 0;
$_POST['sh'] = 1;
$News->save($_POST);


//導回後台問卷管理頁面
to("../back.php?do=news");
