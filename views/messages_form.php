<?PHP 
$user_name = CS50::query("SELECT id FROM users WHERE username = ?", $username);

?>

<div class="container container-fluid" style="max-width: 600px">
    <div class="well">
        <div class="input-group" style="margin-bottom: 10px">
              <span class="input-group-addon" id="basic-addon1"><button type="submit">@<?= $username ?></button></span>
              <input type="text" class="form-control" name="title" placeholder="title..." aria-describedby="basic-addon1">
              <input type="text" class="form-control" name="message" placeholder="message..." aria-describedby="basic-addon1">
              <input type="hidden" name='name[<?php echo $user_name[0]['id'] ?>]'>
          </div>
    </div>
</div>
