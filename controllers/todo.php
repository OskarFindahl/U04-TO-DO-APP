<?php

include_once(__DIR__ . '/../models/todo.php');
include_once(__DIR__ . '/../views/todo-created.php');


function handleCreateTodo()
{

$text = $_POST['text'];



createTodo($text);
$taskData = returnTodo();
showUserTodoView($taskData);

}