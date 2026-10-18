<?php
require_once __DIR__ . '/../config/Database.php';

class Proveedor
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function all(): array
    {
        return $this->db
            ->query("SELECT * FROM proveedor ORDER BY id")
            ->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM proveedor WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(array $d): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO proveedor (nit, nombre, direccion, telefono, correo)
             VALUES (:nit, :nombre, :direccion, :telefono, :correo)"
        );
        return $stmt->execute($d);
    }

    public function update(int $id, array $d): bool
    {
        $d['id'] = $id;
        $stmt = $this->db->prepare(
            "UPDATE proveedor SET nit=:nit, nombre=:nombre, direccion=:direccion,
             telefono=:telefono, correo=:correo WHERE id=:id"
        );
        return $stmt->execute($d);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM proveedor WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
