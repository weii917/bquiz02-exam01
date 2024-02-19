<?php
include_once "db.php";
// 如果del裡有此id則刪除
if (isset($_POST['del'])) {
    foreach ($_POST['del'] as $id) {
        $User->del($id);
    }
}
// 回帳戶管理後台
to("../back.php?do=admin");
