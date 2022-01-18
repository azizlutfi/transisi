<?php
    $arr = [
        ['f', 'g', 'h', 'i'],
        ['j', 'k', 'p', 'q'],
        ['r', 's', 't', 'u']
    ];

    function cari($arr, $word){
        $chars = str_split($word);

            for ($step=0; $step < count($chars); $step++) { 
               
                for ($row=0; $row < count($arr); $row++) { 
                    for ($col=0; $col < count($arr[$row]); $col++) { 
                        if ($chars[$step] == $arr[$row][$col]) {
                            $row_before[$step+1] = $row;
                            $col_before[$step+1] = $col;

                            if (isset($row_before[$step]) && isset($col_before[$step]) ) {
                                if ($row == $row_before[$step]-1 && $col == $col_before[$step]) {
                                    $res[$step] = TRUE;
                                } elseif ($row == $row_before[$step]+1 && $col == $col_before[$step]) {
                                    $res[$step] = TRUE;
                                } elseif ($row == $row_before[$step] && $col == $col_before[$step]-1) {
                                    $res[$step] = TRUE;
                                } elseif ($row == $row_before[$step] && $col == $col_before[$step]+1) {
                                    $res[$step] = TRUE;
                                } else {
                                    $res[$step] = FALSE;
                                }
                                break;
                            } else {
                                $res[$step] = TRUE;
                                break;
                            }
                        } else {
                            $res[$step] = FALSE;
                        }
                    }
                    if ($res[$step] != FALSE) {
                        break;
                    }
                }

            }

        if (in_array(FALSE, $res)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    // MENAMPILKAN UJI COBA SESUAI CONTOH DI SOAL;
    echo "<br>";
    echo 'cari($arr, "fghi"); // ';
    echo cari($arr, 'fghi') ? 'TRUE' : 'FALSE';
    echo "<br>";
    echo 'cari($arr, "fghp"); // ';
    echo cari($arr, 'fghp') ? 'TRUE' : 'FALSE';
    echo "<br>";
    echo 'cari($arr, "fjrstp"); // ';
    echo cari($arr, 'fjrstp') ? 'TRUE' : 'FALSE';
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo 'cari($arr, "fghq"); // ';
    echo cari($arr, 'fghq') ? 'TRUE' : 'FALSE';
    echo "<br>";
    echo 'cari($arr, "fst"); // ';
    echo cari($arr, 'fst') ? 'TRUE' : 'FALSE';
    echo "<br>";
    echo 'cari($arr, "pqr"); // ';
    echo cari($arr, 'pqr') ? 'TRUE' : 'FALSE';
    echo "<br>";
    echo 'cari($arr, "fghh"); // ';
    echo cari($arr, 'fghh') ? 'TRUE' : 'FALSE';
?>