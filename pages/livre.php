<?php
//J'ai besoin de la classe GenreDB.class.php
$genre = new GenreDB($cnx);
$tabGenre = $genre->getGenre();
$nbrGenre = count($tabGenre);
if (isset($_GET['choix'])) {
    $livre = new vue_livre($cnx);
    $tabLivre = $livre->getVueLivre($_GET['id_genre']);
    $nbrLivre = count($tabLivre);
}
?>
<h2>Nos Bouquins</h2>
<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get"> 
        <div class="row">
            <div class="col-sm-1">
                <span class="txtGras white">GENRE</span>
            </div>
            <div class="col-sm-3">
                <select name="id_genre" id="id_genre">
                    <?php
                    for ($i = 0; $i < $nbrGenre; $i++) {
                        ?>
                        <option value="<?php print $tabGenre[$i]->ID_GENRE; ?>">
                            <?php print utf8_encode($tabGenre[$i]->NOM); ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-2">
                <input type="submit" name="choix" value="Choisir" id="choix"/>
            </div>
        </div>
    </form>
</div>
<div class="container">
    <?php
    if (isset($tabLivre)) {
        if ($nbrLivre > 0) {
            ?>
            <div class="row ligne">
                <div class="col-sm-12 txtGras genre">
                    <?php print utf8_encode($tabLivre[0]['NOM']); ?>
                </div>
            </div>
            <?php for ($i = 0; $i < $nbrLivre; $i++) { ?>
                <div class="row ">
                    <div class="col-sm-3 ">
                        <img src="admin/images/<?php print $tabLivre[$i]['image']; ?>" alt="Livre"/>
                    </div>
                    <div class="col-sm-4 text-center">                        
                        <br/>
                        <div class="row">
                            <div class="col-sm-12 text-danger txtRouge">
                                <span class="txt150">
                                    <?php print utf8_encode($tabLivre[$i]['TITRE']); ?>
                                </span>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras white">
                                <br/>
                                <?php print utf8_encode($tabLivre[$i]['AUTEUR']); ?>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras white">
                                <br/>
                                <?php print utf8_encode($tabLivre[$i]['EDITEUR']); ?>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras white">
                                <br/>
                                <?php print utf8_encode($tabLivre[$i]['SOMME_LIVRE']); ?>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-sm-12 txtGras">
                                <br/>
                                <a href="index.php?page=commande&id=<?php print $tabLivre[$i]['ID_BOUQUIN']; ?>">Commander</a>
                                <br/>
                            </div>                             
                        </div>
                    </div>
                    <?php
                }//for $i
                ?>
            </div>
            <?php
        }//fin du if $nbrLivre
        else {
            ?><span class="white txtGras">Aucun livre ne fait partie de cette cat&eacute;gorie</span><?php
        }
    }//fin du if isset
    ?>
</div>