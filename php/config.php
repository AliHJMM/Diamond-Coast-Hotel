<?php
define('DBUSER', 'root');
define('DBPASS', '');
define('DBCONNSTRING','mysql:host=localhost;dbname=diamondcoast');
define('DBNAME','diamondcoast');
define('DBSERVER','localhost');


function getDBConnection() {
    $conn = new mysqli(DBSERVER, DBUSER, DBPASS, DBNAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

?>
