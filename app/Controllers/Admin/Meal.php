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
            return $this->view('admin/meal/index', ['meal' => $meal]);
        } else {
            $this->addBreadcrumb('Meals', 'admin/meals');
            $meals = model('MealModel')->getAllMeals();
            $categs = model('MealCategoryModel')->getAllCategs();
            return $this->view('/admin/meals/index', ['categs' => $categs, 'meals' => $meals]);
        }
    }
}
