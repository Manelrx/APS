<?php

include('CSVs.php');

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

$lista = $arquivo;
$inicio = microtime(true);
quicksort($lista, 0, count($lista) - 1);
$fim = microtime(true);
echo $fim - $inicio;


$guardar = fopen('quicksort.csv', 'w');

foreach ($lista as $linha) {
    fputcsv($guardar, $linha);
}
fclose($guardar);