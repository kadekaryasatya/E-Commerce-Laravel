@extends("template.admin")
@section('title', 'Product')
@section('judul', 'Product')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-7">
            <div class="card ">
              <div class="card-header ">
                <h5 class="text-center">PRODUCT IMAGE</h5>
              </div>
              <div class="card-body ">
                  <form method="POST" action="{{ url('admin/product') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="imageProduct">Product Image</label>
                        @foreach ( $image as $item )
                        <img src="{{ asset('product-image/'.$item->image_name) }}" alt="" class="img-fluid">
                        @endforeach
                        <input type="file" name="imageProduct" id="imageProduct" class="form-control @error('imageProduct') is-invalid @enderror" value="{{ old('imageProduct') }}">
                        @error('imageProduct')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="imageProduct1">Product Image</label>
                        <input type="file" name="imageProduct1" id="imageProduct1" class="form-control @error('imageProduct1') is-invalid @enderror" value="{{ old('imageProduct1') }}">
                        @error('imageProduct1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="imageProduct2">Product Image</label>
                        <input type="file" name="imageProduct2" id="imageProduct2" class="form-control @error('imageProduct2') is-invalid @enderror" value="{{ old('imageProduct2') }}">
                        @error('imageProduct2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
              </div>
              </div>
          </div>
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">PRODUCT DETAIL</h5>
              </div>
              <div class="card-body">
                  <form action="{{  url('admin/product/editproses/'.$product->id) }}" method="POST">
                    @method('patch')
                    @csrf
                   <div class="form-group">
                        <label>Produk Name</label>
                        <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name', $product->product_name) }}" autofocus>
                        @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" autofocus>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" autofocus> {{ old('description', $product->description) }} </textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="integer" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}" autofocus>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Weight</label>
                            <input type="integer" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight', $product->weight) }}" autofocus>
                            @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="category_id">Category Name</label>
                          <select class="form-control" id="category_id" name="category_id">
                          @foreach ($category as $item)
                              <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                          @endforeach
                          </select>
                      </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
