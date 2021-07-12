<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">

    <title>Index</title>
</head>

<body>

    <?php if (session('message')) : ?>
    <p><?= session('message') ?></p>
    <?php endif ?>

    <div class="container">
    <h1><?php echo $title ?></h1>

     