<?php

/**
 * Longest Common Prefix
 * https://leetcode.com/problems/longest-common-prefix/
 * 
 */

function longestCommonPrefix($strsArr)
{
    $result = "";
    $countSymbol = 1;
    $strsArrLength = count($strsArr);
    $wordLength = strlen($strsArr[0]);
    for ($i = 0; $i < $wordLength; $i++) {
        for ($j = 1; $j < $strsArrLength; $j++) {
            //echo "::", $strsArr[$j], "::";
            if ($strsArr[0][$i] == $strsArr[$j][$i]) {
                $countSymbol += 1;
            }
        }
        if ($countSymbol == $strsArrLength) {
            $result .= $strsArr[0][$i];
            $countSymbol = 1;
        } else {
            break;
        }
    }
    return $result;
}


echo longestCommonPrefix(array("flower", "flow", "flight"));
