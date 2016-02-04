<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       $result = CS50::query("UPDATE `portfolios` SET `tagline` = ? WHERE user_id = ?", $_POST['tagline'], $_SESSION["id"]);
        if (!$result) {
            //This is in the event user never set tagline
            CS50::query("INSERT INTO `portfolios` (`user_id`, `tagline`) VALUES (?,?)", $_SESSION["id"], $_POST['tagline']);
        }
        redirect("index.php");
    }
    else
    {
        // render form
        redirect("index.php");
    }

?>
