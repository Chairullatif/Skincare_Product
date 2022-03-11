<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Proucer</title>
</head>

<body>
    <a href="homePage.php?sort=ASC">Back</a>
    <br /><br />
    <h3>Add Producer</h3>
    <form action="addProducer.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Company</td>
                <td><input type="text" name="company"></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add Producer"></td>
            </tr>
        </table>
    </form>
    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $company = $_POST['company'];
        $country = $_POST['country'];
        // include database connection file
        include_once("config.php");
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO producer(id_producer, company, country) VALUES('$id', '$company', '$country')");
        // Show message when user added
        echo "Adding Producer was successfull <a href='homePage.php?sort=ASC'>dashboard</a>";
    }
    ?>
</body>

</html>