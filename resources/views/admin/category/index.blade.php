@extends("template.admin")
@section('title', 'Category')
@section('judul', 'Category')

@section('content')
 <div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title, text-center">List Category</h5>
                <div class="pull-right">
                    <a href="{{  route('addkategori') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add
                    </a>
                    {{-- <a href="{{  route('listdetcategory') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-share"></i> Detail Category
                    </a> --}}
                </div>
              </div>
              <div class="card-body">
                 <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Kateori</th>
                        <th class="text-center">Edit</th>
                        </tr>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td class="text-center">
                                <a href="{{  url('admin/kategori/edit/'.$item->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{  url('admin/kategori/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Data?')">
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


{{-- @extends("template.admin")
@section('title', 'Admin Category')
@section('judul', 'Admin Category')

@section('content')
 <div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                  <h5 class="card-title, text-center">yCategory</h5>
              </div>
              <div class="card-body">
                <livewire:category-index></livewire:category-index>
              </div>
            </div>
          </div>
        </div>
@endsection --}}
