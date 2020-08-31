<?php
/**
 * Нам нужно скопирвать данные из массива в SplFixedArray с обязательным приведением их к некоторому типу
 * Что не так с этим кодом? Почему он такой медленный?
 */

define("NUM", 1000000);

function typeCast($in, string $type)
{
    switch ($type) {
        case 'int': return (int)$in;
        case 'float':
        case 'double': return (float)$in;
        default: return (string)$in;
    }
}

$arr = [];
for($i = 0; $i < NUM; $i++) {
    $arr[$i] = mt_rand(1, 100);
}

$matrix = new SplFixedArray(NUM);
$i = 0;
$timeStart = microtime(true);
array_map(function ($value) use ($matrix, &$i) {
    $matrix[$i] = typeCast($value, 'float');
    $i++;
}, $arr);

echo microtime(true) - $timeStart;
?>