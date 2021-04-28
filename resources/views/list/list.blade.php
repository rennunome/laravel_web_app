<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>List</title>
<body>
<div align="center">
<h2>問題一覧画面</h2>
<form action="register" method="post">
<input type="submit" value="新規登録" />
</form>
</div>
// <?php foreach ($q_list as $q_value) {?>
<label for="question_id">問題：<?= $q_value['id'] ?></label>
<!-- 	<input type="text" name="question" id="question_id" -->
		value="<?= $q_value['question']; ?>" readonly />
// <?php		
// foreach ($ca_list as $ca_value) {
//         if ($ca_value['questions_id'] == $q_value['id']) {
//             ?>
<label for="answer_id">答え：<?= $ca_value['id'] ?></label>
	<input type="text" name="answer[]" value="<?= $ca_value['answer']; ?>"
<!-- 		readonly /> -->
// <?php
// }
// ?>
// <?php
// }
// ?>
<!-- 	<form action="edit.php" method="GET"> -->
<!-- 		<input type="hidden" name="questions_id" -->
			value="<?= $q_value['id']; ?>" /> 
<!-- 			<input type="submit" value="編集" /> -->
<!-- 	</form> -->
<!-- 	<form action="delete_confirm.php" method="GET"> -->
<!-- 		<input type="hidden" name="questions_id" -->
			value="<?= $q_value['id']; ?>" /> <input type="submit"
<!-- 			value="削除" /> -->
<!-- 	</form> -->
	<?php
//     }
//    ?>
   
</body>
</html>