<?php
    include_once "Pasajero.php";
    class PasajerosConNE extends Pasajero{
        private  $serviciosE; // servicios Especiales
        
        public function __construct($nombre, $apellido, $dni, $telefono, $numAsiento,$serviciosE){
            parent::__construct($nombre, $apellido, $dni, $telefono, $numAsiento);
            $this->serviciosE=$serviciosE;
        }
        public function getServicioE(){
            return $this->serviciosE;
        }
        public function setServiciosE(){
            $this->serviciosE=$serviciosE;
        }
        public function __toString(){
            $cad=parent::__toString();
            $cad.="Servicio Especial:".$this->getServicioE();
            return $cad;
        }
        public function darPorcentajeIncremento(){
            if(count($this->getServicioE() == 3 )){
                $porcentaje=30;
            }
            else{
                $porcentaje=15;
            }
            return $porcentaje;
        }
    }