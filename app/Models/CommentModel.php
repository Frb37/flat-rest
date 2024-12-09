<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'comment';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'user_id', 'order_id', 'content', 'parent_id'];

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

    // 'get' functions

    public function getAllComments()
    {
        return $this->findAll();
    }

    public function getCommentById($id)
    {
        return $this->find($id);
    }

    public function getCommentsByUserId($user_id)
    {
        return $this->where('user_id', $user_id)->findAll();
    }

    public function getCommentsByOrderId($order_id)
    {
        return $this->where('order_id', $order_id)->findAll();
    }

    public function getCommentsByParentId($parent_id)
    {
        return $this->where('parent_id', $parent_id)->findAll();
    }

    public function getAllCommentsWithUsername()
    {
        $builder = $this->db->table('comment');
        $builder->select('comment.id, user.first_name, user.last_name, order.id, comment.created_at, comment.updated_at, comment.deleted_at');
        $builder->join('user', 'user.id = comment.user_id');
        $builder->join('order', 'order.id = comment.order_id');
    }

    // 'insert' functions

    public function insertComment($data)
    {
        return $this->insert($data);
    }

    // 'update' functions
    public function updateComment($data)
    {
        return $this->update($data['id'], $data);
    }
}
