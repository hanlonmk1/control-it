<?php
/* 
Code to make the connection to MySQL database 
(using PDO for Login/Register pages -> filename config.php)

Standard PHP PDO format to make db connection, adapted from
e.g. https://www.w3schools.com/php/php_mysql_connect.asp
 */

//Declare db variables
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'b83556e2590eb1');
define('DB_PASSWORD', '2ac6ec24');
define('DB_NAME', 'ibmx_eb9c5667d3559f5');
 
/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
