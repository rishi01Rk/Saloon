<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .user-info {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .user-info h2 {
            margin-top: 0;
        }
        .user-info p {
            margin-bottom: 10px;
        }
        .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .logout-link a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            background-color: #eee;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .logout-link a:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Dashboard</h1>
        <div class="user-info">
        <h2>include("conn.php");

        <table border="1">
        <tr>

            <td>Name</td>
            <td>email</td>
            
        </tr>
<?php
include("conn.php");
$selectQuery =  "SELECT * FROM users WHERE email=";
$result = mysqli_query($conn, $selectQuery);
if(mysqli_num_rows($result) > 0){
    while($record = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$record['fullname']."</td>";
        echo "<td>".$record['email']."</td>";
        echo "</tr>";
    }
}?>
        </div>
        <div class="logout-link">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>

//session_start(); // Start session to access session variables



// If logged in, display user dashboard


