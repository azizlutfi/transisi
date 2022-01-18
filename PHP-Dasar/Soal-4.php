<?php
    function table_pattern(){
        $max_val = 64;
        $pattern_x = 1;
        $pattern_y = 1;
        echo "<table>";
            for ($step=1; $step <= $max_val; $step++) { 
                
                if ($pattern_x == 1) {
                    if ($pattern_y == 1 || $pattern_y == 2) {
                        $bg = "background-color: black; color: white;";
                    } else {
                        $bg = "";
                    }
                } elseif ($pattern_x == 2) {
                    if ($pattern_y == 1 || $pattern_y == 3) {
                        $bg = "background-color: black; color: white;";
                    } else {
                        $bg = "";
                    }
                } elseif ($pattern_x == 3) {
                    if ($pattern_y == 2 || $pattern_y == 3) {
                        $bg = "background-color: black; color: white;";
                    } else {
                        $bg = "";
                    }
                }
                
                if (fmod($step, 8) == 1) {
                    echo "<tr>";
                    echo '<td style="padding: 10px 10px; text-align: center;'.$bg.'">'.$step.'</td>';
                } elseif (fmod($step, 8) == 0) {
                    echo '<td style="padding: 10px 10px; text-align: center;'.$bg.'">'.$step.'</td>';
                    echo "</tr>";
                } else {
                    echo '<td style="padding: 10px 10px; text-align: center;'.$bg.'">'.$step.'</td>';
                }

                if ($pattern_y == 4) {
                    $pattern_y = 1;
                    if ($pattern_x == 3) {
                        $pattern_x = 1;
                    }else {
                        $pattern_x++;
                    }
                } else {
                    $pattern_y++;
                }
            }
        echo "</table>";
    }

    table_pattern();
?>