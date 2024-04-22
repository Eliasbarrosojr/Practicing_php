<?php

class Sql extends PDO
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=dbphp8", "root", "");
    }

    private function setParams($statement, $parameters = array())
    {
        foreach ($parameters as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value)
    {
        $statement->bindParam($key, $value);
    }

    public function executeQuery($rawQuery, $params = array())
    {
        $statement = $this->connection->prepare($rawQuery);

        $this->setParams($statement, $params);

        $statement->execute();

        return $statement;
    }

    public function select($rawQuery, $params = array())
    {
        $statement = $this->executeQuery($rawQuery, $params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
