<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Productos</h2>
<a href="?c=producto&a=create" class="btn btn-primary mb-3">+ Nuevo</a>

<table class="table table-striped">
  <thead>
    <tr><th>ID</th><th>Producto</th><th>Precio</th><th>Proveedor</th><th></th></tr>
  </thead>
  <tbody>
    <?php foreach ($productos as $p): ?>
      <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['producto']) ?></td>
        <td>$<?= number_format($p['precio'], 2) ?></td>
        <td><?= htmlspecialchars($p['proveedor']) ?></td>
        <td>
          <a href="?c=producto&a=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
          <a href="?c=producto&a=delete&id=<?= $p['id'] ?>"
             class="btn btn-sm btn-danger"
             onclick="return confirm('¿Borrar?')">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>
