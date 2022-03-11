<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Skin Type</title>
</head>

<body>
    <a href="homePage.php?sort=ASC">Back</a>
    <br /><br />
    <h3>Add Skin Type</h3>
    <form action="addSkinType.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Type of Skin</td>
                <td><input type="text" name="skin_type"></td>
            </tr>
            <tr>
                <td>Is Sensitive?</td>
                <td><input type="checkbox" name="is_sensitive">Yes</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add Skin Type"></td>
            </tr>
        </table>
    </form>
    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $skin_type = $_POST['skin_type'];
        if (empty($_POST['is_sensitive'])) {
            $sensitive = 0;
        } else {
            $sensitive = 1;
        }
        // include database connection file
        include_once("config.php");
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO skin_type(id_skin_type, skin_type, is_sensitive) VALUES('$id', '$skin_type' , $sensitive)");
        // Show message when user added
        echo "Add Skin Type was successfull <a href='homePage.php?sort=ASC'>dashboard</a>";
    }
    ?>
</body>

</html>