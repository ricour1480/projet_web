<?php
$client = new ClientDB($cnx);
$tabClient = $client->afficheClient();
$nbrclient = count($tabClient);
if (isset($_GET['choix_client'])) {

    $tabCommandeComplete = $client->afficheCommandeCompleteclient($_GET['id_client']);
    $nbrCommande = count($tabCommandeComplete);
    //print " ".$nbrCommande;
}
if (isset($_GET['deletecom'])) {
    $choix = $_GET['id_bouquin_client'];
    //print $choix;
    $client->deleteCommande($choix);
    ?><span class="white txtGras">la commande a été supprimé</span><?php
}
?>
<h2>Annuler une commande</h2>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <div class="row">
        <div class="col-sm-3 white txtGras">Client :</div>
        <div class="col-sm-3">
            <select name="id_client" id="id_client">
                <?php
                for ($i = 0; $i < $nbrclient; $i++) {
                    ?>
                    <option value="<?php print $tabClient[$i]->ID_CLIENT; ?>">
                        <?php print utf8_encode($tabClient[$i]->NOM); ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-sm-6"><input type="submit" name="choix_client" value="Choisir" id="choix_client"/></div>
    </div> 
</form>
<br/>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <?php if (isset($tabCommandeComplete)) { ?>
        <ul class="list-group liste">
            <?php for ($i = 0; $i < $nbrCommande; $i++) { ?>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="radio" name="id_bouquin_client" id="choix_comm" value="<?php print $tabCommandeComplete[$i]->ID_BOUQUIN_CLIENT ?>"/>
                        </div>
                        <div class="col-sm-5">
                            <?php print $tabCommandeComplete[$i]->TITRE; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php print $tabCommandeComplete[$i]->AUTEUR; ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    <?php
    } else {
        print "Aucune commande faite pour ce client";
    }
    ?>
    <br/>
    <div class="row">
        <div class="col-sm-8">
            <input type="submit"  class="btn-primary" name="deletecom" id="deletecom" value="Supprimer"/>
        </div>
    </div>
</form>

