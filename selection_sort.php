<?php
include('CSVs.php');

function selection_sort($lista, $tipo_arquivo){
    $n = count($lista);
    for ($i = 0; $i < $n -1; $i++){
        $menor_indice = $i;
        for ($j = $i; $j < $n; $j++){
            if($lista[$j][$tipo_arquivo] < $lista[$menor_indice][$tipo_arquivo]){
                $menor_indice = $j;
            }
        } 
        if ($lista[$i][$tipo_arquivo] > $lista[$menor_indice][$tipo_arquivo]){

            $aux = $lista[$i];
            $lista[$i] = $lista[$menor_indice];
            $lista[$menor_indice] = $aux;
        }
        clearstatcache();
    }
    return $lista;
}
$inicio = microtime(true);
$teste = selection_sort($teste100, 4);
$fim = microtime(true);
echo $fim - $inicio;

$guardar = fopen('selection.csv','w');

foreach($teste as $linha){
    fputcsv($guardar, $linha);
}
fclose($guardar); 