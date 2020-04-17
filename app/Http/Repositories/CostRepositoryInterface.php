<?php


namespace App\Http\Repositories;


use App\Models\Cost;

interface CostRepositoryInterface
{
    public function findById(int $id);
    public function save(Cost $cost, array $data);
    public function findByCategory($name);
    public function addCost($data);
    public function deleteById($id);
}
