<?php

include_once(__DIR__ . '/../models/todo.php');
include_once(__DIR__ . '/../views/user-created.php');


function handleCreateTodo()
{
    $title = $_POST['title'];    
    $text = $_POST['text'];
    
    $_SESSION['listCategory'] = $_POST['listCategory'];


  

    createTodo($title,$text);
    $taskData = returnTodo();
    print_r($taskData[0]['listCategory']);
    showUserTodoView($taskData);
}