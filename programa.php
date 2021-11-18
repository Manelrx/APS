<?php

$handle = fopen('metadados_fotos_APS_20212.csv', 'r');
$dados100 = array();
$dados1000 = array();
$dados10000 = array();
$dados20000 = array();
$dados50000 = array();
$dados = array();
$fd_file_size = array();
$fd_dateTime = array();


while ($lista = fgetcsv($handle, 1000, ",")) {
    array_push($dados, $lista);
}

for ($f = 0; $f < 100; $f++) {
    array_push($dados100, $dados[$f]);
}
for ($f = 0; $f < 1000; $f++) {
    array_push($dados1000, $dados[$f]);
}
for ($f = 0; $f < 10000; $f++) {
    array_push($dados10000, $dados[$f]);
}
for ($f = 0; $f < 20000; $f++) {
    array_push($dados20000, $dados[$f]);
}
for ($f = 0; $f < 50000; $f++) {
    array_push($dados50000, $dados[$f]);
}


function merge_sort(&$lista, $l, $r, $v)
{
    if ($l < $r) {
        $m = $l + (int)(($r - $l) / 2);
        merge_sort($lista, $l, $m, $v);
        merge_sort($lista, $m + 1, $r, $v);
        merge($lista, $l, $m, $r, $v);
    }
}

function merge(&$lista, $l, $m, $r, $v)
{
    $n1 = $m - $l + 1;
    $n2 = $r - $m;
    $lArray = array_fill(0, $n1, 0);
    $rArray = array_fill(0, $n2, 0);
    for ($f = 0; $f < $n1; $f++) {
        $lArray[$f] = $lista[$l + $f];
    }
    for ($f = 0; $f < $n2; $f++) {
        $rArray[$f] = $lista[$m + $f + 1];
    }

    $a = 0;
    $b = 0;
    $c = $l;
    while ($a  < $n1 && $b  < $n2) {
        if ($lArray[$a][$v] < $rArray[$b][$v]) {
            $lista[$c] = $lArray[$a];
            $a++;
        } else {
            $lista[$c] = $rArray[$b];
            $b++;
        }
        $c++;
    }
    while ($a < $n1) {
        $lista[$c] = $lArray[$a];
        $a++;
        $c++;
    }

    while ($b < $n2) {
        $lista[$c] = $rArray[$b];
        $b++;
        $c++;
    }
}


function selection_sort($lista, $dado)
{
    $n = count($lista);
    for ($f = 0; $f < $n - 1; $f++) {
        $menorI = $f;
        for ($j = $f; $j < $n; $j++) {
            if ($lista[$j][$dado] < $lista[$menorI][$dado]) {
                $menorI = $j;
            }
        }
        if ($lista[$f][$dado] > $lista[$menorI][$dado]) {

            $aux = $lista[$f];
            $lista[$f] = $lista[$menorI];
            $lista[$menorI] = $aux;
        }
        clearstatcache();
    }
    return $lista;
}

function insertion_sort($lista, $dado)
{
    for ($f = 1; $f < count($lista); $f++) {
        $key = $lista[$f];
        $c = $lista[$f][$dado];
        $j = $f - 1;
        while ($j >= 0 and $lista[$j][$dado] > $c) {
            $lista[$j + 1] = $lista[$j];
            $j = $j - 1;
        }
        $lista[$j + 1] = $key;
        clearstatcache();
    }
    return $lista;
}

echo "Bem vindo ao ordenador de dados, selecione o algoritmo de ordenação \n1- SelectionSort \n2- InsertionSort \n3- MergeSort\n ";
$escolha = readline("Informe apenas o número: ");
echo "Escolha: \n1- 100 dados \n2- 1000 dados \n3- 10000 dados \n4- 20000 dados \n5- 50000 dados \n6- 100000 dados";
$listaParaPesquisa = readline("\nInforme apenas o número: ");
echo "Deseja ordenar \n1- File_Size \n2- Date_Time";
$valor = readline("\nInforme apenas o número: ");
if ($valor == 1){
    $pesquisar = 3;
}else{
    $pesquisar = 4;
}

if ($listaParaPesquisa == 1) {
    $lista = $dados100;
} elseif ($listaParaPesquisa == 2) {
    $lista = $dados1000;
} elseif ($listaParaPesquisa == 3) {
    $lista = $dados10000;
} elseif ($listaParaPesquisa == 4) {
    $lista = $dados20000;
} elseif ($lista == 5) {
    $lista = $dados50000;
} else {
    $lista = $dados;
}

switch ($escolha) {
    case 1:
        $inicio = microtime(true);
        $teste = selection_sort($lista, $pesquisar);
        $fim = microtime(true);
        echo "O tempo de processamento foi: " . $fim - $inicio;
        echo "\nOs dados estão no arquivo ordenados.csv";
        $listaordenada = fopen('ordenados.csv', 'w');

        foreach ($lista as $linha) {
            fputcsv($listaordenada, $linha);
        }
        fclose($listaordenada);
        break;
    case 2:
        $inicio = microtime(true);
        $teste = insertion_sort($lista, $pesquisar);
        $fim = microtime(true);
        echo "O tempo de processamento foi: " . $fim - $inicio;
        echo "\nOs dados estão no arquivo ordenados.csv";
        $listaordenada = fopen('ordenados.csv', 'w');

        foreach ($lista as $linha) {
            fputcsv($listaordenada, $linha);
        }
        fclose($listaordenada);
        break;
    case 3:
        $inicio = microtime(true);
        merge_sort($lista, 0, count($lista) - 1, $pesquisar);
        $fim = microtime(true);
        echo "O tempo de processamento foi: " . $fim - $inicio;
        echo "\nOs dados estão no arquivo ordenados.csv";
        $listaordenada = fopen('ordenados.csv', 'w');

        foreach ($lista as $linha) {
            fputcsv($listaordenada, $linha);
        }
        fclose($listaordenada);
        break;
}
