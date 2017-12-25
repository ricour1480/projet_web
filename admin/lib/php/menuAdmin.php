<div class="row">
    <div class="col-sm-11">
        <a href="index.php?page_admin=accueil&idadministrateur=<?php print $idadmin; ?>" class="txtGras">Accueil</a>
    </div>
    <div class="col-sm-11">
        <a href="index.php?page_admin=listeCommande&idadministrateur=<?php print $idadmin;?>" class="txtGras">Listes des Commandes</a>
    </div>
    <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle txtGras" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu Admin</a>
        <div class="dropdown-menu">
            <a class="dropdown-item txtGras" href="#">Supprimer un client</a>
            <a class="dropdown-item txtGras" href="#">Supprimer une commande</a>
            <a class="dropdown-item txtGras" href="#">Supprimer un livre</a>
        </div>
    </div>


</div>

