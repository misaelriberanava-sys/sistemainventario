<?php
require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Proveedor.php';

class ProductoController
{
    private Producto $model;

    public function __construct()
    {
        $this->model = new Producto();
    }

    public function index(): void
    {
        $productos = $this->model->allConProveedor();
        require __DIR__ . '/../views/productos/index.php';
    }

    public function create(): void
    {
        $p = null;
        $proveedores = (new Proveedor())->all();
        require __DIR__ . '/../views/productos/form.php';
    }

    public function edit(): void
    {
        $p = $this->model->find((int) $_GET['id']);
        $proveedores = (new Proveedor())->all();
        require __DIR__ . '/../views/productos/form.php';
    }

    public function store(): void
    {
        $this->model->create($_POST);
        header('Location: ?c=producto&a=index');
        exit;
    }

    public function update(): void
    {
        $this->model->update((int) $_POST['id'], $_POST);
        header('Location: ?c=producto&a=index');
        exit;
    }

    public function delete(): void
    {
        $this->model->delete((int) $_GET['id']);
        header('Location: ?c=producto&a=index');
        exit;
    }
}
