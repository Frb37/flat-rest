<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Order extends BaseController
{
    public function getindex($id = null)
    {
        // When ID is defined, toggle Edit Mode
        if ($id) {
            $order = model('OrderModel')->getOrderById($id);
            return $this->view('admin/order/order.php', ['order' => $order], true);
        } else {
            $this->addBreadcrumb('Orders', 'admin/orders');
            $orders = model('OrderModel')->getAllOrdersByEmployeeAndCustomerNames();
            return $this->view('/admin/order/index.php', ['orders' => $orders], true);
        }
    }
}
