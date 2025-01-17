<?php

namespace App\Models;

use CodeIgniter\Model;

class ProviderModel extends Model
{
    protected $table            = 'provider';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'name', 'address', 'city_id'];

    public function getAllProviders()
    {
        return $this->findAll();
    }

    public function getProviderById($id)
    {
        return $this->find($id);
    }

    public function getProviderByName($name)
    {
        return $this->where('name', $name)->first();
    }

    public function getProviderByCityId($cityId)
    {
        return $this->where('city_id', $cityId)->first();
    }
}
