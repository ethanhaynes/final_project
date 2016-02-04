<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //extracting the id of the recieving user
         foreach ($_POST['name'] as $key => $value){
            $data[] = $key;
            $data[] = $value;
        }
        
        //if it is read the number will be positive, negative otherwise
        $not_read = -1;
  
        // if both fields are filled out, attempts a query
        if ($_POST['title'] && $_POST['message']){
            CS50::query("INSERT INTO `messages`(`user_id`, `message`, `message_title`, `sender_id`, `read`) VALUES (?,?,?,?,?)", $data[0], $_POST['message'], $_POST['title'], $_SESSION["id"], $not_read);
        }
        redirect("index.php");
    }
    else
    {
        // render form
        redirect("index.php");
    }

?>
