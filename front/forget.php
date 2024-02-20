<!-- 8.4 點選「忘記密碼 -->
<fieldset style="width:50%;margin:auto">
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div>
        <input type="text" name="email" id="email">
    </div>
    <div id='result'></div>
    <div>
        <button onclick="forget()">尋找</button>
    </div>
</fieldset>
<!-- 8.5 顯示查詢密碼查詢結果 -->
<script>
    // 將密碼post到後台回傳的結果text到#result
    function forget() {
        $.post("./api/forget.php", {
            email: $("#email").val()
        }, (res) => {
            $("#result").text(res)

        })

    }
</script>