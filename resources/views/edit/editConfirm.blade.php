<h2>問題・答え編集確認画面</h2>
<form action="editDb" method="POST">
@csrf
<label for="question_id">問題：</label>
<input type= "text" name= "questions_id" value ="{{ $questions_id }}" readonly /><br />
<input type= "text" name= "question" value ="{{ $question }}" />
<br>
@foreach($answer_ids as $value)
<label>答え：</label>
<input type="text" name="answer_ids[]" value="{{ $value }}" readonly /><br />
@endforeach
@foreach($answers as $value)
<input type="text" name="answers[]" value="{{ $value }}" readonly /><br />
@endforeach
	<input type="submit" value="更新">
	</form>
	<div align="right">
	<form action="edit" method="POST">
	@csrf
		<input type="submit" value="戻る">
	</form>
	</div>