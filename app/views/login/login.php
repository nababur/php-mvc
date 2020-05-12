


 <div class="card ">
   <div class="card-header">
         <h3 class='text-center'><i class="fas fa-sign-in-alt mr-2"></i>Admin login</h3>
        </div>
        <div class="cad-body">

          <div id="flash-msg" style="width:600px; margin:0px auto">




          <?php

          if (isset($postErrors)) {
            echo '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
              foreach ($postErrors as $key => $value) {
                switch ($key) {


                  case 'email':
                    foreach ($value as $val) {
                      echo ' <strong>Email </strong>: '.$val;
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
           <?php

            $msg = Session::get('msg');
            if (!empty($msg)) {
              echo $msg;

            }

          ?>
          </div>



            <div style="width:600px; margin:0px auto" class="pt-3 pb-3">

               <form class="" action="<?php echo BASE_URL; ?>/login/loginAuthotication" method="post">
                   <div class="form-group">
                     <label for="email">Email address</label>
                     <input type="email" name="email"  class="form-control">
                   </div>
                   <div class="form-group">
                     <label for="password">Password</label>
                     <input type="password" name="password"  class="form-control">
                   </div>
                   <div class="form-group">
                     <button type="submit" name="login" class="btn btn-success">Login</button>
                   </div>


               </form>
          </div>


        </div>
      </div>
