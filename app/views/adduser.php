

 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>Add new user</h3>
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

                  case 'password':
                    foreach ($value as $val) {
                      echo '<strong>Password </strong>: '.$val;
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

          </div>



            <div style="width:600px; margin:0px auto">
              <?php
                if (isset($msg)) {
                  echo $msg;
                }
               ?>
            <form class="" action="<?php echo BASE_URL; ?>/Admin/insertUser" method="post">
                <div class="form-group pt-3">
                  <label for="name">Your name</label>
                  <input type="text" name="name"  class="form-control">
                </div>

                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email"  class="form-control">
                </div>

                <div class="form-group">
                  <label for="email">About user</label>
                  <textarea name="information" rows="4" class="form-control" cols="80"></textarea>
                </div>
                <div class="form-group">
                  <label for="email">Password</label>
                  <input type="password" name="password"  class="form-control">
                </div>

                <div class="form-group">
                  <button type="submit" name="addUser" class="btn btn-success">Add user</button>
                </div>


            </form>
          </div>


        </div>
      </div>
