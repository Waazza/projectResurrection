<?php

/**
 * Display user
 *
 * @param null
 *
 * @return array
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
function addUser($email, $pw, $firstName, $lastName, $role, $pwConfirm){

    if($pw !== $pwConfirm){
        header('Location: index.php?id=4&message=3');
    }

    $co = dbConnect();
    $reqMail = $co->prepare('SELECT u_email FROM user');
    $reqMail->execute();
    $showMail = $reqMail->fetchAll(PDO::FETCH_OBJ);

    $usedMail = false;
    foreach($showMail as $k=>$v){
        if($email == $v->u_email){
            $usedMail = true;
        }
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !$usedMail) {
        if (!empty($pw) && !empty($lastName) && !empty($firstName) && !empty($role)) {
            $pwHash = password_hash($pw, PASSWORD_BCRYPT);

            $request = $co->prepare('INSERT INTO user (u_email, u_password, u_firstname, u_lastname, u_role) VALUES(:email, :password, :firstname, :lastname, :role)');
            $request->bindValue(':email', $email, PDO::PARAM_STR);
            $request->bindValue(':password', $pwHash, PDO::PARAM_STR);
            $request->bindValue(':firstname', $firstName, PDO::PARAM_STR);
            $request->bindValue(':lastname', $lastName, PDO::PARAM_STR);
            $request->bindValue(':role', $role, PDO::PARAM_INT);
            $request->execute();

            header('Location: index.php?id=3');

        }else{
            header('Location: index.php?id=4&message=2');
        }
    }else{
        header('Location: index.php?id=4&message=1');
    }


}