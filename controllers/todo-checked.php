<?php

include_once(__DIR__ . '/../models/todo.php');
include_once(__DIR__ . '/../views/user-created.php');


function handleTodoChecked()
{



if(isset($_POST['status']))
{
    $task_id = $_POST['status'];
    updateTodoStatus($task_id); 
}else
{
    updateTodoStatus(); 
}
    

if(isset($_POST['remove']))
{
  $delete_id = $_POST['remove'];
  deleteTodo($delete_id);

}


 $taskData = returnTodo();
 showUserTodoView($taskData);

}