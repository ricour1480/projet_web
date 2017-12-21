
<div class="row">
    <div class="col-sm-11">
        <a href="index.php?page=accueil" class="txtGras">Accueil</a>
    </div>
    <div class="col-sm-11">
        <a href="index.php?page=livre" class="txtGras">Nos Bouquins</a>
    </div>
    <div class="col-sm-11">
        <a href="index.php?page=commande" class="txtGras">Commander</a>
    </div>
    <div class="col-sm-11">
        <a href="index.php?page=inscription" class="txtGras">S'inscrire</a>
    </div>
    <div class="col-sm-11">
        <a href="index.php?page=contact" class="txtGras">Contact</a>
    </div>
    <?php
if(!isset($_SESSION['idadmin'])){
    ?><div class="nav-item dropdown col-sm-11" id="menu_admin">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"aria-expanded="false">Administratio</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </div><?php
}
?>
    
</div>
