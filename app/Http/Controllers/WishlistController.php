<?php

namespace App\Http\Controllers;

use App\Product;
use App\WishList;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function index()
    {
        $userId = auth()->user()->id;
        $wishLists = WishList::where('user_id', $userId)->get();
        return view('Default.WishList.index', compact('wishLists'));
    }


    public function create(Request $request)
    {
    }


    public function store(Request $request)
    {
        $productId = $request->input('product');
        $product = Product::findOrFail($productId);
        $userId = auth()->user()->id;
        $userWish = WishList::where('user_id', $userId)->count();
        $oldWishList = WishList::where('user_id', $userId)->where('product_id', $product->id)->get();
        if ($oldWishList->count() == 0) {
            $newWish = WishList::create([
                'user_id'    => $userId,
                'product_id' => $product->id,
            ]);
            return response()->json(['result' => 'add', 'count' => ($userWish + 1)]);
        } else
            return response()->json(['result' => 'existed', 'count' => $userWish]);
    }


    public function show(WishList $wishList)
    {
        //
    }


    public function edit(WishList $wishList)
    {
        //
    }


    public function update(Request $request, WishList $wishList)
    {
        //
    }


    public function destroy(Request $request, WishList $wishList)
    {
        $wishId = $request->input('wishlist');
        $wishList = WishList::find($wishId);
        if ($wishList == null)
            return response()->json(['remove' => 'NO']);
        else if ($wishList->delete())
            return response()->json(['remove' => 'OK', 'deleted' => $wishId]);
        else
            return response()->json(['remove' => 'NO']);
    }
}
