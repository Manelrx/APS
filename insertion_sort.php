<?php
include('CSVs.php');
function insertion_sort($lista, $tipo_arquivo)
{
    for ($i = 1; $i < count($lista); $i++) {
        $chave = $lista[$i];
        $c = $lista[$i][$tipo_arquivo];
        $j = $i - 1;
        while ($j >= 0 and $lista[$j][$tipo_arquivo] > $c){
            $lista[$j+1] = $lista[$j];
            $j = $j -1;
        }
        $lista[$j+1] = $chave;
        clearstatcache();
    }
    return $lista;
}


$inicio = microtime(true);
$teste = insertion_sort($teste100, 4);
$fim = microtime(true);


$tempo = $fim - $inicio;

echo $tempo;

$guardar = fopen('insertion.csv','w');

foreach($teste as $linha){
    fputcsv($guardar, $linha);
}

fclose($guardar);

