<?php
	namespace komBatch;
    class DbCon {        
        protected static $connection;
        public function connect() {    
            if(!isset(self::$connection)) {
                $config = parse_ini_file('/xampp/htdocs/config.ini'); //replace with location of your database config file
                self::$connection = new \mysqli('127.0.0.1',$config['username'],$config['password'],$config['dbname']); //needs the \ before mysqli for whatever reason
            }            
            if(self::$connection === false) {
                return false;
            }
            return self::$connection;
        } 
        public function query($query) {
			$connection = $this -> connect();
            $result = $connection -> query($query);
            return $result;
        } 
        public function select($query) {
            $rows = array();
            $result = $this -> query($query);
            if($result === false) {
                return false;
            }
            while ($row = $result -> fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }      
        public function error() {
            $connection = $this -> connect();
            return $connection -> error;
        }      
        public function quote($value) {
            $connection = $this -> connect();
            return "'" . $connection -> real_escape_string($value) . "'";
        }
    }
?>