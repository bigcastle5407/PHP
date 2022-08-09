<?
$servername = "localhost";
$username = "root";
$password = "qwe123";
$dbname = "dogimages";


 try {
     $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     
 } catch (PDOException $th) {
     echo '접속실패 : ' . $th->getMessage();
 }
