@extends("template.admin")
@section('title', 'Product')
@section('judul', 'Product')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title, text-center">List Discount Product</h5>
                <div class="pull-right">
                    <a href="{{ url('admin/discount/add') }}" class="btn btn-success btn-sm">
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
                      <th>Discount</th>
                      <th>Start</th>
                      <th>End</th>
                      <th class="text-center">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($discount as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->product_name }}</td>
                            <td>{{ $item->percentage }}%</td>
                            <td>{{ $item->start }}</td>
                            <td>{{ $item->end }}</td>
                            <td class="text-center">
                                <a href="{{  url('admin/discount/edit/'.$item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{  url('admin/discount/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Data?')">
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
