<?php

$arquivo = fopen('teste.csv', 'r');
$header = fgetcsv($arquivo);

/* $x = array();
while ($row = fgetcsv($arquivo, 1000, ",")) {
    $nota[] = array_combine($header, $row);
} */

function insertion_sort($lista)
{
    $n = count($lista);
    for ($i = 1; $i < $n - 1; $i++) {
        $chave = $lista[$i];
        $c = $lista[$i];
        $j = $i - 1;
        while ($j >= 0 and $lista[$j] > $chave){
            $lista[$j+1] = $lista[$j];
            $j = $j -1;
        }
        $lista[$j+1] = $c;
    }
    return $lista;
}

$inicio = microtime(true);
$nota = insertion_sort($header);
$fim = microtime(true);

$tempo = $fim - $inicio;

echo $tempo;
print_r($header);
/* foreach ($nota as $a) {
    $y = implode(", ", $a);
    array_push($x,"$y\n");
} */
foreach($header as $b){
    echo $b;
}
