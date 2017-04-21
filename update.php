<?php

include 'norefresh.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<!-- Semantic-ui CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.css">
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

	<?php
	$id = $_GET['id'];
	$name = $_GET['name'];
	$difficulty = $_GET['difficulty'];
	$distance = $_GET['distance'];
	$duration = $_GET['duration'];
	$height_difference = $_GET['height_difference'];
	?>
	
	<!--<a href="/php-pdo/read.php">Liste des données</a>-->
	<h1>Modifier une randonnée</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<?php
					switch($difficulty) {
						case "très facile":
							echo '<option selected value="très facile">très facile</option>
							<option value="facile">facile</option>
							<option value="moyen">moyen</option>
							<option value="difficile">difficile</option>
							<option value="très difficile">très difficile</option>'; break;
						case "facile":
							echo '<option value="très facile">très facile</option>
							<option selected value="facile">facile</option>
							<option value="moyen">moyen</option>
							<option value="difficile">difficile</option>
							<option value="très difficile">très difficile</option>'; break;
						case "moyen":
							echo '<option value="très facile">très facile</option>
							<option value="facile">facile</option>
							<option selected value="moyen">moyen</option>
							<option value="difficile">difficile</option>
							<option value="très difficile">très difficile</option>'; break;
						case "difficile":
							echo '<option value="très facile">très facile</option>
							<option value="facile">facile</option>
							<option value="moyen">moyen</option>
							<option selected value="difficile">difficile</option>
							<option value="très difficile">très difficile</option>'; break;
						case "très difficile":
							echo '<option value="très facile">très facile</option>
							<option value="facile">facile</option>
							<option value="moyen">moyen</option>
							<option value="difficile">difficile</option>
							<option selected value="très difficile">très difficile</option>'; break;
					}

				?>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $distance; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $duration; ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $height_difference; ?>">
		</div>
		<button type="submit" name="button">Modifier</button>
	</form>

<?php

if(isset($_POST['button'])) {
	$name = $_POST['name'];
	$difficulty = $_POST['difficulty'];
	$distance = $_POST['distance'];
	$duration = $_POST['duration'];
	$height_difference = $_POST['height_difference'];

	$update = ORM::for_table('hiking')->find_one($id);
	$update->set(array(
    	'name' => $name,
   		'difficulty'  => $difficulty,
		'distance'  => $distance,
		'duration'  => $duration,
		'height_difference'  => $diheight_differencefficulty
	));
	$update->save();

	echo'<script>alert(\'Le circuit de randonnée a bien été modifié !\')</script>';
}


?>

</body>
</html>
