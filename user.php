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
        </tr>
    </table>

    <table border="1">
        <tr>
            
            <td>Name</td>
            <td>Email</td>
            <td>UPDATE</td>
           
        </tr>
       
        <?php
       
            include("conn.php");
            
            session_start(); // Start the session

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
            $selectQuery = "SELECT * FROM users WHERE email = '$username'";
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