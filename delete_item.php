<!DOCTYPE html>
<html>
    <head>
        <title>Delete Item</title>
    </head>
    <body>
        <?php
        require("confg.php");

        $food_name = $_GET["name"];

        $sql = "DELETE FROM `menu` WHERE `food_name` = '$food_name' ";

        if(mysqli_query($conn, $sql)){
            ?>
            <script>
                alert('ITEM DELETED.');
                window.open('delete_item.html');
            </script>
            <?php
        }else{?>
            <script>
                alert('ERROR!!!!.');
                window.open('delete_item.html');
            </script><?php
        }
       
        mysqli_close($conn);
        ?>
    </body>
</html>