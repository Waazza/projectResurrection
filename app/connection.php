<?php

    print_r($_POST);

    $co = dbConnect();

    $sql = $co->prepare('SELECT * FROM user WHERE u_email=:email');
    $sql->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sql->execute();
    $result = $sql->fetch();

    var_dump($result);

    if($_POST['password'] === $result['u_password']){

        $_SESSION['firstname'] = $result['u_firstname'];
        $_SESSION['lastname'] = $result['u_lastname'];
        $_SESSION['email'] = $result['u_email'];

        if($result['u_role'] == '1'){
            $_SESSION['role'] = 'admin';
        }elseif($result['u_role'] == '2'){
            $_SESSION['role'] = 'member';
        }

        header('Location: index.php?id=1');

    }