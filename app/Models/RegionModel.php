<?php

namespace App\Models;

use CodeIgniter\Model;

class RegionModel extends Model
{
    protected $table            = 'region';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'name'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    public function createRegion($data) {
        return $this->insert($data);
    }
    public function getRegionById($id)
    {
        return $this->find($id);
    }

    public function updateRegion($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteRegion($id)
    {
        return $this->delete($id);
    }
}
