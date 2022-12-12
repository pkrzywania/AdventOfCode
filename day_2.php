<?php

$file = fopen("input_p","r");

$score = 0;

// $shapeScoreRockX = 1;
// $shapeScorePaperY = 2;
// $shapeScoreScissorsZ = 3;
// $lostScore = 0;
// $drawScore = 3;
// $winScore = 6;
//A rock
//B Paper
//C Scis
$winArray = ["AY", "BZ", "CX"];
$drawArray = ["AX", "BY", "CZ"];
$score2 = 0;

if ($file) { 
    while (($fileLine = fgets($file)) !== false) {
        // part1
        $fileLine = preg_replace('/\s+/', '', $fileLine);
        echo "\nNowa runda: " . $fileLine . " ";
        
        if (strpos($fileLine, "X") !== false) {
            // echo "Add X ";
            $score += 1;
        } else if (strpos($fileLine, "Y") !== false) {
            $score += 2;
            // echo "Add Y ";
        } else if (strpos($fileLine, "Z") !== false) {
            $score += 3;
            // echo "Add Z ";
        }

        if (in_array($fileLine, $winArray)) {
            // echo "Add win";
            $score += 6;
        } else if (in_array($fileLine, $drawArray)) {
            $score += 3;
            // echo "Add draw";
        } else {
            // echo "Lost";
        }
        //part 2
        //X LOSE
        //Y DRAW
        //Z WIN
        if (strpos($fileLine, "X") !== false) {
            // echo "Should lose ";
            if (strpos($fileLine, "A") === 0) {
                $score2 += 3;
            } elseif (strpos($fileLine, "B") === 0) {
                $score2 += 1;
            } elseif (strpos($fileLine, "C") === 0) {
                $score2 += 2;
            }
        } else if (strpos($fileLine, "Y") !== false) {
            // echo "Should draw";
            $score2 += 3;
            if (strpos($fileLine, "A") === 0) {
                $score2 += 1;
            } elseif (strpos($fileLine, "B") === 0) {
                $score2 += 2;
            } elseif (strpos($fileLine, "C") === 0) {
                $score2 += 3;
            }
        } else if (strpos($fileLine, "Z") !== false) {
            // echo "Should win ";
            $score2 += 6; 
            if (strpos($fileLine, "A") === 0) {
                $score2 += 2;
            } elseif (strpos($fileLine, "B") === 0) {
                $score2 += 3;
            } elseif (strpos($fileLine, "C") === 0) {
                $score2 += 1;
            }
        }

    }
}

echo "\nScore1: " . $score;
echo "\nScore2: " . $score2;

fclose($file);