<div class="card my-3">

    <div class="card-header">
        <h1>Crear Persona</h1>
    </div>

    <div class="card-body">

        <form action="<?= base_url() ?>/person" method="post" enctype="multipart/form-data">

        <?= view("person/_form",["created" => true, "person" => $person]) ?>

        </form>
    </div>
</div>