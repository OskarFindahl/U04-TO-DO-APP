<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
    
</body>
</html>