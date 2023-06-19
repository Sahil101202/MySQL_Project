<!DOCTYPE html>
<html>
    <head>
        <title>Delete Item</title>
    </head>
    <body>
        <?php
        require("confg.php");
        session_start();

        $email = $_SESSION['email'];

        $sql = "DELETE FROM `customer` WHERE `email` = '$email'";

        if(mysqli_query($conn, $sql)){
            ?>
            <script>
                alert('ACCOUNT DELETED.');
                window.open('index.html');
            </script>
            <?php
        }else{?>
            <script>
                alert('ERROR!!!!.');
                window.open('profile.php');
            </script><?php
        }
        
        mysqli_close($conn);
        ?>
    </body>
</html>