<?php

include_once(__DIR__ . '/../models/todo.php');
include_once(__DIR__ . '/../views/todo-created.php');


function handleTodoChecked()
{

    
  
  print_r($_POST['status']);
 




    $task_id = $_POST['status'];

updateTodoStatus($task_id);

 

 $taskData = returnTodo();
 showUserTodoView($taskData);

}