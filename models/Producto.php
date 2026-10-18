<?php
require_once __DIR__ . '/../config/Database.php';

class Producto
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function allConProveedor(): array
    {
        $sql = "SELECT p.id, p.nombre AS producto, p.precio,
                       pr.nombre AS proveedor
                FROM producto p
                INNER JOIN proveedor pr ON pr.id = p.id_proveedor
                ORDER BY p.id";
        return $this->db->query($sql)->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM producto WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(array $d): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO producto (nombre, precio, id_proveedor)
             VALUES (:nombre, :precio, :id_proveedor)"
        );
        return $stmt->execute($d);
    }

    public function update(int $id, array $d): bool
    {
        $d['id'] = $id;
        $stmt = $this->db->prepare(
            "UPDATE producto SET nombre=:nombre, precio=:precio,
             id_proveedor=:id_proveedor WHERE id=:id"
        );
        return $stmt->execute($d);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM producto WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
