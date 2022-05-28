<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_category;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Product_category_detail;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admin = Admin::all();
        $category = Product_category::all();
        $detail = Product_category_detail::all();

        return view('admin.category.index', compact('admin','category','detail'));
    }


    public function add()
    {
        return view('admin.category.add');
    }


    public function addprocess(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:product_categories',
        ]);

        $category = new \App\Models\Product_category;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect('admin/kategori/list')->with('status', 'Data Kategori Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $category = DB::table('product_categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function editprocess(Request $request, $id)
    {
        $request->validate([
            'category_name' => "required|unique:product_categories,category_name,$id",
        ]);

        DB::table('product_categories')->where('id', $id)
            ->update([
            'category_name' => $request->category_name,
            ]);
             return redirect('admin/kategori/list')->with('status', 'Data Kategori Berhasil Teredit!');
    }

    public function delete($id)
    {
        DB::table('product_categories')->where('id', $id)->delete();
        return redirect()-> route('listkategori');
    }
}
