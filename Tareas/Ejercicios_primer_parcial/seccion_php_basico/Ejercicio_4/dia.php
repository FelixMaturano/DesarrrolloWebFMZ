<?php
$numero = $_GET['numero'];


if( $numero > 0 && $numero < 8){
    if($numero == 1){
        echo "\n El numero $numero  ===  Lunes";
    }if($numero == 2 ){
        echo "\n El numero $numero  === Martes";
    }if($numero == 3){
    echo "\n El numero $numero  === Miercoles"; 
    }if($numero == 4){
        echo "\n El numero $numero  === Jueves";
    }if($numero == 5){
        echo "\n El numero $numero  === Viernes";
    }if($numero == 6 ){
        echo "\n El numero $numero  === Sabado";
    }if($numero ==7){
        echo "\n El numero $numero  === Domingo";
    }
}else{
    echo "En numero introducido no esta en el rando de 1 al 7";
}
?>