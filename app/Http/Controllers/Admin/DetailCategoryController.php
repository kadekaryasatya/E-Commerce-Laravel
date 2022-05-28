<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_category;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Product_category_detail;
use Illuminate\Support\Facades\DB;

class DetailCategoryController extends Controller
{
    public function index()
    {

        $detail = Product_category_detail::all();

        return view('admin.detcategory.index', compact('detail'));
    }

    public function add()
    {
        $product = Product::all();
        $category = Product_category::all();
        return view('admin.detcategory.add', compact('product','category'));
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'category_id' => 'required',
        ]);

        DB::table('product_category_details')
            ->insert([
            'product_id' => $request->product_id,
            'category_id' => $request->category_id,
            ]);

        return redirect('admin/detailkategori/list')->with('status', 'Data  Detail Kategori Detail Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::all();
        $category = Product_category::all();
        $detail = DB::table('product_category_details')->where('id', $id)->first();
        return view('admin.detcategory.edit', compact('detail','product','category'));
    }

    public function editprocess(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'category_id' => 'required',
        ]);

        DB::table('product_category_details')->where('id', $id)
            ->update([
            'product_id' => $request->product_id,
            'category_id' => $request->category_id,
            ]);
             return redirect('admin/detailkategori/list')->with('status', 'Data Kategori Detail Berhasil Teredit!');
    }

    public function delete($id)
    {
        DB::table('product_category_details')->where('id', $id)->delete();
        return redirect()-> route('listdetcategory');
    }
}
