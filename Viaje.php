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
include_once "Pasajero.php";
include_once "PasajerosVIP.php";
include_once "PasajerosConNE.php";


class Viaje{
        private $codigoViaje;
        private $destino;
        private $cantMaxP;
        private $colecPasajeros;//arreglo informacion de pasajeros
        private $objResponsable;
        private $costoUnViaje;
    
        
    public function __construct($codiViaje, $lugar, $maxPersonas, $colecPasajeros, $responsable, $costoUnViaje ){
        $this->codigoViaje=$codiViaje;
        $this->destino=$lugar;
        $this->cantMaxP=$maxPersonas;
        $this->colecPasajeros=$colecPasajeros;
        $this->objResponsable=$responsable;
        $this->costoUnViaje=$costoUnViaje;
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
    public function getCostoViaje(){
        return $this->costoUnViaje;
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
    
    public function setCostoViaje($costoUnViaje){
        $this->costoUnViaje=$costoUnViaje;
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
                "\nColeccion Pasajero:\n".$this->retornarColecPasajero().
                "\nResponsable:".$this->getObjResponsable().
                "\nCosto Viaje:$".$this->getCostoViaje(); 

        return $cadena;
        }
        
//metodos para modificar
public function pasajeroExistente($dni){
    $existente=false;
    $i=0;
    $colePasajeros=$this->getColePasajeros();
    if(count($colePasajeros)>0){
        do{
            if($colePasajeros[$i]->getNroDocumento()==$dni){
            $existente=true;
              }
        $i++;
         } while($i<count($colePasajeros) && $existente==false);
    }
    return $existente;
}


public function agregarPasajero($objPasajero) {
    $valido=false;
    $colecPasajeros=$this->getColePasajeros();
     if($this->pasajeroExistente($objPasajero->getNroDocumento())==false){
            $valido=true;
            $i=count($colecPasajeros);
            $colecPasajeros[$i]=$objPasajero;
            $this->setColecPasajeros($colecPasajeros);        
        }
    return $valido;    
    }   
    
 
 public function hayPasajesDisponile(){
    $i=count($this->getColePasajeros());
    
    if($this->getCantMaxP()>$i){
        $asientosDisponible=true;
    }
    else{
        $asientosDisponible=false;
    }
    return $asientosDisponible;

 }
 public function venderPasaje($objPasajero){
    $costofinal=0;
    if($this->hayPasajesDisponile()){
        if($this->agregarPasajero($objPasajero)){
            $porcentaje=$objPasajero->darPorcentajeIncremento();
            $costofinal=$this->getCostoViaje()+(($this->getCostoViaje()*$porcentaje)/100);
         }
    }

     return $costofinal;
    }

public function montoTotalPortodosPasajero(){
    $costoTotal=0;
    foreach($this->getColePasajeros() as $unPasajero){
            $porcentaje=$unPasajero->darPorcentajeIncremento();
            $costoTotal+=$this->getCostoViaje()+(($this->getCostoViaje()*$porcentaje)/100);
        }
        return $costoTotal;
    }

 }

