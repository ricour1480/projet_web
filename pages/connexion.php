<?php
if (isset($_GET['connexion'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (empty($loginCo) || empty($mpCo)) {
        $erreurConnexion = "Un ou plusieurs champs vides";
    } else {
        $verifConnexion = new InscriptionDB($cnx);
        $retour = $verifConnexion->verifclient($loginCo, $mpCo);
        if ($retour) {
            $_SESSION['idclient'] = $retour;
        }
    }
}

if (isset($_SESSION['idclient'])) {
  ?><a href="index.php?page=disconnect" class="btn btn-link"  name="bouton_deconnecter" id="bouton_deconnecter">Se Deconnecter</a><?php

} else {
    ?>
    <button class="btn btn-link" data-toggle="modal" data-target="#fenetreConnexion" name="bouton_connecter" id="bouton_connecter">Se Connecter</button>
        <div class="modal fade" id="fenetreConnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Se Connecter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form-connexion">
                    <div class="form-group row">
                        <label for="log" class="col-form-label col-sm-2">Login:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="loginCo" id="loginCo"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="motdepasse" class="col-form-label col-sm-2">Mot de passe:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="mpCo" id="mpCo"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <small id="inscription" class="form-text text-muted">Si vous n'avez pas de compte , veuillez vous inscrire <a href="index.php?page=inscription" >ici</a></small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success" id="connexion" name="connexion" >Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   <?php
}
?>

