<!DOCTYPE html>

    <html>
        <body>
        
<style>
.container {
    width: 400px;
    margin: 50px auto;
}
input[type="text"] {
    width: 100%;
    height: 40px;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #c33232;
}
</style>

<div class="container">
<?php 
include "../db.php";
//echo "News added successfully";
if(isset($_POST['submit'])){
$headline= $_POST['headline'];
$content= $_POST['content'];
$image = $_FILES['image']['name'];
$temp = $_FILES['image']['tmp_name'];
move_uploaded_file($temp, "../uploads/". $image );
$query= "INSERT into news (headline, image, content) VALUES('$headline', '$image', '$content')";
mysqli_query($conn,$query);


}
?>

<form method='POST' enctype="multipart/form-data">
   <label>Headline</label><br>
<input type="text" name="headline" placeholder="Enter headline"><br><br>
<label> Content</label><br>
<textarea name="content" placeholder="Enter Content here"> </textarea><br><br>
    <input type="file" name="image">
  <button type="submit" name="submit">Add News </button>
</form>
</div>
</body>
    </html>

