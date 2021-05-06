<h2>問題・答え登録確認画面</h2>
	<form action= "/reg" method="POST">
	@csrf
    <label for="question">問題</label>
    <input type="text" name="question"  value="<?= $question ?>" readonly /><br />
    <label for="answer">答え</label>
     <?php
 if (is_countable($answers)) {
     for ($i=0; $i<count($answers); $i++){?>
    <input type="text" name="answers[]"  value="<?= $answers[$i] ?>" readonly />
    <?php } ?>
     <?php } ?>
    <input type="submit" name="confirm" value="登録">
    </form>
<div align="right">
	<form action="reg" method="post">
	@csrf
		<input type="submit" value="戻る" />
	</form>
</div>