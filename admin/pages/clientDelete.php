<?php
$client = new ClientDB($cnx);
$tabClient = $client->afficheClient();
$nbrclient = count($tabClient);

//var_dump($tabComClient);
if (isset($_GET['Yes']) && isset($_SESSION['idadmin'])) {
    //print 'oui';
    $existecomm = false;
    $tabComClient = $client->afficheCommandeclient($_GET['idclient']);
    if ($tabComClient != NULL) {
        $nbr = count($tabComClient);
    } else {
        $nbr = 0;
    }
    if ($nbr != 0) {
        $existecomm = true;
    }
    $client->deleteClient($_GET['idclient'], $existecomm);
}
?>
<br/>
<h2>Supprimer un client</h2>
<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="row">
            <div class="col-sm-4 white txtGras">Client :</div>
            <div class="col-sm-3">
                <select name="idclient" id="idclient">
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
        </div>
        <div class="row"> 
            <div class="col-sm-8">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" name="choixClient">
                    Chosir
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Supprimer un client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
                                    <span class="txtGras">
                                        Voulez vous vraiment supprimer ce client ?
                                    </span>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="No">Non</button>
                                        <input type="submit" class="btn btn-primary col-sm-4" name="Yes" value="Oui"/>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div></div>
    </form>
</div>

