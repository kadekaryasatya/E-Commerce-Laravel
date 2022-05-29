<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    public function index(){
        $discount = Discount::all();
        return view('admin.discount.index', compact('discount'));
    }

    public function add()
    {
        $product = Product::all();
        return view('admin.discount.add', compact('product'));
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'discount' => 'required|integer',
            'start' => 'required',
            'end' => 'required',
        ]);

        $discount = new Discount();

        $discount->product_id = $request->product_id;
        $discount->percentage = $request->discount;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->save();

        return redirect()->route('listdiscount');
    }

    public function edit($id)
    {
        $product = Product::all();
        $discount = Discount::find($id);
        return view('admin.discount.edit', compact('discount', 'product'));
    }

    public function editprocess(Request $request, $id)
    {
        $request->validate([
            'discount' => 'required|integer',
            'start' => 'required',
            'end' => 'required',
        ]);

        $discount = Discount::where('id', $id)->first();

        $discount->product_id = $request->product_id;
        $discount->percentage = $request->discount;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->save();

        return redirect()->route('listdiscount');
    }

    public function delete($id)
    {
        DB::table('discounts')->where('id', $id)->delete();
        return redirect()-> route('listdiscount')->Alert::warning('Warning Title', 'Warning Message');
    }
}
