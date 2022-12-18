<?php

$file = fopen('input_p', 'r') or die("Unable to open file!");

if ($file) {

    $cycle = 0;
    $rowCycle = 0;

    $interestingCycle = 1;

    $x = 1;
    $sum = 0;
    while (($fileLine = fgets($file)) !== false) {
        //$fileLine = preg_replace('/\s+/', '', $fileLine);
        $instruction = explode(' ', $fileLine);
        for ($i = 0; $i <count($instruction); $i++) {
            $cycle += 1;
            $rowCycle += 1;

            if ($cycle == $interestingCycle) {
                echo "\n";
                $sum += $interestingCycle * $x;
                $rowCycle = 1;
                $interestingCycle += 40;
            }

            if ($rowCycle >= $x && $rowCycle < $x + 3) {
                echo "#";
            } else {
                echo ".";
            }

        }

        if (count($instruction) > 1) {
            $x += intval($instruction[1]);
        }
        
    }

    echo "\nFinal x score: " . $x . ", sum: " . $sum;
    
}

fclose($file);