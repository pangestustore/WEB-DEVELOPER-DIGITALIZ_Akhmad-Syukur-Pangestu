<?php
include 'db.php';

$course_id = $_GET['course_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $embed_link = $_POST['embed_link'];

    $sql = "INSERT INTO materials (course_id, title, description, embed_link) VALUES ('$course_id', '$title', '$description', '$embed_link')";

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
    <title>Add Material</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Add Material</h1>
        <form method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Embed Link</label>
                <input type="text" name="embed_link" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="materials.php" class="btn btn-secondary">Back</a>

        </form>
    </div>
</body>
</html>
