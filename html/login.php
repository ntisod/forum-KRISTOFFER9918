<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Userdata</title>
    <link rel="stylesheet" type="text/css" href="userdata.css">
    <style>
      body{
        background-color: yellow;
        color: blue;
      }
    </style>
</head>

<body>
<!--body ng-controller="RegisterCtrl" ng-app="myApp"-->

<?php

  // define variables and set to empty values
  $emailErr = $pwErr = $websiteErr = "";
  $email = $pw = $comment = $website = "";
  $err = false;

  


  //Kontroll om man kommer till sidan för första gången
  if(!$_SERVER["REQUEST_METHOD"]=="POST"){  
    //Visa tomt formulär
      
      require("../templates/userdata.php");
  } else{ //Annars
      echo "<p>Inte första gången</p>";
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $err=true;
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $err=true;
        }
        if(test_if_email_exists($email)){
          $emailErr = "E-mail does already exist. ";
          $err=true;
        }
      }

      if (empty($_POST["password"])) {
        $pwErr = "password is required";
        $err=true;
      } else {
        $pw = test_input($_POST["password"]);
        //kryptera lösenord
        $hashed = password_hash($pw, PASSWORD_DEFAULT);
      }
      
      

      //Kontroll just nu. Ska tas bort
      echo    ($email . "<br>" . $pw . "<br>" );

      //Om formuläret är rätt ifyllt
      if(!$err){
        //Spara till db
        require("../includes/settings.php");

        echo "Server: " . $servername;
        echo "Server: " . $dbname;
        echo "Server: " . $username;
        echo "Server: " . $servername;

        /*  
        //Spara till fil
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        $txt = "John Doe\n";
        fwrite($myfile, $txt);
        $txt = "Jane Doe\n";
        fwrite($myfile, $txt);
        fclose($myfile);*/
        
        //Anslut till databasen. 





        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

          // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Skapa SQL-kommando
            $sql = "INSERT INTO users (email, regdate, password) VALUES ('$email', NOW(), '$hashed')";
            // use exec() because no results are returned
            $conn->exec($sql);
          //Visa välkomstmeddelande
          echo "Jippi!";
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        
        $conn = null;




        //Skapa session
      
        

      }else{      //Annars
        //Visa formulär med värden ifyllda 
        require("../templates/loginform.php");
      }

  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function test_if_email_exists($email):bool{
    //Hämta hemliga värden
    require("../includes/settings.php");
    
    //Testa om det går att ansluta till databasen
    try {
        //Skapa anslutningsobjekt
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Förbered SQL-kommando
        $sql = "SELECT email FROM users WHERE email='$email'  LIMIT 1";
        $stmt = $conn->prepare($sql);
        //Skicka frågan till databasen
        $stmt->execute();

        // Ta emot resultatet från databasen
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $row1 = $stmt->fetch();
        //Stäng anslutningen
        $conn = null;

        if(empty($row1)){
            return false;
        }
        else{
            return true;
        }
    }
    catch(PDOException $e) {
        //Om något i anslutningen går fel
        echo "Error: " . $e->getMessage();
    }
}


?>


</body>



</html>

