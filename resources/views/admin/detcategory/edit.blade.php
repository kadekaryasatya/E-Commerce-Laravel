@extends("template.admin")
@section('title', 'Category')
@section('judul', 'Category')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">DETAIL CATEGORY EDIT</h5>
                 <div class="pull-right">
                    <a href="{{  route('listdetcategory') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-undo"></i> back
                    </a>
                </div>
              </div>
              <div class="card-body">
                  <form action="{{  url('admin/detailkategori/editproses/'.$detail->id) }}" method="POST">
                    @method('patch')
                    @csrf
                        <label for="category_id">Category Name</label>
                            <select class="form-control" id="category_id" name="category_id">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                            </select>
                            <label for="product_id">Product Name</label>
                            <select class="form-control" id="product_id" name="product_id">
                            @foreach ($product as $item)
                                <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                            @endforeach
                            </select>

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
