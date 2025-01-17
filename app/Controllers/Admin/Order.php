<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Order extends BaseController
{
    public function getindex()
    {
        echo "Commandes en cours";
    }
}
