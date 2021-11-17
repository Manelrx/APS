<?php
include('CSVs.php');
function distance($lat1, $lon1, $lat2, $lon2)
{

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $km = $miles * 1.609344;

    return $km;
}

function verificaKm($id, $distance, $lista)
{
    $lugaresProximos = array();
    foreach ($lista as $linha){
        if ($linha[0] == $id){
            $lat = $linha[5];
            $long = $linha[6];
        }
    } 
    for ($i = 1; $i < count($lista); $i++) {
        $km = distance($lat, $long, $lista[$i][5], $lista[$i][6]);
        if ($km < $distance && $i != $id) {
            $i_km = array($i, $km);
            array_push($lugaresProximos, $i_km);
        }
    }
    return $lugaresProximos;
}



$teste = verificaKm(2, 40, $teste100);
print_r($teste);

/* function codexworldGetDistanceOpt($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
{
    $rad = M_PI / 180;
    //Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin($latitudeFrom * $rad) 
        * sin($latitudeTo * $rad) +  cos($latitudeFrom * $rad)
        * cos($latitudeTo * $rad) * cos($theta * $rad);

    return acos($dist) / $rad * 60 *  1.853;
} */
