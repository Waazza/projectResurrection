<form action="index.php?id=103" method="post">
    <div class="form-group">
        <label for="firstName">Prenom</label>
        <input type="text" class="form-control" name="firstName" id="firstName">
    </div>
    <div class="form-group">
        <label for="lastName">Nom</label>
        <input type="text" class="form-control" name="lastName" id="lastName">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="inputEmail">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="inputPassword">
    </div>
    <div>
        <label for="role">Role</label>
        <select name="role" class="form-control" id="role">
            <option value="1">Admin</option>
            <option value="2">Membre</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>