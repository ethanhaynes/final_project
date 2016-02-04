<?PHP 
    // makes sure that the interests of the profile owner are generated, not
    // the session id owner
    $id = CS50::query("SELECT id FROM users WHERE username = ?", $username);
    
    //grabs an array of the interests from MySQL
    $interests = CS50::query("SELECT * FROM `interests` WHERE `user_id` = ?", $id[0]['id']);
?>

    <!--Outter table for interests-->
    <TABLE BORDER="0" ALIGN=center>
        <strong class="stats" style="background-color: transparent">Interests</strong>
            <TR>
            <?PHP if ($interests){
            for ($i = count($interests) - 1; $i >= 0; $i--){ ?>
                
                <!--user interests-->
                <TD class="stats"><a href="#" style="border: solid transparent"> <?= $interests[$i]['interest'] ?> </a></TD>
                <?PHP
                }
            }
            ?>
        </TR>
    </TABLE>
              
    <!--toggle switch to add new interests-->
    <h3 class="stats"><a href="#"> 
            <form action="edit_interests.php" method="post">
                <div class="dropup">
                    <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:2px">
                      <span> add</span>
                          <span class="sr-only">Toggle Dropdown</span>
                    </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu4" style="postion: absolute">
                            <div class="input-group" style="margin-bottom: 10px">
                                <span class="input-group-addon" id="basic-addon1"><button type="submit">@</button></span>
                                <input type="text" class="form-control" name = 'interest' placeholder="message..." aria-describedby="basic-addon1">
                            </div>
                        </ul>
                    </div>
                </form>
        </a></h3>