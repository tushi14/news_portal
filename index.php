<?php
include "db.php";

$query = "SELECT * FROM news ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$first = true;
?>

<!DOCTYPE html>
<html>
<head>
<title>News Portal</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body {
    margin: 0;
    font-family: Arial;
    background: #f4f4f4;
}

.header {
    background: white;
    padding: 10px 20px;
    border-bottom: 1px solid #ccc;
}

.logo {
    width: 180px;
}

.container {
    max-width: 1000px;
    margin: auto;
    padding: 20px;
}

.featured {
    background: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 25px;
    transition: 0.3s;
}

.featured:hover {
    transform: scale(1.02);
    cursor: pointer;
}

.featured img {
    width: 100%;
    height: auto;
    display: block;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.news-box {
    background: white;
    padding: 10px;
    border-radius: 8px;
    transition: 0.3s;
}

.news-box:hover {
    transform: scale(1.03);
}

.news-box img {
    width: 100%;
    height: 130px;
    object-fit: cover;
    border-radius: 5px;
}

.news-box h3 {
    font-size: 14px;
    margin: 5px 0;
}

.news-box p {
    font-size: 12px;
}

@media (max-width: 900px) {
    .news-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 500px) {
    .news-grid {
        grid-template-columns: 1fr;
    }
}

</style>
</head>

<body>

<div class="header">
    <img src="uploads/logo1.png" class="logo">
</div>

<div class="container">

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <?php if ($first) { ?>

        <a href="news_details.php?id=<?php echo $row['id']; ?>" style="text-decoration:none; color:black; display:block;">
            <div class="featured">
                <h1><?php echo $row['headline']; ?></h1>

                <?php if (!empty($row['image'])) { ?>
                    <img src="uploads/<?php echo $row['image']; ?>" alt="news image">
                <?php } ?>

                <p><?php echo substr($row['content'], 0, 150); ?>...</p>
            </div>
        </a>

        <div class="news-grid">

        <?php $first = false; ?>

    <?php } else { ?>

        <a href="news_details.php?id=<?php echo $row['id']; ?>" style="text-decoration:none; color:black;">
            <div class="news-box">

                <?php if (!empty($row['image'])) { ?>
                    <img src="uploads/<?php echo $row['image']; ?>" alt="news image">
                <?php } ?>

                <h3><?php echo $row['headline']; ?></h3>
                <p><?php echo substr($row['content'], 0, 80); ?>...</p>

            </div>
        </a>

    <?php } ?>

<?php } ?>

</div>

</div>

</body>
</html>