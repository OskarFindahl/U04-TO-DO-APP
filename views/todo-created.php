<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

function showUserTodoView($taskData){
?>
<h1>Todo har skapats!</h1>

<ul>

<form method="POST" action="todo-checked.php">

  <?php
  foreach($taskData as $data){

    if ($data['done'] == 0){

     echo "<li>" . 
     $data['text'] . 
    "<input type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>"; 

  }

  else if ($data['done']== 1){

    echo "<li>" . 
    $data['text'] . 
   "<input type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "checked> </li>"; 
    }

    
  };

   ?> 

<button type="submit">Done</button>

</form>

</ul>


<?php



}

?>
    
</body>
</html>