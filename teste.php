<?php
$arquivo = file('teste.csv');


function selection_sort($lista){
    $n = count($lista);
    for ($i = 0; $i < $n -2; $i++){
        $menor_indice = $i;
        for ($j = $i; $j < $n-1; $j++){
            if($lista[$j] < $lista[$menor_indice]){
                $menor_indice = $j;
            }
        } 
        if ($lista[$i] > $lista[$menor_indice]){
            $aux = $lista[$i];
            $lista[$i] = $lista[$menor_indice];
            $lista[$menor_indice] = $aux;
        }
    }
    return $lista;
}
$inicio = microtime(true);
$nota = selection_sort($arquivo);
$fim = microtime(true);
echo $fim - $inicio;