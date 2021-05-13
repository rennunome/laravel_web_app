<form action="userEditValidation" method="POST">
<div align="center">
<h1>ユーザー編集</h1>
<label for="user_name">ユーザーID：</label>
<input type="text" name="user_id" id="user_id" value="{{ $user->id }}" readonly><br>
<label for="user_name">ユーザー名：</label>
<input type="text" name="user_name" id="user_name" value="{{ $user->name }}" readonly><br>
<label for="password">PW：</label>
<input type="text" name="password" id="password" value="{{ $user->password }}"><br>
<label for="passwordconfirm">PW確認：</label>
<input type="text" name="password_confirm" id="password_confirm"><br>
@if(isset($error_pw))
<?php echo $error_pw; ?>
@endif
<br>
			<label for="admin">管理者</label>
			@if ($user->admin == 1)
			<input type="checkbox" name="admin" checked>
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
		<input type="submit" value="戻る" />
	</form>
</div>