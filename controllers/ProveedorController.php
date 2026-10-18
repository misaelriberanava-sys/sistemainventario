<?php
require_once __DIR__ . '/../models/Proveedor.php';

class ProveedorController
{
    private Proveedor $model;

    public function __construct()
    {
        $this->model = new Proveedor();
    }

    public function index(): void
    {
        $proveedores = $this->model->all();
        require __DIR__ . '/../views/proveedores/index.php';
    }

    public function create(): void
    {
        $p = null;
        require __DIR__ . '/../views/proveedores/form.php';
    }

    public function edit(): void
    {
        $p = $this->model->find((int) $_GET['id']);
        require __DIR__ . '/../views/proveedores/form.php';
    }

    public function store(): void
    {
        $this->model->create($_POST);
        header('Location: ?c=proveedor&a=index');
        exit;
    }

    public function update(): void
    {
        $this->model->update((int) $_POST['id'], $_POST);
        header('Location: ?c=proveedor&a=index');
        exit;
    }

    public function delete(): void
    {
        $this->model->delete((int) $_GET['id']);
        header('Location: ?c=proveedor&a=index');
        exit;
    }
}
