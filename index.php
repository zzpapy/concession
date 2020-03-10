<?php
    
    require_once("DAO.php");
    require_once("Vehicule.php");

    $sql = "SELECT *
            FROM vehicule v
            ";

    DAO::connect();

    $results = DAO::select($sql);

    $vehicules = [];

    foreach($results as $result){
        $vehicules[] = new Vehicule($result);
    }

    var_dump($results);
    
    foreach($vehicules as $v){
        echo $v, "<br>";
        
    }
    
    echo "Il y a ".Vehicule::getNbOfInstances()." véhicules instanciés<br>";
    

    
