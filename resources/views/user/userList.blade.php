<div>
@extends('myHeader/myHeader')
</div>
<div align="center">
		<h1>ユーザー一覧</h1>
		<form action="authRegister" method="GET">
			<input type="submit" value="新規登録">
		</form>
	</div>
	@foreach($user as $value)
	<div>
		<label for="user_id">ID　　　　　　　　 </label> <label for="auth">権限 　　　　　　　</label>
		 <label for="user_name">ユーザー名</label><br>
		 <input type="text" name="user_id" value="{{ $value->id }}">
		 <input type="text" name="admin" value="{{ $value->admin_flag ==1? '管理者' : '一般'}}">
		  <input type="text" name="user_name" value="{{ $value->name}}">
		  </div>
	<form action="userEdit" method="GET">
		<input type ="submit" value="編集" >
		<input type="hidden" name="user_id" value="{{ $value->id }}">
		<input type="hidden" name="user_name" value="{{ $value->name}}">
		<input type="hidden" name="admin" value="{{ $value->admin_flag}}">
		<input type="hidden" name="pw" value="{{ $value->password}}">
	</form>
	<form action="userDeleteConfirm" method="GET">
		<input type="submit" value="削除"> 
		<input type="hidden" name="user_id" value="{{ $value->id }}">
	</form>
@endforeach