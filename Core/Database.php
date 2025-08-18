<?php
/** 
 * Database class for handling database connections and queries.
 * This class uses PDO for database interactions and is designed to be reusable.
 * 
 * @package Core-PHP8.4-App
 * @version 1.00
 */

    namespace Core;

    use PDO;


   class Database {

    
        private $conn;

        protected $statement;

        public function __construct($config, $username = 'root', $password = '')
        {            
            
            $dsn = 'mysql:'.http_build_query($config, '', ';');        
           
            $this->conn = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ                
            ]);
        }

        /**
         * Prepare and execute a query with optional parameters.
         * @param string $query The SQL query to execute.
         * @param array $params Optional parameters to bind to the query.
         * @return $this Returns the current instance for method chaining.
         */
        public function query($query, $params = []){  

            $this->statement = $this->conn->prepare($query);

            $this->statement->execute($params);

            return $this;

        }

        /** 
         * Fetch all results from the last executed query.
         * @return array Returns an array of results.
         */
        public function get(): array{

            return $this->statement->fetchAll();
            
        }

        /** 
         * Fetch a single result from the last executed query.
         * @return mixed Returns a single result or false if no result found.
         */
        public function find(): mixed {

           return $this->statement->fetch();

        }

        /** 
         * Find all results from the last executed query 
         * 
         * @return mixed Returns a single result 
         * or aborts with a 404 error if no result found.
         */
        public function findOrFail(): mixed {

           $result = $this->find();

           if(!$result){
            
                 abort(Response::NOT_FOUND);
           }

           return $result;
        }
     
}