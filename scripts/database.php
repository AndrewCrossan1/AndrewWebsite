<?php

class Database {
    /**
     * Used to create a connection with the MySQL database
     * @return mysqli|null
     */
    private static function Connect(): mysqli|null {
        $db = 'AndrewSite';
        $user = 'root';
        $password = 'MYSQL_ROOT_PASSWORD';
        $host = 'db';
        try {
            $conn = new mysqli('p:' . $host, $user, $password, $db);
            if ($conn->connect_error == null) {
                return $conn;
            } else {
                return null;
            }
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Execute an SQL command using this function
     * @param string $Statement The SQL code
     * @param string|null $DataTypes Datatypes of parameters (ssidssii) for example
     * @param array $Parameters Parameters for the use in the SQL statement (Will be binded in the function) <br> ORDER MUST CORRESPOND TO DATATYPE ORDER
     * @return mysqli_result|bool|null Array if not empty or error in statement
     */
    public static function Query(string $Statement, string $DataTypes = null, array $Parameters = []): mysqli_result|null|bool {
        //Create the query
        if ($Query = self::Connect()->prepare($Statement)) {
            //Bind parameters if not empty
            if (!empty($Parameters)) {
                $Query->bind_param($DataTypes, ...$Parameters);
            }
            //Execute command
            if ($Query->execute()) {
                return $Query->get_result();
            } else {
                return null;
            }
            //Count the number of parameters
        } else {
            return null;
        }
    }

}