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
    <?php
    if (isset($_FILES['photo'])) {
        // display image

        $img_url = "";
        $prediction = passthru("python predict.py '$url'");
    }
    ?>
</body>
</html>