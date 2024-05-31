<?php
    include_once "Pasajero.php";
    class PasajeroEstandar extends Pasajero{
        public function __construct($nombre, $apellido, $dni, $telefono, $numAsiento,$numTicket) {
           parent::__construct($nombre, $apellido, $dni, $telefono, $numAsiento,$numTicket);
        }
        public function __toString(){
            $cad=parent::__toString();
            return $cad;
        }
        public function darPorcentajeIncremento(){ 
            $porcentaje=parent::darPorcentajeIncremento();
            $porcentaje=10+$porcentaje;
            return $porcentaje;
        }
    }