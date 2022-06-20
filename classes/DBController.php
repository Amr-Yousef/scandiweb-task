<?php 

    class DBController {
    public $dbHost = "localhost";
    public $dbUser = "root";
    public $dbPassword = "";
    public $dbName = "products";
    public $connection;

    public function openConnection()
    {
        $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if ($this->connection->connect_error) {
            echo " Error in Connection : " . $this->connection->connect_error;
            return false;
        } else {
            return true;
        }
    }

    public function closeConnection()
    {
        if ($this->connection) {
            // TODO: Check if this is still breaking the code
            //$this->connection->close();
        } else {
            echo "Connection is not opened";
        }
    }

    public function select($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function insert($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return true;
        }
    }

    public function delete($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return $result;
        }
    }
}

?>