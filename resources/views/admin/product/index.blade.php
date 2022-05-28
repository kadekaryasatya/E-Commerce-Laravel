@extends("template.admin")
@section('title', 'Product')
@section('judul', 'Product')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title, text-center">List Product</h5>
                <div class="pull-right">
                    <a href="{{ url('admin/product/add') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
              </div>
              <div class="card-body">
                 <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <tr>
                      <th>NO</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Rate</th>
                      <th>Stock</th>
                      <th>Weight</th>
                      <th class="text-center">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>Rp. {{ $item->price }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->product_rate }}</td>
                            <td>{{ $item->stock }} pcs</td>
                            <td>{{ $item->weight }} gr</td>
                            <td class="text-center">
                                <a href="{{  url('admin/product/edit/'.$item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{  url('admin/product/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Data?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
