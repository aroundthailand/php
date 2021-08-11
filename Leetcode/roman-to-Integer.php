<?php

/**
 * Roman to Integer
 * https://leetcode.com/problems/roman-to-integer/
 */

//Version 1
function romanToInt(string $s): int
{
    $result = 0;
    $romanToArabicArr = array(
        "I" => 1,
        "IV" => 4,
        "V" => 5,
        "IX" => 9,
        "X" => 10,
        "XL" => 40,
        "L" => 50,
        "XC" => 90,
        "C" => 100,
        "CD" => 400,
        "D" => 500,
        "CM" => 900,
        "M" => 1000,
    );
    $stringLength = strlen($s);
    for ($i = 0; $i < $stringLength; $i++) {
        if (
            ($s[$i] == "I" && $s[$i + 1] == "V") ||
            ($s[$i] == "I" && $s[$i + 1] == "X") ||
            ($s[$i] == "X" && $s[$i + 1] == "L") ||
            ($s[$i] == "X" && $s[$i + 1] == "C") ||
            ($s[$i] == "C" && $s[$i + 1] == "D") ||
            ($s[$i] == "C" && $s[$i + 1] == "M")
        ) {
            $result += $romanToArabicArr[$s[$i] . $s[$i + 1]];
            $i++;
        } else {
            $result += $romanToArabicArr[$s[$i]];
        }
    }

    return $result;
}


//Version 2
function romanToIntTwo(string $s): int
{
    $result = 0;
    $romanToArabicArr = array(
        "I" => 1,
        "IV" => 4,
        "V" => 5,
        "IX" => 9,
        "X" => 10,
        "XL" => 40,
        "L" => 50,
        "XC" => 90,
        "C" => 100,
        "CD" => 400,
        "D" => 500,
        "CM" => 900,
        "M" => 1000,
    );
    $stringLength = strlen($s);
    //Idea is: If current number < next number we deduct it from result otherwise add it to result
    for ($i = 0; $i < $stringLength; $i++) {
        if ($romanToArabicArr[$s[$i]] < $romanToArabicArr[$s[$i + 1]]) {
            $result -= $romanToArabicArr[$s[$i]];
        } else {
            $result += $romanToArabicArr[$s[$i]];
        }
    }
    return $result;
}




echo (romanToIntTwo("LVIII"));
// echo (romanToInt("IX"));
// echo (romanToInt("XL"));
// echo (romanToInt("XC"));
// echo (romanToInt("CD"));
// echo (romanToInt("CM"));


function romanOther($s)
{
    $map = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];
    $chars = str_split($s);
    $total = 0;

    foreach ($chars as $key => $char) {
        $number = $map[$char];
        //        echo " number: ", $number;
        $next = array_key_exists($key + 1, $chars) ? $map[$chars[$key + 1]] : 0;
        //        echo "; next: ", $next;
        if ($number < $next) {
            $total -= $number;
            //            echo "; total: ", $total;
        } else {
            $total += $number;
        }
    }

    return $total;
}

echo romanOther("LVIII");
