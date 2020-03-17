<?php
//Lösenord bör hämtas av formulär
$password = "1ösen¤Rd";

//kryptera lösenord
$hash = password_hash($password, PASSWORD_DEFAULT);

//färdigt lösenord bör sparas till databasen
echo $hashed;

//kolla om ett lösenord stämmer överens med det hashade lösenord från databasen
$db_pw = "";
$verified = password_verify($password,"");

//låt olika saker hända beroende på om man skrivit rätt lösenord eller inte