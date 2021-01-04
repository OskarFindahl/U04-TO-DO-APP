<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>



<!-- Show and edit tasks -->
<?php
function showUserTodoView($taskData){
   
    ?>


    <form class="AddTaskForm" method="POST" action="create-todo.php">
        <input class="inputTitle" type="text" name="title"  placeholder="Title" required >
        <input class="inputDescription" type="text" name="text" placeholder="Description" required>
        <button class="AddTaskButton" type="submit" >Add</button>
    </form>


    <div class="BtnTitles">
        <h2 class="BtnTitleEdit">Edit</h2>
        <h2 class="BtnTitleDelete">Delete</h2>
        <h2 class="BtnTitleDone">Done</h2>
        <button class="deleteAllDone">Delete all done</button> 
        <button class="selectAll" >All done!</button>
    </div>



    <ul class="list">
    <form  name="myform" class="myform" method="POST" action="todo-checked.php">

        <?php
        foreach($taskData as $data)
        {

            if ($data['done'] == 0) {

                echo "<li class=\"listItem\">" . 
                "<p class=\"title\">" .  $data['title'] . "</p>" . 
                "<p class=\"description\">" .  $data['text'] . "</p>" . 
                "<input class=\"status\" type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . ">" . 
                "<input class=\"delete\"  type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . ">" . 
                "<input class=\"update\"  type=\"checkbox\" name = \"update[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>"; 

            } else if ($data['done']== 1) {

                echo "<li class=\"listItem\">" . 
                "<p class=\"title\">" .  $data['title'] . "</p>" . 
                "<p class=\"description\">" .  $data['text'] . "</p>" .  
                "<input class=\"status\" type=\"checkbox\" name = \"status[]\" value= " . "\"" . $data['task_id'] . "\"" . "checked>" .
                "<input class=\"delete\" type=\"checkbox\" name = \"remove[]\" value= " . "\"" . $data['task_id'] . "\"" . ">" . 
                "<input class=\"update\"  type=\"checkbox\" name = \"update[]\" value= " . "\"" . $data['task_id'] . "\"" . "> </li>"; 
   
            };
        };

   ?>

        <script src="myScript.js"></script>



<?php
    }
?>


        </form>
        </ul>

    </body>
</html>