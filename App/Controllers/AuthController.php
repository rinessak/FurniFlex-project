<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\User;
use \Core\View;
use \Core\Controller;

class AuthController extends Controller
{
    public function loginForm()
    {
        $session = Session::getInstance();
        $message = '';
        if (!empty($session->message)) {
            $message = $session->message;
        }

        if (isset($_SESSION['userId'])) {
            header('Location: /companies');
            exit;
        }

        View::renderTemplate('Frontend/login.html', ['message' => $message]);
    }

    public function store()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::where('email', $email)->where('password', $password)->latest()->first();
        $session = Session::getInstance();

        if ($user) {
            if ($user->role === 'admin') {
                $session->login($user);
                header('Location: /admin/dashboard');
                exit;
            } else {
                $session->message("Your email or password is incorrect");
                header('Location: /login');
                exit;
            }
        }

        $session->message("Your email or password is incorrect");
        header('Location: /login');
        exit;
    }

    public function logout()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login');
            exit;
        }

        $session->logout();
        header('Location: /');
        exit;
    }
}

