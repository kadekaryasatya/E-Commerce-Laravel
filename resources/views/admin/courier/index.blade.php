@extends("template.admin")
@section('title', 'Courier')
@section('judul', 'Courier')

@section('content')
 <div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title, text-center">List Courier</h5>
                <div class="pull-right">
                    <a href="{{  route('addcourier') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
              </div>
              <div class="card-body">
                 <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th>Courier_Name</th>
                        <th class="text-center">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courier as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->courier }}</td>
                            <td class="text-center">
                                <a href="{{  url('admin/courier/edit/'.$item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{  url('admin/courier/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Data?')">
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
      </div>
@endsection
