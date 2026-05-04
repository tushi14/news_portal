<?php
include "db.php";

$query = "SELECT * FROM news ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>News Portal</title>

    <style>
        body {
            background: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
        @media (max-width: 900px) {
    .news-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

        .header {
            width: 100%;
            padding: 10px 20px;
            background: white;
            border-bottom: 1px solid #b2a3a3;
        }

        .logo {
            width: 180px;
            height: auto;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }
        

        .featured {
            background: white;
            padding: 15px;
            max-width: 700px;
            margin-bottom: 30px;
            border-radius: 20px;
            border: 1px solid #755757;
            padding-top: 10px;
        }

        .featured img {
            
            max-width: 600px;
            height: auto;
        }

        .news-box {
            background: #d4caca;
            border: 1px solid #e1dada;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
        }

        .news-box img {
            width: 250px;
            height: auto;
        }

        .news-actions a {
            display: inline-block;
            margin-right: 10px;
            text-decoration: none;
        }

        hr {
            border: none;
            border-top: 2px solid #ccc;
            margin: 30px 0;
        }
        html, body {
    height: auto;
    overflow-y: auto;
}
.news-box img,
.featured img {
    width: 100%;
    height: auto;
}
    </style>
</head>

<body>

<div class="header">
    <img src="uploads/logo1.png" class="logo">
</div>
<br>

<?php
if (mysqli_num_rows($result) > 0) {

    $first = true;
    
    while ($row = mysqli_fetch_assoc($result)) {

        if ($first) {
?>

            <div class="featured">
                <h1><?php echo $row['headline']; ?></h1>

                <?php if (!empty($row['image'])) { ?>
                    <img src="uploads/<?php echo $row['image']; ?>">
                <?php } ?>

                <p><?php echo substr($row['content'], 0, 150); ?>...</p>

                <div class="news-actions">
                    <a href="news_details.php?id=<?php echo $row['id']; ?>">Read More</a>
                    <a href="delete_news.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
            
<hr>
            

<?php
            $first = false;

        } else {
            
?>
            <div class="news-grid">
            <div class="news-box">
                <h2><?php echo $row['headline']; ?></h2>

                <?php if (!empty($row['image'])) { ?>
                    <img src="uploads/<?php echo $row['image']; ?>" width="250">
                <?php } ?>

                <p><?php echo substr($row['content'], 0, 100); ?>...</p>

                <div class="news-actions">
                    <a href="news_details.php?id=<?php echo $row['id']; ?>">Read More</a>
                    <a href="delete_news.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
        

<?php
        }
    }

} else {
?>

    <p>No news found</p>

<?php
}
?>
</div>

</div>

</body>
</html>