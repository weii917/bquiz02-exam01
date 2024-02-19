<?php
// 移除SESSION['user']登出，導回首頁
session_start();
unset($_SESSION['user']);
header("location:../index.php");
