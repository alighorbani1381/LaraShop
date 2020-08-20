<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Filter;
use App\Product;
use App\ProductFilter;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function searchProduct(Request $request)
    {
        $this->validate(request(), ['search' => 'required']);
        if ($request->ajax()) {
            $searchTxt = $request->input('search');
            $products = Product::where('name', 'like', $searchTxt . '%')->orderBy('name', 'asc')->get();
            if ($products->count() > 0)
                return response()->json(['successfuly' => 'true', 'products' => $products]);
            else
                return response()->json(['successfuly' => 'false']);
        }
    }


    public function index()
    {
        return redirect()->route('index');
    }

    public function create()
    {
        return redirect()->route('index');
    }

    public function store(Request $request)
    {
        return redirect()->route('index');
    }

    /**
     * Show Detail of Product
     */
    public function show(Product $product)
    {
        $relatedProducts = Product::where([['category_id', $product->category_id], ['id', '!=', $product->id]])->limit(7)->get();
        $bestSelers = Product::where([['category_id', $product->category_id], ['id', '!=', $product->id]])->orderBy('name', 'asc')->orderBy('bestseler', 'desc')->limit(6)->get();
        $specialProducts = Product::where([['special', 1],  ['category_id', $product->category_id], ['id', '!=', $product->id]])->orderBy('name', 'asc')->orderBy('special', 'Desc')->limit(6)->get();
        $category = Category::find($product->category_id);
        $productComments = Comment::where('product_id', $product->id)->where('shared', '1')->orderBy('created_at', 'desc')->paginate('5');
        $productFilters = ProductFilter::where('product_id', $product->id)->get();
        if (!$productFilters->isEmpty()) {
            $properties['hasProp'] = true;
            foreach ($productFilters as $productFilter) {
                $properties['filter'][] = $productFilter->filter->id;
                $properties['parent'][] = $productFilter->filter->parent_id;
            }

            $parentsId = (array_unique($properties['parent']));
            $parentFilters = Filter::find($parentsId);

            $properties['parentFilters'] = $parentFilters;
            $properties['productFilters'] = $productFilters;
        } else {

            $properties['hasProp'] = false;
        }




        return view('Default.Product.Product-Detail', compact('product', 'properties', 'productComments', 'relatedProducts', 'bestSelers', 'specialProducts'));
    }


    public function edit(Product $product)
    {
        return redirect()->route('index');
    }



    public function update(Request $request, Product $product)
    {
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return redirect()->route('index');
    }
}
