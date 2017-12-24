<?php
$erreur = "";
$panier = new Vue_Panier($cnx);
$pan = new PanierDB($cnx);
if (isset($_GET['confirmer_comm']) && isset($_SESSION['idcommande']) && isset($_SESSION['idclient'])) {
    $tab = $panier->getPanierTemp($_SESSION['idclient']);
    $nbrAchat = count($tab);
    for ($i = 0; $i < count($tab); $i++) {
        $pan->ajoutCommande($tab[$i]['ID_CLIENT'], $tab[$i]['ID_BOUQUIN'], $tab[$i]['SOMME_LIVRE']);
    }
    $pan->suppPanierFictif($_SESSION['idclient']);
    ?><div class="white txtGras">Votre commande a été confirmer</div>
        <?php
        unset($_SESSION['idcommande']);
        header('Location: index.php?page=accueil');
}
if(isset($_SESSION['idclient']))
{
$tableau = $panier->getPanierTemp($_SESSION['idclient']);
$nbrAchat = count($tableau);
}
if (!isset($_SESSION['idclient'])) {
    ?>
    <h2 class="white txtGras">Commande</h2>
    <div class="white txtGras">Veuillez d'abord vous connecter</div>
    <?php
} else if (!isset($_GET['id']) && !isset($_SESSION['idcommande'])) {
    ?>
    <h2 class="white txtGras">Commande</h2>
    <div class="white">Choissisez d'abord un livre <a href="index.php?page=livre">ici</a></div>
    <?php
} else if (isset($_GET['id'])) {

    $_SESSION['idcommande'] = $_GET['id'];
}
if (isset($_SESSION['idcommande']) && isset($_SESSION['idclient']) && isset($_GET['prix'])) {
    $panier->ajoutPanierTemp($_SESSION['idcommande'], $_SESSION['idclient'], $_GET['prix']);
    ?>
    <h2>Feuille de commande</h2>
    <br/>
    <div class="container">
        <span class="white txtGras"><?php print $erreur ?></span>
        <div class="row">
            <div class="col-sm-3 txtGras white">Panier :
                <br/>
                <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
                    <?php
                    $p = $panier->getPanierTemp($_SESSION['idclient']);
                    //var_dump($p);
                    if (count($p) > 0) {

                        for ($i = 0; $i < count($p); $i++) {
                            ?>
                            <div class="row">
                                <div class="col-sm-6"><img src="./admin/images/<?php print $p[$i]['image']; ?>" alt="image"/></div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12"><span class="white txtGras">Auteur:</span><span class="white"><?php print $p[$i]['AUTEUR']; ?></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12"><span class="white txtGras">Titre:</span><span class="white"><?php print $p[$i]['TITRE']; ?></span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12"><span class="white txtGras">Prix:</span><span class="white" name="prix" id="prix"><?php print $p[$i]['SOMME_LIVRE']; ?></span></div>
                                    </div>   
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <br/>
                        <input type="submit" id="confirmer_comm" name="confirmer_comm" value="Confirmer"/>
                        <?php
                    } else {
                        print "vide";
                    }
                    ?></form></div>
        </div>

    </div>
    <?php
}
?>

