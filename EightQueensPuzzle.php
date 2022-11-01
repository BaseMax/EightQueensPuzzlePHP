<?php
/*
 * @Name: Eight Queens Puzzle PHP
 * @Author: Max Base
 * @Date: 2022-11-01
 * @Repository: https://github.com/BaseMax/EightQueensPuzzlePHP
 */

// Functions
function createBoard($size) {
    $board = [];
    for($i=0; $i<$size; $i++) {
        $board[$i] = [];
        for($j=0; $j<$size; $j++) {
            $board[$i][$j] = 0;
        }
    }
    return $board;
}

function printBoard(&$board) {
    $size = count($board);
    for($i=0; $i<$size; $i++) {
        for($j=0; $j<$size; $j++) {
            echo $board[$i][$j] . " ";
        }
        echo "\n";
    }
}

function isSafe(&$board, $row, $col) {
    $size = count($board);
    for($i=0; $i<$col; $i++) {
        if($board[$row][$i]) {
            return false;
        }
    }
    for($i=$row, $j=$col; $i>=0 && $j>=0; $i--, $j--) {
        if($board[$i][$j]) {
            return false;
        }
    }
    for($i=$row, $j=$col; $j>=0 && $i<$size; $i++, $j--) {
        if($board[$i][$j]) {
            return false;
        }
    }
    return true;
}

function solve(&$board, $col) {
    $size = count($board);
    if($col >= $size) {
        return true;
    }
    for($i=0; $i<$size; $i++) {
        if(isSafe($board, $i, $col)) {
            $board[$i][$col] = 1;
            if(solve($board, $col+1)) {
                return true;
            }
            $board[$i][$col] = 0;
        }
    }
    return false;
}

// Main
$size = 8;
$board = createBoard($size);
if(solve($board, 0)) {
    printBoard($board);
}
else {
    echo "No solution";
}
