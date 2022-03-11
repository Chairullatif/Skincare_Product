<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Skincare Type</title>
</head>

<body>
    <a href="homePage.php?sort=ASC">Back</a>
    <br /><br />
    <h3>Add Skincare Type</h3>
    <form action="addSkincareType.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Skincare Type</td>
                <td><input type="text" name="skincare_type"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add Skincare Type"></td>
            </tr>
        </table>
    </form>
    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $skincare_type = $_POST['skincare_type'];
        // include database connection file
        include_once("config.php");
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO skincare_type(id_skincare_type, skincare_type) VALUES('$id', '$skincare_type')");
        // Show message when user added
        echo "Adding Skincare Type was successfull <a href='homePage.php?sort=ASC'>dashboard</a>";
    }
    ?>
</body>

</html>