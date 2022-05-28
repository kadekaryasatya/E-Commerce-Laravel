<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::all();
        foreach ($products as $product){
            $product->image = $product->images->first();
        }
        return view('user.product.index', compact('products'));
    }

    public function detailProduct($id){
        $products = Product::find($id);
        // foreach ($products as $product){
        //     // $product->image = $product->images->all();
        // }
        return view('user.product.detail', compact('products'));
    }
}
