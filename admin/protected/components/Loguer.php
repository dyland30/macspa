<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Permite guardar logs en un archivo de texto
 *
 * @author dcastillo
 */
class Loguer {
    //put your code here
    public static function registrar($titulo, $mensaje){
        //crear archivo log
        
        $myFile = Yii::app()->basePath.DIRECTORY_SEPARATOR."LOG.txt";
        $fh = fopen($myFile, 'a') or die("can't open file");
        $titulo = $titulo;
        fwrite($fh, $titulo);
        fwrite($fh, $mensaje." \n");
        fclose($fh);
        
    }
}

?>
