<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connexion
 *
 * @author User
 */
class Connexion {

    //put your code here
    private static $_instance = null;

    public static function getinstance($dsn, $user, $pass) {
          
        if (!self::$_instance) {

            try {
                self::$_instance = new PDO($dsn, $user, $pass);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //print "Reussi";
            } catch (PDOException $a) {

                print"Echec connexion" . $a->getMessage();
            }
        }

        return self::$_instance;
    }

}
