<!-- 10 建置帳號後台管理-->
<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_user.php" method="post">
        <table style="width:55%;margin:auto;text-align:center">
            <tr>
                <td class="clo">帳號</td>
                <td class="clo">密碼</td>
                <td class="clo">刪除</td>
            </tr>
            <!-- 判斷除了admin帳號其他都要顯示出來 -->
            <?php
            $rows = $User->all();
            foreach ($rows as $row) {
                if ($row['acc'] != 'admin') {


            ?>
                    <tr>
                        <td><?= $row['acc'] ?></td>
                        <td><?= str_repeat("*", mb_strlen($row['pw'])); ?></td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
        </div>
    </form>
<!-- 10.2後台新增帳號 -->
    <h2>新增會員</h2>
    <span style="color:red ">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="clean()">清除</button>
            </td>

        </tr>
    </table>


    由於後台的新增會員和前台的註冊會員是幾乎一樣的功能，因此可以直接把註冊會員的功能直接複製過來使用即可
</fieldset>