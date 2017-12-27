<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientDB
 *
 * @author Christopher
 */
class ClientDB extends Client {

    private $_db;
    private $_infoArray;

    public function __construct($cnx) {
        $this->_db = $cnx;
        $this->_infoArray=array();
    }

    //a faire
    public function deleteClient($idclient, $existe) {
        if ($existe) { //execute cette partie du code si le client a deja passé commande afin de supprimer les cles etrangeres
            try {
                $query = "delete from bouquin_client where ID_CLIENT=:idclient";
                $resultset = $this->_db->prepare($query);
                $resultset->bindValue(':idclient', $idclient, PDO::PARAM_INT);
                $resultset->execute();
            } catch (PDOException $ex) {
                print "Erreur : " . $ex->getMessage();
            }
        }
        
        try {
            $query = "delete from client where ID_CLIENT=:idclient";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idclient',$idclient,PDO::PARAM_INT);
            $resultset->execute();
            //$data=$resultset->fetchAll();
            //var_dump($data);
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
        }
    }

    public function afficheCommandeclient($idclient) {
        try {
            $query = "select ID_BOUQUIN from bouquin_client where ID_CLIENT=:idclient";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idclient', $idclient, PDO::PARAM_INT);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_infoArray[] = new Client($data);
            }
            return $_infoArray;
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
        }
    }
    public function afficheCommandeCompleteclient($idclient) {
        try {
            $query = "select bc.ID_BOUQUIN_CLIENT as ID_BOUQUIN_CLIENT,b.TITRE as TITRE,b.AUTEUR as AUTEUR from bouquin_client bc,bouquin b where b.ID_BOUQUIN=bc.ID_BOUQUIN and bc.ID_CLIENT=:idclient";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idclient', $idclient, PDO::PARAM_INT);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_infoArray[] = new Client($data);
            }
            return $_infoArray;
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
        }
    }
    public function afficheClient() {
        try {
            $query = "select * from client";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_infoArray[] = new Client($data);
            }
            return $_infoArray;
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
        }
    }
    public function deleteCommande($idbouquincomm){
         try {
            $query = "delete from bouquin_client where ID_BOUQUIN_CLIENT=:idbouquincomm";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idbouquincomm', $idbouquincomm, PDO::PARAM_INT);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
        }
    }
}
