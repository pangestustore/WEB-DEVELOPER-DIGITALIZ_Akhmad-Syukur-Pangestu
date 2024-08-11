<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM courses WHERE id=$id";
$result = $conn->query($sql);
$course = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];

    $sql = "UPDATE courses SET title='$title', description='$description', duration='$duration' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Edit Course</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Course</h1>
        <form method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $course['title']; ?>" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required><?php echo $course['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Duration (hours)</label>
                <input type="number" name="duration" class="form-control" value="<?php echo $course['duration']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>
