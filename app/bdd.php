<?php
/**
 * Connects to the DB
 *
 * @return PDO Returns the PDO object for connection
 */
function dbConnect(){

    $dbname = 'projectresurrection';
    $user = 'root';
    $pass = '';

    try {
        $connexion = new PDO('mysql:host=localhost;charset=UTF8;dbname=' . $dbname, $user, $pass);
        return $connexion;

    } catch (PDOException $e) {
        print "erreur ! : " . $e->getMessage() . "<br/>";
        die();
    }
}
