<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InscriptionDB
 *
 * @author Christopher
 */
class InscriptionDB extends Inscription{
      private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    public function ajoutclient($nom,$prenom,$adresse,$cp,$tel,$ville,$email,$login,$mp){
        try{
            $query="insert into client(NOM,PRENOM,ADRESSE,CP,TEL,VILLE,EMAIL,LOGIN,MP) values(:nom,:prenom,:adresse,:cp,:tel,:ville,:email,:login,:mp)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':nom',$nom,PDO::PARAM_STR);
            $resultset->bindValue(':prenom',$prenom,PDO::PARAM_STR);
            $resultset->bindValue(':adresse',$adresse,PDO::PARAM_STR);
            $resultset->bindValue(':cp',$cp,PDO::PARAM_STR);
            $resultset->bindValue(':tel',$tel,PDO::PARAM_STR);
            $resultset->bindValue(':ville',$ville,PDO::PARAM_STR);
            $resultset->bindValue(':email',$email,PDO::PARAM_STR);
            $resultset->bindValue(':login',$login,PDO::PARAM_STR);
            $resultset->bindValue(':mp',$mp,PDO::PARAM_STR);
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            
            //return $retour;
        }catch(PDOException $e){
            print "<br/>Echec de l'inscription";
            print "Erreur : ".$e->getMessage();
        }
        
    }
    public function verifclient($login,$mp){
        try{
            $query="select ID_CLIENT from client where LOGIN=:login and MP=:mp";
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
