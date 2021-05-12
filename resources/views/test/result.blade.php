<h1>テストの結果</h1>
<p>{{ auth()->user()->name }}さん</p><br>
<p>{{ $total_qs }} 問中、{{ $total }} 問正解です。</p><br>
<p>{{ $total_score }} 点でした。</p><br>
<p>{{ $date }}</p><br>
<div align="right">
	<form action="top" method="GET">
	@csrf
		<input type="submit" value="戻る" />
	</form>
</div>
