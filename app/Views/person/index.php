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

        <a href="/person/new" class="btn btn-success mb-4">Crear</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $key => $p) : ?>
                    <tr>
                        <td><?= $p->id ?></td>
                        <td><?= $p->name ?></td>
                        <td><?= $p->surname ?></td>
                        <td><?= $p->age ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="person/<?= $p->id ?>/edit">Editar</a>

                            <form action="person/delete/<?= $p->id ?>" method="post">
                                <button class="btn btn-danger btn-sm mt-1" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?= $pager->links() ?>
    </div>

    <script src="<?= base_url() ?>/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>