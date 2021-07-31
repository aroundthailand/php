<?php
/**
 * Palindrome Number 
 * https://leetcode.com/problems/palindrome-number/
 */


 class Palindrome
 {
    //With string
    public function withString($x) {
        $y = (int)strrev(strval($x));
        return $x == $y ? true : false;
    }

    //Without string
    public function withInteger(int $number):bool
    {
        $prev = $number;
        $reversedNumber = 0;

        if ($number < 0) {
            return false;
            exit();
        }

        while ($number != 0) {
            $temp = $number % 10;
            $reversedNumber = ($reversedNumber * 10) + ($number % 10);
            $number = (int)($number / 10);
        }

        return $reversedNumber == $prev ? true : false;
    }
}
$palindrome = new Palindrome();
echo $palindrome->withString(1212) ? "true" : "false";
echo $palindrome->withInteger(1221) ? "true" : "false";