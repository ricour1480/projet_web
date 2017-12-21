
<?php
if(isset($_SESSION['idclient'])|| isset($_SESSION['idadmin']))
{
    session_destroy();
}
else{
     print "Vous êtes déconnecté";
}
?>
<meta http-equiv="refresh": content="2;url=index.php"/>
<br/>