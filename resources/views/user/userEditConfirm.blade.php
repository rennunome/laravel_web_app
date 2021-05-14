<form action="userEdit" method="POST">
@csrf
<div align="center">
<h1>ユーザー編集確認</h1>
<label for="user_name">ユーザーID：</label>
<input type="text" name="user_id" id="user_id" value="<?= $user_id ?>" readonly /><br>
<label for="user_name">ユーザー名：</label>
<input type="text" name="user_name" id="user_name" value="<?= $user_name ?>" readonly /><br>
<label for="password">PW：</label>
<input type="text" name="password" id="password" value="<?= $pw ?>" readonly /><br>
<br>
			<label for="admin">管理者</label>
			@if ($admin != null)
			<input type="checkbox" name="admin" value = "管理者" />
			@else
			<input type= "checkbox" name="admin" value = "一般" />
			@endif
			<br>
	</div>
	<div align="right">
		<input type="submit" value="更新">
	</div>
	</form>
<div align="right">
	<form action="userList" method="GET">
	@csrf
		<input type="submit" value="戻る" />
	</form>
</div>