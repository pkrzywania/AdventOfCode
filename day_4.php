<?php

$file = fopen("input_t","r");

if ($file) {
    $intersectionNumber = 0;
    // part 1
    while (($fileLine = fgets($file)) !== false) {
        $fileLine = preg_replace('/\s+/', '', $fileLine);
    
        $sections = explode(",", $fileLine);
        $elf1Sections = explode("-", $sections[0]);
        $elf2Sections = explode("-", $sections[1]);
        //part 1
        // if ((intval($elf1Sections[0]) >= intval($elf2Sections[0]) 
        // && intval($elf1Sections[1]) <= intval($elf2Sections[1]))
        // || ((intval($elf2Sections[0]) >= intval($elf1Sections[0]) 
        // && intval($elf2Sections[1]) <= intval($elf1Sections[1])))) {
        //     $intersectionNumber += 1;
        //     echo "Intersect: " . $elf1Sections[0] . "-" . $elf1Sections[1] . " and " . $elf2Sections[0] . "-" . $elf2Sections[1] . "\n";
        // } else {
        //     echo "Not intersect: ". $elf1Sections[0] . "-" . $elf1Sections[1] . " and " . $elf2Sections[0] . "-" . $elf2Sections[1] . "\n";
        // }

        //part2
        if ((intval($elf1Sections[0]) >= intval($elf2Sections[0]) 
        && intval($elf1Sections[0]) <= intval($elf2Sections[1]))
        || ((intval($elf2Sections[0]) >= intval($elf1Sections[0]) 
        && intval($elf2Sections[0]) <= intval($elf1Sections[1])))) {
            $intersectionNumber += 1;
            echo "Intersect: " . $elf1Sections[0] . "-" . $elf1Sections[1] . " and " . $elf2Sections[0] . "-" . $elf2Sections[1] . "\n";
        } else {
            echo "Not intersect: ". $elf1Sections[0] . "-" . $elf1Sections[1] . " and " . $elf2Sections[0] . "-" . $elf2Sections[1] . "\n";
        }

    }

    echo "Intersections number: " . $intersectionNumber;
} else {
    echo "Can't open input file";
}

fclose($file);