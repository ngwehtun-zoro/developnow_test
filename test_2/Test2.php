<?php

function transformArray(array $data): array
{
    $zeroArray = [];
    $nonZeroArray = [];
    foreach ($data as $k => $v) {
        ($v != 0)
            ? array_push($nonZeroArray, $v)
            : array_push($zeroArray, $v);
    }
    foreach ($zeroArray as $k => $v) {
        if (($k % 2) == 0) {
            array_unshift($nonZeroArray, $v);
        } else {
            array_push($nonZeroArray, $v);
        }
    }

    return $nonZeroArray;
}