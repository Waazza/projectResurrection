<?php

/**
 * Display user
 *
 * @param null
 *
 * @return object
 */
function displayUser(){
    $co = dbConnect();
    $sql = $co->prepare('SELECT * FROM user');
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
}