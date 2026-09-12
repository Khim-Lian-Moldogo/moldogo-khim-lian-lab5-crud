<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    protected $productModel;

    public function __construct()
    {
        parent::__construct();

        $this->productModel = new ProductModel();
    }


    // =========================
    // ADMIN ONLY CHECK
    // =========================

    private function adminOnly()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        ) {
            echo "Access denied. Admin only.";
            exit;
        }
    }


    // =========================
    // SHOW PRODUCTS
    // =========================

    public function index()
    {
        $data['products'] = $this->productModel->getAllProducts();

        $this->call->view('products/index', $data);
    }


    // =========================
    // ADD PRODUCT PAGE
    // ADMIN ONLY
    // =========================

    public function create()
    {
        $this->adminOnly();

        $this->call->view('products/create');
    }


    // =========================
    // SAVE PRODUCT
    // ADMIN ONLY
    // =========================

    public function store()
    {
        $this->adminOnly();

        $data = [
            'product_name' => $_POST['product_name'] ?? '',
            'description'  => $_POST['description'] ?? '',
            'price'        => $_POST['price'] ?? 0,
            'quantity'     => $_POST['quantity'] ?? 0
        ];

        $this->productModel->createProduct($data);

        header('Location: /products');
        exit;
    }


    // =========================
    // EDIT PRODUCT PAGE
    // ADMIN ONLY
    // =========================

    public function edit($id)
    {
        $this->adminOnly();

        $data['product'] = $this->productModel->getProduct($id);

        if (!$data['product']) {
            echo "Product not found.";
            return;
        }

        $this->call->view('products/edit', $data);
    }


    // =========================
    // UPDATE PRODUCT
    // ADMIN ONLY
    // =========================

    public function update($id)
    {
        $this->adminOnly();

        $data = [
            'product_name' => $_POST['product_name'] ?? '',
            'description'  => $_POST['description'] ?? '',
            'price'        => $_POST['price'] ?? 0,
            'quantity'     => $_POST['quantity'] ?? 0
        ];

        $this->productModel->updateProduct($id, $data);

        header('Location: /products');
        exit;
    }


    // =========================
    // DELETE PRODUCT
    // ADMIN ONLY
    // =========================

    public function delete($id)
    {
        $this->adminOnly();

        $this->productModel->deleteProduct($id);

        header('Location: /products');
        exit;
    }
}