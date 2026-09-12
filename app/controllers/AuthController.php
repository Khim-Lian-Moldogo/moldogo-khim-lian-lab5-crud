<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        parent::__construct();

        $this->userModel = new UserModel();
    }

    public function register()
    {
        $this->call->view('auth/register');
    }

    public function storeUser()
    {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        if ($username === '' || $password === '' || $confirm_password === '') {
            echo "Please complete all fields.";
            return;
        }

        if ($password !== $confirm_password) {
            echo "Passwords do not match.";
            return;
        }

        $existingUser = $this->userModel->getUserByUsername($username);

        if ($existingUser) {
            echo "Username already exists.";
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $username,
            'password' => $hashedPassword,
            'role' => 'user'
        ];

        $this->userModel->createUser($data);

        header('Location: /login');
        exit;
    }

    public function login()
    {
        $this->call->view('auth/login');
    }

    public function authenticate()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->getUserByUsername($username);

        if (!$user) {
            echo '<p style="color: red;">Username not found.</p>';
            echo '<a href="/login">Try Again</a>';
            return;
        }

        if (!password_verify($password, $user['password'])) {
            echo '<p style="color: red;">Incorrect password. Please try again.</p>';
            echo '<a href="/login">Try Again</a>';
            return;
        }

        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header('Location: /products');
        exit;
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();

        header('Location: /login');
        exit;
    }
}