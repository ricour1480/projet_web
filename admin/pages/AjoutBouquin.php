<?php
$genre_livre = new GenreDB($cnx);
$tabGenreLivre = $genre_livre->getGenre();
$nbrGenreLibre = count($tabGenreLivre);
if(isset($_GET['ajout'])){
    extract($_GET,EXTR_OVERWRITE);
    if(empty($titre)||empty($editeur)||empty($auteur)||empty($prix)||empty($image)||empty($idgenreLivre)){
        ?><span class="txtGras white">Un ou plusieurs champs sont vide(s)</span><?php
    }else{
        $newbook = new BouquinDB($cnx);
        $newbook->addLivre($auteur, $editeur, $image, $prix, $titre);
        $test= $newbook->getIdBouquin();
        //print $test[0];
        $idlivre=  intval($test[0]);
        $newbook->addgenreLivre($idlivre, $idgenreLivre);
    }
}
?>
<h2>Ajouter un livre</h2>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <div class="form-group row">
        <label for="inputTitre" class="col-sm-5 col-form-label">Titre :</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="titre" name="titre"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputAuteur" class="col-sm-5 col-form-label">Auteur :</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="auteur" name="auteur"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEditeur" class="col-sm-5 col-form-label">Editeur :</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="editeur" name="editeur"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPrix" class="col-sm-5 col-form-label">Prix :</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="prix" name="prix"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputImage" class="col-sm-5 col-form-label">Image :</label>
        <div class="input-group col-sm-7">
            <div class="input-group-addon">.jpg</div>
            <input type="text" class="form-control" name="image" id="image" placeholder="img.jpg">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputGenre" class="col-sm-5 col-form-label">Genre :</label>
        <div class="col-sm-7">
            <select id="idgenreLivre" name="idgenreLivre">
                <?php for ($i = 0; $i < $nbrGenreLibre; $i++) { ?>
                    <option value="<?php print $tabGenreLivre[$i]->ID_GENRE; ?>">
                        <?php print utf8_encode($tabGenreLivre[$i]->NOM); ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
        </div>
    </div>
</form>

