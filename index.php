<?php
    
    require_once("DAO.php");
    require_once("Vehicule.php");

    $sql = "SELECT *
            FROM vehicule v
            ";
    $tab = ["jaune", "vert"];
    $tab = json_encode($tab);
    // $tab=[$tab];
    // var_dump($tab);
    $sql1 = "INSERT INTO t1 VALUES("."'".$tab."'".")";
    $sql2 = 'SELECT * 
    FROM vehicule v
    INNER JOIN marque m
    ON m.Id_marque = v.marque_id
    WHERE m.origine ="france"';
    $sql3 = "INSERT INTO vehicule (immat,modele,couleur,marque,marque_id)
    VALUES ('AB-112-CD','scenic',"."'".$tab."'".",'RENAULT',2)";

    $tab1 = ['jaune', 'vert'];
    $tab1 = json_encode($tab1);
    var_dump($tab1);
    $sql4 = "SELECT couleur
    FROM vehicule v
    WHERE v.couleur
    IS NOT NULL
    AND couleur='$tab'";

    $sql5 = "SELECT v.couleur ,v.marque,v.modele,v.immat
    FROM vehicule v
    WHERE v.Id_vehicule = 27 ";
   
    DAO::connect();

    // $results = DAO::select($sql);
    // $result1 = DAO::insert($sql3);

    // $affich_voiture = DAO::select($sql2);
    // $couleur = DAO::select($sql5);
    $couleur1 = DAO::select($sql4);
    // var_dump($affich_voiture);
    var_dump($couleur1);
    // var_dump($couleur);
    $vehicules = [];

    // foreach($results as $result){
    //     $vehicules[] = new Vehicule($result);
    // }

    
    foreach($vehicules as $v){
        echo $v, "<br>";
        
    }
    
    echo "Il y a ".Vehicule::getNbOfInstances()." véhicules instanciés<br>";
    

    
