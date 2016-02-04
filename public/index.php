<?php

    // configuration
    require("../includes/config.php");
    
     // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ($_POST['name']){
            // http://stackoverflow.com/questions/6435174/php-get-an-elements-id-after-submit
            foreach ($_POST['name'] as $key => $value){
                $data[] = $key;
                $data[] = $value;
            }
            CS50::query("INSERT INTO replies (`user_id`, `post_id`, `poster_id`, `reply`, `datetime`) VALUES (?,?,?,?,NOW())", $data[2],$data[0], $_SESSION["id"], $data[1]);
        }
    }
    
    // get user's portfolio
    $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    if ($rows === false)
    {
        apologize("Can't find your profile.");
    }
    $username = $rows[0]['username'];
    
     // get user's portfolio
    $portfolio = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
    if ($portfolio === false)
    {
        apologize("Can't find your profile.");
    }
    if ($portfolio) {
        $tagline = $portfolio[0]['tagline'];
    } else {
        $tagline = null;
    }
    
    // Gets the users posts from the database
    $posts = CS50::query("SELECT * FROM posts WHERE user_id = ?", $_SESSION["id"]);
    if ($posts === false)
    {
        apologize("Can't find your profile.");
    }
    
    //checks if $posts is empty
    if ($posts){
        $num_post = count($posts);
        $post = $posts[0]['post'];
        $post_title = $posts[0]['post_title'];
    } else {
        $num_post = 0;
        $post = null;
        $post_title = null;
    }
    
    // Gets the users replies from the database
    $replies = CS50::query("SELECT * FROM replies WHERE user_id = ?", $_SESSION["id"]);
    if ($replies === false)
    {
        apologize("Can't find your profile.");
    }
    $reply = $replies;
    
    //checks if $replies is empty
    if ($replies) {
        $post_id = $replies[0]['post_id'];
        $reply_id = $replies[0]['reply_id'];
        $poster_id = $replies[0]['poster_id'];
    } else {
        $post_id = null;
        $reply_id = null;
        $poster_id = null;
    }
    
    
    // render portfolio
    render("portfolio.php", ["username" => $username, "tagline" => $tagline, "post" => $post, "post_title" => $post_title, "reply" => $reply, "post_id" => $post_id, "reply_id" => $reply_id, "poster_id" => $poster_id, "posts" => $posts, "num_post" => $num_post]);
   
?>