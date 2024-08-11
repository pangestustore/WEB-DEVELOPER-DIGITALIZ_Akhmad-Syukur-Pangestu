<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM courses WHERE id=$id";
$course_result = $conn->query($sql);
$course = $course_result->fetch_assoc();

$material_sql = "SELECT * FROM materials WHERE course_id=$id";
$material_result = $conn->query($material_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>View Course</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5"><?php echo $course['title']; ?></h1>
        <p><?php echo $course['description']; ?></p>
        <p>Duration: <?php echo $course['duration']; ?> hours</p>
        <a href="material_create.php?course_id=<?php echo $id; ?>" class="btn btn-primary mb-3">Add Material</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Embed Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($material = $material_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $material['title']; ?></td>
                    <td><?php echo $material['description']; ?></td>
                    <td><?php echo $material['embed_link']; ?></td>
                    <td>
                        <a href="material_edit.php?id=<?php echo $material['id']; ?>&course_id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
                        <a href="material_delete.php?id=<?php echo $material['id']; ?>&course_id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
