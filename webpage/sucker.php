<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data recieved</title>
</head>
<body>
<?php if($_SERVER["REQUEST_METHOD"]!='POST') { ?>
    <h2>This page only accepts POST requests</h2>

    <h4>ID sent over query string: <?= $_REQUEST['id'] ?> </h4>
<?php } else { ?>
    <h2>Form Data</h2>
    <dl>
        <dt>Http Method:</dt>
        <dd>
            <?= $_SERVER["REQUEST_METHOD"] ?>
        </dd>

        <dt>First Name</dt>
        <dd>
            <?= $_POST["firstname"] ?>
        </dd>
        <dt>Countries visited</dt>
        <dd>
            <?php if(isset($_REQUEST["countriesVisited"])) { ?>
            <ul>
            <?php foreach ($_REQUEST["countriesVisited"] as $country) { ?>
                    <li><?= $country ?></li>
            <?php } ?>
            </ul>
            <?php } ?>
        </dd>

        <dt>Avatar</dt>
        <dd>
            <?php
                $imageTempPath = $_FILES['avatar']['tmp_name'];
                $imagePath = './images/' . $_FILES['avatar']['name'];
                $isUploaded = is_uploaded_file($imageTempPath);

                if ($isUploaded) {
                    move_uploaded_file($imageTempPath, $imagePath);
                }
            ?>

            <?php if($isUploaded) { ?>
                <img src="<?= $imagePath ?>">
            <?php } else { ?>
                No avatar
            <?php }  ?>
        </dd>


        <dt>Request Parameters</dt>
        <dd>
            <?php print_r($_REQUEST) ?>
        </dd>

        <dt>Server Parameters</dt>
        <dd>
            <ul>
            <?php foreach($_SERVER as $name=>$value) { ?>
                <li>
                    <?= $name ?> :
                    <?php var_dump($value); ?>
                </li>
            <?php } ?>
            </ul>
        </dd>
    </dl>
<?php } ?>
</body>
</html>