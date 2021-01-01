<?php

include(__DIR__ . '/views/register.php');


register();




//insert i db: todolist tabell: todos
//CRUD - create read update delete
//Insert Select Update 



// CRUD - create read update delete
// MVC- model view controller

// MVC exempel när en användare refistrerar sig op en html sida. 
// 1. användaren skickar användarnamn och lösenord till servern. localhost/create-user
// 2. router i index.php tar emot requestet. 
// 3. den skickar vidare till en controller
// 4. controllern anropar model create user 
// 5. och den ger tillbaka ett svar till användaren genom att anropa en view. 

