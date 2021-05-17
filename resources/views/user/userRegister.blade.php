<div align="center">
		<h1>ユーザー新規登録</h1>
		</div>
		@if(isset($error_un))
		<?php echo $error_un?>
		@endif
		@if(isset($error_pw))
		<?php echo $error_pw?>
		@endif
		@if(isset($error_em))
		<?php echo $error_em?>
		@endif
		<form action="userValidate" method="GET">
		@csrf
		<label for="user_name">ユーザー名：</label>
		<input type="text" name="user_name" id="user_name" placeholder="半角英数字のみ">
			<br>
		<label for="password">PW：</label> 
		<input type="text" name="password" id="password" placeholder="半角英数字のみ8文字以上"><br>
		<label for="password_confirm">PW確認：</label>
		 <input type="text" name="password_confirm" id="passwordconfirm" placeholder="半角英数字のみ8文字以上"><br>
		  <label for="admin">管理者：</label>
		<input type="checkbox" name="admin"><br>
		<label for="user_name">Eメールアドレス：</label>
		<input type="text" name="email" id="email" placeholder="半角英数字のみ">
	<div align="right">
			<input type="submit" value="確認">
	</div>
	</form>
	<br>
	<div align="right">
		<form action="userList" method="GET">
			<input type="submit" value="戻る">
		</form>
	</div>
