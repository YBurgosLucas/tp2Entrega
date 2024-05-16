<?php

    include "Viaje.php";
    include_once "ResponsableV.php";
    include_once "Pasajero.php";
    include_once "PasajerosConNE.php";
    include_once "PasajerosVIP.php";
     
    
    $objResponsable=null;
    $objViaje=null;
    $colePasajeros=[];

    do{
        echo "ingresar Opcion:\n";
        echo "1-Crear Viaje\n";
        echo "2-Agregar Pasajero y vender pasaje \n";
        echo "3-modificar Pasajero\n";
        echo "4-Mostrar viaje y costo Total \n";
        echo "5-Salir\n";
        echo "opcion:";
        $opcion=trim(fgets(STDIN));
        switch($opcion){
            case 1:
                if($objViaje == null){//$codiViaje, $lugar, $maxPersonas, $colePasajeros, $responsable
                    echo "Ingresar codigo Viaje: ";
                    $codiViaje=trim(fgets(STDIN));
                    echo "Ingresar Lugar: ";
                    $lugar=trim(fgets(STDIN));
                    echo "Ingresar Cant.Maxima:";
                    $cantMax=trim(fgets(STDIN));
                    /*---------------------------------- */
                    echo "ingresar Nro.Responsable:";//$nroEmpleado, $licencia, $nom, $apell
                    $nroEmpleado=trim(fgets(STDIN));
                    echo "Ingresar Nro.Licencia:";
                    $nroLicencia=trim(fgets(STDIN));
                    echo "Ingresar nombre:";
                    $nombre=trim(fgets(STDIN));
                    echo "Ingresar Apellido:";
                    $apellido=trim(fgets(STDIN));
                    echo "Ingresar el costo del pasaje: $";
                    $costoPasaje=trim(fgets(STDIN));
                    $objResponsable=new ResponsableV($nroEmpleado,$nroLicencia,$nombre,$apellido);
                    $objViaje=new Viaje($codiViaje,$lugar,$cantMax, $colePasajeros,$objResponsable, $costoPasaje );
                    echo "-------------------------------------------\n";
                    echo $objViaje."\n";
                    echo "-------------------------------------------\n";
                }
                else{
                    echo "-------------------------------------------\n";
                    echo "Viaje Creado\n";
                    echo "-------------------------------------------\n";
                }
               
            break;
            case 2: //pasajero=$nombre, $apellido, $dni, $telefono, $numAsiento, $numTicket
                if($objViaje->hayPasajesDisponile()){
                    echo "Ingresar nombre:";
                    $nombre=trim(fgets(STDIN));
                    echo "Ingresar apellido:";
                    $apellido=trim(fgets(STDIN));
                    echo "Ingresar DNI:";
                    $dni=trim(fgets(STDIN));
                    echo "Ingresar Telefono: ";
                    $telefono=trim(fgets(STDIN));
                    echo "Nro.Asiento:";
                    $numAsiento=trim(fgets(STDIN));
                    echo "Ingresar numero Ticket:";
                    $numTicket=trim(fgets(STDIN));
                    echo "-------------------------------------------\n";
                    $opcioneCorrectas=[1,2,3];
                    $respuesta=false;
                    do{
                        echo "Tipo de Pasajero:\n1-Estandar.\n2-Pasajero VIP\n3-Pasajero con necesidades Especiales\ningresa opcion:";
                    
                    $opcion2=trim(fgets(STDIN));
                    for($i=0; $i<count($opcioneCorrectas); $i++){
                        if($opcioneCorrectas[$i]==$opcion2){
                            $respuesta=true;
                        }
                    }
                    }while($respuesta==false);
                        switch($opcion2){
                            case 1:
                                $objPasajero=new Pasajero($nombre,$apellido,$dni,$telefono,$numAsiento,$numTicket);
                                echo "-------------------------------------------\n";
                                break;
                            case 2://$nombre, $apellido, $dni, $telefono, $numAsiento,$numPasajeroFrecuente,$cantMillas
                                echo "ingresar numero pasajero Frecuente:";
                                $numPasajeroFrecuente=trim(fgets(STDIN));
                                echo "Ingresar Cant.Millas:";
                                $cantMillas=trim(fgets(STDIN));
                                $objPasajero=new PasajerosVIP($nombre,$apellido,$dni,$telefono,$numAsiento,$numTicket, $numPasajeroFrecuente,$cantMillas);
                                echo "-------------------------------------------\n";
                                break;
                            case 3://$nombre, $apellido, $dni, $telefono, $numAsiento,$serviciosE
                                echo "ingresar cantidad de servicios especiales:";

                                $cantServiciosE=trim(fgets(STDIN));
                                $serviciosE=[];
                                    echo "1-sillas rueda";
                                    echo "\n2-asistecia embarque y desembarque";
                                    echo "\n3-Alimentos especiales";                                 
                                for($i=0; $i<$cantServiciosE; $i++){
                                    echo "\n ingresar nombre de los servicios:";
                                    $serviciosE[$i]=trim(fgets(STDIN));
                                }
                                $objPasajero= new PasajerosConNE($nombre,$apellido,$dni,$telefono,$numAsiento,$numTicket, $serviciosE);
                                echo "-------------------------------------------\n";
                                break; 
                         }
                    
                    $costofinal=$objViaje->venderPasaje($objPasajero);
                    if($costofinal!=0){
                    echo "Agregado con exito\nel costo total de viaje es de $".$costofinal."\n";
                    echo "-------------------------------------------\n";
                    }
                    else{
                        echo "Pasajero Existente \nPor favor ingrese otro\n";
                        echo "-------------------------------------------\n";
                    }  
                }
                else{
                    echo "-------------------------------------------\n";
                    echo "No hay pasajes disponibles\n";
                    echo "-------------------------------------------\n";
                }
                break;
            case 3:
                echo " Que pasajero desear cambiar:\n";
                $opcionPasajero=trim(fgets(STDIN));                
                $opcionPasajero--;
                echo "nuevo nombre: ";
                $nuevoNom=trim(fgets(STDIN));
                echo "nuevo apellido: ";
                $nuveoApellido=trim(fgets(STDIN));
                echo "nuevo Nro.Telefono:";
                $nuevoTelefono=trim(fgets(STDIN));
                echo "nuevo nro.Asiento:";
                $nuevoAsiento=trim(fgets(STDIN));
                echo "nuevo nro.Ticket:";
                $nuevoTicket=trim(fgets(STDIN));
                $colePasajeros[$opcionPasajero]->modificar($nuevoNom, $nuevoApe, $nuevoTele,$nuevoAsiento,$nuevoTicket);
                break;
            case 4:
                echo $objViaje."\n";
                $montoTotal=$objViaje->montoTotalPortodosPasajero();
                echo "-------------------------------------------\n";
                echo "El monto final por todos los pasajeros es de $".$montoTotal."\n";
                echo "-------------------------------------------\n";
                break;
        }
    
    }while($opcion!= 5);