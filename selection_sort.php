<?php
$arquivo = fopen('metadados_fotos_APS_20212.csv', 'r');
$header = fgetcsv($arquivo, 1000, ",");

while ($row = fgetcsv($arquivo, 1000, ",")) {
    $nota[] = array_combine($header, $row);
}
function selection_sort($lista){
    $n = count($lista);
    for ($i = 0; $i < $n -2; $i++){
        $menor_indice = $i;
        for ($j = $i; $j < $n-1; $j++){
            if($lista[$j]['file_size'] < $lista[$menor_indice]['file_size']){
                $menor_indice = $j;
            }
        } 
        if ($lista[$i]['file_size'] > $lista[$menor_indice]['file_size']){
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
echo $fim - $inicio;