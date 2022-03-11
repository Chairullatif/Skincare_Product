<?php
// Create database connection using config file
include_once("config.php");
// Fetch data
$sorting = $_GET['sort'];
$skintype = mysqli_query($mysqli, "SELECT * FROM skin_type WHERE is_delete = 0 ORDER BY id_skin_type ASC");
$skincaretype = mysqli_query($mysqli, "SELECT * FROM skincare_type WHERE is_delete = 0 ORDER BY id_skincare_type ASC");
$producer = mysqli_query($mysqli, "SELECT * FROM producer WHERE is_delete = 0 ORDER BY id_producer ASC");
$productASC = mysqli_query($mysqli, "SELECT * FROM skincaredetail ORDER BY price $sorting");
?>

<?php
// Check If form submitted, insert form data into users table.
if (isset($_POST['submitProduct'])) {
    $jproduct = $_POST['j_product'];
    $jprice = $_POST['j_price'];
    $jskincaretype = $_POST['j_skincare_type'];
    $jskintype = $_POST['j_skin_type'];
    $jproducer = $_POST['j_producer'];
    // include database connection file
    include_once("config.php");
    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO product(name_product, price, id_skin_type, id_skincare_type, id_producer)
     VALUES('$jproduct', '$jprice', '$jskintype', '$jskincaretype', '$jproducer')");
    header("Location:homePage.php");
}

?>

<?php
// Check If form submitted, insert form data into users table.
if (isset($_POST['btnfind_product'])) {
    $findproduct = $_POST['find_product'];
    header("Location: searchProduct.php?id=$findproduct");
}
?>

<?php
if (isset($_POST['btn_sort_asc'])) {
    $findproduct = $_POST['find_product'];
    header("Location: homePage.php?sort=ASC");
}

if (isset($_POST['btn_sort_desc'])) {
    $findproduct = $_POST['find_product'];
    header("Location: homePage.php?sort=DESC");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare</title>
    <style>
        h1 {
            text-align: center;
        }

        h5 {
            text-align: center;
        }

        th {
            background-color: #04AA6D;
            color: white;
        }

        td {
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body style="background-color: #f3e5f5;">
    <h1>Skincare Product</h1>
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
            echo "<td><a href='editSkinType.php?id=$item[id_skin_type]'>Edit</a>
            | <a href='deleteSkinType.php?id=$item[id_skin_type]'>Delete</a></td></tr>";
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
            echo "<td><a href='editSkincareType.php?id=$item[id_skincare_type]'>Edit</a>
            | <a href='deleteSkincareType.php?id=$item[id_skincare_type]'>Delete</a></td></tr>";
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
            echo "<td><a href='editProducer.php?id=$item[id_producer]'>Edit</a>
            | <a href='deleteProducer.php?id=$item[id_producer]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <h3>Products</h3>
    <!-- Add form to input data nik and project number -->
    <p>Add Product</p>
    <form action="homePage.php" method="post" name="form1">
        <table width="30%" border="0">
            <tr>
                <td>Name of Product</td>
                <td><input type="text" name="j_product"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="j_price"></td>
            </tr>
            <tr>
                <td>Skincare Type</td>
                <td><input type="text" name="j_skincare_type"></td>
            </tr>
            <tr>
                <td>For Skin Type</td>
                <td><input type="text" name="j_skin_type"></td>
            </tr>
            <tr>
                <td>Producer</td>
                <td><input type="text" name="j_producer"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submitProduct" value="Add Product"></td>
            </tr>
            <tr>
                <td>
                    <p></p>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="btn_sort_asc" value="Sort From Lower Price"></td>
                <td><input type="submit" name="btn_sort_desc" value="Sort From Higher Price"></td>
            </tr>
        </table>
    </form>
    <!-- all product -->
    <table width='100%' border=1>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Skincare Type</th>
            <th>Skin Type</th>
            <th>Producer</th>
            <th>Produced in</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($item = mysqli_fetch_array($productASC)) {
            echo "<tr>";
            echo "<td>" . $item['name_product'] . "</td>";
            echo "<td>" . $item['price'] . "</td>";
            echo "<td>" . $item['skincare_type'] . "</td>";
            echo "<td>" . $item['skin_type'] . "</td>";
            echo "<td>" . $item['company'] . "</td>";
            echo "<td>" . $item['country'] . "</td>";
            echo "<td><a href='deleteProduct.php?id=$item[id_product]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <!-- for found product -->
    <br />
    <br />
    <form action="homePage.php" method="post" name="form2">
        <tr>
            <td><input type="text" name="find_product"></td>
            <td><input type="submit" name="btnfind_product" value="Find"></td>
        </tr>
    </form>
    <a href="restorePage.php"><br><br>Restore Data Terhapus</a>
    <a href="logout.php"><br><br>Logout</a>
</body>

</html>