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
            <td><a href="">Supprimer</a></td>
            <td><a href="">Réinitialiser le mot de passe</a></td>
        </tr>';
    }
?>
    </tbody>
</table>


