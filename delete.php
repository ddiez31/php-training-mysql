<?php
include 'norefresh.php';

echo'<script>alert(\'Le circuit de randonnée a bien été supprimé !\')</script>';      

$id = $_GET['id'];

/**** Supprimer une randonnée ****/
$del = ORM::for_table('hiking')->find_one($id);
$del->delete();

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("refresh:1;url=http://$host$uri/$extra");
exit;
?>