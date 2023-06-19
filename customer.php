<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CUSTOMER PAGE</title>
        <link rel="stylesheet" href="customer.css">
    </head>
    <body>
        <?php
            include('confg.php');
            session_start();
            $query = "SELECT * FROM `menu`";
            $run = mysqli_query($conn, $query);
        ?> 
        <div class="container">
            <hr>
            <h1 align="center">welcome to online food ordering platform</h1>
            <hr>
            <nav class="pages">
                <a href="#" class="pages-link">MENU</a>
                <a href="profile.php" class="pages-link">PROFILE</a>
                <a href="customer_orders.php" class="pages-link">CART</a>
                <a href="logout.php" class="pages-link">LOGOUT</a>
            </nav>
            <hr>
            <?php
              if($result = mysqli_num_rows($run)){
                while($row = mysqli_fetch_array($run)){
                  $img = $row['img'];
                  $name = $row['food_name'];
                  $type = $row['food_type'];
                  $price = $row['price'];
                  ?>
                    <?php echo '<form action="cart.php" method="get" class="row">
                        <div class="card">
                          <div class="card-img"><img src="data:image;base64,'.base64_encode($img).'" alt="image" ></div>
                          <div class="card-info">
                            <p class="text-title" name="food_name">'.$name.'</p>
                            <p class="text-body" name="food_type">'.$type.'</p>
                          </div>
                          <div class="card-footer">
                            <span class="text-title" name="price">€ '.$price.'</span>
                            <div class="card-button" name="add">
                              <a class="cssbuttons-io-button" href="cart.php?name='.$row["food_name"].'">Add to Cart</a>
                            </div>
                          </div>
                        </div>
                    </from>';
                  
                }
              }
            ?>
        </div>
    </body>
</html>


