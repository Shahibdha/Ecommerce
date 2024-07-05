<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["value"])) {
        
        $_SESSION["amount"] = $_POST["value"];
       
        echo "Value saved to session!";
    } else {
        
        echo "No value received!";
        http_response_code(400); 
    }
} else {
    
    echo "Invalid request method!";
    http_response_code(405); 
}
?>