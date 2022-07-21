<?php

 $dns = "mysql:host=localhost;port=3306;dbname=testDB";
 $username="root";
 $pw="qwe123";

 try {
     $db = new PDO($dns, $username, $pw);
     
 } catch (PDOException $th) {
     echo '접속실패 : ' . $th->getMessage();
 }
