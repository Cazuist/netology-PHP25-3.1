<?php
	require_once('news.php');

	$newsList = json_decode(file_get_contents('./news.json'), true);	
	
	$list = [];
	for ($i = 0; $i < count($newsList); $i++) {
		$list[$i] = new News();
		$list[$i]->setProperties($newsList[$i]);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Классы</title>
  <link rel="stylesheet" href="css/styles.css">  
</head>
<body>
	<div>
		<? foreach ($list as $new) : ?>
		
			<h3> <?= $new->getProperties()['title'] ?></h3>
			<span>Автор: <?= $new->getProperties()['author'] ?></span>
			<p><?= $new->getProperties()['article'] ?></p>
			<p>Дата: <?= $new->getProperties()['date'] ?></p>

		<? endforeach ?>	
	</div>	
 	
</body>
</html>