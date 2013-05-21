<?php
    require_once ('config.php');
    
    class MySQLDatabase extends mysqli{

        private $connection;
        public $last_query;

        function __construct() {
            $connection = false;
            parent::__construct(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            if(mysqli_connect_error())
                die( 'Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error() );
            $connection = true;
        }

        public function db_close_connection() {		
            if($this->connection) {
                $this->close();
                $this->connection=false;
            }
        }

        public function db_query($sql) {
            $this->last_query = $sql;
            $result = $this->query($sql);
            $this->db_confirm_query($result);
            return $result;
        }

        public function db_escape_value( $value ) {
            $value = str_replace('&', '', $value);
            return $this->real_escape_string($value);
        }

        public function db_fetch_array($result_set) {
            return $result_set->fetch_array(MYSQLI_ASSOC);
        }

        public function db_num_rows($result_set) {
            return mysql_num_rows($result_set->num_rows);
        }

        public function db_insert_id() {
            return $this->insert_id;
        }

        public function db_affected_rows() {
            return $this->affected_rows;
        }

        private function db_confirm_query($result) {
            if (!$result) {
                $output = "Database query failed: " . $this->error . "<br /><br />";
                $output .= "Last SQL query: " . $this->last_query;
                die( $output );
            }
        }
    }//class MySQLDatabase
    
    $database = new MySQLDatabase();
?>