<?php

namespace App\Controllers\Api;

use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Migration extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function getindex()
    {
        // Retrieve header token
        $token = $this->request->getHeaderLine('Authorization');
        // Retrieve token as define in .env
        $staticToken = getenv('ENV_TOKEN');
        if ($token !== $staticToken) {
            return $this->failUnauthorized('Invalid token');
        }
        $migrations = Services::migrations();
        try {
            // Execute all migrations
            $migrations->latest();

            // Return success with code 200
            return $this->respond(['message' => "Migrations successful!"], 200);
        } catch (\Exception $e) {
            // Return error message
            return $this->respond(['message' => "Migrations unsuccessful. An error occurred: " . $e->getMessage()], 500);
        }
    }
}