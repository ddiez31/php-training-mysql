
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

    foreach(ORM::for_table('hiking')->find_result_set() as $row) {
        $id = $row->id;
        $name = $row->name;
        $difficulty = $row->difficulty;
        $distance = $row->distance;
        $duration = $row->duration;
        $height_difference = $row->height_difference;
        echo'<tbody><tr><td>'.$id.'</td>
            <td><a href="update.php?
                id='.$id.'&
                name='.$name.'&
                difficulty='.$difficulty.'&
                distance='.$distance.'&
                duration='.$duration.'&
                height_difference='.$height_difference.'">'.$name.'</a></td>
            <td>'.$difficulty.'</td>
            <td>'.$distance.'km</td>
            <td>'.$duration.'</td>
            <td>'.$height_difference.'m</td></tr></tbody>';
    }


    ?>
    </table>
  </body>
</html>



