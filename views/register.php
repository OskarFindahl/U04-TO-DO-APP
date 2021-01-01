<?php

function register(){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST" action="create-user.php">
Användarnamn: <input type="text" name="username" >
Lösenord: <input type="password" name="password" >
<button type="submit">Done</button>
</form>


    
</body>
</html>

<?php
}
?>