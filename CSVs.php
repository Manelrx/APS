<?php  //PARA EXECUTAR O PROGRAMA UTILIZER O PROGRAMA.PHP
define("AZUL", "\033[34m");
define("VERMELHO", "\033[31m");
define("VERDE", "\033[32m");
define("AMARELO", "\033[1;33m");
define("ROXO", "\033[0;35m");
define("PADRAO", "\033[0m");

$arquivoCsv = fopen('metadados_fotos_APS_20212.csv', 'r');

$teste100 = array();
$teste1000 = array();
$teste10000 = array();
$teste20000 = array();
$teste50000 = array();
$arquivo = array();
$id_file_size = array();
$id_dateTime = array();


while ($lista = fgetcsv($arquivoCsv, 1000, ",")) {
    array_push($arquivo, $lista);
}

for($i= 0; $i < 100; $i++){
    array_push($teste100, $arquivo[$i]);
}
for($i= 0; $i < 1000; $i++){
    array_push($teste1000, $arquivo[$i]);
}
for($i= 0; $i < 10000; $i++){
    array_push($teste10000, $arquivo[$i]);
}
for($i= 0; $i < 20000; $i++){
    array_push($teste20000, $arquivo[$i]);
}
for($i= 0; $i < 50000; $i++){
    array_push($teste50000, $arquivo[$i]);
}

