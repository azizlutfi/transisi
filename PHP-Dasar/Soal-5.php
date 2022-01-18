<?php
    function enkripsi($string){
        $out = '';
        $chars = str_split($string);

        for ($step=1; $step <= count($chars); $step++) { 
            $ascii[$step-1] = ord($chars[$step-1]); 
            
            if (fmod($step, 2) == 0) {
                $enc_ascii[$step-1] = $ascii[$step-1] - $step;
            } else {
                $enc_ascii[$step-1] = $ascii[$step-1] + $step;
            }

            $enc_chars[$step-1] = chr($enc_ascii[$step-1]);

            $out = $out.$enc_chars[$step-1];
        }

        return $out;
    }

    echo enkripsi("DFHKNQ");
?>