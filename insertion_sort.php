<?php

$arquivo = fopen('metadados_fotos_APS_20212.csv', 'r');

$nota = array();
$x = array();
while ($lista = fgetcsv($arquivo, 1000, ",")) {
    array_push($nota, $lista);
}

function insertion_sort($lista)
{
    for ($i = 1; $i < count($lista); $i++) {
        $chave = $lista[$i];
        $c = $lista[$i][3];
        $j = $i - 1;
        while ($j >= 0 and $lista[$j][3] > $c){
            $lista[$j+1] = $lista[$j];
            $j = $j -1;
        }
        $lista[$j+1] = $chave;
    }
    return $lista;
}


$inicio = microtime(true);
$nota = insertion_sort($nota);
$fim = microtime(true);

$tempo = $fim - $inicio;

