<?php

include_once 'BDDManager.inc';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_REQUEST['latitude']) && isset($_REQUEST['longitude'])) {
    $lat = $_REQUEST['latitude'];
    $long = $_REQUEST['longitude'];
    echo getCity($lat, $long);
} else {
    echo 'erreurCall';
}

function getCity($latitude, $longitude) {
    $bdd = new BDDManager();
    if (!$bdd->isConnected()) {
        $bdd->connectBDD();
    }
    $ville = 'erreurNotFound';
    $sql = "SELECT * FROM `villes` \n"
            . "WHERE `longitude`<( $longitude + 0.1) AND `longitude`>( $longitude - 0.1)\n"
            ."AND `latitude`<( $latitude + 0.1) AND `latitude`>( $latitude - 0.1)\n"
            . "ORDER BY ABS( `latitude` - $latitude ), ABS(`longitude`-$longitude)";
    $result = $bdd->query($sql);
    if ($result = mysql_fetch_row($result)) {
        $ville = $result[4];
    }
    return $ville;
}

?>
