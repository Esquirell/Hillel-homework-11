<?php


namespace App\Http\Services;


use App\Http\Repositories\CostRepositoryInterface;
use App\Models\Cost;
use Illuminate\Database\Eloquent\Collection;

class CostService implements CostServiceInterface
{

    private $costRepository;

    public function __construct(CostRepositoryInterface $costRepository)
    {
        $this->costRepository = $costRepository;
    }

    public function getCostByCategory($categoryName)
    {
        $name = $categoryName->get('tar');
        return $costs = $this->costRepository->findByCategory($name);
    }

    public function getCostById(int $id): Cost
    {
        $cost = $this->costRepository->findById($id);
        if (!$cost) {
            throw new \Exception('Cost not found');
        }
        return $cost;
    }

    public function getAllCosts(int $page = null): Collection
    {

    }

    public function createCost($costData)
    {
        $this->costRepository->addCost($costData);
    }

    public function updateCost(int $id, array $costData): int
    {

        $cost = $this->costRepository->findById($id);


        $this->costRepository->save($cost, $costData);

        return $cost->id;

    }

    public function deleteCost(int $id): void
    {
        $cost = $this->costRepository->deleteById($id);
    }



}
