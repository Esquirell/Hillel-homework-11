<?php


namespace App\Http\Repositories;


use App\Models\Profit;

interface ProfitRepositoryInterface
{
    public function findById(int $id);
    public function save(Profit $profit, array $data);
    public function findByCategory($name);
    public function addProfit($data);
    public function deleteById($id);
}
