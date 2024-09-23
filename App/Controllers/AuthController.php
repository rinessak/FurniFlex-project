<?php


namespace App\Controllers;

use App\Helper\Session;
use App\Models\User;
use \Core\View;
use \Core\Controller;

class AuthController extends Controller
{
    // Display login form
    public function loginForm()
    {
        $session = Session::getInstance();
        $message = $session->message ?? '';

        if ($session->isSignedIn()) {
            // Redirect user based on their role
            $this->redirectBasedOnRole();
        }

        View::renderTemplate('Users/login.html', ['message' => $message]);
    }

    // Handle user login
    public function store()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Find user by email
        $user = User::where('email', $email)->first();
        $session = Session::getInstance();

        // Directly compare the plain text password
        if ($user && $password === $user->password) {
            // Successful login, set session
            $session->login($user);

            // Redirect based on the user role
            $this->redirectBasedOnRole();
            exit;
        }

        // If login fails
        $session->message("Your email or password is incorrect");
        header('Location: /login');
        exit;
    }

    // Handle user logout
    public function logout()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login');
            exit;
        }

        $session->logout();
        header('Location: /login');
        exit;
    }

    // Redirect users based on their role after login
    private function redirectBasedOnRole()
    {
        $session = Session::getInstance();
        $user = User::find($session->userId);

        if ($user->role === 'admin') {
            header('Location: /admin/dashboard');
        } elseif ($user->role === 'company') {
            header('Location: /company/dashboard');
        } else {
            header('Location: /login');
        }
        exit;
    }

}
