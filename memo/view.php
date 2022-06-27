
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
<?php  $db = new PDO('mysql:dbname=mydb;host=127.0.0.1;charset=utf8', 'root', '');?>
<?php 
   if(isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
      $page = $_REQUEST['page'];
   }else{
      $page = 1;
   }
   $start = 10 * ($page - 1);
   $memos = $db->prepare('SELECT * FROM memos ORDER BY id LIMIT ?,10');
   $memos -> bindParam(1,$start,PDO::PARAM_INT);
   $memos -> execute();

?>
<article>
<?php while ($memo = $memos->fetch()):?>
<p>
  <a href="view_more.php?id=<?php echo $memo['id'] ?>">
     <?php print(mb_substr($memo['memo'],0,30));?>
     <?php print((mb_strlen($memo['memo'])>30 ? '...':''));?>
    </a>
</p>
 <time><strong><?php echo '登録日 : '. $memo['created_at']; ?></strong></time>
<?php endwhile ?>
<?php if ($page>=2):?>
<a href="view.php?page=<?php print($page-1);?>"><?php print($page-1);?>ページ目へ</a>
<?php endif;?>
 |
<?php   $counts = $db->query('SELECT COUNT(*) as cnt FROM memos'); 
$count = $counts->fetch();
$max_page = ceil($count['cnt']/10);
if($page<$max_page):
 ?>
<a href="view.php?page=<?php print($page+1);?>"><?php print($page+1);?>ページ目へ</a>
 <?php endif;?>
 </article> 
</pre>
</main>
</body>
</html>
