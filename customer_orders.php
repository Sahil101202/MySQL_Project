<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PROFILE PAGE</title>
        <link rel="stylesheet" href="customer.css">
    </head>
    <body>
        <div class="container">
            <hr>
            <h1 align="center">welcome to online food ordering platform</h1>
            <hr>
            <nav class="pages">
                <a href="customer.php" class="pages-link">BACK</a>
                <a href="delete_user.php" class="pages-link">DELETE ACCOUNT</a>
                <a href="customer_orders.php" class="pages-link">CART</a>
                <a href="logout.php" class="pages-link">LOGOUT</a>
            </nav>
            <hr>
            <?php

            require("confg.php");
            session_start();

            $email = $_SESSION["email"];

            if($email){
              $query = "SELECT * FROM cart WHERE email='$email'";
              $run = mysqli_query($conn, $query);

              if($result = mysqli_num_rows($run) > 0){

                echo "<table border='1' class='tb'>
                <tr>
                <th>FOOD NAME</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>SUB TOTAL</th>
                </tr>";

                $total = 0;
                while($row = mysqli_fetch_array($run)){
                  $food_name = $row['food_name'];

                  $query1 = "SELECT cart.quantity , menu.food_name, menu.price FROM cart JOIN menu ON cart.food_name=menu.food_name WHERE (cart.food_name='$food_name' AND  cart.email='$email')";

                  $run1 = mysqli_query($conn, $query1);
                  $data = mysqli_fetch_array($run1);

                  $sub_total = $data['price'] * $data['quantity'];
                  $total += $sub_total;
   
                  echo "<tr>";
                  echo "<td>" . $data['food_name'] . "</td>";
                  echo "<td>" . $data['price'] . "</td>";
                  echo "<td>" . $data['quantity'] . "</td>";
                  echo "<td>€ " . $sub_total . "</td>";
                  echo "</tr>";
                           
                }
                echo "<tr>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td>TOTAL</td>";
                        echo "<td>€ " . $total . "</td>";
                        echo "</tr>";
                        echo "</table>";

              }else{
                echo "<h1>YOU DON'T HAVE ANY ITEM IN YOUR CART</h1>";
              }

            }else{?>
              <script>
                alert('SESSOIN EXEPIRED!!!.');
                window.open('login.html');
              </script>
              <?php
            }

            ?>
        </div>
    </body>
</html>