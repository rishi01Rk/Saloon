<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
<?php
        include("conn.php");
        session_start();
        $num = $_SESSION['id'];
        // echo $num;
        $query = " SELECT * FROM users where id =  $num ";
        $result = mysqli_query($conn, $query);
        $record = mysqli_fetch_assoc($result);
        // echo $record["regno"];
    ?>
    <form action="updateD.php" method="post">
        <table>
            <tr>
                <td>  <label for="name">Name</label> </td>
                <td> <input type="text" name="name" id="name" value="<?php echo $record['fullname'] ?>" > </td>
            </tr>
            <tr> 
                <td> <label for="email">Email</label> </td> 
                <td> <input type="email" name="email" id="email" value="<?php echo $record['email'] ?>"> </td>
            </tr>
            <!--<tr>
                <td> <label for="dob">Date of birth</label> </td>
                <td> <input type="date" name="dob" id="dob" value="<?php  echo $record['dob'] ?>"> </td>
            </tr>
            <tr>
                <td> 
                    <label for="">Gender</label>
                </td>
                <td>
                    <input type="radio" id="genderM" name="gender" value="M" <?php echo ($record['gender'] == 'M') ? 'checked' : ''; ?>>
                    <label for="genderM">M</label>
                    <input type="radio" id="genderF" name="gender" value="F" <?php echo ($record['gender'] == 'F') ? 'checked' : ''; ?>>
                    <label for="genderF">F</label>
                </td>

            </tr>-->
            <tr>
                <td> <input type="Submit" value="Submit" name="submit"> </td>
            </tr>
        </table>

    </form>
</body>
</html>