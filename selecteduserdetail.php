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
<?php
include 'config.php';


if(isset($_POST['cancel'])){
    echo '<script type="text/javascript">';
    echo 'alert("Your Transaction is cancelled")';
    echo '</script>';
}


if(isset($_POST['submit']))
{


    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['BALANCE'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['BALANCE']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['BALANCE'] - $amount;
                $sql = "UPDATE customers set BALANCE=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['BALANCE'] + $amount;
                $sql = "UPDATE customers set BALANCE=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['NAME'];
                $receiver = $sql2['NAME'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transaction.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
    	th{
        background: #3C1053FF;
        color: #FFB6C1;
      }
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
</head>

<body>
 


	<div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where ID=$sid";
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
                    
                    <th scope="col" class="text-center py-2">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                
                <tr>
                    <td class="text-center"><?php echo $rows['ID'] ?></td>
                    <td class="text-center"><?php echo $rows['NAME'] ?></td>
                    <td class="text-center"><?php echo $rows['EMAIL'] ?></td>
                    <td class="text-center"><?php echo $rows['BALANCE'] ?></td>
                </tr>
                
            </table>
        </div>
        <br>
        <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table table-dark table-striped" value="<?php echo $rows['ID'];?>" >
                
                    <?php echo $rows['NAME'] ;?> (Balance: 
                    <?php echo $rows['BALANCE'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="BALANCE" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            <br>
                <br>
            <button class="btn btn-danger" name="cancel " type="cancel" >Cancel Transaction</button>
            
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>