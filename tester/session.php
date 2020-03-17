<?php
session_start();
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>huvudsida</title>
</head>
<body>

<?php
    //Kolla om du är inloggad
    if(){
        //Om inloggad
        echo "<h1>Du är inloggad</h1>";
        //Möjlighet att logga ut
        echo "<p><a href='logout.php'>Logga ut</a></p>";
    }else{
        //Om inte inloggad
        echo "<h1>Du är inte inloggad</h1>";
        //Möjlighet att logga in eller registrera sig
        echo "<p><a href='login.php'>Logga in</a></p>";
    }
?>
</body>
</html>