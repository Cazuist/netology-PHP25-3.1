<?php
	//Создаем классы
	class News
	{
		private $title;
		private $author;
		private $article;
		private $date;
		
		public function getProperties() {
			$newsProp = [];
			$newsProp['title'] = $this->title;
			$newsProp['author'] = $this->author;
			$newsProp['article'] = $this->article;
			$newsProp['date'] = $this->date;
			return $newsProp;
		}

		public function setProperties($newsList) {
			$this->title = $newsList['title'];
			$this->author = $newsList['author'];
			$this->article = $newsList['article'];
			$this->date = $newsList['date'];
		}
	}

	$newsList = json_decode(file_get_contents('./news.json'), true);	
	
	$list = [];
	for ($i = 0; $i < count($newsList); $i++) {
		$list[] = new News();
		$list[$i]->setProperties($newsList[$i]);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>News</title>
  <link rel="stylesheet" href="css/styles.css">  
</head>
<body>

</body>
</html>