<?php

$input = [1, 2, 3, 5, 7, 8, 9, 10];

$init = null;
$result = [];

foreach ($input as $key => $item) {
    if ($item + 1 === @$input[$key + 1]) {
        if (!$init) {
            $init = $item;
        }
    } else {
        if ($init) {
            $result[] = $init . '-' . $item;
            $init = null;
        } else {
            $result[] = $item;
        }
    }
}

echo implode(', ', $result);