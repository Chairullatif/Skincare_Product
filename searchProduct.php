<?php
    // include database connection file
    include_once("config.php");
?>

<?php
    // Display selected minuman based on id
    // Getting id from url
    $find = $_GET['id'];
    // Fetch data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM skincaredetail 
    WHERE name_product LIKE '%$find%'");
?>

<html> 
<head>
    <title>Search Result</title>
</head>

<body>
    <a href="homePage.php?sort=ASC">Home</a>
    <br /><br />
    <h3>Search Result</h3>
    <div>
        <?php 
        echo "<p>'". $find . "'</p>";
        ?>
    </div>
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
        while ($item = mysqli_fetch_array($result)) {
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
</body>

</html>