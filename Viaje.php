<?php
/*La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase 
(incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros.
Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información
del viaje, modificar y ver sus datos.

Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento 
y teléfono.El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la 
información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia 
al responsable de realizar el viaje.

Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que
agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este 
cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje. */

class Viaje{
        private $codigoViaje;
        private $destino;
        private $cantMaxP;
        private $colecPasajeros;//arreglo informacion de pasajeros
        private $objResponsable;
        
    public function __construct($codiViaje, $lugar, $maxPersonas, $colecPasajeros, $responsable ){
        $this->codigoViaje=$codiViaje;
        $this->destino=$lugar;
        $this->cantMaxP=$maxPersonas;
        $this->colecPasajeros=$colecPasajeros;
        $this->objResponsable=$responsable;
    }
// metodos acceso get
    public function getCodigoViaje() {
      return $this->codigoViaje;
   }

    public function getDestino() {
        return $this->destino;
    }

    public function getCantMaxP() {
        return $this->cantMaxP;
    }

    public function getColePasajeros() {
        return $this->colecPasajeros;
    }

    public function getObjResponsable(){
        return $this->objResponsable;
    }
//metodos acceso set
    public function setCodigoViaje($codiViaje) {
         $this->codigoViaje = $codiViaje;
    }

    public function setDestino($lugar) {
        $this->destino = $lugar;
        }

    public function setCantMaxP($maxPersonas) {
         $this->cantMaxP = $maxPersonas;
    }

    public function setColecPasajeros($colecPasajeros) {
         $this->colecPasajeros = $colecPasajeros;
    }
    
    public function setObjResponsable($responsable){
        $this->objResponsable=$responsable;
    }
    public function retornarColecPasajero(){
        $cad="";
        foreach ($this->getColePasajeros() as $unPasajero){
            $cad.=$unPasajero."\n";
        }
        return $cad;
    }
    public function __toString(){
        $cadena="Codigo de viaje: ".$this->getCodigoViaje().
                "\nDestino: ".$this->getDestino().
                "\nCapacidad Maxima de Pasajeros: ".$this->getCantMaxP().
                "\nColeccion Pasajero:\n ".$this->retornarColecPasajero().
                "\nResponsable:".$this->getObjResponsable(); 

        return $cadena;
        }
        
//metodos para modificar
public function pasajeroExistente($pasajeros, $dni){
    $existente=false;
    foreach ($this->getPasajeros() as $pasajero) {
        foreach($pasajero as $i){ 
            if($i->getNroDocumento() == $dni){
                $existente=true;
            }
            else{
                $this->pasajeros[]=$pasajero;
                $existente=false;
            }
        }

     }
     return $existente;
}
public function agregarPasajero($pasajeros, $unPasajero) {
    $valido=false;
    $colecPasajeros=$this->getPasajeros();
    if (count($colecPasajeros) < $this->getCantMaxP()) {
        if($this->pasajeroExistente($pasajeros, $unPasajero)==false){
            $np=count($colecPasajeros);
            $colecPasajeros[$np]=$unPasajero;
            $valido=true;
        }
    }
    $this->setPasajeros($colecPasajeros);
    return $valido;
 }



 }

