<?php

    // configuration
    require("../includes/config.php"); 

    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = CS50::query("SELECT id FROM users WHERE username = ?", $_POST["name"]);
        if ($user_id){
            $u_id = $user_id[0]['id'];
        } else {
            redirect("index.php");
        }
        
    // http://stackoverflow.com/questions/11405493/get-everything-after-a-certain-character
    // if link was clicked
    } else if (($user_url_q = strpos($_SERVER["QUERY_STRING"], "=")) !== FALSE) { 
        $url_q = substr($_SERVER["QUERY_STRING"], $user_url_q+1);
        $user_id = CS50::query("SELECT id FROM users WHERE username = ?", $url_q);
        $u_id = $user_id[0]['id'];
    } else {
        redirect("index.php");
    }
    // get user's portfolio
    $rows = CS50::query("SELECT * FROM users WHERE id = ?", $u_id);
    if ($rows === false)
    {
        apologize("Can't find your profile.");
    }
    $username = $rows[0]['username'];
    
     // get user's portfolio
    $portfolio = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $u_id);
    if ($portfolio === false)
    {
        apologize("Can't find your profile.");
    }
    if ($portfolio) {
        $tagline = $portfolio[0]['tagline'];
    } else {
        $tagline = null;
    }
    
    $posts = CS50::query("SELECT * FROM posts WHERE user_id = ?", $u_id);
    if ($posts === false)
    {
        apologize("Can't find your profile.");
    }
    if ($posts){
        $num_post = count($posts);
        $post = $posts[0]['post'];
        $post_title = $posts[0]['post_title'];
    } else {
        $num_post = 0;
        $post = null;
        $post_title = null;
    }
    
    $replies = CS50::query("SELECT * FROM replies WHERE user_id = ?", $u_id);
    if ($replies === false)
    {
        apologize("Can't find your profile.");
    }
    $reply = $replies;
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
