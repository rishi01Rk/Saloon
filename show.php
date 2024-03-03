<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
<table>
        <tr>
            <th><h4> <a href="index.html">Log Out</a> </h4></th>
            <th><h4><a href="sign.html">Insert details</a></h4></th>
            <th><h4><a href="Show.php">Show Details</a></h4></th>
        </tr>
    </table>

    <table border="1">
        <tr>
            
            <td>Name</td>
            <td>Email</td>
            

            <td>UPDATE</td>
            <td>DELETE</td>
        </tr>
       
        <?php
            include("conn.php");

            $selectQuery = "SELECT * from users";
            $result = mysqli_query($conn, $selectQuery);
            if(mysqli_num_rows($result) > 0){
                while($record = mysqli_fetch_assoc($result)){
                    echo "<tr>";
              
                    echo "<td>".$record['fullname']."</td>";
                    echo "<td>".$record['email']."</td>";
                    
                    echo "<td><a href='?adu={$record['id']}'>UPDATE</a></td>";
                    echo "<td><a href='" . $_SERVER["PHP_SELF"] . "?id={$record['id']}'>DELETE</a></td>";
                    echo "</tr>";
                }
            }

            if(!empty($_GET["id"])){
                $deleteQuery = "DELETE FROM users WHERE id = '{$_GET['id']}'";
                $deleteResult = mysqli_query($conn, $deleteQuery);
                if($deleteResult){
                    header("location:show.php");
                }
                else{
                    echo "delete faild";
                }
            }
            if (!empty($_GET["adu"])) {
                session_start();
                $_SESSION['id'] = $_GET["adu"];
                header("location: update.php");
            }
            
        ?>
     </table>
</body>
</html>