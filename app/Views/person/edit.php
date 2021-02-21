<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>

    <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <div class="card my-3">

            <div class="card-header">
            <h1>Editar Persona</h1>
            </div>

            <div class="card-body">

                

                <?= $validation->listErrors() ?>

                <form action="<?= base_url() ?>/person/update/<?= $person->id ?>" method="post">

                    <label class="mt-2" for="name">Nombre</label>
                    <input class="form-control" type="text" name="name" id="name" value="<?= old('name', $person->name) ?>">

                    <label class="mt-2" for="surname">Apellido</label>
                    <input class="form-control" type="text" name="surname" id="surname" value="<?= old('surname', $person->surname) ?>">


                    <label class="mt-2" for="age">Edad</label>
                    <input class="form-control" type="text" name="age" id="age" value="<?= old('age', $person->age) ?>">


                    <label class="mt-2" for="description">Descripción</label>

                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?= old('description', $person->description) ?></textarea>

                    <input type="submit" class="btn btn-primary mt-3 float-end" value="Enviar">

                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>