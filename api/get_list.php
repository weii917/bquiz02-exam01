<?php
include_once "db.php";
//取得所有指定分類的文章，撈出get來的type並且為顯示
$rows = $News->all(['type' => $_GET['type'], 'sh' => 1]);
//在前台顯示連結，使用迴圈來印出title文字及link內容，link裡的function帶有參數id
//透過id用ajax get帶參數到後台執行(api/get_news.php)找到該文章
foreach ($rows as $row) {
?>
    <div>
        <a href="Javascript:getNews(<?= $row['id'] ?>)"><?= $row['title'] ?></a>
    </div>

<?php
}
?>