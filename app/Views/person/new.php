<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Persona</title>
</head>

<body>

    <h1>Crear Persona</h1>

    <?= $validation->listErrors() ?>

    <form action="<?= base_url() ?>/person" method="post">

        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="<?= old('name') ?>">

        <br>

        <label for="surname">Apellido</label>
        <input type="text" name="surname" id="surname" value="<?= old('surname') ?>">

        <br>

        <label for="age">Edad</label>
        <input type="text" name="age" id="age" value="<?= old('age') ?>">

        <br>

        <label for="description">Descripción</label>

        <textarea name="description" id="description" cols="30" rows="10">
        <?= old('description') ?>
        </textarea>

        <br>

        <input type="submit" value="Enviar">

    </form>

</body>

</html>