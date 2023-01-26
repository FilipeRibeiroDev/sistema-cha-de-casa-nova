<?php

// Sample file: Never send your credentials to git

// host
$host = 'http://localhost/conteudos/crud-php-mysql-procedural/';

// db
$db_name = 'id19394834_casamento';
$db_host = 'localhost';
$db_user = 'fbrito';
$db_pass = '}vLz9V>aY45|~LA~';

try {
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
} catch (\Throwable $th) {
  throw $th;
}