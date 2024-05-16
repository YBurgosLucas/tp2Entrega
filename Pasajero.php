<?php
    class Pasajero{
        private $nombre;
        private $apellido; 
        private $nroDocumento; 
        private $telefono;
        private $numAsiento;
        private $numTicket;
    
        public function __construct($nombre, $apellido, $dni, $telefono, $numAsiento,$numTicket){
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->nroDocumento=$dni;
            $this->telefono=$telefono;
            $this->numAsiento=$numAsiento;
            $this->numTicket=$numTicket;
        }
    //metodos de acceso get
        public function getNombre() {
             return $this->nombre;
        }
    
        public function getApellido() {
            return $this->apellido;
        }
    
        public function getNroDocumento() {
             return $this->nroDocumento;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function getNumAsiento(){
            return $this->numAsiento;
        }
        public function getNumTicket(){
            return $this->numTicket;
        }
        
    // metodos de acceso set
        public function setNombre($nombre) {
             $this->nombre = $nombre;
        }
    
        public function setApellido($apellido) {
              $this->apellido = $apellido;
        }
    
        public function setNroDocumento($dni) {
             $this->nroDocumento = $dni;
        }
        
        public function setTelefono($telefono){
            $this->telefono=$telefono;
        }
        public function setNumAsiento($numAsiento){
            $this->numAsiento=$numAsiento;
        }
        public function setNumTicket($numTicket){
            $this->numTicket=$numTicket;
        }

        public function __toString(){
            $cad= "nombre y apellido: ".$this->getNombre()." ".$this->getApellido().
                  "\nDocumento: ".$this->getNroDocumento().
                  "\nTelefono: ".$this->getTelefono().
                  "\nNro.Asiento:".$this->getNumAsiento().
                  "\nNro.Ticket:".$this->getNumTicket();
            return $cad;

        }
        
        public function modificar($nuevoNom, $nuevoApe, $nuevoTele,$nuevoAsiento,$nuevoTicket){
            $this->setNombre($nuevoNom);
            $this->setApellido($nuevoApe);
            $this->setTelefono($nuevoTele);
            $this->getNumAsiento($nuevoAsiento);
            $this->getNumTicket($nuevoTicket);
            
        }
        public function darPorcentajeIncremento(){
            $porcentaje=10;
            return $porcentaje;
        }
    }