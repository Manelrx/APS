<?php

$arquivo = fopen('teste.csv', 'r');
$header = fgetcsv($arquivo, 1000, ",");

$x = array();
while ($row = fgetcsv($arquivo, 1000, ",")) {
    $nota[] = array_combine($header, $row);
}

function selection_sort($lista)
{
    $n = count($lista);
    for ($i = 0; $i < $n - 1; $i++) {
        $menor_indice = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($lista[$j]['file_size'] < $lista[$menor_indice]['file_size']) {
                $menor_indice = $j;
            }
        }
        if ($lista[$i]['file_size'] > $lista[$menor_indice]['file_size']) {
            $aux = $lista[$i];
            $lista[$i] = $lista[$menor_indice];
            $lista[$menor_indice] = $aux;
        }
        echo 'a';
    }
    return $lista;
}

$inicio = microtime(true);
$nota = selection_sort($nota);
$fim = microtime(true);

$tempo = $inicio - $fim;

echo $tempo;

foreach ($nota as $a) {
    $y = implode(", ", $a);
    array_push($x,"$y\n");
}
foreach($x as $b){
    echo $b;
}
