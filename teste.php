<?php

$arquivo = fopen('metadados_fotos_APS_20212.csv', 'r');
$header = fgetcsv($arquivo, 1000, ",");

$teste = array();

while ($row = fgetcsv($arquivo, 1000, ",")) {
    $nota[] = array_combine($header, $row);
}



foreach($nota as $t){
    $teste1 = implode(",", $t);
    array_push($teste, "$teste1 \n" );
}

echo("$teste[1] $teste[2]");
