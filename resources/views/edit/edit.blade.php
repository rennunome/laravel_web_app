<!--フォームの追加ボタン-->
<script type="text/javascript">
var i = 1 ;
function addForm() {
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.id = 'answers' + i;
input_data.name = 'answers[]';
  var parent = document.getElementById('form_area');
  parent.appendChild(input_data);
//   var input_data2 = document.createElement('input');
//   input_data2.type = 'hidden';
//   input_data2.id = 'answer_id' + i;
//   input_data2.name = 'answer_id';
//   input_data2.value = 0;
//   parent.appendChild(input_data2);
var button_data = document.createElement('button');
  button_data.id = i;
 button_data.name = 'delete';
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = '削除';
 var input_area = document.getElementById(input_data.id);
  parent.appendChild(button_data);
  i++ ;
}
function deleteBtn(target) {
  var target_id = target.id;
  var parent = document.getElementById('form_area');
  var ipt_id = document.getElementById('answers' + target_id);
  var tgt_id = document.getElementById(target_id);
  parent.removeChild(ipt_id);
  parent.removeChild(tgt_id);
}
</script>

<h2>問題・答え編集画面</h2>
<form action="editValidate" method="POST">
@csrf
<?php 
if(isset($error))
{
echo $error; 
}?><br />
<label>問題：</label>
<input type= "text" name= "questions_id" value ="{{$question->id}}" readonly />

<input type= "text" name= "question" value ="{{$question->question}}" />
<br>
@foreach($answers as $value)
<div id= "form_area">
<label>答え：</label>
  <input type="text" name="answer_ids[]" value="{{ $value->id }}" readonly />
  <input type="text" name="answers[]"  id="answers" value="{{ $value->answer }}" /><br />
</div>
@endforeach
<input type= "button" value= "フォーム追加" onclick="addForm()" /><br />
	<button type="submit" id="qaButton">確認</button>
</form>
	<div align="right">
	<form action="list" method="POST">
	@csrf
		<input type="submit" value="戻る">
	</form>
	</div>