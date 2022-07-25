<?php

/**
 * port와 db 네임등을 추가로 분리할 것
 * 도메인, 파일위치, DB접속정보, 파일 경로 등의 정보들은 가급적 상수로 처리하여 사용
 * 아래는 예시
 */
define("DB_HOST", "localhost");
define("DB_PORT", "3306");
define("DB_NAME", "testdb");
define("DB_USER_NAME", "root");
define("DB_USER_PW", "qwe123");
define("DB_CONN", "mysql:host=". DB_HOST . ";port=" . DB_PORT . "dbname=" . DB_NAME); // connection

// $dns = "mysql:host=localhost;port=3306;dbname=testdb";
// $username="root";
// $pw="qwe123";
// $port = "3306";

try {
    $db = new PDO(DB_CONN, DB_USER_NAME, DB_USER_PW);
} catch (PDOException $th) {
    echo '접속실패 : ' . $th->getMessage();
}
