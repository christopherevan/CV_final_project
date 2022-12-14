<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predict</title>
</head>
<body>
    <h1>hello world</h1>
    <form action="" method="post">
        <input type="file" name="photo" accept="image/png, image/jpeg">
        <input type="submit" value="Submit" name="submit">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $mysqli = new mysqli("localhost", "u1609257_cv", "shoe_EffB0", "u1609257_cv");
        if ($mysqli->connect_errno)
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;

        $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
        $sql = "INSERT INTO photo(extension) VALUES (?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $ext);
        $stmt->execute();
        $idgambar = $stmt->insert_id;
        $img_url = "uploads/$idgambar.$ext";
        move_uploaded_file($photo['tmp_name'][$i], $img_url);

        echo "<img src='$img_url'>";
        print_r($_POST);
        print_r($_FILES);
        $prediction = passthru("python predict.py '$img_url'");
        echo $prediction;
    }
    ?>
</body>
</html>