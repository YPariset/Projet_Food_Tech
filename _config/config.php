<?php
//error display
ini_set('display_errors','on');
error_reporting(E_ALL);

//session
//session_start();
//ini_set('session.cookie_lifetime', false);

//paths
//le -9 de substr sert à enlever 'index.php'
define('PATH_REQUIRE', substr($_SERVER['SCRIPT_FILENAME'], 0, -9)); // pr fonctions inclusion php
define('PATH', substr($_SERVER['PHP_SELF'], 0, -9)); // pour img, fichiers

//databases
define('DATABASE_HOST', "localhost");
define('DATABASE_NAME', "base7reco");
define('DATABASE_USER', "root");
define('DATABASE_PASSWORD', "root");



?>