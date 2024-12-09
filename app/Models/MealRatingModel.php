<?php

namespace App\Models;

use CodeIgniter\Model;

class MealRatingModel extends Model
{
    protected $table            = 'meal_rating';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'customer_id', 'meal_id', 'value'];

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

    public function getAllMealRatings()
    {
        return $this->findAll();
    }

    public function getAllRatingsByMealName($meal_name)
    {
        $builder = $this->db->table('meal_rating mr');
        $builder->select('m.name, mr.value');
        $builder->join('meal m', 'm.id = mr.meal_id');
        $builder->where('m.name', $meal_name);

        return $builder->get()->getResultArray();
    }

    public function getAllRatingsByCustomerNames($customer_first, $customer_last)
    {
        $builder = $this->db->table('meal_rating mr');
        $builder->select('u.first_name, u.last_name, m.name, mr.value, mr.created_at, mr.updated_at');
        $builder->join('user u', 'u.id = mr.customer_id');
        $builder->join('meals m', 'm.id = mr.meal_id');
        $builder->where('u.first_name', $customer_first);
        $builder->where('u.last_name', $customer_last);

        return $builder->get()->getResultArray();
    }
}
