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
            $this->addBreadcrumb('Meals', 'admin/meals');
            $categ = model('MealCategoryModel')->getAllCategs();
        }
    }
}
