<?php
include('CSVs.php');
include('insertion_sort.php');
include('quick_sort.php');
include('selection_sort.php');
include('distance.php');


do {
    echo "Seja bem vindo, \n1- Ordenar uma lista \n2- Lugares proximos";
    $escolha1 = readline("\nEscolha uma opção: ");

    if (is_numeric($escolha1) == false || $escolha1 > 2) {
        echo VERMELHO . "A opção escolhida não é valida"  . "\n";
        $sair = false;
    } else {
        $sair = true;
    }
} while ($sair == false);

if ($escolha1 == 1) {
    do {
        echo "\n\nTIPOS DE ORDENAÇÃO";
        echo "\n1- SelectionSort \n2- InsertionSort \n3- QuickSort";
        $escolhaOrdenador = readline("\nEscolha uma opção: ");
        if (is_numeric($escolhaOrdenador) == false || $escolhaOrdenador > 3 || $escolhaOrdenador < 1) {
            echo VERMELHO . "A opção escolhida não é valida"  . "\n";
            $sair = false;
        } else {
            $sair = true;
            do {
                echo "\nVALORES A SER ORDENADOS: ";
                echo "\n1- Tamanho do dado \n2- Data";
                $escolhaTipoDeDado = readline("\nEscolha o tipo de ordenação: ");
                if (is_numeric($escolhaTipoDeDado) == false || $escolhaTipoDeDado > 2) {
                    echo VERMELHO . "A opção escolhida não é valida"  . "\n";
                    $sair == false;
                } elseif($escolhaTipoDeDado == 1){
                    $escolhaTipoDeDado = 3;
                }else{
                    $escolhaTipoDeDado = 4;
                }
                    do {
                        echo "\nTAMANHO DO ARQUIVO:";
                        echo "\n1- 100 dados \n2- 1000 dados \n3- 10000 dados \n4- 20000 dados \n5- 50000 dados \n6- 100000 dados";
                        $listaParaPesquisa = readline("\nEscolha o tamanho do arquivo: ");
                        if (is_numeric($listaParaPesquisa) == false || $listaParaPesquisa > 6 || $listaParaPesquisa < 1) {
                            echo VERMELHO . "A opção escolhida não é valida" . PADRAO . "\n";
                            $sair = false;
                        } else {
                            $sair = true;
                        }
                    } while ($sair == false);
                    if ($listaParaPesquisa == 1) {
                        $lista = $teste100;
                    } elseif ($listaParaPesquisa == 2) {
                        $lista = $teste1000;
                    } elseif ($listaParaPesquisa == 3) {
                        $lista = $teste10000;
                    } elseif ($listaParaPesquisa == 4) {
                        $lista = $teste20000;
                    } elseif ($lista == 5) {
                        $lista = $teste50000;
                    } else {
                        $lista = $arquivo;
                    }
            } while ($sair == false);
        }
    } while ($sair == false);
    switch ($escolhaOrdenador) {
        case 1:
            $inicio = microtime(true);
            $listaOrdenada = selection_sort($lista, $escolhaTipoDeDado);
            $fim = microtime(true);
            $tempo = $fim - $inicio;
            $tempo = number_format($tempo, 5, '.', ',');
            echo "O algoritmo demorou $tempo segundos para ordenar e os dados estão guardados no arquivo selection.csv";
            guardarListaOrdenada($listaOrdenada, 1);
            break;
        case 2:
            $inicio = microtime(true);
            $listaOrdenada = insertion_sort($lista, $escolhaTipoDeDado);
            $fim = microtime(true);
            $tempo = $fim - $inicio;
            $tempo = number_format($tempo, 5, '.', ',');
            echo "O algoritmo demorou $tempo segundos para ordenar e os dados estão guardados no arquivo insertion.csv";
            guardarListaOrdenada($listaOrdenada, 2);
            break;
        case 3:
            $inicio = microtime(true);
            $listaOrdenada = $lista;
            quicksort($listaOrdenada, 1, (count($listaOrdenada) - 1), $escolhaTipoDeDado);
            $fim = microtime(true);
            $tempo = $fim - $inicio;
            $tempo = number_format($tempo, 5, '.', ',');
            echo "O algoritmo demorou $tempo segundos para ordenar e os dados estão guardados no arquivo quicksort.csv";
            guardarListaOrdenada($listaOrdenada, 3);
            break;
    }
} else {
    do {
        $id = readline("Escolha um id: ");
        if (is_numeric($id) == false || $id > 100000) {
            echo "ERRO!! +Digite um NÚMERO entre 1 e 100000 ";
            $sair = false;
        } else {
            do {
                $distancia = readline("Escolha o raio de Distância em km: ");
                if (is_numeric($distancia) == false) {
                    echo "ERRO!! DEVE SER PREENCHIDO APENAS O NÚMERO";
                    $sair == false;
                } else {
                    $sair == true;
                }
            } while ($sair == false);
        }
    } while ($sair == false);
    $lugaresProximos = verificaKm($id, $distancia, $arquivo);
    $lugaresProximos = insertion_sort($lugaresProximos, 1);
    for ($i = 0; $i < count($lugaresProximos); $i++) {
        echo " id {$lugaresProximos[$i][0]} está a " .  number_format($lugaresProximos[$i][1],2,'.',',') . "km de distância\n";
    }
}

function guardarListaOrdenada($lista, $algoritmo)
{
    if($algoritmo == 1){
        $guardar = fopen('selection.csv', 'w');
    }elseif($algoritmo == 2){
        $guardar = fopen('insertion.csv', 'w');
    }elseif($algoritmo == 3){
        $guardar = fopen('quicksort.csv', 'w');
    }

    foreach ($lista as $linha) {
        fputcsv($guardar, $linha);
    }

    fclose($guardar);
}
