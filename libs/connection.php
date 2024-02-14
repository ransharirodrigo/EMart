<?php

class Database
{

    private static $connection;

    public static function setUpConnection()
    {
        if (!isset($connection)) {
          Database::$connection = new mysqli("localhost", "root", "MY1@sqlSe2@raN", "emart_db","3306");
        }
    }

    public static function execute($query)
    {
        Database::setUpConnection();

        if (str_starts_with($query, "SELECT")) {

            $resultset = Database::$connection->query($query);

            return $resultset;
        } else {
            Database::$connection->query($query);

            return Database::$connection->insert_id;
        }
    }
}