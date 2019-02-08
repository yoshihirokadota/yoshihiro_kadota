<?php
require('dbconnect.php');


$name = $_POST['name'];
$title = $_POST['title'];
$text = $_POST['text'];


//commentテーブル送信用
$sql = sprintf('insert into comment set name= "%s", title= "%s" , text="%s", created=NOW()',
	mysqli_real_escape_string($db, $name),
	mysqli_real_escape_string($db, $title),
	mysqli_real_escape_string($db, $text)
);
mysqli_query($db, $sql) or die(mysqli_connect_error());
 ?>
