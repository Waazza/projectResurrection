<img src="img/logo.png" alt="logo" class="logo">
<nav class="menu">
    <ul class="d-flex nav">
        <li><a href="index.php?id=1">Accueil</a></li>
        <li><a href="index.php?id=6">Entreprises</a></li>
        <li>Clients</li>
        <?php  echo $_SESSION['role'] == 'admin' ? "<li><a href=\"index.php?id=3\">Gestion des utilisateurs</a></li>" : "" ?>
    </ul>
</nav>
<?php
if(isset($_SESSION['email'])) {
    echo '<div class="text-center cst-disconnect pt-3">
                       <a href="index.php?id=102">
                            <button type="button" class="btn btn-danger cst-btn-connect">Deconnexion</button>
                       </a>
	              </div>';
}
?>
