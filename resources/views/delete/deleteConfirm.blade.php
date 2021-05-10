<h2>問題・答え削除確認画面</h2>
<form action="delete" method="POST">
<label for="question_id">問題：</label> <input type= "text" name= "question" value ="{{$question->id}}" readonly/>
<input type= "hidden" name= "questions_id" value ="{{$question->question}}" />
<br>
@foreach ($answer as $value)
	<label for="answer_id">答え：</label>
	 <input type= "text" name= "answers[]" value ="{{$value->id}}" readonly/>
	 <input type= "hidden" name= "answer_ids[]" value ="{{$value->answer}}" />
@endforeach
	<input type="submit" value="削除">
	</form>
	<div align="right">
	<form action="list" method="POST">
		<input type="submit" value="戻る">
	</form>
	</div>