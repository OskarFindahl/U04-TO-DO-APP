<?php
include(__DIR__ . '/../db.php');

session_start(); 


//Function to create Todo
function createTodo($title,$text)
{
    $pdo = connectDB();  
    $sth = $pdo->prepare("SELECT id FROM users WHERE username = '{$_SESSION['username']}'");
    $sth->execute();
    $id = $sth->fetch(PDO::FETCH_ASSOC);

    $sql = "INSERT INTO todos (user_id,listCategory,title,text,done) VALUES (:user_id,:listCategory,:title,:text,:done)";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute(['user_id' => $id['id'],'listCategory' => $_SESSION['listCategory'], 'title' => $title, 'text'=>$text, 'done' => 0]);
}





//Function to return Todo
function returnTodo()
{  
    $pdo = connectDB();
    $sth = $pdo->prepare("SELECT * FROM todos WHERE user_id = (SELECT id FROM users WHERE username = '{$_SESSION['username']}' LIMIT 1) AND listCategory = {$_SESSION['listCategory']}");
    $sth->execute();

    $taskData = array();

    while($task = $sth->fetch(PDO::FETCH_ASSOC)){
        $taskData[] = $task;
    };

    return $taskData;
}






//Function to update status
function updateTodoStatus($task_id = "empty")
{
    $pdo = connectDB();   
    $sql = "UPDATE todos SET done = '0' WHERE user_id = (SELECT id FROM users WHERE username = '{$_SESSION['username']}' LIMIT 1)";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute();


    if($task_id !== "empty") {

        foreach($task_id as $id) {
            $sql = "UPDATE todos SET done = '1' WHERE task_id = '$id'";
            $stmt = $pdo -> prepare($sql);
            $stmt->execute();
        }
    }
}


//Function to delete todo
function deleteTodo($delete_id)
{

    $pdo = connectDB();   

    foreach($delete_id as $id) {
        $sql = "DELETE FROM todos WHERE task_id = '$id'";
        $stmt = $pdo -> prepare($sql);
        $stmt->execute();
    }
}


//Function to edit todo
function editTodo($id,$title,$description)
{
    $pdo = connectDB();   
    $sql = "UPDATE todos SET title = '$title', text = '$description' WHERE task_id = '$id'";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute();
}

