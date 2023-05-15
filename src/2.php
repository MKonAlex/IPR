<?php
$sum = static fn(int $a, int $b): int => $a + $b;
$join = static fn(string $a, string $b) => $a . $b;

$calc = static function ($arg) use (&$calc) {
    static $args;

    if (is_callable($arg)) {
        $result = is_string($args[0])
            ? ''
            : 0;


        foreach ($args as $a) {
            $result = $arg($result ?? 0, $a);
        }
        $args = null;
        return $result;
    } else {
        $args[] = $arg;
        return $calc;
    }
};

echo $calc(1)(2)($sum); // 3
echo $calc(1)(2)(7)($sum); // 10
echo $calc('a')('b')('c')('d')($join);