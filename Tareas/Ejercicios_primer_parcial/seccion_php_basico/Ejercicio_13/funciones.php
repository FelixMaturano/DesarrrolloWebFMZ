<?php

function fibonacci($n){
    if($n == 0) return 0;
    if($n == 1) return 1;
    return fibonacci($n -1) + fibonacci($n -2);
}

function factorial($n) {
    if ($n == 0 || $n == 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

?>