<?php

namespace App\Models;

use CodeIgniter\Model;

class IngredientModel extends Model
{
    protected $table            = 'ingredient';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'name', 'quantity', 'category_id', 'provider_id'];

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

    public function getAllIngredients()
    {
        return $this->findAll();
    }

    public function getIngredientById($id)
    {
        return $this->find($id);
    }

    public function getIngredientByName($name)
    {
        return $this->where('name', $name)->first();
    }

    public function getIngredientsByCategoryId($id)
    {
        return $this->where('category_id', $id)->findAll();
    }

    public function getIngredientsByProviderId($id)
    {
        return $this->where('provider_id', $id)->findAll();
    }

    public function getIngredientsByCategoryName($categ_name)
    {
        $builder = $this->db->table('ingredient i');
        $builder->select('*');
        $builder->join('ingredient_category ic', 'ic.id = i.category_id');
        $builder->where('ic.name', $categ_name);
        return $builder->get()->getResultArray();
    }
}
