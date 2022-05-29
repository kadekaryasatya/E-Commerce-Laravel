@extends('template.user')

@section('section')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Transaction List</span>
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
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Batas Bayar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $transactions as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="cart__product__item">
                                        <img src="{{ asset('img/shop-cart/cp-1.jpg')}}" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{ $item->detail->first()->product->product_name }}</h6>
                                        </div>
                                        @if (count($item->detail)>1)
                                            <h6 class="d-block mb-3">+{{ count($item->detail)-1 }} produk lainnya</h6>
                                        @endif
                                    </td>
                                    <td class="cart__price">Rp. {{ number_format($item->total) }}</td>
                                    <td>
                                    @if ($item->status == "unverified")
                                            {{ $item->timeout }}
                                    @endif
                                    </td>
                                    <td>
                                        @if ($item->status == "unverified")
                                        <button class="site-btn">Unverified</button>
                                        <a href="{{ url('user/proof/'.$item->id) }}"><button class="btn-primary">Proof Payment</button></a>
                                        @elseif ($item->status == "verified")
                                            <button class="site-btn">Verified</button>
                                        @elseif ($item->status == "canceled")
                                            <button class="site-btn">Canceled</button>
                                        @elseif ($item->status == "expired")
                                            <button class="site-btn">Expired</button>
                                        @elseif ($item->status == "delivered")
                                            <button class="site-btn">Delivered</button>
                                        @elseif ($item->status == "success")
                                            <button class="site-btn">Success</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

