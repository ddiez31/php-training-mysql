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
	$hiking = ORM::for_table('hiking')->where('id', $id)->find_many();
	foreach($hiking as $value) {
		$name = $value['name'];
		$difficulty = $value['difficulty'];
		$distance = $value['distance'];
		$duration = $value['duration'];
		$height_difference = $value['height_difference'];
		$available = $value['available'];
	}
	?>
	
	<h1>Modifier une randonnée</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php if($difficulty == 'très facile') { echo 'selected'; } ?>>très facile</option>
				<option value="facile" <?php if($difficulty == 'facile') { echo 'selected'; } ?>>facile</option>
				<option value="moyen" <?php if($difficulty == 'moyen') { echo 'selected'; } ?>>moyen</option>
				<option value="difficile" <?php if($difficulty == 'difficile') { echo 'selected'; } ?>>difficile</option>
				<option value="très difficile" <?php if($difficulty == 'très difficile') { echo 'selected'; } ?>>très difficile</option>
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
			<?php
			echo '<div>
				<label for="available">Sentier fermé pour cause</label>
				<input type="text" name="available" value="'.$available.'">
				</div>';
			?>
		<button type="submit" name="button">Modifier</button>
	</form>

<?php

if(isset($_POST['button'])) {
	$name = $_POST['name'];
	$difficulty = $_POST['difficulty'];
	$distance = $_POST['distance'];
	$duration = $_POST['duration'];
	$height_difference = $_POST['height_difference'];
	$available = $_POST['available'];

	$update = ORM::for_table('hiking')->find_one($id);
	$update->set(array(
    	'name' => $name,
   		'difficulty'  => $difficulty,
		'distance'  => $distance,
		'duration'  => $duration,
		'height_difference'  => $height_difference,
		'available'  => $available
	));
	$update->save();

	echo'<script>alert(\'Le circuit de randonnée a bien été modifié !\')</script>';
}


?>
	<hr>
	<a href="/">Retour liste des randonnées</a>


</body>
</html>
