
<?php
if(isset($_SESSION['idclient'])||isset($_SESSION['idadmin']))
{
    unset($_SESSION['idclient']);
    unset($_SESSION['idadmin']);
}

print 'Vous êtes déconnecter';
header('Location: index.php?page=accueil');
?>
<meta http-equiv="refresh": content="2;url=index.php"/>
<br/>