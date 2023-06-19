<!DOCTYPE html>
<html>
    <head>
        <title>SIGN UP</title>
    </head>
    <body>
        <?php
        require("confg.php");

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $pincode = $_POST["pincode"];

        $sql = "INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `address`, `pincode`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '$address', '$pincode')";

        if(mysqli_query($conn, $sql)){
            ?>
            <script>
                alert('data stored.');
                window.open('login.html');
            </script>
            <?php

            
        }else{?>
            <script>
                alert('ERROR!!!!, DATA NOT ADDED.');
                window.open('sign_up.html');
            </script><?php
        }
        

        mysqli_close($conn);
        ?>
    </body>
</html>