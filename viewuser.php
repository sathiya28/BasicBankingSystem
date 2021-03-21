<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>CUSTOMER INFORMATION</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="table.css">
    <style type="text/css">
    th{
      background: #3C1053FF;
      color: #FFB6C1;
    }
    td{
      background: black;
      text-align:center;
    }
    

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
    </style>
</head>

<body style="background: white;">



	<div class="container">
        <h2 class="text-center pt-4" style="color: #3C1053FF;">CUSTOMER INFORMATION</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-dark table-striped">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">NAME</th>
                    <th class="text-center">EMAIL</th>
                    <th class="text-center">BALANCE</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['ID'] ?></td>
                    <td class="py-2"><?php echo $rows['NAME'] ?></td>
                    <td class="py-2"><?php echo $rows['EMAIL'] ?></td>
                    <td class="py-2"><?php echo $rows['BALANCE'] ?></td>
                </tr>
            </table>
        </div>
  </body>