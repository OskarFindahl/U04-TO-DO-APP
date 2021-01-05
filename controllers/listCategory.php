<?php

include_once(__DIR__ . '/../models/todo.php');
include_once(__DIR__ . '/../views/user-created.php');


function handleListCategory($listCategory)
{
   
    $_SESSION['listCategory'] = $listCategory;
    $taskData = returnTodo();
    showUserTodoView($taskData);
}