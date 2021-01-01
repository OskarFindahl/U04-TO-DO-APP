<?php
include(__DIR__ . '/../db.php');


//CRUD - Create read update delete.

function createUser($name,$password)
{
$pdo = connectDB();   
$sql = "INSERT INTO users (username, password) VALUES (:name, :pass)";
$stmt = $pdo -> prepare($sql);
$stmt->execute(['name'=>$name,'pass'=> $password]);










}