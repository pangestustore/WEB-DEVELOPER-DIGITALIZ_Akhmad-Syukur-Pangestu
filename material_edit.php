<?php
include 'db.php';

$id = $_GET['id'];
$course_id = $_GET['course_id'];

$sql = "SELECT * FROM materials WHERE id=$id";
$result = $conn->query($sql);
$material = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $embed_link = $_POST['embed_link'];

    $sql = "UPDATE materials SET title='$title', description='$description', embed_link='$embed_link' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: course_view.php?id=$course_id");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Edit Material</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Material</h1>
        <form method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $material['title']; ?>" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required><?php echo $material['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Embed Link</label>
                <input type="text" name="embed_link" class="form-control" value="<?php echo $material['embed_link']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>
