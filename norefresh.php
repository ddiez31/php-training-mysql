<?php

require_once 'vendor/j4mie/idiorm/idiorm.php';

session_start();

// { Début - Première partie
if(!empty($_POST)) {
    $_SESSION['sauvegarde'] = $_POST;
    $fichierActuel = $_SERVER['PHP_SELF'];
    if(!empty($_SERVER['QUERY_STRING'])) {
        $fichierActuel .= '?'.$_SERVER['QUERY_STRING'];
    }
    header('Location: '.$fichierActuel);
    exit;
};
// } Fin - Première partie

// { Début - Seconde partie
if(isset($_SESSION['sauvegarde'])) {
    $_POST = $_SESSION['sauvegarde'];
    unset($_SESSION['sauvegarde']);
};
// } Fin - Seconde partie

$user = '****';
$pass = '****';

ORM::configure(array(
    'connection_string' => 'mysql:host=localhost;dbname=reunion_island',
    'username' => $user,
    'password' => $pass
));
ORM::configure('return_result_sets', true);
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
ORM::configure('error_mode', PDO::ERRMODE_WARNING);

?>
