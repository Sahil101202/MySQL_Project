<!DOCTYPE html>
<html>
    <head>
        <title>Add Item</title>
    </head>
    <body>
        <?php
        require("confg.php");

        $food_name = $_POST["food_name"];
        $price = $_POST["price"];
        $food_type = $_POST["food_type"];
        $image = $_FILES['img']['tmp_name'];
        $blob = addslashes(file_get_contents($image));
        // $blob = mysqli_real_escape_string($conn,file_get_contents($_FILES["image"]["tmp_name"]));

        $sql = "INSERT INTO `menu` (`food_name`, `price`, `food_type`, `img`) VALUES ('$food_name', '$price', '$food_type', '$blob')";

        if(mysqli_query($conn, $sql)){
            ?>
            <script>
                alert('FOOD ADDED.');
                window.open('add_item.html');
            </script>
            <?php

            
        }else{?>
            <script>
                alert('ERROR!!!!, FOOD NOT ADDED.');
                window.open('add_item.php');
            </script><?php
        }
       
        mysqli_close($conn);
        ?>
    </body>
</html>