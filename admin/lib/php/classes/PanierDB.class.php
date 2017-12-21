<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PanierDB
 *
 * @author Christopher
 */
class PanierDB extends Panier {
      private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    public function ajoutCommande($idclient,$idlivre,$prix){
        try{
            $query="insert into bouquin_client(ID_BOUQUIN,ID_CLIENT,PRIX) values(:idlivre,:idclient,:prix)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':idclient',$idclient,PDO::PARAM_STR);
            $resultset->bindValue(':idlivre',$idlivre,PDO::PARAM_STR);
            $resultset->bindValue(':prix',$prix,PDO::PARAM_STR);
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            
            //return $retour;
        }catch(PDOException $e){
            print "<br/>Echec de l'inscription";
            print "Erreur : ".$e->getMessage();
        }
        
    }
    public function suppPanierFictif($idclient){
        try{
            $query="delete * from panier where idclient=:idclient";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':idclient',$idclient,PDO::PARAM_STR);
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            
            //return $retour;
        }catch(PDOException $e){
            print "<br/>Echec de l'inscription";
            print "Erreur : ".$e->getMessage();
        }
        
    }
    
    
}
