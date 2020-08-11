<!doctype html>
<html class="no-js h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php date_default_timezone_set('Asia/Bangkok'); ?>
  <?php header('Content-Type: text/html; charset=utf-8'); ?>

  <title>FooDex</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
  <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">



  <style>
    /* @import url('https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap');

        body {
            font-family: 'Bai Jamjuree', sans-serif;
            font-size: 16px;
        } */
  </style>


  <style>
    @import url('https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap');
  </style>
  <style>
    body {
      font-family: 'Bai Jamjuree', sans-serif;
      font-size: 16px;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {

      font-family: 'Bai Jamjuree', sans-serif;

    }

    div {
      font-family: 'Bai Jamjuree', sans-serif;
      font-size: 16px;
    }
  </style>



</head>

<body>
  <div>
    <!-- HEADER -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">FooDex</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
<?php if(@$_SESSION['user_id'] != "") {  ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo BASE_URL; ?>dashboard">Home <span class="sr-only">(current)</span></a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>main">Reports</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              กำหนดค่าเริ่มต้น
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/index/cards">ข้อมูลบัตร</a>
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/index/users">ข้อมูลผู้ใช้งาน</a>
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/index/shops">ข้อมูลร้านค้า</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>


<?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>login/logout">logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- HEADER -->
  </div>

  <div style="width:96%; margin:auto;">
    <p> </p>