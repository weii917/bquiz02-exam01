<fieldset>
    <legend>目前位置:首頁 > 人氣文章區 </legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td></td>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], "order by `good` desc limit $start,$div");
        foreach ($rows as $row) {
        ?>

            <tr>
                <td>
                    <div class='title' data-id="<?= $row['id']; ?>"><?= $row['title']; ?></div>
                </td>
                <td>
                    <div>
                        <?= mb_substr($row['text'], 0, 25); ?>...
                    </div>
                    <div id="p<?= $row['id']; ?>" class="pop">
                        <h3 style="color:skyblue"> <?= $row['title']; ?></h3>
                        <?= $row['text']; ?>
                    </div>
                </td>
                <td>
                    <span> <?= $row['good']; ?></span>個人說
                    <img src="./icon/02B03.jpg" style="width:25px">
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) {
                            echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                        } else {
                            echo "<a href='Javascript:good({$row['id']})'>讚</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php

        } ?>
    </table>

    <div>

        <?php

        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='?do=pop&p=$prev'>";
            echo "<";
            echo "</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:22px' : 'font-size:16px';
            echo "<a href='?do=pop&p=$i' style='$size'>";
            echo $i;
            echo "</a>";
        }
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=pop&p=$next'>";
            echo ">";
            echo "</a>";
        }
        ?>
    </div>
</fieldset>

<script>
    //點擊事件改為hover
    $(".title").hover(
        function() {
            //先將所有的pop隱藏起來
            $(".pop").hide()
            //取得點擊的id
            let id = $(this).data("id")
            //將對應的pop顯示出來
            $("#p" + id).show();
        }
    )
</script>