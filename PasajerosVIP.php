<?php
    include "Pasajero.php";
    class PasajerosVIP extends Pasajero{
        private $numPasajeroFrecuente;
        private $cantMillas;
        public function __construct($nombre, $dni, $numAsiento,$numTicket,$numPasajeroFrecuente,$cantMillas){
            parent::__construct($nombre, $dni, $numAsiento,$numTicket);
            $this->numPasajeroFrecuente=$numPasajeroFrecuente;
            $this->cantMillas=$cantMillas;
        }
        public function getNumPasajeroFrecuente(){
           return $this->numPasajeroFrecuente;
        }
        public function getCantMillas(){
            return $this->cantMillas;
        }
        public function setNumPasajeroFrecuente($numPasajeroFrecuente){
            $this->umPasajeroFrecuente=$numPasajeroFrecuente;
        }
        public function setCantMillas($cantMillas){
            $this->cantMillas=$cantMillas;
        }
        public function __toString(){
            $cad=parent::__toString();
            $cad.="\nNro.Pasajero Frecuente:".$this->getNumPasajeroFrecuente().
                 "\nCant.Millas:".$this->getCantMillas();
            return $cad;
        }
    }