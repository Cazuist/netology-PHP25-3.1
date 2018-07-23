<?php
	//Создаем классы
	class Car 
	{
		public $name;
		public $color;
		public $price;
		public $isAvailable = true;

		public function __construct($name, $color, $price, $isAvailable) 
		{
			$this->name = $name;
			$this->color = $color;
			$this->price = $price;
			$this->isAvailable = $isAvailable;			
		}

		public function getMessage() {
			if ($this->isAvailable) {
				echo 'Есть в наличии';
			} else {
				echo 'Нет в наличии';
			}
		}
	}

	class TV 
	{
		public $isColor;

		public function __construct($name, $price) 
		{
			$this->name = $name;			
			$this->price = $price;
		}

		public function getMessage() {
			if ($this->isColor) {
				return 'Цветной';
			}
			else {
				return 'Черно-белый';
			}
		}
	}

	class Duck
	{
		public $color;
		public $weight;
		public $isPet;

		public function isReadyForChristmas() {
			if ($this->isPet) {
				return 'Моя любимая утка';
			} else {
				if($this->weight > 2000) {
					return 'В духовку';
				} else {
					return 'Пусть подрастет!';
				}
			}				
		}
	}

	class Pen 
	{
		public function __construct($name = 'Simple', $inkColor = 'blue', $material = 'plastic', $price = 25) {
			$this->name = $name;
			$this->inkColor = $inkColor;
			$this->material = $material;
			$this->price = $price;
		}

		public function getInfo() {
			echo 'Ручка '.$this->name.', цвет - '.$this->inkColor.', материал - '.$this->material.', цена - '.$this->price.'.';
		}
	}

	class Product
	{
		private $category;
		private $name;
		private $price;
		private $isAvailable;
		private $discount = 0;

		public function __construct($category, $name, $price, $isAvailable = true, $discount = 0)
		{
			$this->category = $category;
			$this->name = $name;
			$this->price = $price;
			$this->isAvailable = $isAvailable;
			$this->discount = $discount;
		}

		public function getProperties() {
			$properties = [];
			$properties['category'] = $this->category;
			$properties['name'] = $this->name;
			$properties['price'] = $this->price;
			return $properties;
		}

	}

//Создаем экземпляры классов
//Машины
	$car1 = new Car('Audi', 'magenta', 50500, true);
	$car2 = new Car('Пепелац', 'grey', 5, false);

//Телевизоры
	$tv1 = new TV('LG', 10000);
	$tv2 = new TV('Свет мой зеркальце', 'Бесплатно');

	$tv1->isColor = true;
	$tv2->isColor = false;

//Утки
	$duck1 = new Duck();
	$duck2 = new Duck();

	$duck1->color = 'пёстрая';
	$duck1->weight = 3000;
	$duck1->isPet = false;

	$duck2->color = 'розовая';
	$duck2->weight = 2000;
	$duck2->isPet = true;

//Шариковые ручки
	$pen1 = new Pen();
	$pen2 = new Pen('Ultra');

	$pen2->material = 'metal';
	$pen2->price = '100500';
	
	$prop = Array_keys(get_object_vars($pen1));	

//Товары
	$productList = [];
	array_push($productList, new Product('Телефон', 'fly', 2000), new Product('Хлеб', 'Бородинский', 50));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Классы</title>
  <link rel="stylesheet" href="css/styles.css">  
</head>
<body>

	<fieldset style="width: 50%;">
 		<legend>Вопросы к лекции</legend>
 		<h2>Инкапсуляция</h2>
 		<p style="font-size: 20px;">Инкапсуляция с одной стороны является принципом организации связанных данных (свойств и методов) внутри объекта, с другой - определяет возможность в разной степени изолировать данные от доступа вне объекта</p>

 		<h2>Объекты</h2>
 		<p style="font-size: 20px;">Плюсом объекта я вляется возможность структурированной и 'тематической' организации данных. На мой взгляд, минусом (но это вопрос опыта) является определенная сложность в построении работающей (необходимой и достаточной) структуры объекта.</p> 		
 	</fieldset>
	
	<fieldset>
		<legend>Машины</legend>
			<table>
				<thead>
					<tr>
						<? foreach (get_class_vars('Car') as $prop => $value) : ?>
							<td><?= $prop ?></td>
							
						<? endforeach ?>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?= $car1->name ?></td>
						<td><?= $car1->color ?></td>
						<td><?= $car1->price ?></td>
						<td><?= $car1->getMessage() ?></td>
					</tr>

					<tr>
						<td><?= $car2->name ?></td>
						<td><?= $car2->color ?></td>
						<td><?= $car2->price ?></td>
						<td><?= $car2->getMessage() ?></td>
					</tr>
				</tbody>
			</table>	
 	</fieldset>

 	<fieldset>
		<legend>Телевизоры</legend>
		
		<p><?= "Телевизор: {$tv1->name} ({$tv1->getMessage()}). Цена - {$tv1->price}." ?></p>
		<p><?= "Телевизор: {$tv2->name} ({$tv2->getMessage()}). Цена - {$tv2->price}." ?></p>	
 	</fieldset>

 	<fieldset>
		<legend>Утки</legend>
		
		<p><?= "Утка №1: {$duck1->color}, вес - {$duck1->weight} гр. {$duck1->isReadyForChristmas()}." ?></p>
		<p><?= "Утка №2: {$duck2->color}, вес - {$duck2->weight} гр. {$duck2->isReadyForChristmas()}." ?></p>	
 	</fieldset>

 	<fieldset>
		<legend>Ручки шариковые</legend>
		
		<p><?= $pen1->getInfo() ?></p>
		<p><?= $pen2->getInfo() ?></p>	
 	</fieldset>
    
    <fieldset>
		<legend>Товары</legend>
		<ul>
			<? foreach ($productList as $product) : ?>
				<li><?= $product->getProperties()['category'] ?>
					<ul>
						<li>Название: <?= $product->getProperties()['name'] ?></li>
						<li>Цена: <?= $product->getProperties()['price'] ?></li>
					</ul>
				</li>
			<? endforeach ?>
		</ul>		
 	</fieldset> 	
</body>
</html>