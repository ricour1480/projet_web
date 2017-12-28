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
    public function addLivre($auteur,$editeur,$image,$prix,$titre){
        try{
            $query="insert into bouquin(AUTEUR,EDITEUR,image,SOMME_LIVRE,TITRE)values(:auteur,:editeur,:image,:prix,:titre)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':auteur',$auteur,PDO::PARAM_STR);
            $resultset->bindValue(':editeur',$editeur,PDO::PARAM_STR);
            $resultset->bindValue(':image',$image,PDO::PARAM_STR);
            $resultset->bindValue(':prix',$prix,PDO::PARAM_INT);
            $resultset->bindValue(':titre',$titre,PDO::PARAM_STR);
            $resultset->execute();
            //$data=$resultset->fetchAll();
            //var_dump($data);
        }catch(PDOException $e){
            print "Erreur : ".$e->getMessage();
        }
           
        

    }
    public function getIdBouquin() {
        try{
            $query="select max(ID_BOUQUIN) from bouquin;";
            $resultset=$this->_db->prepare($query);
            $resultset->execute();
            $retour = $resultset->fetch();
            return $retour;
        }catch(PDOException $e){
            print "Erreur : ".$e->getMessage();
        }
    }
    public function addgenreLivre($idbouquin,$idgenre){
        try{
            $query="insert into genre_bouquin(ID_BOUQUIN,ID_GENRE) values(:idbouquin,:idgenre)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':idbouquin',$idbouquin,PDO::PARAM_INT);
            $resultset->bindValue(':idgenre',$idgenre,PDO::PARAM_INT);
            $resultset->execute();
            //$data=$resultset->fetchAll();
            //var_dump($data);
        }catch(PDOException $e){
            print "Erreur : ".$e->getMessage();
        }
    }
}
