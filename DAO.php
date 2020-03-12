<?php
    /**
     * Classe d'accès aux données de la BDD, abstraite
     * 
     * @property static $bdd l'instance de PDO que la classe stockera lorsque connect() sera appelé
     *
     * @method static connect() connexion à la BDD
     * @method static insert() requètes d'insertion dans la BDD
     * @method static select() requètes de sélection
     */
    abstract class DAO{

        private static $bdd;

        /**
         * cette méthode permet de créer l'unique instance de PDO de l'application
         * 
         */
        public static function connect(){
            
            self::$bdd = new \PDO(
                'mysql:host=localhost;port=3306;dbname=vehicules',
                "root",
                "",
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                )   
            );
        }

        public static function insert($sql){
            try{
                var_dump($sql);
                $stmt = self::$bdd->prepare($sql);
                $result = $stmt->execute();
                
                $stmt->closeCursor();
                return $result;
                
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        /**
         * Cette méthode permet les requêtes de type SELECT
         * 
         * @param string $sql la chaine de caractère contenant la requête elle-même
         * @param mixed $param=null le paramètre de la requête
         * @param bool $multiple=true vrai si le résultat est composé de plusieurs enregistrements (défaut), false si un seul résultat doit être récupéré
         * 
         * @return array les enregistrements en FETCH_ASSOC 
         */
        public static function select($sql, $params = null, bool $multiple = true):array
        {
            try{
                $stmt = self::$bdd->prepare($sql);
                $stmt->execute($params);
                if($multiple){
                    $results = $stmt->fetchAll();
                    if(count($results) == 1){
                        $results = $results[0];
                    }
                }
                else $results = $stmt->fetch();
                var_dump($results);
                $stmt->closeCursor();
                return $results;
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

    }