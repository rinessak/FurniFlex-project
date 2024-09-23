<?php

namespace App\Helper;

class Session
{
    private static $instances = [];
    private $signedIn = false;
    public $userId;
    public $userRole; // New
    public $message;

    private function __construct()
    {
        session_start();
        $this->checkLogin();
        $this->checkMessage();
    }

    public static function getInstance(): Session
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function isSignedIn()
    {
        return $this->signedIn;
    }

    private function checkLogin()
    {
        if (isset($_SESSION['userId'])) {
            $this->userId = $_SESSION['userId'];
            $this->userRole = $_SESSION['userRole']; // Store user role in session
            $this->signedIn = true;
        } else {
            unset($this->userId, $this->userRole);
            $this->signedIn = false;
        }
    }

    public function login($user)
    {
        if ($user) {
            $this->userId = $user->id;
            $_SESSION['userId'] = $user->id;
            $_SESSION['userRole'] = $user->role; // Store the user role
            $this->signedIn = true;
        }
    }

    public function logout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['userRole']); // Unset role
        unset($this->userId, $this->userRole);
        $this->signedIn = false;
    }

    public function message($msg = "")
    {
        if (!empty($msg)) {
            $this->message = $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    private function checkMessage()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }
}
