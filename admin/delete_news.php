
<?php
include "db.php"

$id = $_GET['id'];
$query = "DELETE FROM news WHERE id = $id";
mysqli_query($conn, $query);
?>