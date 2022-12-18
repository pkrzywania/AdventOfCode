<?php

$file = fopen("input_p","r");

$arrayLength = 0;
$arrayHeight = 0;
$trees = [];
if ($file) {
    // part 1
    while (($fileLine = fgets($file)) !== false) {
        $fileLine = preg_replace('/\s+/', '', $fileLine);
        $trees[] = str_split($fileLine);
    }
}
fclose($file);

$columnsCount = count($trees[0]);
$rowsCount = count($trees);

echo "wiersze: " . $rowsCount . ", kolumny: " . $columnsCount . "\n";

$visibleTrees = 0;

$maxScore = 0;

for ($column = 0; $column < $columnsCount; $column++) {
    for ($row = 0; $row < $rowsCount; $row++) {
        //part1
        // if ($column == 0 || $column == $columnsCount - 1) {
        //     $visibleTrees += 1;
        // } elseif ($row == 0 || $row == $rowsCount - 1) {
        //     $visibleTrees += 1;
        // } else {
        //     $currentTree = $trees[$row][$column];
        //     // echo "\nAktualne drzewo: " . $currentTree;
        //     $treeVisibleFromLeft = true;
        //     $treeVisibleFromRight = true;
        //     $treeVisibleFromTop = true;
        //     $treeVisibleFromBottom = true;
        //     // echo "\nsprawdzam z lewej: ";
        //     for ($i = 0; $i < $column; $i++) {
        //         // echo  $trees[$row][$i] . ", ";
        //         if ($trees[$row][$i] >= $currentTree ) {
        //             $treeVisibleFromLeft = false;
        //             break;
        //         }
        //     }

        //     // echo "\nspraawdzam z prawej: ";
        //     for ($i = $columnsCount - 1; $i > $column; $i--) {
        //         // echo $trees[$row][$i] . ", ";
        //         if ($trees[$row][$i] >= $currentTree ) {
        //             $treeVisibleFromRight = false;
        //             break;
        //         }
        //     }

        //     // echo "\nsprawdzam z gory: ";
        //     for ($i = 0; $i < $row; $i++) {
        //         // echo $trees[$i][$column] . ", ";
        //         if ($trees[$i][$column] >= $currentTree ) {
        //             $treeVisibleFromTop = false;
        //             break;
        //         }
        //     }

        //     // echo "\nsprawdzam z dolu: ";
        //     for ($i = $rowsCount - 1; $i > $row; $i--) {
        //         // echo $trees[$i][$column] . ", ";
        //         if ($trees[$i][$column] >= $currentTree ) {
        //             $treeVisibleFromBottom = false;
        //             break;
        //         }
        //     }

        //     if ($treeVisibleFromBottom || $treeVisibleFromLeft || $treeVisibleFromRight || $treeVisibleFromTop) {
        //         $visibleTrees += 1;
        //         // print("\ndrzewo jest widoczne z lewej $treeVisibleFromLeft, prawej $treeVisibleFromRight, gory $treeVisibleFromTop, dolu $treeVisibleFromBottom") ;
        //         // var_dump() 
        //     }
        //part 2
        if ($column > 0 && $column < ($columnsCount - 1) && $row > 0 && $row < ($rowsCount - 1)) {

            $localScore = 0;
            $currentTree = $trees[$row][$column];
            print("\nAktualne drzewo [$row][$column]: $currentTree");

            $left = 0;
            $right = 0;
            $up = 0;
            $down = 0 ;

            echo " idziemy w lewo: ";
            for ($i = $column; $i > 0; $i--) {
                
                if ($trees[$row][$i-1] < $currentTree) {
                    echo  $trees[$row][$i-1] . ", ";
                    $left += 1;
                    
                } else {
                    $left += 1;
                    break;
                }
            }

            echo " idziemy w prawo: ";
            for ($i = $column; $i < $columnsCount - 1; $i++) {
                if ($trees[$row][$i+1] < $currentTree) {
                    echo  $trees[$row][$i+1] . ", ";
                    $right += 1;
                } else {
                    $right += 1;
                    break;
                }
            }

            echo " idziemy w gore: ";
            for ($i = $row; $i > 0; $i--) {
                // echo  $trees[$i-1][$column] . ", ";
                if ($trees[$i-1][$column] < $currentTree) {
                    echo  $trees[$i-1][$column] . ", ";
                    $up += 1;
                } else {
                    $up += 1;
                    break;
                }
            }

            echo " idziemy w dol";
            for ($i = $row; $i < $rowsCount - 1; $i++) {
                // echo  $trees[$i-1][$column] . ", ";
                if ($trees[$i+1][$column] < $currentTree) {
                    echo $trees[$i+1][$column] . ", ";
                    $down += 1;
                    
                } else {
                    $down += 1;
                    break;
                }
            }

            // $left = $left == 0 ? 1 : $left;
            // $right = $right == 0 ? 1 : $right;
            // $up = $up == 0 ? 1 : $up;
            // $down = $down == 0 ? 1 : $down;

            print(" local score = lewo $left * prawo $right * gora $up * dol $down");
            $localScore = $left * $right * $up * $down;
            if ($localScore > $maxScore) {
                $maxScore = $localScore;
            }
        } 
            

            // // echo "\nspraawdzam z prawej: ";
            // for ($i = $columnsCount - 1; $i > $column; $i--) {
            //     // echo $trees[$row][$i] . ", ";
            //     if ($trees[$row][$i] >= $currentTree ) {
            //         $treeVisibleFromRight = false;
            //         break;
            //     }
            // }

            // // echo "\nsprawdzam z gory: ";
            // for ($i = 0; $i < $row; $i++) {
            //     // echo $trees[$i][$column] . ", ";
            //     if ($trees[$i][$column] >= $currentTree ) {
            //         $treeVisibleFromTop = false;
            //         break;
            //     }
            // }

            // // echo "\nsprawdzam z dolu: ";
            // for ($i = $rowsCount - 1; $i > $row; $i--) {
            //     // echo $trees[$i][$column] . ", ";
            //     if ($trees[$i][$column] >= $currentTree ) {
            //         $treeVisibleFromBottom = false;
            //         break;
            //     }
            // }

            // if ($treeVisibleFromBottom || $treeVisibleFromLeft || $treeVisibleFromRight || $treeVisibleFromTop) {
            //     $visibleTrees += 1;
            //     // print("\ndrzewo jest widoczne z lewej $treeVisibleFromLeft, prawej $treeVisibleFromRight, gory $treeVisibleFromTop, dolu $treeVisibleFromBottom") ;
            //     // var_dump() 
            // }

    }
}

echo "\nmax score = " . $maxScore;

