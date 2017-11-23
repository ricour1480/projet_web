<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Genre
 *
 * @author Christopher
 */
class Genre {
           private $_attribut_de_bd = array();
   //hydrater --> donner des valeur au attribut de la classe
   public function __construct($data) {
       $this->hydrate($data);
       
   }
   private function hydrate(array $data){
       // $key -->nom du champ $value-->sa valeur
       foreach($data as $key => $value){
           $this->$key = $value;
           
       }
   }
   public function __get($name) {
       if(isset($this->_attribut_de_bd[$name])){
           return $this->_attribut_de_bd[$name];
       }
   }
   public function __set($nom, $valeur) {
       $this->_attribut_de_bd[$nom]=$valeur;
   }
   public function faireQqch() {
       print "";
   }
}
