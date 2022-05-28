<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Transaction_detail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\TransactionController;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }



    public function get_city(){
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 14a43317bcd969c1294ea22c6f086938"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          return "cURL Error #:" . $err;
        } else {
          return $response;
        }

    }


    public function get_cost(){
        $curl = curl_init();
        $origin = request()->origin;
        $target = request()->target;
        $courier = request()->courier;
        $weight = request()->weight;

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$target."&weight=".$weight."&courier=".$courier,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 14a43317bcd969c1294ea22c6f086938"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          return "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }


    public function index(){
        
        $city = json_decode(TransactionController::get_city())->rajaongkir->results;
        $couriers = Courier::all();
        if(request()->has("items")){
            $items = explode(",",request()->items);
            $carts = [];
            $weight = 0;
            $total = 0;
            foreach($items as $item){
                $cart = Cart::find($item);
                $cart->status = "checkedout";
                $cart->save();
                array_push($carts,$cart);
                $total += $cart->qty * $cart->product->price;
                $weight += $cart->product->weight;
            }
          
            return view('user.transaction.index',compact('carts','total','city','weight','couriers'));
        }else {
            $product = Product::find(request()->products);
            $total = $product->price;
            $weight = $product->weight;

            return view('user.transaction.index',compact('product','total','city','weight','couriers'));
        }


        
    }


    public function purchase_save(){    

      $transaction = Transaction::create([
          'address'=>request()->adress,
          'regency'=>request()->regency,
          'province'=>request()->province,
          'total'=>request()->total,
          'shipping_cost'=>request()->shipping_cost,
          'sub_total'=>request()->sub_total,
          'user_id'=>auth()->user()->id,
          'courier_id'=>request()->courier,
          'status'=>'unverified',
          'timeout'=> date('Y-m-d', strtotime('+1 days')),
          'proof_of_payment'=>'//'
      ]);
      $data = request()->products;
    
      if(count($data)>1){
          foreach($data as $item){
              
              Transaction_detail::create([
                  'transaction_id'=>$transaction->id,
                  'product_id'=>$item["product"],
                  'qty'=>$item["qty"],
                  'discount'=>0,
                  'selling_price'=>$item["price"]
              ]);
          }
      }else {
          
          Transaction_detail::create([
              'transaction_id'=>$transaction->id,
              'product_id'=>$data[0]["product"],
              'qty'=>$data[0]["qty"],
              'discount'=>0,
              'selling_price'=>$data[0]["price"]
          ]);

      }
      return redirect()->route('shopcart');
    }



    public function addprocess($id){
        $exist_cart = Cart::where('user_id',Auth::user()->id)->where('product_id',$id)->where('status','notyet')->get();
        $cart = new Cart;

        if(count($exist_cart)>0){
            $exist_cart->first()->qty += 1;
            $exist_cart->first()->save();
        }else{
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $id;
            $cart->qty = '1';
            $cart->status = 'notyet';
            $cart->save();
        }

        return back();
    }

    public function updateqty($id){

    }


}


