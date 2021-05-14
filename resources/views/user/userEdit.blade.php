<form action="userEditValidation" method="POST">
@csrf
<div align="center">
<h1>ユーザー編集</h1>
<label for="user_name">ユーザーID：</label>
<input type="text" name="user_id" id="user_id" value="<?=$user_id ?>" readonly /><br>
<label for="user_name">ユーザー名：</label>
<input type="text" name="user_name" id="user_name" value="<?=$user_name ?>" /><br>
<label for="password">PW：</label>
<input type="text" name="pw" id="password" value="<?=$pw ?>"><br>
<label for="passwordconfirm">PW確認：</label>
<input type="text" name="password_confirm" id="password_confirm"><br>
@if(isset($error_un))
<?php echo $error_un; ?>
@endif
@if(isset($error_pw))
<?php echo $error_pw; ?>
@endif
<br>
			<label for="admin">管理者</label>
			@if ($admin == 1)
			<input type="checkbox" name="admin" checked />
			@else
			<input type= "checkbox" name="admin">
			@endif
			<br>
	</div>
	<div align="right">
		<input type="submit" value="確認">
	</div>
	</form>
<div align="right">
	<form action="userList" method="GET">
	@csrf
		<input type="submit" value="戻る" />
	</form>
</div>