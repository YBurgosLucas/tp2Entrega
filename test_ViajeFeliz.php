<?php

    include "Viaje.php";
    include "ResponsableV.php";
    include_once "Pasajero.php";
    include_once "PasajerosConNE.php";
    include_once "PasajerosVIP.php";
     
    $colePasajeros=[];
    $objResponsable=null;
    $viaje=null;
    
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
               
            break;
            case 2:


                break;
            case 3:
                
                break;
            case 4:
                
                break;
        }
    
    }while($opcion!= 5);