<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Category;

class ProductController extends AdminController
{

    public function index(Request $request)
    {
		// if( Gate::allows('Product-List') ){
			$products=$this->search(Product::class, 'name', $request->all(), 15);        
			//$products=Product::latest()->paginate('10');
			return view('Admin.Product.index',compact('products'));
		// }else
			return redirect('dashbord');	
    }

   
    public function create()
    {
		
		// if( Gate::allows('Product-Create') ):
			$categories=Category::where('subset',"!=",0)->get();
			return view('Admin.Product.ProductAdd',compact('categories'));
		// else:
			return redirect('dashbord');	
		// endif;
    }

    public function store(Request $request)
    {
		$this->validate(request(),[
	   'name'=>'required',
	   'category_id'=>'required',
	   'brand'=>'required',
	   'body'=>'required',
	   'picture'=>'required|image',
	   'price'=>'required',
	   'discount'=>'required',
	   'total'=>'required',
		]);
		
		$file=$request['picture'];
		$image=$this->ImageUploade($file,'Product-Pictures/');
		
       Product::create([
	   'name'=>$request['name'],
	   'category_id'=>$request['category_id'],
	   'user_id'=>auth()->user()->id,
	   'brand'=>$request['brand'],
	   'body'=>$request['body'],
	   'bestseler'=>'0',
	   'price'=>$request['price'],
	   'discount'=>$request['discount'],
	   'image'=>$image,
	   'total'=>$request['total'],
	   'status'=>$request['status'],
	   ]);
	   return redirect(route('product.index'));
    }


    public function show(Product $product)
    {
        
    }

  
    public function edit(Product $product)
    {
		// $isAccess=Gate::allows('view',$product);//Create This Gate with Policy
		
		// if($isAccess)
			return view('Admin.Product.ProductEdit',compact('product'));
		// else
			return redirect('dashbord');	
	
    }

    
    public function update(Request $request, Product $product)
    {
		$this->validate(request(),[
		"name"=>'required',
		"body"=>'required',
		"price"=>'required',
		"total"=>'required',
		"discount"=>'required',
		]);
		
		$new_data=$request->all();
        $product->update($new_data);
		return back();
    }

    
    public function destroy(Product $product)
    {
		$path=$this->StandardPath().$product->image;
		$deleted=$this->ImageDelete($path);
		if($deleted)
			$product->delete();
	
        
		return back(); 
	}
	
	public function gallery(Request $request){
		$id=$request->get('id');
		$product=Product::findOrFail($id);
		return view('Admin.Product.ProductGallery',compact('product'));
	}
	
	public function upload(Request $request){
		$id=$request->get('id');
		$files=$request->file('file');
		$file_name=rand()."-".$id."-Image.".$files->getClientOriginalExtension();
		$path=public_path('Uploads/Gallery');
		if($files->move($path,$file_name)){
			$ProductImage=new ProductImage();
			$ProductImage->product_id=$id;
			$ProductImage->url=$file_name;
			$ProductImage->save();
		}
	}

}
