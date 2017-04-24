
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<!--<a href="/php-pdo/read.php">Liste des données</a>-->
	<h1>Ajouter une randonnée</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">très facile</option>
				<option value="facile">facile</option>
				<option value="moyen">moyen</option>
				<option value="difficile">difficile</option>
				<option value="très difficile">très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<?php
		echo '<div>
			<label for="available">Sentier fermé pour cause</label>
			<input type="text" name="available" value="">
			</div>';
		// if(isset($_POST['newInput'])) {
		// 	$newName = $_POST['newName'];
		// 	echo '<div>
		// 		<label for="">'.$newName.'</label>
		// 		<input type="text" name="'.$newName.'" value="">
		// 		</div>';
		// 	ORM::raw_execute('ALTER TABLE hiking ADD '.$newName.' VARCHAR(255) NOT NULL');
		// }

		?>

		<button type="submit" name="button">Envoyer</button>
		<!--<br>
		<div>
			<input type="text" name="newName" value="">
			<button type="" name="newInput">Créer un champ</button>
		</div>-->
		
	</form>

<?php

if(isset($_POST['button'])) {
	$name = $_POST['name'];
	$difficulty = $_POST['difficulty'];
	$distance = $_POST['distance'];
	$duration = $_POST['duration'];
	$height_difference = $_POST['height_difference'];
	$available = $_POST['available'];

	$add = ORM::for_table('hiking')->create();
	$add->name = $name;
	$add->difficulty = $difficulty;
	$add->distance = $distance;
	$add->duration = $duration;
	$add->height_difference = $height_difference;
	$add->available = $available;
	$add->save();

	echo'<script>alert(\'Le circuit de randonnée a bien été ajouté !\')</script>';
}


?>

</body>
</html>
