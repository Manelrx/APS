<?php

$arquivo = fopen('teste.csv', 'r');
$header = fgetcsv($arquivo, 1000, ",");


while ($row = fgetcsv($arquivo, 1000, ",")) {
    $nota[] = array_combine($header, $row);
}

function selection_sort($lista)
{
    $n = count($lista);
    for ($i = 0; $i < $n - 1; $i++) {
        $menor_indice = $i;
        for ($j = $i+1; $j < $n; $j++) {
            if ($lista[$j]['id'] < $lista[$menor_indice]['id']) {
                $menor_indice = $j;
            }
        }
        if ($lista[$i]['id'] > $lista[$menor_indice]['id']) {
            $aux = $lista[$i];
            $lista[$i] = $lista[$menor_indice];
            $lista[$menor_indice] = $aux;
        }
    }
    return $lista;
}

$inicio = microtime(true);
$nota = selection_sort($nota);
$fim = microtime(true);

$tempo = $inicio - $fim;

foreach ($nota as $a) {
    print_r($a);
}

