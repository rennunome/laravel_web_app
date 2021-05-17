<meta charset="UTF-8">
<body>
	<div align="right">
		<form action="logout" method="POST">
		@csrf
			<input type="submit" value="logout">
		</form>
		<form action="top" method="GET">
		@csrf
			<input type="submit" value="top">
		</form>
	</div>
</body>
