<?php
$erreur="";
$inscription= new InscriptionDB($cnx);
if(isset($_GET['bouton_inscrire'])){
 
    extract($_GET,EXTR_OVERWRITE);
    if(empty($name)||empty($firstname)||empty($email)||empty($verifemail)||empty($adr)||empty($codepostale)||empty($ville)||empty($gsm)||empty($login)||empty($login)){
            $erreur="Un ou plusieurs champs sont vide(s)";
        }else{
           $retour=$inscription->ajoutclient($name, $firstname, $adr, $codepostale, $gsm, $ville, $email, $login, $mp);
        }
}
?>
<h2 class="white txtGras">Formulaire d'inscription</h2>
<div class="container">
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="formulaire">
    <?php print $erreur;?>
    <div class="form-group row">
        <label for="nom" class="col-form-label col-sm-2">Nom:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="name" id="name"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="prenom" class="col-form-label col-sm-2">Prenom:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="firstname" id="firstname" p/>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-form-label col-sm-2">Email:</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" name="email" id="email" placeholder="xxx@xxx.xx"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="verifemail" class="col-form-label col-sm-2">Confirmer l'email:</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" name="verifemail" id="verifemail" placeholder="xxx@xxx.xx"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="Adresse" class="col-form-label col-sm-2">Adresse:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="adr" id="adr"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="codepostal" class="col-form-label col-sm-2">CP:</label>
        <div class="col-sm-2">
            <input type="number" class="form-control" name="codepostale" id="codepostale"/>
        </div>
        <div class="col-sm-6">
            <small id="cp" class="form-text text-muted">*Minimum 4 num&eacute;ros.</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="Ville" class="col-form-label col-sm-2">Ville:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="ville" id="ville"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="tel" class="col-form-label col-sm-2">Tel:</label>
        <div class="col-sm-4">
            <input type="tel" class="form-control" name="gsm" id="gsm" placeholder="xx.xx/xx.xx.xx" />
        </div>
    </div>
    <div class="form-group row">
        <label for="log" class="col-form-label col-sm-2">Login:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="login" id="login"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="motde passe" class="col-form-label col-sm-2">Mot de passe:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="mp" id="mp"/>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
            <input type="submit" class="btn btn-primary"  id="bouton_inscrire" name="bouton_inscrire" value="S'inscrire"/>
        </div>
    </div>
</form>
</div>

