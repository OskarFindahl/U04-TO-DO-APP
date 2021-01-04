<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>



<!-- Show and edit tasks -->
<?php
function showUserTodoView($taskData){
   
?>


<form class="AddTaskForm" method="POST" action="create-todo.php">
<input class="inputTitle" type="text" name="title" value="Title" >
<input class="inputDescription" type="text" name="text" value="Description">
<button class="AddTaskButton" type="submit" >Add</button>
</form>


<div class="BtnTitles">
<h2 class="BtnTitleEdit">Edit</h2>
<h2 class="BtnTitleDelete">Delete</h2>
<h2 class="BtnTitleDone">Done</h2>
</div>



<ul class="list">

<form  name="myform" class="myform" method="POST" action="todo-checked.php">

  <?php
  foreach($taskData as $data){

    if ($data['done'] == 0){

     echo "<li class=\"listItem\">" . 
    "<p class=\"title\">" .  $data['title'] . "</p>" . 
    "<p class=\"description\">" .  $data['text'] . "</p>" . 
    "<input class=\"status\" type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . ">" . 
    "<input class=\"delete\"  type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . ">" . 
    "<input class=\"update\"  type=\"checkbox\" name = \"update[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>"; 
    

  }

  else if ($data['done']== 1){

    echo "<li class=\"listItem\">" . 
    "<p class=\"title\">" .  $data['title'] . "</p>" . 
    "<p class=\"description\">" .  $data['text'] . "</p>" .  
   "<input class=\"status\" type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "checked>" .
   "<input class=\"delete\" type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . ">" . 
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
      

//Create new node Elements for edit
      let newForm = document.createElement('form');
      newForm.setAttribute('name','editForm');
      newForm.setAttribute('class','editForm');
      newForm.setAttribute('method','POST');
      newForm.setAttribute('action','todo-edit.php');

      let titleEdit = document.createElement('input');
        titleEdit.setAttribute('type','text');
        titleEdit.setAttribute('name',item.value);
        titleEdit.setAttribute('class','title');

     let descriptionEdit = document.createElement('input');
        descriptionEdit.setAttribute('type','text');
        descriptionEdit.setAttribute('name','description');
        descriptionEdit.setAttribute('class','description');

    let submitButton = document.createElement('button');
        submitButton.setAttribute('class','submitButton');
        submitButton.innerHTML = "Submit";

        var form = item.parentNode; 
        form.children[0].style.display = "none";
        form.children[1].style.display = "none";
        form.children[2].style.display = "none";
        form.children[3].style.display = "none";
        form.children[4].style.display = "none";

        

        form.insertBefore(newForm, item);

  

        form.appendChild(titleEdit);


        // form.insertBefore(titleEdit, form.children[0]);
        // form.insertBefore(descriptionEdit, form.children[1]);
        // form.insertBefore(submitButton, form.children[2]);

        newForm.appendChild(titleEdit);
        newForm.appendChild(descriptionEdit);
        newForm.appendChild(submitButton);

       
        submitButton.addEventListener('click', event => {
        document.myform.submit();
        document.querySelector('.editForm');
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