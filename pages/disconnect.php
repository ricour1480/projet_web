
<?php
if(isset($_SESSION['idclient']))
{
    unset($_SESSION['idclient']);
    unset($_SESSION['idcommande']);
}
else{
     ?><?php
}
if(isset($_SESSION['idadmin'])){
    unset($_SESSION['idadmin']);
    
}
if(!isset($_SESSION['idadmin'])){
    ?>
 <?php
    
}
?>
<br/>