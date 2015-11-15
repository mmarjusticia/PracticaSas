<?php

class PacienteSas {
 private $numTarjeta;
 function __construct($numTarjeta=null) {
     $this->numTarjeta = $numTarjeta;
 }
 
 function getNumTarjeta() {
     return $this->numTarjeta;
 }

 function setNumTarjeta($numTarjeta) {
     $this->numTarjeta = $numTarjeta;
 }


}
