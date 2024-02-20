<?php
// 13.4點選「參與投票」可顯示該問卷的詳細內容
$que = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置:首頁 > 問卷調查 > <?= $que['text']; ?></legend>
    <h3> <?= $que['text']; ?></h3>

    <form action="./api/vote.php" method="post">
        <?php
        //根據主題的id取得所有的選項
        $opts = $Que->all(['subject_id' => $_GET['id']]);
        foreach ($opts as $opt) {
        ?>
            <div>
                <input type="radio" name="opt" value="<?= $opt['id'] ?>">
                <?= $opt['text'] ?>
            </div>
        <?php

        } ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>