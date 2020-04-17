<?php


namespace App\Http\Services;
use App\Models\Category;

class CategoryService implements CategoryServiceInterface
{

    public function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }

}
