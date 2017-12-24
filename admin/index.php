<!--Page index pour le coté admin-->
<?php
session_start();
$_SESSION['idadmin']=$_GET['idadministrateur'];
$idadmin = $_SESSION['idadmin'];
include ("lib/php/php_file_include.php");
$cnx = Connexion::getinstance($dsn, $user, $pass);?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Centrale Librairie en ligne</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="lib/js/function.js"></script>
        <script src="lib/js/functionCon.js"></script>
        <link rel="stylesheet" href="lib/css/style_projet.css"/>
    </head>
    <body>
        <div class="container">
            <header>
                <div class="row bckg">
                    <div id="banniere"><img src="../images/banniere_libraire.jpg" alt="banniere"/></div>
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <nav>
                            <?php
                            if (file_exists("lib/php/menuAdmin.php")) {
                                include("lib/php/menuAdmin.php");
                            }
                            ?>
                        </nav>
                    </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-8 float-right">
                                <?php
                                if(isset($_SESSION['idadmin'])){
                                    if(file_exists("../pages/adminConnexion.php"))
                                    {
                                        include '../pages/adminConnexion.php';
                                    }
                                }
                                else{
                                    print "pas de session";
                                }
                                ?>
                            </div>
                            <section id="page_admin">
                                <?php
                                //on arrive sur le site
                                if (!isset($_SESSION['page_admin'])) {
                                    $_SESSION['page_admin'] = "accueil";
                                }
                                //on a cliquez sur un lien du menu
                                if (isset($_GET['page_admin'])) {
                                    $_SESSION['page_admin'] = $_GET['page_admin'];
                                }
                                $path = "./pages/" . $_SESSION['page_admin'] . ".php";
                                if (file_exists($path)) {
                                    include ($path);
                                } else {
                                    ?>
                                    <span class="erreur"> Oups , la  page n'existe pas</span>
                                    <?php
                                }
                                ?>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
            <footer><?php
                if (file_exists("./lib/php/p_gt_footer.php")) {
                    include("./lib/php/p_gt_footer.php");
                    //print "Session :" . $_SESSION['idadmin'];
                }
                ?>
            </footer>
        </div>
    </body>
</html>




