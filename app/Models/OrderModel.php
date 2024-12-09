<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'order';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'customer_id', 'employee_id', 'meal_id', 'quantity'];

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

    public function getOrderById($id)
    {
        return $this->find($id);
    }

    public function getOrdersByCustomerId($customer_id)
    {
        return $this->where('customer_id', $customer_id)->findAll();
    }

    public function getOrdersByCustomerNames($customer_first, $customer_last)
    {
        $builder = $this->db->table('order o');
        $builder->select('');
    }

    public function getOrdersByEmployeeId($employee_id)
    {
        return $this->where('employee_id', $employee_id)->findAll();
    }

    public function getOrdersByEmployeeAndCustomerNames($employee_first, $employee_last)
    {
        $builder = $this->db->table('order o');
        $builder->select('o.id, u.first_name, u.last_name, o.customer_id, o.employee_id, o.meal_id, o.quantity, o.created_at, o.updated_at, o.deleted_at');
        $builder->join('user u', 'u.id = o.employee_id');
        $builder->where('o.employee_id', $employee_first);
        $builder->where('o.employee_id', $employee_last);
    }
}
