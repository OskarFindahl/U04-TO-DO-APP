<?php
include(__DIR__ . '/../db.php');


//CRUD - Create read update delete.
session_start(); 
function createTodo($text)
{
  
$pdo = connectDB();  

$sth = $pdo->prepare("SELECT id FROM users WHERE username = '{$_SESSION['username']}'");
$sth->execute();
$id = $sth->fetch(PDO::FETCH_ASSOC);

 
$sql = "INSERT INTO todos (user_id,text,done) VALUES (:user_id,:text,:done)";
$stmt = $pdo -> prepare($sql);
$stmt->execute(['user_id' => $id['id'], 'text'=>$text, 'done' => 0]);



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




function updateTodoStatus($task_id)
{
$pdo = connectDB();   

$sql = "UPDATE todos SET done = '0' WHERE user_id = (SELECT id FROM users WHERE username = '{$_SESSION['username']}' LIMIT 1)";
$stmt = $pdo -> prepare($sql);
$stmt->execute();


    foreach($task_id as $id)
    {
      $sql = "UPDATE todos SET done = '1' WHERE task_id = '$id'";
      $stmt = $pdo -> prepare($sql);
      $stmt->execute();

    }



}


