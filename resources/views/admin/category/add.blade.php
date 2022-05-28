@extends("template.admin")
@section('title', 'Category')
@section('judul', 'Category')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">CATEGORY ADD</h5>
                 <div class="pull-right">
                    <a href="{{  route('listkategori') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-undo"></i> back
                    </a>
                </div>
              </div>
              <div class="card-body">
                  <form method="POST" action="{{ url('admin/kategori') }}">
                    @csrf
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}">
                      @error('category_name')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
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
