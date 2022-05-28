@extends("template.admin")
@section('title', 'Category')
@section('judul', 'Category')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">CATEGORY EDIT</h5>
                 <div class="pull-right">
                    <a href="{{  route('listkategori') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-undo"></i> back
                    </a>
                </div>
              </div>
              <div class="card-body">
                  <form action="{{  url('admin/kategori/editproses/'.$category->id) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name', $category->category_name) }}" autofocus-required>
                    @error('name_category')
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
