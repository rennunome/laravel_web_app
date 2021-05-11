<h2>問題・答え編集画面</h2>
<form action="edit" method="POST">
@csrf
<label>問題：</label>
<input type= "text" name= "questions_id" value ="{{$question->id}}" readonly />

<input type= "text" name= "question" value ="{{$question->question}}" />
<br>
@foreach($answer as $value)
<label>答え：</label>
  <input type="text" name="answer_ids[]" value="{{ $value->id }}" readonly />
  <input type="text" name="answer[]" value="{{ $value->answer }}" /><br />
@endforeach
	<input type="submit" value="確認" />
	</form>
	<div align="right">
	<form action="list" method="POST">
	@csrf
		<input type="submit" value="戻る">
	</form>
	</div>