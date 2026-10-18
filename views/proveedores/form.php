<?php
require __DIR__ . '/../layout/header.php';
$editando = $p !== null;
$v = fn($k) => htmlspecialchars($p[$k] ?? '');
?>

<h2><?= $editando ? 'Editar' : 'Nuevo' ?> Proveedor</h2>

<form method="POST" action="?c=proveedor&a=<?= $editando ? 'update' : 'store' ?>">
  <?php if ($editando): ?>
    <input type="hidden" name="id" value="<?= $p['id'] ?>">
  <?php endif; ?>

  <div class="mb-3"><label>NIT</label>
    <input name="nit" class="form-control" value="<?= $v('nit') ?>" required></div>

  <div class="mb-3"><label>Nombre</label>
    <input name="nombre" class="form-control" value="<?= $v('nombre') ?>" required></div>

  <div class="mb-3"><label>Dirección</label>
    <input name="direccion" class="form-control" value="<?= $v('direccion') ?>" required></div>

  <div class="mb-3"><label>Teléfono</label>
    <input name="telefono" class="form-control" value="<?= $v('telefono') ?>" required></div>

  <div class="mb-3"><label>Correo</label>
    <input type="email" name="correo" class="form-control" value="<?= $v('correo') ?>" required></div>

  <button class="btn btn-success">Guardar</button>
  <a href="?c=proveedor&a=index" class="btn btn-secondary">Cancelar</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
