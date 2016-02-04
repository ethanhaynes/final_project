<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ($_POST['interest']) {
            //This is to add an interest to the database
            CS50::query("INSERT INTO `interests` (`user_id`, `interest`) VALUES (?,?)", $_SESSION["id"], $_POST['interest']);
        }
        redirect("index.php");
    }
    else
    {
        // render form
        redirect("index.php");
    }

?>

