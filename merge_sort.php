<?php
include('CSVs.php');
function merge_sort(&$Array, $left, $right)
{
    if ($left < $right) {
        $mid = $left + (int)(($right - $left) / 2);
        merge_sort($Array, $left, $mid);
        merge_sort($Array, $mid + 1, $right);
        merge($Array, $left, $mid, $right);
    }
}

function merge(&$Array, $left, $mid, $right)
{
    $n1 = $mid - $left + 1;
    $n2 = $right - $mid;
    $LeftArray = array_fill(0, $n1, 0);
    $RightArray = array_fill(0, $n2, 0);
    for ($i = 0; $i < $n1; $i++) {
        $LeftArray[$i] = $Array[$left + $i];
    }
    for ($i = 0; $i < $n2; $i++) {
        $RightArray[$i] = $Array[$mid + $i + 1];
    }

    $x = 0;
    $y = 0;
    $z = $left;
    while ($x  < $n1 && $y  < $n2) {
        if ($LeftArray[$x][3] < $RightArray[$y][3]) {
            $Array[$z] = $LeftArray[$x];
            $x++;
        } else {
            $Array[$z] = $RightArray[$y];
            $y++;
        }
        $z++;
    }
    while ($x < $n1) {
        $Array[$z] = $LeftArray[$x];
        $x++;
        $z++;
    }

    while ($y < $n2) {
        $Array[$z] = $RightArray[$y];
        $y++;
        $z++;
    }
}

$lista = $arquivo;
$inicio = microtime(true);
merge_sort($lista, 0, count($lista) - 1);
$fim = microtime(true);
echo $fim - $inicio;


$guardar = fopen('merge.csv', 'w');

foreach ($lista as $linha) {
    fputcsv($guardar, $linha);
}
fclose($guardar);
