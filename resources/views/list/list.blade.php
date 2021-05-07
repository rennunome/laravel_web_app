<div>
@extends('myHeader/myHeader')
</div>
<div align="center">
<h2>問題一覧画面</h2>
<form action="reg" method="GET">
@csrf
<input type="submit" value="新規登録" />
</form>
</div>
@foreach($questions as $q)
<label for="question_id">問題：{{$q->id}}</label>
<input type="text" name="question" id="question_id" value="{{$q->question}}" readonly /><br />
@foreach($correct_answers as $ca)
@if($q->id == $ca->questions_id)
<label for="answer_id">答え：{{$ca->id}}</label>
<input type="text" name="answer[]" value="{{$ca->answer}}" readonly />
@endif
@endforeach
<form action="edit" method="POST">
@csrf
<input type="hidden" name="questions_id" value="{{$q->id}}" /> 
<input type="submit" value="編集" /> 
</form>
<form action="delete_confirm" method="POST">
@csrf
<input type="hidden" name="questions_id" value="{{$q->id}}" />
<input type="submit" value="削除" />
</form>
@endforeach
</body>
</html>