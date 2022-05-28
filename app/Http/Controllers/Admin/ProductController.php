<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_category;
use App\Models\Product_category_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function add()
    {
        $category = Product_category::all();
        return view('admin.product.add',compact('category'));
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|max:14',
            'description' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
            'imageProduct' => 'required'
        ]);


        $product = new Product;

        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->product_rate = '0';
        $product->save();

        $image = new Product_image;

        $image->product_id = $product->id;
        $proof = $request->file('imageProduct');
        $path = 'product-image/';
        $nama_file = $request->product_name."_".$proof->getClientOriginalName();
        $proof->move($path,$nama_file);
        $image->image_name = $nama_file;
        $image->save();


        $categorydet = new Product_category_detail;

        $categorydet->product_id = $product->id;
        $categorydet->category_id = $request->category_id;
        $categorydet->save();

        return redirect()->route('listproduct');

    }

    public function edit($id)
    {
        $image = Product_image::where('product_id', $id)->get();
        $category = Product_category::all();
        $product = DB::table('products')->where('id', $id)->first();
        return view('admin.product.edit', compact('product', 'category','image'));
    }

    public function editprocess(Request $request, $id)
    {

        $request->validate([
            'product_name' => "required|unique:products,product_name,$id",
            'price' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|max:14',
            'description' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        DB::table('products')->where('id', $id)
            ->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'weight' => $request->weight,
            ]);
            return redirect()->route('listproduct');
    }

    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()-> route('listproduct');
    }

}

// $gambar = new Product_image;
//         $gambar->product_id = $product->id;
//         $image = $request->file('file');
//         $imageName = time() . '-' . $image->extension();
//         $image->move(public_path('images'),$imageName);
//         $gambar->image_name = $imageName;
//         $gambar->save();

//         return redirect('admin/product')->with('status', 'Data  Detail Kategori Detail Berhasil Ditambahkan!');
