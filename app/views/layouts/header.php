<?php
include_once "config/config.php";

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin - User management</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/style.css">
  </head>
  <body>



    <?php

    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
      Session::destroy();
    }

     ?>

    <div class="container">

      <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>"><i class="fas fa-home mr-2"></i>Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">

            <?php if (Session::get("login") == true) {
             ?>

              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>/Admin/addNewUser"><i class="fas fa-user-plus mr-2"></i>Add new user </span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>/Admin/userlist"><i class="fas fa-user-plus mr-2"></i>User list </span></a>
              </li>


            <li class="nav-item">
              <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </li>

          <?php }else{ ?>

              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL ?>/login"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
              </li>
            <?php } ?>



          </ul>

        </div>
      </nav>
