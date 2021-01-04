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





<ul class="list">

<form  name="myform" class="myform" method="POST" action="todo-checked.php">

  <?php
  foreach($taskData as $data){

    if ($data['done'] == 0){

     echo "<li>" . 
     $data['title'] . ": " . 
     $data['text'] . 
    "<input class=\"status\" type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>" . 
    "<input class=\"delete\"  type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>" . 
    "<input class=\"update\"  type=\"checkbox\" name = \"update[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>"; 
    

  }

  else if ($data['done']== 1){

    echo "<li>" . 
    $data['title'] . ": " . 
    $data['text'] . 
   "<input class=\"status\" type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "checked> </li>" .
   "<input class=\"delete\" type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>" . 
    "<input class=\"update\"  type=\"checkbox\" name = \"update[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>"; 
   
    };

    
  };

   ?>



<!--Javascript -->
<script type="text/javascript"> 

var statusBtns = document.querySelectorAll('.status');
var deleteBtns = document.querySelectorAll('.delete');
var updateBtns = document.querySelectorAll('.update');


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




//Form edit
  updateBtns.forEach(item => {
    item.addEventListener('click',event => {
        let titleEdit = document.createElement('input');
        titleEdit.setAttribute('type','text');
        titleEdit.setAttribute('name',item.value);
        titleEdit.setAttribute('class','titleEdit');

      let newForm = document.createElement('form');
      newForm.setAttribute('name','editForm');
      newForm.setAttribute('class','editForm');
      newForm.setAttribute('method','POST');
      newForm.setAttribute('action','todo-edit.php');


        var form = item.parentNode; 

        form.insertBefore(newForm, item);
        newForm.appendChild(titleEdit);

        let submitButton = document.createElement('button');
        submitButton.setAttribute('class','submitButton');
        
        newForm.appendChild(submitButton);
        submitButton.addEventListener('click', event => {
        document.myform.submit();
        })
        
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