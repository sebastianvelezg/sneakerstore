<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sneaker;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CartController extends Controller

{

    public function index(Request $request)  

    {

        $viewData = [];
        $ids = $request->session()->get('sneakers');
        $sneakers = Sneaker::all();
        $viewData["title"] = "Cart - Online Store";
        $viewData["subtitle"] = "Shopping Cart";
        $viewData['sneakers'] = []; 
     

        if($ids){

            foreach ($sneakers as $key => $sneaker) {
                if(in_array($sneaker->getId(), array_keys($ids))){
                    $viewData['sneakers'][$sneaker->getId()] = $sneaker;
                }
            }
        }  

    return view('cart.index')->with("viewData",$viewData);

    }   

    public function add($id, Request $request)

    {

    $ids = $request->session()->get('sneakers');
    $ids[$id] = $id;
    $request->session()->put('sneakers', $ids);
    return back();

    }

    public function remove($id, Request $request)
    {
      $ids = $request->session()->get('sneakers');
      unset($ids[$id]);
      $request->session()->put('sneakers', $ids);
      return back();
    }

    public function removeAll(Request $request)
    {
    $request->session()->forget('sneakers');
    return back();
    }

    public function checkOut(Request $request)
  {
    $ids = $request->session()->get('sneakers');
    foreach ($ids as $id) {
      $sneaker = Sneaker::find($id);
      $sneaker->save();
    }
    $request->session()->forget('sneakers');
    return back();
  }
  
}