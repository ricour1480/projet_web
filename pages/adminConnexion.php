<?php
if (isset($_GET['connexion_admin'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (empty($loginCoAdmin) || empty($mpCoAdmin)) {
        $erreurConnexion = "Un ou plusieurs champs vides";
    } else {
        $verifAdmin = new AdminCoDB($cnx);
        $retourid = $verifAdmin->verifadmin($loginCoAdmin,$mpCoAdmin);
        if ($retourid) {
            $_SESSION['idadmin'] = $retourid;
            header('Location: admin/index.php?page_admin=accueil&idadministrateur='.$_SESSION['idadmin'].'');
        }
    }
    
}
if (isset($_SESSION['idadmin'])) {
    ?><a href="../index.php?page=disconnect" class="btn btn-link"  name="bouton_deconnecter_admin" id="btn-deco-admin">Se Deconnecter</a>
        <?php
    
} else {
    ?>
    <button class="btn btn-link float-right" data-toggle="modal" data-target="#fenetreConnexionAdmin" name="bouton_connecter_admin" id="bouton_connecter_admin">Administration</button>
    <div class="modal fade" id="fenetreConnexionAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Se Connecter en tant qu'Administrateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form-connexion">
                        <div class="form-group row">
                            <label for="log" class="col-form-label col-sm-2">Login:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="loginCoAdmin" id="loginCoAdmin"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="motdepasse" class="col-form-label col-sm-2">Mot de passe:</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="mpCoAdmin" id="mpCoAdmin"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success" id="connexion_admin" name="connexion_admin" >Connexion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>

