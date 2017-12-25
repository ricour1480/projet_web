<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BouquinDB
 *
 * @author Christopher
 */
class BouquinDB extends Bouquin {
        private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    public function updateInfoLivre($champ,$nouveau,$id){
        try{
            $query="update bouquin set " . $champ . " = '" . $nouveau . "' where ID_BOUQUIN='" . $id . "'";
            $resultset=$this->_db->prepare($query);
            //$resultset->bindValue(':page',$page,PDO::PARAM_STR);
            $resultset->execute();
            //$data=$resultset->fetchAll();
            //var_dump($data);
        }catch(PDOException $e){
            print "Erreur : ".$e->getMessage();
        }
        
    }
}
