
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

      echo'<thead><tr>';
        $table = ORM::for_table('hiking')->find_one();
        foreach(array_keys($table->as_array()) as $column) {
            $table->$column = NULL;
            echo '<th>'.$column.'</th>';
        }
      echo'</tr></thead>';

    foreach(ORM::for_table('hiking')->find_result_set() as $row) {
        $id = $row->id;
        $name = $row->name;
        $difficulty = $row->difficulty;
        $distance = $row->distance;
        $duration = $row->duration;
        $height_difference = $row->height_difference;
        $available = $row->available;
        echo'<tbody><tr><td>'.$id.'</td>
            <td><a title="éditer" href="update.php?
                id='.$id.'">'.$name.'
                  </a><form action="delete.php?id='.$id.' " method="post"><button name="delete" type="submit" class="ui icon button mini" title="supprimer"><i class="remove circle icon"></i></button></form></td>
            <td>'.$difficulty.'</td>
            <td>'.$distance.'km</td>
            <td>'.$duration.'</td>
            <td>'.$height_difference.'m</td>
            <td>'.$available.'</td></tr></tbody>';
    }

      if(isset($_POST['delete'])) {
        $id = $_POST['id'];  
      }

    ?>
    </table>
  </body>
</html>



