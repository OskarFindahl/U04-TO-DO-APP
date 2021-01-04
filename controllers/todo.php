<?php

include_once(__DIR__ . '/../models/todo.php');
include_once(__DIR__ . '/../views/user-created.php');


function handleCreateTodo()
{
    $title = $_POST['title'];    
    $text = $_POST['text'];

    createTodo($title,$text);
    $taskData = returnTodo();
    showUserTodoView($taskData);
}