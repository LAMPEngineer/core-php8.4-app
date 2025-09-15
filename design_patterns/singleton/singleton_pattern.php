<?php
/*
 * The Singleton design pattern for database connection.
 * It ensures DatabaseConnection class has only one instance.
 *
 */

class DatabaseConnection
{
    // Static property to hold single instance
    private static ?DatabaseConnection $instance = null;

    // Private constructor to prevent direct instantiation
    private function __construct()
    {
        // Simulate a database connection.
        echo 'A new database connection has been established!' . PHP_EOL;
    }

    // Static method to get single instance
    public static function getInstance() : DatabaseConnection
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    // prevent cloning of instance
    private function __clone(){}


    // prevent unserialization (wakeup) of the instance
    public function __wakeup()
    {
        throw new \Exception('Can not unserialize a singleton.');
    }


    public function query(string $sql) : void
    {
        echo 'Executing SQL query: ' . $sql . PHP_EOL;
    }

}


// Usages

// First instance
$connection1 = DatabaseConnection::getInstance();

// Second instance
$connection2 = DatabaseConnection::getInstance();

if($connection1 === $connection2){
    echo 'Both variables contain same instance' . PHP_EOL;
}else{
    echo 'Both variables contain different instances' . PHP_EOL;
}

$connection1->query('SELECT * FROM users');
$connection2->query('SELECT * FROM products WHERE id=123');

/* Output:
A new database connection has been established!
Both variables contain same instance
Executing SQL query: SELECT * FROM users
Executing SQL query: SELECT * FROM products WHERE id=123 */


//$newConnection = new DatabaseConnection(); //Fatal Error

//$clonedConnection = clone $connection1; //Fatal Error

//$unserializedConnection = unserialize(serialize($connection1)); //Fatal Error
