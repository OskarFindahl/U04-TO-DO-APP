<?php

include_once(__DIR__ . '/../models/todo.php');
include_once(__DIR__ . '/../views/user-created.php');


function handleTodoEdit()
{

$id = (key($_POST));
$title= $_POST[key($_POST)];
$description = $_POST['description'];



editTodo($id,$title,$description);


$taskData = returnTodo();
showUserTodoView($taskData);
}