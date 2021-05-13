<div>
@extends('myHeader/myHeader')
</div>
<div align="center">
<h2>メニュー画面</h2>
<form action="list"  method="POST">
@csrf
<input type="submit" value="問題と答えを確認・登録する ＞ ">
</form>
<form action="test"  method="GET">
@csrf
<input type="submit" value="テストをする ＞">
</form>
<form action="history"  method="GET">
@csrf
<input type="submit" value="過去の採点結果をみる ＞">
</form>
<form action="userList"  method="GET">
@csrf
<input type="submit" value="ユーザを追加・編集する＞">
</form>
</div>
</body>
</html>