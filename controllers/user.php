<?php

include_once(__DIR__ . '/../models/user.php');
include_once(__DIR__ . '/../views/user-created.php');



function handleCreateUser()
{
    session_start();
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['listCategory'] = 0;
    $password = $_POST['password'];
    createUser($_SESSION['username'],$password);

    $taskData = returnTodo();
    showUserTodoView($taskData);

}