<?php
$conn = mysqli_connect("localhost", "root", "11111111", "store");
$ID = $_POST['ID'];
$sql = "DELETE FROM product WHERE ID = $ID";
$result = mysqli_query($conn, $sql);
header('Location: admin.php');
?>