<?php
require_once 'config.php';

function connexionPDO()
{
    try {
        $bdd = new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME.";charset=utf8", USER_NAME, PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $bdd;
    } catch (PDOException $e) {
       $message = 'Une erreur est survenue : ' . $e->getMessage();
       die($message);
    }
}

?>