<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

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
   $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
   $memos->bindParam(1, $_GET['id'], PDO::PARAM_INT);
   $memos->execute();
   $memo = $memos->fetch();
?>
<form action="edit_do.php" method="POST">
   <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
   <textarea cols='50' rows="10" name="memo"><?php echo $memo['memo'] ?></textarea>
   <p><input type="submit" value="登録する"></p>
</form>

</pre>
</main>
</body>    
</html>