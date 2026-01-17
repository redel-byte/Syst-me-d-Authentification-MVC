<?php

require_once __DIR__ . "../core/Validator.php";
require_once __DIR__ . "../core/";

class Logincontroller
{
    private $email = $_POST['email'];
    private $password = $_POST['password'];

   protected function redirect($url)
    {
        header("Location: {$url}");
        exit();
    }

    protected function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    protected function requireAuth(): void
    {
        if (!$this->isLoggedIn()) {
            $this->redirect('/login');
        }
    }
}


