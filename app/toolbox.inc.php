<?php

/**
 * Display user
 *
 * @param null
 *
 * @return array
 */
function displayUser($id=null){
    $co = dbConnect();
    $sql ='';
    if (is_null($id)){
        $sql = $co->prepare('SELECT * FROM user WHERE u_role!=:role');
    }elseif (!is_null($id)){
        $sql = $co->prepare('SELECT u_firstname, u_lastname, u_email, u_role FROM user WHERE u_id=:id AND u_role!=:role');
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
    }
    $sql->bindValue(':role', 4, PDO::PARAM_INT);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_OBJ);
    return $result;
};

/**
 * Add new user into DB
 *
 * @param string $email new email to add
 * @param string $pw new password to add
 * @param string $firstName new firstname to add
 * @param string $lastName new lastname to add
 * @param string $role new role for the new user
 * @param string $pwConfirm second password input by user for security purpose
 *
 * @return void redirection
 */
function addUser($email, $pw, $firstName, $lastName, $role, $pwConfirm){

    if($pw !== $pwConfirm){
        header('Location: index.php?id=4&message=3');
    }else{
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
};

/**
 * Edit existing user into DB
 *
 * @param integer $id id of the user to edit
 * @param string $email new email to edit
 * @param string $firstName new firstname to edit
 * @param string $lastName new lastname to edit
 * @param string $role new role for the user to edit
 *
 * @return void redirection
 */
function editUser($id, $email, $firstName, $lastName, $role){
    $co = dbConnect();
    $reqMail = $co->prepare('SELECT u_id, u_email FROM user');
    $reqMail->execute();
    $showMail = $reqMail->fetchAll(PDO::FETCH_OBJ);


    $usedMail = false;
    foreach($showMail as $k=>$v){
        if($email == $v->u_email && $id != $v->u_id){
            $usedMail = true;
        }
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !$usedMail) {
        if (!empty($id) && !empty($lastName) && !empty($firstName) && !empty($role)) {

            $request = $co->prepare('UPDATE user SET u_email=:email, u_firstname=:firstname, u_lastname=:lastname, u_role=:role WHERE u_id=:id');
            $request->bindValue(':email', $email, PDO::PARAM_STR);
            $request->bindValue(':firstname', $firstName, PDO::PARAM_STR);
            $request->bindValue(':lastname', $lastName, PDO::PARAM_STR);
            $request->bindValue(':role', $role, PDO::PARAM_INT);
            $request->bindValue(':id', $id, PDO::PARAM_INT);
            $request->execute();

            header('Location: index.php?id=3');

        }else{
            header('Location: index.php?id=4&message=2');
        }
    }else{
        header('Location: index.php?id=4&message=1');
    }
}

/**
 * Delete user from DB
 *
 * @param int
 *
 * @return void redirection
 */
function deleteUser($id){
    $co = dbConnect();
    $request = $co->prepare('UPDATE user SET u_role=:role WHERE u_id=:id');
    $request->bindValue(':id', $id, PDO::PARAM_INT);
    $request->bindValue(':role', 4, PDO::PARAM_INT);
    $request->execute();

    header('Location: index.php?id=3');
};