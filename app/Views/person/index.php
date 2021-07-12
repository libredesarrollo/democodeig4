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
                <button data-bs-id="<?php echo $p->id ?>" data-bs-name="<?php echo "$p->name $p->surname" ?>"
                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                    class="btn btn-danger btn-sm mt-1">Eliminar</button>

            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?= $pager->links() ?>


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar <span></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Seguro que deseas eliminar el registro seleccionado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <form id="deleteForm" data-bs-action="person/delete/" action="" method="post">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>





<script>
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function (event) {

        var button = event.relatedTarget

        // consumiendo data
        var id = button.getAttribute('data-bs-id')
        var name = button.getAttribute('data-bs-name')

        // mod titulo
        var modalTitle = deleteModal.querySelector('.modal-title span')
        modalTitle.textContent = name

        // mod form
        var deleteForm = deleteModal.querySelector('#deleteForm')
        var action = deleteForm.getAttribute("data-bs-action")
        deleteForm.setAttribute("action", action + id)

    })
</script>