<?php

// class Database
// {
//     private static ?array $configuration = null;

//     private static $connection = null;

//     private static $query = null;

//     public static function __constructStatic()
//     {
//         self::$configuration = json_decode(file_get_contents("app/configs/dbconfig.json"), true);
//     }

//     public function getQuery()
//     {
//         return $this->query;
//     }

//     private static function Connect()
//     {
//         if (self::$connection) {
//             return self::$connection;
//         }

//         self::$connection = new PDO(
//             "mysql:host" . self::$configuration["host"]
//             . ";port=" . self::$configuration["port"]
//             . ";dbname=" . self::$configuration["databaseName"]
//             . ";charset=" . self::$configuration["charset"],
//             self::$configuration["user"],
//             self::$configuration["password"]
//         );

//         return self::$connection;
//     }

//     public static function getRow($sql, ...$parameters)
//     {
//         self::$query = self::Connect()->prepare($sql);
//         self::$query->execute($parameters);
//         return self::$query->fetch(PDO::FETCH_OBJ);
//     }

//     public static function getAll($sql, ...$parameters)
//     {
//         self::$query = self::Connect()->prepare($sql);
//         self::$query->execute($parameters);
//         return self::$query->fetchAll(PDO::FETCH_OBJ);
//     }

//     public static function insert($sql, $params)
//     {
//         self::$query = self::Connect()->prepare($sql);
//         return (self::$query->execute($params)) ? self::Connect()->lastInsertId() : 0;
//     }

//     public static function rowCount($sql, ...$params)
//     {
//         self::$query = self::Connect()->prepare($sql);
//         self::$query->execute($params);
//         return self::$query->rowCount();
//     }
// }

// Database::__constructStatic();

class Database
{
    private static array $conf;
    private static $connection = null;
    public static $query = null;
    public static function __constructStatic()
    {
        self::$conf = json_decode(file_get_contents(__DIR__ . "/../configs/dbconfig.json"), true);
    }
    private static function connect()
    {
        if (!self::$connection) {
            self::$connection = new PDO(
                "mysql:host" . self::$conf["host"] . ";port=" . self::$conf["port"] . ";dbname=" . self::$conf["database"] . ";charset=" . self::$conf["charset"],
                self::$conf["user"],
                self::$conf["password"]
            );
        }
        return self::$connection;
    }
    public static function getRow($sql, $params)
    {
        self::$query = self::connect()->prepare($sql);
        self::$query->execute($params);
        return self::$query->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAll($sql, $params)
    {
        self::$query = self::connect()->prepare($sql);
        self::$query->execute($params);
        return self::$query->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function insert($sql, $params)
    {
        self::$query = self::connect()->prepare($sql);
        return (self::$query->execute($params)) ? self::connect()->lastInsertId() : -1;
    }

    public static function rowCount($sql, $params)
    {
        self::$query = self::connect()->prepare($sql);
        self::$query->execute($params);
        return self::$query->rowCount();
    }

    public static function Query($sql, $params)
    {
        self::$query = self::connect()->prepare($sql);
        self::$query->execute($params);
    }
}
Database::__constructStatic();