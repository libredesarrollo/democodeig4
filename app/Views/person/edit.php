<div class="card my-3">

    <div class="card-header">
        <h1>Editar Persona</h1>
    </div>

    <div class="card-body">

        <?= $validation->listErrors() ?>

        <form action="<?= base_url() ?>/person/update/<?= $person->id ?>" method="post" enctype="multipart/form-data">
            <?= view("person/_form",["created" => false, "person" => $person]) ?>

        </form>
    </div>
</div>