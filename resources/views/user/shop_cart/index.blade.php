@extends('template.user')

@section('section')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $cart as $item )
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="img/shop-cart/cp-1.jpg" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{$item->product->product_name}}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">Rp. {{number_format($item->product->price)}}</td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty" id="{{$item->id}}">
                                            <input class="qtq" id="{{$item->id}}" type="text" value="{{$item->qty}}">
                                        </div>
                                    </td>
                                    <td class="cart__total">Rp. {{number_format($item->product->price * $item->qty)}}</td>
                                    <form action="{{ url('cart/delete/'.$item->id) }}" id="cart{{$item->id}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    </form>
                                    <td onclick="document.getElementById('cart{{$item->id}}').submit()" class="cart__close"><span class="icon_close"></span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{ route('product') }}">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="{{ route('shopcart') }}"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>Rp. {{number_format($total)}}</span></li>
                        </ul>
                        @php
                            $carts = [];
                            if(count($cart)>0){
                                
                                foreach($cart as $item){
                                    array_push($carts,$item->id);
                                }
                            }
                        @endphp
                        <form action="{{route('transaction')}}" method="POST">
                            @csrf
                            <input name="items" type="text" value="{{join(",",$carts)}}" hidden>
                        <button type="submit"  class="primary-btn px-3">Checkout </button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(()=>{
            console.log("afsa")
            const csrf = $('meta[name="csrf-token"]').attr('content')
            $.ajaxSetup({
                headers:
                {'X-CSRF-TOKEN' : csrf }
            })
            $('.inc').click(()=>{
                let value = $(this).parent().find("input").val()
                console.log(value)
                request = $.ajax({
                    url: `{{ url('cart/update/${value}') }}`,
                    type: "patch",
                })
                request.done((response, textStatus, jqXHR)=>{
                    console.log(response)
                })

            })
        })
    </script>
@endsection

