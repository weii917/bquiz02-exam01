<!-- 12.1 設計㇐個新增文章的功能，可以輸入標題及文章內容，選取文章的分類後，進行新增 -->
<fieldset>
    <legend>新增文章</legend>
    <form action="./api/add_news.php" method="post">
        <div style="width:80%;padding-left:50px;margin:auto">
            <div>
                <div style="display: flex; align-items:center;"><label for="">文章標題</label>
                    <input style="width:70%" type="text" name="title" id="">
                </div>
            </div>
            <div>
                <div style="display: flex; align-items:center;">文章分類
                    <select name="type" id="">
                        <option value="1">健康新知</option>
                        <option value="2">菸害防治</option>
                        <option value="3">癌症防治</option>
                        <option value="4">慢性病防治</option>
                    </select>
                </div>
            </div>
            <div>
                <div style="display: flex; align-items:center;">
                    <label for="">文章內容</label>
                    <textarea name="text" id="" style="width:70%;height:250px;"></textarea>
                </div>
            </div>
        </div>

        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>