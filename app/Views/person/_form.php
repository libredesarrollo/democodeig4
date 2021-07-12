<label class="mt-2" for="name">Nombre</label>
<input class="form-control" type="text" name="name" id="name" value="<?= old('name', $person->name) ?>">

<label class="mt-2" for="surname">Apellido</label>
<input class="form-control" type="text" name="surname" id="surname" value="<?= old('surname', $person->surname) ?>">

<label class="mt-2" for="age">Edad</label>
<input class="form-control" type="text" name="age" id="age" value="<?= old('age', $person->age) ?>">

<label class="mt-2" for="description">Descripción</label>

<textarea class="form-control" name="description" id="description" cols="30"
    rows="10"><?= old('description', $person->description) ?></textarea>

<label class="mt-2" for="age">Avatar</label>
<input class="form-control" type="file" name="image">

<input type="submit" class="btn btn-primary mt-3 float-end" value="Enviar">