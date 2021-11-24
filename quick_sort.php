<?php
function quicksort(&$lista, $left, $right)
{
    if ($left < $right) {
        $pivot = particao($lista, $left, $right);
        quicksort($lista, $left, $pivot - 1);
        quicksort($lista, $pivot + 1, $right);
    }
}

function particao(&$lista, $left, $right)
{
    $i = $left;
    $pivo = $lista[$right][4];
    for ($x = $left; $x <= $right; $x++) {
        if ($lista[$x][4] < $pivo) {
            $temp = $lista[$i];
            $lista[$i] = $lista[$x];
            $lista[$x] = $temp;
            $i++;
        }
    }
    $temp = $lista[$right];
    $lista[$right] = $lista[$i];
    $lista[$i] = $temp;
    return $i;
}

