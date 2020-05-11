<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::paginate(2);
        return $data;
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->category_name;
        $category->active = rand(0, 1);
        $category->save();

        return $category;
    }

    public function delete($id)
    {
        Category::find($id)->delete();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->category_name;
        $category->update();

        return $category;
    }
}
