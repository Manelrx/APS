<?php
include ('CSVs.php');
include('insertion_sort.php');
include('quick_sort.php');
include('selection_sort.php');
include('merge_sort.php');


do{
    echo "Seja bem vindo, \n1- Ordenar uma lista \n2- Lugares proximos";
    $escolha1 = readline("\nEscolha uma opção: ");
    
    if(is_numeric($escolha1) == false || $escolha1 != 1 || $escolha1 != 2){
        echo VERMELHO . "A opção escolhida não é valida". PADRAO;
        $sair = false;
    }else{
        $sair = true;
    }
}while ($sair == false);

if($escolha1 == 1){
    do{
        echo "MENU DE ORDENAÇÃO\N";
        echo "\n1- SelectionSort \n2- InsertionSort \n3- MergeSort\n4- QuickSort";
        $escolhaOrdenador = readline("\nEscolha uma opção: ");
        if(is_numeric($escolhaOrdenador) == false || $escolhaOrdenador != 1 || $escolhaOrdenador != 2 || $escolhaOrdenador != 3 || $escolhaOrdenador != 4){
            echo VERMELHO . "A opção escolhida não é valida". PADRAO;
            $sair = false;
        }else{
            $sair = true;
        }
    }while($sair == false);
    switch ($escolhaOrdenador){
        case 1:
    }
}