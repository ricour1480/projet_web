<?php
$commande = new Vue_Commande($cnx);
$tabComm = $commande->getPanierCommande();
$nbrCom = count($tabComm);
?>
<h2>Liste des Commandes :</h2>
<a href="./pages/imprimer.php"><img src="./images/pdf.jpg" alt="PDF"/></a>
<?php if ($nbrCom > 0) { ?>
    <div class="table_commande">
        <table class="table table-striped table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre du Livre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Nom du client</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < $nbrCom; $i++) { ?>
                    <tr>
                        <th scope="row"><?php print ($i + 1); ?></th>
                        <td><?php print $tabComm[$i]['TITRE']; ?></td>
                        <td  id="<?php print $tabComm[$i]['ID_BOUQUIN'];?>" name="AUTEUR" contenteditable="true" class="over"><?php print $tabComm[$i]['auteur']; ?></td>
                        <td><?php print $tabComm[$i]['SOMME_LIVRE']; ?></td>
                        <td><?php print $tabComm[$i]['nom_client']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    print 'Aucune commande faite';
}
?>
