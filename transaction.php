<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>TRANSACTION HISTORY</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="table.css">
    <style type="text/css">
      th{
        background: #3C1053FF;
        color: #FFB6C1;
      }
      td{
        background: black;
      }
      </style>
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="style.css">

<style>
body {font-family: "Lato", sans-serif;}
h1 {text-align: center;}

.sidebar {
  height: 100%;
  width: 170px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #110;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; 
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 10px;}
}
</style>
</head>
<body>


  <div class="sidebar">
  <div class="link">
  <a href="index.php"><i class="fa fa-home" style="font-size:46px"></i>HOME</a>
  
  <br>
    <a href="transfer.php"><i class="fa fa-cc-paypal" style="font-size:46px"></i>TRANSFER MONEY</a>
  
  <br>
  <a href="transaction.php"><i class="fa fa-history" aria-hidden="true"style="font-size:46px"></i>TRANSACTION HISTORY</a>
  <br>
  </div>
    
  </div>
  
  
<div class="main">


 




</style>
<body style="background:white;">



	<div class="container">
        <h2 class="text-center pt-4" style="color:#3C1053FF;font-family:tahoma;font-size:24px;font-weight:bold">TRANSACTION HISTORY</h2>

       <br>
       <div class="table-responsive-sm">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="text-center">S NO</th>
                <th class="text-center">FROM</th>
                <th class="text-center">TO</th>
                <th class="text-center">AMOUNT TRANSFERRED</th>
                <th class="text-center">AT TIME</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td class="py-2"><?php echo $rows['sno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['amount']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>

        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>