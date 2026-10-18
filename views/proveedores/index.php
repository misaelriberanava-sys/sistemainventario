<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Proveedores</h2>
<a href="?c=proveedor&a=create" class="btn btn-primary mb-3">+ Nuevo</a>

<table class="table table-striped">
  <thead>
    <tr><th>ID</th><th>NIT</th><th>Nombre</th><th>Dirección</th>
        <th>Teléfono</th><th>Correo</th><th></th></tr>
  </thead>
  <tbody>
    <?php foreach ($proveedores as $p): ?>
      <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['nit']) ?></td>
        <td><?= htmlspecialchars($p['nombre']) ?></td>
        <td><?= htmlspecialchars($p['direccion']) ?></td>
        <td><?= htmlspecialchars($p['telefono']) ?></td>
        <td><?= htmlspecialchars($p['correo']) ?></td>
        <td>
          <a href="?c=proveedor&a=edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
          <a href="?c=proveedor&a=delete&id=<?= $p['id'] ?>"
             class="btn btn-sm btn-danger"
             onclick="return confirm('¿Borrar?')">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>
