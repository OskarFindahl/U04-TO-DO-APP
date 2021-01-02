<?php
include(__DIR__ . '/../db.php');




function createUser($name,$password)
{
$pdo = connectDB();   
$sql = "INSERT INTO users (username, password) VALUES (:name, :pass)";
$stmt = $pdo -> prepare($sql);
$stmt->execute(['name'=>$name,'pass'=> $password]);



}





function returnTodo()
{
   

$pdo = connectDB();

$sth = $pdo->prepare("SELECT * FROM todos WHERE user_id = (SELECT id FROM users WHERE username = '{$_SESSION['username']}' LIMIT 1)");
$sth->execute();


$taskData = array();
while($task = $sth->fetch(PDO::FETCH_ASSOC)){
    $taskData[] = $task;
};

return $taskData;


}