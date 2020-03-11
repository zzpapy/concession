<?php
    
    require_once("DAO.php");
    require_once("Vehicule.php");

    $sql = "SELECT *
            FROM vehicule v
            ";
    $tab = ["tab"=>["key1"=> "value1", "key2"=> "value2"]];
    $tab = json_encode($tab);
    // $tab=[$tab];
    var_dump($tab);
    $sql1 = 'INSERT INTO t1 VALUES('.$tab.')';
    $sql2 = 'SELECT * 
    FROM vehicule v
    INNER JOIN marque m
    ON m.Id_marque = v.marque_id
    WHERE m.origine ="italie"';
    
    
    DAO::connect();

    $results = DAO::select($sql);
    $affich_voiture = DAO::select($sql2);
    $result1 = DAO::insert($sql1);
    var_dump($affich_voiture);
    $vehicules = [];

    foreach($results as $result){
        $vehicules[] = new Vehicule($result);
    }

    
    foreach($vehicules as $v){
        echo $v, "<br>";
        
    }
    
    echo "Il y a ".Vehicule::getNbOfInstances()." véhicules instanciés<br>";
    

    
