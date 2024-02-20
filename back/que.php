<!-- 14.建置問卷後台管理 -->
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div>
            <div>問卷名稱
                <input type="text" name="subject" id="">
            </div>
        </div>
        <div>
            <div class="clo" id="opt">選項
                <input type="text" name="option[]">
                <input type="button" value="更多" onclick="more()">
            </div>
        </div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>

</fieldset>
<!-- 14.5問卷列表的功能，可以列出目前正在進行中的問卷題目 -->
<!-- 14.6 問卷列表提供開放/關閉的功能，設為＂開放＂時，則可以在前台看到並進行投票；設為＂關閉＂時，則前台無法看到該份問卷．-->
<fieldset>
    <legend>問卷列表 </legend>
    <button onclick="location.href='?do=addnews'">新增文章</button>
    <form action="./api/edit_news.php" method="post">
        <table style="width: 75%;text-align:center;margin:auto">
            <tr>

                <td class="clo" style="width:70%">問卷名稱</td>
                <td class="clo">投票數</td>
                <td class="clo">開放</td>
            </tr>

            <?php


            $rows = $Que->all(['subject_id' => 0]);
            foreach ($rows as $idx => $row) {
            ?>
                <tr>

                    <td><?= $row['text'] ?></td>
                    <td><?= $row['vote'] ?></td>
                    <td>
                        <button class="show-btn" data-id="<?= $row['id']; ?>"><?= ($row['sh'] == 1) ? '開放' : '關閉'; ?></button>
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">

                    </td>

                </tr>


            <?php
            }
            ?>
        </table>

        <div class="ct"><input type="submit" value="修改確定"></div>
    </form>
</fieldset>
<script>
    function more() {
        let opt = ` <div class="clo">選項
                <input type="text" name="option[]">
        
            </div>`
        $("#opt").before(opt);
    }

    //  開放/隱藏按鈕
    $(".show-btn").on("click", function() {
        let id = $(this).data('id');
        $.post("./api/show.php", {
            id
        }, () => {
            location.reload();
            //$(this).text(($(this).text()=='顯示')?"隱藏":"顯示");
        })
    })
</script>