<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    protected $format = 'json';
    public function postgeneratetoken()
    {
        $email = $this->request->getPost('mail');
        $password = $this->request->getPost('password');

        $um = Model('UserModel');
        $user = $um->verifyLogin($email, $password);

        if (!$user) {
            return $this->failUnauthorized('Invalid credentials');
        }

        $token = generateToken($user['id']);
        return $this->respond(['token' => $token]);
    }

    public function getprotecteddata() {
        $token = $this->request->getHeaderLine('Authorization');

        if ($token && preg_match('/Bearer\s(\S+)/', $token, $matches)) {
            $userId = ValidateToken($matches[1]);

            if ($userId) {
                return $this->respond(['message' => 'Access granted', 'data' => 'This is protected data']);
            }
        }

        return $this->failUnauthorized('Invalid or expired token');
    }
}
