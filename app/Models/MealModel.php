<?php

namespace App\Models;

use CodeIgniter\Model;

class MealModel extends Model
{
    protected $table            = 'meal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'name', 'category', 'price'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllMeals()
    {
        return $this->findAll();
    }

    public function getMealById($id)
    {
        return $this->find($id);
    }

    public function getMealByIdWithCategs($id) {
        $builder = $this->db->table('meal');
        $builder->select('meal.name, meal.price, meal_category.name');
        $builder->join('meal_category', 'meal_category.id = meal.category_id');
        $builder->where('meal.id', $id);
    }

    public function getMealByName($name)
    {
        return $this->where('name', $name)->first();
    }

    public function getAllMealsByCategory($category)
    {
        return $this->where('category', $category)->findAll();
    }

    public function createMeal($data)
    {
        return $this->insert($data);
    }

    public function updateMeal($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteMeal($id)
    {
        return $this->delete($data);
    }
}
