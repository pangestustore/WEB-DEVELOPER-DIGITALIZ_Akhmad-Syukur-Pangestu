<?php
include 'db.php';
include 'includes/header.php';
include 'includes/sidebar.php';

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Course Management</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <a href="course_create.php" class="btn btn-primary mb-3">Add New Course</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['duration']; ?> hours</td>
                        <td>
                            <a href="course_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="course_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            <a href="course_view.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
