<?php


namespace App\Http\Services;


use App\Http\Repositories\ProfitRepositoryInterface;
use App\Models\Profit;
use Illuminate\Database\Eloquent\Collection;

class ProfitService implements ProfitServiceInterface
{

    private $profitRepository;

    public function __construct(ProfitRepositoryInterface $profitRepository)
    {
        $this->profitRepository = $profitRepository;
    }


    public function getProfitByCategory($categoryName)
    {
        $name = $categoryName->get('tar');
        //dd($categoryName);
        return $profits = $this->profitRepository->findByCategory($name);
    }


    public function getProfitById(int $id)
    {
        $profit = $this->profitRepository->findById($id);
        if (!$profit) {
            throw new \Exception('Profit not found');
        }

        return $profit;
    }

    public function getAllProfits(int $page = null): Collection
    {
        // TODO: Implement getAllProfits() method.
    }

    public function createProfit($profitData)
    {
        $this->profitRepository->addProfit($profitData);
    }

    public function updateProfit(int $id, array $profitData): int
    {

        $profit = $this->profitRepository->findById($id);


        $this->profitRepository->save($profit, $profitData);

        return $profit->id;
    }




    public function deleteProfit(int $id): void
    {
        $profit = $this->profitRepository->deleteById($id);
    }



}
