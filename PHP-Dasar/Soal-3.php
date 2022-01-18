<?php
    $input = "Jakarta adalah ibukota negara Republik Indonesia";

    function gram($string, $num){
        $out = "";
        $words = explode(" ", strtolower($string));

        for ($step=1; $step <= count($words); $step++) { 
            if ($step == count($words)) {
                $out = $out.''.$words[$step-1];
            } elseif (fmod($step, $num) == 0) {
                $out = $out.''.$words[$step-1].', ';
            } else {
                $out = $out.''.$words[$step-1].' ';
            }
        }
        return $out;
    }

    echo "<ul>";
    echo "<li>Unigram : ".gram($input ,1)."</li>";
    echo "<li>Bigram : ".gram($input ,2)."</li>";
    echo "<li>Trigram : ".gram($input ,3)."</li>";
    echo "</ul>";

?>