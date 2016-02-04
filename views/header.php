<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <script type="text/JavaScript" arc="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

    <title>friendly</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/jumbotron.css" rel="stylesheet">
    
    <!-- https://jquery.com/ -->
    <script src="/js/jquery-1.11.3.min.js"></script>
    
     <!-- Javascript -->
    <script src="/js/scripts.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--navigation bar-->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
           <div class="col-lg-pull-2">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://ide50-h-ethan.cs50.io/index.php">
                <span class="brand">frndly</span></a>
          </div>
      </div>
      
      <!--search bar-->
      <form action="search.php" method="post">
                <div class="col-lg--push-8">
                  <div class="input-group nav-control">
                    <input type="text" class="form-control" placeholder="Search for..." name="name">
                    <span class="input-group-btn">
                      <button class="btn btn-custom-darken" type="submit">Go!</button>

                    <!-- Split button -->
                    <div class="btn-group">
                      <a href="https://ide50-h-ethan.cs50.io/index.php"><button type="button" class="btn btn-custom-darken">Home</button></a>
                        <button type="button" class="btn btn-custom-darken dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
            
                    <!--gets the number of unread messages-->
                    <?PHP
                    $messages = CS50::query("SELECT * FROM  `messages` WHERE `user_id` = ? AND  `read` = ?", $_SESSION["id"], -1); 
                    if ($messages){
                      $unread = count($messages);
                    } else {
                      $unread = 0;
                    }
                    ?>
            
                    <li><a href="#">Inbox <span class="badge"><?= $unread ?></span></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </div>
          </div><!--/.navbar-collapse -->
        </div>
      </span>
    </form>
  </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</nav>