<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Filter;
use App\Product;
use App\ProductFilter;
use Illuminate\Http\Request;

class ProductfilterController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //if($request->search)
        $products=$this->search(Product::class,'name',$request->all());    
		return view('Admin.Product-Filter.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $productId=$request->input('product');
        $product=Product::findOrFail($productId);
        $subCategory=Category::find($product->category_id);
        $category=Category::find($subCategory->subset);
        
        if($category == null)
            return "ابتدا شما باید ویژگی ها را برای دسته بندی مادر این محصولات تنظیم کنید";

        $oldFilters=ProductFilter::where('product_id', $product->id)->get('filter_id');
        
        // if($oldFilters->count() == 0)
        //     return "ابتدا شما باید ویژگی ها را برای دسته بندی مادر این محصولات تنظیم کنید";

        foreach($oldFilters as $oldFilter)
             $condition[]=['id','!=',$oldFilter->filter_id];
        $condition[]=['parent_id' , '!=', 0];

        
        
        $allFilter=$category->filters()->count();
        $parentFilters=Filter::where([ ['parent_id', 0], ['category_id', $category->id] ])->count();
        $fullFilter=$oldFilters->count();
        $notAccessFilter=$fullFilter + $parentFilters;

        if($allFilter != $notAccessFilter){
            $filters=$category->filters()->where($condition)->get();
            return view('Admin.Product-Filter.ProductFilter-Create',compact('product', 'filters'));
        }        
        else if($oldFilters->count() != 0)
            return "تعداد".$oldFilters->count()."ویژگی برای این محصول تنظیم شده و ویژگی خالی موجود نمی باشد";
        
            
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $productId=$request->input('product');
        $product=Product::findOrfail($productId);
        $filters=$request->input('filter');
        $values=$request->input('value');

        foreach($filters as $key => $filter){
            $value=array_key_exists($key, $values)?$values[$key]:null;
            $countOldFilter=ProductFilter::where([['product_id', $productId], ['filter_id', $filter]])->count();
            
            if($value != null && $countOldFilter == 0)
                $productFilter=ProductFilter::create(['product_id' => $product->id,'filter_id' => $filter,'value' => $value,]);
                
                
                
            
        }
        return redirect()->route('product-filter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductFilter  $productFilter
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $category=Category::find($product->category_id);
        if($category != null){
            $productFilters=ProductFilter::where('product_id', $product->id)->get();
            
            if($productFilters->isEmpty())
                return 'هنوز برای این کالا مشخصه ای ثبت نشده است';  
            
            foreach($productFilters as $productFilter){
                $parentsFilterDb['filter'][]=$productFilter->filter->id;
                $parentsFilterDb['parent'][]=$productFilter->filter->parent_id;
            }
            
            $parentsId=(array_unique($parentsFilterDb['parent'])); 
            $parentFilters=Filter::find($parentsId);

            // $test=new Filter();
            // $test->setAttribute('productId', $product->id);
            
            return view('Admin.Product-Filter.ProductFilter-Show',compact('product', 'parentFilters'));            
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductFilter  $productFilter
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductFilter $productFilter)
    {
        $filter=Filter::find($productFilter->filter_id);
        $product=Product::find($productFilter->product_id);
        return view('Admin.Product-Filter.ProductFilter-Edit',compact('productFilter', 'filter', 'product'));            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductFilter  $productFilter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductFilter $productFilter)
    {
        $this->validate(request(),['value' => 'required']);
        $product=Product::find($request->product);
        $productFilter->update(['value' => $request->value]);
        return redirect()->route('product-filter.showProperty', $product->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductFilter  $productFilter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductFilter $productFilter)
    {
        //
    }
}
