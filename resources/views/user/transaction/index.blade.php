@extends('template.user')

@section('section')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div>

            @php
                    $products = [];
                    if(isset($product)){
                        $products = [["product"=>$product->id,"qty"=>$product->qty,"price"=>$product->price]];
                    }else {
                        foreach($carts as $cart){
                            array_push($products,["product"=>$cart->product->id,"qty"=>$cart->qty,"price"=>$cart->product->price]);
                        }
                    }
                @endphp

            <form action="{{route('purchase_save',['products'=>$products])}}" class="checkout__form" method="POST">
                @csrf
                    <input id="shipping_cost" type="text" name="shipping_cost" hidden>
                    <input id="sub_total" type="text" name="sub_total" value="{{ $total }}" hidden>
                    <input id="total" type="text" name="total" value="{{ $total }}" hidden>
                    <input id="shipping" type="text" name="shipping_cost" value="0" hidden>
                    <input type="text" id="province" name="province" hidden>

                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">

                            <div class="col-lg-12">

                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input name="adress" type="text" placeholder="Street Address">

                                </div>
                                <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>

                                    <select id="city" required class="form-control mb-3 change" name="regency">
                                        @foreach ($city as $citys)
                                            <option value="{{ $citys->city_id }}">{{ $citys->city_name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="checkout__form__input">
                                    <p>Couriers<span>*</span></p>

                                    <select id="courier" required class="form-control mb-3 change" name="courier">
                                        @foreach ($couriers as $courier)
                                            <option value="{{ $courier->id }}">{{ $courier->courier}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__checkbox">
                                    <label for="acc">
                                        Create an acount?
                                        <input type="checkbox" id="acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing
                                        customer login at the <br />top of the page</p>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Account Password <span>*</span></p>
                                        <input type="text">
                                    </div>
                                    <div class="checkout__form__checkbox">
                                        <label for="note">
                                            Note about your order, e.g, special noe for delivery
                                            <input type="checkbox" id="note">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Oder notes <span>*</span></p>
                                        <input type="text"
                                        placeholder="Note about your order, e.g, special noe for delivery">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                    @if (isset($carts))

                                       @forelse ($carts as $cart)
                                       @if ($cart->discount)
                                        <li>{{$cart->product->product_name}} x {{$cart->qty}} <span>Rp.{{number_format($cart->discount*$cart->qty)}}</span></li>
                                       @else
                                       <li>{{$cart->product->product_name}} x {{$cart->qty}} <span>Rp.{{number_format($cart->product->price*$cart->qty)}}</span></li>
                                       @endif
                                       @empty
                                        <span>Test</span>
                                       @endforelse
                                    @else
                                    @if ($product->discount)
                                    <li>{{$product->product_name}} x {{$product->qty}} <span>Rp.{{number_format($product->discount*$product->qty)}}</span></li>
                                    @else
                                    <li>{{$product->product_name}} x {{$product->qty}} <span>Rp.{{number_format($product->price*$product->qty)}}</span></li>
                                       @endif
                                    @endif


                                        {{-- <li>01. Chain buck bag <span>$ 300.0</span></li>
                                        <li>02. Zip-pockets pebbled<br /> tote briefcase <span>$ 170.0</span></li>
                                        <li>03. Black jean <span>$ 170.0</span></li>
                                        <li>04. Cotton shirt <span>$ 110.0</span></li> --}}
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Sub Total <span> Rp.<span id="harga">{{number_format($total)}}</span></span></li>
                                        <li>Ongkir <span> Rp. <span id="ongkir">0</span></span></li>
                                        <li>Total <span> Rp.<span id="total_fiks">{{number_format($total)}}</span></span></li>
                                    </ul>
                                </div>

                                <button type="submit" class="site-btn">Place oder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <script>
            $(document).ready(function(){
        var weight = {{$weight}}
        var csrf = $('meta[name="csrf-token"]').attr('content')
        var courier = $("#courier")
        var target = $("#city")
        var ongkir = $("#ongkir")
        var harga = $("#harga")
        var total_fiks = $("#total_fiks")
        var shipping = $("#shipping")
        var total= $("#total")
        $(".change").change(function(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': csrf }
            });
            request = $.ajax({
                url: "{{ route('get_cost') }}",
                type: "post",
                data: {
                    origin: '114',
                    target: target.val(),
                    weight: weight,
                    courier: $("#courier option:selected").text()
                }
            });
            request.done(function(response,textStatus,jqXHR){
                console.log(response)
                var response_json = JSON.parse(response).rajaongkir
                var destination_detail = response_json.destination_details
                var cost = response_json.results[0].costs[0].cost[0].value
                var total_harga_termasuk_ongkir = parseInt(harga.text().replace(/,/g,'')) + parseInt(cost)

                $("#province").val(destination_detail.province)
                $("#regency-form").val(destination_detail.city_name)

                ongkir.text(cost.toLocaleString('en-US'))
                shipping.val(cost)
                total.val(total_harga_termasuk_ongkir)
                total_fiks.text(total_harga_termasuk_ongkir.toLocaleString('en-US'))

                console.log(total.val())
            })
        })
    })
        </script>
        <!-- Checkout Section End -->

       @endsection
