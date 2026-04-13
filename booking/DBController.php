<?php

class DBController
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "travel";
    private $port = 3306;
    private static $conn;

    public function __construct()
    {
        self::$conn = mysqli_connect($this->host, $this->user, $this->password, $this->database, $this->port);
        if (self::$conn === false) {
            error_log("Connection failed: " . mysqli_connect_error());
        }
    }

    public static function getConnection()
    {
        if (empty(self::$conn)) {
            new self();
        }
        return self::$conn;
    }


    public function getDBResult($query, $params = array())
    {
        $sql_statement = self::$conn->prepare($query);
        if (!$sql_statement) {
            error_log("Failed to prepare SQL query: " . self::$conn->error);
            return null;
        }

        if (!empty($params)) {
            $this->bindParams($sql_statement, $params);
        }

        if (!$sql_statement->execute()) {
            error_log("Execution failed: " . $sql_statement->error);
            return null;
        }

        $result = $sql_statement->get_result();

        if (!$result) {
            error_log("Query failed: " . self::$conn->error);
            return null;
        }

        $resultset = [];
        while ($row = $result->fetch_assoc()) {
            $resultset[] = $row;
        }

        $sql_statement->close();
        return !empty($resultset) ? $resultset : null;
    }

   
    public function insertDB($query, $params = array())
    {
        $sql_statement = self::$conn->prepare($query);
        if (!$sql_statement) {
            error_log("Failed to prepare SQL query: " . self::$conn->error);
            return null;
        }

        if (!empty($params)) {
            $this->bindParams($sql_statement, $params);
        }

        if (!$sql_statement->execute()) {
            error_log("Execution failed: " . $sql_statement->error);
            return null;
        }

        $insert_id = mysqli_insert_id(self::$conn);
        $sql_statement->close();
        return $insert_id;
    }

    // Method to update records in the database
    public function updateDB($query, $params = array())
    {
        $sql_statement = self::$conn->prepare($query);
        if (!$sql_statement) {
            error_log("Failed to prepare SQL query: " . self::$conn->error);
            return null;
        }

        if (!empty($params)) {
            $this->bindParams($sql_statement, $params);
        }

        if (!$sql_statement->execute()) {
            error_log("Execution failed: " . $sql_statement->error);
            return null;
        }

        $sql_statement->close();
    }

    public static function delete($table, $id)
    {
        $conn = self::getConnection(); 
        $query = "DELETE FROM $table WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id); 
        return $stmt->execute(); 
    }
    

    public function bindParams($sql_statement, $params)
    {
        $param_type = "";
        foreach ($params as $query_param) {
            $param_type .= $query_param["param_type"];
        }

        $bind_params = [&$param_type];
        foreach ($params as $k => $query_param) {
            $bind_params[] = &$params[$k]["param_value"];
        }

        if (!empty($bind_params)) {
            call_user_func_array([$sql_statement, 'bind_param'], $bind_params);
        }
    }
}
