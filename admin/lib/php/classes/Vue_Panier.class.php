<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_Panier
 *
 * @author Christopher
 */
class Vue_Panier {

    private $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    //liste des gâteaux correspondant au choix du type dans liste déroulante
    function ajoutPanierTemp($idlivre, $idclient, $prix) {

        try {
            $query = "insert into panier(ID_BOUQUIN,ID_CLIENT,PRIX) values(:idlivre,:idclient,:prix)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idlivre', $idlivre,PDO::PARAM_STR);
            $resultset->bindValue(':idclient', $idclient,PDO::PARAM_STR);
            $resultset->bindValue(':prix', $prix,PDO::PARAM_STR);
            $resultset->execute();
            //var_dump($data);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function getPanierTemp($idclient) {

        try {

            $query = "SELECT * FROM vue_panier where ID_CLIENT=:idclient";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idclient', $idclient,PDO::PARAM_STR);
            //var_dump($data);
            $resultset->execute();
            $data=$resultset->fetchAll();
            if(!empty($data)){
                return $data;
            }
            /*while ($data = $resultset->fetch()) {
                try {
                    $_infoArray[] = $data;
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
            
            return $_infoArray;*/
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

}
