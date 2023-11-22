<?php

class DBConexion {
    // Create the data conexion.
    public static function connection() {

        $connection = new mysqli("localhost", "root", "", "prodsmvc");

        if ( $connection->errno ) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {
            $connection->query("SET NAMES 'utf8'");
            return $connection;
        }

    }
}