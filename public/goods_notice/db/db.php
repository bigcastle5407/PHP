<?php
// header('Content-Type: text/html; charset=utf-8');

// define("DB_HOST", "localhost");
// define("DB_PORT", "3306");
// define("DB_NAME", "goods");
// define("DB_USER_NAME", "root");
// define("DB_USER_PW", "qwe123");
// define("DB_CONN", "mysql:host=". DB_HOST . ";port=" . DB_PORT . "dbname=" . DB_NAME); // connection

// try {
//     $db = new PDO(DB_CONN, DB_USER_NAME, DB_USER_PW);
// } catch (PDOException $th) {
//     echo '접속실패 : ' . $th->getMessage();
// }



$servername = "localhost";
$username = "root";
$password = "qwe123";
$dbname = "goods";


 try {
     $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     
 } catch (PDOException $th) {
     echo '접속실패 : ' . $th->getMessage();
 }
