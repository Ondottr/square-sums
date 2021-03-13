<?php
require_once 'vendor/autoload.php';


function isInteger(float $num): bool
{
    return ctype_digit('' . $num . '');
}

function squareSum(int $num) {
    $i = 0;

    $arr = range(1, $num);

    while (true) {

        $returnArr = [$arr[$i]];

        for ($ii = 1; $ii <= $num; $ii++) {
            foreach ($arr as $key => $value) {
                if (in_array($value, $returnArr))
                    continue;

                if (isInteger(sqrt(end($returnArr) + $value)))
                    array_push($returnArr, $value);
                elseif (isInteger(sqrt(array_values($returnArr)[0] + $value)))
                    array_unshift($returnArr, $value);
            }
        }

        if (count($returnArr) == $num) {
            dump($num);

            return;
        }

        $i++;
        if ($i > $num - 1)
            break;
    }

    dump("$num - Unsolvable!");
}


squareSum(37);
