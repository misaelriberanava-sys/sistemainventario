<?php
require __DIR__ . '/../layout/header.php';
$editando = $p !== null;
$v = fn($k) => htmlspecialchars($p[$k] ?? '');
?>

<h2><?= $editando ? 'Editar' : 'Nuevo' ?> Producto</h2>

<form method="POST" action="?c=producto&a=<?= $editando ? 'update' : 'store' ?>">
  <?php if ($editando): ?>
    <input type="hidden" name="id" value="<?= $p['id'] ?>">
  <?php endif; ?>

  <div class="mb-3"><label>Nombre</label>
    <input name="nombre" class="form-control" value="<?= $v('nombre') ?>" required></div>

  <div class="mb-3"><label>Precio</label>
    <input type="number" step="0.01" min="0" name="precio"
           class="form-control" value="<?= $v('precio') ?>" required></div>

  <div class="mb-3"><label>Proveedor</label>
    <select name="id_proveedor" class="form-select" required>
      <option value="">-- Seleccione --</option>
      <?php foreach ($proveedores as $pr): ?>
        <option value="<?= $pr['id'] ?>"
          <?= ($p['id_proveedor'] ?? '') == $pr['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($pr['nombre']) ?>
        </option>
      <?php endforeach; ?>
    </select></div>

  <button class="btn btn-success">Guardar</button>
  <a href="?c=producto&a=index" class="btn btn-secondary">Cancelar</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
