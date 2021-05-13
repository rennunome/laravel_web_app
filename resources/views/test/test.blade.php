<div>
@extends('myHeader/myHeader')
</div>
<div align="center">
<h1>テスト一覧</h1>
</div>
<form action="mark" method="POST">
@csrf
@foreach ($questions as $question) 
<label for="question_id">問題：</label>
<input type="text" name="question[]" value="{{ $question->question }}" readonly /><br />
    <input type="hidden" name="questions_id[]" value="{{ $question->id }}" />
    <br>
        <label for="answer_id">回答：</label>
        <input type="text" name="test_answers[]" /><br />
 @endforeach
        <input type="submit" value="採点" />
</form>