<?php

$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";

function average($input){
    $values = explode(" ",$input);
    $average = array_sum($values)/count($values);
    return $average;
}

function maximum($input, $num){
    $values = explode(" ",$input);
    $new_values = $values;

    for ($step=0; $step < $num; $step++) { 
        $max[] = max($new_values);
        $new_values = array_diff( $new_values, $max );   
    }

    return $max;
}

function minimum($input, $num){
    $values = explode(" ",$input);
    $new_values = $values;

    for ($step=0; $step < $num; $step++) { 
        $min[] = min($new_values);
        $new_values = array_diff( $new_values, $min );   
    }

    return $min;
}

$average = average($nilai);
echo '<br> Nilai Rata-rata = '.$average;
echo '<br>';
$maximum = maximum($nilai, 7);
echo '<br> 7 Nilai Tertinggi = ';
echo '<pre>';
print_r($maximum);

$minimum = minimum($nilai, 7);
echo '<br> 7 Nilai Terendah = ';
echo '<pre>';
print_r($minimum);
?>