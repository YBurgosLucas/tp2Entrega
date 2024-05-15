<?php
/*registre el número de empleado, número de licencia, nombre y apellido */
    class ResponsableV{
        private $nroEmpleado;
        private $nroLicencia; 
        private $nombre;
        private $apellido;
        
        public function __construct($empleado, $licencia, $nom, $apell){
            $this->nroEmpleado=$empleado;
            $this->nroLicencia=$licencia;
            $this->nombre=$nom;
            $this->apellido=$apell;
        }
    //metodos de acceso get
    public function getNroEmpleado() {
        return $this->nroEmpleado;
    }

    public function getNroLicencia() {
        return $this->nroLicencia;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }
    //metodos acceso set
    public function setNroEmpleado($empleado) {
        $this->nroEmpleado = $empleado;
    }

    public function setNroLicencia($licencia) {
        $this->nroLicencia = $licencia;
    }

    public function setNombre($nom) {
        $this->nombre = $nom;
    }

    public function setApellido($apell) {
        $this->apellido = $apell;
    }
    
    public function __tostring(){
        $cad="Nro. Empleado: ".$this->getNroEmpleado().
             "\nNro. Licencia: ".$this->getNroLicencia().
             "\nNombre y Apellido: ".$this->getNombre()." ".$this->getApellido();
        return $cad;
    }

    }