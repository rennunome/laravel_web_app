<h2>問題・答え編集確認画面</h2>
<form action="editdb" method="POST">
@csrf
<label for="question_id">問題：</label>
<input type= "text" name= "questions_id" value ="{{ $questions_id }}" readonly />
<input type= "text" name= "question" value ="{{ $question }}" />
<br>
@if(isset($answer_ids))
@foreach($answer_ids as $value)
@if($loop->count)
<label>答え：</label>
  <input type="text" name="answer_ids[]" value="{{ $value-> answer_ids }}" readonly />
  <input type="text" name="answer[]" value="{{ $value-> answer  }}"><br />
@endif
@endforeach
@endif
	<input type="submit" value="更新">
	</form>
	<div align="right">
	<form action="edit" method="POST">
	@csrf
		<input type="submit" value="戻る">
	</form>
	</div>