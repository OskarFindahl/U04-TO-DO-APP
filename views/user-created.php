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

<form name="myform" method="POST" action="todo-checked.php">

  <?php
  foreach($taskData as $data){

    if ($data['done'] == 0){

     echo "<li>" . 
     $data['title'] . ": " . 
     $data['text'] . 
    "<input class=\"status\" type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>" . 
    "<input class=\"delete\"  type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>"; 

  }

  else if ($data['done']== 1){

    echo "<li>" . 
    $data['title'] . ": " . 
    $data['text'] . 
   "<input class=\"status\" type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "checked> </li>" .
   "<input class=\"delete\" type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>";  
    };

    
  };

   ?>


<script type="text/javascript"> 
var statusBtns = document.querySelectorAll('.status');
var deleteBtns = document.querySelectorAll('.delete');



  statusBtns.forEach(item => {
    item.addEventListener('click',event => {
    document.myform.submit();
    })
  })

  deleteBtns.forEach(item => {
    item.addEventListener('click',event => {
    document.myform.submit();
    })
  })




</script> 



<?php

}
?>







</form>
</ul>






    
</body>
</html>