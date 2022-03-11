<?php
    // include database connection file
    include_once("config.php");
    // Check if form is submitted for data update, then redirect to homepage after update
    if (isset($_POST['btn_update_skincare'])) {
        $id = $_POST['id_skincare_type'];
        $skincaretype = $_POST['skincare_type'];
        // update data
        $result = mysqli_query($mysqli, "UPDATE skincare_type SET  id_skincare_type = '$id', skincare_type = '$skincaretype'
            WHERE id_skincare_type = $id");
        //Redirect to homepage to display updated data in list
        header("Location: homePage.php?sort=ASC");
    }
?>

<?php
    // Display selected minuman based on id
    // Getting id from url
    $id = $_GET['id'];
    // Fetch data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM skincare_type WHERE
    id_skincare_type=$id");
    while ($skincaretype = mysqli_fetch_array($result)) {
        $id_skincare_type = $skincaretype['id_skincare_type'];
        $skincare_type = $skincaretype['skincare_type'];
    }
?>

<html>

<head>
    <title>Edit Skincare Type</title>
</head>

<body>
    <a href="homePage.php">Home</a>
    <br /><br />
    <h3>Edit Skincare Type</h3>
    <form name="update_skincare_type" method="post" action="editSkincareType.php">
        <table width = "25%" border="0">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id_skincare_type" value=<?php echo $id_skincare_type; ?>></td>
            </tr>
            <tr>
                <td>Skincare Type</td>
                <td><input type="text" name="skincare_type" value=<?php echo $skincare_type; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="btn_update_skincare" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>