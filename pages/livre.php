<?php
//J'ai besoin de la classe GenreDB.class.php
$genre = new GenreDB($cnx);
$tabGenre = $genre->getGenre();
$nbrGenre = count($tabGenre);
?>
<h2>Nos Bouquins</h2>
<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF'];?>" method="get"> 
    <div class="row">
        <div class="col-sm-1">
            <span class="txtGras white">GENRE</span>
        </div>
        <div class="col-sm-3">
            <select name="id_genre" id="id_genre">
                <?php
                for ($i = 0; $i < $nbrGenre; $i++) {
                    ?>
                    <option value="<?php print $tabGenre[$i]->ID_GENRE;?>">
                        <?php print utf8_encode($tabGenre[$i]->NOM);?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-sm-2">
            <input type="submit" name="choixtype" value="Choisir"/>
        </div>
    </div>
    </form>
</div>
<div class="container">

</div>