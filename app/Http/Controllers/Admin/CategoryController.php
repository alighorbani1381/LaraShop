<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class CategoryController extends AdminController
{

    # Show List of Category
    public function index(Request $request)
    {
        $categories = $this->search(Category::class, 'title', $request->all());
        return view('Admin.Category.index', compact('categories'));
    }

    # Create Category
    public function create()
    {
        $subsets = Category::where('subset', 0)->get();
        return view('Admin.Category.CategoryAdd', compact('subsets'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), ["title" => 'required', "subset" => 'required',]);
        Category::create(["title" => $request['title'], "subset" => $request['subset'],]);
        return redirect(route('category.index'));
    }


    public function show(Category $category)
    {
    }


    public function edit(Category $category)
    {
        $subsets = Category::where([
            ['subset', 0],
            ['id', '!=', $category->id]
        ])->get();
        return view('Admin.Category.CategoryEdit', compact('category', 'subsets'));
    }


    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect(route('category.index'));
    }


    public function destroy(Category $category)
    {
        $errorMessage = null;
        $subCategories = $category->sub_categories;
        $products = Product::where('category_id', $category->id)->get();
        $filters = $category->filters()->get();

        if ($subCategories->count() != 0)
            foreach ($subCategories as $subCategory) $errorMessage .= $subCategory->title;

        else if ($filters->count() != 0)
            foreach ($filters as $filter) $errorMessage .= $filter->persian_name;

        else if ($products->count() != 0)
            foreach ($category->products() as $product) $errorMessage .= $product->name;

        else if ($errorMessage != null)
            session()->flash('delete', $errorMessage);
        else
            $category->delete();



        return redirect()->route('category.index');
    }
}
