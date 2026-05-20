<?php
$files = array_diff(scandir("uploads"), array('.', '..'));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Galeri Upload Gambar</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .drop-area {
            border: 2px dashed #aaa;
            padding: 30px;
            margin-bottom: 20px;
            border-radius: 10px;
            cursor: pointer;
        }

        .drop-area:hover {
            background: #eee;
        }

        input[type=file] {
            margin-top: 10px;
        }

        button {
            padding: 6px 12px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        .download {
            background: #4CAF50;
            color: white;
        }

        .delete {
            background: #f44336;
            color: white;
        }

        /* 🔥 GRID GALERI */
        .file-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .file-item {
            width: 150px;
            margin: 10px;
            background: #fafafa;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        .file-item img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Gambar</h2>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="drop-area">
            <p>Drag & Drop atau pilih gambar</p>
            <input type="file" name="fileToUpload" accept="image/*" required>
        </div>
        <button type="submit">Upload</button>
    </form>

    <h3>Galeri Gambar</h3>

    <div class="file-list">
        <?php foreach ($files as $file): ?>
            <div class="file-item">
                <img src="uploads/<?php echo $file; ?>"><br>

                <a href="uploads/<?php echo $file; ?>" download>
                    <button class="download">Download</button>
                </a>

                <a href="delete.php?file=<?php echo $file; ?>">
                    <button class="delete">Hapus</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
const dropArea = document.querySelector(".drop-area");
const fileInput = document.querySelector("input[type=file]");

dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.style.background = "#ddd";
});

dropArea.addEventListener("dragleave", () => {
    dropArea.style.background = "#fff";
});

dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    dropArea.style.background = "#fff";

    fileInput.files = e.dataTransfer.files;
});
</script>

</body>
</html>