<?php
    // include database connection file
    include_once("config.php");
    // Check if form is submitted for data update, then redirect to homepage after update
    if (isset($_POST['btn_update_producer'])) {
        $id = $_POST['id_producer'];
        $company = $_POST['company'];
        $country = $_POST['country'];
        // update data
        $result = mysqli_query($mysqli, "UPDATE producer SET  id_producer = '$id', company = '$company', country = '$country'
            WHERE id_producer = $id");
        //Redirect to homepage to display updated data in list
        header("Location: homePage.php?sort=ASC");
    }
?>

<?php
    // Display selected minuman based on id
    // Getting id from url
    $id = $_GET['id'];
    // Fetch data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM producer WHERE
    id_producer=$id");
    while ($producer = mysqli_fetch_array($result)) {
        $id_producer = $producer['id_producer'];
        $company = $producer['company'];
        $country = $producer['country'];
    }
?>

<html> 

<head>
    <title>Edit Producer</title>
</head>

<body>
    <a href="homePage.php">Home</a>
    <br /><br />
    <h3>Edit Producer</h3>
    <form name="update_skincare_type" method="post" action="editProducer.php">
        <table width = "25%" border="0">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id_producer" value=<?php echo $id_producer; ?>></td>
            </tr>
            <tr>
                <td>Company</td>
                <td><input type="text" name="company" value=<?php echo $company; ?>></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country" value=<?php echo $country; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="btn_update_producer" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>