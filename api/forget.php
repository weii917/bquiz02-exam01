<?php
include_once "db.php";
// user資料庫找post來的email
$user = $User->find(['email' => $_POST['email']]);
// 判斷此陣列是否為空，撈出user的密碼
if (empty($user)) {
    echo "查無此資料";
} else {
    echo "您的密碼為: " . $user['pw'];
}
