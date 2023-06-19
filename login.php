<?php

require("confg.php");

$email = $_POST['email'];
$password = $_POST['password'];

if($email == "admin@gmail.com" && $password == "admin"){
    ?>
    <script>
        alert('loged in ');
        window.open('add_item.html');
    </script>
    <?php
}else{
    $query = "SELECT * FROM `customer` WHERE `email`='$email' AND `password`='$password'";

    $run = mysqli_query($conn, $query);
    $result = mysqli_num_rows($run);
    $row = mysqli_fetch_row($run);

    if ($result == 1){
        session_start();
        global $row;
        $_SESSION['c_id'] = $row[0];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row[1];
        $_SESSION['surname'] = $row[2];
        $_SESSION['address'] = $row[5];
        $_SESSION['pincode'] = $row[6];
        if(isset($_SESSION['email'])){?>
            <script>
                alert('loged in ');
                window.open('customer.php');
            </script><?php
        }else{?>
            <script>
                alert('SESSOIN EXEPIRED!!!.');
                window.open('login.html');
            </script><?php
        }
                
    }else{?>
        <script>
            alert('DATA NOT FOUND.');
            window.open('login.html');
        </script><?php
    }
}



mysqli_close($conn);
?>
