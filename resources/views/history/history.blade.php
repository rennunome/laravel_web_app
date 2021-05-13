<div>
@extends('myHeader/myHeader')
</div>
<div align="center">
<h1>テスト採点結果の履歴一覧</h1>
</div>
@foreach($histories as $value) 
<table border="1">
<tr>
<th>氏名</th>
<th>得点</th>
<th>採点時間</th>
<tr>
<td>{{ auth()->user()->name }}さん</td>
<td>{{ $value->point }} 点</td>
<td>{{ $value->created_at }}</td>
</tr>
</table>
@endforeach