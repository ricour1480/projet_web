<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DemandeDB
 *
 * @author Christopher
 */
class DemandeDB extends Demande{
        private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    public function addDemande($nom,$prenom,$email,$info){
        try{
            $query="insert into demande(nom,prenom,email,info)values(:nom,:prenom,:email,:info)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':nom',$nom,PDO::PARAM_STR);
            $resultset->bindValue(':prenom',$prenom,PDO::PARAM_STR);
            $resultset->bindValue(':email',$email,PDO::PARAM_STR);
            $resultset->bindValue(':info',$info,PDO::PARAM_STR);
            $resultset->execute();
            //$data=$resultset->fetchAll();
            //var_dump($data);
            
        }catch(PDOException $e){
            print "Erreur : ".$e->getMessage();
        }
        
    }
}
