<?php
$target_dir = "uploads/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$file = $_FILES["fileToUpload"];
$filename = basename($file["name"]);
$target_file = $target_dir . $filename;


$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$allowed = ["jpg", "jpeg", "png", "gif"];

if (!in_array($imageFileType, $allowed)) {
    echo "Hanya file gambar yang boleh!";
    exit;
}

if (move_uploaded_file($file["tmp_name"], $target_file)) {
    header("Location: index.php");
} else {
    echo "Upload gagal!";
}
?>