<?php
/**
 * Created by PhpStorm.
 * User: dierme
 * Date: 06.11.17
 * Time: 16:11
 */

try{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=spotify', 'root', '123aa123');
}
catch (PDOException $e){
    die('could not connect');
}

$statement = $pdo->prepare('Select * from `token`');

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

require 'views/tokens.view.php';