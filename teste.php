<?php
$arquivo = file('teste.csv');
print_r($arquivo);
/* function selection_sort($lista){
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
echo $fim - $inicio; */


/* function file_size ($texto){
    $x = 0;
    $valor_procurado = array();
    $lista = str_split($texto);
    for ($i = 0; $i > count($lista);$i++){
        if($lista[$i] == ','){
            $x++;
        }
        if($x == 4 && $lista[$i] != ',' ){
            array_push($valor_procurado, $lista[$i]);
        }
        foreach ($lista as $b){
            $y = implode($b);
        }
        return $y;
    }
}
$teste = file_size($arquivo[0]);
echo $teste; */