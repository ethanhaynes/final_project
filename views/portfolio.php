    <!-- Main jumbotron for a primary marketing message or call to action -->

      <div class="container">
        <div class="row">

        <!-- left side of the page -->
        <div class="col-md-3 center">
          
          
            <div class="body_display">
              <div class="well" style="margin: 10px; overflow: hidden; float:left;"><img src="http://bootstrap-themes.github.io/application/assets/img/instagram_6.jpg" class="img-style"></img>
                <div class="name" style="z-index: 2; margin-top: -105px;"><h3 class="name" style="color: white"><?= $username ?></h3></div>
            
            <div class="circle"><img src="http://bootstrap-themes.github.io/application/assets/img/instagram_5.jpg" class="img"></img></div>
              <span class="stats"><a href="#"> edit </a></span>
            </div>
            <h3 class="stats"><?= $tagline ?><a href="#"> 
            
            <form action="edit_tag.php" method="post">
                <div class="dropdown">
                  
                    <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:2px">
                      <span> edit</span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                        <div class="input-group" style="margin-bottom: 10px">
                            <span class="input-group-addon" id="basic-addon1"><button type="submit">@</button></span>
                            <input type="text" class="form-control" name = 'tagline' placeholder="message..." aria-describedby="basic-addon1">
                        </div>
                    </ul>
                </div>
                </form>
                </a></h3>
             
            
            <!--defining spacing for table-->
            <!--http://www.htmlgoodies.com/tutorials/buttons/article.php/3478901-->
            <TABLE BORDER="0" ALIGN=center>
              <TR>
              <TD><a class="btn btn-custom-darken btn-xs icons_size btn-lines" href="#" role="button"><h4 class="glyphicon glyphicon glyphicon-plus"></h4></a></TD>

              <TD><form action="messages.php" method="post">
                <!-- Medium modal -->
              <button type="button" class="btn btn-primary btn btn-custom-darken btn-xs icons_size btn-lines" data-toggle="modal" data-target=".bs-example-modal-md"><h4 class="glyphicon glyphicon-comment"></h4></button>

              <div class="modal bs-example-modal-md fade btn-custom-darken btn-xs icons_size btn-lines" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <?PHP include("messages_form.php") ?>
                  </div>
                </div>
              </div>
              </form></TD>
              <TD><a class="btn btn-custom-darken btn-xs icons_size btn-lines" href="#" role="button"><h4 class="glyphicon glyphicon-heart-empty"></h4></a></TD>
            </TR>
            </TABLE>
           
            </div>
            
            <div class="body_display">
              <TABLE BORDER="0" ALIGN=center>
              <TR>
                <TD><a class="stats" style="list-style: none">Posts<li><?= $num_post ?></li></a></TD>
                <TD><a class="stats" style="list-style: none">Followers<li>102</li></a></TD>
                <TD><a class="stats" style="list-style: none">Following<li>102</li></a></TD>
              </TR>
              </TABLE>
              <p><a class="btn btn-custom-darken btn-xs" href="#" role="button">View details &raquo;</a></p>
          </div>
          
          <!--interests section-->
          <div class="body_display" style="overflow: hidden">
              <?PHP include("edit_interests_form.php") ?>
          </div>

          
          
        </div>

      <!-- Center of the page -->
      <div class="col-md-5 btn-group-xs body_display blog">
        <form action="post.php" method="post">
          <div class="input-group" style="margin-bottom: 10px">
              <span class="input-group-addon" id="basic-addon1"><button type="submit">@<?= $username ?></button></span>
              <input type="text" class="form-control" name="title" placeholder="title..." aria-describedby="basic-addon1">
              <input type="text" class="form-control" name="message" placeholder="message..." aria-describedby="basic-addon1">
          </div>
        </form>
        
          
<?PHP if ($posts != false){
    for ($i = count($posts) - 1; $i >= 0; $i--){
    $user_name = CS50::query("SELECT id FROM users WHERE username = ?", $username);
    ?>
        <div class="panel-group" id="accordion">
          <div class="panel panel-default" id="panel<?= $i ?>" >
            <div class="panel-heading">
              <h4 class="panel-title" style="text-align: left">
                <a data-toggle="collapse" data-target="#collapse<?= $i ?>"
                href="#collapseOne"><?= $posts[$i]["post_title"] ?></a>
              </h4>
            </div>
          <div id="collapse<?= $i ?>" class="panel-collapse collapse in">
        <div class="panel-body">
          <ul class="well well-sm text-justify" style="list-style: none">
            <a href="search.php?name=<?= $username ?>">@<?= $username ?></a> <?= $posts[$i]['post'] ?>
                <!-- reply button -->
                <form action="index.php" method="post">
                <div class="dropup">
                  <div class="btn-group-xs">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="glyphicon glyphicon-share-alt" style="color: black"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                        <div class="input-group" style="margin-bottom: 10px">
                            <span class="input-group-addon" id="basic-addon1"><button type="submit">@</button></span>
                            <input type="text" class="form-control" name = 'name[<?php echo $i+1 ?>]' placeholder="message..." aria-describedby="basic-addon1">
                            <input type="hidden" name='name[<?php echo $user_name[0]['id'] ?>]'>
                        </div>
                    </ul>
                  </div>
                </div>
                </form>
                  <!--   -->
    <?PHP
        if ($reply != false){
            for ($j = 0; $j < count($reply); $j++){
                if ($reply[$j]['post_id'] == 1+$i){
                      ?>
                      
                    <li class="well well-sm text-justify reply" style="overflow: hidden; width: auto">
                    <?php $replyname = CS50::query("SELECT username FROM users WHERE id = ?", $reply[$j]['poster_id']) ?>
                    <a href="search.php?name=<?= $replyname[0]['username'] ?>">@<?= $replyname[0]['username'] ?></a> <?= $reply[$j]['reply'] ?>
  
                  <?PHP
                }
            }
        }
    ?>
        </ul>  
        </div>
        </div>

        </div>
        </div>
    <?PHP
    }
}
?>

<a>load more...</a>
      </div>
      
      

      <!-- Right side of the page -->
        <div class="col-md-3">
          <div class="alert alert-info alert-dismissible" role="alert" style="margin-left: 20px; margin-top: 20px; margin-bottom: -10px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Heads Up!</strong> More stuff to come!
          </div>
          
          <div class="body_display center" style="text-align: center; margin-left: 20px; margin-top: 20px; margin-bottom: -10px">
            <strong class="alert-info" style="background-color: transparent;">Hey there!</strong> <span class="alert-info" style="background-color: transparent">Here are some people we think you'd like</span>
            <TABLE BORDER="0" ALIGN=center style="text-align:center">
              <TR>
                <TD><div class="circle" style="height: 50px; width: 50px; margin: 2px;"><img src="http://bootstrap-themes.github.io/application/assets/img/instagram_5.jpg" class="img" style="height: 60px; width: 60px;"></img></div><a class="btn-custom-darken btn-xs icons_size btn-lines">bob</a></TD>
                <TD><div class="circle" style="height: 50px; width: 50px; margin: 2px;"><img src="http://bootstrap-themes.github.io/application/assets/img/instagram_5.jpg" class="img" style="height: 60px; width: 60px;"></img></div><a class="btn-custom-darken btn-xs icons_size btn-lines">bob</a></TD>
                <TD><div class="circle" style="height: 50px; width: 50px; margin: 2px;"><img src="http://bootstrap-themes.github.io/application/assets/img/instagram_5.jpg" class="img" style="height: 60px; width: 60px;"></img></div><a class="btn-custom-darken btn-xs icons_size btn-lines">bob</a></TD>
              </TR>
              <TR>
                <TD><div class="circle" style="height: 50px; width: 50px; margin: 2px;"><img src="http://bootstrap-themes.github.io/application/assets/img/instagram_5.jpg" class="img" style="height: 60px; width: 60px;"></img></div><a class="btn-custom-darken btn-xs icons_size btn-lines">bob</a></TD>
                <TD><div class="circle" style="height: 50px; width: 50px; margin: 2px;"><img src="http://bootstrap-themes.github.io/application/assets/img/instagram_5.jpg" class="img" style="height: 60px; width: 60px;"></img></div><a class="btn-custom-darken btn-xs icons_size btn-lines">bob</a></TD>
                <TD><div class="circle" style="height: 50px; width: 50px; margin: 2px;"><img src="http://bootstrap-themes.github.io/application/assets/img/instagram_5.jpg" class="img" style="height: 60px; width: 60px;"></img></div><a class="btn-custom-darken btn-xs icons_size btn-lines">bob</a></TD>
              </TR>
              </TABLE>
          </div>
          
          <div class="body_display center" style="text-align:justify">
          <div><h4 style="border:solid transparent">Advertisements here</h4>
            <p style="border:solid transparent"><a>www.google.com/ads</a><br />
            1(800)111-1111<br />
            professionals doing stuff for money<br />
            $5000 cash. Call now</p>
          </div>
          <div><h4 style="border:solid transparent">Advertisements here</h4>
            <p style="border:solid transparent"><a>www.google.com/ads</a><br />
            1(800)111-1111<br />
            professionals doing stuff for money<br />
            $5000 cash. Call now</p>
          </div>
          <div><h4 style="border:solid transparent">Advertisements here</h4>
            <p style="border:solid transparent"><a>www.google.com/ads</a><br />
            1(800)111-1111<br />
            professionals doing stuff for money<br />
            $5000 cash. Call now</p>
          </div>
          <div><h4 style="border:solid transparent">Advertisements here</h4>
            <p style="border:solid transparent"><a>www.google/ads</a><br />
            1(800)111-1111<br />
            professionals doing stuff for money<br />
            $5000 cash. Call now</p>
          </div>

          </div>
      </div>
    </div>
    </div>

 
