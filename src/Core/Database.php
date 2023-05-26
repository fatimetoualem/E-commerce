<?php 
namespace App\Core;

use PDO;

// Conexion a la base de donneé
class Database{
    
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnexionDb();
    }

    public function getConnexionDb(){
        $dsn = "mysql:dbname=" .DB_NAME .";host=" .DB_HOST. ";charset=utf8";
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        $pdo = new PDO ($dsn, DB_USER, DB_PASS, $options);
        $pdo->exec('SET NAMES UTF8');
        return $pdo;
    }

    function prepareAndExecute(string $sql, array $values = [])
    {
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute($values);

        return $pdoStatement;
    }

    /**
     * Exécute une requête de sélection et retourne UN résultat
     */
    function getOneResult(string $sql, array $values = [])
    {
        $pdoStatement = $this->prepareAndExecute($sql, $values);
        $result = $pdoStatement->fetch();

        return $result;
    }

    /**
     * Exécute une requête de sélection et retourne TOUS les résultats
     */
    function getAllResults(string $sql, array $values = [])
    {
        $pdoStatement = $this->prepareAndExecute($sql, $values);
        $results = $pdoStatement->fetchAll();

        return $results;
    }

    function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

}
