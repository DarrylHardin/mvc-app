<?php
/**
 * PDO Database class
 * Connect to database
 * create prepared statements
 * bind values
 * return rows and results
 */

    class Db 
    {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbHandler;
        private $stmt;
        private $error;

        public function __construct()
        {
            // set DSN
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            // PDO::ATTR_PERSISTENT => true - checks if there is already a connection established with database
            // PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION - elegant error handling
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );

            // create PDO instance
            try{
                $this->dbHandler = new PDO($dsn, $this->user, $this->pass, $options);
            } catch(PDOException $e)
            {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
        
        // Prepare  statement with query
        public function query($sql)
        {
            $this->stmt = $this->dbHandler->prepare($sql);
        }

        // Bind values 
        public function bind($param, $value, $type = null)
        {
            if(is_null($type)){
                switch(true)
                {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;

                }
            }

            $this->stmt->bindValue($param, $value, $type);

        }

         // execute the prepared statement
         public function execute()
         {
             return $this->stmt->execute();
         }

         // get results set as object array
         public function resultSet()
         {
             $this->execute();
             return $this->stmt->fetchAll(PDO::FETCH_OBJ);
         }

         // get single object
         public function single()
         {
             $this->execute();
             return $this->stmt->fetch(PDO::FETCH_OBJ);
         }

         // get row count
         public function rowCount()
         {
             return $this->stmt->rowCount();
         }

    }