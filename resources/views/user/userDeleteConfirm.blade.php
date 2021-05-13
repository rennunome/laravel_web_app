<form action="userDelete" method="POST">
@csrf
<div align="center">
<h1>ユーザー削除確認</h1>
<label>ユーザーID：</label>
@foreach ($user as $value)
<input type="text" name="user_id" id="user_id" value="{{ $value->id }}" readonly><br>
<label for="user_name">ユーザー名：</label>
<input type="text" name="user_name" id="user_name" value="{{ $value->name}}" readonly><br>
<label for="admin">管理者：</label>
<input type="text" name="admin" value="{{ $value->admin_flag == 1 ? '管理者' : '一般' }}" readonly><br>
</div>
@endforeach
<div align="right">
<input type="submit" value="削除">
</div>
</form>
<br>
<div align="right">
<form action="userList" method="GET">
<input type="submit" value="戻る">
</form>
</div>
