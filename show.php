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
            <th><h4><a href="insert.php">Insert details</a></h4></th>
            <th><h4><a href="Show.php">Show Details</a></h4></th>
        </tr>
    </table>

    <table border="1">
        <tr>
            <td>Reg No</td>
            <td>Name</td>
            <td>Date ofbirth</td>
            <td>Gender</td>
            <td>UPDATE</td>
            <td>DELETE</td>
        </tr>
       
        <?php
            include("conn.php");

            $selectQuery = "SELECT * from reg";
            $result = mysqli_query($conn, $selectQuery);
            if(mysqli_num_rows($result) > 0){
                while($record = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$record['regno']."</td>";
                    echo "<td>".$record['name']."</td>";
                    echo "<td>".$record['dob']."</td>";
                    echo "<td>".$record['gender']."</td>";
                    echo "<td><a href='?adu={$record['auto_id']}'>UPDATE</a></td>";
                    echo "<td><a href='" . $_SERVER["PHP_SELF"] . "?id={$record['auto_id']}'>DELETE</a></td>";
                    echo "</tr>";
                }
            }

            if(!empty($_GET["id"])){
                $deleteQuery = "DELETE FROM reg WHERE auto_id = '{$_GET['id']}'";
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