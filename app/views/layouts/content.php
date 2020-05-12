
<div class="card ">
  <div class="card-header">
    <h4><i class="fas fa-users mr-2"></i>All user data <span class="float-right">Welcome! <strong>
      <span class="badge badge-lg badge-secondary text-white">
        <?php echo Session::get('name'); ?>
      </span>

      </strong></span></h4>
  </div>
  <div class="card-body pr-2 pl-2">
    <?php

      if (!empty($_GET['msg'])) {
        $msg = unserialize(urldecode($_GET['msg']));
        foreach ($msg as $key => $value) {
          echo $value;
        }
      }

     ?>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th  class="text-center">SL</th>
                <th  class="text-center">Student name</th>
                <th  class="text-center">Student email</th>
                <th width="30%" class="text-center">Student bio</th>
                <th  class="text-center">Action</th>

              </tr>
            </thead>
            <tbody>




<?php
if (!empty($user)) {

// print_r($user);
//
// exit();

$i = 0;
foreach ($user as $value ) {
 $i++;

 ?>
            <tr class="text-center">

                  <td><?php echo $i; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td><?php $text =  $value['information'];
                      if (strlen($text) > 50) {
                        echo $text = substr($text, 0 , 50);
                      }
                   ?></td>

                  <td>

                    <a class="btn btn-info btn-sm " href="<?php echo BASE_URL; ?>/Admin/userbyid/<?php echo $value['id']; ?>">Edit</a>
                    <?php if (Session::get("id") == $value['id']) {
                     ?>
                     <a onclick="return confirm('You can't Delete')" class="btn btn-danger btn-sm " href="#">No action</a>
                   <?php }else{ ?>
                      <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger btn-sm " href="<?php echo BASE_URL; ?>/Admin/deleteUser/<?php echo $value['id']; ?>">Delete</a>
                   <?php } ?>



                  </td>


                </tr>
<?php  }}?>


            </tbody>

        </table>


  </div>
</div>
