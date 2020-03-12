<div class="w-100 h-100 d-flex justify-content-center align-items-center">
    <form class="col-md-6 bg-light p-5" action="./php/crearUser.php" method="post">
        <h5 class="text-success">Crear Usuario Nuevo:</h5>
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre:</label>
            <input type="text" name="nombre" class="form-control"placeholder="Nombre integrante del comité" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Apellido:</label>
            <input type="text" name="apellido" class="form-control" placeholder="Apellido integrante del comité" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Cargo:</label>
            <input type="text" name="cargo" class="form-control" placeholder="Cargo del integrante" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Usuario:</label>
            <input type="text" name="usuario" class="form-control" placeholder="Usuario del integrante" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Contraseña:</label>
            <input type="password" name="password" class="form-control" placeholder="Contraseña de acceso" required>
        </div>
        <div class="form-group">
            <button type="submit" name="btnCrear" class="btn btn-success btn-block">Crear Usuario</button>
        </div>
    </form>
</div>