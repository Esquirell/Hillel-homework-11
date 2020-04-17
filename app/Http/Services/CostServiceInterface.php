<?php


namespace App\Http\Services;


use App\Models\Cost;
use Illuminate\Database\Eloquent\Collection;

interface CostServiceInterface
{
    public function getCostById(int $id): Cost;

    public function getAllCosts(int $page = null): Collection;

    public function createCost(array $costData);

    public function updateCost(int $id, array $costData): int;

    public function deleteCost(int $id): void;

    public function getCostByCategory($categoryName);
}
