<h2>問題・答え削除確認画面</h2>
<form action="delete" method="GET">
<label for="question_id">問題：</label>
<input type= "text" name= "questions_id" value ="{{$question->id}}" />

<input type= "text" name= "question" value ="{{$question->question}}" />
<br>
@foreach($answer as $value)
<label>答え：</label>
  <input type="text" name="answer_ids" value="{{ $value->id }}">
  <input type="text" name="answer[]" value="{{ $value->answer }}"><br />
@endforeach
	<input type="submit" value="削除">
	</form>
	<div align="right">
	<form action="list" method="POST">
		<input type="submit" value="戻る">
	</form>
	</div>