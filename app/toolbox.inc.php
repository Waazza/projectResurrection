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

/**
 * Add new user into DB
 *
 * @param
 *
 * @return void
 */
function addUser($email, $pw, $firstName, $lastName, $role){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (!empty($pw) && !empty($lastName) && !empty($firstName) && !empty($role)) {

            $pwHash = password_hash($pw, PASSWORD_BCRYPT);

            $co = dbConnect();
            $request = $co->prepare('INSERT INTO user (u_email, u_password, u_firstname, u_lastname, u_role) VALUES(:email, :password, :firstname, :lastname, :role)');
            $request->bindValue(':email', $email, PDO::PARAM_STR);
            $request->bindValue(':password', $pwHash, PDO::PARAM_STR);
            $request->bindValue(':firstname', $firstName, PDO::PARAM_STR);
            $request->bindValue(':lastname', $lastName, PDO::PARAM_STR);
            $request->bindValue(':role', $role, PDO::PARAM_INT);
            $request->execute();

            header('Location: index.php?id=3');

        }
    }
}