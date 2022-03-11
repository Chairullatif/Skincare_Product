<?php
// Create database connection using config file
include_once("config.php");
// Fetch data
$skintype = mysqli_query($mysqli, "SELECT * FROM skin_type WHERE is_delete = 1 ORDER BY id_skin_type ASC");
$skincaretype = mysqli_query($mysqli, "SELECT * FROM skincare_type WHERE is_delete = 1 ORDER BY id_skincare_type ASC");
$producer = mysqli_query($mysqli, "SELECT * FROM producer WHERE is_delete = 1 ORDER BY id_producer ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <a href="homePage.php?sort=ASC">Home</a>
    <br /><br />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare</title>
    <style>
        h2 {
            text-align: center;
        }

        h5 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Recycle Bin</h2>
    <h5>Created by Chairullatif Aji Sadewa</h5>
    <h3>Skin Type</h3>
    <table width='80%' border=1>
        <a href="addSkinType.php">Add Skin Type</a>
        <tr>
            <th>No.</th>
            <th>Skin Type</th>
            <th>Is Sensitive</th>
            <th>Action</th>
        </tr>
        <?php
        while ($item = mysqli_fetch_array($skintype)) {
            echo "<tr>";
            echo "<td>" . $item['id_skin_type'] . "</td>";
            echo "<td>" . $item['skin_type'] . "</td>";
            if ($item["is_sensitive"]) {
                echo "<td>Yes</td>";
            } else {
                echo "<td>No</td>";
            }
            echo "<td><a href='restoreSkinType.php?id=$item[id_skin_type]'>Restore</a>
            | <a href='deletePermanentSkinType.php?id=$item[id_skin_type]'>Delete Permanent</a></td></tr>";
        }
        ?>
    </table>
    <h3>Skincare Type</h3>
    <table width='80%' border=1 style="text-align: center;">
        <a href="addSkincareType.php">Add Skincare Type</a>
        <tr>
            <th>No.</th>
            <th>Skincare Type</th>
            <th>Action</th>
        </tr>
        <?php
        while ($item = mysqli_fetch_array($skincaretype)) {
            echo "<tr>";
            echo "<td>" . $item['id_skincare_type'] . "</td>";
            echo "<td>" . $item['skincare_type'] . "</td>";
            echo "<td><a href='restoreSkincareType.php?id=$item[id_skincare_type]'>Restore</a>
            | <a href='deletePermanentSkincareType.php?id=$item[id_skincare_type]'>Delete Permanent</a></td></tr>";
        }
        ?>
    </table>
    <h3>Producer</h3>
    <table width='80%' border=1>
        <a href="addProducer.php">Add Skin Type</a>
        <tr>
            <th>No.</th>
            <th>Company</th>
            <th>Country</th>
            <th>Action</th>
        </tr>
        <?php
        while ($item = mysqli_fetch_array($producer)) {
            echo "<tr>";
            echo "<td>" . $item['id_producer'] . "</td>";
            echo "<td>" . $item['company'] . "</td>";
            echo "<td>" . $item['country'] . "</td>";
            echo "<td><a href='restoreProducer.php?id=$item[id_producer]'>Restore</a>
            | <a href='deletePermanentProducer.php?id=$item[id_producer]'>Delete Permanent</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>