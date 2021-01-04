<?php

function register(){
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <title>Register</title>
    </head>
    <body>

        <form class="registerForm" method="POST" action="create-user.php">
            <input class="username" type="text" name="username" placeholder="Username" required>
            <input class="password" type="password" name="password" placeholder="Password" required>
            <button class="registerSubmitBtn" type="submit">Done</button>
        </form>


    
    </body>
    </html>

<?php
}
?>