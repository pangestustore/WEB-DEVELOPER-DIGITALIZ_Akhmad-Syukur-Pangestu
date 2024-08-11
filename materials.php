<?php
include 'db.php';

$sql = "SELECT materials.*, courses.title as course_title FROM materials 
        JOIN courses ON materials.course_id = courses.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Manage Materials</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Manage Materials</h1>
        <a href="material_create.php" class="btn btn-primary mb-3">Add New Material</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['course_title']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="material_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="material_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
