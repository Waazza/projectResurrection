<?php

    if(isset($_GET['user_id'])){
        $id = (int)$_GET['user_id'];
        $userData = displayUser($id);
    }

?>

<form action="index.php?id=105" method="post">
    <input type="text" class="form-control" name="id" value="<?php echo $id ?>" hidden>
    <div class="form-group">
        <label for="firstName">Prenom</label>
        <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo $userData[0]->u_firstname ?>">
    </div>
    <div class="form-group">
        <label for="lastName">Nom</label>
        <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo $userData[0]->u_lastname ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="inputEmail" value="<?php echo $userData[0]->u_email ?>">
    </div>
    <div>
        <label for="role">Role</label>
        <select name="role" class="form-control" id="role">
            <option value="1" <?php $userData[0]->u_role == 1 ?: 'selected' ?>>Admin</option>
            <option value="2" <?php $userData[0]->u_role == 2 ?: 'selected' ?>>Membre</option>
            <option value="3" <?php $userData[0]->u_role == 3 ?: 'selected' ?>>Stagiaire</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
