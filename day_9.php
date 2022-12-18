<?php

function getTailPosition($head, $tail) {
    $xDistance = abs($head['x'] - $tail['x']);
    $yDistance = abs($head['y'] - $tail['y']);
    
    if ($xDistance >= 2 && $yDistance >= 2) {
        if ($tail['x'] < $head['x']) {
            $tail['x'] = $head['x'] - 1;
        } else {
            $tail['x'] = $head['x'] + 1;
        }
        if ($tail['y'] < $head['y']) {
            $tail['y'] = $head['y'] - 1;
        } else {
            $tail['y'] = $head['y'] + 1;
        }
    } elseif ($xDistance >= 2) {
        if ($tail['x'] < $head['x']) {
            $tail['x'] = $head['x'] - 1;
        } else {
            $tail['x'] = $head['x'] + 1;
        }
        $tail['y'] = $head['y'];
    } elseif ($yDistance >= 2) {
        if ($tail['y'] < $head['y']) {
            $tail['y'] = $head['y'] - 1;
        } else {
            $tail['y'] = $head['y'] + 1;
        }
        $tail['x'] = $head['x'];
    }

    return $tail;
}

$file = fopen('input_p', 'r');

$headPosition = [];
$headPosition['x'] = 0;
$headPosition['y'] = 0;

$tailPosition = [];
for ($i = 0; $i < 9; $i++) {
    $tailPosition[$i]['x'] = 0;
    $tailPosition[$i]['y'] = 0;    
}

$tailPositionHistory = [];
$tailPositionHistoryWithKnots = [];

if ($file) {

    

    while (($fileLine = fgets($file)) !== false) {

        $direction = explode(' ', $fileLine);

        // echo "\n\n\n###\n" . $fileLine . "\nHead position: ";

        for ($step = 0; $step < intval($direction[1]); $step++) {

            if ($direction[0] === 'L') {
                $headPosition['x'] -= 1;
            } elseif ($direction[0] === 'R') {
                $headPosition['x'] += 1;
            } elseif ($direction[0] === 'U') {
                $headPosition['y'] += 1;
            } else { //$direction[0] === 'D'
                $headPosition['y'] -= 1;
            }
            
            $tailPosition[0] = getTailPosition($headPosition, $tailPosition[0]);

            for ($i = 1; $i < 9; $i++) {
                $tailPosition[$i] = getTailPosition($tailPosition[$i-1], $tailPosition[$i]);
            }

            $tailPositionHistory[] = 'X' . $tailPosition[0]['x'] . "Y" . $tailPosition[0]['y'];
            $tailPositionHistoryWithKnots[] = 'X' . $tailPosition[8]['x'] . "Y" . $tailPosition[8]['y'];

        }

    }
}

echo "Unique tail position: " . count(array_unique($tailPositionHistory));

echo "\nUnique tail position with knots: " . count(array_unique($tailPositionHistoryWithKnots));

fclose($file);