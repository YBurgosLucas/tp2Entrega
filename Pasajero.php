<?php
    class Pasajero{
        private $nombre;
        private $dni;
        private $numAsiento;
        private $numTicket;

        public function __construct($nombre, $dni, $numAsiento,$numTicket){
            $this->nombre=$nombre;
            $this->dni=$dni;
            $this->numAsiento=$numAsiento;
            $this->numTicket=$numTicket;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getDni(){
            return $this->dni=$dni;
        }
        public function getNumAsiento(){
            return $this->numAsiento=$numAsiento;
        }
        public function getNumTicket(){
            return $this->numTicket=$numTicket;
        }
        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function setDni($dni){
            $this->dni=$dni;
        }
        public function setNumAsiento($numAsiento){
            $this->numAsiento=$numAsiento;
        }
        public function setNumTicket($numTicket){
            $this->numTicket=$numTicket;
        }
        public function __toString(){
            $cad="nombre:".$this->getNombre().
                 "\ndni:".$this->getDni().
                 "\nNro.Asiento:".$this->getNumAsiento().
                 "\nNro. Ticket: ".$this->getNumTicket();
            return $cad;
        }
    }