<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Item extends ResourceController
{
    public function gettest() {
        $data = $this->request->getGet();
        $data_post = $this->request->getPost();
        return $this->response->setJSON([
            'response' => "Le problème du temps, c'est un non problème",
            'data' => $data,
            'data_post' => $data_post
        ]);
    }

    public function posttest()
    {
        $data = $this->request->getGet();
        $data_post = $this->request->getPost();
        return $this->response->setJSON([
            'response' => "Le problème du temps, c'est un non problème",
            'data' => $data,
            'data_post' => $data_post
        ]);
    }

    public function getindex() {
        $data = $this->request->getGet();
        if (isset($data['id'])) {
            $im = Model('ItemModel');
            $item = $im->getItem($data['id']);
            if ($item) {
                return $this->response->setJSON([
                    'message' => 'success',
                    'item' => $item
                ]);
            }
            else {
                return $this->response->setJSON([
                    'message' => 'ID undefined. Error while parsing ID'
                ]);
            }
        }
        return $this->response->setJSON([
            'message' => "Error. No information parsed in URL",
        ]);
    }

    public function postindex()
    {
        $data = $this->request->getPost();
        if (isset($data['name'])) {
            $im = Model('ItemModel');
            $id_item = $im->insertItem($data);
            if ($id_item) {
                $item = $im->getItem($id_item);
                return $this->response->setJSON([
                    'message' => 'Object was added successfully',
                    'item' => $item
                ]);
            } else {
                return $this->response->setJSON([
                    'message' => 'Error. Object could not be added',
                ]);
            }
        } else {
            return $this->response->setJSON([
                'message' => "Error. Item name is required in request",
            ]);
        }
    }

    public function getitems() {
        $data = $this->request->getGet();
        $page = $data['page']?? 1;
        $perPage = $data['perPage']?? 12;
        $filters = [];

        if (isset($data['search']) && $data['search']) {
            $filters['search'] = $data['search'];
        }
        if (isset($data['username']) && $data['username']) {
            $filters['username'] = $data['username'];
        }
        if (isset($data['type']) && $data['type']) {
            $filters['type'] = $data['type'];
        }
        if (isset($data['brand']) && $data['brand']) {
            $filters['brand'] = $data['brand'];
        }
        if (isset($data['license']) && $data['license']) {
            $filters['license'] = $data['license'];
        }

        $im = model('ItemModel');

        $items = $im->getAllItemsFiltered($filters, 1, $perPage, $page);

        $pager = $im->pager;

        return $this->response->setJSON([
            'items' => $items,
            'current_page' => $pager->getCurrentPage(),
            'totalPages' => $pager->getPageCount()
        ]);
    }
}