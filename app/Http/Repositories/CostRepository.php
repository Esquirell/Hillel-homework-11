<?php


namespace App\Http\Repositories;


use App\Models\Category;
use App\Models\Cost;
use Illuminate\Support\Facades\Auth;

class CostRepository implements CostRepositoryInterface
{

    private $model;
    private $modelCategory;

    public function __construct()
    {
        $this->model = app()->make(Cost::class);
        $this->modelCategory = app()->make(Category::class);
    }

    public function findByCategory($name)
    {
        if ($name != 0) {
            $costs = $this->modelCategory->find($name)->costs()->get();
        } else {
            $costs = Cost::all();
            //dd($costs);
        }
        return $costs;
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function save(Cost $cost, array $data)
    {
        $cost->sum = $data['sum'];
        $cost->source = $data['source'];
        $cost->comment = $data['comment'];
        $cost->category_id = $data['tar'];
        $cost->save();
    }


    public function addCost($data)
    {
        try {
            $cost = new Cost();
            $cost->sum = $data['sum'];
            $cost->source = $data['source'];
            $cost->comment = $data['comment'];

            $category = $data->get('tar');
            $cost->category()->associate($category);

            $user = Auth::user();
            $cost->user()->associate($user);

            $cost->save();
        } catch (\Exception $e) {
            abort(404);
        }

    }

    public function deleteById($id)
    {
        $cost = $this->findById($id);
        $cost->delete();
    }

}
