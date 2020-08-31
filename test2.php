<?php

define("NUM", 1000);

/**
 * Напишите функцию, которая будет выбирать нужный сервер из списка в зависимости от указанного веса
 * То есть сервер 2 должен выбираться чаще чем остальные сервера, а сервер 4 - реже всех
 */

$servers = [
    'srv1' => 16,
    'srv2' => 32,
    'srv3' => 16,
    'srv4' => 12
];

function getServer(array $servers): string
{
    //TODO - реализуйте эту функицю
    return "srv4";
}

$hits = [
    'srv1' => 0,
    'srv2' => 0,
    'srv3' => 0,
    'srv4' => 0,
];

for ($i = 0; $i < NUM; $i++) {
    ++$hits[getServer($servers)];
}

print_r($hits);