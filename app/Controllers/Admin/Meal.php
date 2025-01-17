<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Meal extends BaseController
{
    protected $title = "Meal";
    protected $require_auth = true;
    protected $requiredPermissions = ['administrateur'];
    protected $breadcrumb =  [['text' => 'Tableau de Bord','url' => '/admin/dashboard']];
    public function getindex($id = null)
    {
        // When ID is defined, toggle Edit Mode
        if ($id) {
            $meal = model('MealModel')->getMealByIdWithCategs($id);
            return $this->view('admin/meal/index.php', ['meal' => $meal]);
        } else {
            $this->addBreadcrumb('Meals', 'admin/meals');
            $meals = model('MealModel')->getAllMealsWithCategNames();
            return $this->view('/admin/meal/index.php', ['meals' => $meals]);
        }
    }

    public function postSearchMeal()
    {
        $UserModel = model('App\Models\MealModel');

        // Paramètres de pagination et de recherche envoyés par DataTables
        $draw        = $this->request->getPost('draw');
        $start       = $this->request->getPost('start');
        $length      = $this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];

        // Obtenez les informations sur le tri envoyées par DataTables
        $orderColumnIndex = $this->request->getPost('order')[0]['column'] ?? 0;
        $orderDirection = $this->request->getPost('order')[0]['dir'] ?? 'asc';
        $orderColumnName = $this->request->getPost('columns')[$orderColumnIndex]['data'] ?? 'id';


        // Obtenez les données triées et filtrées
        $data = $UserModel->getPaginatedUser($start, $length, $searchValue, $orderColumnName, $orderDirection);

        // Obtenez le nombre total de lignes sans filtre
        $totalRecords = $UserModel->getTotalMeal();

        // Obtenez le nombre total de lignes filtrées pour la recherche
        $filteredRecords = $UserModel->getFilteredMeal($searchValue);

        $result = [
            'draw'            => $draw,
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data'            => $data,
        ];
        return $this->response->setJSON($result);
    }
}
