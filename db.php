
<?php

class db {

    // The database connection
    protected static $connection;
    protected static $nxt;

    /**
     * Connect to the database
     * 
     * @return bool false on failure / mysqli MySQLi object instance on success
     */
    public function connect() {

        mysqli_report(MYSQLI_REPORT_STRICT);

        // Try and connect to the database
        if (!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            try {
                
                self::$connection = new mysqli('192.168.3.37', 'grdbuser','Grdbuser@1', 'paysense');

            } catch (Exception $e) {
                echo "Connection Failed == " . $e->getMessage();

               //  echo "message: " . $e->getMessage();  // not in live code obviously...
                
            }
        }



        /*
          if($nxt == 330)
          echo "Connection Failed";
         */

//        if (self::$connection->errno) {
//            echo "Connect failed: %s\n", self::$connection->connect_error;
//            exit();
//        }
        // If connection was not successful, handle the error
        if (self::$connection == false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
          //  echo "Connection ~!@# Failed";

            return false;
        } else
        {
         // echo "Connected";
            return self::$connection;
        }
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query1) {
        // Connect to the database
        $conn = $this->connect();

    //    echo "inside query";


        if ($conn) {
//            echo "<br>Connection Succceded</br>";

            $result = $conn->query($query1);
  
            return $result;
        } else ;
  //          echo "Connection Failed";
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query) {
    
        $rows = array();

        // echo "Inside Select";
        $result = $this->query($query);
        if ($result === false) {
        //    echo "result is false";
            return false;
        } else
        //	echo "result is true";
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        return $rows;
    }

    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public function error() {
        $connection = $this->connect();
        return $connection->error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public function quote($value) {
        $connection = $this->connect();
        return "'" . $connection->real_escape_string($value) . "'";
    }
    
    public function close()
    {
        $this->close();
    }

}
?>

