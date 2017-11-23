<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenreDB
 *
 * @author Christopher
 */
class GenreDB extends Genre {
        private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    public function getGenre(){
        try{
            $query="select * from genre";
            $resultset=$this->_db->prepare($query);
            //$resultset->bindValue(':page',$page,PDO::PARAM_STR);
            $resultset->execute();
            //$data=$resultset->fetchAll();
            //var_dump($data);
            while($data = $resultset->fetch()){
                 $_infoArray[]= new Info($data);
                 
            }
            return $_infoArray;
        }catch(PDOException $e){
            print "Erreur : ".$e->getMessage();
        }
        
    }
}
