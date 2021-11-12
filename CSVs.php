<?php

$arquivoCsv = fopen('metadados_fotos_APS_20212.csv', 'r');
$teste100 = array();
$teste1000 = array();
$teste10000 = array();
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