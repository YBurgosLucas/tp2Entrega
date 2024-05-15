<?php

    include "Viaje.php";
    include "ResponsableV.php";
    include_once "Pasajero.php";
    include_once "PasajerosConNE.php";
    include_once "PasajerosVIP.php";
     
    $colePasajeros=[];
    $objResponsable=null;
    $objViaje=null;
    
    do{
        echo "ingresar Opcion:\n";
        echo "1-Crear Viaje\n";
        echo "2-Agregar Pasajero \n";
        echo "3-modificar Pasajero\n";
        echo "4-Mostrar viaje\n";
        echo "5-Salir\n";
        echo "opcion:";
        $opcion=trim(fgets(STDIN));
        switch($opcion){
            case 1:
                if($objViaje == null){//$codiViaje, $lugar, $maxPersonas, $colePasajeros, $responsable
                    echo "Ingresar codigo Viaje: ";
                    $codiViaje=trim(fgets(STDIN));
                    echo "\nIngresar Lugar: ";
                    $lugar=trim(fgets(STDIN));
                    echo "\nIngresar Cant.Maxima:";
                    $cantMax=trim(fgets(STDIN));
                    /*---------------------------------- */
                    echo "ingresar Nro.Responsable:";//$nroEmpleado, $licencia, $nom, $apell
                    $nroResponsable=trim(fgets(STDIN));
                    echo "\nIngresar Nro.Licencia:";
                    $nroLicencia=trim(fgets(STDIN));
                    echo "\nIngresar nombre:";
                    $nombre=tirm(fgets(STDIN));
                    echo "\nIngresar Apellido:";
                    $apellido=trim(fgets(STDIN));
                    $objResponsable=new ResponsableV($nroEmpleado,$nroLicencia,$nombre,$apellido);
                    $objViaje=new Viaje($codiViaje,$lugar,$colePasajeros,$objResponsable);
                }
                else{
                    echo "Viaje Creado\n";
                }
               
            break;
            case 2: //pasajero=$nombre, $apellido, $dni, $telefono, $numAsiento
                echo "Ingresar nombre:";
                $nombre=trim(fgets(STDIN));
                echo "\nIngresar apellido:";
                $apellido=trim(fgets(STDIN));
                echo "\nIngresar DNI:";
                $dni=trim(fgets(STDIN));
                echo "\nIngresar Telefono";
                $telefono=trim(fgets(STDIN));
                echo "\nNro.Asiento:";
                $numAsiento=trim(fgets(STDIN));
                echo "Tipo de Pasajero:\n1-Estandar.\n2-Pasajero VIP\n3-Pasajero con necesidades Especiales\n ingresa opcion:";
                $opcion2=trim(fgets(STDIN));
                switch($opcion2){
                    case 1:
                        $objPasajero=new Pasajero($nombre,$apellido,$dni,$telefono,$numAsiento);
                        break;
                    case 2:
                        echo "ingresar numero pasajero Frecuente:";
                        $nroPfrecuente=trim(fgets(STDIN));
                        echo "\nIngresar Cant.Millas:";
                        $cantMillas=trim(fgets(STIDN));
                }


                break;
            case 3:
                
                break;
            case 4:
                
                break;
        }
    
    }while($opcion!= 5);