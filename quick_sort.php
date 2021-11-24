<?php     //PARA EXECUTAR O PROGRAMA UTILIZER O PROGRAMA.PHP
function quicksort(&$lista, $left, $right, $tipoDeDado)
{
    if ($left < $right) {
        $pivot = particao($lista, $left, $right, $tipoDeDado);
        quicksort($lista, $left, $pivot - 1, $tipoDeDado);
        quicksort($lista, $pivot + 1, $right, $tipoDeDado);
    }
    
}

function particao(&$lista, $left, $right, $tipoDeDado)
{
    $i = $left;
    $pivo = $lista[$right][$tipoDeDado];
    for ($x = $left; $x <= $right; $x++) {
        if ($lista[$x][$tipoDeDado] < $pivo) {
            $temp = $lista[$i];
            $lista[$i] = $lista[$x];
            $lista[$x] = $temp;
            $i++;
        }
    }
    $temp = $lista[$right];
    $lista[$right] = $lista[$i];
    $lista[$i] = $temp;
    return $i;
}

