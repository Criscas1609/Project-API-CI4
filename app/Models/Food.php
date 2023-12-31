<?php

namespace App\Models;

use CodeIgniter\Model;

class Food extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'food';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'location',
        'instruction',
        'image',
        'status',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation

    protected $validationRules = [
        'name' => 'required',
        'location' => 'required',
        'instruction' => 'required',
        'image' => 'required',
        'status' => 'required',
    ];

    

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


    public function isTableEmpty()
    {
        return $this->countAllResults() === 0;
    }

    public function getAllFood() {
        return $this->findAll();
    }

    public function saveFood($data){
        $this->insert($data);
    }

    public function get_by_name($name){
        $food = $this->where('LOWER(name) LIKE', '%' . strtolower($name) . '%')->first();
        return $food;
    }


}
