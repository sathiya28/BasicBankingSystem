

<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=transaction', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM customers ');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="table.css">

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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>TRANSFER MONEY</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">

      button:hover{
        background-color: black;
        color: white;
        transition: 0.2s;
      }
      th{
        background: #3C1053FF;
        color: #FFB6C1;
      }
      td{
        background: white;
        text-align:center;
      }
    </style>
</head>

<body style="background:white;">
<?php
    include 'config.php';
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn,$sql);
?>


<div class="container">
        <h2 class="text-center pt-4" style="color: #3C1053FF;;font-family:tahoma;font-size:24px;font-weight:bold">CUSTOMERS</h2>
        <br>
        <div class="bg-img">
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-2">ID</th>
                            <th scope="col" class="text-center py-2">NAME</th>
                            <th scope="col" class="text-center py-2">E-MAIL</th>
                            <th scope="col" class="text-center py-2">BALANCE</th>
                            <th scope="col" class="text-center py-2">OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="table-dark"><?php echo $rows['ID'] ?></td>
                        <td class="table-dark"><?php echo $rows['NAME']?></td>
                        <td class="table-dark"><?php echo $rows['EMAIL']?></td>
                        <td class="table-dark"><?php echo $rows['BALANCE']?></td>
                        <td class="table-dark">
                        <a href="viewuser.php?id= <?php echo $rows['ID'] ;?>">
                        <button type="button" class="btn btn-info">View</button></a>
                        <a href="selecteduserdetail.php?id= <?php echo $rows['ID'] ;?>"> <button type="button" class="btn btn-success">Transfer</button></a>
                        </td></tr>   
                <?php
                    }
                ?>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
         </div>
                  </div>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>