<?php
include "db.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM news WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No news selected";
    exit;
}
?>

<!DOCTYPE html>

<html>
<body>
<h1> <?php echo $row['headline']; ?> </h1>
<?php if(!empty($row['image']))  { ?>


   <img src="uploads/<?php echo $row['image']; ?>"width="400">



<?php }
?>
<p><?php echo $row['content']; ?> </p>

<a href="index.php">← Back to Home</a>

</body>
</html>