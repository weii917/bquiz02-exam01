<?php
// 13.3未登入的會員點選「結果」可呈現問卷統計結果
// 13.5並正確顯示該問卷投票後的統計結果
$que = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置:首頁 > 問卷調查 > <?= $que['text']; ?></legend>
    <h3> <?= $que['text']; ?></h3>


    <?php

    $opts = $Que->all(['subject_id' => $_GET['id']]);
    foreach ($opts as $idx => $opt) {
        //判斷總投票數是否為0，避免發生分母為0的錯誤
        $total = ($que['vote'] != 0) ? $que['vote'] : 1;
        //計算選項票數/總票數的比例
        $rate = round($opt['vote'] / $total, 2);
    ?>
        <!-- 在文字面前加編號使用idx+1 -->
        <!--  依照計算的票數比例來計算長條圖長度 -->
        <div style="display:flex;align-items:center;margin:10px 0">

            <div style="width:50%"><?= ($idx + 1) . ". " . $opt['text'] ?></div>
            <div style="width:<?= (40 * $rate); ?>%;height:20px;background-color:#ccc"></div>
            <div style="width:10%"><?= $opt['vote'] ?>票(<?= $rate * 100 ;?>%)</div>
        </div>
    <?php

    } ?>
    <div class="ct">
        <button onclick="location.href='?do=que'">返回</button>
    </div>

</fieldset>