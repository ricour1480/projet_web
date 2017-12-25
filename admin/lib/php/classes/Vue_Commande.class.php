<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_Commande
 *
 * @author Christopher
 */
class Vue_Commande {
    private $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }


    function getPanierCommande() {

        try {

            $query = "SELECT * FROM vue_commande";
            $resultset = $this->_db->prepare($query);
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
