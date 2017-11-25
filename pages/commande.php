<?php
$erreur="";
if(!isset($_GET['id']) && !isset($_SESSION['idcommande'])){
    ?>
<span class="white">Choissisez d'abord un livre <a href="index.php?page=livre">ici</a></span>
     <?php
}
else if(isset($_GET['id']))
{
    $_SESSION['idcommande']=$_GET['id'];
}

if(isset($_SESSION['idcommande'])){
    
    if(isset($_GET['commander']))
    {        
        extract($_GET,EXTR_OVERWRITE);
        if(empty($name)||empty($firstname)||empty($email)||empty($verifemail)||empty($adr)||empty($codepostale)||empty($ville)||empty($gsm)){
            $erreur="Un ou plusieurs champs sont vide(s)";
        }else{
            //insertion dans client et dans bouquin-panier et dans panier + afficher le pannier(possibilité de retirer du pannier
        }
    }

?>
<h2>Formulaire de commande</h2>
<br/>
<div class="container">
<span class="white txtGras"><?php print $erreur ?></span>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form-content">
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
        <div class="col-sm-4">
            <input type="submit" class="btn btn-primary"  id="bouton_commande" name="commander" value="Commander"/>
        </div>
    </div>
</form>
</div>
<?php
}
?>

