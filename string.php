<?php
$arr = ['Hello', 'World', 'PHP', 'Programming'];
$vowels = ['a', 'e', 'i', 'o', 'u'];

foreach ($arr as $string) {
    $count = 0;
    foreach ($vowels as $vowel) {
        $vowelCount  = substr_count($string, $vowel);
        $count += $vowelCount;
    }
    $str = str_split($string);
    $reverseArr = [];
    foreach ($str as $char) {
        array_unshift($reverseArr, $char);
    }
    $reverseStr = implode('', $reverseArr);

    echo "Original String: {$string}, Vowel count: {$count}, Reverse String: {$reverseStr} <br> ";
}
