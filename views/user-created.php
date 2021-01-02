<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- create task -->
<?php
function showUserCreatedView(){
?>
<h1>Användare har skapats!</h1>


<form method="POST" action="create-todo.php">
Todo: <input type="text" name="text" >
<button type="submit">Done</button>
</form>

<?php
}
?>



<!-- Show and edit tasks -->
<?php
function showUserTodoView($taskData){
   
?>


<form method="POST" action="create-todo.php">
Todo: <input type="text" name="title" >
Description: <input type="text" name="text" >
<button type="submit">Done</button>
</form>


<h1>Todo har skapats!</h1>





<ul>

<form method="POST" action="todo-checked.php">

  <?php
  foreach($taskData as $data){

    if ($data['done'] == 0){

     echo "<li>" . 
     $data['title'] . ": " . 
     $data['text'] . 
    "<input type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>" . 
    "<input type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>"; 

  }

  else if ($data['done']== 1){

    echo "<li>" . 
    $data['title'] . ": " . 
    $data['text'] . 
   "<input type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "checked> </li>" .
   "<input type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>";  
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