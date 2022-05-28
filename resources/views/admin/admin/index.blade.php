@extends("template.admin")
@section('title', 'Admin')
@section('judul', 'Admin')

@section('content')
 <div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title, text-center">List Category</h5>
                <div class="pull-right">
                    <a href="{{  route('addadmin') }}" class="btn btn-success btn-sm">
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
                        <th>Username</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Profile_Image</th>
                        <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td class="text-center">
                                <img src="{{ asset('images/'.$item->profile_image) }}" alt="" width="50" height="50">
                            </td>
                            <td class="text-center">
                                <a href="{{  url('admin/edit/'.$item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{  url('admin/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Data?')">
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
