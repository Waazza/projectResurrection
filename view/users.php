<?php
    if (isset($_SESSION['role'])){
        if ($_SESSION['role'] != 'admin'){
            $_SESSION['message'] = $arr_message[4];
            header('Location: index.php?id=1');
        }
    }
?>

<a href="index.php?id=4">Ajouter un utilisateur</a>


<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Prenom</th>
        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col" colspan="3">Options</th>
    </tr>
    </thead>
    <tbody>
<?php

    $user = displayUser();
    foreach ($user as $k=>$v){
        if($v->u_role == '1'){
            $role = 'Admin';
        }elseif($v->u_role == '2'){
            $role = 'Membre';
        }

        echo'
        <tr>
            <th scope="row">'. $v->u_id .'</th>
            <td>'. $v->u_firstname .'</td>
            <td>'. $v->u_lastname .'</td>
            <td>'. $v->u_email .'</td>
            <td>'. $role .'</td>
            <td><a href="index.php?id=5&user_id='. $v->u_id .'">Modifier</a></td>
            <td><a href="index.php?id=107&user_id='. $v->u_id .'" class="delButton" data-id=" '. $v->u_id .' ">Supprimer</a></td>
            <td><a href="">Réinitialiser le mot de passe</a></td>
        </tr>';
    }
?>
    </tbody>
</table>
<div id="displayDel" style ="display: none">
    <p>Etes-vous sur de vouloir supprimer cet utilisateur</p>
    <a href="index.php?id=3">Oui</a>
    <a href="index.php?id=3">Non</a>
</div>


