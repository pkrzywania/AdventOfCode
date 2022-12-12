<?php

function clearWhiteSpaces($input) {
    $output = [];
    foreach ($input as $i) {
        $output[] = preg_replace('/\s+/', '', $i);
    }
    return $output;
}

$file = fopen("input_p","r");

if ($file) {
    // part 1
    $directory = [];
    $currentDirectory = [];

    while (($fileLine = fgets($file)) !== false) {
        $input = explode(" ", $fileLine);
        $fileSize = 0;
        $input = clearWhiteSpaces($input);

        if ($input[0] === "$") {
            if ($input[1] === "cd") {
                if ($input[2] === "..") {
                    array_pop($currentDirectory);
                } else {
                    $currentDirectory[] = $input[2];
                    $directory[implode("|", $currentDirectory)] = 0; 
                }
            }
        } elseif (is_numeric($input[0])) {
             $fileSize = intval($input[0]);
        }

        for ($i = 0; $i < count($currentDirectory); $i += 1) {
            $currentDir = implode("|", array_slice($currentDirectory, 0, $i+1));
            $directory[$currentDir] += $fileSize;
        }
    }
    
    // var_dump($directory);

    $fileSizeSum = 0;
    foreach ($directory as $dir => $size) {
        echo "dir: " . $dir . ', file size: ' . $size . "\n";
        if ($size <= 100000) {
            $fileSizeSum += $size;
        }
    }

    echo "Calkowity rozmiar: " . $fileSizeSum; 

    asort($directory);
    print_r($directory);

    $unusedSpace = 21618835;
    $totalSize = 70000000;
    $usedSpafe = 48381165;
    $atLeast = 8381165;
}

fclose($file);