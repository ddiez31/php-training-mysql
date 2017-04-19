
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <!-- Semantic-ui CSS -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.css">
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table class="ui celled table">
      <!-- Afficher la liste des randonnées -->
      <?php

    echo'<thead><tr><th>id</th><th>name</th><th>difficulty</th><th>distance</th><th>duration</th><th>height_difference</th></tr></thead>';
    foreach($bdd->query('SELECT * FROM hiking') as $row) {
        echo'<tbody><tr><td>'.$row['id'].'</td>
            <td>'.utf8_encode($row['name']).'</td>
            <td>'.utf8_encode($row['difficulty']).'</td>
            <td>'.$row['distance'].'km</td>
            <td>'.$row['duration'].'</td>
            <td>'.$row['height_difference'].'m</td></tr></tbody>';
    }
    $bdd = null;

?>
    </table>
  </body>
</html>



