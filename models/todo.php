<?php
include(__DIR__ . '/../db.php');


//CRUD - Create read update delete.
session_start(); 

function createTodo($title,$text)
{


$pdo = connectDB();  

$sth = $pdo->prepare("SELECT id FROM users WHERE username = '{$_SESSION['username']}'");
$sth->execute();
$id = $sth->fetch(PDO::FETCH_ASSOC);

 
$sql = "INSERT INTO todos (user_id,title,text,done) VALUES (:user_id,:title,:text,:done)";
$stmt = $pdo -> prepare($sql);
$stmt->execute(['user_id' => $id['id'], 'title' => $title, 'text'=>$text, 'done' => 0]);

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




function updateTodoStatus($task_id = "empty")
{
$pdo = connectDB();   

$sql = "UPDATE todos SET done = '0' WHERE user_id = (SELECT id FROM users WHERE username = '{$_SESSION['username']}' LIMIT 1)";
$stmt = $pdo -> prepare($sql);
$stmt->execute();


if($task_id !== "empty")
{


    foreach($task_id as $id)
    {
      $sql = "UPDATE todos SET done = '1' WHERE task_id = '$id'";
      $stmt = $pdo -> prepare($sql);
      $stmt->execute();

    }

}

}


function deleteTodo($delete_id)
{

    $pdo = connectDB();   

    foreach($delete_id as $id)
    {
      $sql = "DELETE FROM todos WHERE task_id = '$id'";
      $stmt = $pdo -> prepare($sql);
      $stmt->execute();

    }




}



function editTodo($id,$title,$description)
{

  $pdo = connectDB();   

  
    $sql = "UPDATE todos SET title = '$title', text = '$description' WHERE task_id = '$id'";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute();



}

