<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryServiceInterface;
use App\Http\Services\ProfitServiceInterface;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    private $profitService;
    private $categoryService;

    public function __construct(ProfitServiceInterface $profitService, CategoryServiceInterface $categoryService)
    {
        $this->profitService = $profitService;
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->getCategories();
        $profits = $this->profitService->getProfitByCategory($request);
        return view('profits.index', compact('profits', 'categories', 'request'));
    }

    public function create()
    {
        $categories = $this->categoryService->getCategories();
        return view('profits.create', compact('categories'));
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'sum' => 'required',
                'source' => 'required',
                'comment' => 'required'
            ]);
            //dd($request);
            $this->profitService->createProfit($request);
            return redirect(route('profits.index'));
        } catch (\Exception $e) {
            return redirect(route('profits.create'));
        }

    }

    public function show($id)
    {
        $profit = $this->fetchProfitOrFail($id);
        return view('profits.show', compact('profit'));
    }

    public function edit($id)
    {
        $profit = $this->fetchProfitOrFail($id);
        $categories = $this->categoryService->getCategories();
        return view('profits.edit', compact('profit', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'sum' => 'required',
                'source' => 'required',
                'comment' => 'required'
            ]);
            $this->profitService->updateProfit($id, $request->all());
            return redirect(route('profits.show', ['profit' => $id]));
        } catch (\Exception $e) {
            return redirect(route('profits.edit', ['profit' => $id]));
        }
    }





    public function destroy($id)
    {
        $this->profitService->deleteProfit($id);
        return redirect(route('profits.index'));
    }


    private function fetchProfitOrFail(int $id)
    {
        try {
            return $this->profitService->getProfitById($id);
        } catch (\Exception $e) {
            abort(404, $e->getMessage());
        }
    }

}
