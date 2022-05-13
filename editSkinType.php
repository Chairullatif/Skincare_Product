<?php
    // include database connection file
    include_once("config.php");
    // Check if form is submitted for data update, then redirect to homepage after update
    if (isset($_POST['btn_update_skin'])) {
        $id = $_POST['id_skin_type'];
        $skintype = $_POST['skin_type'];
        $sensitive = $_POST['cb_is_sensitive'];
        // update data
        $result = mysqli_query($mysqli, "UPDATE skin_type SET  id_skin_type = '$id', skin_type = '$skintype', is_sensitive = '$sensitive'
            WHERE id_skin_type = $id");
        //Redirect to homepage to display updated data in list
        header("Location: homePage.php?sort=ASC");
    }
?>

<?php
    // Display selected minuman based on id
    // Getting id from url
    $id = $_GET['id'];
    // Fetch data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM skin_type WHERE
    id_skin_type=$id");
    while ($skintype = mysqli_fetch_array($result)) {
        $id_skin_type = $skintype['id_skin_type'];
        $skin_type = $skintype['skin_type'];
        $sensitive = $skintype['is_sensitive'];
    }
?>

<html>

<head>
    <title>Edit Skin Type</title>
</head>

<body>
    <a href="homePage.php">Home</a>
    <br /><br />
    <h3>Edit Skin Type</h3>
    <form name="update_skin_type" method="post" action="editSkinType.php">
        <table width = "25%" border="0">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id_skin_type" value=<?php echo $id_skin_type; ?>></td>
            </tr>
            <tr>
                <td>Type of Skin</td>
                <td><input type="text" name="skin_type" value=<?php echo $skin_type; ?>></td>
            </tr>
            <tr>
                <td>Is Sensitive?</td>
                <td><input type="checkbox" name="cb_is_sensitive" id="cb_is_sensitive" <?php if ($sensitive) echo "checked='checked'"; ?>>Yes</td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="btn_update_skin" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>