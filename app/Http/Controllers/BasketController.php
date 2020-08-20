<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Product;
use Illuminate\Http\Request;

class BaksetActions
{


    private static function erMany($productName)
    {
        $errorMessage = " تعداد سفارش محصول " . "(" . $productName . ")" . " بیش تر از موجودی انبار است .";
        return $errorMessage;
    }

   
    public static function updateList($userId, $basketsId, $basketCount)
    {
        $status = 'updated';
        foreach ($basketsId as $key => $basketId) {
            $basket = Basket::findOrFail($basketId);
            if ($basket->product_data->total < $basketCount[$key]) {
                $message = BaksetActions::erMany($basket->product_data->name);
                session()->flash('ErrorCount', $message);
                $status = 'count';
            }

            if (($basket->product_data->total > $basketCount[$key]))
                $basket->update(['count' => $basketCount[$key]]);
        }
        return $status;
    }
}


class BasketController extends Controller
{
    public $basket;
    public function __construct()
    {
        session()->flash('dontNeedBasket', true);
        $this->basket = new Basket();
    }

    public function addToBasket(Request $request)
    {

        if ($request->ajax()) {

            //information
            $userId = auth()->user()->id;
            $product = Product::find($request->input('pro_id'));
            $ip = '127.0.0.1';
            if ($product != null) {
                if ($product->total <= 1) {
                    return response()->json(['successful' => 'NO', 'status' => 'count']); //ban This User From Server For Attack
                } //Does't Existed Prodouct
                else {
                    $oldBasket = Basket::where([['user_id', $userId], ['product_id', $product->id], ['status', '0']])->first();

                    if ($oldBasket != null) {
                        $oldBasket->increment('count');
                        $status = 'count';
                    } else {
                        Basket::create([
                            'product_id' => $product->id,
                            'user_id'    => $userId,
                            'count'      => 1,
                            'price'      => null,
                            'ip'         => $ip,
                        ]);
                        $status = "add";
                    }
                    $userBaskets = $this->basket->getUserBaskets();
                    $sumProduct = $this->basket->sumProdcuct($userBaskets);
                    $result = $this->createBasketHTML($userBaskets);
                    return response()->json(['successful' => 'OK', 'status' => $status, 'count' => $userBaskets->count(), 'price' => $sumProduct, 'product' => $result['text'], 'disValue' => $result['disValue']]);
                } //Change Product   
            } // productExiste
            else {
                return response()->json(['successful' => 'NO', 'status' => 'product']);
            }
        } //is Ajax Request
        else
            return redirect()->route('index');
    }

    public function basketList()
    {
        $clientBaskets = Basket::getUserBaskets();
        $sumProduct = Basket::sumProdcuct($clientBaskets);
        return view('Default.Basket.Basket-Product', compact('clientBaskets', 'sumProduct'));
    }

    public function destroy(Basket $basket)
    {
        $basket->delete();
        return back();
    }



    public function update(Request $request)
    {

        //Information get From User
        $userId = auth()->user()->id;
        $basketsId = $request->input('basket');
        $basketsCount = $request->input('count');

        $updateBakset = BaksetActions::updateList($userId, $basketsId, $basketsCount);

        if ($updateBakset == 'updated') {
            return redirect()->route('basket.pay');
        } else
            return back();
    }

    public function pay()
    {
        $clientBaskets = Basket::getUserBaskets();
        $sumProduct = Basket::sumProdcuctDis($clientBaskets);
        return view('Default.Basket.Basket-Checkout', compact('clientBaskets', 'sumProduct'));
    }
}
