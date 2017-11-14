<?php

if(file_exists('admin/lib/php/dbconnect.php')){
    
    include('admin/lib/php/dbconnect.php');
    include('admin/lib/php/autoload.php');
    //print "ok ";
    
    
}

else if (file_exists('lib/php/dbconnect.php')){
    include('lib/php/dbconnect.php');
    include('lib/php/autoload.php');
    
    
    
 }
 
 else{
     
     print "ton erreur est dabs php_file";
     
 }