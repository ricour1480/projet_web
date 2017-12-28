<div class="row">
    <div class="col-sm-11">
        <a href="index.php?page_admin=accueil&idadministrateur=<?php print $_SESSION['idadmin']; ?>" class="txtGras">Accueil</a>
    </div>
    <div class="col-sm-11">
        <a href="index.php?page_admin=listeCommande&idadministrateur=<?php print $_SESSION['idadmin'];?>" class="txtGras">Listes des Commandes</a>
    </div>
    <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle txtGras" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu Admin</a>
        <div class="dropdown-menu">
            <a class="dropdown-item txtGras" href="index.php?page_admin=clientDelete&idadministrateur=<?php print $_SESSION['idadmin'];?>">Supprimer un client</a>
            <a class="dropdown-item txtGras" href="index.php?page_admin=CommandeDelete&idadministrateur=<?php print $_SESSION['idadmin'];?>">Supprimer une commande</a>
            <a class="dropdown-item txtGras" href="index.php?page_admin=AjoutBouquin&idadministrateur=<?php print $_SESSION['idadmin'];?>">Ajouter un livre</a>
        </div>
    </div>


</div>

