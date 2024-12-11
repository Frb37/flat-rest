<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderRatingModel extends Model
{
    protected $table            = 'order_rating';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function getAllOrderRatings()
    {
        return $this->findAll();
    }

    public function getAllOrderRatingsByCustomerNames($customer_first, $customer_last)
    {
        $builder = $this->db->table('order_rating or');
        $builder->select('u.first_name, u.last_name, or.value, or.created_at, or.updated_at');
        $builder->join('user u', 'or.customer_id = u.id');
        $builder->join('order o', 'or.order_id = o.id');
        $builder->where('u.customer_first', $customer_first);
        $builder->where('u.customer_last', $customer_last);

        return $builder->get()->getResultArray();
    }

}
