<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminCoDB
 *
 * @author Christopher
 */
class AdminCoDB extends AdminCo{
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    public function verifadmin($login,$mp){
        try{
            $query="select ID_ADMIN from admin where LOGIN=:login and MP=:mp";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':login',$login,PDO::PARAM_STR);
            $resultset->bindValue(':mp',$mp,PDO::PARAM_STR);
            $resultset->execute();
            $retour = $resultset->fetchColumn(0);
            return $retour;
        }  catch (PDOException $e){
            print "Erreur : ".$e->getMessage();
        }
    }
}
