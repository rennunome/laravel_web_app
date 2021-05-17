<form action="userDb" method="POST">
<div align="center">
		<h1>ユーザー新規登録内容確認</h1>
		@csrf
			<label for="user_name">ユーザー名：</label>
			<input type="text" name="user_name" id="user_name" value="<?= $user_name ?>" readonly><br>
			<label for="password">PW：</label>
			<input type="text" name="password" id="password" value="<?= $password ?>" readonly><br>
			<label for="passwordconfirm">PW確認：</label>
			<input type="text" name="password_confirm" id="password_confirm" value="<?= $password_confirm ?>" readonly><br>
			<label for="admin">管理者：</label>
			<input type="text" name="admin" value="<?= $admin != "on" ? 'なし' : 'あり' ?>" readonly>
			<input type="hidden" name="admin" value="<?= $admin ?>"><br>
			<label for="user_name">Eメールアドレス：</label>
		<input type="text" name="email" id="email" value="<?=$email?>"  readonly/>
	</div>
	<div align="right">
		<input type="submit" value="登録">
	</div>
	</form>
	<br>
	<div align="right">
		<form action="userRegister" method="GET">
			<input type="submit" value="戻る">
		</form>
	</div>