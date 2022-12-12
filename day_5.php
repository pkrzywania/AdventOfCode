<?php

$file = fopen("input_p","r");

$stack = [];
//production stack
// [W] [V]     [P]                    
// [B] [T]     [C] [B]     [G]        
// [G] [S]     [V] [H] [N] [T]        
// [Z] [B] [W] [J] [D] [M] [S]        
// [R] [C] [N] [N] [F] [W] [C]     [W]
// [D] [F] [S] [M] [L] [T] [L] [Z] [Z]
// [C] [W] [B] [G] [S] [V] [F] [D] [N]
// [V] [G] [C] [Q] [T] [J] [P] [B] [M]
//  1   2   3   4   5   6   7   8   9 

$stack[1] = ["V", "C", "D", "R", "Z", "G", "B", "W"];
$stack[2] = ["G", "W", "F", "C", "B", "S", "T", "V"];
$stack[3] = ["C", "B", "S", "N", "W"];
$stack[4] = ["Q", "G", "M", "N", "J", "V", "C", "P"];
$stack[5] = ["T", "S", "L", "F", "D", "H", "B"];
$stack[6] = ["J", "V", "T", "W", "M", "N"];
$stack[7] = ["P", "F", "L", "C", "S", "T", "G"];
$stack[8] = ["B", "D", "Z"];
$stack[9] = ["M", "N", "Z", "W"];


//test stack
//     [D]    
// [N] [C]    
// [Z] [M] [P]
//  1   2   3 

// $stack[1] = ["Z", "N"];
// $stack[2] = ["M", "C", "D"];
// $stack[3] = ["P"];

// print_r($stack);

if ($file) {
    // part 1
    while (($fileLine = fgets($file)) !== false) {
        $fileLine = preg_replace('/\s+/', '', $fileLine);
        preg_match_all('!\d+!', $fileLine, $instructions);
//        print_r($instructions);
        $cratesToMove = $instructions[0][0];
        $from = $instructions[0][1];
        $to = $instructions[0][2];
        echo "move " . $cratesToMove ." from " . $from . " to " . $to . "\n";
        $cratesMoved = 0;
        //part 1
        // while ($cratesMoved < $cratesToMove) {
        //     $element = array_pop($stack[$from]);
        //     array_push($stack[$to],$element);
        //     $cratesMoved += 1;
        // }
        // part 2

        $takenCrates = array_slice($stack[$from], (-1) * $cratesToMove, $cratesToMove);
        // print_r(array_values($takenCrates));
        

        foreach ($takenCrates as $crate) {
            array_pop($stack[$from]);
            array_push($stack[$to],$crate);
        }


    }
}

print_r($stack);

fclose($file);