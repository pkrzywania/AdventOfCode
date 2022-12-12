<?php

$file = fopen("input","r") or die("cant open file");

if ($file) {
    $elfs = [];
    $elfNumber = 1;

    while (($fileLine = fgets($file)) !== false) {
        $lineValue = intval($fileLine);
        if ($lineValue > 0) {
            $elfs[$elfNumber] += $lineValue;
        } else {
            $elfNumber += 1;
            $elfs[$elfNumber] = 0;
        }
    }

    arsort($elfs);
    var_dump($elfs);

}

fclose($file);