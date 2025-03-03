<?php
include './db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery App</title>
    <?php include './css.php'; ?>
</head>

<body>
    <div class="container">
        <h1>Photo Gallery</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Photo title" required>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
        <hr>
        <div>
            <?php
            $result = $conn->query("SELECT * FROM photos ORDER BY created_at DESC ");
            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
                    <div>
                        <h2>"<?= $row['title']; ?>"</h2>
                        <img src="<?= $row['image_path']; ?>" alt="image" width="200px">
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit">DELETE</button>
                        </form>
                    </div>
            <?php
                endwhile;
            else:
                echo "NO Photos Upload yet!";
            endif;
            ?>
        </div>
    </div>
</body>

</html>