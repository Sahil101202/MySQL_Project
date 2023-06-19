<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PROFILE PAGE</title>
        <link rel="stylesheet" href="customer.css">
    </head>
    <body>
        <?php
        session_start();
        include('confg.php');
        ?>
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
        echo '<table class = "data"><tr><td class = "info">Fisrt Name </td3><td class = "info">'.$_SESSION['name'].'</td></tr>
            <tr><td class = "info">Last Name </td3><td class = "info"> '.$_SESSION['surname'].'</td></tr>
            <tr><td class = "info">Email ID </td3><td class = "info"> '.$_SESSION['email'].'</td></tr>
            <tr><td class = "info">Adress </td3><td class = "info"> '.$_SESSION['address'].'</td></tr>
            <tr><td class = "info">Pincode </td3><td class = "info"> '.$_SESSION['pincode'].'</td></tr></table>';
        ?>
        
    </body>
</html>