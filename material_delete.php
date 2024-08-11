<?php
include 'db.php';

$id = $_GET['id'];
$course_id = $_GET['course_id'];

$sql = "DELETE FROM materials WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: course_view.php?id=$course_id");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
