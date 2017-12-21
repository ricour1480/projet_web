<?php
if(isset($_GET['confirmer']))
{
    extract($_GET, EXTR_OVERWRITE);
     if (empty($nom) || empty($prenom)||empty($email)||empty($info)) {
        $erreurConnexion = "Un ou plusieurs champs vides";
    }else{
        $demande =new DemandeDB($cnx);
        $retour = $demande->addDemande($nom, $prenom, $email, $info);
        ?><span class="white txtGras">Demande Ajout&eacute;</span><?php
    }
}
?>
<h2 class="white txtGras">Contact</h2>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <div class="form-group row">
        <label for="nomClient" class="col-sm-2 col-form-label white">NOM:</label>
        <div class="col-sm-10">
            <input type="text"  id="nom" name="nom"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="prenomClient" class="col-sm-2 col-form-label white">PRENOM:</label>
        <div class="col-sm-10">
            <input type="text"  id="prenom" name="prenom"/>
        </div>
    </div>
      <div class="form-group row">
        <label for="emailClient" class="col-sm-2 col-form-label white">EMAIL:</label>
        <div class="col-sm-10">
            <input type="email"  id="email" name="email"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="info" class="col-sm-2 col-form-label white">INFO:</label>
        <div class="col-sm-10">
            <textarea rows="4" cols="50" id="info" name="info">Veuillez entrer qqch
            </textarea> 
        </div>
    </div>
    <div class="form-group row">
        <input type="submit"   class="col-sm-4 txtGras confirmer" id="confirmer" name="confirmer" value="CONFIRMER"/>
    </div>
</form>
