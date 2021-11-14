<?php
include('CSVs.php');
function merge_sort(&$lista, $inicio, $fim)
{
    if ($inicio < $fim) {
        $meio = $inicio + (int)(($fim - $inicio) / 2);
        merge_sort($lista, $inicio, $meio);
        merge_sort($lista, $meio + 1, $fim);
        merge($lista, $inicio, $meio, $fim);
    }
}

function merge(&$lista, $inicio, $meio, $fim)
{
    $n1 = $meio - $inicio + 1;
    $n2 = $fim - $meio;
    $left = array();
    $right = array();
    for ($i = 0; $i < count($lista); $i++) {
        if ($i <= $n1) {
            array_push($left, $lista[$i]);
        } else {
            array_push($right, $lista[$i]);
        }
    }
    $l = 0;
    $r = 0;
    for($k = 0;$k < count($lista)-1; $k++){

    }
}
$inicio = microtime(true);
merge_sort($teste100, 0, count($teste100) - 1);
$final = microtime(true);
echo $final - $inicio;

$guardar = fopen('merge.csv', 'w');

foreach ($teste100 as $linha) {
    fputcsv($guardar, $linha);
}
fclose($guardar);
