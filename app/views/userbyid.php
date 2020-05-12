

 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>Edit user</h3>
        </div>
        <div class="cad-body">



          <div id="flash-msg" style="width:600px; margin:0px auto">




          <?php

          if (isset($postErrors)) {
            echo '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
              foreach ($postErrors as $key => $value) {
                switch ($key) {

                  case 'name':
                    foreach ($value as $val) {
                      echo ' <strong>Name </strong>: '.$val;
                    }
                    break;

                  case 'email':
                    foreach ($value as $val) {
                      echo ' <strong>Email </strong>: '.$val;
                    }
                    break;

                  case 'information':
                    foreach ($value as $val) {
                      echo ' <strong>About user information </strong>: '.$val;
                    }
                    break;


                  default:
                    // code...
                    break;
                }
              }
              echo "</div>";
          }

           ?>
           <?php
             if (isset($msg)) {
               echo $msg;
             }
            ?>
          </div>

            <div style="width:600px; margin:0px auto">
              <?php

                if ($userbyid) {



               ?>
            <form class="" action="<?php echo BASE_URL; ?>/Admin/updateUser/<?php echo $userbyid['id']; ?>" method="post">
                <div class="form-group pt-3">
                  <label for="name">Your name</label>
                  <input type="text" name="name" value="<?php echo $userbyid['name']; ?>"  class="form-control">
                  <input type="hidden" name="id" value="<?php echo $userbyid['id']; ?>"  class="form-control">
                </div>

                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email"  value="<?php echo $userbyid['email']; ?>"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">About user</label>
                  <textarea name="information" rows="4" class="form-control" cols="80"><?php echo $userbyid['information']; ?></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" name="edituser" class="btn btn-success">Update user</button>
                  <a class="btn btn-info" href="<?php echo BASE_URL; ?>/Admin/userlist">Back</a>
                </div>

              <?php }else{      header("Location:".BASE_URL."/Admin");} ?>
            </form>
          </div>


        </div>
      </div>
