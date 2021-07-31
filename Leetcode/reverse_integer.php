<?php
/**
 * Task from leetcode 
 * https://leetcode.com/problems/reverse-integer/
 */

function reverse($x) {
    
    if ($x < 0) {
        $num = -(int)strrev(strval($x));
    } else {
        $num = (int)strrev(strval($x));
    }
        
    $highNumber = 2**31;
    $lowNumber = -2**31;
    if (($num > $highNumber) || ($num < $lowNumber)) {
        return 0;
    }
    
    return $num;
}

