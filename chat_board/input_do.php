<?php
require('dbconnect.php');

//commentテーブル送信用
$sql = sprintf('insert into comment set name= "%s", title= "%s" , text="%s", created=NOW()',
	mysqli_real_escape_string($db, $_POST['name']),
	mysqli_real_escape_string($db, $_POST['title']),
	mysqli_real_escape_string($db, $_POST['text']),
);
mysqli_query($db, $sql) or die(mysqli_connect_error());
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
	<head>
		<title>HTML</title>
		<link rel="stylesheet" href="styles_input_do.css">
	</head>
	<body>
		<p>投稿いたしました。</p>
		<a href="sample.php">戻る</a>
	</body>
</html>
