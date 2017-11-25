<?php
$info = new InfoDB($cnx);
$texte = $info->getInfo("accueil");
//var_dump($texte);
?>
<h2 class="txtGras genre">Accueil</h2>
<div class="row">
    <div class="col-sm-6">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./images/librairie_online.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/tas_de_livre.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./images/magas.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Prec&eacute;dent</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Apr&egrave;s</span>
            </a>
        </div>
    </div>
    <div class="col-sm-3">
        <?php
        print $texte[0]->texte;
        ?>
    </div>
    <div class="col-sm-3">
        <aside class="pub">
            <img src="./images/pub.jpg" alt="pub"/> 
        </aside>
    </div>
</div>
