<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if both fields are filled out, attempts a query
        if ($_POST['title'] && $_POST['message']){
            CS50::query("INSERT INTO `posts` (`user_id`, `post_title`, `post`, `datetime`) VALUES (?,?,?,NOW())", $_SESSION["id"], $_POST['title'], $_POST['message']);
        }
        redirect("index.php");
    }
    else
    {
        // render form
        redirect("index.php");
    }

?>
