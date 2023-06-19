<?php

require("confg.php");
session_start();

$food_name = $_GET["name"];
$email = $_SESSION["email"];

if($email){
  $query = "SELECT * FROM cart WHERE email='$email' AND food_name='$food_name'";
  $run = mysqli_query($conn, $query);
  $quantity = 1;
  if($result = mysqli_num_rows($run) == 1){
    $data = mysqli_fetch_array($run);
    $quantity += $data["quantity"];
    $query1 = "UPDATE `cart` SET quantity='$quantity' WHERE email='$email' AND food_name='$food_name'";
  }else{
    $query1 = "INSERT INTO `cart` (`email`, `food_name`, `quantity`) VALUES ('$email', '$food_name', '$quantity')";
  }

  if(mysqli_query($conn, $query1)){
    ?>
    <script>
        alert('ITEM ADDED');
        window.open('customer.php');
    </script>
    <?php
  }else{?>
    <script>
        alert('ERROR!!!!, ITEM NOT ADDED.');
        window.open('customer.php');
    </script><?php
  }

}else{?>
  <script>
    alert('SESSOIN EXEPIRED!!!.');
    window.open('login.html');
  </script>
  <?php
}

?>