<?php

$file = fopen("input_p","r");


if ($file) {
    // part 1
    while (($fileLine = fgets($file)) !== false) {
        // $fileLine = fgets($file);
        $fileLine = preg_replace('/\s+/', '', $fileLine);
        $signal = str_split($fileLine);

        for($i = 0; $i < (strlen($fileLine) - 14); $i += 1) {
            $chars = str_split(substr($fileLine, $i, 14));// . "\n";
            if (count(array_unique($chars)) == 14) {
                echo "na dlugosci = " . ($i + 14) . " znaki sa rozne\n";
                break;
            }
            // if ($i > 0) {
                
                // $subStr = substr($fileLine, 0, $i+4);
                // $strLen = strlen($subStr);
                // echo "Szukam ";
                // print_r($chars);
                // echo " w ". $subStr . " dlugosci ". $strLen . "\n";
                // if (strpos($subStr, $chars[0]) == $strLen - 4 && strpos($subStr, $chars[1]) == $strLen - 3 && strpos($subStr, $chars[2]) == $strLen - 2 && !strpos($subStr, $chars[3]) == $strLen -1) {
                //     echo "MAM na i ==" . $strLen . "\n";
                // }
            // }
        }

        // echo "kolejny string\n\n\n";

    }
}

fclose($file);