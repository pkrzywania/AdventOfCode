<?php

$file = fopen("input_p","r");

if ($file) {
    
    $sumOfPriority = 0;
    //part 1
    // while (($fileLine = fgets($file)) !== false) {
    //     $fileLine = preg_replace('/\s+/', '', $fileLine);
    //     $rucksacks = str_split($fileLine, strlen($fileLine)/2);
    //     foreach (str_split($rucksacks[0]) as $char) {
    //         if (strpos($rucksacks[1], $char) !== false) {
    //             $priority = 0;
    //             if (ctype_upper($char)) {
    //                 $priority = ord($char) - ord('A') + 27;
    //             } else {
    //                 $priority = ord($char) - ord('a') + 1;
    //             }
                
    //             echo "Common char is: " . $char . " and priority is " . $priority . "\n";

    //             $sumOfPriority += $priority;

    //             break;
    //         }
    //     }
    // }
    //part 2
    while (($fileLine1 = fgets($file)) !== false && ($fileLine2 = fgets($file)) !== false && ($fileLine3 = fgets($file)) !== false) {
        $fileLine1 = preg_replace('/\s+/', '', $fileLine1);
        $fileLine2 = preg_replace('/\s+/', '', $fileLine2);
        $fileLine3 = preg_replace('/\s+/', '', $fileLine3);
        
        $char = array_pop(
            array_intersect(
                str_split($fileLine1),
                str_split($fileLine2),
                str_split($fileLine3)
            )
        );
        
        $priority = 0;
        if (ctype_upper($char)) {
            $priority = ord($char) - ord('A') + 27;
        } else {
            $priority = ord($char) - ord('a') + 1;
        }
        
        echo "Common char is: " . $char . " and priority is " . $priority . "\n";

        $sumOfPriority += $priority;
    }
    echo "Sum of priority: " . $sumOfPriority;
} else {
    echo "Can't open input file";
}

fclose($file);