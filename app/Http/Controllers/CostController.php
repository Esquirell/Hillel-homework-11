<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryServiceInterface;
use App\Http\Services\CostServiceInterface;
use Illuminate\Http\Request;

class CostController extends Controller
{
    private $costService;
    private $categoryService;

    public function __construct(CostServiceInterface $costService, CategoryServiceInterface $categoryService)
    {
        $this->costService = $costService;
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->getCategories();
        $costs = $this->costService->getCostByCategory($request);
        return view('costs.index', compact('costs', 'categories', 'request'));
    }

    public function create()
    {
        $categories = $this->categoryService->getCategories();
        return view('costs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'sum' => 'required',
                'source' => 'required',
                'comment' => 'required'
            ]);
            $this->costService->createCost($request);
            return redirect(route('costs.index'));
        } catch (\Exception $e) {
            return redirect(route('costs.create'));
        }
    }


    public function show($id)
    {
        $cost = $this->fetchCostOrFail($id);
        return view('costs.show', compact('cost'));
    }


    public function edit($id)
    {
        $cost = $this->fetchCostOrFail($id);
        $categories = $this->categoryService->getCategories();
        return view('costs.edit', compact('cost','categories'));
    }


    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'sum' => 'required',
                'source' => 'required',
                'comment' => 'required'
            ]);
            $this->costService->updateCost($id, $request->all());
            return redirect(route('costs.show', ['cost'=> $id]));
        } catch (\Exception $e) {
            return redirect(route('costs.edit', ['cost'=> $id]));
        }
    }


    public function destroy($id)
    {
        $this->costService->deleteCost($id);
        return redirect(route('costs.index'));
    }

    private function fetchCostOrFail(int $id)
    {
        try {
            return $this->costService->getCostById($id);
        } catch (\Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}
