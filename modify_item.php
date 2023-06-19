<!DOCTYPE html>
<html>
    <head>
        <title>Modify Item</title>
    </head>
    <body>
        <?php
        require("confg.php");

        $food_name = $_POST["food_name"];
        $price = $_POST["price"];
        $food_type = $_POST["food_type"];

        $sql = "UPDATE `menu` SET `price` = '$price', `food_type` = '$food_type' WHERE `food_name` = '$food_name' ";

        if(mysqli_query($conn, $sql)){
            ?>
            <script>
                alert('FOOD UPDATED.');
                window.open('modify_item.html');
            </script>
            <?php

            
        }else{
            echo "erro!!, sorry $sql.". mysqli_error($conn);
        }
        
        mysqli_close($conn);
        ?>
    </body>
</html>