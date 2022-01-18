<?php

function count_lower_case($string){
    $lower_case = 0;

    $chars = str_split($string);
    foreach ($chars as $key => $char) {
        if (!preg_match('~^\p{Lu}~u', $char)) {
            $lower_case++;
        }
    }

    return '"'.$string.'" mengandung '.$lower_case.' buah huruf kecil';
}

echo count_lower_case("TranSISI");
?>