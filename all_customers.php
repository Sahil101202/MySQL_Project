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
                <a href="add_item.html" class="pages-link">Add Items</a>
                <a href="update_item.html" class="pages-link">Modify Items</a>
                <a href="delete_item.html" class="pages-link">Delete Items</a>
                <a href="all_customers.html" class="pages-link">All Customers</a>
                <a href="admin_register.html" class="pages-link">Register New Admin</a>
                <a href="index.html" class="pages-link">Logout</a>
            </nav>
            <hr>
        
        <?php
        
        session_start();
        include('confg.php');
        

        $query = "SELECT * FROM `customer`";
        $run = mysqli_query($conn, $query);
        $result = mysqli_num_rows($run);

        if($result){
 
            echo "<table border='1' class='tb'>
            <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Pincode</th>
            </tr>";
            
            while($row = mysqli_fetch_row($run))
            {
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td>" . $row[5] . "</td>";
            echo "<td>" . $row[6] . "</td>";
            echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo ("NOT ABLE TO GET DATA !!!!!");
        }
         
        mysqli_close($conn);
        ?>
        
    </body>
</html>