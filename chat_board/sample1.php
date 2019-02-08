<?php
require('dbconnect.php');
$recordset = mysqli_query($db, 'select * from comment order by id DESC');

?>

<!-- ここから -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
	<head>
    <link rel="stylesheet" href="styles_sample1.css">
		<link rel="stylesheet" href="styles_check.css">
		<title>掲示板</title>
	</head>
	<body>
		<!-- 入力フォーム部分 -->
    <header>
        <form class="form" method="post">
          <p>名前</p>
           <input class="name" name="name" type="text" id="name" value="">
          <p>タイトル</p>
           <input class="title" name="title" type="text" id="title" value="">
           <button type="button" id="button">投稿する</button>
					<p>メッセージ</p>
           <textarea class="textarea" name="text" id="text" value=""></textarea >
        </form>
    </header>
		<!-- 掲示板 -->
		<div class="wrapper">
      <?php while($date = mysqli_fetch_assoc($recordset)):?>
				<div class="contents">
				 <div class="topContents">
					<ul>
						<li class="title-color">
              <?php  echo $date['title']; ?>
				    </li>
						<li>
						 	 投稿者：
						</li>
						<li class="name-color">
				      <?php echo $date['name']; ?>
						</li>
						<li>
				      投稿日：<?php echo $date['created']; ?>
						</li>
					 	<li>
				      No.<?php echo $date['id']; ?>
						</li>
				   </ul>
			    </div>
			   <div class="bottomContents">
				  <div class="left-image">
				   <img src="bottomContents_img.jpg" width="100" height="100">
				  </div>
				  <div class="right-text">
            <?php  echo '<br />' . $date['text']; ?>
			  	</div>
				 </div>
				</div>
		   <?php endwhile; ?>
		</div>

		<!-- ajax部分 -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
		// fromのボタンを押すと実行される
			$(function(){
		      $('#button').on("click", function(){
          var name =  $('#name').val();
          var title = $('#title').val();
          var text = $('#text').val();
						// "input_do.php"にpostデータを送る
						$.post("input_do.php",
						  { name: name, title: title, text: text},
						);
						// reloadメソッドによりページをリロード
						$(function(){
                  window.location.reload();
           });
				 });
			 });
		</script>
	</body>
</html>
