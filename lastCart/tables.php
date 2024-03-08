<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RentalOfGoods";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_holodilnik'])) {
    $sql_delete_holodilnik = "DELETE FROM products WHERE nameProduct = 'Холодильник'";
    $conn->query($sql_delete_holodilnik);

    echo '<script>window.location.href = "index.php";</script>';
}


$sql_products = "SELECT * FROM products";
$result_products = $conn->query($sql_products);


$sql_clients = "SELECT * FROM clients";
$result_clients = $conn->query($sql_clients);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cart</title>
</head>
<body>

    <h2>Таблица "products"</h2>
    <table>
        <tr>
            <th>id_product</th>
            <th>nameProduct</th>
            <th>DateOfIssue</th>
            <th>DateOfReturn</th>
            <th>PriceOfDay</th>
        </tr>
        <?php
        if ($result_products->num_rows > 0) {
            while($row = $result_products->fetch_assoc()) {
                echo "<tr><td>".$row["id_product"]."</td><td>".$row["nameProduct"]."</td><td>".$row["DateOfIssue"]."</td><td>".$row["DateOfReturn"]."</td><td>".$row["PriceOfDay"]."</td></tr>";
            }
        } else {
            echo "0 результатов";
        }
        ?>
    </table>

    <h2>Таблица "clients"</h2>
    <table>
        <tr>
            <th>id</th>
            <th>adress</th>
            <th>numberPass</th>
        </tr>
        <?php
        if ($result_clients->num_rows > 0) {
            while($row = $result_clients->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["adress"]."</td><td>".$row["numberPass"]."</td></tr>";
            }
        } else {
            echo "0 результатов";
        }
        ?>
    </table>

    <form method="post">
        <button type="submit" name="delete_holodilnik">Удалить ХОЛОДИЛЬНИК</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
