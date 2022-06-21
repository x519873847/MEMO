<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">
<body>
<title>MEMO</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<h2>MEMO</h2>
<pre>
<?php 
   $db = new PDO('mysql:dbname=mydb;host=127.0.0.1;charset=utf8', 'root', '');
   if (isset($_GET['id']) && is_numeric($_GET['id'])) { 
      $id = $_GET['id'];
      $memos = $db->prepare('DELETE FROM memos WHERE id=?');
      $memos->bindParam(1, $id, PDO::PARAM_INT);
      $memos->execute();
      echo '削除しました。';
   }
?>
<a href="view.php">戻る</a></p>
</pre>

</main>
</body>    
</html>