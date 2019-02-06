<?php
require('dbconnect.php');

// ↓入力必須のヴァリデーション
 $postDate = $_POST;
 $page_flag = 0;
 $error = array();
 function validation($postDate){
  $error = array();
  //nameについてのバリエーション
  if (empty($postDate['name'])){
    $error[]='名前を入力してください';
  }
  if (mb_strlen($postDate['name']) > 20){
    $error[]='名前は20文字以内で入力してください';
  }
  //titleについてのバリエーション
  if (empty($postDate['title'])){
    $error[]='タイトルを入力してください';
  }
  if (mb_strlen($postDate['title']) > 40){
    $error[]='タイトルは40文字以内で入力してください';
  }
  //textについてのバリエーション
  if (empty($postDate['text'])){
    $error[]='メッセージを入力してください';
  }
  if (mb_strlen($postDate['text']) > 140){
    $error[]='メッセージは140文字以内で入力してください';
  }
 return $error;
 }
 $error = validation($postDate);
 if(!empty($error)){
	 $page_flag = 1;
 }else{
	 $page_flag = 0;
 }

 ?>

 <!--ここから-->
 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 	"http://www.w3.org/TR/html4/loose.dtd">
 <html lang="ja">
 	<head>
     <link rel="stylesheet" href="styles_check.css">
 		<title>掲示板</title>
 	</head>
 	<body>
    <script src="check.js"></script>
    <!-- 入力されてない場合はエラーをだす -->
    <?php if($page_flag==1) :?>
      <?php foreach($error as $value) :?>
      <p class="warning_error"><?php echo $value; ?></p>
      <br>
     <?php endforeach; ?>
    <?php endif; ?>

    <!-- ユーザーは編集はできない -->
       <header>
         <form class="form" action="input_do.php" method="post">
           <p>名前</p>
            <input class="name" name="name" value="<?php echo $_POST['name']; ?>" readonly="readonly" >
           <p>タイトル</p>
            <input class="title" name="title" value="<?php echo $_POST['title']; ?>" readonly="readonly">
           <p>メッセージ</p>
            <textarea class="textarea" name="text" readonly><?php echo $_POST['text']; ?></textarea>
        </header>
          <ul>
            <li>
              <a href="sample.php"><button type="button">入力画面へ戻る</button></a>
            </li>
            <li>
              <?php if($page_flag == 0) : ?>
                  <button type="button" id="modal-open">投稿する</button>
              <?php endif; ?>
            </li>
          </ul>
          <!-- modalなので「投稿する」を押すまで表示されない -->
          <div id="myModal" class="modal">
          　<div class="modal-content">
            　<p>本当に登録いたしますか？</p>
            <ul>
            <li>
            　<p class="modal-close" id="modal-close">閉じる</p>
            </li>
            <li>
            　<input class="modal-botton-link" type="submit">
            </li>
          </ul>
          </div>
         </div>
        </form>
        <!-- スクリプトファイルの読み込み -->
      <script src="check.js"></script>
 	</body>
 </html>
