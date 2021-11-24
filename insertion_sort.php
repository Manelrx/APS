<?php

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


