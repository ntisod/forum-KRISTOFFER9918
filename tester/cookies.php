<?php

$cookies_name = "user"
$cookies_value = "Kristoffer"

setcookies($cookie_name,$cookie_value,time() + (86400 *30), "/");
?>

<html>
<body>

<?php
    if(!isset($_COOKIE[$cookie_name]))
       //om kakan inte existerar
       echo "kakan som heter '" . $cookie_name . "' finns inte.";
} else {
       //om kakan existerar
       echo "kakan som heter '". $cookie_name "' finns. ";
       echo "värdet är ". $cookie[$cookie_name];

}

?>


</body>
</html>