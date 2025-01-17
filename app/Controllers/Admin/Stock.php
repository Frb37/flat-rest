<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Stock extends BaseController
{
    public function getindex()
    {
        // When ID is defined, toggle Edit Mode
        if ($id) {

            $orders = model('OrderModel')->getAllOrdersByEmployeeAndCustomerNames();
            return $this->view('/admin/order/index.php', ['orders' => $orders], true);
        } else {
            $this->addBreadcrumb('Stocks', 'admin/stocks');
            $order = model('App\Models\StockMoveModel')->getAllStockMoves();
            return $this->view('admin/stock/order.php', ['order' => $order], true);
        }
    }
}
